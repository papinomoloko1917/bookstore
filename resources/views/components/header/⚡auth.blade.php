<?php
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

new class extends Component {
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return $this->redirectRoute('product.index');
    }
};
?>

<div class="dropdown dropdown-end">
    @auth
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
                <img alt="Tailwind CSS Navbar component"
                    src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
            </div>
        </div>
        <ul tabindex="-1" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
            <li>
                <a class="justify-between">
                    Profile
                    <span class="badge">New</span>
                </a>
            </li>
            <li><a>Settings</a></li>
            <li><button type="button" wire:click="logout">Logout</button></li>
        </ul>
    @endauth

    @guest
        <a href="{{ route('auth.register') }}" class="btn btn-neutral btn-sm" wire:navigate>Регистрация</a>
        <a href="{{ route('auth.login') }}" class="btn btn-neutral btn-sm" wire:navigate>Вход</a>
    @endguest
</div>
