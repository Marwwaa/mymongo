<?php

namespace App\Http\Controllers;

use App\Posts;
//use App\User;
use App\Category;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * Creates new post & add it to specific category.
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:3',
            'body' => 'required|min:3',
            'categoryId' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->all(),422);
        }

        Posts::create([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'userId' => auth()->user()->_id,
            'categoryId' => $request->get('categoryId')
        ]);


        return response()->json(['Post created successfully'],200);
    }


    /**
     * Edit specific post.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            '_id' => 'required',
            'title' => 'required|min:3',
            'body' => 'required|min:3',
            'categoryId' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->all(),422);
        }

        Posts::where('_id',$request->get('_id'))->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'CategoryId' => $request->get('categoryId')
        ]);

        return response()->json(['Post updated Successfully'],200);
    }

    /**
     * Delete specific post
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

        Category::where('postId',$request->get('id'))->delete();

        Posts::where('_id',$request->get('_id'))->delete();

        return response()->json(['Post deleted successfully'],200);
    }

    public function getAllPosts()
    {
        $posts = Posts::all();

        return response()->json($posts);
    }
}
