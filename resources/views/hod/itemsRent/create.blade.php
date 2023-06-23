<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2 w-3/4 justify-center mx-auto">
                <div class="flex items-center justify-end px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    <a href="{{ route('hod.itemsRent.index') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                        View Items
                    </a>
                </div>
                <form method="POST" action="{{ route('hod.itemsRent.store') }}" class="shadow-lg rounded-md bg-gray-100 py-2">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="itemName" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Name</label>
                            <input type="text" id="itemName" name="itemName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="Item description" required>
                        </div>
                        @error('itemName')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror

                        <div class="mb-6">
                            <label for="quantity" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="Item quantity" required>
                        </div>
                        @error('quantity')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="condition_id" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition</label>
                            <select id="condition_id" name="condition_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" required>
                                <option value="">Select condition</option>
                                @foreach($conditions as $condition)
                                    <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('condition_id')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror

                        <div class="mb-6">
                            <label for="deposit" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deposit</label>
                            <input type="number" id="deposit" name="deposit" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="100" required>
                        </div>
                        @error('deposit')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror

                        <div class="mb-6">
                            <label for="weeklyCharge" class="focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weekly Charge</label>
                            <input type="number" id="weeklyCharge" name="weeklyCharge" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="100" required>
                        </div>
                        @error('weeklyCharge')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="flex items-center px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark ml-5">Save</button>
                </form>
            </div>
        </main>
    </div>
</x-admin-dashboard-layout>

