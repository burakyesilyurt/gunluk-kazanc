@extends('layouts.app')
@section('content')

<div class="flex flex-col items-center mt-24 mb-12 ">
  <div class="card max-w-4xl w-96 lg:w-[700px] bg-neutral text-neutral-content p-10">
    <div class="flex justify-between items-center">
      <h1 class="text-xl">{{$ilan->baslik}}</h1>
      <div class="flex flex-col">
        <form action="{{ route('ilan-basvur') }}" method="post">
          @csrf
          <input hidden value="{{$ilan->id}}" name="id" type="text">
          <button type="submit" class="btn btn-success btn-sm text-base">Başvur</button>
        </form>
        <span>Başvuru sayısı: {{$ilan->basvuru_sayisi}}</span>
      </div>
    </div>

    <div class="flex justify-between pt-7">
      <div>
        <span>{{$ilan->sehir}} / </span>
        <span>{{$ilan->sektor}}</span>
      </div>
      <span> {{\Carbon\Carbon::parse($ilan->created_at)->diffForHumans()}}</span>
    </div>
  </div>

</div>
<div class="flex justify-center my-14">
  <div class="card max-w-4xl  w-96 lg:w-[700px] bg-neutral p-10">
    <div>
      <span class="text-3xl">İş Açıklaması</span>
    </div>
    <div class="divider"></div>
    <h2 class="text-2xl">
      {{$ilan->aciklama}}
    </h2>
  </div>
</div>
@endsection
