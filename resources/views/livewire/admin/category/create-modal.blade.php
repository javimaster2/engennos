
<x-jet-dialog-modal wire:model="open">
   <x-slot name="title">
       Crear Categoria
   </x-slot>

   <x-slot name="content">
       <div class="mb-4">
           <x-jet-label for="name" value="Nombre" />
           <x-jet-input type="text"  class="w-full" wire:model.defer="name" id="name"/>

           @error('name')
               <span class="text-danger text-sm">{{$message}}</span>
           @enderror
       </div>    
    
   </x-slot>

   <x-slot name="footer">

       <x-jet-secondary-button wire:click="$set('open',false)">
           Cancelar
       </x-jet-secondary-button >
       <x-jet-danger-button wire:click.prevent="save()">
           Crear Categoria
       </x-jet-danger-button>
 </x-jet-dialog-modal>