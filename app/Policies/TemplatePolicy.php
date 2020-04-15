<?php

namespace App\Policies;

use App\Models\Template;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TemplatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any templates.
     *
     * @param User $user
     */
    public function viewAny(User $user): void
    {
    }

    /**
     * Determine whether the user can view the template.
     *
     * @param \App\Template $template
     * @param User $user
     */
    public function view(User $user, Template $template): void
    {
    }

    /**
     * Determine whether the user can create templates.
     *
     * @param User $user
     */
    public function create(User $user): void
    {
    }

    /**
     * Determine whether the user can update the template.
     *
     * @param \App\Template $template
     * @param User $user
     */
    public function update(User $user, Template $template)
    {
        return $user->id === $template->user_id;
    }

    /**
     * Determine whether the user can delete the template.
     *
     * @param \App\Template $template
     * @param User $user
     */
    public function delete(User $user, Template $template)
    {
        return $user->id === $template->user_id;
    }

    /**
     * Determine whether the user can restore the template.
     *
     * @param \App\Template $template
     * @param User $user
     */
    public function restore(User $user, Template $template): void
    {
    }

    /**
     * Determine whether the user can permanently delete the template.
     *
     * @param \App\Template $template
     * @param User $user
     */
    public function forceDelete(User $user, Template $template): void
    {
    }
}
