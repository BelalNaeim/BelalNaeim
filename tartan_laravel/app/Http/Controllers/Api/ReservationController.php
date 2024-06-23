<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Playground;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * @group Reservation
 */
class ReservationController extends Controller
{
    /**
     * Reserve a playground.
     *
     * @bodyParam playground_id integer required The playground id. Example: "1".
     * @bodyParam date string required The date of the reservation. Example: "2020-01-01".
     * @bodyParam time string required_without:times The time of the reservation. Example: "00:00:00".
     * @bodyParam times array required_without:time The times (as array) of the reservation. Example: "00:00:00".
     * @param Request $request
     * @return JsonResponse
     */
    public function reserve(Request $request): JsonResponse
    {
        $data = $request->validate([
            'playground_id' => 'required|integer|exists:playgrounds,id',
            'date' => 'sometimes|date|after:yesterday',
            'time' => 'required_without:times|string',
            'times' => 'required_without:time|array|min:1',
            'payment_method' => 'required|string|in:cash',
        ]);
        $data['times'] ??= [$data['time']];

        /** @var Playground $playground */
        $playground = Playground::find($data['playground_id']);

        /** @var Collection $playgroundTimes */
        $playgroundTimes = collect($playground->getAvailableTimings($data['date'] ?? now()));
        $reserveTimes = $playgroundTimes
            ->filter(function ($time) use ($data) {
                return in_array($time['time'], $data['times']);
            });

        if ($reserveTimes->count() != sizeof($data['times'])) {
            $notFoundTimes = collect($data['times'])->whereNotIn('time', $playgroundTimes->pluck('time'));
            return response()->json([
                'message' => 'Invalid times (' . implode(', ', $notFoundTimes->toArray()) . ')',
                'data' => [
                    'not_found_times' => $notFoundTimes->pluck('time'),
                    'available_times' => $playgroundTimes->pluck('time'),
                    'correct_times' => $reserveTimes->pluck('time'),
                    'given_times' => $data['times'],
                ],
            ], 422);
        }

        $totalPrice = $reserveTimes->sum(function ($time) use ($data) {
            return $time['price'];
        });

        $reservation = Reservation::create([
            'playground_id' => $data['playground_id'],
            'user_id' => auth()->id(),
            'date' => Carbon::parse($data['date'] ?? now())->startOfDay(),
            'times' => $data['times'],
            'status' => 'PENDING',
            'payment_status' => 'PENDING',
            'payment_reference' => '',
            'payment_amount' => $totalPrice,
            'payment_method' => $data['payment_method'],
        ]);

        return response()->json($reservation);
    }

    /**
     * Get all reservations.
     *
     * @return JsonResponse
     */
    public function getReservations(): JsonResponse
    {
        $reservations = Reservation::query()
            ->where('user_id', auth()->id())
            ->with([
                'playground.main_image',
                'playground.gallery_images',
                'playground.city',
                'playground.area',
            ])
            ->get();

        return response()->json($reservations);
    }

    /**
     * Check Available Timings.
     *
     * @bodyParam playground_id integer required The playground id. Example: "1".
     * @bodyParam date string required The date of the reservation. Example: "2020-01-01".
     */
    public function checkAvailableTimings(Request $request): JsonResponse
    {
        $data = $request->validate([
            'playground_id' => 'required|integer|exists:playgrounds,id',
            'date' => 'sometimes|date|after:yesterday',
        ]);

        /** @var Playground $playground */
        $playground = Playground::query()->findOrFail($data['playground_id']);
        $timings = $playground->getAvailableTimings($data['date'] ?? now());
        return response()->json($timings);
    }

    /**
     * Cancel Reservation.
     * @bodyParam reservation_id integer required The reservation id. Example: "1".
     * @param Request $request
     * @return JsonResponse
     */
    public function cancelReservation(Request $request): JsonResponse
    {
        $data = $request->validate([
            'reservation_id' => 'required|integer',
        ]);

        $reservation = Reservation::query()
            ->where('user_id', auth()->id())
            ->find($data['reservation_id']);

        if (!$reservation) {
            return response()->json([
                'message' => 'Reservation not found',
            ], 404);
        }

        // Check if he can cancel now.
//        foreach ($reservation->times as $time) {
//            $rTime = Carbon::parse($time)->setDateFrom($reservation->date);
//            if ($rTime->subHours(3)->isPast()) {
//                return response()->json([
//                    'message' => 'You can not cancel this reservation',
//                ], 422);
//            }
//        }

        // TODO: Refund payment.
        $reservation->update([
            'status' => 'CANCELLED',
        ]);
        return response()->json($reservation);
    }
}
