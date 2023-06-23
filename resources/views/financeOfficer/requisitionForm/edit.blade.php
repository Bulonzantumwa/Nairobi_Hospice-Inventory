<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2 w-3/4 justify-center mx-auto">
                <div class="flex items-center justify-end px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    <a href="{{ route('financeOfficer.requisitionForm.index') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                        View Requisitions
                    </a>
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
                    <form method="POST" action="{{ route('financeOfficer.requisitionForm.forward', $requisitionForm) }}" class="shadow-lg rounded-md bg-gray-100 py-2">
                        @method('PUT')
                        @csrf
                        <div class="mb-6">
                            <label for="foRemarks" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks</label>
                            <textarea rows="5" id="foRemarks" name="foRemarks" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="Remarks" required></textarea>
                        </div>
                        @error('foRemarks')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                        <div class="flex">
                            <button type="submit" name="status" value="2" class="flex items-center px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark ml-5">Forward to CEO for Approval</button>
                            <button type="submit" name="status" value="-2" class="flex items-center px-4 py-2 text-sm text-white rounded-md bg-red-500 hover:bg-red-500-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark ml-5">Reject</button>
                        </div>
                    </form>
                @else
                    <span>No items have been added.</span>
                @endif
            </div>
        </main>
    </div>
</x-admin-dashboard-layout>

