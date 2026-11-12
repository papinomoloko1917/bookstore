<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

use Livewire\Component;

new #[Layout('layouts.auth-layout')] #[Title('Регистрация')] class extends Component {
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'min:3', 'max:255', 'string'],
            'email' => ['required', 'min:3', 'max:255', 'email'],
            'password' => ['required', Password::min(8)->mixedCase()->numbers(), 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        $this->redirectRoute('product.index', navigate: true);
    }
};
?>


<div class="w-full max-w-xs">

    <div class="flex items-center justify-between gap-4">
        <h1 class="text-3xl font-semibold mb-4">Регистрация</h1>
        <a href="{{ route('product.index') }}" class="link link-hover underline-offset-4" wire:navigate>На главную</a>
    </div>

    <form wire:submit="register" class="space-y-4">
        <div>
            <label class="block mb-1">Имя</label>
            <input name="name" type="text" class="input input-neutral" wire:model="name">
            @error('name')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block mb-1">Email</label>
            <input name="email" type="email" class="input input-neutral" wire:model="email">
            @error('email')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block mb-1">Пароль</label>
            <input name="password" type="password" class="input input-neutral" wire:model="password">
            @error('password')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block mb-1">Подтверждение пароля</label>
            <input name="password_confirmation" type="password" class="input input-neutral"
                wire:model="password_confirmation">
        </div>

        <div class="flex items-center justify-between gap-4 mt-5">
            <button type="submit" class="btn btn-neutral">Зарегистрироваться</button>
            <a href="{{ route('auth.login') }}" class="link link-hover underline-offset-4" wire:navigate>Уже есть
                аккаунт</a>
        </div>

    </form>
</div>
