<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    /**
     * Determine whether the user can view any products.
     */
    public function viewAny(User $user): bool
    {
        return true; // Anyone can view products
    }

    /**
     * Determine whether the user can view the product.
     */
    public function view(User $user, Product $product): bool
    {
        return true; // Anyone can view a product
    }

    /**
     * Determine whether the user can create products.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can update the product.
     */
    public function update(User $user, Product $product): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can delete the product.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the product.
     */
    public function restore(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the product.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }
}
