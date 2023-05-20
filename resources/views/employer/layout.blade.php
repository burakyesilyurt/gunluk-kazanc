<div class="tabs justify-center pt-20">
  <a href="{{ route('ilanlarim') }}" class="tab tab-bordered {{(Request::path()  == "ilanlarim") ? "tab-active" : ""}} text-lg">İlanlarım</a>
  <a href="{{ route('ilanver') }}" class="tab tab-bordered {{(Request::path()  == "ilanver") ? "tab-active" : ""}} text-lg">İlan Ver</a>
  <a href="{{ route('basvuranlar') }}" class="tab tab-bordered {{(Request::path()  == "basvuranlar") ? "tab-active" : ""}} text-lg">Başvuranlar</a>
</div>
