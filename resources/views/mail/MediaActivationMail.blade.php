@component('mail::message')
# Hello {{$user->company->cmpany_name}},

Your account has now been activated, you may click on the button below to login or copy the link below

@component('mail::button', ['url' => 'https://demo.media.kokrokooad.com/'])
Login
@endcomponent
<br>

or you may copy and paste the link below into your browser to login
<p>https://demo.media.kokrokooad.com/</p>

Thanks,<br>
Kokrokooad Partners
@endcomponent
