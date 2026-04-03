<x-layout>

    <div class="d-flex align-items-center gap-2 mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary">← Torna alla Dashboard</a>
        <h2 class="fw-bold mb-0">{{ $user['name'] }}</h2>
    </div>

    <!-- Stat Cards -->
    <div class="row g-3 mb-4 align-items-stretch">

        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3 h-100">
                <p class="text-muted small mb-1">Post</p>
                <h3 class="fw-bold mb-0">{{ $postCount }}</h3>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3 h-100">
                <p class="text-muted small mb-1">Album</p>
                <h3 class="fw-bold mb-0">{{ $albumCount }}</h3>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3 h-100">
                <p class="text-muted small mb-1">Foto</p>
                <h3 class="fw-bold mb-0">{{ $photoCount }}</h3>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3 h-100">
                <p class="text-muted small mb-1">Foto per Album</p>
                <h3 class="fw-bold mb-0">{{ $albumCount > 0 ? round($photoCount / $albumCount) : 0 }}</h3>
            </div>
        </div>

    </div>

    <!-- Dettagli Utente -->
    <div class="row g-3">

        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h5 class="fw-bold mb-3">Informazioni personali</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><span class="text-muted">Username:</span> <strong>{{ $user['username'] }}</strong></li>
                    <li class="mb-2"><span class="text-muted">Email:</span> <strong>{{ $user['email'] }}</strong></li>
                    <li class="mb-2"><span class="text-muted">Telefono:</span> <strong>{{ $user['phone'] }}</strong></li>
                    <li class="mb-2"><span class="text-muted">Sito:</span> <strong>{{ $user['website'] }}</strong></li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h5 class="fw-bold mb-3">Indirizzo</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><span class="text-muted">Via:</span> <strong>{{ $user['address']['street'] }}, {{ $user['address']['suite'] }}</strong></li>
                    <li class="mb-2"><span class="text-muted">Città:</span> <strong>{{ $user['address']['city'] }}</strong></li>
                    <li class="mb-2"><span class="text-muted">CAP:</span> <strong>{{ $user['address']['zipcode'] }}</strong></li>
                </ul>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold mb-3">Azienda</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><span class="text-muted">Nome:</span> <strong>{{ $user['company']['name'] }}</strong></li>
                    <li class="mb-2"><span class="text-muted">Slogan:</span> <strong>{{ $user['company']['catchPhrase'] }}</strong></li>
                    <li class="mb-2"><span class="text-muted">Settore:</span> <strong>{{ $user['company']['bs'] }}</strong></li>
                </ul>
            </div>
        </div>

    </div>

</x-layout>