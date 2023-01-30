<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }

    public function index(Post $post)
    {
        return view('dashboard.posts.pay', compact('post'));
    }

    public function pay(Post $post)
    {
        $data = [];

        $data['items'] = [
            [
                'name' => 'Post',
                'price' => '20',
                'desc'  => 'Payment for post',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = $post->id;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('pay.success');
        $data['cancel_url'] = route('pay.cancel');
        $data['total'] = 20;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data, true);

        if ($response['paypal_link']) {
            return redirect($response['paypal_link']);
        }

        return redirect()->route('dashboard.posts.index')->withErrors('تم الدفع مسبقا');
    }

    public function cancel()
    {
        return redirect()->route('dashboard.posts.index')->withErrors('تم الغاء الدفع');
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;

        $token = $request->get('token');
        $PayerID = $request->get('PayerID');

        $response = $provider->getExpressCheckoutDetails($token);

        $data = [];
        $data['items'] = [
            [
                'name' => 'Post',
                'price' => '20',
                'desc'  => 'Payment for post',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = $response['INVNUM'];
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('pay.success');
        $data['cancel_url'] = route('pay.cancel');
        $data['total'] = 20;

        $payment_status = $provider->doExpressCheckoutPayment($data, $token, $PayerID);

        if (in_array(strtoupper($payment_status['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            $post = Post::find($response['INVNUM']);
            $post->update(['paid' => true]);

            $user = User::find($post->author_id);
            $user->update(['paid' => true]);

            $message = 'added a new post.';
            $reciever = User::where('admin', 1)->first()->id;
            NotificationController::new($reciever, $message);

            return redirect()->route('dashboard.posts.index');

        }

        dd('حدث خطأ اثناء الدفع');
    }
    
}
