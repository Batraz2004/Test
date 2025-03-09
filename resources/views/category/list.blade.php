@extends('layout.app')
@section('title','список всех товаров')

@section('content')
@include('partials.header')
<div class="main__wrapper">
    <section class="main__catalog" style="margin-left:30px">
            <div class="main__catalog-content">
                <div class="main__catalog-wrapper">
                    @foreach($categories as $category)
                    <div class ="main__catalog-content-product product"> 
                        <h3 class="main__catalog-content-title"> {{$category['name']}} товар </h3>
                            <div class="main__catalog-content-produc__inner">
                                @foreach($category['goods'] as $product)
                                <div class="product__form">
                                    <div class="product__inner">
                                            <ul class="product__list" style="list-style:none;">
                                                <li class="product__list-item product__name"><p class="product_list-item-text">{{$product['name']}}</p></li>
                                                <li class="product__list-item product__descr"><p class="product_list-item-text">описание:{{$product['description']}}</p></li>
                                                <li class="product__list-item product__price"><p class="product_list-item-text">цена:{{$product['price']}}</p></li>
                                                <li class="product__list-item product__price"><p class="product_list-item-text">в наличии:{{$product['count']}}</p></li>
                                            </ul>
                                    </div>
                                    <Form class="" name="product-form" method="POST" action="{{route("goodsEdit")}}"> 
                                    @csrf  
                                        <div class="product__form-inner">
                                            <input type="hidden" name="goodsId" value="{{$product['id']}}">
                                            <input type="hidden" name="goodsName" value="{{$product['name']}}">
                                            <input type="hidden" name="goodsPrice" value="{{$product['price']}}">
                                            <input type="hidden" name="goodsCount" value="{{$product['count']}}">
                                        </div>
                                        <div class="button__pannel">
                                            <button type="submit" class="catalog__button" name="submit" value="edit-id"><p>редактировать</p></button>
                                            <button type="submit" class="catalog__button" name="submit" value="detail-id"><p>подробнее</p></button>
                                            <button type="submit" class="catalog__button" name="submit" value="delete-id"><p>удалить</p></button>
                                        </div>
                                    </Form>
                                    <Form class="" name="product-form" method="POST" action="{{route("cartAdd")}}"> 
                                    @csrf  
                                        <div class="product__form-inner">
                                            <input type="hidden" name="goodsId" value="{{$product['id']}}">
                                            <input type="hidden" name="goodsName" value="{{$product['name']}}">
                                            <input type="hidden" name="goodsPrice" value="{{$product['price']}}">
                                            <input type="hidden" name="goodsCount" value="{{$product['count']}}">
                                            <input type="number" name="quantity" value="" placeholder="количество" style="width:100%;">
                                        </div>
                                        <div class="button__pannel">
                                            <button type="submit" class="catalog__button" name="submit" value="add-cart-id"><p>Добавить в корзину</p></button>
                                        </div>
                                    </Form>
                                </div>
                                @endforeach
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </section>
</div>
@endsection