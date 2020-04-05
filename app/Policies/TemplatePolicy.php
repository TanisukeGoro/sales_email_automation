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
     */
    public function viewAny(User $user): void
    {
    }

    /**
     * Determine whether the user can view the template.
     *
     * @param \App\Template $template
     */
    public function view(User $user, Template $template): void
    {
    }

    /**
     * Determine whether the user can create templates.
     */
    public function create(User $user): void
    {
    }

    /**
     * Determine whether the user can update the template.
     *
     * @param \App\Template $template
     */
    public function update(User $user, Template $template)
    {
        return $user->id === $template->user_id;
    }

    /**
     * Determine whether the user can delete the template.
     *
     * @param \App\Template $template
     */
    public function delete(User $user, Template $template)
    {
        return $user->id === $template->user_id;
    }

    /**
     * Determine whether the user can restore the template.
     *
     * @param \App\Template $template
     */
    public function restore(User $user, Template $template): void
    {
    }

    /**
     * Determine whether the user can permanently delete the template.
     *
     * @param \App\Template $template
     */
    public function forceDelete(User $user, Template $template): void
    {
    }
}
