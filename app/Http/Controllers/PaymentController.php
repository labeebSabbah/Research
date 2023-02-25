<?php

namespace App\Http\Controllers;
use App\Mail\Template;
use Illuminate\Support\Facades\Mail;
use App\Mail\UploadYourPost;
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
                'price' => '1',//change
                'desc'  => 'Payment for post',
                'qty' => 1
            ]
        ];



        $data['invoice_id'] = $post->invoice_id;
        //$data['invoice_id'] = $post->id;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('pay.success');
        $data['cancel_url'] = route('pay.cancel');
        $data['total'] = 1;//change
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
                'price' => '1',//change
                'desc'  => 'Payment for post',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = $response['INVNUM'];
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('pay.success');
        $data['cancel_url'] = route('pay.cancel');
        $data['total'] = 1;//change

        $payment_status = $provider->doExpressCheckoutPayment($data, $token, $PayerID);

        if (in_array(strtoupper($payment_status['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            //$post = Post::find($response['INVNUM']);//from id
            $post = Post::where('invoice_id',$response['INVNUM'])->first();
            $post->update([
                'paid' => true,
                'pay_amount' => '1',//change
                'paid_at' => now(),
            ]);

            $user = User::find($post->author_id);
            $user->update(['paid' => true]);

            //auth()->user()->email
            $admin = User::where('admin', 1)->first();
           /* Mail::to($admin->email)->send(new UploadYourPost($post));*/

            $data_email = [
                'title'=>'بحث بانتظار التدقيق ',
                'description'=>
                    'اسم البحث : '. $post->title .'<br>' .
                    'اسم المؤلف  :' .auth()->user()->name .'<br>'.
                    'التخصص الرئيسي للبحث  :' .$post->research_major .'<br>'.
                    'التخصص الدقيق للبحث  :' .$post->exact_specialty_research .'<br>'.
                    'اسم المجلة :' . $post->category->title .'<br>'.
                    'ملف البحث :' . '<a target="_blank" href="'.url($post->file).'">عرض الملف</a>'
            ];
            Mail::to($admin->email)->send(new Template($data_email));

            $message = 'added a new post.';
            $reciever = User::where('admin', 1)->first()->id;
            NotificationController::new($reciever, $message);



            return redirect()->route('dashboard.posts.index');

        }

        dd('حدث خطأ اثناء الدفع');
    }

}
