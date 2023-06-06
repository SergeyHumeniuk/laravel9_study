@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавити товар</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        <a type="button" class="btn btn-sm btn-outline-secondary" href="products">Назад</a>
        </div>
    </div>
</div>
<form class="admin-form" action="{{route('add_products')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="Articl">Артікул</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="Articl" name="articul">
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <select class="form-control form-control-sm" name="category">
                    <option value="">Виберіть категорію</option>
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="name_product">Назва товару</span>
                <input type="text" class="form-control" id="name_product_input" aria-label="Sizing example input" aria-describedby="name_product" name="name_product">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="brend">Бренд</span>
                <input type="text" class="form-control" id="brend_input" aria-label="Sizing example input" aria-describedby="brend" name="brend">
            </div>

        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="color">Колір</span>
                <input type="text" class="form-control" id="color_input" aria-label="Sizing example input" aria-describedby="color" name="color">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="country">Країна</span>
                <input type="text" class="form-control" id="country_input" aria-label="Sizing example input" aria-describedby="country" name="country">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="sklad">Склад</span>
                <input type="text" class="form-control" id="sklad_input" aria-label="Sizing example input" aria-describedby="sklad" name="sklad">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="big_opis">Опис</span>
                <textarea name="big_opis" rows="5" cols="55"></textarea>
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input_fields_wrap">
                    <button class="add_field_button">Добавити опцію</button><br><br>
                    <label class="option-product-text" for="name_option">Назва опції</label><label class="option-product-text" for="value_option">Значення опції</label>
                    <div><input type="text" id="name_option" name="name_option[]"/> <input type="text" id="value_option"  name="value_option[]"/></div>
                </div>

            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="quantity">Кількість</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="quantity" name="quantity">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="price">Ціна</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="price" name="price">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="discount">Знижка (процент для показу старої ціни)</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="discount" name="discount">
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="zakupka">Закупочна ціна</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="zakupka" name="zakupka">
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="new_product">Поставити у новий продукт</span>
                <input type="checkbox" name="new_product" value="1">
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="top_sale">Поставити у топ продаж</span>
                <input type="checkbox" name="top_sale" value="1">
            </div>
        </div>
        <div class="input-group mb-3">
            <label for="picture">Малюнок</label>
            <input type="file" class="form-control-file" id="Picture" name="picture[]" multiple="">
        </div>
        <div class="text-right">
            <button type="submit">Відправити</button>
        </div>
    </form>
@endsection
