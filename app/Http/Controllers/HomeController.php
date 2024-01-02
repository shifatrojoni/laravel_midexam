<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
         return view('home');
       }

       public function about(){
        
        return view('about');
         }

         public function service(){
            return view('service');
             }

             public function guard(){
            
                return view('guard');
                 }

                 
             public function contact(){
            
                return view('contact');
                 }



                 public function store(Request $req){
                  $contact = new Contact();
        
        
                  $message = [
                       'name.required' => "You have put your name",
                       'email.required' => "please put your email",
                       'email.email' => "please enter valid email"
                  ];
        
                $validate =  $req->validate([
                       'name' => 'required|min:4',
                       'email' => 'required|email',
                       'subject' => 'required|min:5',
                       'message' => 'required|min:5'
        
                  ],$message);
        
                  if($validate){
                       $data = [
                            'name'=> $req->name,
                            'email'=> $req->email,
                            'subject'=> $req->subject,
                            'message'=> $req->message,
                       ];
                       $contact->insert($data);
                       return redirect('contact')->with('msg','We received your message');
        
                      ;
                  }
                      
           }
           public function contactList(){
             $contacts = Contact::all();
             $data['messages'] = $contacts;
             return view('contactList',$data);
           }
           public function delete($mid){
             echo $mid;
        
             $contact = Contact::find($mid);
            if($contact->delete()){
                  return redirect('contact/list')->with('msg','Deleted successful');
            };
            
        }
        public function edit($mid){
             echo $mid;
        
             $contact = Contact::find($mid);
             $data['single'] = $contact;
             return view('edit',$data);
        //     if($contact->delete()){
        //           return redirect('contact/list')->with('msg','Deleted successful');
        //     };
            
        }
        public function update(Request $req, $id ){
             $contact = Contact::find($id);
        
        
             $messages = [
                  'name.required' => "You have put your name",
                  'email.required' => "please put your email",
                  'email.email' => "please enter valid email"
             ];
        
           $validate =  $req->validate([
                  'name' => 'required|min:4',
                  'email' => 'required|email',
                  'subject' => 'required|min:5',
                  'message' => 'required|min:5'
        
             ],$messages);
        
             if($validate){
                  $data = [
                       'name'=> $req->name,
                       'email'=> $req->email,
                       'subject'=> $req->subject,
                       'message'=> $req->message,
                  ];
                  $contact->update($data);
                  return redirect('contact/list')->with('msg','Update your message');
        
                 
        
        }
        }
}
