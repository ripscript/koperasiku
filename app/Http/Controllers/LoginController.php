<?php

namespace App\Http\Controllers;

use App\models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index ()
    {
        return view('auth.login');
    }

    public function authentication (Request $request)
    {   

        $validator = Validator::make($request->all(),[
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4']
        ]);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $loginSebagai = $request['loginSebagai'];
        $emailRequest = $request['email'];
        $passwordRequest = md5($request['password']);

        $user = Users::where('email', '=', $emailRequest)
        ->first();


        if (isset($user)) {
            if ($user->email == $emailRequest && $user->password == $passwordRequest) {
                Session::put(['admin' => $user]);
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error', true)->withInput();
            }
        } else {
            return redirect()->back()->with('error', true)->withInput();
        }

    }
}
