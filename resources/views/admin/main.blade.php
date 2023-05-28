@extends('layouts.app')
@section('title', 'Admin Paneli')
@section('content')
{{-- @include('admin.admin-side-panel') --}}

<div class="h-[90vh] flex justify-center flex-col">
  <div class="flex justify-center my-12">
    <div class="border border-rose-500">
      <div class="stats stats-vertical lg:stats-horizontal shadow">
        <div class="stat">

          <div class="stat-title">İlanlar</div>
          <div class="stat-value m-auto">{{$ilanlar}}</div>
        </div>

        <div class="stat">
          <div class="stat-title">Kullanıcılar</div>
          <div class="stat-value m-auto">{{$kullanicilar}}</div>
        </div>
        <div class="stat">
          <div class="stat-title">Firmalar</div>
          <div class="stat-value m-auto">{{$isverenler}}</div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex justify-center gap-12 flex-col items-center lg:flex-row">
    <div class="card w-96 bg-slate-700 text-white shadow-xl">
      <div class="card-body ">
        <a href="{{route('admin-ilan')}}">
          <h2 class="card-title text-4xl flex justify-center h-full border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110 cursor-pointer">İlanlar</h2>
        </a>
      </div>
    </div>
    <div class="card w-96 bg-slate-700 text-white shadow-xl">
      <div class="card-body ">
        <a href="{{route('admin-kullanicilar')}}">
          <h2 class="card-title text-4xl flex justify-center h-full border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110 cursor-pointer">Kullanıcılar</h2>
        </a>
      </div>
    </div>
    <div class="card w-96 bg-slate-700 text-white shadow-xl">
      <div class="card-body ">
        <a href="{{route('admin-firmalar')}}">
          <h2 class="card-title text-4xl flex justify-center h-full border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110 cursor-pointer">Firmalar</h2>
        </a>
      </div>
    </div>
  </div>
</div>

@endsection
