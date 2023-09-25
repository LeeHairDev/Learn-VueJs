<h1>All Products</h1>

<ul>
    @foreach ($products as $product)
        <li>
           <a href="/products/{{ $product['id'] }}">
           {{ $product['name'] }} <strong>{{ $product['price'] }}</strong>
           </a>
    </li>
    @endforeach
</ul>

<a href="/products/create"><b>create product</b></a>