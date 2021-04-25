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
        $validator = ButtonService::validate(
            $data,
            [
                'title' => ['nullable', 'string', 'max:100'],
                'link' =>  ['nullable', 'url', 'max:100'],
                'color' => ['nullable', 'string', 'max:100', 'in:'. implode(',', config('buttons.colors'))],
            ]
        );

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

        return redirect()->route('buttons')
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

    public function configure($index)
    {
        if (!ButtonService::checkIndexRange($index)) {
            return redirect()->route('home');
        }

        $button = ButtonService::getByIndex($index);

        if (!is_null($button)) {
            return redirect()->route('buttons.editView', ['index' => $index]);
        }
        
        return view(
            'buttons.create', 
            [
                'index' => $index
            ]
        );
    }

    public function save()
    {
        $data = request()->all();
        $indexes = ButtonService::getIndexesCollection();
        $configuredIndexes = ButtonService::getDBIndexesCollection();

        if ($configuredIndexes->count()) {
            $indexes = $indexes->reject(function ($index) use ($configuredIndexes) {
                return $configuredIndexes->contains($index);
            });
        }

        $validator = ButtonService::validate(
            $data,
            [
                'index' => ['required', 'in:'. $indexes->implode(',')],
                'title' => ['nullable', 'string', 'max:100'],
                'link' =>  ['nullable', 'url', 'max:100'],
                'color' => ['nullable', 'string', 'max:100', 'in:'. implode(',', config('buttons.colors'))],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->with('alert-danger', __('Configuration error'))
                ->withErrors($validator->errors())
                ->withInput();
        }

        $button = new Button();
        $button->index = $data['index'];
        $button->user_id = auth()->user()->id;
        $button->title = $data['title'] ?? null;
        $button->link = $data['link'] ?? null;
        $button->color = $data['color'] ?? null;
        $status = $button->save();

        if (!$status) {
            return redirect()->back()
                ->with('alert-danger', __('Configuration error'))
                ->withInput();
        }

        return redirect()->route('home')
            ->with('alert-success', __('Successful configuration'));
    }
}
