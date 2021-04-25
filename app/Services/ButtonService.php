<?php

namespace App\Services;

use App\Models\Button;

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
}