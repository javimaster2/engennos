 {{--modal--}}
 <x-jet-dialog-modal wire:model="openmodal">
    <x-slot name="title">
        Agregar oferta
    </x-slot>

    <x-slot name="content">
        <div class="flex">

           
            <div class="mb-3 xl:w-96">
                <select wire:model="ofert" class="form-select appearance-none
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding bg-no-repeat
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                    <option selected value="Elegir">=Seleccione la oferta=</option>
                    @foreach ($ofertas as $oferta)
                    <option  value="{{ $oferta->id }}">{{ $oferta->name }}</option>
                    @endforeach
                    
                </select>
            </div>
            <button wire:click.prevent="ActualizarOferta()" class="btn btn-primary mr-5 ml-5">Ofertar Curso</button>
            <button wire:click="borrarOferta()" class="btn btn-primary ">Revocar oferta</button>
        </div>
    
    </x-slot>

    <x-slot name="footer">

        <x-jet-secondary-button wire:click="cancelar"  wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>
       
          {{--   <x-jet-button class="ml-2 bg-green-500" wire:click="update()" wire:loading.attr="disabled">
                Actualizar
            </x-jet-button> --}}
        
        
    </x-slot>
  </x-jet-dialog-modal>