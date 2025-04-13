@extends('layouts.app')

@section('title', 'Edit Kategori Berita')
@section('page_title', 'Edit Kategori Berita')
@section('page_subtitle', 'Ubah data kategori berita')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <form action="{{ route('kategori_berita.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="max-w-xl">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Kategori</h3>
                    
                    <!-- Nama Kategori -->
                    <div class="mb-4">
                        <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori <span class="text-red-500">*</span></label>
                        <select name="nama_kategori" id="nama_kategori" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_kategori') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Penyakit dan Pengobatan" {{ old('nama_kategori', $kategori->nama_kategori) == 'Penyakit dan Pengobatan' ? 'selected' : '' }}>Penyakit dan Pengobatan</option>
                            <option value="Gizi dan Kesehatan Keluarga" {{ old('nama_kategori', $kategori->nama_kategori) == 'Gizi dan Kesehatan Keluarga' ? 'selected' : '' }}>Gizi dan Kesehatan Keluarga</option>
                            <option value="Pola Hidup Sehat" {{ old('nama_kategori', $kategori->nama_kategori) == 'Pola Hidup Sehat' ? 'selected' : '' }}>Pola Hidup Sehat</option>
                        </select>
                        @error('nama_kategori')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Slug -->
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug <span class="text-red-500">*</span></label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('slug') border-red-500 @enderror">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Slug akan otomatis terbentuk dari nama kategori</p>
                    </div>
                    
                    <!-- Status -->
                    <div class="mb-4">
                        <label for="is_active" class="block text-sm font-medium text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                        <select name="is_active" id="is_active" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('is_active') border-red-500 @enderror">
                            <option value="1" {{ old('is_active', $category->is_active) ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active', $category->is_active) ? '' : 'selected' }}>Nonaktif</option>
                        </select>
                        @error('is_active')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    @if($category->news_count > 0)
                    <div class="mt-6 p-3 bg-blue-50 rounded-md border border-blue-200">
                        <div class="text-sm text-blue-700">
                            <i class="fas fa-info-circle mr-1"></i>
                            Kategori ini memiliki {{ $category->news_count }} berita terkait.
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('kategori_berita.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    nameInput.addEventListener('input', function() {
        slugInput.value = nameInput.value
            .toLowerCase()
            .replace(/[^a-z0-9-]/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
    });
});
</script>
@endpush
