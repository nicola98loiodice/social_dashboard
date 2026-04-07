<x-layout>
    <h2 class="fw-bold">{{ __('settings') }}</h2>
    <p class="text-muted">{{ __('settings_subtitle') }}</p>

    @if (session('success'))
        <div class="alert alert-success">{{ __('settings_saved') }}</div>
    @endif

    <div class="card border-0 shadow-sm p-4" style="max-width: 400px;">
        <h5 class="fw-bold mb-3">{{ __('language') }}</h5>
        <form action="{{ route('settings.language') }}" method="POST">
            @csrf
            <div class="d-flex gap-3 mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="language" value="it"
                        {{ session('locale', 'it') === 'it' ? 'checked' : '' }}>
                    <img src="{{ asset('images/icons8-italy-48.png') }}" alt="" width="36" height="36">
                    {{-- <label class="form-check-label">Italiano</label> --}}
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="language" value="en"
                        {{ session('locale') === 'en' ? 'checked' : '' }}>
                    <img src="{{ asset('images/icons8-gran-bretagna-48.png') }}" alt="" width="36"
                        height="36">
                    {{-- <label class="form-check-label">English</label> --}}
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
        </form>
    </div>

</x-layout>
