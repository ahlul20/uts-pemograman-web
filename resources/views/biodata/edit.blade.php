<x-layout title="Edit Biodata - UTS Pem Web">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-7">
            <div class="card border rounded-4 shadow-sm bg-white overflow-hidden">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="fw-bold mb-0 text-dark">Edit Biodata Mahasiswa</h5>
                </div>

                <div class="card-body p-4">
                    @php
                        $id = $biodata->id ?? null;
                        $actionUrl = Route::has('biodata.update') 
                            ? route('biodata.update', $id) 
                            : url('/biodata/' . $id);
                    @endphp

                    <form action="{{ $actionUrl }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Input Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold text-dark">Nama Mahasiswa <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama" 
                                   id="nama" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   value="{{ old('nama', $biodata->nama ?? $biodata->name ?? '') }}" 
                                   placeholder="Masukkan nama lengkap" 
                                   required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input NIM --}}
                        <div class="mb-3">
                            <label for="nim" class="form-label fw-semibold text-dark">NIM <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nim" 
                                   id="nim" 
                                   class="form-control @error('nim') is-invalid @enderror" 
                                   value="{{ old('nim', $biodata->nim ?? '') }}" 
                                   placeholder="Contoh: 12.11.5866" 
                                   required>
                            @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Deskripsi --}}
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-semibold text-dark">Deskripsi / Keterangan <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" 
                                      id="deskripsi" 
                                      rows="4" 
                                      class="form-control @error('deskripsi') is-invalid @enderror" 
                                      placeholder="Deskripsi tugas atau keterangan mahasiswa" 
                                      required>{{ old('deskripsi', $biodata->deskripsi ?? $biodata->keterangan ?? '') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Foto Lama dan Input Foto Baru --}}
                        <div class="mb-4">
                            <label for="foto" class="form-label fw-semibold text-dark">Foto Profil</label>

                            @php
                                $fotoLama = $biodata->foto ?? $biodata->foto_profil ?? $biodata->image ?? null;
                                $fotoLamaUrl = null;
                                if ($fotoLama) {
                                    if (str_starts_with($fotoLama, 'http://') || str_starts_with($fotoLama, 'https://')) {
                                        $fotoLamaUrl = $fotoLama;
                                    } elseif (file_exists(public_path('storage/' . $fotoLama))) {
                                        $fotoLamaUrl = asset('storage/' . $fotoLama);
                                    } elseif (file_exists(public_path($fotoLama))) {
                                        $fotoLamaUrl = asset($fotoLama);
                                    } else {
                                        $fotoLamaUrl = asset('storage/' . $fotoLama);
                                    }
                                }
                            @endphp

                            @if ($fotoLamaUrl)
                                <div class="mb-2">
                                    <div class="small text-muted mb-1">Foto saat ini:</div>
                                    <img src="{{ $fotoLamaUrl }}" 
                                         alt="Foto Lama" 
                                         class="img-thumbnail rounded-3" 
                                         style="max-height: 140px; object-fit: cover;">
                                </div>
                            @endif

                            <input type="file" 
                                   name="foto" 
                                   id="foto" 
                                   class="form-control @error('foto') is-invalid @enderror" 
                                   accept="image/*">
                            <div class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto profil.</div>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-between align-items-center pt-2">
                            <a href="{{ Route::has('biodata.index') ? route('biodata.index') : url('/biodata') }}" 
                               class="btn btn-outline-secondary px-4">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-4 fw-medium">
                                Perbarui Biodata
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
