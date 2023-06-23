<x-admin-dashboard-layout>
    <div class="h-full p-4 w-full">
        <main>
            <div class="mt-2 w-3/4 justify-center mx-auto">
                <div class="flex items-center justify-end px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
                    <a href="{{ route('superAdmin.users.index') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                        View Roles
                    </a>
                </div>
                <div>
                    {{ $user->name }}
                </div>
                <div>
                    {{ $user->email }}
                </div>
            </div>
            <div class="mt-2 w-3/4 justify-center mx-auto p-2">
                <h2 class="text-2xl font-semibold">Role Permissions</h2>
                <div class="flex mt-4 mb-4">
                    @if($user->roles)
                        @foreach($user->roles as $user_role)
                            <form method="POST" action="{{ route('superAdmin.users.roles.remove', [$user->id, $user_role->id]) }}" onsubmit="return confirm('Are you sure you want to remove this role?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark mr-3">
                                    {{ $user_role->name }}</button>
                            </form>
                        @endforeach
                    @endif
                </div>
                <div class="mt-2 w-3/4 justify-center mx-auto p-2 border-gray-200">
                    <form method="POST" action="{{ route('superAdmin.users.role', $user->id) }}">
                        @csrf
                        <div class="mb-6">
                            <label for="role" class="sr-only">Role</label>
                            <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-3/4 justify-center mx-auto" required>
                                <option selected value="">Choose a role</option>
                                @foreach( $roles as $role )
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <button type="submit" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark mr-3">Assign</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-admin-dashboard-layout>

