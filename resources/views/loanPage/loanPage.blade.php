<x-app-layout>



    <div class="w-[50vw] m-auto rounded-lg p-4  flex flex-col justify-center items-center outline">
        <div>
            <h1 class="bg-slate-300 m-2 hover:underline cursor-pointer">Take a Loan </h1>
        </div>

        <form class="max-w-sm mx-auto" action="{{ route("takeLoan") }}" method="post">
            @csrf
            <div class="mb-5">
                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                    amount</label>
                <input type="number"  id="amount"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="insert the amount of the loan" t required />
            </div>
        <select name="card" id="">
            @foreach ($users->cards as $card)
            <option value="" selected disabled>Choose card</option>
                <option value="">{{ $card->card_number }}</option>
            @endforeach
        </select>
            
            
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                new account</button>
        </form>


    </div>
</x-app-layout>
