<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Users extends Component
{

    use WithPagination;

    /* public $name,$email,$status="Elegir",$password,$selected_id,$role,$search;
    public $openmodal=false; */
    
    public $selected_id=0,$name;
    public $search,$rolesSelected=[],$old_roles=[],$userpost,$openmodal=false;
   

    public function render()
    {
        /* if(strlen($this->search)>0)
        $data=User::where('name','LIKE','%'.$this->search.'%')
                    ->select('*')->orderBy('name','asc')->paginate(5);
        else
        $data=User::select('*')->orderBy('name','asc')->paginate(5);

        $roles=Role::orderBy('name','asc')->get(); */

        $roles=Role::select('name','id',DB::raw("0 as checked"))->orderBy('name','asc')->paginate(10);

        if($this->selected_id!=0)
        {
            foreach($roles as $role)
            {
                $user=User::find($this->selected_id);
                $tienerole=$user->hasRole($role->name);
                              
                if($tienerole)
                {
                    $role->checked=1;
                }
            }
        }
        
        
        $users=User::where('name','LIKE','%'.$this->search.'%')
                    ->orWhere('email','LIKE','%'.$this->search.'%')
                    ->paginate(8);
        return view('livewire.admin.users.users',compact('users','roles'));
    }



    public function Edit($id)
    {

    
        
        $this->openmodal=true;
        $user = User::find($id);
        $this->selected_id=$user->id;
        $this->name=$user->name;
       

        /* $roles=Role::select('name','id',DB::raw("0 as checked"))->orderBy('name','asc')->paginate(10);
            foreach($roles as $role)
            {
                $user=User::find($this->selected_id);
                $tienerole=$user->hasRole($role->name);
                              
                if($tienerole)
                {
                    $role->checked=1;
                }
            } */
        
    }

    public function syncRole($state,$roleName)
    {
        if($this->selected_id)
        {
            $user=User::find($this->selected_id);

            if($state)
            {
                $user->assignRole($roleName);
                $this->dispatchBrowserEvent('alert',     
                ['type' => 'success',  'message' => 'Rol asignado correctamente']);
            }
            else{
                $user->removeRole($roleName);
                $this->dispatchBrowserEvent('alert',     
                ['type' => 'success',  'message' => 'Rol revocado al usuario']);
            }
        }else
        {
            $this->dispatchBrowserEvent('alert',     
                ['type' => 'success',  'message' => 'Usuario no']);
        }


    }



   /*  public function update()
    {
       
        $this->user->roles()->sync($this->request->roles);
        $this->emit('render',$this->user);
    } */
    /* public function edit(User $user)
    {
        $this->selected_id=$user->id;
        $this->name=$user->name;
        $this->role=$this->profile;
        $this->email=$user->email;
        $this->password='';

        $this->openmodal=true;
    }

    public function store()
    {
        $rules=[
            'name'=>'required|min:3',
            'email'=>'required|unique:users|email',
            'status'=>'required|not_in:Elegir',
            'profile'=>'required|no_in:Elegir',
            'password'=>'required|min:3'
        ];

        $messages=[
            'name.required'=>'Ingrese el nombre',
            'name.min'=>'','El nombre de usuario debe tener al menos 3 caracteres',
            'email.required'=>'Ingrese un correo',
            'email.unique'=>'Correo no valido',
            'status.not_in'=>'Status no valido',
            'status.required'=>'Seleccione el status del usuario',
            'profile.required'=>'Seleccione un rol distinto a Elegir',
            'profile.not_in'=>'Rol no valido',
            'password.required'=>'Ingrese la contraseña',
            'password.not_in'=>'Contraseña no valida',
        ];
    }


    public function deleteShowModal($id)
    {
        $this->roleid=$id;
        $this->modalConfirmDeleteVisible=true;
    }

    public function resetChart()
    {
        $this->name="";
        $this->email="";
        $this->status="Elegir";
        $this->password="";
        $this->search="";
        $this->selected_id=0;

    } */
    public function cancelar()
    {
        $this->openmodal=false;
        $this->user="";
    }
    
}
