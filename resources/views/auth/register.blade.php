@extends('layouts.app')

@section('content')


<div class="hero min-h-screen">
  <div class="hero-content text-center text-neutral-content">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="flex justify-start mb-3">Kayıt Ol</div>
      <div class="flex flex-col gap-4">
        <div class="form-control">
          <label class="label">
            <span class="label-text">{{ __('Ad') }}</span>
          </label>
          <label class="input-group">
            <span class="w-1/4">{{ __('Ad') }}</span>
            <input id="name" type="text" class="input input-bordered w-3/4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          </label>

          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>


        <div class="form-control">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <label class="input-group">
            <span class="w-1/4">Email</span>
            <input id="email" type="email" class="input input-bordered w-3/4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          </label>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text">Rolünüz</span>
          </label>
          <select class="select select-bordered w-full max-w-xs @error('role') is-invalid @enderror" required name="role" value="{{old('role')}}" autocomplete="role">
            <option disabled selected>Rol Seçiniz</option>
            <option value="1">Çalışan</option>
            <option value="2">İşveren</option>
          </select>
          @error('role')
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
            <input id="password" type="password" class="input input-bordered w-3/4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          </label>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>


        <div class="form-control">
          <label class="label">
            <span class="label-text">Şifreyi Doğrula</span>
          </label>
          <label class="input-group">
            <span class="w-1/4">Tekrar</span>
            <input id="password-confirm" type="password" class="input input-bordered w-3/4" name="password_confirmation" required autocomplete="new-password">
          </label>
        </div>


        <div class="justify-center">
          <button type="submit" class="btn btn-primary">
            {{ __('Kayıt Ol') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
