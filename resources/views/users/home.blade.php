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

            <div class="image">
                @if (auth()->user()->avatar)
                  @if (auth()->user()->avatar === 'default_avatar.jpg')
                    <img src="{{ asset('images/' . auth()->user()->avatar) }}"
                      style="height: 50px; width: 50px; border-radius: 10px; object-fit: cover">
                  @else
                    <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}"
                      style="height: 50px; width: 50px; border-radius: 10px; object-fit: cover"
                      alt="{{ auth()->user()->avatar }}">
                  @endif
                @else
                  <img src="{{ asset('images/default_avatar.jpg') }}"
                    style="height: 50px; width: 50px; border-radius: 10px; object-fit: cover">
                @endif
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
