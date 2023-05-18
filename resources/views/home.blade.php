@extends('layouts.app')

@section('content')

<div class="flex flex-row justify-center">

  <div class="card">


    <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
      {{-- {{dd(Auth::User()->name)}} --}}
      {{ __('You are logged in!') }}
    </div>
  </div>

</div>

@endsection
