@extends('layouts.app')

@section('content')
    <div class="row">
        @if (!empty($buttons))
            @foreach ($buttons as $btn)
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
                        <tr>
                            <td>{{ $btn['index'] }}</td>
                            <td>{{ $btn['title'] }}</td>
                            <td>{{ $btn['link'] }}</td>
                            <td>{{ $btn['color'] }}</td>
                            <td>
                                <div class="btn-group">
                                    @can('manage', $btn)
                                        <a class="btn btn-outline-primary mr-2 rounded-right" href="#" role="button">{{ __('Edit') }}</a>
                                        <a class="btn btn-outline-danger rounded-left" href="#" role="button">{{ __('Delete') }}</a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        @endif
    </div>
@endsection