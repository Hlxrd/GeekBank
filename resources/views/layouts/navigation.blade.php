<div class="fixed top-0 right-0 left-0 z-30">
    <nav class="bg-gray-900 h-[13vh] flex items-center ">

        <div class="px-10 flex w-full flex-row justify-between">
            <h2 class="text-white text-4xl">Geek<span class="text-secondary-color">Bank.</span></h2>



        </div>
        {{-- <div class="w-[15vw] ">
        <div class="hover:bg-secondary-color transition-all bg-green-600  border border-black w-[10vw] h-[7vh] rounded-full">
            <h1 class="text-center text-white text-xl py-2">1500DH</h1>
        </div>
    </div> --}}


        <div class="w-[15vw] px-4">
            <div class="dropdown bg-secondary-color rounded-full hover:cursor-pointer">
                <button
                    class="btn border-none dropdown-toggle inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 transition duration-150 ease-in-out bg-transparent hover:text-gray-500 bg-secondary-color"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('transaction.index') }}">History</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Settings</a></li>
                </ul>
            </div>
        </div>



    </nav>

</div>
