@extends('layouts.app')

@section('title','Buat')

@section('content')

@include('layouts.nav')

<div class="layer w-screen">
    <div class="wrapper flex justify-center h-screen">
        <div class="create-nav absolute top-1/4 left-3">
            <ul>
                <li><a href="{{ route('createPost') }}" class="{{ Request::is('image/post') ? 'active': '' }} font-semibold font-poppins text-lg">Buat Gambar</a></li>
                <li><a href="{{ route('createAlbum') }}" class="{{ Request::is('image/album') ? 'active' : '' }} font-semibold font-poppins text-lg">Buat Album</a></li>
            </ul>
        </div>
        <div class="img">
           <form action="{{ route('storePost') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="img-card w-[300px] md:w-[500px] h-[200px] md:h-[500px] mt-[120px] md:mt-0 rounded-lg bg-gray-300 hover:bg-gray-400 duration-300 relative flex flex-col items-center justify-center" id="img-card">
                    <img src="{{ asset('assets/icons/cloud-arrow-down.svg') }}" alt="" class="w-[70px]">
                    <p class="font-poppins">Upload your Image </p>
                    <input type="file" name="image" id="img-input" class="absolute cursor-pointer opacity-0 inset-0">
                    @error('image')
                      <p class="text-red-500 text-sm mt-2 font-poppins">{{ $message }}</p>
                    @enderror
                </div>
                <img src="#" alt="test" id="img-preview" class="w-[300px] md:w-[500px] mt-[120px] md:mt-0 h-[300px rounded-lg hidden">
                <div class="form-input">
                    <div class="form-group flex flex-col w-full gap-2 mb-5 mt-8">
                        <label for="title" class="text-sm lg:text-md font-poppins">Judul</label>
                        <input type="text" name="title" id="title" class="font-popins py-3 px-2 bg-gray-100 rounded-lg border-0 outline-none" placeholder="Isi Judul">
                        @error('title')
                            <p class="text-red-500 text-sm mt-2 font-poppins">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group flex flex-col w-full gap-2 mb-5 mt-8">
                        <label for="desc" class="text-sm lg:text-md font-poppins">Deskripsi</label>
                        <textarea placeholder="Isi Deskripsi" class="font-popins py-3 px-2 bg-gray-100 rounded-lg border-0 outline-none" name="desc" id="" cols="30" rows="5"></textarea>
                        @error('desc')
                            <p class="text-red-500 text-sm mt-2 font-poppins">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group flex flex-col w-full gap-2 mb-5 mt-8">
                        <label for="desc" class="text-sm lg:text-md font-poppins">Album</label>
                        <select name="album" id="album" class="font-popins py-3 px-2 bg-gray-100 rounded-lg border-0 outline-none">
                            <option value="1" selected >All</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->id }}">{{ $album->title }}</option>
                            @endforeach
                        </select>
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
    })
</script>

@endsection