<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function getEnv()
    {
        $env = File::get(base_path('.env'));

        return view('admin.env', compact('env'));
    }

    public function saveEnv(Request $request)
    {
        $env = $request->env;
        file_put_contents(base_path('.env'), $env);

        return redirect()->action('Admin\DashboardController@getEnv');
    }
}
