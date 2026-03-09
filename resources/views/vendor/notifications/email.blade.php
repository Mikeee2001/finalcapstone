<x-mail::message>

{{-- Header --}}
# Welcome to the Opol PESO Employment System

We’re glad to have you join the **Opol PESO Employment System**, a platform designed to connect **job seekers and employers** with opportunities in the community.

{{-- Intro Message --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<x-mail::button :url="$actionUrl" color="primary">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Additional Info --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Success Message --}}
@if ($level === 'success')

## ✅ Your account has been successfully verified!

You may now log in to the **Opol Employment System** and start exploring job opportunities or managing your job postings.
@endif

{{-- Closing --}}
Thanks,<br>
**Opol PESO Employment System Team**

<small>
This email was sent automatically by the Opol Employment System.
Please do not reply directly to this message.
</small>

</x-mail::message>
