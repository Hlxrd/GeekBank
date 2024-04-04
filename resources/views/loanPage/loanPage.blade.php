<x-app-layout>



    <div class="w-[50vw] m-auto rounded-lg p-4  flex flex-col justify-center items-center outline">
        <div>
            <h1 class="bg-slate-300 m-2 hover:underline cursor-pointer">Take a Loan </h1>
        </div>

        <form action="{{ route('takeLoan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Loan Amount:</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="card_id">Select Card:</label>
                <select name="card_id" class="form-control" required>
                    @foreach ($users->cards as $card)
                        <option value="{{ $card->id }}">{{ $card->card_number }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Request Loan</button>
        </form>


    </div>
</x-app-layout>
