@extends('layouts.app')

@section('content')
@include('employer.layout')

<div class="my-16 flex justify-center">


  <div class="overflow-x-auto w-[1400px]">
    <table class="table table-zebra w-full">
      <!-- head -->
      <thead>
        <tr>
          <th></th>
          <th>İsim</th>
          <th>Email</th>
          <th>Başvurulan İlan</th>
          <th>Profile Git</th>
        </tr>
      </thead>
      <tbody>

        <!-- row 1 -->
        @foreach (array_reverse($basvurular) as $basvuru)



        <tr>
          <th>{{$loop->index + 1}}</th>
          <td>{{$basvuru->name}}</td>
          <td>{{$basvuru->email}}</td>
          <td>{{$basvuru->baslik}}</td>
          <td><a href="/profil/{{$basvuru->id}}" class="btn">Profili Gör</a></td>
        </tr>
        @endforeach
        <!-- row 2 -->

      </tbody>
    </table>
  </div>

</div>

@endsection
