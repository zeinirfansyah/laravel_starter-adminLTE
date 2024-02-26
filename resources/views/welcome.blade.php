@extends('layouts.app')

@section('content')
  <!-- if auth -->
  @auth
    @includeif('customer.home')
  @else
    <div class="alert alert-success" role="alert">
      You are not logged in!
    </div>
  @endauth
@endsection
