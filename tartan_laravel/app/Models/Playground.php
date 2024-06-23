<?php

namespace App\Models;

use App\Traits\TranslatableWithJsonEscape;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Collection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Playground extends Model implements HasMedia
{
    use HasFactory, TranslatableWithJsonEscape, InteractsWithMedia;

    public $translatable = ['name', 'desc'];

    protected $fillable = [
        'name',
        'desc',
        'size',
        'price',
        'night_price',
        'address',
        'lat',
        'lng',
        'city_id',
        'area_id',
        'user_id',
        'times',
    ];

    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
        'price' => 'float',
        'size' => 'int',
        'night_price' => 'int',
        'city_id' => 'int',
        'area_id' => 'int',
        'times' => 'array',
    ];

    protected $appends = [
        'distance_from_lat_lng',
    ];

    /**
     * Spatie Media Library.
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('vendor_main_images')
            ->singleFile()
            ->withResponsiveImages();
        $this
            ->addMediaCollection('vendor_gallery_images')
            ->withResponsiveImages();
    }

    public function main_image(): MorphOne
    {
        return $this->morphOne('App\Models\Media', 'model')
            ->where('collection_name', 'vendor_main_images');
    }

    public function gallery_images(): MorphMany
    {
        return $this->morphMany('App\Models\Media', 'model')
            ->where('collection_name', 'vendor_gallery_images');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function getAvailableTimings($date): array|Collection
    {
        $reservations = $this->reservations()
            ->where('date', Carbon::parse($date)->startOfDay())
            ->where('status', 'CONFIRMED')
            ->pluck('times')
            ->flatten();

        $values = [];
        foreach ($this->times ?? [] as $time) {
            if (!in_array($time['time'], $reservations->toArray())) {
                $values[] = [
                    'time' => $time['time'],
                    'price' => $time['price'] == 'day_time' ? $this->price : $this->night_price,
                ];
            }
        }

        return $values;
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Calculates the great-circle distance between two points, with
     * the Vincenty formula.
     * @param ?float $lat Latitude of start point in [deg decimal]
     * @param ?float $lng Longitude of start point in [deg decimal]
     * @param int $earthRadius Mean earth radius in [km]
     * @return Attribute Distance between points in [m] (same as earthRadius)
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function distanceFromLatLng(?float $lat = null, ?float $lng = null, int $earthRadius = 6371): Attribute
    {
        $lat ??= (request()->get('lat') ?? 0);
        $lng ??= (request()->get('lng') ?? 0);

        return new Attribute(
            function () use ($lat, $lng, $earthRadius) {
                // convert from degrees to radians
                $latFrom = deg2rad($lat);
                $lonFrom = deg2rad($lng);
                $latTo = deg2rad($this->lat);
                $lonTo = deg2rad($this->lng);

                $lonDelta = $lonTo - $lonFrom;
                $a = pow(cos($latTo) * sin($lonDelta), 2) +
                    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
                $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

                $angle = atan2(sqrt($a), $b);
                return $angle * $earthRadius;
            },
        );
    }

    /**
     * Scope Calculates the great-circle distance between two points.
     *
     * @param $query
     * @param $coordinates
     * @param ?int $radius
     * @param string $select
     * @return mixed
     */
    public function scopeIsWithinMaxDistance($query, $coordinates, ?int $radius = null, string $select = 'id')
    {

        $haversine = "(6371 * acos(cos(radians(" . $coordinates['lat'] . "))
                    * cos(radians(`lat`))
                    * cos(radians(`lng`)
                    - radians(" . $coordinates['lng'] . "))
                    + sin(radians(" . $coordinates['lat'] . "))
                    * sin(radians(`lat`))))";

        return $query->select($select)
            ->selectRaw("{$haversine} AS distance")
            ->when($radius, function ($query) use ($haversine, $radius) {
                return $query->whereRaw("{$haversine} < ?", [$radius]);
            });
    }
}
