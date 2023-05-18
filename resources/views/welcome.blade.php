<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Home Page</title>


  @vite('resources/css/app.css')

</head>
<body>

  <div class="hero min-h-screen bg-no-repeat bg-cover bg-center
          bg-[url('https://picsum.photos/800/600')]
          xl:bg-[url('https://picsum.photos/1920/1080')]">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
      <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold">Hoş Geldiniz!</h1>
        <p class="mb-5">

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


  <input type="checkbox" id="kayit" class="modal-toggle" />
  <div class="modal">
    <div class="modal-box">
      <label for="kayit" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <form action="" method="POST">
        <div class="flex flex-col gap-4">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Ad</span>
            </label>
            <label class="input-group">
              <span class="md:w-1/6">Ad</span>
              <input type="text" name="ad" placeholder="Adınız" class="input input-bordered w-3/4" required />
            </label>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Soyad</span>
            </label>
            <label class="input-group">
              <span class="md:w-1/6">Soyad</span>
              <input type="text" name="soyad" placeholder="Soyadınız" class="input input-bordered w-3/4" required />
            </label>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <label class="input-group">
              <span class="md:w-1/6">Email</span>
              <input type="email" name="email" placeholder="info@site.com" class="input input-bordered w-3/4" required />
            </label>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Şifre</span>
            </label>
            <label class="input-group">
              <span class="md:w-1/6">Şifre</span>
              <input type="password" name="sifre" class="input input-bordered w-3/4" required />
            </label>
          </div>
          <div class="modal-action justify-center">
            <button type="submit" class="btn">Kayıt Ol</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <input type="checkbox" id="giris" class="modal-toggle" />
  <div class="modal">
    <div class="modal-box">
      <label for="giris" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <form action="" method="POST">
        <div class="flex flex-col gap-4">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <label class="input-group">
              <span class="md:w-1/6">Email</span>
              <input type="email" name="email" placeholder="info@site.com" class="input input-bordered w-3/4" required />
            </label>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Şifre</span>
            </label>
            <label class="input-group">
              <span class="md:w-1/6">Şifre</span>
              <input type="password" name="sifre" class="input input-bordered w-3/4" required />
            </label>
          </div>
          <div class="modal-action justify-center">
            <button type="submit" class="btn">Giriş Yap</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
