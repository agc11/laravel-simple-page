<?php

namespace App\Policies;

use App\User;
use App\Pizza;
use Illuminate\Auth\Access\HandlesAuthorization;

class PizzaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pizza.
     *
     * @param  App\User  $user
     * @param  App\Pizza  $pizza
     * @return mixed
     */
    public function view(User $user, Pizza $pizza)
    {
        //
    }

    /**
     * Determine whether the user can create pizzas.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the pizza.
     *
     * @param  App\User  $user
     * @param  App\Pizza  $pizza
     * @return mixed
     */
    public function update(User $user, Pizza $pizza)
    {
        //
    }

    /**
     * Determine whether the user can delete the pizza.
     *
     * @param  App\User  $user
     * @param  App\Pizza  $pizza
     * @return mixed
     */
    public function delete(User $user, Pizza $pizza)
    {

        $arr_roles = array_map(function($role) {
            return $role['id'];
        }, $user->roles()->get()->toArray());

        return in_array(1, $arr_roles) || in_array(2, $arr_roles);
    }

    public function canDeletePizza($arrRoles) {
        return in_array(1, $arrRoles) || in_array(2, $arrRoles);
    }

}
