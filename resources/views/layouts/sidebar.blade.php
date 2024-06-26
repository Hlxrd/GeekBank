<div class="fixed left-0 top-0 z-40 ">
    <div class="sidebar  bg-gray-900 position-relative w-[20vw] mt-[13vh] ">


        <div class="textsidebarcontent text-center py-4 flex flex-col h-[90vh] justify-around item-center">
            <div class="w-full flex justify-center">

            </div>

            <div
                class="w-full cursor-pointer flex flex-row justify-center hover:bg-primary-color py-2 hover:border-r-4 transition-all">
                <span class="text-secondary-color px-4">icon</span>
                <a href="{{ route('home.index') }}" class="text-white text-xl mr-14 no-underline">Home</a>
            </div>

            <div
                class="w-full cursor-pointer flex flex-row justify-center hover:bg-primary-color py-2 hover:border-r-4 transition-all">
                <span class="text-secondary-color px-4">icon</span>
                <a href="{{ route('crypto') }}" class="text-white text-xl mr-14 no-underline">Crypto</a>
            </div>

            <div
                class="w-full cursor-pointer flex flex-row justify-center hover:bg-primary-color py-2 hover:border-r-4 transition-all">
                <span class="text-secondary-color px-4">icon</span>
                <a href="{{ route('transfer.index') }}" class="text-white text-xl mr-14 no-underline">Transfer</a>
            </div>

            <div
                class="w-full cursor-pointer flex flex-row justify-center hover:bg-primary-color py-2 hover:border-r-4 transition-all">
                <span class="text-secondary-color px-4">icon</span>
                <a href="{{ route('myCard.index') }}" class="text-white text-xl mr-10 no-underline">Exchange</a>
            </div>

            <div
                class="w-full cursor-pointer flex flex-row justify-center hover:bg-primary-color py-2 hover:border-r-4 transition-all">
                <span class="text-secondary-color px-4">icon</span>
                <a href="{{ route('invest.index') }}" class="text-white text-xl mr-5 no-underline">Investement</a>
            </div>

            <div
                class="w-full cursor-pointer flex flex-row justify-center hover:bg-primary-color py-2 hover:border-r-4 transition-all">
                <span class="text-secondary-color px-4">icon</span>
                <a href="{{ route('loan.index') }}" class="text-white text-xl mr-[78px] no-underline">Loans</a>
            </div>


            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="text-red-500 font-thin bg-gray-800 px-4 py-2 transition-all rounded-full hover:bg-red-500 hover:text-white hover:px-3 hover:py-1 text-xl cursor-pointer">LogOut</button>
            </form>

        </div>

    </div>
</div>
