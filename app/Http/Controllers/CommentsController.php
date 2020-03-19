<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Storage;


class CommentsController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
	 public function create($id)
    {
        return view('Comment.create', ['company_id'=>$id]);
    }
 
 
    public function store(CommentRequest $request)
    {
        $company = Company::findOrFail($request->comment_company_id);
        Comment::create([
            'body' => $request->body,
            'company_id' => Auth::id(),
            'comment_company_id' => $company->id
        ]);
        return redirect()->route('companies', $company->id);
    }

    
}
