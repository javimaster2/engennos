<?php

namespace App\Http\Livewire\Admin\Permisos;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permiso extends Component
{


    use WithPagination;
    public $permissionname, $search,$selected_id,$openmodal=false,$modalFormVisible=false,$openmodaldelete=false,$permisoid,$modalConfirmDeleteVisible=false;

    public function render()
    {
        if(strlen($this->search)>0)
        $permisos=Permission::where('name','like','%'.$this->search.'%')->paginate(5);
        else
        $permisos=Permission::orderBy('name','asc')->paginate(10);

        return view('livewire.admin.permisos.permiso',compact('permisos'));
    }

    public function createPermission()
    {
        $rules=[
            'permissionname'=>'required|min:2|unique:permissions,name'
        ];

        $messages=[
            'permissionname.required'=>'El nombre del permiso es requerido',
            'permissionname.unique'=>'El permiso ya existe',
            'permissionname.min'=>'El permiso debe tener al menos 5 caracteres'
        ];

        $this->validate($rules,$messages);

        Permission::create([
            'name'=>$this->permissionname
        ]);

        $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Permiso creado con exito']);
        $this->resetchart();
    }

    public function Edit(Permission $permiso)
    {
        //$role=Role::findById($id);
        $this->selected_id=$permiso->id;
        $this->permissionname=$permiso->name;
        
        $this->openmodal=true;
    }

    public function updateRole()
    {
        $rules=[
            'permissionname'=>'required|min:2|unique:permissions,name, {$this->selected-id}'
        ];

        $messages=[
            'permissionname.required'=>'El nombre del permiso es requerido',
            'permissionname.unique'=>'El permiso ya existe',
            'permissionname.min'=>'El permiso debe tener al menos 2 caracteres'
        ];

        $this->validate($rules,$messages);
        $permiso=Permission::find($this->selected_id);
        $permiso->name=$this->permissionname;
        $permiso->save();
        $this->resetchart();
        
    }

    public function deleteShowModal($id)
    {
        $this->permisoid=$id;
        $this->modalConfirmDeleteVisible=true;
    }

    public  function destroy()
    {
        $rolescount=Permission::findById($this->permisoid)->getRoleNames()->count();
        if($rolescount>0)
        {
            $this->emit('role-error','NO se puede eliminar el rol porque tiene permisos asignados');
            return;
        }
        Permission::find($this->permisoid)->delete();
        
        $this->modalConfirmDeleteVisible=false;
    }

    

    public function resetchart()
    {
        $this->permissionname="";
        $this->selected_id=0;
        $this->search="";
        $this->openmodal=false;
        $this->resetValidation();
    }

    public function cancelar()
    {$this->openmodal=false;    
        $this->resetchart();
        
    }
}
