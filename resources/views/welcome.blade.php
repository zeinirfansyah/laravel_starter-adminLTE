@extends('layouts.app')

@section('content')
  <!-- if auth -->
  @auth
    @includeif('customer.home')
  @else
  <div class="container">
   <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-3">
        <div class="alert alert-success" role="alert">
          You are not logged in!
        </div>
      </div>
    </div>
   </div>
  </div>
  @endauth
@endsection
