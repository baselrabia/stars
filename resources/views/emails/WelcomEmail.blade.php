@component('mail::message')
# Introduction

Welcome to our App, Now you are a member in our big family.

@component('mail::button', ['url' => config('app.url')])
Visit Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
