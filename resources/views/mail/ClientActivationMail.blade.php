@component('mail::message')
# Hello {{$client->company ? $client->company->cmpany_name : $client->name}},

<section>
    <article style="font-size:8px !important;">
        <p>
            Welcome aboard Kokrokoo! The Marketing platform that partners with you to advertise and reach out to the world!
            Thank you for Partnering with us in this new experience of Marketing.
            You will find attached to this mail our Brochure for further information on our services.
        </p>
    </article>
</section>

@component('mail::button', ['url' => 'https://demo.kokrokooad.com/auth/login-page'])
Login
@endcomponent
<br>

or you may copy and paste the link below into your browser to login
<p>https.//demo.kokrokooad.com/auth/login-page</p>

Cheers,<br>
THE KOKROKOO TEAM
@endcomponent
