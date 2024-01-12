@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Register") }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label
                                for="nama"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Nama") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="nama"
                                    type="text"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    required
                                    autocomplete="nama"
                                    autofocus
                                />

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="nomor_telpon"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Nomor_telpon") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="nomor_telpon"
                                    type="text"
                                    class="form-control @error('nomor_telpon') is-invalid @enderror"
                                    name="nomor_telpon"
                                    value="{{ old('nomor_telpon') }}"
                                    required
                                    autocomplete="nomor_telpon"
                                    autofocus
                                />

                                @error('nomor_telpon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="alamat"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Alamat") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="alamat"
                                    type="text"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat"
                                    value="{{ old('alamat') }}"
                                    required
                                    autocomplete="alamat"
                                    autofocus
                                />

                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="username"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Username") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="username"
                                    type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    name="username"
                                    value="{{ old('username') }}"
                                    required
                                    autocomplete="username"
                                    autofocus
                                />

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="email"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Email Address") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                />

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="password"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Password") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                />

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="password-confirm"
                                class="col-md-4 col-form-label text-md-end"
                                >{{ __("Confirm Password") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                />
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __("Register") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
