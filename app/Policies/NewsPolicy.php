<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NewsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, News $news)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, News $news)
    {
        return $news -> user -> is($user)
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, News $news)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, News $news)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, News $news)
    {
        //
    }
}
