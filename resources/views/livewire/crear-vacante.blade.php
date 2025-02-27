<form class="md:w-1/2 space-y-5" action="" novalidate wire:submit.prevent='crearVacante'>
        <!-- TÍTULO -->
        <div class="mt-4 uppercase">
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input 
                id="titulo" 
                class="block mt-1 w-full " 
                type="text"
                wire:model="titulo" 
                :value="old('titulo')" 
                placeholder="Titulo Vacante"
            />
            @error('titulo')
                <livewire:mostrar-alerta :message="$message">
            @enderror
        </div>
        <!-- Salario -->
        <div class="mt-4 uppercase ">
            <x-input-label for="salario" :value="__('Salario Mensual')" />
            <select 
                id="salario"
                wire:model="salario"
                class="border-gray-300
                        focus:border-indigo-500 focus:ring-indigo-500 
                        dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" 
                required
            >   
                <option value="">-- Seleccione --</option>
                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>
                @endforeach
            </select>
            @error('salario')
                <livewire:mostrar-alerta :message="$message">
            @enderror
        </div>
         <!-- Categoria -->
         <div class="mt-4 uppercase ">
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select 
                id="categoria"
                wire:model="categoria"
                class="border-gray-300
                        focus:border-indigo-500 focus:ring-indigo-500 
                        dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" 
                required
            >
                <option value="">-- Seleccione --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach
        </select>

        @error('categoria')
        <livewire:mostrar-alerta :message="$message">
        @enderror
        </div>

        <!-- Empresa -->
        <div class="mt-4 uppercase">
            <x-input-label for="empresa" :value="__('empresa')" />
            <x-text-input 
                id="empresa" 
                class="block mt-1 w-full " 
                type="text"
                wire:model="empresa" 
                :value="old('titulo')" 
                placeholder="Empresa: ej. Netflix, Uber, Shopify"
            />
            @error('empresa')
            <livewire:mostrar-alerta :message="$message">
            @enderror
        </div>

        <!-- Ultimo dia para postularse-->
        <div class="mt-4 uppercase">
            <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
            <x-text-input 
                id="ultimo_dia" 
                class="block mt-1 w-full " 
                type="date"
                wire:model="ultimo_dia" 
                :value="old('ultimo_dia')" 
            />
            @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message">
            @enderror
        </div>

        <!-- Descripcion de vacante-->
        <div class="mt-4 uppercase">
            <x-input-label for="descripcion" :value="__('Descripcion del puesto')" />
            <textarea
            wire:model="descripcion"
                placeholder="Descripcion general del puesto"
                class="block mt-1 w-full border-gray-300
                        focus:border-indigo-500 focus:ring-indigo-500 
                        dark:focus:ring-indigo-600 rounded-md shadow-sm  max-h-20" 
            ></textarea>
            @error('descripcion')
            <livewire:mostrar-alerta :message="$message">
            @enderror
        </div>

         <!-- Ingresar Imagen -->
        <div class="mt-4 uppercase ">
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input 
                id="imagen" 
                class="block mt-1 w-full " 
                type="file"
                wire:model="imagen" 
                accept="image/*"
             
            />
            <div class="my-5">
                @if ($imagen)
                        previsualiza la imagen: 
                        <img src="{{$imagen->temporaryUrl()}}">
                @endif
            </div>
            @error('imagen')
            <livewire:mostrar-alerta :message="$message">
            @enderror
        </div>

        <x-primary-button>
                Crear Vacante
        </x-primary-button>

</form>
