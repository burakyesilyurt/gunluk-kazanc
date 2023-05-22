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

<div class="hidden lg:block fixed z-20 inset-0 top-[6.8125rem] left-[max(0px,calc(50%-55rem))] right-auto w-[16.5rem] pb-10 px-8 overflow-y-auto ">
  <div class="lg:text-sm lg:leading-6 relative">
    <div class="flex flex-col gap-12">
      <div class="form-control">
        <form action="/ilanlar" method="GET">

          <label class="input-group input-group-lg">

            <span>

              <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
              </button>

            </span>
            <input type="text" name="baslik" placeholder="Ara" class="input input-bordered input-lg w-[150px]" />
        </form>

        </label>
        <div class="divider"></div>
      </div>


      <div>
        <form action="/ilanlar" method="GET">

          <select name="sehir" id="il" class="select select-bordered select-lg w-full max-w-xs">
            <option disabled selected>Şehir</option>
          </select>
      </div>
      <div>
        <select name="sektor" id="sektor" class="select select-bordered select-lg w-full max-w-xs">
          <option disabled selected>Sektör</option>
        </select>
      </div>

      <button type="submit" class="btn">Ara</button>
      </form>
    </div>
  </div>
</div>

<div class="flex flex-col items-center justify-center my-12 gap-16 ">
  @if ($works->isEmpty())
  <h1 class="text-2xl mt-36">Aradığınız Kritere Göre İlan Bulunmamaktadır</h1>
  @endif

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

<script defer>
  const ilSelect = document.getElementById("il");
  async function getJSONData() {
    const response = await fetch("https://gist.githubusercontent.com/burakyesilyurt/9e6779acc65cda45f8a8fa9f26b3ab3d/raw/464c8463134c7d4405edca8704bc7c55e9a98e07/%25C4%25B0ller.json");
    const jsonData = await response.json();
    return jsonData;
  }


  const displayIl = async () => {
    const iller = await getJSONData();
    for (il in iller) {
      const newOption = document.createElement("option");
      newOption.value = iller[il];
      newOption.text = iller[il];
      ilSelect.appendChild(newOption);
    }

  };
  displayIl();

</script>

<script defer>
  const sektorlerBox = document.getElementById("sektor");
  async function getJSONData() {
    const response = await fetch("https://gist.githubusercontent.com/burakyesilyurt/a2213941eb72eeef157c4f1db2e7587d/raw/4c004254e0a26178d9d9db0b19e6dc37fc26554d/sektorler.json");
    const jsonData = await response.json();

    return jsonData;

  }


  const displaySektor = async () => {
    const sektorler = await getJSONData();
    for (sektor in sektorler) {
      const newOption = document.createElement("option");
      newOption.value = sektorler[sektor];
      newOption.text = sektorler[sektor];
      sektorlerBox.appendChild(newOption);
    }

  };
  displaySektor();

</script>

@if(session('message'))
<script>
  const element = document.getElementById("alertMessage");

  setTimeout(() => {
    element.remove();
  }, 4000);

</script>


@endif

@endsection
