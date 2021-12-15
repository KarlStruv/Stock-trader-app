<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search for a company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="get" action="{{ route('stocks.search') }}">
                        @method('GET')
                        <label for="company">Company Name or Symbol:</label><br>
                        <input type="text" id="company" name="company">
                        <input type="submit" value="Search">
                    </form>
                    @if($company != null)
                                            <table>
                                                <tr>
                                                    <th>{{$company['name']}}</th>
                                                </tr>
                                                <tr>
                                                    <td>Current price: {{$company['currentPrice']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Highest price today: {{$company['highPrice']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Lowest price today: {{$company['lowPrice']}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div>
                                            <form method="post" action="{{ route('stocks.purchase') }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="symbol" value="{{$company['symbol']}}">
                                                <input type="hidden" name="name" value="{{$company['name']}}">
                                                <input type="hidden" name="currentPrice" value="{{$company['currentPrice']}}">
                                                <input type="number" id="amount" name="amount" min="0" style="width: 90px">
                                                <input type="submit" value="Buy">
                                            </form>
                                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
