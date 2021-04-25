@auth
    <div class="row sidebar-toggler {{ $rowClasses ?? '' }}">
        <div class="col-lg-12">
            <button type="button" data-toggle="#sidebar" class="btn btn-outline-light js-sidebar-collapse {{ $btnClasses ?? '' }}">
                <span>{{ __('Toggle Sidebar') }}</span>
            </button>
        </div>
    </div>
@endauth
