<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2 w-3/4 justify-center mx-auto">
                <div class="flex items-center justify-end px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    <a href="{{ route('superAdmin.roles.index') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                        View Roles
                    </a>
                </div>
                <form action="{{ route('superAdmin.roles.update', $role) }}" method="POST" class="shadow-lg rounded-md bg-gray-100 py-2">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Name</label>
                        <input type="text" id="name" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light w-3/4 justify-center mx-auto" placeholder="Admin" required value="{{ $role->name }}">
                    </div>
                    @error('name')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                    <button type="submit" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark ml-5">Update Role</button>
                </form>
            </div>
{{--            <div class="mt-2 w-3/4 justify-center mx-auto p-2">--}}
{{--                <h2 class="text-2xl font-semibold">Role Permissions</h2>--}}
{{--                <div class="flex mt-4 mb-4">--}}
{{--                    @if($role->permissions)--}}
{{--                        @foreach($role->permissions as $role_permission)--}}
{{--                            <form method="POST" action="{{ route('superAdmin.roles.permissions.revoke', [$role, $role_permission->id]) }}" onsubmit="return confirm('Are you sure you want to revoke this permission?')">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark mr-3">--}}
{{--                                    {{ $role_permission->name }}</button>--}}
{{--                            </form>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <form action="{{ route('superAdmin.roles.permissions', $role) }}" method="POST" class="shadow-lg rounded-md bg-gray-100 py-2">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-6">--}}
{{--                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Name</label>--}}
{{--                        <select id="permission" name="permission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-3/4 justify-center mx-auto">--}}
{{--                            <option selected>Choose a permission</option>--}}
{{--                            @foreach($permissions as $permission)--}}
{{--                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    @error('name')<span class="text-red-400 text-sm">{{ $message }}</span>@enderror--}}
{{--                    <button type="submit" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark ml-5">Assign</button>--}}
{{--                </form>--}}
{{--            </div>--}}
        </main>
    </div>
</x-admin-dashboard-layout>

