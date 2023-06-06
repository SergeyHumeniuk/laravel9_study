@extends('layouts.admin')
@section('content')
@php
//берем з таблиці налоштувань
        $phone = '';
        $email = '';
        $adres = '';
        $title = '';
        $about_us = '';
        $contact_us = '';
        $privacy_policy = '';
        $orders_returns = '';
        $terms_conditions = '';
        $text_baner_maine_proposition = '';
        $baner_maine_proposition = '';
        $logo = '';
    if (isset($settings) && $settings != null){
        foreach ($settings as $seting){
            $phone = $seting['phone'];
            $email = $seting['email'];
            $adres = $seting['adres'];
            $title = $seting['title'];
            $about_us = $seting['about_us'];
            $contact_us = $seting['contact_us'];
            $privacy_policy = $seting['privacy_policy'];
            $orders_returns = $seting['orders_returns'];
            $terms_conditions = $seting['terms_conditions'];
            $text_baner_maine_proposition = $seting['text_maine_proposition'];
            $baner_maine_proposition = $seting['baner_maine_proposition'];
            $logo = $seting['media-logo'];
        }
    }
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Настройки</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        <a type="button" class="btn btn-sm btn-outline-secondary" href="products">Назад</a>
        </div>
    </div>
</div>
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Загальні</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Медіа</button>
      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Інформація</button>
      <button class="nav-link" id="nav-baners-tab" data-bs-toggle="tab" data-bs-target="#nav-baners" type="button" role="tab" aria-controls="nav-baners" aria-selected="false">Банера</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <form class="nav-link" action="{{route('add-setting')}}" method="POST" >
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_title">Назва фірми</span>
                    <input type="text" class="form-control"  name="title"  value="{{$title}}" placeholder="Короткий опис фірми">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_phone">Телефон</span>
                    <input type="phone" class="form-control"  name="phone"  value="{{$phone}}" placeholder="phone">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_email">Email</span>
                    <input type="email" class="form-control"  name="email"  value="{{$email}}" placeholder="email">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_adres">Адреса</span>
                    <input type="text" class="form-control"  name="adres"  value="{{$adres}}" placeholder="адреса">
                </div>
            </div>
            <input type="hidden" name="all_setting" value="all_setting" />
          <input type="submit" value="Записати" />
        </form>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="admin-section">
            <div class="input-group mb-3">
                <div class="input-group-prepend" style="background-color: #807a7a">
                    <span class="input-group-text" id="name_login">Login (170x70 px)</span>
                    <img src="{{asset('storage/' . $logo)}}" alt="" width="60">
                </div>
            </div>
            <form action="{{route('add-setting')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control-file"  name="picture">
                <div class="text-right">
                    <button type="submit">Відправити</button>
                </div>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <form action="{{route('add-setting')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="information_block" valeue="yes">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_about_us">Про нас</span>
                    <textarea name="about_us" rows="4" cols="50" class="form-control" value="">{{ $about_us }}</textarea>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_contact_us">Контакти</span>
                    <textarea name="contact_us" rows="4" cols="50" class="form-control" value="">{{ $contact_us }}</textarea>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_privacy_policy">Політика конфеденційності</span>
                    <textarea name="privacy_policy" rows="4" cols="50" class="form-control" value="{{ $privacy_policy }}">{{ $privacy_policy }}</textarea>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_orders_returns">Замовлення та повернення</span>
                    <textarea name="orders_returns" rows="4" cols="50" class="form-control" value="{{ $orders_returns }}">{{ $orders_returns }}</textarea>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_terms_conditions">Правила та умови</span>
                    <textarea name="terms_conditions" rows="4" cols="50" class="form-control" value="{{ $terms_conditions }}">{{ $terms_conditions }}</textarea>
                </div>
            </div>
            <div class="text-right">
                <button type="submit">Відправити</button>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="nav-baners" role="tabpanel" aria-labelledby="nav-baners-tab">
        <div class="admin-section">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Виберіть категорії, що відображаються банерами на головній сторінці</span>

                </div>
            </div>
            <form action="{{route('add-setting')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($categorys as $category)
                    @if ($category['show_baners']==1)
                        <input type="checkbox" id="cat_{{$category['id']}}" name="category_baners[]" value="{{$category['id']}}" checked>
                        <label for="cat_{{$category['id']}}">{{$category['name']}}</label><br>
                    @else
                        <input type="checkbox" id="cat_{{$category['id']}}" name="category_baners[]" value="{{$category['id']}}">
                        <label for="cat_{{$category['id']}}">{{$category['name']}}</label><br>
                    @endif

                @endforeach
                <div class="text-right">
                    <button type="submit">Відправити</button>
                </div>
            </form>
        </div>
        <div class="admin-section">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name_login">Банер між товарами на головній</span>
                    <img src="{{asset('storage/' . $baner_maine_proposition)}}" alt="" width="60">
                </div>
            </div>
            <form action="{{route('add-setting')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control-file"  name="baner_maine_proposition"><br>
                <textarea name="text_baners_maine_proposition" rows="4" cols="50" class="form-control" value="">{{ $text_baner_maine_proposition }}</textarea>
                <div class="text-right">
                    <button type="submit">Відправити</button>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection
