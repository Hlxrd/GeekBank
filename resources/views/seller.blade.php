<x-app-layout>
    <div class=" flex justify-center pt-5">
        <div class="flex flex-col w-[35%] bg-[#1f2937] p-[1.5rem] rounded-md">
            <h1 class="text-white font-semibold">seller page</h1>
            <form method="POST" action="{{ route('product.store') }}">
                @csrf

                <!-- title -->
                <div>
                    <label class="text-gray-400 text-[1.1rem]" for="title">title</label>
                    <input id="title" class="block mt-1 w-full rounded-md border-none text-black bg-gray-300"
                        placeholder="title" type="text" name="title">
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label class="text-gray-400 text-[1.1rem]" for="description">description</label>
                    <input type="text" id="description"
                        class="block mt-1 w-full rounded-md border-none text-black bg-gray-300"
                        placeholder="description" type="text" name="description">
                </div>

                <!-- price -->
                <div class="mt-4">
                    <label class="text-gray-400 text-[1.1rem]" for="price">price</label>
                    <input type="number" id="price"
                        class="block mt-1 w-full rounded-md border-none text-black bg-gray-300" placeholder="price"
                        type="text" name="price">
                </div>


                <button class="btn btn-primary mt-4 w-[100%]">add</button>
            </form>
        </div>
    </div>
</x-app-layout>
