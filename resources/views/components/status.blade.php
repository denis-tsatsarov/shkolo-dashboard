@foreach (['success', 'info', 'danger', 'warning'] as $msg)
    @if (Session::has('alert-' . $msg))
        <div class="col-lg-12 px-0">
            <div class="flash-message">
                @if (is_array(Session::get('alert-' . $msg)))
                    @foreach (Session::get('alert-' . $msg) as $alertMsg)
                        <p class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                            {{ $alertMsg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                    @endforeach
                @else
                    <p class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                        {{ Session::get('alert-' . $msg) }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </p>
                @endif
            </div>
        </div>
        @php
            Session::forget('alert-' . $msg);
        @endphp
    @endif
@endforeach