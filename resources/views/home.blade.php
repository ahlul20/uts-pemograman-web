<x-layout title="Home - UTS Pemrograman Web">
    <div class="row align-items-center py-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-5 fw-bold text-dark mb-3">Selamat Datang di UTS Pem Web</h1>
            <p class="lead text-secondary mb-4">
                Sistem Pengelolaan Biodata Mahasiswa untuk Ujian Tengah Semester (UTS) Pemrograman Web.
                Halaman ini dibuat dengan Laravel Blade dan Bootstrap 5 dengan arsitektur Front-End berbasis komponen yang reusable dan responsif.
            </p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a href="{{ Route::has('biodata.index') ? route('biodata.index') : url('/biodata') }}" class="btn btn-primary btn-lg px-4 gap-3 fw-semibold">
                    <i class="bi bi-people-fill me-2"></i> Lihat Daftar Biodata
                </a>
                <a href="{{ Route::has('biodata.create') ? route('biodata.create') : url('/biodata/create') }}" class="btn btn-success btn-lg px-4 fw-semibold">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Biodata Baru
                </a>
            </div>
        </div>
    </div>
</x-layout>
