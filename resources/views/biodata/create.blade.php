<x-layout title="Tambah Biodata - UTS Pem Web">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-7">
            <div class="card border rounded-4 shadow-sm bg-white overflow-hidden">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="fw-bold mb-0 text-dark">Tambah Biodata Mahasiswa</h5>
                </div>

                <div class="card-body p-4">
                    <form action="{{ Route::has('biodata.store') ? route('biodata.store') : url('/biodata') }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf

                        {{-- Input Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold text-dark">Nama Mahasiswa <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama" 
                                   id="nama" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   value="{{ old('nama') }}" 
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
                                   value="{{ old('nim') }}" 
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
                                      placeholder="Contoh: 12.11.5866 merupakan master dari uts ini dengan tugas membuat front-end dan mengirimkannya ke grup" 
                                      required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Foto Profil --}}
                        <div class="mb-4">
                            <label for="foto" class="form-label fw-semibold text-dark">Foto Profil</label>
                            <input type="file" 
                                   name="foto" 
                                   id="foto" 
                                   class="form-control @error('foto') is-invalid @enderror" 
                                   accept="image/*">
                            <div class="form-text text-muted">Format: JPG, JPEG, PNG, WEBP (Maksimal 2MB)</div>
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
                            <button type="submit" class="btn btn-success px-4 fw-medium">
                                Simpan Biodata
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
