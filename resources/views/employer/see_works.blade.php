@extends('layouts.app')
@section('title', 'İş İlanlarım')
@section('content')
@include('employer.layout')

<div class="flex items-center gap-12 mt-16 flex-col">
  @if(count($ilanlar) == 0)
  <div class="h-[60vh] flex items-center">
    <h1 class="text-5xl">İlanınız Bulunmamakta</h1>
  </div>
  @endif
  @foreach ($ilanlar->reverse() as $ilan)
  <div class="card bg-neutral text-neutral-content shadow-xl w-2/6">
    <div class="card-body">
      <div class="flex justify-between">
        <h2 class="card-title">{{$ilan->baslik}}</h2>
        <form action="{{route('ilan-sil',$ilan->id)}}" method="POST">
          @csrf
          <button type="submit">
            <img src="./delete-button.svg" class="to-slate-50" height="25" width="25" alt="trashsvg">
          </button>
        </form>
      </div>
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
