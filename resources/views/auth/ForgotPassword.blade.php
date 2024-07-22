@extends('auth.Main')
@section('contentInHere')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Quên Mật Khẩu ?</h5>
                        <p class="text-muted">Đặt lại mật khẩu với duytinh</p>

                        <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c"
                            class="avatar-xl"></lord-icon>

                    </div>

                    <div class="alert border-0 alert-warning text-center mb-2 mx-2" role="alert">
                        Nhập Email của bạn và hướng dẫn sẽ được gửi cho bạn!
                    </div>
                    <div class="p-2">
                        <form action='{{ route('authSendEmail') }}' method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name='email' placeholder="Nhập Email">

                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-success w-100" type="submit">Gửi Liên Kết đặt lại</button>
                            </div>
                        </form><!-- end form -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Wait, I remember my password... <a href="{{ route('login') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
            </div>

        </div>
    </div>
@endsection
