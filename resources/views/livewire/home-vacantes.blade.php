<div>
    <livewire:filtrar-vacantes>
    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl my-5 text-center"> Nuestras Vacantes Disponibles </h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                        <div class="md:flex md:justify-between md:items-center py-4">
                            <div class="md:flex-1">
                                <a 
                                class="text-3xl font-extrabold text-gray-600"
                                href="{{ route('vacantes.show',$vacante->id) }}">
                                    {{ $vacante->titulo }}
                                </a>
                                <p class="text-base text-gray-600 mb-1">{{ $vacante->empresa }}</p>
                                <p class="font-bold text-xs text-gray-600">
                                    Ultimo dia para postularse:
                                    <span class="font-normal">
                                        {{ $vacante->ultimo_dia->format('d/m/Y') }}
                                    </span>
                                </p>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a 
                                class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center"
                                href="{{ route('vacantes.show',$vacante->id) }}">
                                    Ver mas
                                </a>
                            </div>
                        </div>
                @empty
                    <p class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg"
                        No hay vacantes aun
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
