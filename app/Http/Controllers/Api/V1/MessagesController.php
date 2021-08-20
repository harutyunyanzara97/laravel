<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('comments.messages');
    }
//    public function index(Request $request)
//    {
////        $user=User::where('id',$request->receiver_id)->first();
////
////        return $user->messages()->where(function ($query) {
////                $query->bySender(request()->input('sender_id'))
////                    ->byReceiver(request()->input('receiver_id'));
////            })
////            ->orWhere(function ($query) {
////                $query->bySender(request()->input('receiver_id'))
////                    ->byReceiver(request()->input('sender_id'));
////            })
////            ->get();
//
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $chat = auth()->user()->messages()->create([
//            'message' => $request->message
//        ]);
        $message = auth()->user()->messages()->create([
            'sender_id' => Auth::id(),
            'receiver_id' => 1,
            'message' => $request->message
        ]);
        broadcast(new MessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }
//    public function store(Request $request)
//    {
//        $message = Message::create([
//            'sender_id'   => $request->input('sender_id'),
//            'receiver_id' => $request->input('receiver_id'),
//            'message'     => $request->input('message'),
//        ]);
//
////        broadcast(new MessageSent($message));
//        broadcast(new MessageSent($message))->toOthers();
//
//        return $message->fresh();

//
////        broadcast(new MessageSent($message->load('user')))->toOthers();
//
//        return ['status' => 'success'];
//    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }
}
