<?php
namespace App\Repositories\UserRepository;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function model()
    {
        return User::class;
    }

    public function getDataByEmail($email)
    {
        if (empty($email)) {
            return false;
        }

        return $this->model->whereEmail($email)->first();
    }

    public function checkExists($column, $value, $id = null)
    {
        if (empty($value) || empty($column)) {
            return false;
        }

        if ($id) {
            return $this->model->where($column, $value)
                ->where('id', '<>', $id)
                ->first();
        }

        return $this->model->where($column, $value)->first();
    }
}
