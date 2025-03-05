@extends('layout.app')
@section('title','список всех товаров')

@section('content')
<div class="main__wrapper">
    <section class="main__catalog">
        <div class="container">
            <div class="main__catalog-wrapper">
                <div class="main__catalog-content">
                    @foreach($categories as $category)
                    <h3 class="main__catalog-content-title"> {{$category['name']}} </h3>
                        @foreach($category['goods'] as $product)
                            <Form class="Product" name="Product-form" method="POST"> 
                                <ul class="Product__list">
                                    <li class="Product__list-item Product__price"><p>Цена:{{$product['price']}}</p></li>
                                    <li class="Product__list-item Product__name"><p>{{$product['name']}}</p></li>
                                    
                                </ul>
                                <input type="hidden" name="goodsId" value="{{$product['id']}}">
                                <input type="hidden" name="goodsName" value="{{$product['name']}}">
                                <button type="submit" class="Catalog__button" name="value-id" value=""><p>редактировать</p></button>
                                <button type="submit" class="Catalog__button" name="value-id" value=""><p>Добавить в корзину</p></button>
                            </Form>
                        @endforeach

                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
@endsection