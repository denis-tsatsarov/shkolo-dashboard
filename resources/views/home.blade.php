@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($buttons as $btn)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-3">
                <div 
                    class="card dashboard-card text-center" 
                    {{ !empty($btn['color']) ? 'style=background-color:'. $btn['color'] .';' : '' }}
                >
                    <a 
                        class="btn" 
                        title="{{ $btn['title'] ?? '' }}"
                        href="{{ $btn['configured'] && !is_null($btn['link']) ? $btn['link'] : route('buttons.configure', $btn['index']) }}"
                    ><img class="dashboard-icon" src="{{ asset('images/btn-icon.png') }}"></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
