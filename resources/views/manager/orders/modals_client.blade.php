<div class="manager-modals">
    <div class="manager-modals__bg close-modal"></div>
    @foreach($orders as $key =>$order)
        <div id="mw-user-info_{{$key}}" class="manager-modals__modal manager-modal">
            <div class="manager-modal__header">
                <div class="-title">Зарегистрирован на сайте</div>
                <div class="-close close-modal">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                        <path d="M1 1L14 14M14 1L1 14" stroke="black" stroke-width="1.5"/>
                    </svg>
                </div>
            </div>
            <div class="manager-modal__content">
                @if(!is_null($order->user_id))
                    <ul class="-chars">
                        <li>
                            <div class="-prefix">Клиент</div>
                            {{$order->user['name']}}
                        </li>
                        <li>
                            <div class="-prefix">Почта</div>
                            {{$order->user['email']}}
                        </li>
                        <li>
                            <div class="-prefix">Регистрации на сайте</div>
                            {{$order->user['created_at']}}
                        </li>
                    </ul>
                    @else
                    <h3>Клиент не зарегистрирован</h3>
                @endif
            </div>
        </div>
    {{-- @include('manager.orders.modals_delivery')--}}
    @endforeach
</div>