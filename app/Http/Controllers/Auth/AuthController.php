<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()

    {
       return view('auth.login');
    }  

    public function registration()

    {
      return view('auth.registration');
    }

  
    public function postLogin(Request $request)

    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

          $usertype = Auth::user()->usertype;
      
        if($usertype == 1){    //usertype 1 define admin 
             
            return redirect()->route('admin');
        }
        else
        {
                     
            return redirect()->route('staff');
        }
     }
 
     else{

            return redirect()->route('login')->with('Success','You have entered invalid credentials');

      }

    }

    public function postRegistration(Request $request)

    {  
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
       

        return redirect()->route('login');

    }


    public function logout() {

        Session::flush();

        Auth::logout();

        return Redirect()->route('/');

    }
}
