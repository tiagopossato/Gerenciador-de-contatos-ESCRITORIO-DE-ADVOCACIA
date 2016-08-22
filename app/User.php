<?php

namespace App;

use Input;
use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

    use Authenticatable,
        Authorizable,
        CanResetPassword;

    protected $hidden = ['password', 'created_at', 'remember_token', 'updated_at'];
    protected $fillable = ['nome', 'email', 'password', 'role', 'active'];

    public function allUsers() {
        return self::all();
    }

    public function getUser($id) {
        $user = self::find($id);
        if (is_null($user)) {
            return false;
        }
        return $user;
    }

    public function saveUser() {
        $input = Input::all();
        if (isset($input['role'])) {
            if ($input['role'] === '1') {
                $input['role'] = 'admin';
            } else {
                $input['role'] = 'user';
            }
        } else {
            $input['role'] = 'user';
        }

        $input['password'] = Hash::make($input['password']);
        $user = new User();
        $user->fill($input); // associação em massa

        $email = self::lists('email')->all();
        foreach ($email as $key => $value) {
            if ($value == $input['email']) {
                return false;
            }
        }

        return $user->save();
    }

    public function updateUser($id) {
        $user = self::find($id);
        if (is_null($user)) {
            return false;
        }
        $input = Input::all();
        if (isset($input['role'])) {
            if ($input['role'] === '1') {
                $input['role'] = 'admin';
            } else {
                $input['role'] = 'user';
            }
        } else {
            if (!isset($input['active'])) {
                $input['role'] = 'user';
            }
        }

        if (isset($input['password'])) {
            if (strlen($input['password']) > 5) {
                $input['password'] = Hash::make($input['password']);
            } else {
                unset($input['password']);
            }
        }
        
//        $email = self::lists('email')->all();
//        foreach ($email as $key => $value) {
//            if ($value == $input['email']) {
//                return false;
//            }
//        }

        $user->fill($input); // associação em massa
        $user->save();
        return $user;
    }

    public function deleteUser($id) {
        $user = self::find($id);
        if (is_null($user)) {
            return false;
        }
        return $user->delete();
    }

}
