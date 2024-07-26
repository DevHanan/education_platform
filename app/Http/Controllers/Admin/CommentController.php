<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\FileUploader;
use App\Http\Resources\CommentResource;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Toastr;


class CommentController extends Controller
{
    use  FileUploader;


    
    public function __construct()
    {
        $this->title = trans('admin.comments.title');
        $this->route = 'admin.comments';
        $this->view = 'admin.comments';
        $this->path = 'comments';
        $this->access = 'comments';
        $this->middleware('permission:courses-comments',   ['only' => ['show', 'index']]);
        $this->middleware('permission:courses-comments-delete',   ['only' => ['delete']]);

      
    }
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Comment::where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->paginate(10);
        return view($this->view.'.index', $data);
    }



    public function show($id){
        $comment = Comment::find($id);
        if($comment)
        return $this->okApiResponse(new CommentResource($comment), __('Comment loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function destroy (Request $request)
    {
        $comment = Comment::find($request->id);
        if ($comment)
            $comment->delete();

            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
            return redirect()->route($this->route.'.index');
    }
}
