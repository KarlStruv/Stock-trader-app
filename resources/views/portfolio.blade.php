<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Portfolio') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table style="width:95%">
                    <tr>
                        <th>Company</th>
                        <th>Amount</th>
                        <th>Price paid</th>
                        <th>Current value</th>
                        <th>Profit</th>
                    </tr
                    @foreach($stock as $record)
                        <tr>
                            <td style="text-align: center">{{$record->getName()}}</td>
                            <td style="text-align: center">{{$record->getAmount()}}</td>
                            <td style="text-align: center">{{$record->getPurchasedFor()}}</td>
                            <td style="text-align: center">{{$record->getNewestValue()}}</td>
                            <td style="text-align: center">{{$record->getProfit()}}</td>
                            <td>
                                <form method="get" action="">
                                    <input type="number" id="amount" name="amount" style="width: 15%; height: 30px">
                                    <input type="submit" value="Sell">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
