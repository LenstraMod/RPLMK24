@extends('layouts.app')

<div class="menuLayer fixed top-0 right-0 w-screen z-50 h-screen bg-black opacity-50 hidden" id="menuLayer"></div>

<div class="nav w-screen h-[80px] flex px-5 items-center bg-white md:bg-none fixed md:relative z-50 md:z-0" id="nav">
    <div class="logo flex-none mx-2">
        <a href="{{ route('home') }}" class="text-[3rem] font-honk font-bold text-red-600">FotoDunia</a>
    </div>

    <div class="nav-content mx-12 flex items-center w-full gap-5 ">
        <div class="nav-menu  hidden md:block">
            <ul class="flex text-md md:text-lg items-center gap-5 font-poppins font-semibold">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="{{ Request::is('explorasi') ? 'active' : '' }}"><a href="{{ route('explore') }}">Explorasi</a></li>
                <li class="{{ Request::is('image/post') ? 'active' : '' }}"><a href="{{ route('createPost') }}">Buat</a></li>
            </ul>
        </div>
        <div class="nav-search w-full hidden md:block">
            <input type="text" placeholder="Search" class="bg-gray-200 w-full py-2 outline-none px-3 border rounded-full">
        </div>
    </div>
    <div class="nav-profile flex-none  hidden md:block mr-5">
        <div class="profile-behaviour flex gap-2">
            <a href="{{ route('profile',auth()->user()->username) }}"><img src="https://www.rollingstone.com/wp-content/uploads/2020/07/Screen-Shot-2020-07-15-at-11.24.37-AM.jpg" class="w-[40px] h-[40px] font-poppins border-4 border-blue-500 rounded-full" alt=""></a>
            <button onclick="dropDownProfile()" ><i class="fa-solid fa-sort-down"></i></button>
        </div>
    </div>
    <div class="profile-drop-down h-fit w-[200px] shadow-profile bg-white absolute right-10 top-[65px] rounded-lg hidden" id="dropProfileMenu">
        <ul class="font-poppins mx-3 my-3 text-md">
            <li class="hover:bg-slate-400 py-1 px-2 rounded-lg duration-150 ease-out"><a href="{{ route('profile',auth()->user()->username) }}">Profile</a></li>
            <li class="hover:bg-slate-400 py-1 px-2 rounded-lg duration-150 ease-out"><a href="{{ route('logout') }}">Log Out</a></li>
        </ul>
    </div>
    <div class="menuBurger block md:hidden">
        <i class="fa-solid fa-bars block text-lg" onclick="openNav()" id="menu"></i>
        <div class="burgerMenu w-[200px] h-screen bg-white fixed right-[-300px] top-[70px] duration-300 shadow-lg rounded-tl-lg rounded-bl-lg" id="menuContent">
            <ul class="flex flex-col text-md md:text-lg  gap-5 font-poppins font-semibold mx-6 mt-6">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="{{ Request::is('explorasi') ? 'active' : '' }}"><a href="{{ route('explore') }}">Explorasi</a></li>
                <li class="{{ Request::is('image') ? 'active' : '' }}"><a href="{{ route('createPost') }}">Buat</a></li>
            </ul>
        </div>
    </div>
</div>

<script>

    // window.onscroll = function() {scrollFunction()};
    // let nav = document.getElementById('nav');
    // let sticky = nav.offsetTop;

    // function scrollFunction() {
    //     if (window.pageYOffset >= sticky) {
    //         nav.style.display = 'fixed';
    //     }
    // }

    function dropDownProfile(){
        let drop = document.getElementById('dropProfileMenu');

        if(drop.style.display == 'block'){
            drop.style.display = 'none';
        }
        else{
            drop.style.display = 'block';
        }
    }

    function openNav() {

        let menu = document.getElementById('menu');

        menu.addEventListener('click', function(){
            let menuContent = document.getElementById('menuContent');
            let menuLayer = document.getElementById('menuLayer');
            if(menuContent.style.right == '0px'){
                menuContent.style.right = '-300px';
                menuLayer.style.display = 'none';
            }
            else{
                menuContent.style.right = '0px';
                menuLayer.style.display = 'block';
            }
        });

        window.addEventListener('scroll',function(){
            let menuContent = document.getElementById('menuContent');
            let menuLayer = document.getElementById('menuLayer');
            if(menuContent.style.right == '0px'){
                menuContent.style.right = '-300px';
                menuLayer.style.display = 'none';

                document.body.style.pointerEvents = 'auto';
            }
        });

        // window.addEventListener('click' , function(event){
        //     let menuContent = document.getElementById('menuContent');
        //     let menuLayer = document.getElementById('menuLayer');
        //     if(menuContent.style.right == '0px'){
        //         menuContent.style.right = '-300px';
        //         menuLayer.style.display = 'none';
        //     }
        //     if (!event.target.closest('#burgerMenu')) {
        //     document.body.style.pointerEvents = 'none';
        //     }
        //         });
            }
</script>