<div class="sidebar bg-gray-900 h-[100vh] w-[20vw]">


    <div class="textsidebarcontent text-center py-4 flex flex-col h-[90vh] justify-around item-center">
        <div class="w-full cursor-pointer flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 transition-all">
            <span class="text-yellow-500 px-4">icon</span>
            <p class="text-white text-2xl mr-14">Balance</p>
        </div>

        <div class="w-full flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 hover:py-2 transition-all">
            <span class="text-blue-500 px-4">icon</span>
            <a class="text-white text-2xl mr-14 no-underline" href="{{ route('transfer.index') }}">Transfer</a>
        </div>

        <div class="w-full flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 hover:py-2 transition-all">
            <span class="text-blue-500 px-4">icon</span>
            <a class="text-white text-2xl mr-14 no-underline" href="{{ route('myCard.index') }}">My Cards</a>
        </div>
        <div class="w-full flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 hover:py-2 transition-all">
            <span class="text-blue-500 px-4">icon</span>
            <a class="text-white text-2xl mr-14 no-underline" href="{{ route('bill.index') }}">Bills</a>
        </div>

        <div class="w-full cursor-pointer flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 transition-all">
            <span class="text-yellow-500 px-4">icon</span>
            <p class="text-white text-2xl mr-3">Investement</p>
        </div>

        <div class="w-full cursor-pointer flex flex-row justify-center hover:bg-gray-900 hover:border-r-4 transition-all">
            <span class="text-yellow-500 px-4">icon</span>
            <p class="text-white text-2xl mr-[70px]">History</p>
        </div>


        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 font-thin bg-gray-800 px-4 py-2 transition-all rounded-full hover:bg-red-500 hover:text-white hover:px-3 hover:py-1 text-xl cursor-pointer">LogOut</button>
        </form>

    </div>

</div>
