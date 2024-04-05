<x-app-layout>
    <h2 class="text-white">Welcome: <span class="text-secondary-color underline">{{ Auth::user()->name }}</span> </h2>
<div class="w-full flex flex-col justify-center h-full items-center">
        <form action="{{ route('transfer.handlTransfer') }}" method="post" class="w-[40vw] bg-gray-800 p-8 rounded-xl">
        @csrf
        <label class="text-white py-3 text-xl">Select your card number</label>
        <div class="flex flex-col">
            <select name="source_card" id="" class="rounded-full">
                <option  value="" selected disabled>select your card</option>
                @foreach ($authUser->cards as $card)
                    <option value="{{ $card->id }}">{{ $card->card_number }}</option>
                @endforeach
            </select>
            @error('source_card')
                <span class="text-red-500">{{ $message }} </span>
            @enderror
        </div>

        <label class="text-white py-3 text-xl">Select the profile:</label>
        @if (count($cards) > 0)
            <div class="flex flex-col">
                <select name="receive_card" class="rounded-full" id="">
                    <option value="" selected disabled>select the profile</option>
                    @foreach ($cards as $card)
                        <option value="{{ $card->id }}">{{ $card->rib }} : {{ $card->user->name }}</option>
                    @endforeach
                </select>
                @error('receive_card')
                    <span class="text-red-500">{{ $message }} </span>
                @enderror
            </div>
        @else
            <div>
                <h5>no profile to display</h5>
            </div>
        @endif
        <div class="flex flex-col">
            <label for="" class="text-white py-3 text-xl">Amount :</label>
            <input type="number" class="rounded-full" name="amount" placeholder="amount">
            @error('errorMessage')
                <span class="text-red-500">{{ $message }} </span>
            @enderror
            @error('amount')
                <span class="text-red-500">{{ $message }} </span>
            @enderror
        </div>
        <div class="w-full flex justify-center">
            <button class="px-8 py-2 bg-secondary-color rounded-full mt-4">Send</button>
        </div>
    </form>
</div>



</x-app-layout>
