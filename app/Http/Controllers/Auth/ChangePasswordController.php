<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class ChangePasswordController extends Controller
{
    /**
     * Xử lý đổi mật khẩu.
     */
    

    public function changePassword(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            // Ghi đè thông báo lỗi khi mật khẩu xác nhận không khớp
            'new_password.confirmed' => 'Mật khẩu mới và xác nhận mật khẩu không khớp. Vui lòng kiểm tra lại.',
        ]
    );
    
        /** @var User $user */
        $user = Auth::user();
    
        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }
    
        // Cập nhật mật khẩu mới và lưu lại
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        // Chuyển hướng kèm thông báo thành công
        return redirect()->route('user-account')->with('status', 'Mật khẩu đã được thay đổi thành công.');
    }
}
