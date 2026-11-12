<?php
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

use Livewire\Component;

new #[Layout('layouts.auth-layout')] #[Title('Вход')] class extends Component {
    public string $email = '';

    public string $password = '';

    public function login(): void
    {
        $validated = $this->validate([
            'email' => ['required', 'min:3', 'max:255', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => 'Неверный email или пароль.',
            ]);
        }

        request()->session()->regenerate();

        $this->redirectRoute('product.index', navigate: true);
    }
};
?>


<div class="w-full max-w-xs">

    <div class="flex items-center justify-between gap-4">
        <h1 class="text-3xl font-semibold mb-4">Вход</h1>
        <a href="{{ route('product.index') }}" class="link link-hover underline-offset-4" wire:navigate>На главную</a>
    </div>

    <form wire:submit="login" class="space-y-4">
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

        <div class="flex items-center justify-between gap-4 pt-5">
            <button type="submit" class="btn btn-neutral">Войти</button>
            <a href="{{ route('auth.register') }}" class="link link-hover underline-offset-4"
                wire:navigate>Зарегистрироваться</a>
        </div>

    </form>
</div>
