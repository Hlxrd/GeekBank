<x-app-layout>

    <h4 class="text-white py-2">Your cards</h4>
    <table class="bg-gray-800 text-white h-[15vh] table rounded-full">
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



    <h4>distribute your balance between your cards</h4>
    <form action="{{ route('myCard.distributeBalance') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <label for="">from card</label>
            <select name="source_card" id="">
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
            <label for="">to card</label>
            <select name="receive_card" id="">
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
            <label for="">amount</label>
            <input type="number" name="amount" placeholder="amount">
            @error('amount')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-secondary mt-4">submit</button>
    </form>

    <h4>request additional card:</h4>
    <form action="{{ route('myCard.store') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <button class="btn btn-primary w-[15%]">request the card</button>
            @error('errorMessage')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </form>
</x-app-layout>
