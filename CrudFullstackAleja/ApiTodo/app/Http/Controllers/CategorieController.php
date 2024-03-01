<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{

    public function index()
    {
        $categorie = Categorie::orderBy('id', 'asc')->get();
        return response()->json([
            'status' => true,
            'data' => $categorie
        ], 200);
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100'
        ];

        $validator = Validator::make($request->input(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $categorie = new Categorie($request->input());
        $categorie->save();
        return  response()->json([
            'status' => true,
            'message' => 'Categorie created successfully'
        ], 200);
    }


    public function show(Categorie $categorie)
    {

        if (!$categorie) {
            return response()->json([
                'status' => false,
                'message' => 'Categorie not found'
            ], 400);
        }
        return response()->json([
            'status' => true,
            'data' => $categorie
        ], 200);
    }

    public function update(Request $request, Categorie $categorie)
    {
        $rules=[
            'name'=>'required|string|min:1|max:100'
        ];
        $validator=Validator::make($request->input(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $categorie->update($request->input());

        return response()->json([
            'status'=>true,
            'message'=>'Categorie updated successfully'
        ],400);

    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Categorie deleted successfully'
        ],200);
    }
}
