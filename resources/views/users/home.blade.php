@extends('layouts.app') @section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <h2>Kamu login sebagai User</h2>

            @if (auth()->user()->avatar)
              <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}" style="height: 100px; width: 100px; border-radius: 50% 50%; object-fit: cover">
            @else
              <img src="#" class="img-circle elevation-2" alt="User Image" />
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
