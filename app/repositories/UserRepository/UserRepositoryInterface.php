<?php
namespace App\Repositories\UserRepository;

interface UserRepositoryInterface
{
    public function getDataByEmail($email);

    public function checkExists($column, $value, $id = null);
}
