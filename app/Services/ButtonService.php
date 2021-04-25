<?php

namespace App\Services;

use App\Models\Button;
use Illuminate\Support\Facades\Validator;

class ButtonService {

    public static function getAll() 
    {
        $buttons = Button::orderBy('index')->get();
        $buttonsIndexes = self::getIndexesCollection();

        $result = $buttonsIndexes->map(function ($index) use ($buttons) {
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

    public static function getDBIndexesCollection()
    {
        return self::getConfigured()->pluck('index');
    }

    public static function validate($data, $rules)
    {
        return Validator::make($data, $rules);
    }

    public static function checkIndexRange($index)
    {
        $lastButtonIndex = self::getIndexesCollection()->last();

        return (int) $index <= (int) $lastButtonIndex;
    }

    public static function getIndexesCollection()
    {
        $firstButtonIndex = config('buttons.first_index');
        $buttonsCount = config('buttons.total_count');
        $lastButtonIndex = ($firstButtonIndex + $buttonsCount) - 1;
        $buttonsIndexes = range($firstButtonIndex, $lastButtonIndex);

        return collect($buttonsIndexes);
    }
}