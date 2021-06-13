@component('mail::message')
# Hello {{$client->name}}

<section>
    <article>
        <p>
            We are sorry to inform you that your registration has been rejected because we couldn’t validate the authenticity of the details provided. We look forward to interacting with you further.
            Kindly contact us on support@kokrokooad.com for further clarifications.
            Thank you
        </p>
    </article>
</section>

Sincerely,<br>
KOKROKOO TEAM
@endcomponent
