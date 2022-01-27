<?php

namespace App\Http\Livewire\Admin\Asignar;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Asignar extends Component
{
    use WithPagination;
    public $modalConfirmrevocarVisible=false,$permisoid,$permisosSelected=[],$old_permissions=[],$role='Elegir';

    public function render()
    {   
        $permisos=Permission::select('name','id',DB::raw("0 as checked"))->orderBy('name','asc')->paginate(10);
        
        if($this->role!='Elegir')
        {
            $list=Permission::join('role_has_permissions as rp','rp.permission_id','permissions.id')
                                ->where('role_id',$this->role)->pluck('permissions.id')->toArray();
            $this->old_permissions=$list;
        }
        
        if($this->role!='Elegir')
        {
            foreach($permisos as $permiso)
            {
                $role=Role::find($this->role);
                $tienepermiso=$role->hasPermissionTo($permiso->name);
                              
                if($tienepermiso)
                {
                    $permiso->checked=1;
                }
            }
        }
        
        
        $roles=Role::orderBy('name','asc')->get();
        return view('livewire.admin.asignar.asignar',compact('permisos','roles'));
    }


    public function removeAll()
    {
        if($this->role=='Elegir')
        {
            $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Selecciona un rol valido']);
        return;
        }

        $role=Role::find($this->role);
        $role->syncPermissions([0]);
        $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Se revocaron todos los permisos al rol']);
        $this->modalConfirmrevocarVisible=false;
    }

    public function syncAll()
    {
        if($this->role=='Elegir')
        {
            $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Selecciona un rol valido']);
        return;
        }

        $role=Role::find($this->role);
        $permiso=Permission::pluck('id')->toArray();
        $role->syncPermissions($permiso);
        $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Se sincronizaron todos los permisos al rol $role->name']);
    }

    public function syncPermiso($state,$permissionName)
    {
        if($this->role!='Elegir')
        {
            $roleName=Role::find($this->role);

            if($state)
            {
                $roleName->givePermissionTo($permissionName);
                $this->dispatchBrowserEvent('alert',     
                ['type' => 'success',  'message' => 'Permiso asignado correctamente']);
            }
            else{
                $roleName->revokePermissionTo($permissionName);
                $this->dispatchBrowserEvent('alert',     
                ['type' => 'success',  'message' => 'Permiso revocado al rol']);
            }
        }else
        {
            $this->dispatchBrowserEvent('alert',     
                ['type' => 'success',  'message' => 'Elige un rol valido']);
        }


    }

    public function revocarmodal()
    {
        $this->modalConfirmrevocarVisible=true;
    }   
}
