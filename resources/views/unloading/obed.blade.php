<catalog>
    <menu date="2021-12-20">
        @foreach($products as $product)
            <product id="{{$product['id']}}">
                <category_id>{{$product['category_id']}}</category_id>
                <name><![CDATA[{{$product['name']}}]]></name>
                <description><![CDATA[{{$product['description']}}]]></description>
                <portion>{{$product['portion']}}</portion>
                <unit>{{$product['unit']}}</unit>
                <price>{{$product['price']}}</price>
                <calorie100>{{$product['calorie100']}}</calorie100>
                <picture>{{$product['picture']}}</picture>
            </product>
        @endforeach
    </menu>
</catalog>
