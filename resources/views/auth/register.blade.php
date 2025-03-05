@extends('layout.app')
@section('title','регистрация')

@section('content')
<form action="{{route("registr")}}" method="post">
    @csrf
<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Регистрация</h1>
            <input name ="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email" />
            @error('email')
            @enderror
            <input name ="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="имя" />
            @error('name')
            @enderror
            <input name ="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Пароль" />
            @error('password')
            @enderror
            <div>
                <a href="{{ route("loginShow")}} " class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Есть аккаунт?</a>
            </div>
            <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Зарегистрироваться</button>
    </div>
</div>
</form> 
@endsection