@extends('Admin.main')
@section('title', 'Edit Data Hero')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/Admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('Admin.HeroSection.update', $heroSection->id_hero_sections) }}" method="post"
                                    enctype='multipart/form-data'>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="header" class="form-label">Header Home</label>
                                        <input type="text" class="form-control" id="header" name="header" value ="{{$heroSection->header}}" required>
                                        @error('header')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="paragraph" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="summernote" name="paragraph" rows="4">{!! $heroSection->paragraph !!}</textarea>
                                        @error('paragraph')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
