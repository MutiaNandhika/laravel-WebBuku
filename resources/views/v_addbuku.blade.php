@extends('layout.v_template')

@section('title','Tambah Buku')

@section('content')

    <form action="/buku/insert" method="POST" enctype="multipart/form-data">

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
                <h3 class="card-title">Tambah Buku</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                        <label>Judul</label>
                        <input name="judul" class="form-control" value="{{old('judul')}}" placeholder="Judul">
                        <div class="text-danger">
                            @error('judul')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                  <div class="form-group">
                        <label>Pengarang</label>
                        <input name="pengarang" class="form-control " value="{{old('pengarang')}}" placeholder="Pengarang">
                        <div class="text-danger">
                            @error('pengarang')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                  <div class="form-group">
                        <label>Penerbit</label>
                        <input name="penerbit" class="form-control " value="{{old('penerbit')}}" placeholder="Penerbit">
                        <div class="text-danger">
                            @error('penerbit')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                  <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                        <div class="text-danger">
                            @error('gambar')
                            {{$message}}
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button class="btn btn-primary">Tambahkan</button>
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
