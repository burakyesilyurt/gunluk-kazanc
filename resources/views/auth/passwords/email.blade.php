@extends('layouts.app')

@section('content')
<div class="hero min-h-screen">

  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif

  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-3">
      <label for="email" class="">{{ __('Email Address') }}</label>

      <div class="col-md-6">
        <input id="email" type="email" class="input input-bordered w-full max-w-xs @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <div>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row mb-0">
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          {{ __('Şifre Yenileme Linkini Gönder') }}
        </button>
      </div>
    </div>
  </form>

</div>

@endsection
