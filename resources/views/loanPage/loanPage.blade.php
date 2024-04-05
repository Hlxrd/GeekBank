<x-app-layout>
    <div class="w-full h-full flex flex-col justify-center items-center">
            
        <h1 class="text-white mt-4 bg-primary-color px-4 py-2 rounded-full">Do u want <span class="text-secondary-color"> a loan?</span></h1>

        <div class="w-[50vw] bg-gray-800 m-auto rounded-lg p-4  flex flex-col justify-center items-center">
        <div>
            <h1 class="font-thin m-2 text-white">Take a Loan </h1>
        </div>

        <form action="{{ route('loan.takeLoan') }}" method="POST">
            @csrf
            <div class="form-group py-2">
                <label for="user_card" class="text-white">Select Card:</label>
                <select name="user_card" class="form-control" required>
                    <option value="" disabled selected>select card</option>
                    @foreach ($users->cards as $card)
                        <option value="{{ $card->id }}">{{ $card->card_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group py-2">
                <label for="amount" class="text-white">Loan Amount:</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="px-4 py-2 bg-secondary-color rounded-full ml-8 mt-4">Request Loan</button>
        </form>


    </div>
    </div>

</x-app-layout>
