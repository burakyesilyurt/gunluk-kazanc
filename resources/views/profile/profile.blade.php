@extends('layouts.app')

@section('content')



<div class="my-14">
  <form action="{{route('profil')}}" method="POST">
    @csrf

    <div class="flex flex-col items-center gap-14">
      <h1 class="text-3xl">Kişisel Bilgiler</h1>
      <input name="isim" id="isim" type="text" value="{{$user->isim ?? ''}}" placeholder="İsim" class="input input-bordered input-warning w-full max-w-xs" required />
      @error('ismi')
      <strong>{{ $message }}</strong>
      @enderror
      <input name="yas" type="number" placeholder="Yaş" value="{{$user->yas ?? ''}}" class="input input-bordered input-warning w-full max-w-xs" required />
      @error('yas')
      <strong>{{ $message }}</strong>
      @enderror
      <input name="tel" type="tel" placeholder="Telefon" value="{{$user->telefon ?? ''}}" class="input input-bordered input-warning w-full max-w-xs" required />
      @error('tel')
      <strong>{{ $message }}</strong>
      @enderror
      <select name="universite" id="uniSelect" class="select select-bordered select-warning w-full max-w-xs">
        <option disabled selected>Üniversite Seçiniz</option>
      </select>
      @error('universite')
      <strong>{{ $message }}</strong>
      @enderror
      <input name="bolum" type="text" placeholder="Bölüm" value="{{$user->bolum ?? ''}}" class="input input-bordered input-warning w-full max-w-xs" />
      @error('bolum')
      <strong>{{ $message }}</strong>
      @enderror
      <button type="submit" class="btn btn-lg w-48">Kaydet</button>
    </div>
  </form>
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
  displayOption();

</script>
@endsection
