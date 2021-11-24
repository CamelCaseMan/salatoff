<div id="wndw-delivery-info-{{$key}}" class="modal">
    <div class="modal__container">
        <div class="modal__bg close-modal"></div>
        <div class="modal__body">
            <div class="modal__close close-modal">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path d="M13 1L1 13M1 1L13 13" stroke="#272727" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="modal__title" style="font-size: 1.5rem;">Информация по доставке</div>
            <div class="modal__user-modal">
                <ul class="-chars">
                    @foreach($order->getInfoDelivery() as $text)
                        <li>
                            <div class="-prefix">{{$text['name']}}</div>
                            {{$text['value']}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>