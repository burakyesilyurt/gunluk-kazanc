@extends('layouts.app')
@section('title', 'Isverenler')
@section('content')

<h1 class="text-4xl flex justify-center my-12">İşverenler</h1>
<div class="my-16 flex justify-center">
  <div class="overflow-x-auto w-[1400px]">
    <table class="table table-zebra w-full">
      <thead>
        <tr>
          <th></th>
          <th>İsim</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employers as $employer)
        <tr>
          <th>{{$loop->index + 1}}</th>
          <td>{{$employer->name}}</td>
          <td>{{$employer->email}}</td>
          <td>
            <form action="{{route('admin-kullanici',$employer->id)}}" method="POST">
              @csrf
              @method('DELETE')
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
