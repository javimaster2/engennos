<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    public $user;
    use WithPagination;
    public $search;
    public $openmodal;
    
    protected $listeners=['render'=>'render'];

    
    
    public function render()
    { 
        $roles=Role::all();
        $users=User::where('name','LIKE','%'.$this->search.'%')
                    ->orWhere('email','LIKE','%'.$this->search.'%')
                    ->paginate(8);
        return view('livewire.admin.users-index',compact('users','roles'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }

    public function edit($user)
    {
        $this->openmodal=true;
        $this->user=$user;
    }

    public function update()
    {
       
        $this->user->roles()->sync($this->request->roles);
        $this->emit('render',$this->user);
    }

}
