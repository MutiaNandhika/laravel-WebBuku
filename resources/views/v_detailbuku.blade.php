@extends('layout.v_template')

@section('title','Detail Buku')

@section('content')

<table class="table">
    <tr>
        <th width="100px" > Judul </th>
        <th width="30px" > : </th>
        <th  >{{$buku->judul}} </th>
    </tr>
    <tr>
        <th width="100px" > Pengarang </th>
        <th width="30px" > : </th>
        <th  >{{$buku->pengarang}} </th>
    </tr>
    <tr>
        <th width="100px" > Penerbit </th>
        <th width="30px" > : </th>
        <th  >{{$buku->penerbit}} </th>
    </tr>
    <tr>
        <th width="100px" > Gambar </th>
        <th width="30px" > : </th>
        <th> <img src="{{url('gambar/'.$buku->gambar)}} " width="400px"></th>
    </tr>
    <tr>
        <th>
            <a href="/buku" class="btn btn-success">Kembali</a>
        </th>
    </tr>
</table>



@endsection
