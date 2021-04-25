<?php

namespace App\Services;

use App\Models\Button;
use Illuminate\Support\Facades\Validator;

class ButtonService {

    public static function getAll() 
    {
        $buttons = Button::orderBy('index')->get();

        $firstButtonIndex = config('buttons.first_index');
        $buttonsCount = config('buttons.total_count');
        $lastButtonIndex = ($firstButtonIndex + $buttonsCount) - 1;
        $buttonsIndexes = range($firstButtonIndex, $lastButtonIndex);

        $result = collect($buttonsIndexes)->map(function ($index) use ($buttons) {
            return $buttons->where('index', $index)->count() 
                ? array_merge(['configured' => true], $buttons->where('index', $index)->first()->toArray())
                : ['index' => $index, 'configured' => false];
        });

        return $result;
    }

    public static function getConfigured()
    {
        return Button::orderBy('index')->get();
    }

    public static function getByIndex($index)
    {
        return Button::where('index', $index)->first();
    }

    public static function validate($data)
    {
        return Validator::make(
            $data, 
            [
                'title' => ['nullable', 'string', 'max:100'],
                'link' =>  ['nullable', 'string', 'max:100'],
                'color' => ['nullable', 'string', 'max:100'],
            ]
        );
    }
}