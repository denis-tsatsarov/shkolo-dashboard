@auth
    <nav id="sidebar" class="active">
        <ul class="list-unstyled components">
            <li>
                <a href="#">{{ __('Home') }}</a>
            </li>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ __('Settings') }}</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">{{ __('Buttons') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
@endauth