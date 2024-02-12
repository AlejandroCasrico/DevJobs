<div>
    <livewire:filtrar-vacantes>
        <div class="py-12">
            <div class="mx-auto max-w-7xl">
                <h1 class="mb-12 text-4xl font-extrabold text-gray-800">Nuestras Vacantes disponibles</h1>
                <hr>
                <div class="p-6 bg-white divide-y divide-gray-200 rounded-lg shadow-sm">
                    @forelse ($vacantes as $vacante)
                    <div class="py-5 md:flex md:justify-between md:items-center">
                        <div class="md:flex-1">
                            <a class="text-2xl font-extrabold text-gray-700"
                                href="{{ route('vacantes.show', $vacante->id) }}">{{ $vacante->titulo }}
                            </a>
                            <p>{{ $vacante->empresa }}</p>
                            <p>{{ $vacante->categoria->categoria }}</p>
                            <p>{{ $vacante->salario->salario }}</p>
                            <p class="text-xs text-gray-350">Ultimo dia para postularse {{
                                $vacante->dia->format('d/m/Y') }}
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('vacantes.show', $vacante->id) }}"
                                class="p-3 text-sm font-bold text-black uppercase rounded-lg bg-cyan-400">
                                Ver vacante
                            </a>

                        </div>
                    </div>
                    @empty
                    <p class="p-3 text-sm text-center text-gray-600">no hay vacantes aun</p>
                    @endforelse
                </div>
            </div>
        </div>
</div>