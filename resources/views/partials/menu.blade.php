<nav class="side-nav">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}"
               class="side-menu side-menu{{ request()->is("admin") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="home"></i></div>
                <div class="side-menu__title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route("menu") }}"
               class="side-menu side-menu{{ request()->is("admin/menu") || request()->is("admin/menu/*") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                <div class="side-menu__title">Menu</div>
            </a>
        </li>
    </ul>
</nav>
