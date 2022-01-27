<?php

namespace App\Http\Livewire\Admin\Prices;

use App\Models\Price;
use Livewire\Component;

class PriceComponent extends Component
{
    public $openmodal=false; 
    public $name,$id_price,$value;
    public $accion="store";

    protected $listeners=['render','delete'];

    protected $rules=[
        'name'=>'required|unique:prices',
        'value'=>'required|numeric'
    ];

    public function render()
    {
        $prices=Price::all();
        return view('livewire.admin.prices.price-component',compact('prices'))/* ->extends('layouts.theme.app')->section('content') */;
    }

    public function limpiarcampos()
    {
        $this->reset(['openmodal','name','accion',"value"]);
        $this->openmodal=false;
    }

    public function closemodal()
    {
        $this->reset(['openmodal','name','accion',"value"]);

    }

    public function editar($id)
    {
        $price=Price::findOrFail($id);
        $this->id_price=$price->id;
        $this->name=$price->name;
        $this->value=$price->value;
        $this->openmodal=true;
        $this->accion="update";
    }

    public function guardar()
    {
        $this->validate();
        Price::updateOrCreate(['id'=>$this->id_price],
            [
                'name'=>$this->name,
                'value'=>$this->value
            ]);
            $this->limpiarcampos();
    }

    public function delete(Price $price)
    {
        
        //Category::find($id)->delete();
        $price->delete();
    }
}
