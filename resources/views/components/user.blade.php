<x-layout>

    <div class="d-flex align-items-center justify-content-between gap-2 mb-4">
        <h2 class="fw-bold mb-0">{{ $user['name'] }}</h2>
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary ">← Torna alla Dashboard</a>
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
                    <li class="mb-2"><span class="text-muted">Username:</span>
                        <strong>{{ $user['username'] }}</strong>
                    </li>
                    <li class="mb-2"><span class="text-muted">Email:</span> <strong>{{ $user['email'] }}</strong></li>
                    <li class="mb-2"><span class="text-muted">Telefono:</span> <strong>{{ $user['phone'] }}</strong>
                    </li>
                    <li class="mb-2"><span class="text-muted">Sito:</span> <strong>{{ $user['website'] }}</strong>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h5 class="fw-bold mb-3">Indirizzo</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><span class="text-muted">Via:</span> <strong>{{ $user['address']['street'] }},
                            {{ $user['address']['suite'] }}</strong></li>
                    <li class="mb-2"><span class="text-muted">Città:</span>
                        <strong>{{ $user['address']['city'] }}</strong>
                    </li>
                    <li class="mb-2"><span class="text-muted">CAP:</span>
                        <strong>{{ $user['address']['zipcode'] }}</strong>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold mb-3">Azienda</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><span class="text-muted">Nome:</span>
                        <strong>{{ $user['company']['name'] }}</strong>
                    </li>
                    <li class="mb-2"><span class="text-muted">Slogan:</span>
                        <strong>{{ $user['company']['catchPhrase'] }}</strong>
                    </li>
                    <li class="mb-2"><span class="text-muted">Settore:</span>
                        <strong>{{ $user['company']['bs'] }}</strong>
                    </li>
                </ul>
            </div>
        </div>

        {{-- statistiche task con torta --}}
    <div class="col-12 col-md-6 ">
        <div class="card border-0 shadow-sm p-4">
            <h5 class="fw-bold mb-3 text-center">Stato Task</h5>

            <div class="d-flex justify-content-center">
                <div class="torta" style="--p: {{ $completedPerc }}%;">
                    <span class="fw-bold h4 m-0">{{ $completedPerc }}%</span>
                </div>
            </div>

            <div class="d-flex justify-content-around mt-4">
                <div class="text-center">
                    <span class="d-block fw-bold text-success">{{ $todosCompleted }}</span>
                    <span class="text-muted small">Completati</span>
                </div>
                <div class="text-center">
                    <span class="d-block fw-bold text-danger">{{ $todosPending }}</span>
                    <span class="text-muted small">In sospeso</span>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- statistiche task --}}
    {{-- <div class="col-12">
    <div class="card border-0 shadow-sm p-4">
        <h5 class="fw-bold mb-3">Task</h5>
        <div class="d-flex justify-content-between mb-2">
            <span class="text-muted small">Completati: <strong>{{ $todosCompleted }}</strong></span>
            <span class="text-muted small">In sospeso: <strong>{{ $todosPending }}</strong></span>
            <span class="text-muted small">Totale: <strong>{{ $todosTotal }}</strong></span>
        </div>
        <div class="progress" style="height: 24px;">
            <div class="progress-bar bg-success" style="width: {{ $completedPerc }}%">
                {{ $completedPerc }}% completati
            </div>
            <div class="progress-bar bg-danger" style="width: {{ 100 - $completedPerc }}%">
                {{ 100 - $completedPerc }}% in sospeso
            </div>
        </div>
    </div>
</div> --}}


</x-layout>
