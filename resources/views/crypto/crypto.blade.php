<x-app-layout>
    <h1>hello  from crypto page</h1>
    <div id="crypto-data">
        <h1>Cryptocurrency Data</h1>
        <ul>
            @foreach($cryptos as $crypto)
                <li>{{ $crypto['name'] }}: ${{ number_format($crypto['quote']['USD']['price'], 2) }}</li>
                <li>{{ $crypto-> }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>