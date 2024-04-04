<x-app-layout>
    <div class=" flex flex-col items-center gap-4">
        <h1 class="pb-4 text-center font-bold">Your Investments</h1>
        
        <div class="w-[70vw] rounded py-3 px-5 bg-red-300 flex items-center justify-between">
            <div class="w-[100%]" >
                <form action="" class="flex items-center justify-around  w-[100%]">
                    @csrf
                    <input class="m-0 rounded" placeholder="insert Invest's Name" required>
                    <select class="rounded"  name="" id="">
                        <option value="0" selected disabled >--select type--</option>
                        <option value="1">Short Invest</option>
                        <option value="2">Medium Invest</option>
                        <option value="3">Long Invest</option>
                    </select>
                    <input type="number" placeholder="Insert your amount" class="rounded " required>
                    
                </form>
            </div>
        </div>

        <div class="w-[70vw] rounded px-[9vw] flex items-center  justify-between bg-red-100 py-2">
                <p class=" m-0">Investment </p>
                <p class="m-0">Type of investment</p>
                <p class="m-0">Amount</p>
                <p class="m-0">Reward</p>
        </div>
        <div  class="w-[70vw] rounded px-[8vw] flex items-center justify-between bg-red-300 py-3">
                <h4 class="m-0">efdadawfd</h4>
                <h4 class="m-0">fewqefaef</h4>
                <h4 class="m-0 font-bold">adawda</h4>
                <h4 class="m-0 font-bold">adawda</h4>
        </div>
    </div>
</x-app-layout>