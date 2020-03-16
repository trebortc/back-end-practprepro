@component('mail::message')
# Restablecer contraseña

Click en botón para restablecer la contraseña...

@component('mail::button', ['url' => 'http://localhost:4200/responder-password-cambio?token='.$token])
Restablecer contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
