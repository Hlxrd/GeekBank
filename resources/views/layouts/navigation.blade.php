<nav class="bg-gray-300 px-[2rem] py-[1rem] flex justify-between items-center">
    <div>
        <a href="{{ route('product.index') }}" class="font-black no-underline text-[2rem] text-black">Store<span
                class="text-red-600">.</span></a>
    </div>
    <ul class="m-0">
        <li class="">
            <a class="no-underline text-[1.1rem] text-black  hover:underline hover:underline-offset-1 transition duration-700"
                href="{{ route('product.index') }}">All products</a>
        </li>
    </ul>
    <div class="dropdown">
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu">
            <li>
                @if (Auth::user()->seller_or_buyer == 'seller')
                    <a class="dropdown-item" href="{{ route('seller.index') }}">add product</a>
                @endif
            </li>
            <li>
                @if (Auth::user()->seller_or_buyer == 'seller')
                    <a class="dropdown-item " href="{{ route('seller.sellerProducts') }}">my
                        products</a>
                @endif
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">profile</a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item "><span class="text-red-600">log out </span></button>
                </form>
            </li>
        </ul>
    </div>

</nav>
