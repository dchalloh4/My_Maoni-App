<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnSelf;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        // session()->flush();
        return view('admin.layouts.root');
    }
    public function __invoke()
    {
        // if (!Auth::check()) {
        //     return response()->json('Login to Access') . redirect('/');
        // }
        // $user = Auth::user();
        $user = auth()->user();
        if ($user->role == 'STUDENT') {

            Session::put('key', [$user->name]);
            Session::push('key', $user->email);

            // dd(Session::get('key'));

            return view('admin.layouts.app')->with(['user' => $user]);

        } else if ($user->role == 'LECTURE') {
            Session::put('key', [$user->name]);
            Session::push('key', $user->email);

            // dd(Session::get('key'));

            return view('admin.layouts.appLec')->with(['user' => $user]);
        }
    }

    public function index()
    {
        //
        $users = User::all();
        return view('my-class', ['users' => $users]);
    }

    public function getUser()
    {

        $user = Auth::user();
        $user = auth()->user();


        // $user = auth()->user();

        Session::put('user', [$user]);
        // Session::push('key', $user->email);

        // dd(Session::get('user'));

        return response()->json(['user' => $user]);
    }

    public function getSession()
    {
        $user = session('user');
        $token = session('api_token');

        Session::put('Session_Cookie', [$user, $token]);

        return view('admin.layouts.app', ['user' => $user, 'token' => $token]);
    }
    /**

     * Show the form for creating a new resource.
     */
    public function submitUnits(Request $request)
    {

        // return response()->json($user_);

        // return response()->json([
        //     // $user,
        //     // $request->unitCode,
        //     // $request->unitName,
        //     $request
        // ]);

        if ($request) {

            $user = $request->json()->all();

            $userId = $user['user']['user']['id'];
            $units = $user['units'];

            // return $user_units;

            $checkIfRegistered = DB::table('users')->where('id', $userId)->whereNull('Units')->update([
                'Units' => $units
            ]);

            // return $checkIfRegistered ? True : false;
            if ($checkIfRegistered) {
                return response()->json('Already registered units');
            } else {
                //     // Update the units for the authenticated user
                $units = [
                    'Units' => ['unitCode' => $request->unitCode, 'unitName' => $request->unitName]
                ];

                $update = DB::table('users')->where('id', $userId)->update($units);

                // Check if the update was successful
                if ($update) {
                    return response()->json('Units Registered');
                } else {
                    return response()->json('Request Not Registered');
                }
            }
        } else {
            return response()->json('Request Not Received');
        }
    }

    public function currentUser()
    {
        $user = auth()->user();

        return response()->json(['user' => $user]);
    }

    public function chooseLogin()
    {
        $user = Auth::user();

        return response()->json(['user' => $user]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function rate(Request $request)
    {
        $user = $request->user;
        $rate = [
            'created_at' => now(),
            'updated_at' => now(),
            'rating' => $request->rate
        ];
        $lastSubmission = [
            'last_submission' => now(),
        ];

        $unitCode = $request->unitCode;

        $update = DB::table('Units')->where('UNIT Code', $unitCode)->update($rate);

        if ($update) {
            DB::table('users')->where('id', $user)->update($lastSubmission);

            return response()->json('Rate Updated');
        } else {
            return response()->json('Rate Not Updated');
        }

        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function getUnit(Request $request)
    {
        $unit = $request->Unit;

        $unit = DB::table('Units')->where('UNIT Code', $unit)->first();
        if ($unit) {
            return response()->json(['rating' => $unit->rating, 'unit' => $unit]);
        } else {
            return response()->json('Unit Not Found');
        }
        // return $request;
    }

    public function lecsList(Request $request) {

        $user = $request->user();

        return response()->json([$request]);
        // if ($request) {
        //     $request->validate([
        //         'email' => 'required|email',
        //         'password' => 'required',
        //     ]);
        //     $userLec =  Lecturer::where('email', request('email'))->first();
        //     $user = DB::table('Lecturers_DB2')->where('email', $request->email)->first();

            // return response()->json([$userLec, $request]);

            // if ($user && Hash::check(request('password'), $user->password)) {

            //     // Auth::login($userLec);

            //     // Auth::check();
            //     // $token = $userLec->createToken('api_token')->accessToken;
            //     // $Token = bcrypt($token);
            //     // $response = response()->json(['user' => $userLec, 'Token' => $Token]);

            //     // Session::put('key', [$userLec->name]);
            //     // Session::push('key', $userLec->email);
            //     // session(['user' => Auth::user()]);

            // } else {
            //     return response()->json(['message' => 'Login Failed at Auth Check']);
            // }
        // } else {
        //     return response()->json('No info reached Server') . redirect('/');
        // }
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
