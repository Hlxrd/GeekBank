<x-app-layout>
    <h3 class="text-start text-white text-4xl font-bold mb-4">Your <span class="text-secondary-color">Bills</span></h3>
    <div class="flex flex-wrap gap-[3.5rem]">
        @foreach ($bills as $bill)
            <div class="" style="width: 15rem;">
                <div class="card-body p-3 rounded-xl bg-gray-800 text-white">
                    <h5 class="card-title">{{ $bill->title }}</h5>
                    <h6 class="mb-2 text-secondary-color">{{ $bill->price }}DH</h6>
                    <p class="card-text">{{ $bill->description }}</p>
                    <x-billModal :bill="$bill" :user-cards="$userCards" />
                </div>
            </div>
        @endforeach`
    </div>
</x-app-layout>
