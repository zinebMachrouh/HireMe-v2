<x-guest-layout>
    <form method="POST" action="{{route('jobs.store')}}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
                autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"
                required />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="skills" :value="__('skills')" />
            <x-text-input id="skills" class="block mt-1 w-full" type="text" name="skills" :value="old('skills')"
                required />
            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="contract" :value="__('contract')" />
            <x-text-input id="contract" class="block mt-1 w-full" type="text" name="contract" :value="old('contract')"
                required />
            <x-input-error :messages="$errors->get('contract')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="location" :value="__('location')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')"
                required />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
