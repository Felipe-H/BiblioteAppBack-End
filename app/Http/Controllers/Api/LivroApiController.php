<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Livros;

class LivroApiController extends Controller
{
    
    public function __construct(Livros $livros, Request $request) // funcao construct para linkar nossas models
    {   
        $this->livros = $livros;
        $this->request = $request;
    }
    public function index() // função para nos retornar o json com nossos dados
    {
        $data = $this->livros->all();
        return response()->json($data);
    }

     public function store(Request $request, Livros $livros) // função para o metodo post
    {
        $this->validate($request, $livros->rules());

        $dataform = $request->all();

        $data = $this ->livros->create($dataform);
        
        return response()->json($data, 201);
    }

    public function show($id) //função para filtrar/consultar dados
    {
        if(!$data = $this->livros->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        } else {
            return response()->json($data);
        }
    }

    public function update(Request $request, $id)
    {
        if(!$data = $this->livros->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }
        $this->validate($request, $this->livros->rules());
        $dataForm = $request->all();
        $data->update($dataForm);
 
    
        return response()->json($data);
    }

  
    public function destroy($id) //função para deletar registros
    {
        $data=$this->livros->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }else{
            $data->delete();
            return response()->json(['sucess'=>'Registro '.$id.' deletado']);
        }
    }
}