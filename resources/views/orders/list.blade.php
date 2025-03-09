@extends('layout.app')
@section('title','список всех товаров')

@section('content')
@include('partials.header')
<div class="main__wrapper">
    <section class="main__catalog" style="margin-left:30px">
            <div class="main__catalog-content">
                <h3 class="main__catalog-content-title"> Заказы </h3>
                <div class="main__catalog-wrapper">
                    <div class ="main__catalog-content-product product"> 
                            <div class="main__catalog-content-produc__inner">
                                @foreach($orderItems as $item)
                                <div class="product__form">
                                    <div class="product__inner">
                                            <ul class="product__list" style="list-style:none;">
                                                <li class="product__list-item product__name"><p class="product_list-item-text">{{$item['name']}}</p></li>
                                                <li class="product__list-item product__descr"><p class="product_list-item-text">описание:{{$item['description']}}</p></li>
                                                <li class="product__list-item product__price"><p class="product_list-item-text">Цена:{{$item['price']}}</p></li>
                                                <li class="product__list-item product__price"><p class="product_list-item-text">кол-во:{{$item['quantity']}}</p></li>
                                            </ul>
                                    </div>
                                    <Form class="" name="product-form" method="POST" action="{{route("orderItemEdit")}}"> 
                                        @csrf  
                                        
                                        <div class="product__form-inner">
                                            <input type="hidden" name="id" value="{{$item['id']}}">
                                            <input type="hidden" name="goodsId" value="{{$item['goods_id']}}">
                                            <input type="hidden" name="name" value="{{$item['name']}}">
                                            <input type="hidden" name="price" value="{{$item['price']}}">
                                            <input type="hidden" name="quantity" value="{{$item['quantity']}}">
                                            <!--<input type="text" name="status" value="{{$item['status']}}">-->
                                            
                                            <select name="status" for="status" class="select__statuses">
                                            @foreach($statuses as $status)
                                                <option value="{{ $status }}">{{ $status }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="button__pannel">
                                            <button type="submit" class="catalog__button" name="submit" value="edit-id"><p>сохранить</p></button>
                                        </div>
                                    </Form>
                                    <Form class="" name="product-form" method="POST" action=""> 
                                        @csrf  
                                        <div class="product__form-inner">
                                            <input type="hidden" name="id" value="{{$item['id']}}">
                                        </div>
                                        <div class="button__pannel">
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