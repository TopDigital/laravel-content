<?php

namespace TopDigital\Content\Policies;

use TopDigital\Content\Models\Section;
use TopDigital\Auth\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
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
        return $user->can('create section');
    }

    public function update(?User $user, Section $updatedSection) : bool
    {
        return $user->can('update section');
    }

    public function delete(?User $user, Section $deletedSection) : bool
    {
        return $user->can('delete section');
    }
}
