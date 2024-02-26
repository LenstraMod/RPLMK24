@extends('layouts.app')

@section('title','Explorasi')

@section('content')

@include('layouts.nav')

<div class="explore">
    <div class="wrapper px-12 pt-6">
        <h1 class="font-honk font-bold text-[40px]">Albums</h1>
        <div class="albums grid grid-cols-5">
            @foreach($albums as $album)
               <a href="{{ route('showAlbum',$album->id) }}">
                <div class="album mt-3 w-fit relative">
                    <div class="album-thumbnail grid grid-cols-2">
                        <div class="detail absolute z-50 text-white font-poppins font-bold p-3">
                            <p>{{ $album->title }}</p>
                        </div>
                        <div class="dark-layer h-full w-full bg-black absolute opacity-30 hover:opacity-50 border rounded-lg"></div>
                        @foreach($album->post->sortByDesc('created_at')->take(4) as $image)
                            <img class="w-[160px] h-[160px] rounded-lg" src="{{ asset('assets/images/' . $image->image) }}" alt="">
                        @endforeach
                    </div>
                </div>
               </a>
            @endforeach
        </div>
    </div>
</div>

@endsection