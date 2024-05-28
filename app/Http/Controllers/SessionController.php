<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'body'    => $result,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 401)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($errorMessages)) {
            $response['body'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
    
    public function loginForm (){
        if (Auth::guard('administrators')->check()) {
            return redirect()->intended('/dashboard');
        }
        return view("login");
    }

    public function login (Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('administrators')->attempt($credentials)) {
            /** @var \App\Models\Administrator $administrator **/
            $administrator = Auth::guard('administrators')->user();
            $token = $administrator->createToken('MyApp')->plainTextToken;
        
            // Store the token for later use, if needed
            session(['token' => $token]);
        
            return redirect()->intended('/dashboard')->withSuccess('Logged in successfully');
        }

        return redirect()->intended('/register')->withSuccess('Logged in Failed');

    }

    public function logout (Request $request) {
        Auth::guard('administrators')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login')->withSuccess('Logged out successfully');
    }

    public function registerForm (){
        return view('register');
    }

    public function register (Request $request){
        $validator = Validator::make($request -> all(), [
            'name' => 'required',
            'email' => 'required|email|unique:administrators',
            'password' => 'required',
            'c_password' => 'required'
        ]);

        if($validator -> fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request -> all();
        $input['password'] = bcrypt($input['password']);

        $administrator = Administrator::create($input);

        event(new Registered($administrator));

        return redirect('login');   
    }
}
