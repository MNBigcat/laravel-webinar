<?php

declare(strict_types= 1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Services\Contracts\CrudInterface;

final class UserService implements CrudInterface
{
    public function create(array $data): Model
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];        
        $user->password = Hash::make($data['password']);
        $user->save();

        return $user;
    }
    public function update(Model $model, array $data): Model
    {
        $model->name = $data['name'];
        $model->email = $data['email'];     
        $model->save();

        return $model;
    }
    public function delete(Model $model): bool
    {
        return (bool) $model->delete();
    }
}
