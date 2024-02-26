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



<div class="all-card mx-1 md:mx-12 mt-5">
    <h1 class="mb-3 font-bold text-3xl font-honk">{{ $posts->title }}</h1>
    <div class="wrapper width-[80%] mx-[1em] my-[auto] columns-[150px] lg:columns-[200px] gap-[10px]">
        @foreach($posts->post as $post)
        <a href="{{ route('showPost',$post->id) }}"><img class="img-card" src="{{ asset('assets/images/' . $post->image) }}" alt=""></a>
        @endforeach
    </div>
</div>


@endsection