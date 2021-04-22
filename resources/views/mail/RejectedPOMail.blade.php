@component('mail::message')
# Hello {{$company->company_name}}

<section>
    <article>
        <p>
{{--                Your PO for Transaction ID:[TRANSACTION ID] has been denied.--}}
            Your Purchase Order for transaction {{$transaction->generated_id}} has been denied. For further clarifications, kindly mail us via support@kokrokooad.com or give us a call.
        </p>
    </article>
</section>

Sincerely,<br>
KOKROKOO TEAM
@endcomponent
