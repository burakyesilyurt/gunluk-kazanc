@extends('layouts.app')

@section('content')
<div class="pt-12">

  <div class="flex justify-center">
    <div class="avatar">
      <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
        <img src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
      </div>
    </div>
  </div>

  <div>
    <h2 class="text-3xl sm:mx-0 md:mx-9 lg:mx-16 xl:mx-28">Kişisel Bilgileri</h2>
    <div class="mt-9 grid grid-cols-2 grid-rows-2 gap-x-4 gap-y-24 justify-items-center">
      <input id="isim" type="text" placeholder="İsim" class="input input-bordered input-warning w-full max-w-xs" />
      <input type="number" placeholder="Yaş" class="input input-bordered input-warning w-full max-w-xs" />
      <input type="email" placeholder="Email" class="input input-bordered input-warning w-full max-w-xs" />
      <input type="tel" placeholder="Telefon" class="input input-bordered input-warning w-full max-w-xs" />
    </div>
  </div>
  <div class="divider mt-12 mb-8"></div>
  <div class="mt-4">
    <h2 class="text-3xl sm:mx-0 md:mx-9 lg:mx-16 xl:mx-28">Eğitim Bilgileri</h2>
    <div class="mt-9 grid grid-cols-2 grid-rows-2 gap-x-4 gap-y-24 justify-items-center">
      <select id="uniSelect" class="select select-bordered select-warning w-full max-w-xs">
        <option disabled selected>Üniversite Seçiniz</option>
      </select>
      <input type="text" placeholder="Bölüm" class="input input-bordered input-warning w-full max-w-xs" />
      <input type="email" placeholder="Email" class="input input-bordered input-warning w-full max-w-xs" />
      <input type="tel" placeholder="Telefon" class="input input-bordered input-warning w-full max-w-xs" />
    </div>
  </div>


</div>



<script defer>
  const uniSelect = document.getElementById("uniSelect");
  async function getJSONData() {
    const response = await fetch("https://raw.githubusercontent.com/anilozmen/TR-iller-universiteler-JSON/master/province-universities.json");
    const jsonData = await response.json();
    return jsonData;
  }


  const displayOption = async () => {
    const unies = await getJSONData();
    for (uni of unies) {
      for (nameOfTheUni of uni.universities) {
        const newOption = document.createElement("option");
        newOption.value = nameOfTheUni.name;
        newOption.text = nameOfTheUni.name;
        uniSelect.appendChild(newOption);
      }
    }
  };
  //displayOption();

</script>
@endsection
