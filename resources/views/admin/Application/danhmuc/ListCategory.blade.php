@extends('admin.Application.danhmuc.MainCategory')
@section('ListCategory')
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
        <table class="table align-middle table-nowrap" id="customerTable">
            <thead class="table-light">
                <tr>
                    <th scope="col" style="width: 50px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                        </div>
                    </th>
                    <th class="sort" data-sort="customer_name">ID</th>
                    <th class="sort" data-sort="email">Tên Danh Mục</th>
                    <th class="sort" data-sort="action">Thao Tác</th>
                </tr>
            </thead>
            <tbody class="list form-check-all">
                @foreach ($category as $cate)
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                            </div>
                        </th>
                        <td class="customer_name">{{ $cate->id }}</td>
                        <td class="email">{{ $cate->name }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <div class="edit">
                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal"
                                        data-bs-target="#editcate" data-id="{{ $cate->id }}"> Sửa
                                    </button>
                                </div>
                                <div class="remove">
                                    <button class="btn btn-sm btn-danger remove-item-btn" data-id="{{ $cate->id }}"
                                        data-bs-toggle="modal" data-bs-target="#deleteRecordModal"> Xóa </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <div class="pagination-wrap hstack gap-2">
            @if ($category->onFirstPage())
                <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                    Previous
                </a>
            @else
                <a class="page-item pagination-prev" href="{{ $category->previousPageUrl() }}">
                    Previous
                </a>
            @endif

            <ul class="pagination listjs-pagination mb-0">
                @if ($category->currentPage() > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $category->url(1) }}">1</a>
                    </li>
                    @if ($category->currentPage() > 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endif

                <li class="page-item active">
                    <a class="page-link" href="javascript:void(0);">{{ $category->currentPage() }}</a>
                </li>

                @if ($category->currentPage() < $category->lastPage() - 1)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                @if ($category->currentPage() < $category->lastPage())
                    <li class="page-item">
                        <a class="page-link"
                            href="{{ $category->url($category->lastPage()) }}">{{ $category->lastPage() }}</a>
                    </li>
                @endif
            </ul>

            @if ($category->hasMorePages())
                <a class="page-item pagination-next" href="{{ $category->nextPageUrl() }}">
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
