<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\genero_literario;

class GenlitApiController extends Controller
{
    
    public function __construct(genero_literario $genlit, Request $request) // funcao construct para linkar nossas models
    {   
        $this->genlit = $genlit;
        $this->request = $request;
    }
    public function index() // função para nos retornar o json com nossos dados
    {
        $data = $this->genlit->all();
        return response()->json($data);
    }

     public function store(Request $request, genero_literario $genlit) // função para inserir os dados
    {
        $this->validate($request, $genlit->rules());

        $dataform = $request->all();

        $data = $this ->genlit->create($dataform);
        
        return response()->json($data, 201);
    }

    public function show($id) //função para filtrar/consultar dados
    {
        if(!$data = $this->genlit->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        } else {
            return response()->json($data);
        }
    }

    public function update(Request $request, $id)// função update para atualizarmos nosso dados
    {
        if(!$data = $this->genlit->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }
        $this->validate($request, $this->genlit->rules());
        $dataForm = $request->all();
        $data->update($dataForm);
        
        return response()->json($data);
    }

  
    public function destroy($id) //função para deletar registros
    {
        $data=$this->genlit->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }else{
            $data->delete();
            return response()->json(['sucess'=>'Registro '.$id.' deletado']);
        }
    }
}

