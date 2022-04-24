
@component('mail::message')
    Hello **{{$name}}**,
    This is a test for the laravel mailtrap feature

    Go to your inbox page of mailtrap
    @component('mail::button', ['url' => $link])
        Go to your inbox
    @endcomponent
    Sincerely,
    Ya boi
@endcomponent
