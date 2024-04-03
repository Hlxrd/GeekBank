<x-app-layout>

    <div class=" w-[100%] flex ">
    <div class="w-[15%] bg-[#f0f0f0] mr-16">
    
    </div>
        <div class="w-[80%] h-screen justify-center">
    
            <div id="crypto-data" class="flex flex-col justify-center items-center">
                <h1 class="font-bold text-4xl py-4 mb-9 text-sky-400">Market Overview</h1>
                <table class="table text-center w-[100%] border rounded-2xl">
                    <thead class=" bg-[#f0f0f0] ">
                        <tr>
                            <th scope="col">id</th>
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
                    <tbody>
                        @foreach ($paginator as $i => $crypto)
                            <tr class="hover:bg-sky-700 hover:text-white ">
    
                                <th class="hover:text-white py-4 " scope="row ">{{ $crypto['cmc_rank'] }}</th>
                                <td class="hover:text-white font-bold flex justify-around items-center "> <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/{{ $crypto['id'] }}.png" width="30" alt="">{{ $crypto['name'] }} <span class="text-[#7c8698]">({{ $crypto['symbol'] }})</span></td>
                                <td class="hover:text-white text-[#7c8698] font-bold">${{ number_format($crypto['quote']['USD']['price'], 2) }}</td>
                                <td class="hover:text-white text-[#7c8698] font-bold">{{ $crypto['quote']['USD']['percent_change_24h'] }}</td>
                                <td class="hover:text-white text-[#7c8698] font-bold" >{{ $crypto['quote']['USD']['percent_change_7d'] }}</td>
                                <td class="hover:text-white font-bold text-[#f1967c]">${{ number_format($crypto['quote']['USD']['market_cap'] / 1000000000, 2) }}B</td>
                                <td class="hover:text-white text-[#7c8698] font-bold">${{ number_format($crypto['quote']['USD']['volume_24h'], 2) }}</td>
                                <td class="hover:text-white text-[#7c8698] font-bold"><img src="https://s3.coinmarketcap.com/generated/sparklines/web/7d/2781/{{ $crypto['id'] }}.svg" alt=""></td>
                                <td id="{{ $crypto['id'] }}" class="hover:text-white text-[#7c8698] font-bold">Buy/Sell</td>
                                {{-- <td>@mdo</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="">
    
                    <div class="d-flex justify-content-center mt-3 ">
                        {{ $paginator->links("pagination::simple-bootstrap-5") }}
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