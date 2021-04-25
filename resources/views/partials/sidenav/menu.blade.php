@auth
    <nav id="sidebar">
        <ul class="list-unstyled components">
            <li class="{{ request()->segment(1) == '' ? 'active' : '' }}">
                <a href="{{ route('home') }}">{{ __('Home') }}</a>
            </li>
            <li class="{{ request()->segment(1) == 'buttons' ? 'active' : '' }}">
                <a href="{{ route('buttons') }}">{{ __('Buttons') }}</a>
            </li>
        </ul>
    </nav>
@endauth