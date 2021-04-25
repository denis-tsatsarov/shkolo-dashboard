<?php

namespace App\Http\Controllers;

use App\Models\Button;
use Illuminate\Http\Request;
use App\Services\ButtonService;
use Illuminate\Support\Facades\Gate;

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

    public function editView($index)
    {
        $button = ButtonService::getByIndex($index);

        Gate::authorize('manage', $button);
        
        return view(
            'buttons.edit', 
            [
                'button' => $button
            ]
        );
    }

    public function edit($index)
    {
        $button = ButtonService::getByIndex($index);

        Gate::authorize('manage', $button);

        $data = request()->all();
        $validator = ButtonService::validate($data);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('alert-danger', __('Edit error'))
                ->withErrors($validator->errors())
                ->withInput();
        }

        $button->title = $data['title'];
        $button->link = $data['link'];
        $button->color = $data['color'];
        $status = $button->save();

        if (!$status) {
            return redirect()->back()
                ->with('alert-danger', __('Edit error'))
                ->withInput();
        }

        return redirect()->route('buttons.editView', ['index' => $button['index']])
            ->with('alert-success', __('Successful update'));
    }

    public function delete()
    {
        $button = ButtonService::getByIndex(request()->index);

        Gate::authorize('manage', $button);

        $status = Button::destroy($button->id);

        if (!$status) {
            return redirect()->back()
                ->with('alert-danger', __('Delete error'))
                ->withInput();
        }

        return redirect()->route('buttons')->with('alert-success', __('Successful delete'));
    }
}
