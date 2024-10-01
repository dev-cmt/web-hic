<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\MemberApproved;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    /*________________________________________________________*/
    /*___________________ CONTACt ADMIN ______________________*/
    public function contactIndex()
    {
        $message=Contact::get();
        return view('layouts.pages.contact',compact('message'));
    }
    public function contactStore(Request $request)
    {
        $validated=$request -> validate([
            'name'=> 'required',
            'email'=> 'required',
            'subject'=> 'required',
        ]);

        $post =new Contact([
            "name" =>$request->name,
            "email"=>$request->email,
            "subject"=>$request->subject,
            "description"=>$request->description,
        ]);
        $post->save();
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
    public function contactReply($id)
    {
        $message=Contact::findOrFail($id);
        $message->status = 1;
        $message->save();

        $mailData =[
            'title' => 'Thanks for your feedback',
            'body' => 'Please call us ',
        ];
        Mail::to($message->email)->send(new MemberApproved($mailData));

        $notification=array('messege'=>'Feedback send maill successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function contactDelete($id)
    {
        Contact::destroy($id);

        $notification=array('messege'=>'Message delete successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
