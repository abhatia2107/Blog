<?php

namespace Blog\Http\Controllers;

use Auth;
use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

use Blog\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BlogController extends Controller
{
	/**
	 * BlogController constructor.
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('author', ['only' => ['create', 'store']]);
		$this->middleware('editor', ['only' => ['edit', 'delete']]);
		$this->middleware('admin', ['only'=>['enable', 'disable']]);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->level==1)
			$blogs = Blog::withTrashed()->get();
		else
			$blogs = Blog::latest()->get();
		return view('blog.index', compact('blogs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$category=config('global.category');
		$radio=config('global.radio');
		$checkbox=config('global.checkbox');
		return view('blog.create', compact('category', 'radio', 'checkbox'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data=$request->all();
		$this->validate($request, Blog::$rules); // Uncomment and modify if you need to validate any input.
		$data['user_id']=Auth::id();
		if(isset($data['checkbox'])) {
			foreach ($data['checkbox'] as $value) {
				$data['b' . $value] = 1;
			}
		}
		$blog=Blog::create($data);
		if(Auth::user()->level!=1)
			Blog::destroy($blog->id);
		return redirect('blog');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param  Request  $request
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
		if(Auth::user()->level==1)
			$blog = Blog::withTrashed()->findOrFail($id);
		else
			$blog = Blog::findOrFail($id);
		$this->validate($request, Blog::$rules); // Uncomment and modify if you need to validate any input.
		$data=$request->all();
		$data['user_id']=Auth::id();
		if(isset($data['checkbox'])) {
			foreach ($data['checkbox'] as $value) {
				$data['b' . $value] = 1;
			}
		}
		$blog->update($data);
		if(Auth::user()->level!=1)
			Blog::destroy($blog->id);
		return redirect('blog');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Auth::user()->level==1)
			$blog = Blog::withTrashed()->findOrFail($id);
		else
			$blog = Blog::findOrFail($id);
		$category=config('global.category');
		$radio=config('global.radio');
		$checkbox=config('global.checkbox');
		return view('blog.show', compact('blog', 'category', 'radio', 'checkbox'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::user()->level==1)
			$blog = Blog::withTrashed()->findOrFail($id);
		else
			$blog = Blog::findOrFail($id);
		$category=config('global.category');
		$radio=config('global.radio');
		$checkbox=config('global.checkbox');
		return view('blog.edit', compact('blog', 'category', 'radio', 'checkbox'));
	}

	/**
	 * Enable the resource for public listing.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function enable($id)
	{
		$blog=Blog::withTrashed()->find($id);
		if($blog){
			$blogDisabled=Blog::onlyTrashed()->find($id);
			if($blogDisabled){
				$blogDisabled->restore();
				return redirect()->back()->with('success',trans('blog.enabled'));
			}
			else{
				return redirect()->back()->with('failure',trans('blog.enable_failed'));
			}
		}
		else
			return redirect()->back()->with('failure',trans('blog.not_exist'));
	}

	/**
	 * Disable the resource from public listing.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function disable($id)
	{
		$blog=Blog::find($id);
		if($blog){
			$blog->delete();
			return redirect()->back()->with('success',trans('blog.disabled'));
		}
		else{
			return redirect()->back()->with('failure',trans('blog.disable_failed'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$blog=Blog::withTrashed()->find($id);
		if($blog){
			$blog->forceDelete();
			return redirect()->back()->with('success',trans('blog.deleted'));
		}
	}

}
