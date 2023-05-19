@extends('layouts.app')

@section('content')
@include('employer.layout')

<div class="flex items-center gap-7 mt-16 flex-col">
  @foreach ($ilanlar as $ilan)

  <div class="card bg-neutral text-neutral-content shadow-xl w-2/6">
    <div class="card-body">
      <h2 class="card-title">{{$ilan->baslik}}</h2>
      <p class="">{{$ilan->aciklama}}</p>
      <div class="card-actions justify-between">
        <div>
          <label for="">{{$ilan->sektor}} / </label>
          <label class=" w-36">{{$ilan->sehir}}</label>
        </div>
        <label> {{\Carbon\Carbon::parse($ilan->created_at)->diffForHumans()}}</label>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
