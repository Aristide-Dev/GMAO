<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-gmao.authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="first_name" value="{{ __('first_name') }}" />
                <x-input id="first_name" class="block w-full mt-1" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="" />
            </div>
            
            <div>
                <x-label for="last_name" value="{{ __('last_name') }}" />
                <x-input id="last_name" class="block w-full mt-1" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="" />
            </div>

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="" />
            </div>
            
            <div class="mt-4">
                <x-label for="telephone" value="{{ __('telephone') }}" />
                <x-input id="telephone" class="block w-full mt-1" type="text" name="telephone" :value="old('telephone')" required autocomplete="" />
            </div>
            
            <div class="mt-4">
                <x-label for="role" value="{{ __('role') }}" />
                <select name="role" id="role" class="block w-full mt-1 text-center border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">-- CHOISIR --</option>
                    <option value="super_admin">Super Admin</option>
                    <option value="admin">admin</option>
                    <option value="maintenance">maintenance</option>
                    <option value="demandeur">demandeur</option>
                    <option value="prestataire_admin">prestataire_admin</option>
                    <option value="agent">agent</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
