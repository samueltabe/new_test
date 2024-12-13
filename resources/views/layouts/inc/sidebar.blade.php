<nav class="side-nav">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="side-menu {{ request()->routeIs('dashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>

        <a href="{{ route('activities.index') }}" class="side-menu {{ request()->routeIs('activities.index') ? 'side-menu--active' : '' }}">
            <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
            <div class="side-menu__title"> activities </div>
        </a>
    </li>
    <li>
        <a href="{{ route('tasks.index') }}" class="side-menu {{ request()->routeIs('tasks.index') ? 'side-menu--active' : '' }}">
            <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
            <div class="side-menu__title"> Tasks </div>
        </a>
    </li>
    <li>
    </ul>
</nav>
