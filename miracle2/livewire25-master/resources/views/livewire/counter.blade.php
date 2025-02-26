<div>
    <h3>{{ $mensaje}} </h3>
    <form wire:submit="crear">
        <div>
            <input type="text" wire:model="nombre">
        </div>

        <div>
            <input type="text" wire:model="email">
        </div>

        <div>
            <input type="password" wire:model="password">
        </div>

        <button type="submit">Crear</button>
    </form>

    <ul>
        @foreach ($usuarios as $usuario)
            <li>{{ $usuario->name }}</li>
        @endforeach
    </ul>
</div>
