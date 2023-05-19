<div class="tabs justify-center pt-24">

  <a class="tab tab-bordered {{(Request::path()  == "") ? "tab-active" : ""}} text-lg">İlanlarım</a>
  <a href="{{ route('ilanver') }}" class="tab tab-bordered {{(Request::path()  == "ilanver") ? "tab-active" : ""}} text-lg">İlan Ver</a>
  <a class="tab tab-bordered {{(Request::path()  == "") ? "tab-active" : ""}} text-lg">Başvuranlar</a>
</div>
