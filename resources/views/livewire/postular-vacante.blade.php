<div class="flex-col items-center justify-center p-5 mt-10 bg-gray-100">
    <h3 class="my-4 text-2xl font-bold text-center">Postularme a la Vacante</h3>
    @if (session()->has('mensaje'))
    <div class="p-2 my-5 text-green-700 uppercase bg-green-100 border-green-600">
        {{ session('mensaje') }}
    </div>
    @else
    <form class="mt-5 w-96" wire:submit.prevent='postularme'>
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Curriculum')" />
            <x-text-input id="cv" class="block w-full mt-1" type="file" name="cv" accept=".pdf" wire:model="cv"
                class="block w-full mt-1" />
            @error('cv')
            <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>
        <x-primary-button>
            {{ __('Postularme') }}
        </x-primary-button>
    </form>
    @endif

</div>