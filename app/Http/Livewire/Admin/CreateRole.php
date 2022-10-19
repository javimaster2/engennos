<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class CreateRole extends Component
{
    public $open=false;
    public $name,$permissionsid=[];

    public function render()
    {
        $permissions=Permission::all();

        return view('livewire.admin.create-role',compact('permissions'));
    }

    //reglas de validacion
    public $rules=[
        'name'=>'required',
        'permissionsid'=>'required',
    ];


    public function save()
    {
        $this->validate();

        $role=Role::create([
            'name'=>$this->name
        ]);

        $role->permissions()->attach($this->permissionsid);

        $this->reset(['open','name','permissionsid']);

        $this->emit('render');
        $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Rol creado con exito']);
        
    }

    public function store(Request $request)
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
        $this->dispatchBrowserEvent('alert', 
        ['type' => 'success',  'message' => 'Rol creado con exito']);

    }

   
}
