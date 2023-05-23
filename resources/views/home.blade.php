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
      @if(Auth::User()->role == 1)
      <div class="mt-32 flex justify-center flex-col gap-12">
        <div>
          <div class="card w-96 bg-neutral text-neutral-content">
            <div class="card-body items-center text-center">
              <a href="/profil/{{Auth::User()->id}}"> <span class="card-title text-2xl">Profil</span></a>
            </div>
          </div>
        </div>
        <div>
          <div class="card w-96 bg-neutral text-neutral-content">
            <div class="card-body items-center text-center">
              <a href="{{route('profil')}}"><span class="card-title text-2xl">Profili Güncelle</span></a>
            </div>
          </div>
        </div>
        <div>
          <div class="card w-96 bg-neutral text-neutral-content">
            <div class="card-body items-center text-center">
              <a href="{{route('basvuranlar')}}"><span class="card-title text-2xl">Başvuranlar</span></a>
            </div>
          </div>
        </div>
      </div>
      @elseif (Auth::User()->role == 2)
      <div class="mt-32 flex justify-center flex-col gap-12">
        <div>
          <div class="card w-96 bg-neutral text-neutral-content">
            <div class="card-body items-center text-center">
              <a href="{{route('ilanlarim')}}"> <span class="card-title text-2xl">İlanlarım</span></a>
            </div>
          </div>
        </div>
        <div>
          <div class="card w-96 bg-neutral text-neutral-content">
            <div class="card-body items-center text-center">
              <a href="{{route('ilanver')}}"><span class="card-title text-2xl">İlan Ver</span></a>
            </div>
          </div>
        </div>
        <div>
          <div class="card w-96 bg-neutral text-neutral-content">
            <div class="card-body items-center text-center">
              <a href="{{route('basvuranlar')}}"><span class="card-title text-2xl">Başvuranlar</span></a>
            </div>
          </div>
        </div>

      </div>

      @endif


    </div>
  </div>

</div>

@endsection
