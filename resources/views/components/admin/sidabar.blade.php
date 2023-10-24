<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{route('admin.index')}}">
                        @if(request()->routeIs('admin.index'))
                            <svg class="bi"><use xlink:href="#house-full"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#house"/></svg>
                        @endif
                        Главная
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.categories.index')) active @endif" href="{{route('admin.categories.index')}}">
                        @if(request()->routeIs('admin.categories.index'))
                            <svg class="bi"><use xlink:href="#categories-full"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#categories"/></svg>
                        @endif
                        Категории
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.news.index')) active @endif" href="{{route('admin.news.index')}}">
                        @if(request()->routeIs('admin.news.index'))
                            <svg class="bi"><use xlink:href="#info-full"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#info"/></svg>
                        @endif
                        Новости
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.users.index')) active @endif" href="{{route('admin.users.index')}}">
                        @if(request()->routeIs('admin.users.index'))
                            <svg class="bi"><use xlink:href="#people-full"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#people"/></svg>
                        @endif
                        Пользователи
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.resources.index')) active @endif" href="{{route('admin.resources.index')}}">
                        @if(request()->routeIs('admin.resources.index'))
                            <svg class="bi"><use xlink:href="#resources-full"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#resources"/></svg>
                        @endif
                        Ресурсы
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs(route('admin.parser'))) active @endif" href="{{route('admin.parser')}}">
                        @if(request()->routeIs('#'))
                            <svg class="bi"><use xlink:href="#parser-full"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#parser"/></svg>
                        @endif
                        Парсер
                    </a>
                </li>

            </ul>
            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('home')}}">
                        <svg class="bi"><use xlink:href="#house"/></svg>
                        Сайт (Главная)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        @if(request()->routeIs('#'))
                            <svg class="bi"><use xlink:href="#person-full"/></svg>
                        @else
                            <svg class="bi"><use xlink:href="#person"/></svg>
                        @endif
                        Профиль
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ route('logout') }}" href="#"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <svg class="bi"><use xlink:href="#door-closed"/></svg>
                        {{ __('Logout') }}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
