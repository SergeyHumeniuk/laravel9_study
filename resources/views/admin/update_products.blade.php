@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактувати данні про товар</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        <a type="button" class="btn btn-sm btn-outline-secondary" href="products">Назад</a>
        </div>
    </div>
</div>

<form class="admin-form" action="{{route('update_product',$products['id'])}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="Articl">Артікул</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="Articl" name="articul" value="{{$products['articul']}}">
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="categorys">Категорія</span>
                <select class="form-control form-control-sm" name="category">

                    @foreach ($categories as $category)
                        @if ($category['id'] == $products->productCategory['id_category'])
                            <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                        @else
                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="name_product">Назва товару</span>
                <input type="text" class="form-control" id="name_product_input" aria-label="Sizing example input" aria-describedby="name_product" name="name_product" value="{{$products['name']}}">
            </div>

        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="big_opis">Опис</span>
                <textarea name="big_opis" rows="5" cols="55">{{$products['description']}}</textarea>
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="add_field_button">Добавити опцію</button><br><br>
                <span class="input-group-text" id="size">Опції товара</span>
                <label class="option-product-text" for="name_option">Назва опції</label><label class="option-product-text" for="value_option">Значення опції</label>
                <div>

                    @if (count($products->productOptions) > 0)
                    @foreach ($products->productOptions as $option)
                        <input type="text" id="name_option" name="name_option[]" value="{{$option['name_option']}}" /> <input type="text" id="value_option"  name="value_option[]" value="{{$option['value_option']}}" /><br>
                    @endforeach
                    @else
                        <input type="text" id="name_option" name="name_option[]"/> <input type="text" id="value_option"  name="value_option[]"/>
                    @endif

                </div>

            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="quantity">Кількість</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="quantity" name="quantity" value="{{$products->productQuantety['quantity']}}">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="price">Ціна</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="price" name="price" value="{{$products['price']}}">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="discount">Знижка (процент для показу старої ціни)</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="discount" name="discount" value="{{$products['discount']}}">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="zakupka">Закупочна ціна</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="zakupka" name="zakupka" value="{{$products['zacupka']}}">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="new_product">Поставити у новий продукт</span>
                <input type="checkbox" name="new_product" value="1" {{ $products['new_prod'] ? 'checked="checked"' : '' }}>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="top_sale">Поставити у топ продаж</span>
                <input type="checkbox" name="top_sale" value="1" {{ $products['top_sale'] ? 'checked="checked"' : '' }}>
            </div>
        </div>
        <div class="input-group mb-3">
            <label for="picture">
                @foreach ($products->productImages as $images)
                    @if ($loop->first)
                        <td><img src="{{asset('storage/'.$images['image'])}}" width="50" height="50"></td>
                    @endif
                @endforeach
            </label>
            <input type="file" class="form-control-file" id="Picture" name="picture[]" multiple="">
        </div>
        <div class="text-right">
            <button type="submit">Зберегти зміни</button>
        </div>
    </form>
@endsection
