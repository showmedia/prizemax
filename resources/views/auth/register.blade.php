<x-guest-layout>

<style>
    body{
        background-color: #f3f4f6;
    }
</style>

    <x-jet-authentication-card>

        <x-slot name="logo">

            <div class="login">

                <img src="/img/logo.png" style="width: 200px;"  alt="">

            </div>

        </x-slot>



        <x-jet-validation-errors class="mb-4" />

    <!--     @if($indicado)
            <h4 style="text-align:center; background-color:#d1e7dd; color: #0A3622; padding: 3px; border-radius: 5px; margin-bottom: 10px;">Indicado de <b>{{$indicado->name ?? ''}}</b> </h4>
        @endif -->



        <form method="POST" action="/register">

            @csrf

<!-- 
            <x-jet-input id="indicador"  type="hidden" name="indicador" value="{{$indicado->id ?? ''}}" />
 -->

            <div>

                <x-jet-label for="name" value="{{ __('Nome') }}" />

                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />

            </div>



            <div class="mt-4">

                <x-jet-label for="email" value="{{ __('Email') }}" />

                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

            </div>



            <div class="mt-4">

                <x-jet-label for="password" value="{{ __('Senha') }}" />

                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            </div>



            <div class="mt-4">

                <x-jet-label for="password_confirmation" value="{{ __('Confirme sua Senha') }}" />

                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            </div>



            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                <div class="mt-4">

                    <x-jet-label for="terms">

                        <div class="flex items-center">

                            <x-jet-checkbox name="terms" id="terms"/>



                            <div class="ml-2">

                                {!! __('I agree to the :terms_of_service and :privacy_policy', [

                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',

                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',

                                ]) !!}

                            </div>

                        </div>

                    </x-jet-label>

                </div>

            @endif



            <div class="flex items-center justify-end mt-4">

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">

                    {{ __('Já é registrado?') }}

                </a>



                <x-jet-button class="ml-4">

                    {{ __('Cadastrar') }}

                </x-jet-button>

            </div>

        </form>

    </x-jet-authentication-card>

</x-guest-layout>

