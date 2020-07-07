<?php

namespace App\Policies;

use App\Models\SaleList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SaleListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any sale lists.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the sale list.
     *
     * @param \App\Models\User $user
     * @param \App\SaleList $saleList
     *
     * @return mixed
     */
    public function view(User $user, SaleList $saleList)
    {
    }

    /**
     * Determine whether the user can create sale lists.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
    }

    /**
     * Determine whether the user can update the sale list.
     *
     * @param \App\Models\User $user
     * @param \App\SaleList $saleList
     *
     * @return mixed
     */
    public function update(User $user, SaleList $saleList)
    {
    }

    /**
     * Determine whether the user can delete the sale list.
     *
     * @param \App\Models\User $user
     * @param \App\SaleList $saleList
     *
     * @return mixed
     */
    public function delete(User $user, SaleList $saleList)
    {
        return $user->id === $saleList->user_id;
    }

    /**
     * Determine whether the user can restore the sale list.
     *
     * @param \App\Models\User $user
     * @param \App\SaleList $saleList
     *
     * @return mixed
     */
    public function restore(User $user, SaleList $saleList)
    {
    }

    /**
     * Determine whether the user can permanently delete the sale list.
     *
     * @param \App\Models\User $user
     * @param \App\SaleList $saleList
     *
     * @return mixed
     */
    public function forceDelete(User $user, SaleList $saleList)
    {
    }
}
