<x-layout>
    <div class="container-fluid">

        {{-- Hero --}}
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-12">
                <h1 class="fw-bold display-5">{{ __('welcome_title') }}</h1>
                <p class="text-muted fs-5">{{ __('welcome_subtitle') }}</p>
            </div>
        </div>

{{-- card per servizi --}}
        <div class="row g-3" data-aos="fade-up">

            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <img src="{{ asset('images/icons8-test-account-48.png') }}" width="36" height="36" alt="" class="mb-3">
                    <h5 class="fw-bold">{{ __('feature_users_title') }}</h5>
                    <p class="text-muted small mb-0">{{ __('feature_users_desc') }}</p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <img src="{{ asset('images/icons8-nuovo-messaggio-48.png') }}" width="36" height="36" alt="" class="mb-3">
                    <h5 class="fw-bold">{{ __('feature_insights_title') }}</h5>
                    <p class="text-muted small mb-0">{{ __('feature_insights_desc') }}</p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <img src="{{ asset('images/icons8-checklist-48.png') }}" width="36" height="36" alt="" class="mb-3">
                    <h5 class="fw-bold">{{ __('feature_management_title') }}</h5>
                    <p class="text-muted small mb-0">{{ __('feature_management_desc') }}</p>
                </div>
            </div>

        </div>

    </div>
</x-layout>