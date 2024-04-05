<x-app-layout>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">user</th>
                <th scope="col">card</th>
                <th scope="col">transaction type</th>
                <th scope="col">amount</th>
                <th scope="col">recipient rib</th>
                <th scope="col">service name</th>
                <th scope="col">from card</th>
                <th scope="col">to card</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $transaction->user->name }}</th>
                    <th scope="row">{{ $transaction->card->card_number }}</th>
                    <td>{{ $transaction->transaction_type }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->recipient_rib }}</td>
                    <td>{{ $transaction->service_name }}</td>
                    <td>{{ $transaction->from_card }}</td>
                    <td>{{ $transaction->to_card }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
