<form class="space-y-5 md:w-1/2" wire:submit.prevent='editarVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block w-full mt-1" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Titulo vacante" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select id="categoria" wire:model="categoria"
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring-1 focus:ring-opacity-50">
            <option value="">Selecciona una categoria --</option>
            @foreach ( $categorias as $categoria )
            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>

            @endforeach
        </select>
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="salario" :value="__('salario mensual')" />
        <select id="salario" wire:model="salario"
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring-1 focus:ring-opacity-50">
            <option value="">Selecciona un salario --</option>
            @foreach ($salarios as $salario )
            <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block w-full mt-1" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa" />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="dia" :value="__('Ultimo dia para postularse')" />
        <x-text-input id="dia" class="block w-full mt-1" type="date" wire:model="dia" :value="old('dia')"
            placeholder="Ultimo dia para postularse" />
        <x-input-error :messages="$errors->get('dia')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion Puesto')" />
        <textarea wire:model="descripcion" placeholder="descripcion general del puesto "
            class="w-full h-64 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring-1 focus:ring-opacity-50">

      </textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block w-full mt-1" type="file" wire:model="imagenNueva" accept="image/*" />
        <div class="my-5 w-80">>
            <x-input-label :value="__('Imagen Actual')" />
            <img src="{{ asset('storage/vacantes/'.$imagen) }}" alt="{{ 'imagen vacante'.$titulo }}" />
        </div>
        <div class="my-5 w-80">
            @if ($imagenNueva)
            Imagen Nueva:<img src="{{ $imagenNueva->temporaryUrl() }}">
            @endif
        </div>
        <x-input-error :messages="$errors->get('imagenNueva')" class="mt-2" />
    </div>
    <x-primary-button class="justify-center">
        Guardar cambios
    </x-primary-button>
</form>