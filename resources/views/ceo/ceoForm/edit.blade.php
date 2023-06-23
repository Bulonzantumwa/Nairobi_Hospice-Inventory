<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2 w-3/4 justify-center mx-auto">
                <div class="flex flex-wrap items-center mb-6">
                    <div class="w-full md:w-1/2 px-2 flex items-center justify-end">
                        <a href="{{ route('ceo.ceoForm.index') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                            View CEO Approved Requisitions
                        </a>
                    </div>
                </div>
                @if($requisitionItems->count() > 0)
                    <div class="grid grid-cols-4">
                        <p class="text-right">Requisition Name: <span class="text-lg font-bold">{{ $requisitionForm->requisitionName }}</span></p>
                        <p class="text-center">Department: <span class="text-lg font-bold">{{ $requisitionForm->department }}</span></p>
                        <p class="text-left">Sent By: <span class="text-lg font-bold">{{ $requisitionForm->user->name }}</span></p>
                        <p class="">Submitted On:<span class="text-lg font-bold">{{ $requisitionForm->updated_at }}</span></p>
                    </div>
                    <table class="w-full mx-auto rounded-lg shadow-lg bg-gray-100 py-2">
                        <thead class="bg-gray-200 border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Item Description
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Quantity
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Cost Per Unit (Kshs)
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Total Cost (Kshs)
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $totalCost = 0; // Initialize total cost variable
                        @endphp
                        @foreach($requisitionItems as $requisitionItem)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 dark:bg-darker rounded-md">
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                    {{ $requisitionItem->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                    {{ $requisitionItem->itemDescription }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                    {{ $requisitionItem->quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                    {{ number_format($requisitionItem->itemCost, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                    {{ number_format(($requisitionItem->itemCost) * ($requisitionItem->quantity), 2) }}
                                </td>
                            </tr>
                            @php
                                $totalCost += ($requisitionItem->itemCost) * ($requisitionItem->quantity); // Accumulate total cost
                            @endphp
                        @endforeach

                        <tr class="bg-gray-200 border-b">
                            <td colspan="3"></td>
                            <td class="text-gray-900 px-6 py-4 text-left text-lg font-bold">
                                Total Cost:
                            </td>
                            <td class="text-lg font-bold text-gray-900 px-6 py-4 text-left">
                                {{ number_format($totalCost, 2) }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-lg mx-auto">
                        <h2 class="text-xl font-bold mb-2">Remarks from the Finance Officer</h2>
                        <p class="text-gray-800">{{ $requisitionForm->foRemarks }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-lg mx-auto mt-4">
                        <h2 class="text-xl font-bold mb-2">Remarks from the CEO</h2>
                        <p class="text-gray-800">{{ $requisitionForm->ceoRemarks }}</p>
                    </div>
                @else
                    <span>No items have been added.</span>
                @endif
            </div>
        </main>
    </div>
</x-admin-dashboard-layout>

