<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information, avatar, and email address.") }}
        </p>
    </header>

    <!-- Hidden form for email verification resend -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Update Form -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <!-- Avatar Upload Section -->
        <div>
            <x-input-label for="avatar" :value="__('Profile Picture')" />
            <div class="relative flex items-center mt-4 space-x-6">
                <!-- Profile Image Container -->
                <div class="relative w-40 h-40">
                    <!-- User Avatar with Rounded Border -->
                    <img id="avatar-preview" src="{{ $user->getAvatar() }}" alt="{{ $user->name }}"
                        class="object-cover w-40 h-40 border-4 border-gray-300 rounded-full shadow-md">

                    <!-- Edit Icon (Clickable) -->
                    <label for="avatar"
                        class="absolute flex items-center justify-center w-10 h-10 text-white transition duration-300 ease-in-out bg-indigo-600 rounded-full shadow-md cursor-pointer bottom-2 right-2 hover:bg-indigo-700">
                        <i class="fas fa-edit"></i>
                    </label>
                </div>

                <!-- File Input (Hidden) -->
                <div class="flex flex-col">
                    <input id="avatar" name="avatar" type="file" class="hidden" onchange="previewAvatar(event)">
                    <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                </div>
            </div>
        </div>

        <!-- JavaScript to Preview Selected Image -->
        <script>
            function previewAvatar(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('avatar-preview').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>



        <!-- Name Field -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Field -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification"
                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button & Feedback -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
