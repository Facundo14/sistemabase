<?php

namespace App\Policies;

use App\User;
use App\Categoria;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriaPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {

            return true;
        }
    }
    /**
     * Determine whether the user can view the categoria.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function view(User $user, Categoria $categoria)
    {
        return $user->HasRole('Admin') || $user->hasPermissionTo('view_categorias');
    }

    /**
     * Determine whether the user can create categorias.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->HasRole('Admin') || $user->hasPermissionTo('create_categorias');
    }

    /**
     * Determine whether the user can update the categoria.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function update(User $user, Categoria $categoria)
    {
        return $user->HasRole('Admin') || $user->hasPermissionTo('edit_categorias');
    }

    /**
     * Determine whether the user can delete the categoria.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function delete(User $user, Categoria $categoria)
    {
        return $user->HasRole('Admin') || $user->hasPermissionTo('delete_categorias');
    }

    /**
     * Determine whether the user can restore the categoria.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function restore(User $user, Categoria $categoria)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the categoria.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function forceDelete(User $user, Categoria $categoria)
    {
        //
    }
}
