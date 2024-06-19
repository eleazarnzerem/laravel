    <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            user Avatar
        </h2>
        <div class="w-16 h-16">
            <img class="w-50 h-50 rounded-full shadow-2xl" src="{{ "/storage/$user->avater" }}" alt=" User avater" />
        </div>
        <form method="post" action="{{ route('avatar.ai') }}">
        @csrf
        
            <x-primary-button>Generate with A.I</x-primary-button>
        </form>

        <div>
            
        </div>

        @if (session('message'))
            <div class="text-green-600">
                {{ session('message') }}
            </div>
        @endif
    </header>

    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Avater')" />
            <x-text-input id="name" name="avater" type="file" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('avater')" />
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
