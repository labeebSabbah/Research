<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\Mail\Template;
use App\Models\User;
use App\Models\Verifyuser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
     public function dashboard()
    {
        if (auth()->user()->admin){
            return view('dashboard.index');
        }else{
            return redirect()->route('dashboard.posts.index');
        }


    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $r)
    {
        $validate = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password',
        ];
        if($r->input('phone') != null){
            $validate['phone'] = 'numeric|min:10|unique:users,phone';
        }
        $r->validate($validate);

        $data = $r->all();
        $data['password'] = Hash::make($data['password']);
        try
        {
            $user = User::create($data);
            Verifyuser::create([
                'token' =>Str::random(60),
                'user_id' =>$user->id,
            ]);
            Mail::to($user->email)->send(new VerifyEmail($user));
            return redirect()->route('login.login_sent_verify')->with('email',$user->email);

        }
        catch (Exception $e)
        {
            return redirect()->back()->withErrors('');
        }
    }

    public function login_sent_verify()
    {
        return view('auth.login_send_verify');
    }

    public function login_send_again(Request $r){
        if($r->input('email')){
            $user = User::where('email', $r->input('email'))->first();
            Mail::to($user->email)->send(new VerifyEmail($user));
            return redirect()->route('login.login_sent_verify')->with('email',$user->email);
        }else{
            return redirect()->route('login');
        }
    }


    public function verifyEmail($token){
        $verifyUser = Verifyuser::where('token',$token)->first();
        if(isset($verifyUser)){
            $user = $verifyUser->user;
            if(!$user->email_verified_at){
                $user->email_verified_at = Carbon::now();
                $user->save();

                $admin = User::where('admin', 1)->first();

                $data_email = [
                    'title'=>'تسجيل مستخدم جديد',
                    'description'=> 'اسم المستخدم : '. $user->name .'<br>' .'البريد الالكتروني :' .$user->email
                ];
                Mail::to($admin->email)->send(new Template($data_email));
                return redirect()->route('login')->with('success','تم تفعيل حسابك');


            }else{
                return redirect()->route('login')->with('success',' حسابك مفعّل ');
            }
        }else{
            return redirect()->route('login')->with('success',' حدث خطأ !!  ');
        }
    }
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $r)
    {
        $type = filter_var($r->info, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $r->validate([
            'info' => 'required',
            'password' => 'required'
        ]);

        try
        {
            $u = User::where($type, $r->info)->first();
            if ($u === NULL) {
                return redirect()->back()->with('error', 'الرجاء التأكد من الاسم و كلمة المرور و إعادة المحاولة.');
            }
            if (Hash::check($r->password, $u->password)) {

                if($u->activated){
                    if($u->email_verified_at){
                        Auth::attempt([$type => $r->info, 'password' => $r->password]);
                        $r->session()->regenerate();
                        $last_login = User::where("id", $u->id)->update(["last_login" => Carbon::now()]);



                        return redirect(route('home'));
                    }else{
                        return redirect()->back()->with('error', 'حسابك غير مفعّل , يرجى التأكد من صندوق الوارد الخاص بك في الايميل الذي التسجيل به والبحث عن ايميل التفعيل   ')
                            ->with('view_resend-active',$u->email);
                    }
                }else{
                    return redirect()->back()->with('error', 'حسابك معطّل');
                }



            } else {
                return redirect()->back()->with('error', 'الرجاء التأكد من كلمة المرور و إعادة المحاولة.');
            }
        }
        catch (Exception $e)
        {
            return redirect()->back()->with('error', 'الرجاء التأكد من الاسم و كلمة المرور و إعادة المحاولة.');
        }
    }

    public function update(Request $r, User $u)
    {
        $r->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'confirmnew' => 'required_with:newpassword|same:newpassword',
            'image' => 'nullable|image'
        ]);
        if($r->input('phone') != null){
            $validate['phone'] = 'numeric|min:10|unique:users,phone';
        }
        $data = $r->all();

        if ($data['newpassword'] != NULL) {
            $data['password'] = Hash::make($data['newpassword']);
        }

        if ($r->hasFile('image')) {
            try
            {

                if (file_exists($u->image)){
                    unlink($u->image);
                }

                $target = "uploads/pfp/";
                $filename = time() . $data['image']->getClientOriginalName();
                $data['image']->move($target, $filename);
                $data['image'] = $target . $filename;
            }
            catch (Exception $e)
            {
                return back()->withErrors('');
            }
        }

        $u->update($data);

        if (auth()->user()->id != $u->id) {
            return redirect()->route('dashboard.users');
        }

        return redirect()->back();
    }

    public function users()
    {
        $users = User::where('admin', '!=', 1)->get();
        return view('dashboard.admin.users', compact('users'));
    }

    public function user(User $u)
    {
        return view('dashboard.admin.user', compact('u'));
    }


    public function activated(User $u)
    {
        $u->activated = !$u->activated;
        $u->save();
        return redirect()->back()->withErrors('');
    }

    public function logout(Request $r)
    {
        Auth::logout();

        $r->session()->invalidate();

        $r->session()->regenerateToken();

        return redirect(route('home'));
    }

}
