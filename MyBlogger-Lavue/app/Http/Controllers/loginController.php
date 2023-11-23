<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\error;

class loginController extends Controller
{
    public function showLoginForm()
    {
        // session()->flush();
        return view('admin.layouts.root');
    }
    public function LoginForm()
    {
        return view('admin.layouts.Login');
    }
    public function LecturerForm()
    {
        return view('admin.layouts.loginLec');
    }

    public function Login(Request $request)
    {
        // return response()->json($request);
        if ($request) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $user = User::where('email', request('email'))->first();

            if ($user && Hash::check(request('password'), $user->password)) {
                Auth::login($user);

                Auth::check();

                $token = $user->createToken('api_token')->accessToken;
                $Token = bcrypt($token);
                $response = response()->json(['user' => $user, 'Token' => $Token]);

                Session::put('key', [$user->name]);
                Session::push('key', $user->email);
                session(['user' => Auth::user()]);

                return redirect('/admin/dashboard')->with([$response]);
            } else {
                return response()->json(['message' => 'Login Failed at Auth Check']);
            }
        } else {
            return response()->json(['message' => 'Login Failed (main)'], 401);
        }
    }

    public function LoginLec(Request $request)
    {
        $creds = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $lec = Auth::guard('lecturer')->attempt($creds);

        if ($lec) {
            $lecName = Auth::guard('lecturer')->user();

            Session::put('key', [$lecName->name]);
            Session::push('key', $lecName->email);
            // Session::push('key', $lecName);

            // dd(Session::get('key'));
            $request->session()->regenerate();
            return redirect()->intended('/admin/lec/dashboard')->with('message', 'Login Successful');
        } else {
            $error = 'Wrong Email Address or Password';
            return to_route('loginLec')->with('message', $error);
        }
    }

    public function logout()
    {
        $request = request();
        if (!$request) {
            return response()->json('No request Recieved');
        } else {

            Auth::logout();
            Session::flush();

            // // dd(Session::all());

            return redirect('/');
        }
    }

    public function checkIfloggedIn()
    {
        if (!Auth::check()) {
            return response()->json('Login to Access') . view('admin.layouts.Login');
        }
        return response()->json([
            'isLoggedin' => auth()->check() ? true : false,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
