<div class="home">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6 dark-canvas">
        <div class="home-text">
          <h2><strong>Selamat Datang di Halaman Home</strong></h2>
          @if (auth()->user()->avatar)
            <img src="{{ asset('storage/files/avatars/' . auth()->user()->avatar) }}"
              style="height: 300px; width: 200px; object-fit: cover;  border: 5px solid #d7d7d7;"
              alt="{{ $user->avatar }}">
            <p class="user_data">
              Halo {{ $user->nama_user }}, kamu login sebagai {{ ucfirst(auth()->user()->role) }}.
            </p>
          @else
            <p>No information available</p>
          @endif
        </div>
      </div>
      <div class="col">
      </div>
    </div>
  </div>
</div>
