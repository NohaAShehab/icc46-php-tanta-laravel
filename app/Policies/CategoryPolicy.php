<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any categories.
     */
    public function viewAny(User $user): bool
    {
        return true; // Anyone can view categories
    }

    /**
     * Determine whether the user can view the category.
     */
    public function view(User $user, Category $category): bool
    {
        return true; // Anyone can view a category
    }

    /**
     * Determine whether the user can create categories.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can update the category.
     */
    public function update(User $user, Category $category): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can delete the category.
     * Only Admin can delete categories as per requirements.
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the category.
     */
    public function restore(User $user, Category $category): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the category.
     */
    public function forceDelete(User $user, Category $category): bool
    {
        return $user->role === 'admin';
    }
}
