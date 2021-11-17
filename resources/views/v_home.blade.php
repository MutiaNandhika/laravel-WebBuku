@extends('layout.v_template')

@section('title','Home')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" >
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body {
            overflow-x: hidden;
            background-color: #EFF6FD;
        }
        h1 {
            color: #3E065F;
            font-weight: 800;
        }
        p {
            color: #000000;
            padding-top: 3%;
        }
    </style>
</head>
<body>
    <div class="container" >
        <div class="row" data-aos="zoom-out-down" data-aos-easing="linear" data-aos-duration="1500">
            <div class="col-md-12 text-center">
                <img src="{{asset('template')}}/dist/img/buku.png" class="brand-image" width="280">
            </div>
        </div>
        <div class="row" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1500">
            <div class="col-md-12 text-center">
                <h1>Selamat Datang di Big Books</h1>
                <h1>Aplikasi Daftar Buku</h1>
            </div>
        </div>
        <div class="row" data-aos="fade-up-right" data-aos-easing="linear" data-aos-duration="1500">
            <div class="col-md-12 text-center">
                <p>Silahkan masuk untuk melihat halaman daftar buku</p>
            </div>
        </div>
        <div class="row" data-aos="fade-up-right" data-aos-easing="linear" data-aos-duration="1500">
            <div class="col-md-12 text-center">
                <a href="/buku" class="btn btn-lg btn-success">Masuk</a>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
@endsection
