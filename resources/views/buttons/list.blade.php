@extends('layouts.app')

@section('content')
    <div class="row">
        @if (!empty($buttons))
            @foreach ($buttons as $btn)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
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
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        @endif
    </div>
@endsection