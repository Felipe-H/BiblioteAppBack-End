<?php

namespace App\Http\Controllers\Api;
//Puxamos o model que precisamos da pasta Model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Editora;
//Extendemos nosso Controler da pasta Controller
class EditorasApiController extends Controller
{
    
    public function __construct(Editora $editora, Request $request) // funcao construct para linkar nossas models
    {   
        $this->editora = $editora;
        $this->request = $request;
    }
    public function index() // função para nos retornar o json com nossos dados
    {
        $data = $this->editora->all();
        return response()->json($data);
    }

     public function store(Request $request, Editora $editora) // função para o metodo post
    {
        $this->validate($request, $editora->rules());

        $dataform = $request->all();

        $data = $this ->editora->create($dataform);
        
        return response()->json($data, 201);
    }

    public function show($id) //função para exibir os dados
    {
        if(!$data = $this->editora->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        } else {
            return response()->json($data);
        }
    }

    public function update(Request $request, $id) //função para atualizar os dados
    {
        if(!$data = $this->editora->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }
        $this->validate($request, $this->editora->rules());
        $dataForm = $request->all();
        $data->update($dataForm);
       
        return response()->json($data);
    }

  
    public function destroy($id) //função para deletar registros
    {
        $data=$this->editora->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }else{
            $data->delete();
            return response()->json(['sucess'=>'Registro '.$id.' deletado']);
        }
    }
}

