<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class Roles extends Component
{

    use WithPagination;
    public $rolename, $search,$selected_id,$openmodal=false,$modalFormVisible=false,$openmodaldelete=false,$roleid,$modalConfirmDeleteVisible=false;
    
    
    public function render()
    {

        if(strlen($this->search)>0)
        $roles=Role::where('name','like','%'.$this->search.'%')->paginate(5);
        else
        $roles=Role::orderBy('name','asc')->paginate(5);

 
        return view('livewire.admin.roles.roles',compact('roles'));
    }

    

    public function createRole()
    {
        $rules=[
            'rolename'=>'required|min:2|unique:roles,name'
        ];

        $messages=[
            'rolename.required'=>'El nombre rol es requerido',
            'rolename.unique'=>'El rol ya existe',
            'rolename.min'=>'El rol debe tener al menos 2 caracteres'
        ];

        $this->validate($rules,$messages);

        Role::create([
            'name'=>$this->rolename
        ]);

        $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Rol creado con exito']);
        $this->resetchart();
    }

    public function Edit(Role $role)
    {
        //$role=Role::findById($id);
        $this->selected_id=$role->id;
        $this->rolename=$role->name;
        
        $this->openmodal=true;
    }

    public function updateRole()
    {
        $rules=[
            'rolename'=>'required|min:2|unique:roles,name, {$this->selected-id}'
        ];

        $messages=[
            'rolename.required'=>'El nombre rol es requerido',
            'rolename.unique'=>'El rol ya existe',
            'rolename.min'=>'El rol debe tener al menos 2 caracteres'
        ];

        $this->validate($rules,$messages);
        $role=Role::find($this->selected_id);
        $role->name=$this->rolename;
        $role->save();
        $this->emit('role-update','Se registro el rol con exito');
        $this->resetchart();
        
    }

    public function deleteShowModal($id)
    {
        $this->roleid=$id;
        $this->modalConfirmDeleteVisible=true;
    }

    public  function destroy()
    {
        $permissioncount=Role::findById($this->roleid)->permissions->count();
        if($permissioncount>0)
        {
            $this->emit('role-error','NO se puede eliminar el rol porque tiene permisos asignados');
            return;
        }
        Role::find($this->roleid)->delete();
        
        $this->modalConfirmDeleteVisible=false;
    }

    public function AsignarRoles($roleslist)
    {
        if($this->userSselected>0)
        {
            $user=User::find($this->userSelected);
            if($user)
            {
                $user->syncRoles($roleslist);
                $this->emit('msg-ok','Roles asignados correctamente');
                $this->resetInput();
            }
        }
    }

    public function resetchart()
    {
        $this->rolename="";
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
