<?php
namespace App\Livewire;
use App\Models\Categoria;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Categorias - RebornTech')]
class PaginaCategorias extends Component
{
    public function render()
    {
        $categorias = Categoria::where('activo', 1)->get();
        return view('livewire.pagina-categorias',[
            'categorias'=>$categorias,
        ]);
    }
}
