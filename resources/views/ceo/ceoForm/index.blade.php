<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2">
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
                            Requisition Status
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
                                @if($requisitionForm->requisitionStatus == 0)
                                    Ordered
                                @elseif($requisitionForm->requisitionStatus == 1)
                                    Delivered
                                @elseif($requisitionForm->requisitionStatus == 2)
                                    Closed
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                <div class="flex">
                                    <a href="{{ route('ceo.ceoForm.edit', $requisitionForm) }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark mr-3">View</a>
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
