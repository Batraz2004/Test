<header class="header">
<nav class="navbar">
        <div class="navbar__inner">
        <ul class="navbar_list" style="display:flex">
            <li class="navbar__list-item" style="margin-right:5px">
                <a href="{{route("home")}}" class="navbar__link">Главная</a><br>
            </li>

            <li class="navbar__list-item" style="margin-right:5px">
                <a href="{{route("categoryShow")}}" class="navbar__auth">Категории</a>
            </li>

            <li class="navbar__list-item" style="margin-right:5px">
                <a href="{{route("login")}}" class="navbar__auth">Войти</a>
            </li>
            <li class="navbar__list-item" style="margin-right:5px">
                <a href="{{route("logout")}}" class="navbar__auth">Выход</a>
            </li>
        </ul>
        </div> 
</nav>
</header>