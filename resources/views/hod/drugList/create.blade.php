<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2 w-3/4 justify-center mx-auto">
                <div class="flex items-center justify-end px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    <a href="{{ route('hod.drugList.index') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                        View Items
                    </a>
                </div>
                <form method="POST" action="{{ route('hod.drugList.store') }}" class="shadow-lg rounded-md bg-gray-100 py-2">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="drugName" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Drug Name</label>
                            <input type="text" id="drugName" name="drugName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="Haematinics syrup" required>
                        </div>
                        @error('drugName')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror

                        <div class="mb-6">
                            <label for="quantity" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                            <input type="text" id="quantity" name="quantity" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="100 mg" required>
                        </div>
                        @error('quantity')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror

                        <div class="mb-6">
                            <label for="amount" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                            <input type="text" id="amount" name="amount" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="100 bottles" required>
                        </div>
                        @error('amount')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror

                        <div class="mb-6">
                            <label for="expiryDate" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expiry Date</label>
                            <input type="date" id="expiryDate" name="expiryDate" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="100" required>
                        </div>
                        @error('expiryDate')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="flex items-center px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark ml-5">Save</button>
                </form>
            </div>
        </main>
    </div>
</x-admin-dashboard-layout>

