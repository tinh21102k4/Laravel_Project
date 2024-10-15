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
                            <li class="breadcrumb-item active">Cập nhật Bài viết</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('admin.news.editNews', $detail->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title', $detail->title) }}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control">{{ old('content', $detail->content) }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ $detail->category->id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <div class="form-group">
                <label for="img_new">Upload New Images</label>
                <input type="file" name="img_new[]" class="form-control" multiple>
            </div>
            <div class="form-group">
                <div class="current-images">
                    @foreach($detail->images as $image)
                        <img src="{{ asset('storage/' . $image->img_url) }}" alt="Image" width="150">
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-success">Update News</button>
        </form>
    @endsection
