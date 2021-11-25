<!-- Header menu -->
<div class="magic-complex-menu s-d-none">
    <ul class="header__menu magic-menu">
        <li>
            <div class="-link">
                Каталог
                <svg class="-down" width="14" height="9" viewBox="0 0 14 9" fill="none">
					<path d="M7 9L13.9282 0H0.0717969L7 9Z" fill="#E0E0E0"></path>
				</svg>
            </div>
            <ul class="-droplist magic-menu">
                <li>
                    <a href="/shops-and-cafes" class="-link">
                        Магазинам и кафе
                    </a>
                </li>
                <li>
                    <a href="/dinner" class="-link">
                        Домой и в офис
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- <ul class="-droplist magic-menu" data-drop-to="hm-001">
        @foreach($parents as $parent)
            <li id="hm-0{{$parent->id}}">
                <a href="#" class="-link">
                    {{$parent->name}}
                </a>
            </li>
        @endforeach
    </ul>
    @foreach($parents as $parent)
        <ul class="-droplist magic-menu" data-drop-to="hm-0{{$parent->id}}">
            @foreach($categories as $key => $children)
                @if($children->parent_id == $parent->id)
                    <li>
                        <a href="/shops-and-cafes/{{$parent->slug}}/{{$children->slug}}" class="-link">
                            {{$children->name}}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    @endforeach -->
</div>
<!-- End Header menu -->