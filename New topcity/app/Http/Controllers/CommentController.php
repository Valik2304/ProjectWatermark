<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function index()
    {

       $product_id = request()->get('product_id');
       $pagination = 5;
       $comments = Comment::query()->where('product_id',$product_id)->orderBy('created_at', 'desc')->paginate($pagination);
       return response()->json([
           'body' => view('catalog.comments',compact('comments'))->render(),
           'next' => $comments->appends(['product_id'=>$product_id])->nextPageUrl()
       ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store(CommentStoreRequest $request)
    {
        $data = $request->all();
        $comment = Comment::create($data);

//        return view('catalog.presult-comment');
        return response()->json([
            'body' => view('catalog.presult-comment',compact('comment'))->render()
        ]);


    }
}
