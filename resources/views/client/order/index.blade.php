<div class="tab-pane fade show" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    @foreach($orders as $order)
        
        <div class="order">
            <div class="order__header">
                <div class="order__title expand-toggler" data-expand="order-{{$order->id}}">
                    <div class="-left">
                        Заказ №{{$order->id}}
                    </div>
                    <div class="-right">
                        <svg width="25" height="15" viewBox="0 0 25 15" fill="none">
                            <path d="M1 1.5L12.5 13L24 1.5" stroke="black" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <ul class="order__chars">
                    <li>
                        <div class="-prefix">Номер для связи</div>
                        {{$order->phone}}
                    </li>
                    <li>
                        <div class="-prefix">Дата и время</div>
                        {{$order->updated_at}}
                    </li>
                </ul>
            </div>
            <div class="order__products" id="order-{{$order->id}}">
                <div class="order__products-container">
                    @foreach($order->products as $product)
                        <div class="order__product">
                            <div class="-photo" style="background-image: url({{$product->image}});"></div>
                            <div class="-body">
                                <div class="-name">{{$product->name}}</div>
                                <div class="btn btn-success add-one-button" data-id="{{$product->id}}">В корзину</div>
                                <div class="btn btn-danger remove-button" data-id="{{$product->id}}">Удалить</div>
                            </div>
                            <div class="-quty">1 шт</div>
                            <div class="-price">{{$product->price}} руб.</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="order__footer">
                <div class="-title">
                    Итого
                </div>
                <div class="-num">{{$order->getFullPrice()}} руб.</div>
            </div>
        </div>

    @endforeach
</div>