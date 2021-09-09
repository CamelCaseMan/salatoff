<header>
    <nav>
        <div class="container" style="display: flex;justify-content: center; z-index: 999">
            <ul class="topmenu">
                <li><a href="/">Главная</a></li>
                <li><a href="#" class="active">Каталог<span class="fa fa-angle-down"></span></a>
                    <ul class="submenu">
                        @foreach($categories as $category)
                            @if($category->parent_id == 0)
                                @if(count($category->childrenCategories) > 0)
                                    <li><a href="#">{{$category->name}}<span class="fa fa-angle-down"></span></a>
                                        <ul class="submenu">
                                            @foreach($category->childrenCategories as $children)
                                                <li>
                                                    <a href="/catalog/{{$category->slug}}/{{$children->slug}}">{{$children->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                @else
                                    <li><a href="/catalog/{{$category->slug}}">{{$category->name}}</a></li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li><a href="">Производство</a></li>
                <li><a href="">Наши кафе</a></li>
                <li><a href="">Рецепты</a></li>
                <li><a href="">Контакты</a></li>
                <li><a href="/basket">Корзина</a></li>
            </ul>
        </div>
    </nav>
</header>