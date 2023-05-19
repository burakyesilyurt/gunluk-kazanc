@extends('layouts.app')
@section('content')
@include('employer.layout')
<div>

  <div>


    <h2 class="text-3xl sm:mx-0 md:mx-9 lg:mx-16 xl:mx-28 mt-6">Şirket Bilgileri</h2>
    <div class="mt-9 grid grid-cols-2 gap-x-4 gap-y-24 justify-items-center">

      <input id="isim" type="text" placeholder="Şirket Adı" class="input input-bordered input-warning w-full max-w-xs" />

      <input type="tel" placeholder="Telefon" class="input input-bordered input-warning w-full max-w-xs" />
      <input type="email" placeholder="Email" class="input input-bordered input-warning w-full max-w-xs" />
      <select id="il" class="select select-bordered select-warning w-full max-w-xs">
        <option disabled selected>İl</option>
      </select>
    </div>
    <div class="w-full flex justify-center mt-12">
      <button class="btn w-52">Kaydet</button>
    </div>

  </div>

</div>

<script defer>
  const ilSelect = document.getElementById("il");
  async function getJSONData() {
    const response = await fetch("https://gist.githubusercontent.com/burakyesilyurt/9e6779acc65cda45f8a8fa9f26b3ab3d/raw/464c8463134c7d4405edca8704bc7c55e9a98e07/%25C4%25B0ller.json");
    const jsonData = await response.json();
    return jsonData;
  }


  const displayOption = async () => {
    const iller = await getJSONData();
    for (il in iller) {
      const newOption = document.createElement("option");
      newOption.value = iller[il];
      newOption.text = iller[il];
      ilSelect.appendChild(newOption);
    }

  };
  // displayOption();

</script>

@endsection
