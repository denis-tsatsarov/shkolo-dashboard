<?php

namespace App\Http\Controllers;

use App\Models\Button;
use Illuminate\Http\Request;

class ButtonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
