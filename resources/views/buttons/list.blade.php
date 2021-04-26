@extends('layouts.app')

@section('content')
    <div class="row table-responsive mx-0">
        @include('components.status')   
        @if ($buttons->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('Index') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Link') }}</th>
                        <th>{{ __('Color') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($buttons as $btn)
                    <tr>
                        <td>{{ $btn['index'] }}</td>
                        <td>{{ $btn['title'] }}</td>
                        <td>{{ $btn['link'] }}</td>
                        <td>{{ $btn['color'] }}</td>
                        <td>
                            <div class="btn-group">
                                @can('manage', $btn)
                                    <a 
                                        class="btn btn-outline-primary mr-2 rounded-right" 
                                        href="{{ route('buttons.editView', $btn['index']) }}" 
                                        role="button"
                                    >{{ __('Edit') }}</a>
                                    <form
                                        method="POST"
                                        action="{{ route('buttons.delete', $btn['index']) }}"
                                    >
                                        @csrf
                                        <input type="hidden" name="index" value="{{ $btn['index'] }}"/>
                                        <button 
                                            class="btn btn-outline-danger rounded-left" 
                                            onclick="return confirm('You want to delete this configuration?')" 
                                            type="submit"
                                        >{{ __('Delete') }}</button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-primary text-center">
                There are no configured buttons. <a href="{{ route('home') }}" class="alert-link">Go to home page.</a>
            </div>
        @endif
    </div>
@endsection