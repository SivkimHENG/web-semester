{{-- resources/views/livewire/user-authenticated.blade.php --}}
<div class="flex min-h-screen flex-col bg-white">
    <div class="container mx-auto px-4 py-8 md:px-6 lg:px-8">
        {{-- Logo --}}
        <div class="mb-8">
            <div class="flex items-center text-xl font-semibold">
                <svg class="mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M4.5 4.5a3 3 0 00-3 3v9a3 3 0 003 3h8.25a3 3 0 003-3v-9a3 3 0 00-3-3H4.5zm0 1.5h8.25a1.5 1.5 0 011.5 1.5v9a1.5 1.5 0 01-1.5 1.5H4.5a1.5 1.5 0 01-1.5-1.5v-9a1.5 1.5 0 011.5-1.5zm15-1.5a3 3 0 00-3 3v9a3 3 0 003 3H19.5a3 3 0 003-3v-9a3 3 0 00-3-3h-9zm0 1.5H19.5a1.5 1.5 0 011.5 1.5v9a1.5 1.5 0 01-1.5 1.5h-9a1.5 1.5 0 01-1.5-1.5v-9a1.5 1.5 0 011.5-1.5z" />
                </svg>
                Wirer
            </div>
        </div>

        <div class="flex flex-col md:flex-row">
            {{-- Form Section --}}
            <div class="md:w-1/2 md:pr-8">
                <h1 class="mb-2 text-2xl font-semibold text-gray-900">Sign in to your account</h1>
                <p class="mb-8 text-base text-gray-500">Welcome back to Wirer</p>

                <form wire:submit.prevent="authenticating" class="space-y-6">
                    {{-- Email Field --}}
                    <div>
                        <label for="email" class="block font-medium text-gray-900">Email</label>
                        <div class="mt-1">
                            <input id="email" type="email" wire:model.debounce.500ms="email" required
                                class="w-full rounded-md border border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                placeholder="you@example.com">
                        </div>
                        @error('email')
                            <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Password Field --}}
                    <div>
                        <label for="password" class="block font-medium text-gray-900">Password</label>
                        <div class="relative mt-1">
                            <input id="password" type="password" wire:model.debounce.500ms="password" required
                                class="w-full rounded-md border border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                placeholder="Enter your password">
                            <button type="button" onclick="togglePassword('password')"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" type="checkbox" wire:model="remember"
                                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>
                    </div>

                    {{-- Submit Button with Loading State --}}
                    <button type="submit"
                        class="w-full rounded-md bg-gray-900 px-6 py-3.5 text-base font-medium text-white transition-colors hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2"
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-75 cursor-not-allowed">
                        <span wire:loading.remove>Sign in</span>
                        <span wire:loading wire:target="authenticating">
                            <svg class="mx-auto h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>

                    {{-- Sign Up Link --}}
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline">Create an account</a>
                        </p>
                    </div>
                </form>
            </div>

            <div class="hidden md:block md:w-1/2 mt-36 ml-4">
                <img src="https://images.unsplash.com/photo-1528698827591-e19ccd7bc23d?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="..." class="rounded-lg shadow-lg" />
            </div>
        </div>

    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        field.type = field.type === "password" ? "text" : "password";
    }
</script>
