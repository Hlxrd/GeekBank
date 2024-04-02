<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <h1 class="text-white font-bold">Sign Up</h1>
            <p class="text-gray-400 ">It's quick and easy.</p>

        </div>

        <div class="grid grid-cols-2 gap-1">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <!-- Seller or Buyer -->
        <div class="mt-4">
            <x-input-label for="seller_or_buyer" :value="__('seller or buyer')" />
            <select class="text-white block mt-1 w-full bg-[#111827] rounded-md" name="seller_or_buyer"
                id="seller_or_buyer">
                <option value="" selected disabled></option>
                <option value="seller">seller</option>
                <option value="buyer">buyer</option>
            </select>
            <x-input-error :messages="$errors->get('seller_or_buyer')" class="mt-2" />

        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-blue-400 hover:text-blue-500  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

        </div>
        <button class="btn btn-primary w-full mt-4">register</button>
    </form>
</x-guest-layout>