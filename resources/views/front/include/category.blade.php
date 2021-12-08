<div class="catalog-page__wrapper --products">
    @foreach($products as $product)
        <a href="{{Request::url()}}/{{$product->slug}}" class="catalog-page__product">
            <div class="-img">
                @if(!is_null($product->image))
                    <img src="{{$product->image}}" alt="{{$product->name}}">
                @else
                    <img src="{{asset('theme')}}/img/image-plug.jpg" alt="Изображения пока нет">
                @endif
                @if(isset($product->add_image) && !is_null($product->add_image))
                <!-- ! Второе изображение -->
                    <img class="-hover-image" src="{{$product->add_image}}" alt="{{$product->name}}">
                @endif
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

                    <div class="-quty-complex quty-complex-selector">
                        <div class="-button typical-button @if(session('basket_status')!=null)
                        @if(in_array($product->id,session('basket_status')['products_id']))--done @else add-one-button @endif @else add-one-button
                                @endif " data-id="{{$product->id}}" data-url="/{{$product->slug}}">
                            <span class="-text">В корзину</span>
                            <svg class="-icon" width="27" height="18" viewBox="0 0 27 18" fill="none">
                                <path d="M0.5 7.5L10 17L26 1" stroke="#A2CD3A" stroke-width="1.5"/>
                            </svg>
                        </div>

                        <div class="-quty basket-row-intenface" data-count="
                            @if(session('basket_status')!=null)
                            @if(in_array($product->id,session('basket_status')['products_id'])) {{session('basket_status')['products'][$product->id]}} @else
                                1 @endif
                            @else
                                1
                            @endif
                        " data-id="{{$product->id}}">
                            <div class="-btn quty-interface-btn" data-quty="-">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M30.7694 16.0001C30.7694 7.84622 24.154 1.23083 16.0002 1.23083C7.84634 1.23083 1.23096 7.84622 1.23096 16.0001C1.23096 24.1539 7.84634 30.7693 16.0002 30.7693C24.154 30.7693 30.7694 24.1539 30.7694 16.0001Z"
                                            stroke="#828282" stroke-miterlimit="10"/>
                                    <path d="M22.1539 16H9.84619" stroke="#828282" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="-num quty-interface-value quty-start"
                            data-value="
                                @if(session('basket_status')!=null)
                                @if(in_array($product->id,session('basket_status')['products_id'])) {{session('basket_status')['products'][$product->id]}} @else
                                    1 @endif
                                @else
                                    1
                                @endif
                            ">
                                @if(session('basket_status')!=null)
                                @if(in_array($product->id,session('basket_status')['products_id'])) {{session('basket_status')['products'][$product->id]}} @else
                                    1 @endif шт.
                                @else
                                    1 шт.
                                @endif
                            </div>
                            <div class="-btn quty-interface-btn" data-quty="+">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M30.7694 16.0001C30.7694 7.84622 24.154 1.23083 16.0002 1.23083C7.84634 1.23083 1.23096 7.84622 1.23096 16.0001C1.23096 24.1539 7.84634 30.7693 16.0002 30.7693C24.154 30.7693 30.7694 24.1539 30.7694 16.0001Z"
                                            stroke="#828282" stroke-miterlimit="10"/>
                                    <path d="M22.1539 16H9.84619M16 9.84619V22.1539V9.84619Z" stroke="#828282"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>