@extends('layouts.app')

@section('title','Register')

@section('content')

<div class="login-card flex flex-col justify-center items-center h-screen">
    <div class="wrapper border px-6 py-3 rounded-lg shadow-lg mx-2">
         <h1 class="font-honk text-[50px] text-center mt-5">FotoDunia</h1>
         <p class="font-poppins mt-5 text-md lg:text-lg font-semibold">Selamat datang di Foto Dunia! Ayo daftar!</p>
         <form action="{{ route('register') }}" class="mt-5 flex flex-col" method="POST">
            @csrf
             <div class="form-group flex flex-col w-full gap-2 mb-5">
                 <label for="username" class="text-sm lg:text-md font-poppins">Username</label>
                 <input type="text" value="{{ old('username') }}" name="username" id="username" class="font-popins py-3 px-2 bg-gray-100 rounded-lg border-0 outline-none" placeholder="Isi username">
                 @error('username')
                    <p class="font-poppins text-sm text-red-600">{{ $message }}</p>
                 @enderror
             </div>
             <div class="form-group flex flex-col w-full gap-2 mb-5">
                 <label for="email" class="text-sm lg:text-md font-poppins">Email</label>
                 <input type="email" value="{{ old('email') }}" name="email" id="email" class="font-popins py-3 px-2 bg-gray-100 rounded-lg border-0 outline-none" placeholder="Isi Email">
                 @error('email')
                    <p class="font-poppins text-sm text-red-600">{{ $message }}</p>
                 @enderror
             </div>
             <div class="form-group flex flex-col w-full gap-2 mb-5">
                 <label for="password" class="text-sm lg:text-md font-poppins">Password</label>
                 <input type="password" name="password" id="password" class="font-popins py-3 px-2 bg-gray-100 rounded-lg border-0 outline-none" placeholder="Isi Password">
                 @error('password')
                    <p class="font-poppins text-sm text-red-600">{{ $message }}</p>
                 @enderror
             </div>
             <button type="submit" class="py-2 px-12 mt-4 bg-green-500 font-poppins font-semibold rounded-lg text-white self-center hover:bg-green-600 duration-300 ease-out">Daftar</button>
         </form>
         <p class="text-center text-sm font-poppins">sudah ada akun? <a href="{{ route('loginForm') }}" class="text-blue-700">Ayo masuk sekarang!</a></p>

         <div class="or mt-12">
             <p class="font-poppins font-bold text-xl text-gray-600 text-center">-- OR --</p>
         </div>
         <div class="mt-7 mb-5 flex justify-center">
             <button class="flex items-center gap-3 bg-[#4086f4] hover:bg-[#4473bf] py-1 pl-1 pr-4 border-0 rounded-md text-white font-poppins font-semibold"><img src="{{ asset('assets/icons/Social Icons.svg') }}" class="bg-white p-1 rounded-sm" alt="">Login With Google</button>
         </div>
    </div>
 </div>

@endsection