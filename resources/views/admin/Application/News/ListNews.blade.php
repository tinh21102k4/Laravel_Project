@extends('admin.Application.News.MainNews')
@section('ListNews')
    <div class="table-responsive table-card mt-3 mb-1">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-warning">
                {{ session('delete') }}
            </div>
        @endif
        <div class="row g-4 mb-3 ms-2">
            <div class="col-sm-auto">
                <button class="btn btn-success">
                    <a href="{{ route('admin.news.addNews') }}" class=" add-btn"><i
                            class="ri-add-line align-bottom me-1"></i> Thêm Bài viết</a>
                    <button class="btn btn-soft-danger"><i class="ri-delete-bin-2-line"></i></button>
                </button>
            </div>
            <div class="col-sm">
                <div class="d-flex justify-content-sm-end">
                    <div class="search-box ms-2">
                        <form action="" method="GET">
                            @csrf
                            <input type="text" class="form-control search" name="searchUser"
                                placeholder="Tìm Kiếm Bài viết..." id="search-input">
                            <i class="ri-search-line search-icon"></i>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px;">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                                value="option">
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Tiêu Đề </th>
                                    <th>Nội Dung</th>
                                    <th>Danh Mục</th>
                                    <th>ảnh </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $new)
                                    <tr>
                                        <td scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                    value="option1">
                                            </div>
                                        </td>
                                        <td>{{ $new->id }}</td>
                                        <td>{{ $new->title }}</td>
                                        <td>{{ Str::limit($new->content, 150) }}</td>
                                        <td>{{ $new->category->name }}</td>
                                        <td>
                                            @if ($new->images)
                                                @foreach ($new->images as $image)
                                                    <img src="{{ asset('storage/' . $image->img_url) }}" alt="Image for "
                                                        width="150">
                                                @endforeach
                                            @else
                                                <p>No images available for this news.</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{ route('admin.news.detailNews', $new->id) }}" class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a>
                                                    </li>
                                                    <li><a class="dropdown-item edit-item-btn" href="{{ route('admin.news.detailNews', $new->id) }}"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        @if ($new->trashed())
                                                            <form action="{{ route('admin.news.restore', $new->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="dropdown-item remove-item-btn"
                                                                    type="submit"><i
                                                                        class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Restore</button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('admin.news.delNews', $new->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="dropdown-item remove-item-btn"
                                                                    type="submit"><i
                                                                        class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</button>
                                                            </form>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>

    <div class="d-flex justify-content-end">
        <div class="pagination-wrap hstack gap-2">
            @if ($news->onFirstPage())
                <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                    Previous
                </a>
            @else
                <a class="page-item pagination-prev" href="{{ $news->previousPageUrl() }}">
                    Previous
                </a>
            @endif

            <ul class="pagination listjs-pagination mb-0">
                @if ($news->currentPage() > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $news->url(1) }}">1</a>
                    </li>
                    @if ($news->currentPage() > 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endif

                <li class="page-item active">
                    <a class="page-link" href="javascript:void(0);">{{ $news->currentPage() }}</a>
                </li>

                @if ($news->currentPage() < $news->lastPage() - 1)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                @if ($news->currentPage() < $news->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $news->url($news->lastPage()) }}">{{ $news->lastPage() }}</a>
                    </li>
                @endif
            </ul>

            @if ($news->hasMorePages())
                <a class="page-item pagination-next" href="{{ $news->nextPageUrl() }}">
                    Next
                </a>
            @else
                <a class="page-item pagination-next disabled" href="javascript:void(0);">
                    Next
                </a>
            @endif
        </div>
    </div>
@endsection
