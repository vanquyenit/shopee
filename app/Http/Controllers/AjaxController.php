<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository\CategoryRepository;

class AjaxController extends Controller
{
    
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $data   = $request->all();
            $id     = $data['id'];
            $result = $this->categoryRepository->delete($id);
        }
        if ($result) {
            return redirect()
                ->action('Admin\CategoryController@index')
                ->with('success', trans('form.success'));
        }

        return redirect()
            ->action('Admin\CategoryController@index')
            ->with('error', trans('form.fail'));
    }
}
