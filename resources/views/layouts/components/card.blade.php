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
    <div class="wrapper width-[80%] mx-[1em] my-[auto] columns-[150px] lg:columns-[200px] gap-[10px]">
        @foreach($posts as $post)
        <a href="{{ route('showPost',$post->id) }}"><img class="img-card" src="{{ asset('assets/images/' . $post->image) }}" alt=""></a>
        @endforeach
        {{-- <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/54/03/43/5403436284fd7fd568186faf44d6f0c4.jpg" alt="" >
        <img class="img-card" src="https://i.pinimg.com/564x/45/b1/ea/45b1ea4d9e5c847c62aef02444929129.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2c/27/29/2c27298fdd15d1fa739d5009e2703216.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/564x/2e/09/61/2e09618a6255dfc9b5fb3dfc01524718.jpg" alt="">
        <img class="img-card" src="https://i.pinimg.com/736x/6a/92/21/6a92215f4db80c046ec1e8c8480a7858.jpg" alt=""> --}}
    </div>
</div>
