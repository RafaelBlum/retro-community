<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    /**
     * before
     * O beforemétodo será executado antes de qualquer outro método na política, dando a você a oportunidade de
     * autorizar a ação antes que o método de política pretendido seja realmente chamado.
     */
//    public function before(User $user, string $ability): bool|null
//    {
//        if ($user->panel->value === 'admin' || $user->panel->value === 'super-admin') {
//            return true;
//        }
//
//        return null;
//    }

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
    public function view(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->panel->value === 'super-admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return ($user->id === $model->id || $user->panel->value === 'super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return ($user->id === $model->id || $user->panel->value === 'super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return true;
    }
}
