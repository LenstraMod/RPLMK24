@extends('layouts.app')

@section('title','Buat Album')

@section('content')

@include('layouts.nav')

<div class="layer w-screen">
    @if(session('success'))
    <div class="alert-placement flex justify-center">
        <div id="alert" class="alert border p-3 mb-5 rounded-lg flex flex-col bg-green-500 w-fit">
            <button onclick="closePoint()" class="self-end"><i class="fa-solid fa-xmark text-white cursor-pointer close-point"></i></button>
            <p class="font-poppins text-lg mb-2 text-white">{{ session('success') }}</p>
        </div>
    </div>
    @endif
    <div class="wrapper flex justify-center h-screen">
        <div class="create-nav absolute top-1/4 left-3">
            <ul>
                <li><a href="{{ route('createPost') }}" class="{{ Request::is('image/post') ? 'active': '' }} font-semibold font-poppins text-lg">Buat Gambar</a></li>
                <li><a href="{{ route('createAlbum') }}" class="{{ Request::is('album/create') ? 'active' : '' }} font-semibold font-poppins text-lg">Buat Album</a></li>
            </ul>
        </div>
        <div class="img">
           <form action="{{ route('storeAlbum') }}" method="POST">
            @csrf
                <div class="form-input">
                    <div class="form-group flex flex-col w-full gap-2 mb-5 mt-8">
                        <label for="title" class="text-sm lg:text-md font-poppins">Judul</label>
                        <input type="text" name="title" id="title" class="font-popins py-3 px-2 bg-gray-100 rounded-lg border-0 outline-none" placeholder="Isi Judul">
                        @error('title')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group flex flex-col w-full gap-2 mb-5 mt-8">
                        <label for="desc" class="text-sm lg:text-md font-poppins">Deskripsi</label>
                        <textarea placeholder="Isi Deskripsi" class="font-popins py-3 px-2 bg-gray-100 rounded-lg border-0 outline-none" name="desc" id="desc" cols="30" rows="5"></textarea>
                        @error('desc')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="py-2 px-12 mt-4 bg-green-500 font-poppins font-semibold rounded-lg text-white w-full hover:bg-green-600 duration-300 ease-out">Buat</button>
           </form>



        </div>
    </div>
</div>

<script>
    let imgInput = document.getElementById('img-input');
    let imgPreview = document.getElementById('img-preview');
    let imgCard = document.getElementById('img-card')

    imgInput.addEventListener('change' , function() {
        const file = this.files[0];

        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                imgPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
            imgPreview.style.display = 'block';
            imgCard.style.display = 'none';
        }
        else{
            imgPreview.src = '#';
        }
    });

    function closePoint(){
        document.getElementById('alert').style.display = 'none';
    }
</script>

@endsection