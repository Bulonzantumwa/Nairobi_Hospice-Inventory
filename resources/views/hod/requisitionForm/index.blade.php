<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2">
                <div class="flex items-center justify-end px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    <a href="{{ route('hod.requisitionForm.create') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                        New requisition
                    </a>
                </div>
                <table class="w-3/4 mx-auto rounded-lg shadow-lg">
                    <thead class="bg-gray-200 border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Name
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Department
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Status
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requisitionForms as $requisitionForm)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 dark:bg-darker rounded-md">
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                {{ $requisitionForm->requisitionName }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                {{ $requisitionForm->department }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                @if($requisitionForm->status == 0)
                                    Created
                                @elseif($requisitionForm->status == 1)
                                    <span class="text-green-400">Forwarded to Finance Office</span>
                                @elseif($requisitionForm->status == -2)
                                    <span class="text-red-400">Rejected by Finance Office</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                <div class="flex">
                                    <a href="{{ route('hod.requisitionForm.edit', $requisitionForm) }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark mr-3">Edit/Add Items</a>
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-800 text-white rounded-md" method="POST" action="{{ route('hod.requisitionForm.destroy', $requisitionForm) }}" onsubmit="return confirm('You are about to delete an item from this requisition...')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Remove</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-admin-dashboard-layout>
