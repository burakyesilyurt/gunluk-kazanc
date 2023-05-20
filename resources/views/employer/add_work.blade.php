@extends('layouts.app')
@section('content')
@if(session('message'))
<div id="alertMessage" class="alert flex justify-center alert-success shadow-lg mt-12">
  <div class="w-96">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
    <span>İlan Eklendi</span>
  </div>
</div>
@endif
@include('employer.layout')



<form action="{{ route('ilanyolla') }}" method="POST">
  @csrf
  <div class="flex items-center flex-col gap-16 mt-24">
    <input name="baslik" type="text" placeholder="Başlık" class="input input-bordered w-full max-w-xs @error('baslik') is-invalid @enderror" value="{{ old('baslik') }}" required />
    @error('baslik')
    <strong>{{ $message }}</strong>
    @enderror
    <select name="sehir" id="il" class="select select-bordered w-full max-w-xs">
      <option disabled selected>Şehir</option>
    </select>
    @error('sehir')
    <strong>{{ $message }}</strong>
    @enderror
    <select name="sektor" id="sektor" class="select select-bordered w-full max-w-xs">
      <option disabled selected>Sektör</option>
    </select>
    @error('sektor')
    <strong>{{ $message }}</strong>
    @enderror
    <textarea name="aciklama" placeholder="Açıklama" class="textarea textarea-bordered textarea-lg w-full max-w-xs" required></textarea>
    @error('aciklama')
    <strong>{{ $message }}</strong>
    @enderror
    <button type="submit" class="btn w-56">İlan Ekle</button>

  </div>
</form>

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
