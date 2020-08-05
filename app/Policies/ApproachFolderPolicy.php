<?php

namespace App\Policies;

use App\Models\ApproachFolder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApproachFolderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any approach folders.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the approach folder.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ApproachFolder $folder
     *
     * @return mixed
     */
    public function view(User $user, ApproachFolder $folder)
    {
        return $user->id === $folder->user_id;
    }

    /**
     * Determine whether the user can create approach folders.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
    }

    /**
     * Determine whether the user can update the approach folder.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ApproachFolder $folder
     *
     * @return mixed
     */
    public function update(User $user, ApproachFolder $folder)
    {
        return $user->id === $folder->user_id;
    }

    /**
     * Determine whether the user can delete the approach folder.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ApproachFolder $folder
     * @param ApproachFolder $approach_folder
     *
     * @return mixed
     */
    public function delete(User $user, ApproachFolder $approach_folder)
    {
        return $user->id === $approach_folder->user_id;
    }

    /**
     * Determine whether the user can restore the approach folder.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ApproachFolder $folder
     *
     * @return mixed
     */
    public function restore(User $user, ApproachFolder $folder)
    {
    }

    /**
     * Determine whether the user can permanently delete the approach folder.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ApproachFolder $folder
     *
     * @return mixed
     */
    public function forceDelete(User $user, ApproachFolder $folder)
    {
        return $user->id === $folder->user_id;
    }
}
