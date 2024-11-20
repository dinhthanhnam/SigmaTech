<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
        $this->middleware('guest')->only('validate');
    }
    public function index() 
    {
        return view('login');
    }

    protected function authenticated(Request $request, $user)
    {
        // Kiểm tra nếu người dùng là admin
        if ($user->utype == 'ADM') {
            return redirect()->route('admin.index');
        }
        // Nếu không phải admin, chuyển hướng đến trang chủ hoặc trang khác
        return redirect()->route('home.index');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->with('error', 'Thông tin đăng nhập không chính xác.');
    }
}
