<x-app-layout>

    <div class=" w-[100%] flex ">
        <div class="w-[100%] h-screen justify-center">

            <h1>
                <div class=" text-white py-4">
                    Current balance: <span class="text-secondary-color">{{ $card->balance }} DH</span>  
                </div>
            <div class="bg-gray-800 p-8 rounded-xl text-white mt-4 w-[40vw]">
                                    <h2>Crypto Wallet</h2>
                <ul>
                    @foreach ($cryptocurrencies as $cryptocurrency)
                        <li class="text-secondary-color">{{ $cryptocurrency->coin_name }}: {{ $cryptocurrency->amount }}</li>
                    @endforeach
                </ul>
            </div>

            </h1>
            <div id="crypto-data" class="flex flex-col justify-center items-center">
                <h1 class="font-thin text-4xl py-4 mb-9 text-secondary-color">Market Overview</h1>
                <table class=" bg-gray-700 text-white text-center w-[100%] rounded-lg">
                    <thead class=" bg-secondary-color ">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">symbol</th>
                            <th scope="col">name</th>
                            <th scope="col">price</th>
                            <th scope="col">1h%</th>
                            <th scope="col">24h%</th>
                            <th scope="col">7d%</th>
                            <th scope="col">Market Cap</th>
                            <th scope="col">Volume(24h)</th>
                            <th scope="col">Trade</th>
                        </tr>
                    </thead>
                    <tbody class="  ">
                        @foreach ($paginator as $i => $crypto)
                            <tr class="text-center  ">
                                <th class="py-4 items-center bg" scope="row">{{ $crypto['cmc_rank'] }}</th>
                                <td class="py-3 font-bold  ">
                                    <img class="ml-6"
                                        src="https://s2.coinmarketcap.com/static/img/coins/64x64/{{ $crypto['id'] }}.png"
                                        width="40" alt="">
                                </td>
                                <td class="py-4 font-bold  ">
                                    <p>{{ $crypto['name'] }} <span
                                            class="text-[#7c8698]">({{ $crypto['symbol'] }})</span></p>
                                </td>
                                <td class="py-4  font-bold text-secondary-color  ">
                                    {{ number_format($crypto['quote']['USD']['price'], 2) }} $</td>
                                <td class=" py-4 font-bold items-center">
                                    {{ $crypto['quote']['USD']['percent_change_24h'] }}</td>
                                <td class=" py-4  font-bold items-center">
                                    {{ $crypto['quote']['USD']['percent_change_7d'] }}</td>
                                <td class=" py-4 font-bold text-[#f1967c] items-center">
                                    ${{ number_format($crypto['quote']['USD']['market_cap'] / 1000000000, 2) }}B</td>
                                <td class=" py-4 font-bold items-center">
                                    ${{ number_format($crypto['quote']['USD']['volume_24h'], 2) }}</td>
                                <td class=" py-4 font-bold items-center"><img
                                        src="https://s3.coinmarketcap.com/generated/sparklines/web/7d/2781/{{ $crypto['id'] }}.svg"
                                        alt=""></td>
                                <td id="{{ $crypto['id'] }}" class="hover:text-white fori font-bold">
                                    <!-- Button trigger modal -->
                                    <button id="" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modal{{ $crypto['id'] }}">
                                        Buy/Sell
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{ $crypto['id'] }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('crypto.buy') }}" method="POST"
                                                        class="flex flex-col justify-around text-black">
                                                        @csrf
                                                        <input hidden name="crypto_id" value="{{ $crypto['id'] }}"
                                                            type="text">
                                                            <input hidden name="coin_name" value="{{ $crypto['name'] }}"
                                                            type="text">
                                                        <h1>{{ $crypto['name'] }}</h1>
                                                        <div class="flex flex-col justify-around">
                                                            <label for="quantity">Quantity</label>
                                                            <input class="quantity" name="quantity" id="quantity"
                                                                onchange="updateAmount()" 
                                                                data-price="{{ $crypto['quote']['USD']['price'] }}">
                                                        </div>
                                                        <div class="flex flex-col justify-around">
                                                            <label for="price">Price</label>
                                                            <input  readonly name="price"
                                                                value="{{ number_format($crypto['quote']['USD']['price'], 2) }}">
                                                            {{-- <input readonly value="" name="price">${{ number_format($crypto['quote']['USD']['price'], 2) }}
                                                            </input> --}}
                                                        </div>
                                                        <select name="card_id">
                                                            @foreach ($user->cards as $card)
                                                                <option value="{{ $card->id }}">
                                                                    {{ $card->card_number }}</option>
                                                            @endforeach
                                                            <div class="flex flex-col justify-around">
                                                                <label for="amount">Amount</label>
                                                                <input class="amount" value="" name="amount"
                                                                    id="amount"  readonly>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Buy</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td>@mdo</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="">

                    <div class="d-flex justify-content-center mt-3 ">
                        {{ $paginator->links('pagination::simple-bootstrap-5') }}
                    </div>
                </div>
                <ul>
                    {{-- Wissal's api --}}
                    <li>
                        {{-- <img src="{{ $crypto['logo'] }}" alt="{{ $crypto['name'] }} Logo" style="width: 20px; height: 20px;"> --}}
                        {{-- {{ $crypto['name'] }}: ${{ number_format($crypto['quote']['USD']['price'], 2) }} --}}
                    </li>

                    {{-- chat Gpt --}}
                    {{-- <div class="crypto-card">
                        <img src="{{ $crypto['logo'] }}" alt="{{ $crypto['name'] }} Logo">
                        <h2>{{ $crypto['name'] }} ({{ $crypto['symbol'] }})</h2>
                        <p>Price: ${{ number_format($crypto['price'], 2) }}</p>
                    </div> --}}


                    {{-- API with prolblems in request so it's just for emegency --}}
                    {{-- <img src="{{ $crypto['image'] }}" alt="{{ $crypto['name'] }} Logo" style="width: 20px; height: 20px;">
                        <li>{{ $crypto['name'] }}: ${{ number_format($crypto['current_price'], 2) }}</li> --}}
                </ul>
            </div>
        </div>
    </div>


</x-app-layout>
