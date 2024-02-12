<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Candidatos vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-10 text-2xl font-bold text-center">
                        Candidatos Vacante {{ $vacante->titulo }}
                    </h1>
                    <div class="p-5 md:flex md:justify-center">
                        <ul class="w-full divide-y divide-gray-200">
                            @forelse ($vacante->candidatos as $candidato)
                            <li class="flex items-center p-3">
                                <div class="flex-1">
                                    <p class="text-xl font-medium text-gray-800">{{ $candidato->user->name }}</p>
                                    <p class="text-sm font-medium text-gray-600">{{ $candidato->user->email }}</p>
                                    <p class="text-sm font-medium text-gray-600">Dia que se postulo: {{
                                        $candidato->created_at->diffForHumans() }}</p>
                                </div>
                                <div> CV:
                                    <a class="inline-flex shadow-sm px-2.5 items-center border-gray-100 border text-sm leading-5 text-gray-700 bg-white
                                    hover:bg-gray-500" href="{{ asset('/storage/cv/'.$candidato->cv) }}" target="blank"
                                        rel="noreferrer noopener">Ver CV</a>
                                </div>
                            </li>
                            @empty
                            <p class="p-3 text-sm text-center tex-gray-400">No hay candidatos aun</p>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>