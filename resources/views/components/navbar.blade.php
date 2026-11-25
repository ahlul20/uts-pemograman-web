<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 border-bottom border-light-subtle">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark me-4" href="{{ Route::has('biodata.index') ? route('biodata.index') : (Route::has('home') ? route('home') : url('/')) }}">
            UTS Pem Web
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#utsNavbar" aria-controls="utsNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="utsNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center gap-1">
                <x-nav-link :href="Route::has('home') ? route('home') : url('/')" :active="request()->is('/') || request()->is('home')">
                    Home
                </x-nav-link>

                <x-nav-link :href="Route::has('features') ? route('features') : '#'" :active="request()->is('features*')">
                    Features
                </x-nav-link>

                <x-nav-link :href="'#'">
                    Ahlul N.R.P (24010110182)
                </x-nav-link>

                <x-nav-link :href="'#'">
                    khaisan amru r (2010110171)
                </x-nav-link>
            </ul>
        </div>
    </div>
</nav>
