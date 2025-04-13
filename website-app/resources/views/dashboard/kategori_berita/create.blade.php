@extends('layouts.app')

@section('title', 'Tambah Kategori Berita')
@section('page_title', 'Tambah Kategori Berita')
@section('page_subtitle', 'Buat kategori berita baru')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <form action="{{ route('kategori_berita.store') }}" method="POST">
            @csrf
            <div class="max-w-xl">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Kategori</h3>
                    
                    <!-- Nama Kategori -->
                    <div class="mb-4">
                        <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori <span class="text-red-500">*</span></label>
                        <select name="nama_kategori" id="nama_kategori" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_kategori') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Penyakit dan Pengobatan" {{ old('nama_kategori') == 'Penyakit dan Pengobatan' ? 'selected' : '' }}>Penyakit dan Pengobatan</option>
                            <option value="Gizi dan Kesehatan Keluarga" {{ old('nama_kategori') == 'Gizi dan Kesehatan Keluarga' ? 'selected' : '' }}>Gizi dan Kesehatan Keluarga</option>
                            <option value="Pola Hidup Sehat" {{ old('nama_kategori') == 'Pola Hidup Sehat' ? 'selected' : '' }}>Pola Hidup Sehat</option>
                        </select>
                        @error('nama_kategori')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('kategori_berita.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
