@extends('layouts.app')
@section('content')
@extends("employer.layout")
{{--
işBaşlık
açıklama
şehir

--}}


<div class="flex items-center flex-col gap-16 mt-24">

  <input type="text" placeholder="Başlık" class="input input-bordered w-full max-w-xs" />
  <select id="il" class="select select-bordered w-full max-w-xs">
    <option disabled selected>Şehir</option>
  </select>
  <select id="sektor" class="select select-bordered w-full max-w-xs">
    <option disabled selected>Sektör</option>
  </select>
  <textarea placeholder="Açıklama" class="textarea textarea-bordered textarea-lg w-full max-w-xs"></textarea>
  <button class="btn w-56">İlan Ekle</button>
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
  //displayIl();

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
  //displaySektor();

</script>

@endsection
