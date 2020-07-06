@component('mail::message')
# Welcome to SocialRide

This is a social network for travel enthusiasts,
click on the button and join us!

@component('mail::button', ['url' => '/'])
Button Text
@endcomponent

Thanks,<br>
Damiano Di Franco
@endcomponent
