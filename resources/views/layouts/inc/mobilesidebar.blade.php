<div class="scrollable">
    <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    <ul class="scrollable__content py-2">
        <li>
            <a href="{{ route('dashboard') }}" class="menu menu--active">
                <div class="menu__icon"> <i data-lucide="home"></i> </div>
                <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu {{ request()->routeIs('dashboard') ? 'side-menu--active' : '' }}"></i> </div>
            </a>

            <li>
                <a href="{{ route('activities.index')}}" class="menu {{ request()->routeIs('activities.index') ? 'side-menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                    <div class="menu__title"> Activities </div>
                </a>
            </li>
            <li>
                <a href="{{ route('tasks.index') }}" class="menu {{ request()->routeIs('tasks.index') ? 'side-menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                    <div class="menu__title"> Tasks </div>
                </a>
            </li>


        </li>
        <li class="menu__devider my-6"></li>
    </ul>
</div>
