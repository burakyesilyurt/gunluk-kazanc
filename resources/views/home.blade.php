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
          <a href="/profil/{{Auth::User()->id}}">
            <div class="card w-96 bg-neutral text-neutral-content">
              <div class="card-body items-center text-center">
                <span class="card-title text-2xl">Profil</span>
              </div>
            </div>
          </a>
        </div>
        <div>
          <a href="{{route('profil')}}">
            <div class="card w-96 bg-neutral text-neutral-content">
              <div class="card-body items-center text-center">
                <span class="card-title text-2xl">Profili Güncelle</span>
              </div>
            </div>
          </a>
        </div>
        <div>
          <a href="{{route('ilanlar')}}">
            <div class="card w-96 bg-neutral text-neutral-content">
              <div class="card-body items-center text-center">
                <span class="card-title text-2xl">İlanlar</span>
              </div>
            </div>
        </div>
        </a>
      </div>
      @elseif (Auth::User()->role == 2)
      <div class="mt-32 flex justify-center flex-col gap-12">
        <div>
          <a href="{{route('ilanlarim')}}">
            <div class="card w-96 bg-neutral text-neutral-content">
              <div class="card-body items-center text-center">
                <span class="card-title text-2xl">İlanlarım</span>
              </div>
            </div>
          </a>
        </div>
        <div>
          <a href="{{route('ilanver')}}">
            <div class="card w-96 bg-neutral text-neutral-content">
              <div class="card-body items-center text-center">
                <span class="card-title text-2xl">İlan Ver</span>
              </div>
            </div>
          </a>
        </div>
        <div>
          <a href="{{route('basvuranlar')}}">
            <div class="card w-96 bg-neutral text-neutral-content">
              <div class="card-body items-center text-center">
                <span class="card-title text-2xl">Başvuranlar</span>
              </div>
            </div>
          </a>
        </div>

      </div>

      @endif


    </div>
  </div>

</div>

@endsection
