@component('mail::message')
# Hello {{$company->company_name}}

<section>
    <article>
        <p>
            {{--                Your PO for Transaction ID:[TRANSACTION ID] has been denied.--}}
            Your Purchase Order for transaction {{$transaction->generated_id}} has been approved. Thanks for doing business with us!
        </p>
    </article>
</section>

Sincerely,<br>
KOKROKOO TEAM
@endcomponent
