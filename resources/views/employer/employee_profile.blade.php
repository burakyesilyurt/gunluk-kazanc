@extends('layouts.app')
@section('content')

<div class="flex justify-center">

  <div class="flex justify-center flex-col card bg-neutral w-[850px] my-14 p-12">
    <h1 class="text-2xl font-semibold my-2">Kişisel Bilgiler</h1>
    <div class="divider"></div>
    <div class="flex justify-between text-xl">
      <div>
        <span>İsim:</span>
        <span>{{$employee->isim}}</span>
      </div>
      <div>

        <span>Yas:</span>
        <span>{{$employee->yas}}</span>
      </div>
    </div>
    <div class="flex justify-between mt-12 text-xl">
      <div>

        <span>Telefon:</span>
        <span>{{$employee->telefon}}</span>
      </div>
      <div>
        <span>Mail:</span>
        <span>{{$employee->mail}}</span>
      </div>
    </div>

  </div>
</div>
<div class="flex justify-center">
  <div class="flex justify-center flex-col card bg-neutral w-[850px] my-14 p-12">
    <h1 class="text-2xl font-semibold my-2">Eğitim Bilgileri</h1>
    <div class="divider"></div>
    <div class="flex justify-between text-xl">
      <div>
        <span>Üniversite:</span>
        <span>{{$employee->universite != '' ?$employee->universite : 'Eğitim Bilgisi Yok'}}</span>
      </div>
      <div>
        <span>Bolum:</span>
        <span>{{$employee->bolum != '' ?$employee->bolum : 'Bolum Bilgisi Yok'}}</span>
      </div>
    </div>

  </div>
</div>

@endsection
