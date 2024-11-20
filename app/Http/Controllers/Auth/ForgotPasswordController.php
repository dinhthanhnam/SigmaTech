<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    protected function sendResetLinkResponse(Request $request)
    {
        // Nếu yêu cầu JSON, trả về JSON response
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => 'Liên kết đặt lại mật khẩu đã được gửi.'], 200);
        }
    
        // Nếu yêu cầu thông thường, hiển thị thông báo dạng flash
        return back()->with('status', 'Liên kết đặt lại mật khẩu đã được gửi đến email của bạn.');
    }
    
    protected function sendResetLinkFailedResponse(Request $request)
    {
        // Nếu yêu cầu JSON, trả về lỗi JSON
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'email' => ['Địa chỉ email không tồn tại trong hệ thống.'],
            ]);
        }
    
        // Nếu yêu cầu thông thường, hiển thị thông báo lỗi dạng flash
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Địa chỉ email không tồn tại trong hệ thống.']);
    }
    
}
