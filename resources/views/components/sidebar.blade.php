<div class="d-flex flex-column bg-yellow p-3 h-100 w-100">

    <a class="text-decoration-none d-flex align-items-center gap-2 py-2" href="{{ route('dashboard') }}">
        <img src="{{ asset('images/icons8-adjust-48.png') }}" alt="" width="36" height="36">
        <span>Dashboard</span>
    </a>
    <hr>
    <a class="text-decoration-none d-flex align-items-center gap-2 py-2" href="{{ route('deleted.users') }}">
        <img src="{{ asset('images/icons8-checklist-48.png') }}" alt="" width="36" height="36">
        <span>Utenti eliminati</span>
    </a>
    <hr>
    <a class="text-decoration-none d-flex align-items-center gap-2 py-2" href="">
        <img src="{{ asset('images/icons8-settings-48.png') }}" alt="" width="36" height="36">
        <span>Impostazioni</span>
    </a>
    <hr>
</div>