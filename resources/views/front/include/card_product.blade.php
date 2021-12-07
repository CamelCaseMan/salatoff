<div class="product-page__product-wrapper mb-160 s-mb-80">
    <div class="product-page__product-container">

        <div class="-title-row mb-20 d-none s-d-block">
            <div class="-title">{{$product->name}}</div>
            @if(isset($product->getAttributeProduct->weight) && !is_null($product->getAttributeProduct->weight))
                <div class="-weight">{{$product->getAttributeProduct->weight}}г</div>
            @endif
        </div>

        <div class="-photo s-mb-20">
            @if(!is_null($product->image))
                <img src="{{$product->image}}" alt="{{$product->name}}">
            @else
                <img src="{{asset('theme')}}/img/image-plug.jpg" alt="Изображения пока нет">
            @endif
            <!-- ! Второе изображение -->
            <img class="-hover-image" src="{{asset('theme')}}/img/image-plug.jpg" alt="{{$product->name}}">
        </div>
        <div class="-info-side">

            <div class="-title-row mb-40 s-d-none">
                <div class="-title">{{$product->name}}</div>
                @if(isset($product->getAttributeProduct->weight) && !is_null($product->getAttributeProduct->weight))
                    <div class="-weight">{{$product->getAttributeProduct->weight}}г</div>
                @endif
            </div>

            <div class="-info-table mb-40 xs-mb-30">
                @if(isset($product->getAttributeProduct->composition))
                    <div class="-info">
                        <div class="-property">Состав</div>
                        <p>{{$product->getAttributeProduct->composition}}</p>
                    </div>
                @endif
                @if(isset($product->getAttributeProduct->nutrients))
                    <div class="-info">
                        <div class="-property">Пищевая ценность на 100 г.</div>
                        <p>{{$product->getAttributeProduct->nutrients}}</p>
                    </div>
                @endif
                @if(isset($product->getAttributeProduct->energy))
                    <div class="-info">
                        <div class="-property">Энергетическая ценность на 100 г.</div>
                        <p>{{$product->getAttributeProduct->energy}}</p>
                    </div>
                @endif
                @if(isset($product->getAttributeProduct->implementation_period))
                    <div class="-info">
                        <div class="-property">Срок реализации</div>
                        <p>{{$product->getAttributeProduct->implementation_period}}</p>
                    </div>
                @endif
            </div>

            <div class="-quty-row mb-40 xs-mb-30">
                <div class="-quty quty-interface">
                    <div class="-btn quty-interface-btn" data-quty="-">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M30.7694 16.0001C30.7694 7.84622 24.154 1.23083 16.0002 1.23083C7.84634 1.23083 1.23096 7.84622 1.23096 16.0001C1.23096 24.1539 7.84634 30.7693 16.0002 30.7693C24.154 30.7693 30.7694 24.1539 30.7694 16.0001Z"
                                  stroke="#828282" stroke-miterlimit="10"/>
                            <path d="M22.1539 16H9.84619" stroke="#828282" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="-num quty-interface-value quty-start" data-value="@if(session('basket_status')!=null)
                    @if(in_array($product->id,session('basket_status')['products_id'])) {{session('basket_status')['products'][$product->id]}} @else
                            1 @endif
                    @else
                            1
                        @endif">
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
                <div class="-price">{{$product->price}} ₽</div>
            </div>

            <div class="typical-button -button add-cart-button" data-id="{{$product->id}}">
                @if(session('basket_status')!=null)
                    @if(in_array($product->id,session('basket_status')['products_id']))Изменить количество @else
                        Добавить в
                        корзину @endif
                @else Добавить в корзину @endif
            </div>
        </div>
    </div>
</div>