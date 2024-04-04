<x-app-layout>
    <div class="flex flex-col items-center gap-4">
        <h1 class="text-center font-bold">Your Bills</h1>
        <div class="w-[70vw] rounded  px-5 flex items-center justify-between">
            <p class="ps-2    m-0">tiltle </p>
            <div class="flex items-center justify-around gap-5 pe-[6vw] w-[40%]">
                <p class="m-0">Date</p>
                <p class="m-0">Price</p>
            </div>
        </div>
        @foreach ($bills as $bill)
            <div class="w-[70vw] rounded py-3 px-5 bg-red-300 flex items-center justify-between">
                <h4 class="m-0">{{ $bill->title }}</h4>
                <div class="flex items-center justify-around gap-5 w-[40%]">
                    <p class="m-0">{{ $bill->due_date }}</p>
                    <h4 class="m-0 font-bold">$ {{ $bill->price }}</h4>
                    <button class="bg-rose-400 py-2 px-3 rounded font-bold">Pay</button>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
