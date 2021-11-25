<div class="magic-tab profile__tab" id="profile-tab-02">
    @if(count($orders) < 1)
        <p>История заказов пуста</p>
    @else
        @foreach($orders as $order)
            <div class="profile__order">
                <div class="profile__order-header">
                    <div class="profile__order-title expand-toggler" data-expand="order-{{$order->id}}">
                        <div class="-left">
                            Заказ №{{$order->id}}
                        </div>
                        <div class="-right">
                            <svg width="25" height="15" viewBox="0 0 25 15" fill="none">
                                <path d="M1 1.5L12.5 13L24 1.5" stroke="black" stroke-width="2"/>
                            </svg>
                        </div>
                    </div>
                    <ul class="profile__order-chars">
                        <li>
                            <div class="-prefix">Номер для связи</div>
                            {{$order->phone}}
                        </li>
                        <li>
                            <div class="-prefix">Дата и время</div>
                            {{$order->updated_at}}
                        </li>
                    </ul>
                    <div class="-repeat">Повторить</div>
                </div>
                <div class="profile__order-products" id="order-{{$order->id}}">
                    <div class="profile__order-products-container">
                        @foreach($order->products as $product)
                            <div class="profile__order-product">
                                <div class="-photo" style="background-image: url({{$product->image}});"></div>
                                <div class="-body">
                                    <div class="-name">{{$product->name}}</div>
                                    <div class="typical-button add-one-button" data-id="{{$product->id}}">В корзину
                                    </div>
                                </div>
                                <div class="-quty">1 шт</div>
                                <div class="-price">{{$product->price}} руб.</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="profile__order-footer">
                    <div class="-title">
                        Итого
                    </div>
                    <div class="-num">{{$order->getFullPrice()}} руб.</div>
                </div>
            </div>
        @endforeach
    @endif
</div>