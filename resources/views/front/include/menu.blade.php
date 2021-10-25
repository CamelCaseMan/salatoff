<!-- Header menu -->
<ul class="header__menu s-d-none">
    <li>
        <div class="-link">
            Каталог
            <svg class="-down" width="14" height="9" viewBox="0 0 14 9" fill="none">
                <path d="M7 9L13.9282 0H0.0717969L7 9Z" fill="#E0E0E0"/>
            </svg>
        </div>
        <ul class="-droplist">
           {{-- @foreach($categories as $key => $category)

                    <li>
                        @if($category->parent_id == 0)
                        <a href="#">
                            {{$category->name}}
                            <svg class="-down" width="9" height="12" viewBox="0 0 9 12" fill="none">
                                <path d="M9 6L0 0.803848V11.1962L9 6Z" fill="#E0E0E0"/>
                            </svg>
                        </a>
                        @endif
                        <ul class="-droplist">
                            <li>
                                <a href="#">
                                    Продукт 11
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Продукт 2
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Продукт 3
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Продукт 4
                                </a>
                            </li>
                        </ul>
                    </li>

            @endforeach--}}
            {{--<li>
                <a href="#">
                    Весовые
                    <svg class="-down" width="9" height="12" viewBox="0 0 9 12" fill="none">
                        <path d="M9 6L0 0.803848V11.1962L9 6Z" fill="#E0E0E0"/>
                    </svg>
                </a>
                <ul class="-droplist">
                    <li>
                        <a href="#">
                            Продукт 11
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Продукт 2
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Продукт 3
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Продукт 4
                        </a>
                    </li>
                </ul>
            </li>--}}
            {{--            <li>
                            <a href="#">
                                Фасованные
                                <svg class="-down" width="9" height="12" viewBox="0 0 9 12" fill="none">
                                    <path d="M9 6L0 0.803848V11.1962L9 6Z" fill="#E0E0E0"/>
                                </svg>
                            </a>
                            <ul class="-droplist">
                                <li>
                                    <a href="#">
                                        Продукт 12
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Продукт 2
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Продукт 3
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Продукт 4
                                    </a>
                                </li>
                            </ul>
                        </li>--}}
        </ul>
    </li>
</ul>
<!-- End Header menu -->