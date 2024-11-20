@component('mail::message')
![Sigmatech Logo]({{ asset('assets/img/sigmatech-big.png') }})

Xin chào, {{ $user->name }}

Cảm ơn bạn đã đăng ký tài khoản trên trang web Sigmatech của chúng tôi! 
Bấm vào link dưới đây để hoàn thành quá trình đăng ký:
@component('mail::button', ['url' => $url])
Xác thực
@endcomponent

Nếu hành động này không phải do bạn, có thể đơn giản bỏ qua.

Trân trọng,  
{{ config('app.name') }}
@endcomponent
