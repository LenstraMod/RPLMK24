@extends('layouts.app')

@section('title','Beranda')

@section('content')
@include('layouts.nav')


<style>
    /* .wrapper{
        width: 1400px;
        margin: 20px auto;
        columns: 4;
    } */

    .wrapper .img-card{
        width: 100%;
        border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 3px 3px 5px rgb(122, 122, 122);
        transition: 0.25s ease-out;
    }
    .wrapper img:hover{
        transform: scale(1.1);
        transition: 0.25s ease-in;
    }
    /* @Keyframes cardshow{
        0%{
            display:fixed
        }
    } */
</style>

<div class="profile flex flex-col items-center my-12">
    <div class="user-image">
        <img src="http://wonderfulengineering.com/wp-content/uploads/2014/06/earth-wallpapers-23.jpg" alt="" class="w-[250px] h-[250px] rounded-full">
    </div>
    <p class="text-3xl font-bold my-5 font-poppins">{{ $user->username }}</p>
    <button class="bg-slate-200 hover:bg-slate-300 duration-300 ease-in-out py-2 px-8 rounded-lg font-poppins font-medium">Edit Profile</button>
</div>

<div class="post">
    <p class="mx-12 font-poppins font-semibold text-xl">
        @if($user->id == auth()->user()->id)
            Your 
        @else
            {{ $user->username }}'s
        @endif
    post
    </p>
</div>

<div class="all-card mx-1 md:mx-12 mt-5">
    <div class="wrapper width-[80%] mx-[1em] my-[auto] columns-[150px] lg:columns-[200px] gap-[10px]">
        @foreach($user->posts as $post)
        <a href="{{ route('showPost',$post->id) }}"><img class="img-card" src="{{ asset('assets/images/' . $post->image) }}" alt=""></a>
        @endforeach
    </div>
</div>

@endsection