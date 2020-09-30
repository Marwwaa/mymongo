<?php

namespace App\Http\Controllers;

use App\Category;
use App\Posts;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Create new category
     *
     * @param Request  $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->all(),422);
        }

        Category::create([
            'name' => $request->get('name'),
        ]);


        return response()->json(['Category created successfully'],200);
    }

    /**
     * Edit specific category.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            '_id'  => 'required',
            'name' => 'required|min:3'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->all(),422);
        }

        Category::where('_id',$request->get('_id'))->update([
            'name' => $request->get('name'),
        ]);

        return response()->json(['Category updated Successfully'],200);
    }

    /**
     * Delete specific category
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(),[
            '_id' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->all(),422);
        }

        Category::where('_id',$request->get('_id'))->delete();

        return response()->json(['Category deleted successfully'],200);
    }

    /**
     * Get all categories with related posts
     *
     * @return JsonResponse
     */
    public function getAllCategories()
    {
        $categories = Category::with('post')->get();
//        $categories = Category::all();
//
//        foreach ($categories as $category){
//            return response()->json($category->post());
//        }

        return response()->json($categories);
    }
}
