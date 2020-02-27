<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index',compact('contacts'));
    }

    public function trashed(){
        $contacts = Contact::onlyTrashed()->get();
        return view('backend.contact.index',compact('contacts'));
    }

    public function force_delete($id)
    {
        $contact = Contact::onlyTrashed($id)->where('id',$id)->get()[0];

        if($contact->forceDelete())
        {
            $this->setSuccess('Comment has been Deleted successfully');
            return redirect()->route('admincontact.trashed');
        }
        $this->setError('Something is wrong! please try again!');
        return back();
    }

    public function restore($id)
    {
        $contact = Contact::onlyTrashed()->where('id',$id)->get()[0];

        if($contact->restore())
        {
            $this->setSuccess('Comment has been restore successfully');
            return redirect()->route('admincontact.index');
        }
        $this->setError('Something is wrong! please try again');
        return back();
    }

    public function delete($id){
        $contact = Contact::find($id);

        if($contact->delete())
        {
            $this->setSuccess('Comment has been trashed successfully');
            return redirect()->route('admincontact.trashed');
        }
        $this->setError('Something is wrong! Please try again');
        return back();
    }
}
