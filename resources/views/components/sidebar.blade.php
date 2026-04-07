<div class="d-flex flex-column bg-yellow p-3 h-100 w-100">

    <a class="text-decoration-none d-flex align-items-center gap-2 py-2" href="{{ route('dashboard') }}">
        <img src="{{ asset('images/icons8-adjust-48.png') }}" alt="" width="36" height="36">
        <span>{{ __('dashboard') }}</span>
    </a>
    <hr>
    <a class="text-decoration-none d-flex align-items-center gap-2 py-2" href="{{ route('deleted.users') }}">
        <img src="{{ asset('images/icons8-checklist-48.png') }}" alt="" width="36" height="36">
        <span>{{ __('deleted_users') }}</span>
    </a>
    <hr>
    <a class="text-decoration-none d-flex align-items-center gap-2 py-2" href="{{ route('settings') }}">
        <img src="{{ asset('images/icons8-settings-48.png') }}" alt="" width="36" height="36">
        <span>{{ __('settings') }}</span>
    </a>
    <hr>

</div>