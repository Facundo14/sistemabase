<?php

namespace App\Policies;

use App\User;
use App\Empresa;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {

            return true;
        }
    }

    /**
     * Determine whether the user can view the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function view(User $user, Empresa $empresa)
    {
        return $user->HasRole('Admin') || $user->hasPermissionTo('view_empresas');
    }

    /**
     * Determine whether the user can create empresas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->HasRole('Admin') || $user->hasPermissionTo('create_empresas');
    }

    /**
     * Determine whether the user can update the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function update(User $user, Empresa $empresa)
    {
        return $user->HasRole('Admin') || $user->hasPermissionTo('edit_empresas');
    }

    /**
     * Determine whether the user can delete the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function delete(User $user, Empresa $empresa)
    {
        return $user->HasRole('Admin') || $user->hasPermissionTo('delete_empresas');
    }
}
