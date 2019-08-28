<?php

namespace App\Policies;

use App\User;
use App\Pais;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaisPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {

            return true;
        }
    }

    /**
     * Determine whether the user can view the pais.
     *
     * @param  \App\User  $user
     * @param  \App\Pais  $pais
     * @return mixed
     */
    public function view(User $user, Pais $pais)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('view_paises');
    }

    /**
     * Determine whether the user can create pais.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('create_paises');
    }

    /**
     * Determine whether the user can update the pais.
     *
     * @param  \App\User  $user
     * @param  \App\Pais  $pais
     * @return mixed
     */
    public function update(User $user, Pais $pais)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('edit_paises');
    }

    /**
     * Determine whether the user can delete the pais.
     *
     * @param  \App\User  $user
     * @param  \App\Pais  $pais
     * @return mixed
     */
    public function delete(User $user, Pais $pais)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('delete_paises');
    }
}
