@component('mail::message')
# Hello {{$company->company_name}}

<section>
    <article>
        <p>
{{--                Your PO for Transaction ID:[TRANSACTION ID] has been denied.--}}
            Your PO has been denied. For further information please mail us via support@kokrokooad.com or contact us for further information on your transaction.
        </p>
    </article>
</section>

Sincerely,<br>
KOKROKOO TEAM
@endcomponent
