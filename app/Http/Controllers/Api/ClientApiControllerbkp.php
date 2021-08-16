<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Autores;

class ClienteApiController extends Controller
{
    
    public function __construct(Autores $autores, Request $request)
    {   
        $this->autores = $autores;
        $this->request = $request;
    }
    public function index()
    {
        $data = $this->autores->all();
        return response()->json($data);
     }

     public function store(Request $request, Autores $autores)
    {
        $this->validate($request, $this->$autores->rules());

        $dataform = $request->all();

        $data = $this ->autores->create($dataform);
        
        return response()->json($data, 201);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}

