<div class="catalog-page__wrapper --products">
    @foreach($products as $product)
        <a href="{{Request::url()}}/{{$product->slug}}" class="catalog-page__product">
            <div class="-img">
                @if(!is_null($product->image))
                    <img src="{{$product->image}}" alt="{{$product->name}}">
                @else
                    <img src="{{asset('theme')}}/img/image-plug.jpg" alt="Изображения пока нет">
                @endif
                <!-- ! Второе изображение -->
                <img class="-hover-image" src="{{asset('theme')}}/img/image-plug.jpg" alt="{{$product->name}}">
            </div>
            <div class="-content">
                <div class="-name-row">
                    <div class="-name">{{$product->name}}</div>
                    @if(isset($product->weight))
                        <div class="-weight">{{$product->weight}}г</div>
                    @endif
                </div>
                <div class="-price-row">
                    <div class="-price">{{$product->price}} ₽</div>
                    <div class="-button typical-button @if(session('basket_status')!=null)
                    @if(in_array($product->id,session('basket_status')['products_id']))--done @else add-one-button @endif @else add-one-button
                            @endif " data-id="{{$product->id}}" data-url="/{{$product->slug}}">
                        <span class="-text">В корзину</span>
                        <svg class="-icon" width="27" height="18" viewBox="0 0 27 18" fill="none">
                            <path d="M0.5 7.5L10 17L26 1" stroke="#A2CD3A" stroke-width="1.5"/>
                        </svg>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>