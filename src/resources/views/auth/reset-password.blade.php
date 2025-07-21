<x-guest-layout>
    <h2 class="auth-title">Register</h2>

    <div class="auth-form-card">
        <x-auth-validation-errors class="auth-error-message" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="auth-form-group">
                <x-label for="name" :value="__('お名前')" class="auth-label" />
                <x-input id="name" class="auth-input" type="text" name="name" :value="old('name')" required autofocus placeholder="例：山田太郎"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4 auth-form-group">
                <x-label for="email" :value="__('メールアドレス')" class="auth-label" />
                <x-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required placeholder="例：test@example.com"/>
            </div>

            <!-- Password -->
            <div class="mt-4 auth-form-group">
                <x-label for="password" :value="__('パスワード')" class="auth-label" />
                <x-input id="password" class="auth-input" type="password" name="password" required autocomplete="new-password" placeholder="例：coachtech106"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 auth-form-group">
                <x-label for="password_confirmation" :value="__('確認用パスワード')" class="auth-label" />
                <x-input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required placeholder="例：coachtech106"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="auth-link" href="{{ route('login') }}">
                    {{ __('すでにアカウントをお持ちの方はこちら') }}
                </a>

                <x-button class="ml-4 auth-button">
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>