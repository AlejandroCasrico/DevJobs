<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

    @forelse ($vacantes as $vacante )

    <div class="items-center p-6 bg-white border-b border-gray-200 md:flex md:justify-between">
        <div class="space-y-5">
            <a href="{{ route('vacantes.show',$vacante->id) }}" class="text-xl font-bold">
                {{ $vacante->titulo }}
            </a>
            <p class="font-bold text-gray-600">{{ $vacante->empresa }}</p>
            <p class="text-sm font-bold text-gray-500">Ultimo dia: {{ $vacante->dia->format('d/m/Y') }}</p>
        </div>
        <div class="flex flex-col items-stretch gap-3 text-center md:flex-row md:mt-0">
            <a href="{{ route('candidatos.index',$vacante) }}"
                class="px-4 py-2 text-xs font-bold text-white rounded-lg bg-slate-800">
                Candidatos
                {{ $vacante->candidatos->count() }}
            </a>
            <a href="{{ route('vacantes.edit',$vacante->id) }}"
                class="px-4 py-2 text-xs font-bold text-white bg-blue-700 rounded-lg">
                Editar
            </a>
            <button wire:click="$dispatch('mostrarAlerta', {{$vacante->id}})"
                class="px-4 py-2 text-xs font-bold text-white bg-red-500 rounded-lg">
                Eliminar
            </button>
        </div>
    </div>
    @empty
    <p class="p-3 text-center text-gray-700 text0-sm">No hay vacantes que mostrar</p>
    @endforelse
    <div class="flex justify-center mt-10">
        {{ $vacantes->links() }}
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('mostrarAlerta', (vacanteId) => {
            Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "Una Vacante eliminada no se puede recuperar:(",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // ELiminar vacante
                    @this.call('eliminarVacante',vacanteId);
                    Swal.fire(
                        'Se eliminó la Vacante',
                        'Eliminado correctamente',
                        'success'
                    )
                }
            })

        });
    });
</script>

@endpush