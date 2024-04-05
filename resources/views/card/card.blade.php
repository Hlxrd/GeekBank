<x-app-layout>

    <h3 class="text-white py-2 ">Your cards</h3>
    <table class="bg-gray-800 text-white h-[15vh] table">
        <thead>
            <tr>
                <th scope="col">card number</th>
                <th scope="col">rib</th>
                <th scope="col">balance</th>
                <th scope="col">expiration date</th>
                <th>delete your card</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userCards as $card)
                <tr>
                    <th scope="row">{{ $card->card_number }}</th>
                    <td>{{ $card->rib }}</td>
                    <td>{{ $card->balance }}</td>
                    <td>{{ $card->expiration_date }}</td>
                    <form action="{{ route('myCard.destroy', $card) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <td><button class="btn btn-danger">delete</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>



    <form action="{{ route('myCard.distributeBalance') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <label for="" class="text-white text-xl py-3">Select a card</label>
            <select name="source_card" id="" class="rounded-full">
                <option value="">select a card</option>
                @foreach ($userCards as $card)
                    <option value="{{ $card->id }}">{{ $card->card_number }}</option>
                @endforeach
            </select>
            @error('source_card')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="" class="text-white text-xl py-3" >To card</label>
            <select class="rounded-full" name="receive_card" id="">
                <option value="">select a card</option>
                @foreach ($userCards as $card)
                    <option value="{{ $card->id }}">{{ $card->card_number }}</option>
                @endforeach
            </select>
            @error('receive_card')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col pt-2">
            <label for="" class="text-white text-xl py-3" >Amount</label>
            <input class="rounded-full" type="number" name="amount" placeholder="amount">
            @error('amount')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button class="bg-secondary-color px-4 py-2 rounded-full mt-4">Submit</button>
    </form>

    <h4 class="text-white py-4">Request additional card:</h4>
    <form action="{{ route('myCard.store') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <button class="px-8 py-2 bg-red-500 text-white rounded-full w-[15%]">Request the card</button>
            @error('errorMessage')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </form>
</x-app-layout>
