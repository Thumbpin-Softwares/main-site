{{--
    SpamGuard's invisible form fields. Include once inside every public <form>:

        @include('inc.spam-fields')

    Two fields, neither of which a real visitor ever sees or interacts with:

    1. The honeypot -- an input hidden from sighted users, from screen readers
       (aria-hidden), and from keyboard navigation (tabindex="-1"). Anything
       that fills it in is filling every input it can find, which people don't
       do. autocomplete="off" keeps a browser's autofill from tripping it.

       It is hidden with an off-screen wrapper rather than `display:none`,
       because some bots specifically skip display:none inputs.

    2. The timing stamp -- server-signed with the app key, so it records when
       the page was actually rendered and cannot be forged or replayed. Reading
       it back tells us whether the form was filled at human speed.

    Rules and weights live in config/spamguard.php.
--}}
@php
    $sgHoneypot  = config('spamguard.honeypot_field');
    $sgTimestamp = config('spamguard.timestamp_field');
@endphp

<div aria-hidden="true" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">
    <label for="sg-{{ $sgHoneypot }}">Leave this field empty</label>
    <input type="text"
           id="sg-{{ $sgHoneypot }}"
           name="{{ $sgHoneypot }}"
           value=""
           tabindex="-1"
           autocomplete="off">
</div>

<input type="hidden" name="{{ $sgTimestamp }}" value="{{ app(\App\Support\SpamGuard\SpamGuard::class)->signedTimestamp() }}">

@if(config('spamguard.turnstile.enabled'))
    {{-- Only rendered once real Turnstile keys are in .env. "Managed" mode is
         invisible for almost every genuine visitor. --}}
    <div class="cf-turnstile" data-sitekey="{{ config('spamguard.turnstile.site_key') }}" data-theme="auto"></div>
@endif
