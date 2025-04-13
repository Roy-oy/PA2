@extends('layouts.app')

@section('title', 'Edit Pengumuman')
@section('page_title', 'Edit Pengumuman')
@section('page_subtitle', 'Ubah data pengumuman')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Information -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pengumuman</h3>
                    
                    <!-- Judul -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Pengumuman <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $pengumuman->judul) }}" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('judul') border-red-500 @enderror">
                        @error('judul')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Isi Pengumuman -->
                    <div class="mb-4">
                        <label for="isi_pengumuman" class="block text-sm font-medium text-gray-700 mb-1">Isi Pengumuman <span class="text-red-500">*</span></label>
                        <textarea name="isi_pengumuman" id="isi_pengumuman" rows="5" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('isi_pengumuman') border-red-500 @enderror">{{ old('isi_pengumuman', $pengumuman->isi_pengumuman) }}</textarea>
                        @error('isi_pengumuman')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Additional Information -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Tambahan</h3>
                    
                    <!-- Tanggal Upload -->
                    <div class="mb-4">
                        <label for="tanggal_upload" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Upload <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_upload" id="tanggal_upload" 
                        value="{{ old('tanggal_upload', $pengumuman->tanggal_upload) }}" required
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('tanggal_upload') border-red-500 @enderror">
                        @error('tanggal_upload')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- File Surat -->
                    <div class="mb-4">
                        <label for="file_surat" class="block text-sm font-medium text-gray-700 mb-1">File Surat</label>
                        <input type="file" name="file_surat" id="file_surat" 
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('file_surat') border-red-500 @enderror">
                        @error('file_surat')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        
                        @if($pengumuman->file_surat)
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">File saat ini:</p>
                            <a href="{{ Storage::url($pengumuman->file_surat) }}" target="_blank" 
                               class="text-blue-600 hover:underline text-sm">
                                <i class="fas fa-file-download mr-1"></i>
                                Lihat file yang diunggah
                            </a>
                        </div>
                        @endif
                        <p class="mt-1 text-xs text-gray-500">Format yang diperbolehkan: PDF, DOC, DOCX. Maksimal 2MB</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('pengumuman.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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