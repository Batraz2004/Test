@extends('layout.app')
@section('title','список всех товаров')

@section('content')
@include('partials.header')
<div class="main__wrapper">
    <section class="main__catalog" style="margin-left:30px">
        <div class="container">
            <div class="main__catalog-wrapper">
                <div class="main__catalog-content">
                    @foreach($categories as $category)
                    <h3 class="main__catalog-content-title"> {{$category['name']}} товар </h3>
                        @foreach($category['goods'] as $product)
                            <Form class="Product" name="Product-form" method="POST"> 
                                <div class="Product__inner">
                                    <ul class="Product__list" style="list-style:none;">
                                        <li class="Product__list-item Product__name"><p class="product_list-item-text">{{$product['name']}}</p></li>
                                        <li class="Product__list-item Product__descr"><p class="product_list-item-text">описание:{{$product['description']}}</p></li>
                                        <li class="Product__list-item Product__price"><p class="product_list-item-text">Цена:{{$product['price']}}</p></li>
                                    </ul>
                                    <input type="hidden" name="goodsId" value="{{$product['id']}}">
                                    <input type="hidden" name="goodsName" value="{{$product['name']}}">
                                    <input type="hidden" name="goodsPrice" value="{{$product['price']}}">
                                    <input type="hidden" name="goodsCount" value="{{$product['count']}}">
                                </div>
                                <div class="button__pannel">
                                        <button type="submit" class="Catalog__button" name="edit-id" value=""><p>редактировать</p></button>
                                        <button type="submit" class="Catalog__button" name="add-id" value=""><p>Добавить в корзину</p></button>
                                    </div>
                            </Form>
                        @endforeach

                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
@endsection