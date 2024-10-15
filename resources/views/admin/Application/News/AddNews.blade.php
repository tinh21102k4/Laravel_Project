@extends('admin.layout.MainAdmin')
@section('content-here')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quản Lý Bài Viết</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ứng dụng</a></li>
                            <li class="breadcrumb-item active">Thêm Bài viết</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('admin.news.addNews') }}" class="row g-3" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="nameTitle" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="nameTitle" name="title" value="{{ old('title') }}"
                    placeholder="Vui lòng nhập tiêu đề">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="content" class="form-label">Nội dung</label>
                <textarea class="form-control" id="content" rows="3" name="content" placeholder="Vui lòng nhập nội dung" >{{ old('content') }}</textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="idCategory" class="form-label">Danh mục</label>
                <select id="idCategory" class="form-select" name="category_id">
                    <option selected>Chọn danh mục...</option>
                    @foreach ($category as $cate)
                        <option value="{{ $cate->id }} " {{ old('category_id') == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="content" class="form-label">Ảnh</label>
                <input type="file" class="form-control" name="img_new[]" id="img_new" accept="image/*" multiple>
                @error('img_new')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Thêm bài viết</button>
                </div>
            </div>
        </form>
    @endsection
