@extends('layouts.form')

@section('title', 'Inicia sesión')

@section('content')
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            @if ($errors->any())
            <div class="text-center text-muted mb-2">
                <h4>Hay un error</h4>
              </div>
            <div class="alert alert-danger mb-4" role="alert">
                 {{$errors->first()}}
            </div>
            @else
            <div class="text-center text-muted mb-4">
              <small>Ingresa tus credencial para ingresar al sistema</small>
            </div>
            @endif

            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Ingresa tu correo electronico" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative" >
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Ingresa tu contraseña" type="password"  name="password"
                  required autocomplete="current-password" >
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input name="remember" class="custom-control-input" id="remember" type="checkbox"
                id="remember_me" type="checkbox" name="remember">
                <label class="custom-control-label" for="remember">
                  <span class="text-muted">Recordar sesión{{ __('Remember me') }}</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">iniciar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <a href="{{ route('password.request') }}"" class="text-light"><small>¿Olvidaste tu contraseña?</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="{{route('register')}}" class="text-light"><small>Registrate</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

