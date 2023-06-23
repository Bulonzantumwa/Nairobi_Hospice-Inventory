<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2 w-3/4 justify-center mx-auto">
                <div class="flex items-center justify-end px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    <a href="{{ route('hod.requisitionForm.index') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                        View Requisitions
                    </a>
                </div>
                <form method="POST" action="{{ route('hod.requisitionForm.update', $requisitionForm) }}" class="shadow-lg rounded-md bg-gray-100 py-2">
                    @method('PUT')
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="name" name="requisitionName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="Good/Usable" required value="{{ $requisitionForm->requisitionName }}">
                    </div>
                    @error('name')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                    <div class="mb-6">
                        <label for="description" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <input id="description" name="department" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="department" value="{{ $requisitionForm->department }}" required>
                    </div>
                    @error('description')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                    <button type="submit" class="flex items-center px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark ml-5">Save</button>
                </form>
                <div class="flex items-center justify-end px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    <div x-data="{ modelOpen: false }">
                        <button @click="modelOpen =!modelOpen" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                            <span>Add an Item</span>
                        </button>

                        <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                     x-transition:enter="transition ease-out duration-300 transform"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     x-transition:leave="transition ease-in duration-200 transform"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                                ></div>

                                <div x-cloak x-show="modelOpen"
                                     x-transition:enter="transition ease-out duration-300 transform"
                                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave="transition ease-in duration-200 transform"
                                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                                >
                                    <div class="flex items-center justify-between space-x-4">
                                        <h1 class="text-xl font-medium text-gray-800 ">Add a new product</h1>

                                        <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <p class="mt-2 text-sm text-gray-500 ">
                                        Add products to the list
                                    </p>

                                    <form action="{{ route('hod.requisitionItem.store') }}" method="POST" class="mt-5">
                                        @csrf
                                        <div>
                                            <label for="itemDescription" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Item Description</label>
                                            <input placeholder="Item Description" name="itemDescription" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                        </div>

                                        <div class="mt-4">
                                            <label for="quantity" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Quantity</label>
                                            <input placeholder="3" type="number" name="quantity" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                        </div>

                                        <div class="mt-4">
                                            <label for="itemCost" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Cost per Unit (Kshs)</label>
                                            <input placeholder="1000" name="itemCost" type="number" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                        </div>


                                        <div class="flex justify-end mt-6">
                                            <input type="hidden" name="requisition_form_id" value="{{ $requisitionForm->id }}">
                                            <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                                Save Product
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($requisitionItems->count() > 0)
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
                                Total Cost (kshs)
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Action
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
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                    <div class="flex">
                                        <a href="{{ route('hod.requisitionItem.edit', $requisitionItem) }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark mr-3">Edit</a>
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-800 text-white rounded-md" method="POST" action="{{ route('hod.requisitionItem.destroy', $requisitionItem) }}" onsubmit="return confirm('You are about to delete an item from this requisition...')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $totalCost += ($requisitionItem->itemCost) * ($requisitionItem->quantity); // Accumulate total cost
                            @endphp
                        @endforeach

                        <tr class="bg-gray-200 border-b">
                            <td colspan="3"></td>
                            <td class="text-gray-900 px-6 py-4 text-left text-2xl font-bold">
                                Total Cost:
                            </td>
                            <td class="text-2xl font-bold text-gray-900 px-6 py-4 text-left">
                                {{ number_format($totalCost, 2) }}
                            </td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    @if($requisitionForm->status == -2)
                        <div class="bg-gray-100 p-4 rounded-lg shadow-lg mx-auto mt-4 mb-4">
                            <h2 class="text-xl font-bold mb-2">Rejection Remarks</h2>
                            <p class="text-red-400">{{ $requisitionForm->foRemarks }}</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('hod.requisitionForm.forward', $requisitionForm) }}" class="shadow-lg rounded-md bg-gray-100 py-2">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="status" value="1" required>
                        <button type="submit" class="flex items-center px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark ml-5">Forward for Approval</button>
                    </form>
                @else
                    <span>No items have been added.</span>
                @endif
            </div>
        </main>
    </div>
</x-admin-dashboard-layout>

