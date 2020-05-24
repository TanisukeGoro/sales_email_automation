<?php

namespace App\Policies;

use App\Models\SearchConditions;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinessListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any search conditions.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the search condition.
     *
     * @param \App\Models\User $user
     * @param \App\SearchCondition $searchCondition
     *
     * @return mixed
     */
    public function view(User $user, SearchConditions $searchCondition)
    {
    }

    /**
     * Determine whether the user can create search conditions.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
    }

    /**
     * Determine whether the user can update the search condition.
     *
     * @param \App\Models\User $user
     * @param \App\SearchCondition $searchCondition
     *
     * @return mixed
     */
    public function update(User $user, SearchConditions $searchCondition)
    {
    }

    /**
     * Determine whether the user can delete the search condition.
     *
     * @param \App\Models\User $user
     * @param \App\SearchCondition $searchCondition
     *
     * @return mixed
     */
    public function delete(User $user, SearchConditions $searchCondition)
    {
        return $user->id === $searchCondition->user_id;
    }

    /**
     * Determine whether the user can restore the search condition.
     *
     * @param \App\Models\User $user
     * @param \App\SearchCondition $searchCondition
     *
     * @return mixed
     */
    public function restore(User $user, SearchConditions $searchCondition)
    {
    }

    /**
     * Determine whether the user can permanently delete the search condition.
     *
     * @param \App\Models\User $user
     * @param \App\SearchCondition $searchCondition
     *
     * @return mixed
     */
    public function forceDelete(User $user, SearchConditions $searchCondition)
    {
    }
}
