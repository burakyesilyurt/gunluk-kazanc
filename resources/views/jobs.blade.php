@extends('layouts.app')
@section('title', 'Ilanlar')
@section('content')

    @if (session('message'))
        <div id="alertMessage" class="alert flex justify-center alert-success shadow-lg mt-12 z-10">
            <div class="w-96">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Başvuru Yapıldı</span>
            </div>
        </div>
    @endif

    <div
        class="hidden lg:block fixed z-20 inset-0 top-[6.8125rem] left-[max(0px,calc(50%-55rem))] right-auto w-[16.5rem] pb-10 px-8 overflow-y-auto ">
        <div class="lg:text-sm lg:leading-6 relative">
            <div class="flex flex-col gap-12">
                <div class="form-control">
                    <form action="/ilanlar" method="GET">
                        @method('GET')
                        <label class="input-group input-group-lg">
                            <span>
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </span>
                            <input type="text" name="baslik" placeholder="Ara"
                                class="input input-bordered input-lg w-[150px]" />
                    </form>
                    </label>
                    <div class="divider"></div>
                </div>
                <form action="/ilanlar" method="GET">
                    @method('GET')
                    <div>
                        <select name="sehir" id="il" class="select select-bordered select-lg w-full max-w-xs">
                            <option disabled selected>Şehir</option>
                        </select>
                    </div>
                    <div class="py-8">
                        <select name="sektor" id="sektor" class="select select-bordered select-lg w-full max-w-xs">
                            <option disabled selected>Sektör</option>
                        </select>
                    </div>
                    <button type="submit" class="btn px-12">Ara</button>
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
                    <h2 class="text-xl font-semibold">{{ $work->baslik }}</h2>
                    <span>{{ \Carbon\Carbon::parse($work->created_at)->diffForHumans() }}</span>
                </div>
                <div class="py-10">
                    <p class="max-h-48 overflow-hidden">{{ $work->aciklama }}</p>
                </div>
                <div class="flex justify-between items-center pt-4">
                    <div>
                        <span>{{ $work->sektor }} / </span>
                        <span>{{ $work->sehir }}</span>
                    </div>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-success">İlana Git</a>
                    @else
                        <a href="/ilanlar/{{ $work->id }}" class="btn btn-success">İlana Git</a>
                    @endguest
                </div>
            </div>
        @endforeach
    </div>

    <div class="mx-auto pb-14 w-4/5">
        {{ $works->links() }}
    </div>
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
