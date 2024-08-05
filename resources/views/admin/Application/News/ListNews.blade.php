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
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                    value="option1">
                                            </div>
                                        </th>

                                        <td>{{ $new->title }}</td>
                                        <td>{{ Str::limit($new->content, 150) }}</td>
                                        <td>{{ $new->category->name }}</td>
                                        @foreach ($new->images as $img)
                                            <td><img src="{{ $img->img_url }} " width="100" height="100"
                                                    alt="Hình ảnh"></td>
                                            <td>                                           
                                        @endforeach
                                        
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="#!" class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a>
                                                    </li>
                                                    <li><a class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        @if ($new->trashed())
                                                            <form action="{{ route('admin.news.restore', $new->id) }}"
                                                                method="POST" >
                                                                @csrf
                                                                <button class="dropdown-item remove-item-btn" type="submit"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Restore</button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('admin.news.delNews', $new->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="dropdown-item remove-item-btn" type="submit"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</button>
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
