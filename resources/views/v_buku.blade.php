@extends('layout.v_template')

@section('title','Daftar Buku')

@section('content')

@if (auth()->user()->level==1)

@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{session('pesan')}}.
  </div>
@endif

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <div class="card">
                    <div class="card-header text-center" >
                        <h3 class="card-title-lg">Daftar Buku</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <a href="/buku/add" class="btn btn-primary">Tambah</a> <br>
                            </div>
                            <div class="col-4">
                                <form action="/search" method="GET">
                                    @csrf
                                    <div class="input-group mb-3 ">
                                        <input type="search" class="form-control" placeholder="Cari Judul Buku" name="search" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> <hr>
                        <div class="row">
                            @foreach ($buku as $data)
                            <div class="card-colums ">
                            <div class="card m-4" style="width: 13rem; ">
                                <div class="card-body">
                                    <p align="left">{{$data->judul}}</p>
                                    <img src="{{url('gambar/'.$data->gambar)}}" width="170" height="230"> <hr>
                                    <a href="/buku/detail/{{$data->id_buku}} " class="btn btn-sm btn-success">Detail</a>
                                    <a href="/buku/edit/{{$data->id_buku}}" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_buku}}">
                                        Delete
                                    </button>
                                </div>
                            </div>
                            </div>
                            @endforeach
                    </div>
                    </div>
                </div>
                {{ $buku->links() }}
          </div>
        </div>
      </div>
</section>

@foreach ($buku as $data)

<div class="modal fade" id="delete{{$data->id_buku}}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{$data->judul}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Yakin Ingin Menghapus Data Ini ???</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="/buku/delete/{{$data->id_buku}}" class="btn btn-outline-light">Yes</a>
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
            </div>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

@endforeach


@elseif (auth()->user()->level==2)

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <div class="card">
                    <div class="card-header text-center" >
                        <h3 class="card-title-lg">Daftar Buku</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <form action="/search" method="GET">
                                    @csrf
                                    <div class="input-group mb-3 ">
                                        <input type="search" class="form-control" placeholder="Cari Judul Buku" name="search" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> <hr>
                        <div class="row">
                            @foreach ($buku as $data)
                            <div class="card-colums ">
                            <div class="card m-4" style="width: 13rem; ">
                                <div class="card-body">
                                    <p align="left">{{$data->judul}}</p>
                                    <img src="{{url('gambar/'.$data->gambar)}}" width="170" height="230"> <hr>
                                    <a href="/buku/detail/{{$data->id_buku}} " class="btn btn-sm btn-success">Detail</a>
                                </div>
                            </div>
                            </div>
                            @endforeach
                    </div>
                    </div>
                </div>
                {{ $buku->links() }}
          </div>
        </div>
      </div>
</section>

@endif

@endsection
