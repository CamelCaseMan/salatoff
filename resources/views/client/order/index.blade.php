

@foreach($orders as $order)
    <h2>Заказ номер: {{$order->id}}</h2>
    <p>Номер для связи: {{$order->phone}}</p>
    <p>Заказ создан: {{$order->updated_at}}</p>
    <h2>Что заказал:</h2>
    <ul>
        @foreach($order->products as $product)
            <li>Название: {{$product->name}}</li>
            <li>Цена: {{$product->price}}</li>
            <li>Фото: <img src="{{$product->image}}" alt="{{$product->name}}"></li>
        @endforeach
    </ul>
    <h3>Итого: {{$order->getFullPrice()}}</h3>
@endforeach