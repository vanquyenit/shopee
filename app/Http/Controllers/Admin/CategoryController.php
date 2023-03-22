<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository\CategoryRepository;
use Request as NewRequest;


class CategoryController extends Controller
{

    protected $categoryRepository;

    public function  __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index() 
    {
        $dataSearch             = NewRequest::query();
        $dataView['dataSearch'] = $dataSearch;
        $dataView['categories'] = $this->categoryRepository->getData($dataSearch);
        return view('admin.category.index', $dataView);
    }

    public function create() 
    {
        $dataView['categories'] = $this->categoryRepository->all(['id', 'title']);
        return view('admin.category.create', $dataView);
    }

    public function save(Request $request) 
    {
        $request->validate([
            'title' => 'required|unique:category,title|max:255',
            'sort' => 'required|integer',
            'active' => 'required',
        ]);

        $data      = $request->all();
        $fillable  = $this->categoryRepository->getFillable();
        $attribute = array_only($data, $fillable);
        $attribute['parent_id']         = $request->parent_id;
        $attribute['sort']         = $request->sort;
        $attribute['icon']         = $request->icon;
        if ($request->active === 'on' || $request->active === true) {
            $attribute['active'] = config('setting.active');
        }
        $result    = $this->categoryRepository->create($attribute);

        if ($result) {
            return redirect()->action('Admin\CategoryController@index')->with('success', trans('form.success'));
        } else {
            return redirect()->action('Admin\CategoryController@index')->with('error', trans('form.fail'));
        }
    }

    public function edit($id) 
    {
        $dataView['categories'] = $this->categoryRepository->all(['id', 'title']);
        $dataView['category'] = $this->categoryRepository->findByFirst('id', $id);

        return view('admin.category.edit', $dataView);
    }

    public function update(Request $request, $id) 
    {

        $request->validate([
            'title' => 'required|max:255',
            'sort' => 'required|integer',
        ]);

        $result = $this->categoryRepository->findByFirst('id', $id);
        if (!$result) {
            return redirect()->action('Admin\CategoryController@index')->with('error', trans('form.fail'));
        }

        $data      = $request->all();
        $fillable  = $this->categoryRepository->getFillable();
        $attribute = array_only($data, $fillable);
        $attribute['parent_id']    = $request->parent_id;
        $attribute['sort']         = $request->sort;
        $attribute['icon']         = $request->icon; 
        $attribute['active']       = config('setting.no-active');
        if ($request->active === 'on' || $request->active === true) {
            $attribute['active'] = config('setting.active');
        }
        $result    = $this->categoryRepository->update($attribute, $id);

        if ($result) {
            return redirect()->action('Admin\CategoryController@index')->with('success', trans('form.success'));
        } else {
            return redirect()->action('Admin\CategoryController@index')->with('error', trans('form.fail'));
        }
    }
}
