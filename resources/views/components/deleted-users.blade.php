<x-layout>
    <h2 class="fw-bold">{{ __('deleted_users') }}</h2>
    <p class="text-muted">{{ __('deleted_users_subtitle') }}</p>

    @if($deletedUsers->isEmpty())
        <div class="alert alert-info">{{ __('no_deleted_users') }}</div>
    @else
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('email') }}</th>
                        <th>{{ __('city') }}</th>
                        <th>{{ __('company') }}</th>
                        <th>{{ __('posts') }}</th>
                        <th>{{ __('deleted_at') }}</th>
                        <th>{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deletedUsers as $user)
                    <tr>
                        <td class="fw-bold">{{ $user->name }}</td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->company }}</td>
                        <td><span class="badge bg-secondary">{{ $user->post_count }}</span></td>
                        <td class="text-muted small">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <form action="{{ route('user.restore', $user->user_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm"> {{ __('restore') }}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</x-layout>