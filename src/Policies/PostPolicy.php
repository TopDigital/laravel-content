<?php

namespace TopDigital\Content\Policies;

use TopDigital\Content\Models\Post;
use TopDigital\Auth\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function index(?User $user) : bool
    {
        return true;
    }

    public function view(?User $user) : bool
    {
        return true;
    }

    public function create(?User $user) : bool
    {
        return $user->can('create post');
    }

    public function update(?User $user, Post $updatedPost) : bool
    {
        return $user->can('update post') || $user->getAuthIdentifier() === $updatedPost->author_id;
    }

    public function delete(?User $user, Post $deletedPost) : bool
    {
        return $user->can('delete post') || $user->getAuthIdentifier() === $deletedPost->author_id;
    }
}
