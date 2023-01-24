<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function create() 
    {
        return view('auth.register');
    }

    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|min:10',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password',
        ]);
    
        $data = $r->all();
        $data['password'] = Hash::make($data['password']);
        
        try 
        {
            User::create($data);
            return redirect()->route('login');
        } 
        catch (Exception $e)
        {
            return redirect()->back()->withErrors('');
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
                return redirect()->back()->withErrors('');
            }

            if (Hash::check($r->password, $u->password)) {
                Auth::attempt([$type => $r->info, 'password' => $r->password]);
                $r->session()->regenerate();
                return redirect(route('home'));
            } else {
                return redirect()->back()->withErrors('');
            }
        } 
        catch (Exception $e) 
        {
            return redirect()->back()->withErrors('');
        }
    }

    public function update(Request $r, User $u)
    {
        $r->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'username' => 'required',
            'confirmnew' => 'required_with:newpassword|same:newpassword',
            'image' => 'nullable|image'
        ]);

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

    public function logout(Request $r)
    {
        Auth::logout();

        $r->session()->invalidate();

        $r->session()->regenerateToken();

        return redirect(route('home'));
    }

}
