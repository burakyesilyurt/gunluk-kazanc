@extends('layouts.app')
@section('title', 'Ilan Ver')
@section('content')
    @if (session('message'))
        <div id="alertMessage" class="alert flex justify-center alert-success shadow-lg mt-12">
            <div class="w-96">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>İlan Eklendi</span>
            </div>
        </div>
    @endif
    @include('employer.layout')



    <form action="{{ route('ilanyolla') }}" method="POST">
        @csrf
        <div class="flex items-center flex-col gap-16 mt-24">
            <input name="baslik" type="text" placeholder="Başlık"
                class="input input-bordered w-full max-w-xs @error('baslik') is-invalid @enderror"
                value="{{ old('baslik') }}" required />
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
            <textarea name="aciklama" placeholder="Açıklama" class="textarea textarea-bordered textarea-lg w-full max-w-xs"
                required></textarea>
            @error('aciklama')
                <strong>{{ $message }}</strong>
            @enderror
            <button type="submit" class="btn w-56">İlan Ekle</button>

        </div>
    </form>
@endsection

@push('scripts')
    <script src="/js/iller.js"></script>
    <script src="/js/sektorler.js"></script>

    @if (session('message'))
        <script>
            const element = document.getElementById("alertMessage");

            setTimeout(() => {
                element.remove();
            }, 4000);
        </script>
    @endif
@endpush
