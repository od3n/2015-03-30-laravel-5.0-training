<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ItemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$items =  \App\Item::all();

		return view('item.index', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$item = new \App\Item;

		return view('item.create', compact('item'));		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreItemRequest $request)
	{
		$item = new \App\Item;
		$item->name = $request->get('name');
		$item->description = $request->get('description');
		$item->active = ($request->get('active')) ? $request->get('active') : 0;
		
		$file = Request::file('image');

		if ($file) {
			Request::file('image')->move('images', $file->getClientOriginalName());
			$item->image = $file->getClientOriginalName();
		}

		$item->save();

		return \Redirect::route('item.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$item = \App\Item::find($id);

		return view('item.show', compact('item'));		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = \App\Item::find($id);

		return view('item.create', compact('item'));				
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, StoreItemRequest $request)
	{
		$item = \App\Item::find($id);
		$item->name = $request->get('name');
		$item->description = $request->get('description');
		$item->active = ($request->get('active')) ? $request->get('active') : 0;

		$file = Request::file('image');

		if ($file) {
			Request::file('image')->move('images', $file->getClientOriginalName());
			$item->image = $file->getClientOriginalName();
		}

		if (Request::has('remove')) {
			$item->image = null;
		}

		$item->save();

		return \Redirect::route('item.show', $id);
	}

	public  function delete($id)
	{
		$item = \App\Item::find($id);
		$item->delete();

		return \Redirect::route('item.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
