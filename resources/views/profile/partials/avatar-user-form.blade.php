    <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            user Avatar
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
           Update or Add your Avater
        </p>
    </header>

    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <div>
                @if (session('message'))
                    <div class="text-green-600">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <x-input-label for="name" :value="__('Avater')" />
            <x-text-input id="name" name="avater" type="file" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
