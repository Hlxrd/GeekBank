<x-app-layout>
    <div class="flex flex-col items-center gap-4">
        <h1 class="pb-4 text-center text-white font-bold">Your Investments</h1>

        <div class="w-[70vw] rounded py-3 px-5 bg-[#ffb000] flex items-center justify-between">
            <div class="w-[100%]">
                <form method="post" action="{{ route('invest.store') }}"
                    class="flex items-center justify-around w-[100%]">
                    @csrf
                    <input type="text" name="nameInvest" class="m-0 rounded" placeholder="Insert Invest's Name"
                        required>
                    <select name="type" class="rounded" required>
                        <option value="" selected disabled>--Select Type--</option>
                        <option value="1">Short-Invest</option>
                        <option value="2">Medium-Invest</option>
                        <option value="3">Long-Invest</option>
                    </select>
                    <input type="number" name="amount" placeholder="Insert your amount" class="rounded" required>
                    <div class="flex flex-col">
                        <select name="selected_card" class="rounded" id="">
                            <option value="" selected disabled>select your card</option>
                            @foreach ($authUser->cards as $card)
                                <option value="{{ $card->id }}">{{ $card->card_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">Submit</button>
                </form>
            </div>
        </div>
        @error('selected_card')
            <span class="text-red-500">{{ $message }} </span>
        @enderror

        <div class="w-[70vw] rounded px-[8vw] flex items-center justify-between bg-yellow-100 py-2">
            <p class=" w-[30%] m-0">Investment</p>
            <p class=" w-[30%] m-0">Type of Investment</p>
            <p class=" w-[30%] m-0">Amount</p>
            <p class=" w-[10%] m-0">Delete</p>

        </div>
        @foreach ($invests as $invest)
            <div class="w-[70vw] rounded px-[8vw] flex items-center justify-between bg-[#ffb000] py-3">
                <h4 class=" w-[30%]  m-0">{{ $invest->nameInvest }}</h4>
                <h4 class=" w-[30%]  m-0">{{ $invest->investment_option->name }}</h4>
                <h4 class=" w-[30%]  m-0 font-bold">{{ $invest->amount }}</h4>
                <form class="w-[10%] " action="{{ route("invest.destroy",$invest) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="bg-red-500 rounded p-2">delete</button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
