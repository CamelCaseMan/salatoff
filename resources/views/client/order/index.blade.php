<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <p class="profile__title">Архив заказов</p>

    @foreach($orders as $order)
        <div class="profile__block profile__order">
            <p class="profile__order-number">
                Номер заказа: {{$order->id}}
                <span class="profile__order-arrow d-none d-md-inline"><img
                            src="{{asset('theme/images/right.png')}}" alt=""></span>
            </p>
            <div class="profile__order-wrap">
                <p class="profile__order-info profile__order-date">{{$order->created_at}}</p>
                <p class="profile__order-info profile__order-adress d-none d-md-block">
                    {{$order->adres}} @if($order->porch) Подъезд: {{$order->porch}}@endif  @if($order->intercom)
                        Домофон: {{$order->intercom}}@endif @if($order->floor)
                        Этаж: {{$order->floor}}@endif  @if($order->flat) Квартира: {{$order->flat}}@endif</p>
                <div id="status-order">Начисление баллов: @if($order->status_points == 0)В обработке @elseБаллы добавлены@endif</div>
            </div>


            <div class="profile__order-products">

                @foreach($order->productsOrder as $product)
                    @if(isset($product->products->id))
                        <div class="profile__order-product d-flex">
                            <div class="profile__order-img d-none d-md-block">
                                @if(empty($product->products->image))
                                    <img src="{{Storage::url('products/zaglush.jpg')}}" alt="not-images">
                                @else
                                    <img src="{{Storage::url($product->products->image)}}" alt="{{$product->products->name}}">
                                @endif
                            </div>
                            <div class="profile__order-product-info">
                                <p class="profile__order-product-title-wrap d-flex">
                                    <span class="profile__product-title">{{$product->products->name}}</span>
                                    <span class="profile__product-count">{{$product->value}} шт</span>
                                    <span class="profile__product-cost">{{$product->price * $product->value}} ₽</span>
                                </p>
                                <p class="profile__order-product-compos d-none d-md-block">{{$product->products->composition}}</p>
                                <a href="#" data-id="{{$product->products->id}}" class="add-btn-product btn btn-info">Добавить
                                    в корзину</a>
                            </div>
                        </div>
                    @endif
                @endforeach
                @if(!empty($order->comment))
                    <p class="profile__order-product d-flex profile__delivery">
                        <span class="profile__product-title">Комментарий к заказу</span>
                        <span class="profile__product-cost profile__product-cost_delivery">{{$order->comment}}</span>
                    </p>
                @endif
                @if(($order->status_points) == 1)
                    <div id="points">Количество баллов за заказ: {{$order->points}}</div>
                @endif
            </div>
            <p class="profile__order-sum">
                <span class="profile__order-left">Итого</span>
                <span class="profile__order-right">{{$order->total_price}} ₽</span>

            </p>
        </div>

    @endforeach


</div>