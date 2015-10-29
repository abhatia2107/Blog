<?php

namespace Blog\Http\Controllers;

use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

use Blog\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
	/**
	 * UserController constructor.
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin', ['except'=>['show']]);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::latest()->get();
		return view('user.index', compact('users'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		return view('user.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		return view('user.edit', compact('user'));
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
		$this->validate($request, User::$rulesUpdate); // Uncomment and modify if you need to validate any input.
		$user = User::findOrFail($id);
		$user->update($request->all());
		return redirect('/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return redirect('user');
	}

}
