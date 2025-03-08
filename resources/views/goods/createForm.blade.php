@extends('layout.app')
@section('title','создание товара')

@section('content')
@include('partials.header')
<div class="main__wrapper">
    <section class="main__catalog" style="margin-left:30px">
        <div class="container">
            <div class="main__product-content">
                <h3 class="main__product-content-title"> Добавление товара </h3>
                    <Form class="product__creater-form" name="product-form" method="POST" action="{{route("goodsEdit")}}">
                    @csrf   
                    <div class="product__creater-form__inner product__creater" style=" resize: none; " >
                    
                            <input type ="text" name="name" placeholder="название">
                            <input type ="number" step="0.01" name="price" placeholder="цена">
                            <input type ="number" name="count" placeholder="количество">
                            <input type ="number" name="categoryId" value="" placeholder="id категории">
                            <!--<input type="text" name="description" placeholder="описание товара">-->
                            <input type ="text" name="description" placeholder="описание">
                            <!--<textarea form="Product-form" class="product__description" placeholder="описание" rows="8" cols="25" id="description" name = "product_description" style="margin-top:10px; resize:none;"></textarea>
                            -->
                        </div>
                        <button type="submit" class="product__button" name="add-id" value=""><p>Создать</p></button>
                    </Form>
            </div>
        </div>
    </section>
</div>
@endsection