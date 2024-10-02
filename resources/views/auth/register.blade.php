<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        
        <div>
            <x-input-label for="role" :value="__('Rôle')" />
            <select id="role" name="role_id" class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                @foreach($role as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mt-2">
            <x-input-label for="user_categorie_id" :value="__('Catégorie d\'utilisateur')" />
            <select id="user_categorie_id" name="user_categorie_id" class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                @foreach($userCategory as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        



        <div class="flex  mt-2 gap-4">
            <div class="w-1/2">
                <x-input-label for="name" :value="__('Nom')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"  />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        
            <div class="w-1/2">
                <x-input-label for="prenom" :value="__('Prénoms')" />
                <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom"/>
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>
        </div>
        

        <!-- Email Address -->
        <div class="flex gap-4 mt-2">
            <div class="w-1/2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        
            <div class="w-1/2">
                <x-input-label for="adresse" :value="__('Adresse')" />
                <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required autofocus autocomplete="adresse"  required/>
                <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
            </div>
        </div>
        
        <div class="flex gap-4 mt-2">
            <div class="w-1/2">
                <x-input-label for="name" :value="__('Téléphone')" />
                <x-text-input id="telephone" class="block mt-1 w-full" type="number" name="telephone" :value="old('telephone')" required autofocus autocomplete="telephone" />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>
        
            <div class="w-1/2">
                <x-input-label for="prenom" :value="__('Poste occupée')" />
                <x-text-input id="post" class="block mt-1 w-full" type="text" name="post" :value="old('post')" required autofocus autocomplete="post" />
                <x-input-error :messages="$errors->get('post')" class="mt-2" />
            </div>
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer votre mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Avez vous un compte ?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Inscription') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>