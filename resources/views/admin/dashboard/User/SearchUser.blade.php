@extends('admin.dashboard.UserManager')
@section('ListUser')
<div class="table-responsive table-card mt-3 mb-1">
    <table class="table align-middle table-nowrap" id="customerTable">
        <thead class="table-light">
            <tr>
                <th scope="col" style="width: 50px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkAll"
                            value="option">
                    </div>
                </th>
                <th class="sort" data-sort="customer_name">Họ & Tên</th>
                <th class="sort" data-sort="email">Email</th>
                <th class="sort" data-sort="phone">Ngày Tạo</th>
                <th class="sort" data-sort="date">Ngày Cập Nhật</th>
                <th class="sort" data-sort="status">Quyền Người Dùng</th>
                <th class="sort" data-sort="action">Thao Tác</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @foreach ($user as $u)
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="chk_child"
                                value="option1">
                        </div>
                    </th>
                    {{-- <td class="id" style="display:none;"><a href="javascript:void(0);"
                    class="fw-medium link-primary">#VZ2101</a></td> --}}
                    <td class="customer_name">{{ $u->name }}</td>
                    <td class="email">{{ $u->email }}</td>
                    <td class="phone">{{ $u->created_at->format('d/m/Y H:i:s') }}</td>
                    <td class="date">{{ $u->updated_at->format('d/m/Y H:i:s') }}</td>
                    @if ($u->role == 1)
                        <td class="status"><span
                                class="badge bg-danger-subtle text-danger text-uppercase">Admin</span>
                        </td>
                    @elseif($u->role == 2)
                        <td class="status"><span
                                class="badge bg-success-subtle text-success text-uppercase">Khách
                                Hàng</span>
                        </td>
                    @endif
                    <td>
                        <div class="d-flex gap-2">
                            <div class="edit">
                                <button class="btn btn-sm btn-success edit-item-btn"
                                    data-bs-toggle="modal" data-bs-target="#editUser"> Sửa
                                </button>
                            </div>
                            <div class="remove">
                                <button class="btn btn-sm btn-danger remove-item-btn"
                                    data-id="{{ $u->id }}" data-bs-toggle="modal"
                                    data-bs-target="#deleteRecordModal"> Xóa </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="noresult" style="display: none">
        <div class="text-center">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                colors="primary:#121331,secondary:#08a88a"
                style="width:75px;height:75px"></lord-icon>
            <h5 class="mt-2">Sorry! No Result Found</h5>
            <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                orders for you search.</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end">
    <div class="pagination-wrap hstack gap-2">
        @if ($user->onFirstPage())
            <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                Previous
            </a>
        @else
            <a class="page-item pagination-prev" href="{{ $user->previousPageUrl() }}">
                Previous
            </a>
        @endif

        <ul class="pagination listjs-pagination mb-0">
            @if ($user->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $user->url(1) }}">1</a>
                </li>
                @if ($user->currentPage() > 2)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
            @endif

            <li class="page-item active">
                <a class="page-link"
                    href="javascript:void(0);">{{ $user->currentPage() }}</a>
            </li>

            @if ($user->currentPage() < $user->lastPage() - 1)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            @if ($user->currentPage() < $user->lastPage())
                <li class="page-item">
                    <a class="page-link"
                        href="{{ $user->url($user->lastPage()) }}">{{ $user->lastPage() }}</a>
                </li>
            @endif
        </ul>

        @if ($user->hasMorePages())
            <a class="page-item pagination-next" href="{{ $user->nextPageUrl() }}">
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