<x-app-layout>
<div class="w-full h-full bg-gray-800 rounded-xl">
    <div class="cards flex w-full justify-around py-8">
        {{-- card1 --}}
        <div class="bg-gray-200 w-[20vw] h-[15vh] flex flex-col justify-center items-center rounded-2xl transition hover:scale-105">
            <div class="text_icons w-full flex">
            <div class="px-4 flex h-fit items-center">
                <div class="bg-gray-300 mt-6 w-[4vw] h-[8vh] rounded-full">
                <svg class="w-[32px] mt-2 ml-[20%]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                </div>
            </div>
    
            <div class="textdiv w-[70%]">
            <p class="text-black mt-4">Manage Profile</p>
            <p class="font-bold text-lg mb-8">Account Settings</p>            
            </div>
            </div>
            
    
    
        </div>


        {{-- CARD2 --}}
    <div class="bg-gray-200 w-[20vw] h-[15vh] flex flex-col justify-center items-center rounded-2xl transition hover:scale-105">
        <div class="text_icons w-full flex">
        <div class="px-4 flex h-fit items-center">
            <div class="bg-gray-300 mt-6 w-[4vw] h-[8vh] rounded-full">
            <svg class="w-[32px] mt-2 ml-[20%]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </div>
        </div>

        <div class="textdiv w-[70%]">
        <p class="text-black mt-4">Transactions</p>
        <p class="font-bold text-lg mb-8">Transfer History</p>            
        </div>
        </div>
        


    </div>

        {{-- CARD3 --}}
    <div class="bg-gray-200 w-[20vw] h-[15vh] flex flex-col justify-center items-center rounded-2xl transition hover:scale-105">
        <div class="text_icons w-full flex">
        <div class="px-4 flex h-fit items-center">
            <div class="bg-gray-300 mt-6 w-[4vw] h-[8vh] rounded-full">
            <svg class="w-[32px] mt-2 ml-[20%]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </div>
        </div>

        <div class="textdiv w-[70%]">
        <p class="text-black mt-4">Statistics</p>
        <p class="font-bold text-lg mb-8">Financial</p>            
        </div>
        </div>
        


    </div>


                </div>

                {{-- Top Picks --}}
<div class="w-full flex flex-row-reverse justify-center">
    <div class="bg-transparent flex flex-col justify-around h-[40vh] w-[40vw]">
        
        <h1 class="text-center text-3xl py-2 font-thin text-white">Top Picks</h1>
        <div class="w-full flex justify-center">
            <div class="bg-gray-900 flex w-[50%] h-[8vh] rounded-full">
                <img src="https://th.bing.com/th/id/R.b3a65c0b54e5dff51740140198feb045?rik=oK%2frBzw1wNEGAA&pid=ImgRaw&r=0" alt="">
                <h2 class="px-8 py-[10px] text-white">Bitcoin</h2>
            </div>
        </div>

        <div class="w-full flex justify-center">
            <div class="bg-gray-900 flex w-[50%] h-[8vh] rounded-full">
                <img src="https://th.bing.com/th/id/R.b3a65c0b54e5dff51740140198feb045?rik=oK%2frBzw1wNEGAA&pid=ImgRaw&r=0" alt="">
                <h2 class="px-8 py-[10px] text-white">Bitcoin</h2>
            </div>
        </div>

        <div class="w-full flex justify-center">
            <div class="bg-gray-900 flex w-[50%] h-[8vh] rounded-full">
                <img src="https://th.bing.com/th/id/R.b3a65c0b54e5dff51740140198feb045?rik=oK%2frBzw1wNEGAA&pid=ImgRaw&r=0" alt="">
                <h2 class="px-8 py-[10px] text-white">Bitcoin</h2>
            </div>
        </div>

    </div>

    {{-- <div class="bg-gray-700 h-[40vh] w-[30vw] rounded-xl">
        <h1 class="text-center font-thin py-2">Your Wallet</h1>
    </div> --}}
</div>

{{-- Final --}}



</x-app-layout>
