<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Productos - RebornTech')]
class PaginaProductos extends Component
{
    use WithPagination;

    #[Url]
    public $selected_categorias =[];
    #[Url]
    public $selected_marcas =[];

    #[Url]
    public $destacado;
    
    #[Url]
    public $en_venta;
    //vincula una propiedad del componente con la URL del navegador.
    #[Url]
    public $rango_precio=10000;
    public function render()
    {
        $productoconsulta = Producto::query()->where('es_activo',1);

        if(!empty($this->selected_categorias)){
            $productoconsulta->whereIn('categoria_id',$this->selected_categorias);
        }
       //verefica si la propiedad select_marca no este vacia, ya que deberia contener los IDs de la marca seleccionada
        if(!empty($this->selected_marcas)){
            $productoconsulta->whereIn('marca_id',$this->selected_marcas);//Filtra los productos cuyo marca_id coincida con uno de los IDs presentes en el arreglo selected_marcas.
        }

        // vereficica si la propiedad destacado es verdadero

        if($this->destacado){
            $productoconsulta->where('es_destacado',1);
        }

        if($this->en_venta){
            $productoconsulta->where('en_venta',1);
        }

        if($this->rango_precio){
            $productoconsulta->whereBetween('precio',[0, $this->rango_precio]);
        }



        return view('livewire.pagina-productos',[
            'productos'=>$productoconsulta->paginate(6),
            'marcas'=> Marca::where('activo',1)->get(['id','nombre','slug']),
            'categorias'=> Categoria::where('activo',1)->get(['id','nombre','slug']),
        ]);
    }
}
