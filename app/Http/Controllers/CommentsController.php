<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Session;
use Storage;


class CommentsController extends Controller
{
	
	 public function create($id)
    {
        return view('Comment.create', ['company_id'=>$id]);
    }
 
 
    public function store(CommentRequest $request)
    {
        $company = Company::findOrFail($request->comment_company_id);
        $comment = Comment::create([
            'body' => $request->body,
            'company_id' => Session::get('company')->id,
            'comment_company_id' => $company->id
        ]);
        return redirect()->route('companies.index');
    }

    
}
