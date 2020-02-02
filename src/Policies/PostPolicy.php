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
        return $this->checkMainPolicy($user);
    }

    public function view(?User $user) : bool
    {
        return $this->checkMainPolicy($user);
    }

    public function create(?User $user) : bool
    {
        return $this->checkMainPolicy($user);
    }

    public function update(?User $user, Post $updatedPost) : bool
    {
        return $this->checkMainPolicy($user);
    }

    public function delete(?User $user, Post $deletedPost) : bool
    {
        return $this->checkMainPolicy($user);
    }

    public function checkMainPolicy(?User $user) : bool
    {
//        return !!$user && $user->isAdmin();
        return true;
    }
}
