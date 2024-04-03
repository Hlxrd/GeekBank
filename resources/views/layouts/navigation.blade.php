<nav class="bg-gray-900 h-[13vh] flex items-center">

    <div class="px-14 flex w-full flex-row justify-between">
        <h2 class="text-white text-4xl">Geek<span class="text-blue-500">Bank.</span></h2>

        {{-- <div class="hover:bg-blue-500 transition-all bg-green-600  border border-black w-[8vw] h-[7vh] rounded-full">
                <h1 class="text-center text-white text-lg py-2">1500DH</h1>
            </div> --}}

    </div>
    {{-- <div class="w-[15vw] ">
    <div class="hover:bg-blue-500 transition-all bg-green-600  border border-black w-[10vw] h-[7vh] rounded-full">
        <h1 class="text-center text-white text-xl py-2">1500DH</h1>
    </div>
</div> --}}

    {{-- <div class="flex items-center justify-center p-12">
        <div class=" relative inline-block text-left dropdown">
            <span class="rounded-md shadow-sm"><button
                    class=" border-none inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-transparent border rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-blue-500 active:text-blue-800"
                    type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                    <span class="text-white text-md font-semibold">User</span>
                    <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button></span>
            <div
                class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                    aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                    <div class="px-4 py-3">
                        <p class="text-sm leading-5">Signed in as</p>
                        <p class="text-sm font-medium leading-5 text-gray-900 truncate">amineg715@gmail.com</p>
                    </div>
                    <div class="py-1">
                        <a href="javascript:void(0)" tabindex="0"
                            class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"
                            role="menuitem">Account settings</a>
                        <a href="javascript:void(0)" tabindex="1"
                            class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"
                            role="menuitem">Support</a>
                        <a href="javascript:void(0)" tabindex="2"
                            class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"
                            role="menuitem">License</a>
                    </div>
                    <div class="py-1">
                        <a href="javascript:void(0)" tabindex="3"
                            class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"
                            role="menuitem">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="dropdown">
        <button
            class="btn btn-secondary dropdown-toggle border-none inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-transparent border rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-blue-500 active:text-blue-800"
            type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">profile</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div>


</nav>
