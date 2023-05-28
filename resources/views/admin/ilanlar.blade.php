@extends('layouts.app')
@section('title', 'Ilanlar')
@section('content')
<h1 class="text-4xl flex justify-center my-12">İlanlar</h1>
<div class="my-16 flex justify-center">
  <div class="overflow-x-auto w-[1400px]">
    <table class="table table-zebra w-full">
      <thead>
        <tr>
          <th></th>
          <th>Başlık</th>
          <th>Şehir</th>
          <th>Sektör</th>
          <th>Başvuru Sayısı</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ilanlar as $ilan)
        <tr>
          <th>{{$loop->index + 1}}</th>
          <td>{{$ilan->baslik}}</td>
          <td>{{$ilan->sehir}}</td>
          <td>{{$ilan->sektor}}</td>
          <td>{{$ilan->basvuru_sayisi}}</td>
          <td>
            <form action="{{route('ilan-sil',$ilan->id)}}" method="POST">
              @csrf
              <button type="submit">
                <img src="/delete-button.svg" class="to-slate-50" height="25" width="25" alt="trashsvg">
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
