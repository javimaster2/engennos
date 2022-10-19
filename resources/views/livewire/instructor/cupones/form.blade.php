 {{--modal--}}



 <x-jet-dialog-modal wire:model="openmodal">
    <x-slot name="title">
        Crear Categoria
    </x-slot>

    <x-slot name="content">
        {{-- <x-jet-input type="hidden" wire:model.defer="{{ $course->id }}" />  --}}
        <div class="mb-4">
            <div class="">
                <x-jet-label for="codigo" value="Nombre" />
                <x-jet-input type="text"  class="w-10/12" wire:model.defer="codigo" id="codigo"  
                autofocus placeholder="Ingrese el nombre de este precio"/>
                <button class="btn btn-danger"  wire:click="generador()">Generar</button>
            </div>
           

            @error('codigo')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror

            <label for="estado" class="block text-left" >
                <x-jet-label for="estado" value="Estado" />
                <select name="estado" wire:model="estado" id="estado" class="form-select block w-full mt-1">
                    <option hidden selected>Seleccionar estado</option>
                  <option value="activo">Activo</option>
                  <option>Desactivado</option>
                </select>
              </label>
              

            @error('estado')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror

            
            <label for="tipo" class="block text-left" >
                <x-jet-label for="tipo" value="Porcentaje" />
                <select name="tipo" wire:model="tipo" id="tipo" class="form-select block w-full mt-1">
                    <option hidden selected>Seleccionar porcentaje</option>
                  <option value="porcentaje">Porcentaje</option>
                </select>
              </label>
              

            @error('tipo')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
            
            
            <div class="form-group">
                <x-jet-label for="cantidad" value="Cantidad" />
                <x-jet-input type="number"  class="w-full" wire:model.defer="cantidad" id="value" placeholder="Ingrese una cantidad entre 1-5 cupones"/>
            </div>
            @error('cantidad')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
            {{-- <div class="form-group">
                <x-jet-label for="value" value="Valor" />
                <x-jet-input type="number"  class="w-full" wire:model.defer="value" id="value" placeholder="Ingrese el porcentaje de descuento"/>
            </div> --}}
            <p>{{$value}}</p>
             <label for="value" class="block text-left" >
                <x-jet-label for="value" value="Porcentaje" />
                <select name="tipo" wire:model="value" id="value" class="form-select block w-full mt-1">
                    <option hidden selected>Seleccionar el porcentaje descuento</option>
                  <option value="10">10 % Descuento</option>
                  <option value="20">20 % Descuento</option>
                </select>
              </label>
            @error('value')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror

            <div class="form-group">
                <x-jet-label for="fechaven" value="Fecha de vencimiento" />
                <x-jet-input type="date" min="0" name="fechaven" wire:model.defer="fechaven" placeholder="Fecha vencimiento" id="fechaven"  required />
            </div>
            @error('fechaven')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>    
     
    </x-slot>

    <x-slot name="footer">

        <x-jet-secondary-button wire:click.prevent="closemodal()">
            Cancelar
        </x-jet-secondary-button >
        
        @if ($accion=="store")
            <x-jet-danger-button wire:click.prevent="guardar()">
                Crear
            </x-jet-danger-button>
        @else
            <x-jet-danger-button wire:click.prevent="update()">
                Actualizar
            </x-jet-danger-button>
        @endif
        
        

    </x-slot>
  </x-jet-dialog-modal>

 {{--  <script>
      $("#generar").click(function(){
          var numero=Math.floor(Math.random()*900000000)+100000000;
          $("#codigo").val(numero);
      })
  </script>
 --}}
    