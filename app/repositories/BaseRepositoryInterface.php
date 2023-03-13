<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function all($columns = ['*']);

    public function find($id, $relationship = [], $columns = ['*']);

    public function findByFirst($id, $columns);

    public function whereArray($array);

    public function paginate($limit = null, $columns = ['*']);

    public function create($input);

    public function update($input, $id);

    public function delete($id);

    public function uploadImage($image, $path);

    public function getStatistic();

    public function getDataBySlug($slug, $array = []);

    public function getAllDatas($relationship = [], $limit = null);

    public function getSortBy($data);

    public function moveImage($file, $fileNew, $path);

    public function deleteFiles($file, $path);
}
