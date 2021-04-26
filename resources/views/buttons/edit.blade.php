@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        @include('components.status')
        <div class="col-lg-6 text-center">
            <div class="card">
                <div class="card-header">{{ __('Edit button') .' '. $button['index'] }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('buttons.edit', ['index' => $button['index']]) }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 text-left col-form-label">{{ __('Index') }}</label>
                            <div class="col-sm-10 text-left">
                                <input type="number" readonly class="form-control" value="{{ $button['index'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 text-left col-form-label">{{ __('Title') }}</label>
                            <div class="col-sm-10 text-left">
                                <input type="text" name="title" class="form-control" value="{{ old('title', $button['title']) }}">
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 text-left col-form-label">{{ __('Link') }}</label>
                            <div class="col-sm-10 text-left">
                                <input type="text" name="link" class="form-control" value="{{ old('link', $button['link']) }}">
                                <span class="text-danger">{{ $errors->first('link') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 text-left col-form-label"><span class=" js-color-picker-label rounded">{{ __('Color') }}</span></label>
                            <div class="col-sm-10 text-left">
                                <select name="color" class="custom-select js-color-picker">
                                    <option value="">{{ __('Pick a color') }}</option>
                                    @foreach (config('buttons.colors') as $color) 
                                        <option 
                                            value="{{ $color }}"
                                            {{ !empty($button['color']) && $color == old('color', $button['color']) ? 'selected' : '' }}
                                        >{{ $color }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('color') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-outline-primary px-5">{{ __('Edit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection