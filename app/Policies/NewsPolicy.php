<?php

namespace App\Policies;

use App\Models\User;
use App\Models\News;

class NewsPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function update(User $user, News $news)
    {
        return $user->role === 'admin' || $user->role === 'editor';
    }

    public function delete(User $user, News $news)
    {
        return $user->role === 'admin' || $user->role === 'editor';
    }

}