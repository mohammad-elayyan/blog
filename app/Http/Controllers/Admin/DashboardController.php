<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        // method 1
        // if (Gate::denies('admin'))
        //     abort(403);
        // method 2
        // if (!Gate::allows('admin'))
        //     abort(403);
        // method 3
        // $this->authorize('admin');

        return view('admin.dashboard');
    }
}
