@component('mail::message')
# Hello {{$client->company ? $client->company->cmpany_name : $client->name}},

Your account has now been activated, you may click on the button below to login.

@component('mail::button', ['url' => 'https://demo.kokrokooad.com/auth/login-page'])
Login
@endcomponent
<br>

or you may copy and paste the link below into your browser to login
<p>https.//demo.kokrokooad.com/auth/login-page</p>

Thanks,<br>
Kokrokooad Partners
@endcomponent
