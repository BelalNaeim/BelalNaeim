<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use AymanElmalah\MyFatoorah\Facades\MyFatoorah;
use App\Models\Order;

class PaymentController extends Controller {
    //

    public function index() {
        $user = Auth::user();
        $data = [
            'CustomerName' => $user->first_name.$user->last_name,
            'NotificationOption' => 'all',
            'MobileCountryCode' => '+020',
            'CustomerMobile'=>  $user->mobile,
            'DisplayCurrencyIso' => 'EGP',
            'CustomerEmail'=>  $user->email,
            'InvoiceValue' =>  Session::get( 'total' ),
            'Language' => 'en',
            'CallBackUrl' => 'http://furniture_shop_app.test/callback',
            'ErrorUrl' => 'http://furniture_shop_app.test/error',
        ];

        // If you want to set the credentials and the mode manually.
        //    $myfatoorah = MyFatoorah::setAccessToken( $token )->setMode( 'test' )->createInvoice( $data );

        // And this one if you need to access token from config
        $myfatoorah = MyFatoorah::createInvoice( $data );

        // when you got a response from myFatoorah API, you can redirect the user to the myfatoorah portal
        return response()->json( $myfatoorah );
    }

    public function callback( Request $request ) {
        $myfatoorah = MyFatoorah::payment( $request->paymentId );
        $orderId = Session::get( 'order_id' );
        $order = Order::find( $orderId );
        $order->update( [ 'status' => 'PAID' ] );

        // It will check that payment is success or not
        // return response()->json( $myfatoorah->isSuccess() );

        // It will return payment response with all data
        return view( 'payment_success' );

    }

    public function error( Request $request ) {
        // Show error actions
        return view( 'payment_failed' );

    }
}
