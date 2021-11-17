@extends('layout.v_template')

@section('title','Edit Buku')

@section('content')

    <form action="/buku/update/{{ $buku->id_buku }}" method="POST" enctype="multipart/form-data">

        @csrf

        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Buku</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input name="judul" class="form-control" value="{{ $buku->judul }}">
                        <div class="text-danger">
                            @error('judul')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                  <div class="form-group">
                        <label>Pengarang</label>
                        <input name="pengarang" class="form-control " value="{{$buku->pengarang}}">
                        <div class="text-danger">
                            @error('pengarang')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                  <div class="form-group">
                        <label>Penerbit</label>
                        <input name="penerbit" class="form-control " value="{{$buku->penerbit}}">
                        <div class="text-danger">
                            @error('penerbit')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                  <div class="col-sm-12">
                        <div class="col-sm-4">
                            <img src="{{url('gambar/'.$buku->gambar)}}" width="150px">
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Ganti Foto Buku</label>
                                <input type="file" name="gambar" class="form-control">
                                <div class="text-danger">
                                    @error('gambar')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> <br>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button class="btn btn-primary">Simpan</button>
                  <a href="/buku" class="btn btn-success">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

    </form>

@endsection
