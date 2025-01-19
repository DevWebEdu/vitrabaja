<div class="p-5">
    <div class="mb-5 ">
        <h3 class="font-bold text-3xl text-gray-800 my-3"  >
            {{ $vacante->titulo }}
        </h3>
        <div class="md:grid md:grid-cols-2 ">
            <p class="font-bold text-sm uppercase text-gray-800 my-3 ">
                Empresa :
                <span class="normal-case font-normal"> {{ $vacante->empresa }} </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Ultimo dia para postularse :
                <span class="normal-case font-normal"> {{ $vacante->ultimo_dia->toFormattedDateString()  }} </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Categoria :
                <span class="normal-case font-normal"> {{ $vacante->categoria->categoria }} </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Salario :
                <span class="normal-case font-normal"> {{ $vacante->salario->salario  }} </span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-5">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/'. $vacante->imagen) }}" alt=" {{ 'Imagen Vacante' }} . $vacante->titulo ">
        </div>
        <div class="md:col-span-2">
            <h2 class="text-2xl font-bold mb-5">
                Descripcion del puesto
            </h2>
            <p> {{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
    <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
        <p>
            ¿Deseas aplicar a esta vacante? <a href=" {{ route('register') }}" class="font-bold text-indigo-600 "> Obten una cuenta y aplica a esta y otras vacantes</a>
        </p>
    </div>
    @endguest

    @if (Auth::id())
     {{-- Habilitando por Policis que solo lo visualicen los usuarios con rol = 2 o sea dev --}}
         @cannot('create', App\Model\Vacante::class)
             <livewire:postular-vacante :vacante="$vacante">
        @endcannot
   
    @endif

</div>
