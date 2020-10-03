@component('mail::message')
# Welcome

<p>Your admin account has been created.kindly login with the credentials below.</p>
<p>Email : {{ $user->email }} <br>Password : {{ $password }}</p>
@component('mail::button', ['url' => 'http://admin.kokrokooad.com'])
Click to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
