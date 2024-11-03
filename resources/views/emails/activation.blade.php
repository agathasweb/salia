<h1>Ative sua conta</h1>
<p>Olá, {{ $user->name }}! Clique no link abaixo para ativar sua conta:</p>
<a href="{{ route('activation', ['token' => $user->activation_token]) }}">Ativar Conta</a>




