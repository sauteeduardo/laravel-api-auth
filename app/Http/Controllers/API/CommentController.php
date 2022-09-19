<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
  public function index()
  {
    $Messages = Message::all();
    return response()->json($Messages);
  }

  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|max:255',
      'text' => 'required'
    ]);

    $newMessage = new Message([
      'name' => $request->get('name'),
      'text' => $request->get('text')
    ]);

    $newMessage->save();

    return response()->json($newMessage);
  }

  /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function show($id)
  {
    $Message = Message::findOrFail($id);
    return response()->json($Message);
  }

  /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function update(Request $request, $id)
  {
    $Message = Message::findOrFail($id);

    $request->validate([
      'name' => 'required|max:255',
      'text' => 'required'
    ]);

    $Message->name = $request->get('name');
    $Message->text = $request->get('text');

    $Message->save();

    return response()->json($Message);
  }

  /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function destroy($id)
  {
    $Message = Message::findOrFail($id);
    $Message->delete();

    return response()->json($Message::all());
  }
}
