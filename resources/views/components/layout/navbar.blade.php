<nav class="navbar navbar-expand-lg navbar-light">
  <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
      <li class="nav-item dropdown">
        <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ asset('assets/images/profile/user-4.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
          <div class="message-body">
            <div class="d-flex align-items-center gap-2 px-3 py-2 border-bottom">
              <img src="{{ asset('assets/images/profile/user-4.jpg') }}" alt="" width="40" height="40" class="rounded-circle">
              <div>
                <p class="mb-0 fs-3 fw-semibold">{{ Auth::user()->name ?? 'User' }}</p>
                <small class="text-muted">{{ ucfirst(Auth::user()->role ?? 'User') }}</small>
              </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-user fs-6"></i>
              <p class="mb-0 fs-3">My Profile</p>
            </a>
            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-settings fs-6"></i>
              <p class="mb-0 fs-3">Settings</p>
            </a>
            <div class="dropdown-divider"></div>
            <form method="POST" action="{{ route('logout') }}" class="px-3 py-2">
              @csrf
              <button type="submit" class="btn btn-outline-primary w-100">Logout</button>
            </form>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
