@extends('layouts.app')
@section('content')

@if(session('message'))
<div id="alertMessage" class="alert flex justify-center alert-success shadow-lg mt-12">
  <div class="w-96">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
    <span>Başvuru Yapıldı</span>
  </div>
</div>
@endif

<div class="flex flex-col items-center justify-center my-12 gap-16 ">

  @foreach ($works as $work)
  <div class="card px-7 py-4 max-w-4xl w-72 sm:w-96 md:w-2/4 lg:w-2/5   bg-neutral text-neutral-content">
    <div class="flex justify-between">
      <h2 class="text-xl font-semibold">{{$work->baslik}}</h2>
      <span>{{\Carbon\Carbon::parse($work->created_at)->diffForHumans()}}</span>
    </div>
    <div class="py-4">
      <p class="max-h-48 overflow-hidden">{{$work->aciklama}}</p>
    </div>
    <div class="flex justify-between items-center pt-4">
      <div>
        <span>{{$work->sektor}} / </span>
        <span>{{$work->sehir}}</span>
      </div>
      @guest
      <a href="{{ route('register') }}" class="btn btn-success">İlana Git</a>
      @else
      <a href="/ilanlar/{{$work->id}}" class="btn btn-success">İlana Git</a>
      @endguest
    </div>

  </div>

  @endforeach

</div>

@if(session('message'))
<script>
  const element = document.getElementById("alertMessage");

  setTimeout(() => {
    element.remove();
  }, 4000);

</script>


@endif

@endsection
