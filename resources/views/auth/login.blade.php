<x-authentication-layout>
    <main>
        <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
            <h1 class="text-xl font-semibold text-center">Login</h1>
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
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
                <div class="flex items-center justify-between">
                    <!-- Remember me toggle -->
                    <label class="flex items-center">
                        <div class="relative inline-flex items-center">
                            <input
                                type="checkbox"
                                name="remember"
                                class="w-10 h-4 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none"
                            />
                            <span
                                class="absolute top-0 left-0 w-4 h-4 transition-all transform scale-150 bg-white rounded-full shadow-sm"
                            ></span>
                        </div>
                        <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">Remember me</span>
                    </label>

                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                </div>
                <div>
                    <button
                        type="submit"
                        class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
                    >
                        Login
                    </button>
                </div>
            </form>

            <!-- Or -->
{{--            <div class="flex items-center justify-center space-x-2 flex-nowrap">--}}
{{--                <span class="w-20 h-px bg-gray-300"></span>--}}
{{--                <span>OR</span>--}}
{{--                <span class="w-20 h-px bg-gray-300"></span>--}}
{{--            </div>--}}

            <!-- Social login links -->
            <!-- Brand icons src https://boxicons.com -->
            <!-- Register link -->
            <div class="text-sm text-gray-600 dark:text-gray-400">
{{--                Don't have an account yet? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>--}}
            </div>
        </div>
    </main>
</x-authentication-layout>
