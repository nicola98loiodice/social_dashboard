<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublicController extends Controller
{
    public function homepage(){
        return view('welcome');
    }
    public function dashboard()
    {
        // recupero dati
        $users = Http::get('https://jsonplaceholder.typicode.com/users')->json();
        $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->json();

        // post x utente
        $postCounts = collect($posts)->groupBy('userId')->map->count();

        $users = collect($users)->map(function ($user) use ($postCounts) {
            $user['post_count'] = $postCounts->get($user['id'], 0);
            return $user;
        });

        // conta .com e .net
        $comCount = $users->filter(fn($u) => str_ends_with($u['email'], '.com'))->count();
        $netCount = $users->filter(fn($u) => str_ends_with($u['email'], '.net'))->count();

        // post con titolo più lungo
        $longestPost = collect($posts)->sortByDesc(fn($p) => strlen($p['title']))->first();
        $longestPostUser = $users->firstWhere('id', $longestPost['userId']);

        // ritorna vista popolata
        return view('components.dashboard', [
            'users'           => $users,
            'totalUsers'      => $users->count(),
            'comCount'        => $comCount,
            'netCount'        => $netCount,
            'longestPost'     => $longestPost,
            'longestPostUser' => $longestPostUser,
        ]);
    }

    public function user($id)
{
    $users   = Http::get('https://jsonplaceholder.typicode.com/users')->json();
    $posts   = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
    $albums  = Http::get('https://jsonplaceholder.typicode.com/albums')->json();
    $photos  = Http::get('https://jsonplaceholder.typicode.com/photos')->json();

    $user = collect($users)->firstWhere('id', (int)$id);

    $postCount  = collect($posts)->where('userId', (int)$id)->count();
    $userAlbums = collect($albums)->where('userId', (int)$id);
    $albumCount = $userAlbums->count();
    $albumIds   = $userAlbums->pluck('id');
    $photoCount = collect($photos)->whereIn('albumId', $albumIds)->count();

    return view('components.user', [
        'user'       => $user,
        'postCount'  => $postCount,
        'albumCount' => $albumCount,
        'photoCount' => $photoCount,
    ]);
}
}
