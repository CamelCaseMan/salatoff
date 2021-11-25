<div id="wndw-products-info-{{$key}}" class="modal">
    <div class="modal__container">
        <div class="modal__bg close-modal"></div>
        <div class="modal__body">
            <div class="modal__close close-modal">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path d="M13 1L1 13M1 1L13 13" stroke="#272727" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="modal__title" style="font-size: 1.5rem;">Были заказаны продукты:</div>
            <div class="modal__user-modal">
                <ul class="-chars">
                    <ul>
                        @foreach($order->products as $key => $product)
                            <li>
                                <div class="-item">{{$key + 1}}. {{$product->name}}</div>
                                <div class="-item">{{$product->pivot->count}} шт.</div>

                                <div class="-price">{{$product->price}} ₽</div>
                            </li>
                        @endforeach
                    </ul>
                </ul>
            </div>
        </div>
    </div>
</div><?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 24.11.2021
 * Time: 16:34
 */