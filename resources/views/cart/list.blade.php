@extends('layout.app')
@section('title','список всех товаров')

@section('content')
@include('partials.header')
<div class="main__wrapper">
    <section class="main__catalog" style="margin-left:30px">
            <div class="main__catalog-content">
                <h3 class="main__catalog-content-title"> Корзина </h3>
                <div class="main__catalog-wrapper">
                    <div class ="main__catalog-content-product product"> 
                            <div class="main__catalog-content-produc__inner">
                                @foreach($cartItems as $item)
                                    <Form class="product__form" name="product-form" method="POST" action="{{route("goodsEdit")}}"> 
                                    @csrf  
                                        <div class="product__inner">
                                            <ul class="product__list" style="list-style:none;">
                                                <li class="product__list-item product__name"><p class="product_list-item-text">{{$item['name']}}</p></li>
                                                <li class="product__list-item product__descr"><p class="product_list-item-text">описание:{{$item['description']}}</p></li>
                                                <li class="product__list-item product__price"><p class="product_list-item-text">Цена:{{$item['price']}}</p></li>
                                            </ul>
                                            <input type="hidden" name="goodsId" value="{{$item['id']}}">
                                            <input type="hidden" name="goodsName" value="{{$item['name']}}">
                                            <input type="hidden" name="goodsPrice" value="{{$item['price']}}">
                                            <input type="hidden" name="goodsCount" value="{{$item['quantity']}}">
                                        </div>
                                        <div class="button__pannel">
                                            <button type="submit" class="catalog__button" name="submit" value="add-cart-id"><p>формить заказ</p></button>
                                            <button type="submit" class="catalog__button" name="submit" value="delete-id"><p>удалить</p></button>
                                        </div>
                                    </Form>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection