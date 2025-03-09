<header class="header">
<nav class="navbar">
        <div class="navbar__inner" style="padding-bottom:30px">
        <ul class="navbar_list" style="display:flex">
            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("home")}}" class="navbar__item-link">Главная</a><br>
            </li>

            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("cartGetShow")}}" class="navbar__item-link">Корзина</a>
            </li>

            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("category")}}" class="navbar__item-link">Категории</a>
            </li>

            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("goodsCreateShow")}}" class="navbar__item-link">Добавить Продукт</a>
            </li>

            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("login")}}" class="navbar__item-link">Войти</a>
            </li>
            <li class="navbar__list-item" style="margin-left:15px">
                <a href="{{route("logout")}}" class="navbar__auth">Выход</a>
            </li>
        </ul>
        </div> 
</nav>
</header>