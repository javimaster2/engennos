<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class EditRole extends Component
{
    public $role;
    public $openn=false;
    public $permissionsid=[];
    public $roleid;
    

    public function mount(Role $role)
    {
        $this->role=$role;
    }

    //reglas de validacion
    public $rules=[
        'name'=>'required',
        'permissionsid'=>'required',
    ];

    public function save()
    {
        $this->role->save();
    }

    public function render()
    {
        $permissions=Permission::all();
        
        return view('livewire.admin.edit-role',compact('permissions'));
    }

    public function update(Request $request,Role $role)
    {
        $request->validate([
            'name'=>'required',
            'permissions'=>'required',
        ]);

       
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.rolee',$role);
        
    }
}
