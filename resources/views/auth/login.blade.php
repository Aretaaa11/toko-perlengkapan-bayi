<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" aria-describedby="emailHelp">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input primary" type="checkbox" id="remember_me" name="remember">
                <label class="form-check-label text-dark" for="remember_me">
                    Remember this Device
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="text-primary fw-bold" href="{{ route('password.request') }}">Forgot Password?</a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>

        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Don't have any account?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create an account</a>
        </div>
    </form>
</x-guest-layout>
