@if(count($product->getRecommendationsProducts) > 0)
    <div class="product-page__recommendations">
        <div class="second-title">
            С этим товаром <br> сочетается
        </div>
        <div class="catalog-page__wrapper --products">
            @foreach($product->getRecommendationsProducts as $recommendation)
                @php
                    $parent_url = $recommendation->getCategory->getParentSlug($recommendation->getCategory->parent_id);
                @endphp
                <a target="_blank " href="@if(!is_null($parent_url))/shop/{{$parent_url->slug}}@endif/{{$recommendation->getCategory->slug}}/{{$recommendation->slug}}"
                   class="catalog-page__product">
                    <div class="-img">
                        <img src="{{$recommendation->image}}" alt="{{$recommendation->name}}">
                    </div>
                    <div class="-content">
                        <div class="-name-row">
                            <div class="-name">{{$recommendation->name}}</div>
                            @if(!is_null($recommendation->weight))
                                <div class="-weight">{{$recommendation->weight}}г</div>
                            @endif
                        </div>
                        <div class="-price-row">
                            <div class="-price">{{$recommendation->price}} ₽</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endif