@extends('layouts.app')

@section('title', 'image')

@section('content')

@include('layouts.nav')

    <style>
        .image-post{
    
            transition:0.35s ease-out;
    
        }
    
        .image-post:hover{
    
        transition:0.35s ease-in;
        transform: scale(1,1);
    
    }
    </style>
    <div class="layer overflow-hidden">
        <div class="wrapper ">
            <div class="post-main w-screen flex items justify-center mb-12">
               <div class="post flex flex-col lg:flex-row rounded-lg shadow-2xl w-fit h-fit mt-12 gap-12">
                    <div class="post-img mb-9 mx-12 lg:mx-0">
                        <img src="{{ asset('assets/images/' . $post->image) }}" class="image-post w-[500px] rounded-tl-lg rounded-bl-lg" alt="">
                    </div>
                    <div class="post-info w-screen lg:w-[500px] mt-12 mx-3">
                        <form action="{{ route('editPost',$post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h3 class="title font-poppins text-2xl text-wrap font-bold mb-4">{{ $post->title }}</h3>
                            <input type="text" value="{{ $post->title }}" name="title" class="title-input h-fit w-full border border-black font-poppins text-2xl text-wrap font-bold mb-4 px-2 hidden">
                            <p class="desc text-pretty font-poppins text-sm">{{ $post->description }}</p>
                            <input type="text" value="{{ $post->description }}" name="desc" class="desc-input h-fit w-full border border-black px-2 hidden">
                            <div class="edit-action flex gap-1">
                                <button type="submit" class="edit font-poppins text-sm bg-green-500 px-3 py-1 rounded-lg my-3 hidden text-white">Save</button>
                                <button class="edit-cancel font-poppins text-sm bg-red-500 px-3 py-1 rounded-lg my-3 hidden text-white" onclick="cancelEdit()">Cancel</button> <button class="edit-cancel font-poppins text-sm bg-red-500 px-3 py-1 rounded-lg my-3 hidden text-white">cancel</button>
                            </div>
                        </form>
                        <div class="profile mt-3 flex gap-3 items-center">
                            <a href="{{ route('profile',$post->user->username) }}"><img src="https://wallpapercave.com/wp/wp5922307.jpg" alt="" class="w-[30px] h-[30px] rounded-full"></a>
                            <p class="name font-poppins font-semibold">{{ $post->user->username }}</p>
                        </div>
                        <div class="all-comment mt-3">
                           <h1 class="font-poppins font-semibold text-sm">Comment</h1>
                           <div class="scroll-view overflow-auto w-full h-[180px] mt-2">
                                @foreach($post->comments->sortByDesc('created_at') as $comment)
                                    <div class="user-comment flex justify-between ">
                                        <div class="comment-in flex  gap-2 items-center mb-5">
                                            <a href="{{ route('profile',$post->user->username) }}"><img src="https://wallpaperaccess.com/full/4595713.jpg" alt="" class="w-[30px] h-[30px] rounded-full"></a>
                                            <p class="font-poppins text-sm"><span class="font-semibold">{{ $comment->user->username }}</span> {{ $comment->comment }} </p>
                                        </div>
                                        <div class="set">
                                            <i class="setButton fa-solid fa-ellipsis cursor-pointer" onclick="setCommentSetting(this)"></i>
                                            <div class="boxComment border rounded px-3 shadow-lg absolute bg-white z-50 hidden" id="boxComment">
                                                <a href="{{ route('deleteComment',$post->id) }}" class="font-poppins text-sm">Delete Comment</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                           </div>
                        </div>
                        <div class="commenting my-6">
                            <div class="action mb-3 flex justify-between">
                                <p class="font-poppins font-semibold">{{ count($post->comments) }} Komentar</p>
                                <div class="action flex gap-1">
                                    @if(!$like)
                                    <form action="{{ route('like',$post->id) }}"  method="POST">
                                        @csrf   
                                        <button type="submit"><i class="fa-regular fa-heart"></i></button>
                                    </form>                                   
                                    @else                          
                                    <a href="{{ route('dislike',$post->id)}}"><button type="submit"><i class="fa-solid fa-heart"></i></button></a>
                                    @endif
                                
                                    <i class="fa-regular fa-share-from-square cursor-pointer" onclick="getUrl()"></i>
                                    @if($post->user->id == auth()->user()->id)
                                        <i class="setButton fa-solid fa-ellipsis cursor-pointer" onclick="setMenu()"></i>
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('comment',$post->id) }}" class="flex gap-3" method="POST">
                                @csrf
                                <input type="text" name="comment" id="comment" class="font-poppins py-3 px-2 bg-gray-100 rounded-lg border-0 outline-none w-full" placeholder="Tulis Komentar">
                                <button class="mr-3"><i class="fa-solid fa-paper-plane text-lg"></i></button>
                            </form>
                        </div>
                    </div>
               </div>
               <div class="setting absolute right-[14.5%] top-[56%] hidden">
                <ul class="bg-white p-5 shadow-lg rounded-lg">
                    <li class="cursor-pointer" onclick="onEdit()">Edit Post</li>
                    <li><a href="{{ route('deletePost',$post->id) }}">Delete Post</a></li>
                </ul>
            </div>
            <div class="album-choice absolute right-[8%] top-[62%] hidden">
                <ul class="bg-white shadow-lg p-5 rounded-lg">
                    <li>Simpan</li>
                    <li>Wkwkw</li>
                    <li>What is this</li>
                </ul>
            </div>
            </div>
            <p class="text-center font-honk text-3xl">Ayo Explore Lagi!</p>
            <div class="gallery-main">
                <button onclick="wow()">Hi</button>
            </div>
        </div>
     </div>
    
     <script>
        let setting = document.querySelector('.setting');
        let menuItem = document.getElementById('menu-item');
        let title = document.querySelector('.title');
        let desc = document.querySelector('.desc');
        let titleInput = document.querySelector('.title-input');
        let descInput = document.querySelector('.desc-input');
        let editBtn = document.querySelector('.edit');
        let cancelBtn = document.querySelector('.edit-cancel');
        
    
        function setMenu(){
            if(setting.style.display === 'none'){
                setting.style.display = 'block';
            }
            else{
                setting.style.display = 'none';
                album.style.display = 'none';
            }
        }

        function setCommentSetting(button){
            let boxComment = button.nextElementSibling;
            if(boxComment.style.display === 'none'){
                boxComment.style.display = 'block';
            }
            else{
                boxComment.style.display = 'none';
            }

        }
    
        function onEdit(){
            if(title.style.display === 'none'){
                title.style.display = 'block';
                desc.style.display = 'block';
                titleInput.style.display = 'none';
                descInput.style.display = 'none';
                editBtn.style.display = 'none';
                cancelBtn.style.display = 'none';
                setting.style.display = 'none'
            }
            else{
                title.style.display = 'none';
                desc.style.display = 'none';
                titleInput.style.display = 'block';
                descInput.style.display = 'block';
                editBtn.style.display = 'block';
                cancelBtn.style.display = 'block';
                setting.style.display = 'none'
            }
        }
    
        function cancelEdit(){
            title.style.display = 'block';
            desc.style.display = 'block';
            titleInput.style.display = 'none';
            descInput.style.display = 'none';
            editBtn.style.display = 'none';
            cancelBtn.style.display = 'none';
        }
    
        function getUrl(){
            let url = window.location.href;
            navigator.clipboard.writeText(url);
    
            window.alert('Link Copied!');
        }
     </script>

@endsection