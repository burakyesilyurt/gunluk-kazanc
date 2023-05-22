<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Home Page</title>


  @vite('resources/css/app.css')

</head>
<body>
  <div class="hero min-h-[65vh] bg-no-repeat bg-cover bg-center
          bg-[url('https://picsum.photos/800/600')]
          xl:bg-[url('https://picsum.photos/1920/1080')]">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
      <div class="max-w-4xl">
        <h1 class="mb-5 text-5xl font-bold">Hoş Geldiniz!</h1>
        <p class="mb-5 text-2xl">

          İşverenler ve iş arayanlar arasında bağlantı kurmanıza yardımcı olan bir platformuz. Yetenekli iş arayanlarla iletişim kurabilir, iş ilanlarınızı yayınlayabilir ve ekibinizi güçlendirebilirsiniz. Aynı şekilde, farklı sektörlerdeki iş ilanlarını keşfedebilir, başvurularınızı gönderebilir ve kariyerinizi ilerletecek fırsatları yakalayabilirsiniz. Size özel profilinizi oluşturun ve iş dünyasında adınızı duyurun.

          Hemen kaydolun ve iş dünyasında başarıya doğru adım atın!</p>
        <div class="flex gap-7 justify-center mt-12">
          <a href="{{ url('/register') }}">
            <button for="kayit" class="btn">Kayıt Ol</button></a>
          <a href="{{ url('/login') }}">
            <button for="giris" class="btn">Giriş Yap</button>
          </a>

        </div>
      </div>
    </div>
  </div>
  <div class="mt-12">
    <div class="ml-44 mb-12">
      @if ($works->isEmpty())
      <span class="text-3xl font-medium">Güncel İş İlanı Bulunmamakta</span>
      @else
      <span class="text-3xl font-medium">En Güncel İlanlar</span>
      @endif


    </div>
    <div class="grid sm:grid-cols-1 gap-y-11 justify-items-center xl:grid-cols-3">
      @foreach ($works as $work )
      <div class="card w-96 bg-gray-900 shadow-xl 2xl:w-[32rem]">
        <div class="card-body">
          <h2 class="card-title font-medium">{{$work->baslik}}</h2>
          <p class="overflow-hidden max-h-24">{{$work->aciklama}}</p>
          <div class="card-actions justify-between pt-6 items-center">
            <div>
              <span>Başvuru Sayısı {{$work->basvuru_sayisi}}</span>
            </div>
            <div>
              <span class="btn btn-primary">{{$work->sehir}}</span>
              <a href="{{ route('ilanlar') }}" class="btn">İlanlara git</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</body>
</html>
