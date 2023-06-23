<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2">
                <div class="flex items-center justify-end px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    <a href="{{ route('superAdmin.siteIdentity.create') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                        Update Site Information
                    </a>
                </div>
                <table class="w-3/4 mx-auto rounded-lg shadow-lg">
                    <thead class="bg-gray-200 border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Name
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Tag
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Website
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 dark:bg-darker rounded-md">
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                {{ $siteIdentity->siteName ?? 'Default Site Name' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                {{ $siteIdentity->siteTag ?? 'Default Site Tag' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                {{ $siteIdentity->mainUrl ?? 'Default Site URL' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium leading-none tracking-wider text-gray-500 dark:text-primary-light">
                                <div class="flex">
                                    @if($siteIdentity)
                                        <a href="{{ route('superAdmin.siteIdentity.edit', $siteIdentity) }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark mr-3">Edit</a>
                                    @else
                                        <a href="{{ route('superAdmin.siteIdentity.create') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark mr-3">Create</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-admin-dashboard-layout>
