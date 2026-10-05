<?php

namespace App\Http\Controllers;

use App\Http\Requests\AfiliadoRequest;
use App\Models\Afiliado;
use Illuminate\Http\Request;

class AfiliadoController extends Controller
{
    public function index(Request $request){
        $search = trim($request->input('search')); 

        $afiliados = Afiliado::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where('numero_documento', 'like', "%{$search}%")
                    ->orWhereRaw(
                        "CONCAT(nombre,'',apellido) LIKE ?",
                        ["%{$search}%"]
                    );
            })
            ->paginate(10)
            ->withQueryString(); 

        return view('afiliados.index', compact('afiliados', 'search'));
    }

    public function create(){
        return view('afiliados.create');
    }

    public function store(AfiliadoRequest $request){

        Afiliado::create($request->validated()); 

        return redirect()
            ->route('afiliados.index')
            ->with('sucess', 'Afiliado registrado exitosamente'); 
    }

    public function edit(Afiliado $afiliado){
        return view('afiliados.edit', compact('afiliado'));
    }

    public function update(Afiliado $afiliado, AfiliadoRequest $request){
        $afiliado->update($request->validated());
        
        return redirect()
            ->route('afiliados.index')
            ->with('sucess', 'Afiliado actualizado correctamente');
    }

    public function destroy(Afiliado $afiliado){
        $afiliado->delete();

        return redirect()
            ->route('afiliados.index')
            ->with('sucess', 'Afiliado eliminado correctamente');
    }
}
