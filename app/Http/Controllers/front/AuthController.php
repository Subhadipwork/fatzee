<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            $auth = User::where('email', $request->email)->where('role', 'user')->first();
    
            if ($auth && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
    
                return response()->json([
                    'status' => true,
                    'message' => 'User logged in successfully'
                ]);
            }
    
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials',
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while logging in',
            ], 500);
        }
    }
    


    public function logout()
    {
    
        Auth::logout();

        return redirect()->route('home');
    }

    public function register(Request $request)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $datainsert = User::create([
            'name' => $request->fname . ' ' . $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);
        if ($datainsert) {
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
            ]);
        }
    }
}
