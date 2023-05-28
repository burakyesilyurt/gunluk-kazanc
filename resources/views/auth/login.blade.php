@extends('layouts.app')
@section('title', 'Giriş')
@section('content')


<div class="hero min-h-screen">
  <div class="hero-content text-center text-neutral-content">

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="flex justify-start mb-3">Giriş Yap</div>
      <div class="flex flex-col gap-4">



        <div class="form-control">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <label class="input-group">
            <span class="w-1/4">Email</span>
            <input id="email" type="email" class="input input-bordered w-3/4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          </label>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>




        <div class="form-control">
          <label class="label">
            <span class="label-text">Şifre</span>
          </label>
          <label class="input-group">
            <span class="w-1/4">Şifre</span>
            <input id="password" type="password" class="input input-bordered w-3/4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          </label>

          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>




        <div class="flex gap-3">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

          <label class="form-check-label" for="remember">
            {{ __('Beni Hatırla') }}
          </label>
        </div>




        <div>
          <button type="submit" class="btn btn-primary">
            {{ __('Giriş Yap') }}
          </button>

          @if (Route::has('password.request'))
          <a class="btn btn-sm" href="{{ route('password.request') }}">
            {{ __('Şifremi Unuttum') }}
          </a>
          @endif
        </div>

      </div>
    </form>
  </div>
</div>

@endsection
