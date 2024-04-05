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
                                                    <form action=""
                                                        class="flex flex-col justify-around text-black">
                                                        <h1>{{ $crypto['name'] }}</h1>
                                                        <div class="flex flex-col justify-around">
                                                            <label for="quantity">Quantity</label>
                                                            <input type="number">
                                                        </div>
                                                        <div class="flex flex-col justify-around">
                                                            <label for="price">price</label>
                                                            <h1> ${{ number_format($crypto['quote']['USD']['price'], 2) }}
                                                            </h1>
                                                        </div>
                                                        <div class="flex flex-col justify-around">
                                                            <label for="amount">amount</label>
                                                            <input type="text">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Buy</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>