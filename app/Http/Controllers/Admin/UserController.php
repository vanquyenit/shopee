<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository\UserRepository;
use Request as NewRequest;

class UserController extends Controller
{
    
    protected $userRepository;

    public function  __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index() 
    {
        $dataSearch             = NewRequest::query();
        $dataView['dataSearch'] = $dataSearch;
        $dataView['users'] = $this->userRepository->getData($dataSearch);
        return view('admin.user.index', $dataView);
    }

    public function create() 
    {
        return view('admin.user.create');
    }

    public function save(Request $request) 
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'birthday' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['required', 'image'],
            'gender' => ['required'],
            'address' => ['required', 'max:255'],
            'phone' => ['required', 'max:13'],
            'active' => ['required'],
        ]);

        $data      = $request->all();
        $fillable  = $this->userRepository->getFillable();
        $attribute = array_only($data, $fillable);
        $attribute['password'] = bcrypt($request->password);
        $attribute['birthday'] = setBirthdayUser($request->birthday);
       if ($request->active === 'on' || $request->active === true) {
           $attribute['active'] = config('setting.active');
       }

        $name = '';
        if($request->hasfile('avatar'))
         {
            $name = time() . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path().config('path.avatar'), $name);
            $attribute['avatar'] = $name;
         }
         $result    = $this->userRepository->create($attribute);

        if ($result) {
            return redirect()->action('Admin\UserController@index')->with('success', trans('form.success'));
        } else {
            return redirect()->action('Admin\UserController@index')->with('error', trans('form.fail'));
        }
    }

    public function edit($id) 
    {
        $dataView['user'] = $this->userRepository->findByFirst('id', $id);
        // echo "<pre>";
        // print_r($dataView['user']);die;

        return view('admin.user.edit', $dataView);
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'birthday' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['confirmed'],
            'avatar' => ['required', 'image'],
            'gender' => ['required'],
            'address' => ['required', 'max:255'],
            'phone' => ['required', 'max:13'],
            'active' => ['required'],
        ]);

        $result = $this->userRepository->findByFirst('id', $id);
        if (!$result) {
            return redirect()->action('Admin\UserController@index')->with('error', trans('form.fail'));
        }

        $data      = $request->all();
        $fillable  = $this->userRepository->getFillable();
        $attribute = array_only($data, $fillable);
        if ($attribute['password'] !== "" || $attribute['password'] != null) {
            $attribute['password'] = bcrypt($request->password);
        }
        $attribute['birthday'] = setBirthdayUser($request->birthday);
       if ($request->active === 'on' || $request->active === true) {
           $attribute['active'] = config('setting.active');
       }

        $name = '';
        if($request->hasfile('avatar'))
         {
            // delete file old
            $path = public_path().config('path.avatar') . $result->avatar;
            if (file_exists($path)) {
                unlink($path);
            }
            // save file new
            $name = time() . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path().config('path.avatar'), $name);
            $attribute['avatar'] = $name;
         }
         $result    = $this->userRepository->update($attribute, $id);

        if ($result) {
            return redirect()->action('Admin\UserController@index')->with('success', trans('form.success'));
        } else {
            return redirect()->action('Admin\UserController@index')->with('error', trans('form.fail'));
        }
    }
}
