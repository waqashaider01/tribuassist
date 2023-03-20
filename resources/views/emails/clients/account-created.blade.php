@component('mail::message')

@component('mail::panel')
Login credentials
@endcomponent

Dear {{$user->name}},
we just created an account for you. Please use these credentials to login.

# Email: {{$user->email}}
# Password: {{$password}}

@component('mail::button', ['url' => env('APP_URL') . '/login'])
Login Now
@endcomponent

@endcomponent