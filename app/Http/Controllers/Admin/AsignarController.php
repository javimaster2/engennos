<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsignarController extends Controller
{
    //
    public function index()
    {
        return view('admin.asignar.index');

    }
}
