<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class RoleComponent extends Component
{

    use WithPagination;
    public $sort='id';
    public $direction='desc';
    protected $listeners=['render'=>'render'];

    public $openmodal=false;
    public $accion="store";
    public $modalFormVisible=false;
    public $modalConfirmDeleteVisible=false;

    public $name,$roleid,$permissionsid=[],$id_permission=[],$permissionsedit=[],$rolee;

    
    
    public function render()
    {
        $permissions=Permission::all();

        $roles=Role::orderBy($this->sort )->paginate();
        return view('livewire.admin.role-component',compact('roles','permissions'));
    }

    public function openmodal()
    {
        $this->modalFormVisible=true;
    }

    public function storre(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'permissions'=>'required'
        ]);

        $role=Role::create([
            'name'=>$request->name
        ]);

        $role->permissions()->attach($request->permissions);

        $this->emit('render');
        return redirect()->route('admin.role.index');
        $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Rol creado con exito']);

    }

     //reglas de validacion
     public $rules=[
        'name'=>'required',
        'permissionsid'=>'required',
    ];


    public function store()
    {
        $this->validate();

        $role=Role::updateOrCreate([
            'name'=>$this->name
        ]);

        $role->permissions()->sync($this->permissionsid);

        $this->reset(['openmodal','name','permissionsid']);

        $this->emit('render');
        $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Rol creado con exito']);
        
    }

   
    public function edit($id)
    {
        
        $this->openmodal=true;
        $role = Role::findOrFail($id);
        $this->name=$role->name;
        $this->roleid=$role->id;
        $this->permissionsedit=$this->id_permission = $role->permissions->pluck('id');
        
        $this->accion="update";
        
    }

    public function update()
    {
        
        $role=Role::findOrFail($this->roleid);
        $role->update([
            'name'=>$this->name
        ]);
       
       //$role->permissions()->sync($this->permissionsedit);
        
        
        $role->permissions()->sync($this->permissionsedit);

        //$this->reset(['openmodal','name','permissionsid','permissionsedit','accion']);
        $this->emit('render');
        $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Entro a update']);

       
    }

    public function deleteShowModal($id)
    {
        $this->roleid=$id;
        $this->modalConfirmDeleteVisible=true;
    }

    public function destroy()
    {
        $permisionCount=Role::find($this->roleid)->permissions->count();
        if($permisionCount>0)
        {
            $this->emit('success','No se puede eliminar el role porque tiene permisos');
        }else{
            Role::destroy($this->roleid);
            $this->modalConfirmDeleteVisible=false;
        }

        
    }
}
