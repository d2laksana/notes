@extends('master')

@section('login')
<div class="row align-items-center justify-content-center vh-100">
    <div class="card col-lg-4 shadow p-4">
        <div class="card-body">
            <div class="dropdown mb-4 start-100">
                <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i>
                </button>
                <ul class=" dropdown-menu dropdown-menu-end">
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button"
                            data-bs-theme-value="light">
                            <i class="bi bi-sun-fill me-2 opacity-50" data-theme-icon="bi-sun-fill"></i>
                            Light
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button"
                            data-bs-theme-value="dark">
                            <i class="bi bi-moon-fill me-2 opacity-50" data-theme-icon="bi-moon-fill"></i>
                            Dark
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button"
                            data-bs-theme-value="auto">
                            <i class="bi bi-circle-half me-2 opacity-50" data-theme-icon="bi-circle-half"></i>
                            Auto
                        </button>
                    </li>
                </ul>
            </div>
            <form action="/auth" method="POST">
                @csrf
                <h3 class="text-center">Login In</h3>
                <hr>
                @if($errors->any())
                <div class="alert alert-danger fade show" role="alert">
                  <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              {{-- success --}}
              @if(session('success'))
                <div class="alert alert-success fade show" role="alert">
                  {{ session('success') }}
                </div>
              @endif
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">
                        <p>Remember me</p>
                    </label>
                </div>
                <button type="submit"
                    class="btn btn-primary position-relative mt-5 start-50 translate-middle mt-2">Login
                </button>
                <div class="register mt-2 text-center">
                    <p>Belum punya akun?<a href="/register">Register</a></p>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection