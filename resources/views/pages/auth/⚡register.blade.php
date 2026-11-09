<?php

use Livewire\Component;

new class extends Component {};
?>

<div>
    <form>
        <label>Имя</label>
        <input type="text" class="input input-neutral">

        <label>Email</label>
        <input type="email" class="input input-neutral">

        <label>Пароль</label>
        <input type="password" class="input input-neutral">

        <label>Подтверждение пароля</label>
        <input type="password" class="input input-neutral">

        <button type="submit" class="btn btn-neutral">Регистрация</button>
    </form>
</div>
