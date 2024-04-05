@props(['bill'])
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#e{{ $bill->id }}">
    pay
</button>

<!-- Modal -->
<div class="modal fade" id="e{{ $bill->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bill.pay') }}" method="post">
                    @csrf
                    <h3>select your card number</h3>
                    <div class="flex flex-col">
                        <select name="card_selected" id="">
                            @foreach ($userCards as $card)
                                <option value="{{ $card->id }}">card id:{{ $card->card_number }} ,balance:
                                    {{ $card->balance }}
                                </option>
                            @endforeach
                        </select>
                        @error('card_selected')
                            <span class="text-red-500">{{ $message }} </span>
                        @enderror
                        <div class="flex flex-col">
                            <label for="">title</label>
                            <input type="text" name="service_name" readonly value="{{ $bill->title }}">
                        </div>
                        <div class="flex flex-col">
                            <label for="">price</label>
                            <input type="number" name="price" readonly value="{{ $bill->price }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
