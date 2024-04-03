<div class="sidebar bg-gray-900 h-[100vh] w-[20vw]">


    <div class="textsidebarcontent text-center py-4 flex flex-col h-[80vh] justify-between justify-around item-center">
        <div class="w-full flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 hover:py-2 transition-all">
            <span class="text-blue-500 px-4">icon</span>
            <p class="text-white text-2xl mr-14">Balance</p>
        </div>

        <div class="w-full flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 hover:py-2 transition-all">
            <span class="text-blue-500 px-4">icon</span>

            <a class="text-white text-2xl mr-14 no-underline" href="{{ route('transfer.index') }}">Transfer</a>
        </div>

        <div class="w-full flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 hover:py-2 transition-all">
            <span class="text-blue-500 px-4">icon</span>
            <p class="text-white text-2xl mr-5">EXCHANGE</p>
        </div>

        <div class="w-full flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 hover:py-2 transition-all">
            <span class="text-blue-500 px-4">icon</span>
            <p class="text-white text-2xl mr-3">Investement</p>
        </div>

        <div class="w-full flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 hover:py-2 transition-all">
            <span class="text-blue-500 px-4">icon</span>
            <p class="text-white text-2xl mr-[70px]">History</p>
        </div>


        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 font-semibold text-xl cursor-pointer">LogOut</button>
        </form>

    </div>

</div>
