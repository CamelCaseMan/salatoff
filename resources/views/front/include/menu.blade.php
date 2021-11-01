<!-- Header menu -->
<div class="magic-complex-menu s-d-none">
    <ul class="header__menu magic-menu">
        <li id="hm-001">
            <div class="-link">
                Каталог
            </div>
        </li>
    </ul>
    <ul class="-droplist magic-menu" data-drop-to="hm-001">
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
                        <a href="/shop/{{$parent->slug}}/{{$children->slug}}" class="-link">
                            {{$children->name}}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    @endforeach
</div>
<!-- End Header menu -->