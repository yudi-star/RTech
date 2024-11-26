<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Cookie;
use App\Models\Producto;

class CarritoGestion{

    // añadir producto al carrito

    static public function añadirProducto($producto_id){
        $items_carrito = self::obtenerTotalArticulosDeCookie();
        $item_existe = null;

        foreach($items_carrito as $key => $item){
            if($item['producto_id'] == $producto_id){
                $item_existe = $key;
                break;
            }
        }

        if ($item_existe !== null){
            $items_carrito[$item_existe]['cantidad']++;
            $items_carrito[$item_existe]['precio_total'] = $items_carrito[$item_existe]['cantidad'] * $items_carrito[$item_existe]['precio_unitario'];
        }else{
            $producto = Producto::where('id', $producto_id)->first(['id', 'nombre', 'precio', 'imagenes']);
            if($producto){
                $items_carrito[] = [
                    'producto_id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'imagenes' => $producto->imagenes[0],
                    'cantidad' => 1,
                    'precio_unitario' => $producto->precio,
                    'precio_total' => $producto->precio
                    
                ];
            }
        }

        self::agregarArticulosACookie($items_carrito);
        return count($items_carrito);
    }

    // añadir producto al carrito con cantidad

    static public function añadirProductoConCantidad($producto_id, $cantidad = 1){
        $items_carrito = self::obtenerTotalArticulosDeCookie();

        $item_existe = null;

        foreach($items_carrito as $key => $item){
            if($item['producto_id'] == $producto_id){
                $item_existe = $key;
                break;
            }
        }

        if ($item_existe !== null){
            $items_carrito[$item_existe]['cantidad'] = $cantidad;
            $items_carrito[$item_existe]['precio_total'] = $items_carrito[$item_existe]['cantidad'] * $items_carrito[$item_existe]['precio_unitario'];
        }else{
            $producto = Producto::where('id', $producto_id)->first(['id', 'nombre', 'precio', 'imagenes']);
            if($producto){
                $items_carrito[] = [
                    'producto_id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'imagenes' => $producto->imagenes[0],
                    'cantidad' => $cantidad,
                    'precio_unitario' => $producto->precio,
                    'precio_total' => $producto->precio
                ];
            }
        }
    }

    // eliminar producto del carrito

    static public function eliminarProducto($producto_id){
        $items_carrito = self::obtenerTotalArticulosDeCookie();
        
        foreach($items_carrito as $key => $item){
            if($item['producto_id'] == $producto_id){
                unset($items_carrito[$key]);
                break;
            }
        }

        self::agregarArticulosACookie($items_carrito);

        return $items_carrito;
    }

    // agregar artículos del carrito a la cookie

    static public function agregarArticulosACookie($items_carrito){
        Cookie::queue('items_carrito', json_encode($items_carrito), 60*24*30);
    }

    // vaciar articulos del carrito de la cookie

    static public function vaciarArticulosDeCookie(){
        Cookie::queue(Cookie::forget('items_carrito'));
    }

    // obtener el total de articulos del carrito de la cookie

    static public function obtenerTotalArticulosDeCookie(){
        $items_carrito = json_decode(Cookie::get('items_carrito'), true);
        if (!$items_carrito){
            $items_carrito = [];
        }
        return $items_carrito;
    }

    // aumentar la cantidad de un producto en el carrito

    static public function aumentarCantidadProducto($producto_id){
        $items_carrito = self::obtenerTotalArticulosDeCookie();

        foreach($items_carrito as $key => $item){
            if($item['producto_id'] == $producto_id){
                $items_carrito[$key]['cantidad']++;
                $items_carrito[$key]['precio_total'] = $items_carrito[$key]['cantidad'] * $items_carrito[$key]['precio_unitario'];
            }
        }

        self::agregarArticulosACookie($items_carrito);
        return $items_carrito;
    }

    // disminuir la cantidad de un producto en el carrito

    static public function disminuirCantidadProducto($producto_id){
        $items_carrito = self::obtenerTotalArticulosDeCookie();

        foreach($items_carrito as $key => $item){
            if($item['producto_id'] == $producto_id){
                if($item['cantidad'] > 1){
                    $items_carrito[$key]['cantidad']--;
                    $items_carrito[$key]['precio_total'] = $items_carrito[$key]['cantidad'] * $items_carrito[$key]['precio_unitario'];
                }
            }
        }

        self::agregarArticulosACookie($items_carrito);
        return $items_carrito;
    }

    // obtener el precio total del carrito

    static public function obtenerPrecioTotalCarrito($items){
        return array_sum(array_column($items, 'precio_total'));
    }
}
