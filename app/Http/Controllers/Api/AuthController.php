<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Thông tin đăng nhập chưa chính xác'
            ], 401);
        }

        $token = $user->createToken($user->name.'Auth-Token')->plainTextToken;
        return response()->json([
            'message' =>'Đăng nhập thành công',
            'token_type' => 'Bearer',
            'token' => $token,
        ], 200);
    }

    public function register(Request $request) {
        $request->validate([
            'name'=> 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|max:255|confirmed',
            'phone' => 'nullable|string|max:20|unique:users',
            'gender' => 'nullable|string|in:0,1',
            'address' => 'nullable|string|max:1000',
        ],
        [
            'name.required' => 'Họ và tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.unique' => 'Email này đã được sử dụng.',
            'email.email' => 'Email phải hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'phone.unique' => 'Số điện thoại này đã được đăng ký.',
            'phone.max' => 'Số điện thoại không được quá 20 ký tự.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone ?? null,
            'gender' => $request->gender ?? null,
            'address' => $request->address ?? null,
            'utype' => 'USR',
        ]);
        if($user) {
            $token = $user->createToken($user->name.'Auth-Token')->plainTextToken;
            return response()->json([
                'message' =>'Đăng ký thành công',
                'token_type' => 'Bearer',
                'token' => $token,
            ], 201);
        } else {
            return response()->json([
                'message' =>'Đăng ký không thành công',
            ], 500);
        }
    }
    public function logout(Request $request){
        $user = User::where('id', $request->user()->id)->first();
        if($user) {
            $user->tokens()->delete();
            return response()->json([
                'message' =>'Logged out.',
            ],200);
        } else {
            return response()->json([
                'message' =>'User Not Found.',
            ], 404);
        }
    }
    public function profile(Request $request){
        if($request->user()) {
            return response()->json([
                'message' =>'Profile Fetched.',
                'data' =>$request->user()
            ], 200);
        }
        else {
            return response()->json([
                'message' =>'Not Authenticated.',
                'data' =>$request->user()
            ], 401);
        }
    }
}
