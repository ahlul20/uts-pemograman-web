<x-layout title="Daftar Biodata - UTS Pem Web">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        {{-- KARTU 1: TAMBAH BIODATA (Tombol + Hijau di tengah) --}}
        <div class="col">
            <div class="card h-100 border rounded-4 shadow-sm bg-white d-flex align-items-center justify-content-center text-center p-4" style="min-height: 480px;">
                <a href="{{ Route::has('biodata.create') ? route('biodata.create') : url('/biodata/create') }}" 
                   class="btn-add-circle" 
                   title="Tambah Biodata Baru"
                   aria-label="Tambah Biodata Baru">
                    +
                </a>
            </div>
        </div>

        {{-- DAFTAR KARTU BIODATA MAHASISWA (Dinamis dari Controller) --}}
        @if (isset($biodatas) && count($biodatas) > 0)
            @foreach ($biodatas as $item)
                @php
                    $fotoUrl = null;
                    $fotoField = $item->foto ?? $item->foto_profil ?? $item->image ?? null;

                    if ($fotoField) {
                        if (str_starts_with($fotoField, 'http://') || str_starts_with($fotoField, 'https://')) {
                            $fotoUrl = $fotoField;
                        } elseif (file_exists(public_path('storage/' . $fotoField))) {
                            $fotoUrl = asset('storage/' . $fotoField);
                        } elseif (file_exists(public_path($fotoField))) {
                            $fotoUrl = asset($fotoField);
                        } else {
                            $fotoUrl = asset('storage/' . $fotoField);
                        }
                    }
                @endphp

                <div class="col">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden bg-white d-flex flex-column">
                        {{-- Foto Profil --}}
                        @if ($fotoUrl)
                            <img src="{{ $fotoUrl }}" 
                                 class="card-profile-img" 
                                 alt="Foto Profil {{ $item->nama ?? 'Mahasiswa' }}">
                        @else
                            <div class="card-profile-img bg-light d-flex align-items-center justify-content-center text-secondary">
                                <i class="bi bi-person-circle display-1 opacity-25"></i>
                            </div>
                        @endif

                        {{-- Konten Biodata --}}
                        <div class="card-body p-4 flex-grow-1">
                            <h5 class="fw-bold text-dark mb-2">
                                {{ $item->nama ?? $item->name ?? '-' }}
                            </h5>

                            {{-- NIM (jika belum tercakup di deskripsi, tampilkan dengan rapi) --}}
                            @if (!empty($item->nim) && !str_contains($item->deskripsi ?? '', (string)$item->nim))
                                <div class="text-secondary small fw-medium mb-1">
                                    NIM: {{ $item->nim }}
                                </div>
                            @endif

                            <p class="text-secondary mb-0" style="font-size: 0.95rem; line-height: 1.5;">
                                {{ $item->deskripsi ?? $item->keterangan ?? $item->description ?? '' }}
                            </p>
                        </div>

                        {{-- Tombol Aksi: Edit & Hapus --}}
                        <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0 d-flex gap-2">
                            {{-- Tombol Edit (Biru) --}}
                            <a href="{{ Route::has('biodata.edit') ? route('biodata.edit', $item->id ?? $item) : url('/biodata/' . ($item->id ?? '') . '/edit') }}" 
                               class="btn btn-action-edit">
                                Edit
                            </a>

                            {{-- Tombol Hapus (Merah) --}}
                            <form action="{{ Route::has('biodata.destroy') ? route('biodata.destroy', $item->id ?? $item) : url('/biodata/' . ($item->id ?? '')) }}" 
                                  method="POST" 
                                  class="d-inline" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus biodata {{ $item->nama ?? '' }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-action-delete">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-layout>
