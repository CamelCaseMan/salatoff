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
                            <div class="-prefix">Дата заказа</div>
                            {{ date("d.m.Y / h:i:s", strtotime($order->updated_at))}}
                        </li>
                    </ul>
                    <div class="-repeat repeat-order" data-id="repeat-wrapper-{{$order->id}}">Повторить</div>
                </div>
                <div class="profile__order-products" id="order-{{$order->id}}">
                    <div class="profile__order-products-container" id="repeat-wrapper-{{$order->id}}">
                        @foreach($order->products as $product)
                            <div class="profile__order-product repeat-product" data-id="{{$product->id}}" data-count="{{$product->pivot->count}}">
                                <div class="-photo" style="background-image: url({{$product->image}});"></div>
                                <div class="-body">
                                    <div class="-name">{{$product->name}}</div>
                                    @if($product->show == 1)
                                        <div class="-button typical-button @if(session('basket_status')!=null)
                                        @if(in_array($product->id,session('basket_status')['products_id']))--done @else add-one-button @endif @else add-one-button
                                                @endif " data-id="{{$product->id}}">
                                            <span class="-text">В корзину</span>
                                            <svg class="-icon" width="27" height="18" viewBox="0 0 27 18" fill="none">
                                                <path d="M0.5 7.5L10 17L26 1" stroke="#A2CD3A" stroke-width="1.5"/>
                                            </svg>
                                        </div>
                                        @else
                                        <span class="-empty">Товар закончился</span>
                                    @endif
                                </div>
                                <div class="-quty">{{$product->pivot->count}} шт</div>
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