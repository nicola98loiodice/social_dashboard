<x-layout>

    <h2 class="fw-bold">{{ __('dashboard') }}</h2>
    <p class="text-muted">{{ __('dashboard_subtitle') }}</p>

    <!-- cards statistiche -->
    <div class="row g-3 mb-4 align-items-stretch" data-aos="fade-up">

        {{-- Totale utenti --}}
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex align-items-center gap-3 h-100">
                    <div class="bg-primary bg-opacity-10 rounded p-2">
                        <img src="{{ asset('images/icons8-test-account-48.png') }}" width="36" height="36" alt="">
                    </div>
                    <div>
                        <p class="text-muted mb-0 small">{{ __('total_users') }}</p>
                        <h3 class="fw-bold mb-0 count-up" data-target="{{ $totalUsers }}">0</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- .com vs .net --}}
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex align-items-center gap-3 h-100">
                    <div class="bg-success bg-opacity-10 rounded p-2">
                        <img src="{{ asset('images/icons8-nuovo-messaggio-48.png') }}" width="36" height="36" alt="">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                        <div class="text-center">
                            <p class="text-muted mb-0 small">.COM</p>
                            <h3 class="fw-bold mb-0">{{ $comCount }}</h3>
                        </div>
                        <div class="vr"></div>
                        <div class="text-center">
                            <p class="text-muted mb-0 small">.NET</p>
                            <h3 class="fw-bold mb-0">{{ $netCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Titolo più lungo --}}
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm p-3 h-100">
                <div class="d-flex align-items-center gap-3 h-100">
                    <div class="bg-warning bg-opacity-10 rounded p-2">
                        <img src="{{ asset('images/icons8-trofeo-48.png') }}" width="28" height="28" alt="">
                    </div>
                    <div>
                        <p class="text-muted mb-0 small">{{ __('longest_post') }}</p>
                        <h3 class="fw-bold mb-0 count-up" data-target="{{ strlen($longestPost['title']) }}">0</h3>
                        <span class="text-muted small">{{ __('characters') }} — {{ $longestPostUser['name']}}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- cerca -->
    <div class="mb-3" data-aos="fade-up">
        <input type="text" id="searchInput" class="form-control" placeholder="{{ __('search_placeholder') }}">
    </div>

    <!-- Tabella -->
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('email') }}</th>
                        <th>{{ __('city') }}</th>
                        <th>{{ __('company') }}</th>
                        <th>{{ __('posts') }}</th>
                        <th>{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-bold">
                                <a href="{{ route('user', $user['id']) }}" class="text-decoration-none">
                                    {{ $user['name'] }}
                                </a>
                            </td>
                            <td class="text-muted">{{ $user['email'] }}</td>
                            <td>{{ $user['address']['city'] }}</td>
                            <td>{{ $user['company']['name'] }}</td>
                            <td><span class="badge bg-secondary">{{ $user['post_count'] }}</span></td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-id="{{ $user['id'] }}"
                                    data-name="{{ $user['name'] }}" data-email="{{ $user['email'] }}"
                                    data-city="{{ $user['address']['city'] }}"
                                    data-company="{{ $user['company']['name'] }}"
                                    data-post-count="{{ $user['post_count'] }}">
                                    {{ __('delete') }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- conf elimina -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">{{ __('confirm_delete') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    {{ __('confirm_delete_msg') }} <strong id="deleteUserName"></strong>?
                    {{ __('irreversible') }}
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('cancel') }}</button>
                    <button type="button" id="confirmDelete" class="btn btn-danger">{{ __('delete') }}</button>
                </div>
            </div>
        </div>
    </div>


</x-layout>