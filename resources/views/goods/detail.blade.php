@extends('layout.app')
@section('title','список всех товаров')

@section('content')
@include('partials.header')
<div class="main__wrapper">
    <section class="main__product-detail" style="margin-left:30px">
        <div class="product__inner">
            <ul class="product__list" style="list-style:none;">
                <li class="product__list-item product__name"><p class="product_list-item-text">{{$good['name']}}</p></li>
                <li class="product__list-item product__descr"><p class="product_list-item-text">описание:{{$good['description']}}</p></li>
                <li class="product__list-item product__price"><p class="product_list-item-text">Цена:{{$good['price']}}</p></li>
            </ul>
        </div>
    </section>
</div>
@endsection