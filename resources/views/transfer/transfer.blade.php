<x-app-layout>
    <h2>welcome: {{ Auth::user()->name }}</h2>

    <form action="{{ route('transfer.handlTransfer') }}" method="post">
        @csrf
        <h3>select your card number</h3>
        <div class="flex flex-col">
            <select name="source_card" id="">
                <option value="" selected disabled>select your card</option>
                @foreach ($authUser->cards as $card)
                    <option value="{{ $card->id }}">{{ $card->card_number }}</option>
                @endforeach
            </select>
            @error('source_card')
                <span class="text-red-500">{{ $message }} </span>
            @enderror
        </div>

        <h4>select the rip of the profile that you want to send money to it</h4>
        <div class="flex flex-col">
            <select name="receive_card" id="">
                <option value="" selected disabled>select the profile</option>
                @foreach ($cards as $card)
                    <option value="{{ $card->id }}">{{ $card->rib }} : {{ $card->user->name }}</option>
                @endforeach
            </select>
            @error('receive_card')
                <span class="text-red-500">{{ $message }} </span>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="">amount :</label>
            <input type="number" name="amount" placeholder="amount">
            @error('errorMessage')
                <span class="text-red-500">{{ $message }} </span>
            @enderror
            @error('amount')
                <span class="text-red-500">{{ $message }} </span>
            @enderror
        </div>
        <button class="btn btn-primary w-full mt-4">send</button>
    </form>


</x-app-layout>