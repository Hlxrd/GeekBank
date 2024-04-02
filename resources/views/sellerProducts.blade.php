<x-app-layout>
    <h4 class="pb-2">My products:</h4>
    <div class="flex gap-5">
        @foreach ($sellerProducts as $product)
            <div class="card" style="width: 20rem;">
                <img src="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">price: {{ $product->price }}</p>
                    <a href="#" class="btn btn-primary">by</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pt-[2rem]">{{ $sellerProducts->links() }}</div>
</x-app-layout>
