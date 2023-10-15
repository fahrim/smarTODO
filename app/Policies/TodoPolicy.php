<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Todo $todo): Response
    {
        return $todo->user()->is($user) //method 1
            ? Response::allow()
            : Response::deny('You do not own this todo.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Todo $todo): Response
    {
        return $user->id === $todo->user_id //method 2
            ? Response::allow()
            : Response::deny('You do not own this todo.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Todo $todo): Response
    {
        return $user->id === $todo->user_id
            ? Response::allow()
            : Response::deny('You do not own this todo.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Todo $todo): Response
    {
        return $user->id === $todo->user_id
            ? Response::allow()
            : Response::deny('You do not own this todo.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Todo $todo): Response
    {

        return auth()->user()->isAdmin()    // next feature
            ? Response::allow()
            : Response::deny('You do not own this todo.');
    }

}
