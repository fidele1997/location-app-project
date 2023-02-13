
@extends('style.css')
    
@extends('layouts.auth')

@section('container')

<div class="login-box card card-primary card-outline">
  <div class="login-logo">
    <a href="" class="h3"><b style="color: blue">GESTION</b> LOCATAIRES</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
     <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Connecter via Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Connecter via Google+
        </a>
      </div> --}}
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Mot de passe oublier</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">S'Enregistrer</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

@extends('style.js')

@endsection




  