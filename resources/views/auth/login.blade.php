@extends('layout.app')
@section('title','Авторизация')

@section('content')
<form action="{{route("login")}}" method="post">
@csrf
<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
            <div class="bg-white w-96 shadow-xl rounded p-5" ">
                <h1 class="text-3xl font-medium">Вход</h1>

               
                <input name ="email" type="text" style="margin-bottom:15px" class="w-full h-12 border  border-gray-800 rounded px-3" placeholder="Email" />

                @error('email')
                @enderror
                <input name ="password" type="password" style="margin-bottom:15px" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Пароль" />
                @error('password')
                @enderror
                <div>
                    <a href="{{route("registrShow")}}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Регистрация</a>
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Войти</button>
            
            </div>
        </div>
</form> 
@endsection