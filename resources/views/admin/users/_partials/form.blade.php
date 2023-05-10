@csrf
<div class="form-group">
    <input type="text" value="{{ $user->name ?? old('title') }}" name="name" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <input type="text" value="{{ $user->email ?? old('email') }}" name="email" class="form-control" placeholder="E-mail">
</div>
<div class="form-group">
    <input type="password" value="{{ $user->password ?? old('password') }}" name="password" class="form-control" placeholder="Senha">
</div>
<button type="submit" class="btn btn-success">Enviar</button>
