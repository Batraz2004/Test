<header class="header">
<nav class="navbar">
        <div class="navbar__inner" style="padding-bottom:30px">
        <ul class="navbar_list" style="display:flex">
            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("home")}}" class="navbar__link">Главная</a><br>
            </li>

            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("category")}}" class="navbar__auth">Категории</a>
            </li>

            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("goodsCreateShow")}}" class="navbar__auth">Добавить Продукт</a>
            </li>

            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("login")}}" class="navbar__auth">Войти</a>
            </li>
            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("logout")}}" class="navbar__auth">Выход</a>
            </li>
        </ul>
        </div> 
</nav>
</header>