@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Товари</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="add_products">Добавити товар</a>
            <a type="button" class="btn btn-sm btn-outline-secondary" href="">Загрузити вигрузити EXCEL-файл</a>
        </div>
    </div>
</div>
<table class="col-md-12 text-center table-bordered table" id="products">
    <thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Малюнок</th>
    <th scope="col">Артікул</th>
    <th scope="col">Категорія</th>
    <th scope="col">Кількість</th>
    <th scope="col">Ціна</th>
    <th scope="col">Процентна знижка</th>
    <th scope="col">Закупка</th>
    <th scope="col">Редактувати</th>
    <th scope="col">Видалити</th>
  </tr>
  </thead>
<tbody>
    @foreach ($products as $product)

        <tr>
            <td>{{$product['id']}}</td>
            @foreach ($product->productImages as $images)
                @if ($loop->first)
                     <td><img src="{{asset('storage/'.$images['image'])}}" width="80" height="80"></td>
                @endif
            @endforeach
            <td>{{$product['articul']}}</td>
            @foreach ($categorys as $category)
                @if ($category['id']==$product->productCategory['id_category'])
                    <td>{{$category['name']}}</td>
                @endif
            @endforeach
            @if(!is_null($product->productQuantety))
                <td>{{$product->productQuantety['quantity']}}</td>
            @else
                <td></td>
            @endif
            <td>{{$product['price']}}</td>
            <td>{{$product['discount']}}</td>
            <td>{{$product['zacupka']}}</td>
            <td>
                <a href="{{route('update_product', $product['id'])}}">ЗМІНИТИ</a>
            </td>
            <td>
                <a href="{{route('delete_product', $product['id'])}}">ВИДАЛИТИ</a>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
@endsection
