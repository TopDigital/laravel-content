<?php

namespace TopDigital\Content\Policies;

use TopDigital\Content\Models\Post;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function index(?Post $post) : bool
    {
        return $this->checkMainPolicy($post);
    }

    public function view(?Post $post) : bool
    {
        return $this->checkMainPolicy($post);
    }

    public function create(?Post $post) : bool
    {
        return $this->checkMainPolicy($post);
    }

    public function update(?Post $post, Post $updatedContent) : bool
    {
        return $this->checkMainPolicy($post);
    }

    public function delete(?Post $post, Post $deletedContent) : bool
    {
        return $this->checkMainPolicy($post);
    }

    public function checkMainPolicy(?Post $post) : bool
    {
//        return !!$post && $post->isAdmin();
        return true;
    }
}
