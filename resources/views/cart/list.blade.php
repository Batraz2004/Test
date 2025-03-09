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
                                <div class="product__form">
                                    <div class="product__inner">
                                            <ul class="product__list" style="list-style:none;">
                                                <li class="product__list-item product__name"><p class="product_list-item-text">{{$item['name']}}</p></li>
                                                <li class="product__list-item product__descr"><p class="product_list-item-text">описание:{{$item['description']}}</p></li>
                                                <li class="product__list-item product__price"><p class="product_list-item-text">Цена:{{$item['price']}}</p></li>
                                                <li class="product__list-item product__price"><p class="product_list-item-text">кол-во:{{$item['quantity']}}</p></li>

                                            </ul>
                                    </div>
                                    <Form class="" name="product-form" method="POST" action="{{route("orderCompleteById")}}"> 
                                        @csrf 
                                        <div class="product__form-inner">
                                            <input type="hidden" name="id" value="{{$item['id']}}">
                                            <input type="hidden" name="goodsId" value="{{$item['goods_id']}}">
                                            <input type="hidden" name="name" value="{{$item['name']}}">
                                            <input type="hidden" name="price" value="{{$item['price']}}">
                                            <input type="hidden" name="quantity" value="{{$item['quantity']}}">
                                            <input type="hidden" name="description" value="{{$item['description']}}">
                                            <input type="text" name="comment" value="" style="width:100%" placeholder="комментарий">
                                            <input type="text" name="address" value="" style="width:100%" placeholder="адресс">


                                        </div>
                                        <div class="button__pannel">
                                            <button type="submit" class="catalog__button" name="submit" value="complete-order-id"><p>оформить заказ</p></button>
                                        </div>
                                    </Form>
                                    <Form class="" name="product-form" method="POST" action="{{route("cartEdit")}}"> 
                                        @csrf  
                                        
                                        <div class="product__form-inner">
                                            <input type="hidden" name="id" value="{{$item['id']}}">
                                            <input type="hidden" name="goodsId" value="{{$item['goods_id']}}">
                                            <input type="hidden" name="name" value="{{$item['name']}}">
                                            <input type="hidden" name="price" value="{{$item['price']}}">
                                            <input type="hidden" name="quantity" value="{{$item['quantity']}}">
                                        </div>
                                        <div class="button__pannel">
                                            <button type="submit" class="catalog__button" name="submit" value="detail-id"><p>подробнее</p></button>
                                            <button type="submit" class="catalog__button" name="submit" value="delete-id"><p>удалить</p></button>
                                        </div>
                                    </Form>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection