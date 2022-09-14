<?php

        namespace App\Http\Controllers;

        use App\Models\User;
        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Hash;
        use Mockery\Matcher\Any;

class UserController extends Controller
{
    
    public function logindex()
    {
        return view('login.login');
    }
    public function verify(Request $request)
    {
            $request->validate([
                'name'      =>'required',
                'password'  =>'required',
            ]);

            $cradential = $request->only('name','password');

            if(Auth::attempt($cradential))
            {                
                
                    return redirect(route('store.index'));
                  
            }
            return back()->withErrors('errors','Email or password not found');

    }
    public function signup()
    {
        return view('login.sign_up');
    }
    
    public function store(Request $request)
    {
            $request->validate([
                'name'      =>'required|min:3|max:30|string',
                'email'     =>'required|email',
                'password'  =>'required|min:8',
            ]);

            $user=User::create([
                'name'      =>$request->name,
                'email'     =>$request->email,
                'password'  =>Hash::make($request->password)
            ]);

            Auth::login($user);
            return redirect(route('store.index'));
    }

    public function logout()
        { 
                Auth::logout();
                return redirect(route('store.index'));

        }
}
