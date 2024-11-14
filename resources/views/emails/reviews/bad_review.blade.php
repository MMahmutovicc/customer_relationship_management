@component('mail::message')
# Bad Review

{{ $reviewer->name }} has left a bad review. Please click the link below to see the review.

@component('mail::button', ['url' => route('user.review', [$review])])
    View Review
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
