<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ButtonService;

class ButtonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {  
        return view(
            'buttons.list', 
            [
                'buttons' => ButtonService::getConfigured()
            ]
        );
    }
}
