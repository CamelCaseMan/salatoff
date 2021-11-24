@foreach($orders as $key =>$order)
<div id="wndw-user-info-{{$key}}" class="modal">
    <div class="modal__container">
        <div class="modal__bg close-modal"></div>
        <div class="modal__body">
            <div class="modal__close close-modal">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path d="M13 1L1 13M1 1L13 13" stroke="#272727" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="modal__title" style="font-size: 1.5rem;">Информация о пользователе</div>
            <div class="modal__user-modal">
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
                    <p>Клиент не зарегистрирован</p>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- @include('manager.orders.modals_delivery')--}}
@endforeach