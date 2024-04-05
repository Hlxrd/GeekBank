<x-app-layout>
    <h3 class="text-start font-bold">Your Bills</h3>
    <div class="flex flex-wrap gap-[3.5rem]">
        @foreach ($bills as $bill)
            <div class="card" style="width: 15rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $bill->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $bill->price }}DH</h6>
                    <p class="card-text">{{ $bill->description }}</p>
                    <x-billModal :bill="$bill" :user-cards="$userCards" />
                </div>
            </div>
        @endforeach`
    </div>
</x-app-layout>
