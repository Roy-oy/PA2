@extends('layouts.app')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')
@section('page_subtitle', 'Ubah informasi berita')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Information -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Berita</h3>
                    
                    <!-- Judul -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Berita <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('judul') border-red-500 @enderror">
                        @error('judul')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Kategori -->
                    <div class="mb-4">
                        <label for="kategori_berita_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                        <select name="kategori_berita_id" id="kategori_berita_id" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('kategori_berita_id') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoriBerita as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_berita_id', $berita->kategori_berita_id) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_berita_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Tanggal Upload -->
                    <div class="mb-4">
                        <label for="tanggal_upload" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Upload <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_upload" id="tanggal_upload" 
                            value="{{ old('tanggal_upload', $berita->tanggal_upload->format('Y-m-d')) }}" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('tanggal_upload') border-red-500 @enderror">
                        @error('tanggal_upload')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Media Information -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Media dan Konten</h3>
                    
                    <!-- Current Photo -->
                    @if($berita->photo)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</label>
                        <div class="relative">
                            <img src="{{ Storage::url($berita->photo) }}" alt="Current Photo" class="max-w-xs rounded-lg shadow-sm">
                        </div>
                    </div>
                    @endif
                    
                    <!-- Photo Upload -->
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Ganti Foto</label>
                        <input type="file" name="photo" id="photo" accept="image/*"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('photo') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, JPEG. Maksimal 2MB</p>
                        @error('photo')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Preview Image -->
                    <div class="mb-4 hidden" id="imagePreview">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Preview Foto Baru</label>
                        <img src="" alt="Preview" class="max-w-xs rounded-lg shadow-sm">
                    </div>
                </div>
            </div>

            <!-- Isi Berita -->
            <div class="mt-6 bg-gray-50 p-6 rounded-lg shadow-sm">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Isi Berita</h3>
                <div class="mb-4">
                    <label for="isi_berita" class="block text-sm font-medium text-gray-700 mb-1">Konten Berita <span class="text-red-500">*</span></label>
                    <textarea name="isi_berita" id="isi_berita" rows="10" required
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('isi_berita') border-red-500 @enderror">{{ old('isi_berita', $berita->isi_berita) }}</textarea>
                    @error('isi_berita')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('berita.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image preview
        const photoInput = document.getElementById('photo');
        const imagePreview = document.getElementById('imagePreview');
        const previewImage = imagePreview.querySelector('img');

        photoInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endpush