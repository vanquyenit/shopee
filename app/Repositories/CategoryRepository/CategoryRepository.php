<?php
namespace App\Repositories\CategoryRepository;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    public function model()
    {
        return Category::class;
    }

    public function getData($dataSearch)
    {
        $arrWhere = [];
        $result    = $this->model;
        if (isset($dataSearch['search'])) {
            $arrWhere['title'] = $dataSearch['search'];
            $result    = $result->where($arrWhere);
        }
        $keyword   = isset($dataSearch['search']) ? '%' . $dataSearch['search'] . '%' : '';
        if ($keyword) {
            $result->orWhere('title', 'LIKE', $keyword);
        }
        return $result->orderBy('created_at', 'DESC')->paginate(config('setting.limit.default'));
    }
}
