@extends('layouts.main')

@section('content')

<div class="text-center p-4 bg-white rounded shadow-sm">
    <h1 class="display-6 text-danger fw-bold">Data Tidak Ditemukan</h1>
    <p class="lead text-muted mt-3">{{ $error_message ?? 'Maaf, data yang Anda cari tidak tersedia.' }}</p>

    <div class="mt-4 d-flex justify-content-center gap-2">
        <a href="/" class="btn btn-outline-primary">Kembali ke Beranda</a>
    </div>

    <p class="small text-muted mt-3">Jika Anda pemilik situs, pastikan tabel `biodata` sudah memiliki entri dengan ID yang sesuai.</p>
</div>

@endsection
