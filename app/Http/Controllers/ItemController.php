<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;

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
		return view('item.create');		
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
		$item->active = $request->get('active');
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
		$item->active = $request->get('active');
		$item->save();

		return \Redirect::route('item.show', $id);
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
