<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-col justify-center place-items-center">
  

    @if (session()->has('mensaje'))
        <div class="font-bold text-sm text-white text-center my-3 py-3 space-y-1 w-full bg-green-600">
            {{ session('mensaje') }}
        </div>
    @else  
        <h3 class=" text-center text-2xl font-bold my-4">
             Postularme a esta vacante
        </h3>
        <form wire:submit.prevent='postularme' action="">
            <div class="mb-4">
                <x-input-label class="uppercase" for="cv" :value="__('Curriculum u Hoja de Vida (PDF)')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
            </div>
            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror
            <x-primary-button class="w-full justify-center">
                    {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif


</div>
