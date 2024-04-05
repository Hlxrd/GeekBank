<x-app-layout>
    <div class="w-full h-full  rounded-xl">

        {{--  --}}
        <div class="w-full  flex flex-row-reverse justify-around">

            <div class="bg-forth-color flex flex-col items-center mb-8 h-[38vh] w-[20vw] rounded-xl">
            <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-Clipart.png" class="w-[8vw] py-2" alt="">
            <p class="text-white font-thin text-xl py-2">{{ Auth::user()->name }}</p>
            <p class="text-green-500">+20% in the past week</p>
        </div>

            <div class="border-b bg-secondary-color border-gray-400 flex flex-col rounded-xl w-[30vw] h-[30vh]">
                <p class="text-3xl text-white font-thin py-4 px-4">Total balance</p>
                <p class="text-2xl px-4 text-white">$ <span class="text-5xl barlow-thin">1500</span> </p>

            </div>



        </div>






{{-- Wallet + investements --}}

<div class="w-[50vw] ml-20 mt-4">
    <article class="rounded-xl group duration-[.6s] [transform-style: preserve-3d]" style="transition: 0.6s;transform-style: preserve-3d;">
    
        <figure class="relative w-96 h-60  font-mono text-white overflow-hidden cursor-pointer group:hover:rotate-y-[180deg] transition-all duration-500">
          <!-- Front content -->
          <section
            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center gap-6 p-6 bg-gradient-to-tr from-bg-yellow-500 to-gray-700 transition-all duration-100 delay-200 z-20 rounded-full " style="transform: rotateY(0deg);">
    
            <div class="flex justify-between items-center">
              <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png" alt='Smart card' class="w-12">
    
              <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/visa.png" alt="Visa image" class="w-12">
            </div>
    
            <!-- CardNumber -->
            <div class="">
              <label for="" class="hidden">Card Number</label>
              <input type="text" id="" value="**** **** **** ****" readonly
                     class="outline-none w-full bg-transparent text-center text-2xl">
            </div>
    
            <div class="w-full flex flex-row justify-between">
    
              <div class="w-full flex flex-col">
                <label for="">Card holder</label>
                <input type="text" id="" value="{{ Auth::user()->name }}" readonly
                       class="outline-none bg-transparent ">
              </div>
    
              <div class="w-1/4 flex flex-col">
                <label for="">Expires</label>
                <input type="text" id="" value="12/34" readonly class="outline-none bg-transparent">
              </div>
    
            </div>
          </section>
          
          <!-- Back Content -->
          <section></section>
        </figure>
    
        <!-- Front content -->
        <div class="absolute top-0 left-0 w-[25vw] h-full flex flex-col justify-center gap-6 p-6 bg-gradient-to-tr from-gray-900 to-gray-700 transition-all duration-100 delay-200 z-20" style="transform: rotateY(0deg);">
    
          <div class="flex justify-between items-center">
            <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png" alt='Smart card' class="w-12">
    
            <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/visa.png" alt="Visa image" class="w-12">
          </div>
    
          <!-- CardNumber -->
          <div class="">
            <label for="" class="hidden">Card Number</label>
            <input type="text" id="" value="**** **** **** ****" readonly
                   class="text-white rounded-xl outline-none w-full bg-transparent text-center text-2xl">
          </div>
    
          <div class="w-full flex flex-row justify-between">
    
            <div class="w-full flex flex-col">
              <label for="" class="text-white font-thin py-2">Card holder</label>
              <input type="text" id="" value="{{ Auth::user()->name }}" readonly
                     class="outline-none bg-transparent text-white rounded-xl">
            </div>
    
            <div class="w-1/4 flex flex-col px-1">
              <label for="" class="text-white">Expires</label>
              <input type="text" id="" value="12/34" readonly class="outline-none bg-transparent text-white rounded-xl">
            </div>
    
          </div>
    
        </div>
    
        <!-- Back content -->
        <div class="absolute top-0 left-0 w-[40vw] h-full flex flex-col gap-3 justify-center bg-gradient-to-tr from-gray-900 to-gray-700 transition-all z-10"
             style="transform: rotateY(180deg);">
    
          <!-- Band -->
          <div class="w-full h-12 bg-black"></div>
    
          <div class="px-6 flex flex-col gap-6 justify-center">
            <div class="flex flex-col items-end">
              <label for="">CVV</label>
              <input type="text" id="" value="123" readonly
                     class="outline-none rounded text-black w-full h-8 text-right"
                     style="background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);">
            </div>
    
    
            <div class="flex justify-start items-center">
              <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/visa.png"
                   alt="" class="w-12">
            </div>
    
          </div>
    
        </div>
      </article>
</div>

</x-app-layout>
