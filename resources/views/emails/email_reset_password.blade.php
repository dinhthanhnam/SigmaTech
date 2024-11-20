@component('mail::message')
![Sigmatech Logo]({{ asset('assets/img/sigmatech-big.png') }})

Xin chào, {{ $user->name }}

Có vẻ như gần đây bạn đã thực hiện yêu cầu cấp lại mật khẩu. 
Bấm vào link dưới đây để được cấp lại mật khẩu:
@component('mail::button', ['url' => $url])
Đặt lại mật khẩu
@endcomponent

Nếu hành động này không phải do bạn, có thể đơn giản bỏ qua.

Trân trọng,  
{{ config('app.name') }}
@endcomponent
