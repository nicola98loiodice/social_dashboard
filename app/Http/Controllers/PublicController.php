<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\DeletedUser;


class PublicController extends Controller
{
 
      public function homepage()
    {
        return view('welcome');
    }

    //  recupero i dati una volta sola (accessibili solo nella classe)
    private function fetchAllData(): array
    {
        return Cache::remember('jsonplaceholder_data', now()->addMinutes(10), function () {
            $responses = Http::pool(fn($pool) => [
                $pool->get('https://jsonplaceholder.typicode.com/users'),
                $pool->get('https://jsonplaceholder.typicode.com/posts'),
                $pool->get('https://jsonplaceholder.typicode.com/albums'),
                $pool->get('https://jsonplaceholder.typicode.com/photos'),
                $pool->get('https://jsonplaceholder.typicode.com/todos'),
            ]);

            return [
                'users'  => $responses[0]->json(),
                'posts'  => $responses[1]->json(),
                'albums' => $responses[2]->json(),
                'photos' => $responses[3]->json(),
                'todos'  => $responses[4]->json(),
            ];
        });
    }

    // dashboard 
    public function dashboard()
    {
        $data  = $this->fetchAllData();
        $posts = collect($data['posts']);

        $postCounts = $posts->groupBy('userId')->map->count();

        $users = collect($data['users'])->map(function ($user) use ($postCounts) {
            $user['post_count'] = $postCounts->get($user['id'], 0);
            return $user;
        });

        $comCount = $users->filter(fn($u) => str_ends_with($u['email'], '.com'))->count();
        $netCount = $users->filter(fn($u) => str_ends_with($u['email'], '.net'))->count();

        $longestPost     = $posts->sortByDesc(fn($p) => strlen($p['title']))->first();
        $longestPostUser = $users->firstWhere('id', $longestPost['userId']);

        return view('components.dashboard', [
            'users'           => $users,
            'totalUsers'      => $users->count(),
            'comCount'        => $comCount,
            'netCount'        => $netCount,
            'longestPost'     => $longestPost,
            'longestPostUser' => $longestPostUser,
        ]);
    }

    // dettagli utente
    public function user($id)
    {
        $data   = $this->fetchAllData();
        $id     = (int)$id;

        $user       = collect($data['users'])->firstWhere('id', $id);
        $postCount  = collect($data['posts'])->where('userId', $id)->count();

        $userAlbums = collect($data['albums'])->where('userId', $id);
        $albumCount = $userAlbums->count();
        $photoCount = collect($data['photos'])->whereIn('albumId', $userAlbums->pluck('id'))->count();

        $userTodos      = collect($data['todos'])->where('userId', $id);
        $todosTotal     = $userTodos->count();
        $todosCompleted = $userTodos->where('completed', true)->count();
        $todosPending   = $todosTotal - $todosCompleted;
        $completedPerc  = $todosTotal > 0 ? round(($todosCompleted / $todosTotal) * 100) : 0;

        return view('components.user', [
            'user'           => $user,
            'postCount'      => $postCount,
            'albumCount'     => $albumCount,
            'photoCount'     => $photoCount,
            'todosTotal'     => $todosTotal,
            'todosCompleted' => $todosCompleted,
            'todosPending'   => $todosPending,
            'completedPerc'  => $completedPerc,
        ]);
    }



    // funzione utenti elimn
public function deleteUser(Request $request, $id)
{
    DeletedUser::updateOrCreate(
        ['user_id' => $id],
        [
            'name'       => $request->name,
            'email'      => $request->email,
            'city'       => $request->city,
            'company'    => $request->company,
            'post_count' => $request->post_count,
        ]
    );

    return response()->json(['success' => true]);
}

public function restoreUser($id)
{
    DeletedUser::where('user_id', $id)->delete();
    return redirect()->route('dashboard');
}

public function deletedUsers()
{
    $deletedUsers = DeletedUser::orderBy('created_at', 'desc')->get();
    return view('components.deleted-users', compact('deletedUsers'));
}
}
