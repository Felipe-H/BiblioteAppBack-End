<?php

namespace App\Http\Controllers\Api;
//Indicamos o local onde está presente nosso model em que iremos utilizar.
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Autores;
//extendemos nosso controller da pasta Controllers
class ClienteApiController extends Controller 
{
    
    public function __construct(Autores $autores, Request $request) // funcao construct para linkar nossas models
    {   
        $this->autores = $autores;
        $this->request = $request;
    }
    public function index() // função para nos retornar o json com nossos dados
    {
        $data = $this->autores->all();
        return response()->json($data);
    }

     public function store(Request $request, Autores $autores) // função para o metodo post
    {
        $this->validate($request, $autores->rules());

        $dataform = $request->all();

        $data = $this ->autores->create($dataform);
        
        return response()->json($data, 201);
    }

    public function show($id) //função para filtrar/consultar dados
    {
        if(!$data = $this->autores->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        } else {
            return response()->json($data);
        }
    }

    public function update(Request $request, $id) //função para dar o update
    {
        if(!$data = $this->autores->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }
        $this->validate($request, $this->autores->rules());
        $dataForm = $request->all();
        $data->update($dataForm);
 
        return response()->json($data);
 
        
        return response()->json($data);
    }

  
    public function destroy($id) //função para deletar registros
    {
        $data=$this->autores->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }else{
            $data->delete();
            return response()->json(['sucess'=>'Registro '.$id.' deletado']);
        }
    }
}

