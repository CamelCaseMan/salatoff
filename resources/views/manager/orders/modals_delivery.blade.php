<div id="mw-delivery-info_{{$key}}" class="manager-modals__modal manager-modal">
    <div class="manager-modal__header">
        <div class="-title">Информация по доставке</div>
        <div class="-close close-modal">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M1 1L14 14M14 1L1 14" stroke="black" stroke-width="1.5"/>
            </svg>
        </div>
    </div>
    <div class="manager-modal__content">
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