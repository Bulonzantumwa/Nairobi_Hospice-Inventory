<x-authentication-layout>
    <main>
        <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
            <h1 class="text-xl font-semibold text-center">Register</h1>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Picture upload -->

{{--                <x-picture-input />--}}

{{--                <input--}}
{{--                    class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"--}}
{{--                    type="text"--}}
{{--                    name="name"--}}
{{--                    placeholder="name"--}}
{{--                    required--}}
{{--                />--}}
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <input
                    class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                    type="email"
                    name="email"
                    placeholder="Email address"
                    required
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <input
                    class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <input
                    class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                    required
                />
                <div class="flex items-center justify-between">
                    <!-- Remember me toggle -->
                    <label class="flex items-center">
                        <div class="relative inline-flex items-center">
                            <input
                                type="checkbox"
                                name="accept_terms"
                                class="w-10 h-4 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none"
                            />
                            <span
                                class="absolute top-0 left-0 w-4 h-4 transition-all transform scale-150 bg-white rounded-full shadow-sm"
                            ></span>
                        </div>
                        <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">
                    I accept the
                    <a href="#" class="text-sm text-blue-600 hover:underline">Terms and Conditions</a>
                  </span>
                    </label>
                </div>
                <div>
                    <button
                        type="submit"
                        class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
                    >
                        Register
                    </button>
                </div>
            </form>


            <!-- Login link -->
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
            </div>
        </div>
    </main>
</x-authentication-layout>
