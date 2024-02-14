<x-guest-layout>
    <form method="POST" action="{{route('store.company')}}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="slogan" :value="__('Slogan')" />
            <x-text-input id="slogan" class="block mt-1 w-full" type="text" name="slogan" :value="old('slogan')"
                required />
            <x-input-error :messages="$errors->get('slogan')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="industry" :value="__('Industry')" />
            <x-text-input id="industry" class="block mt-1 w-full" type="text" name="industry" :value="old('industry')"
                required />
            <x-input-error :messages="$errors->get('industry')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"
                required />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
