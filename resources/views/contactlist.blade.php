@extends('layouts.app')

@section('title')

@section('content')

@if(session('msg')) 
<section class="contact_section layout_padding">
<div class="contact_bg_box">{{session('msg')}}</div>
@endif
<div class="img-box">
        <img src="images/contact-bg.jpg" alt="">
      </div>
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Get In touch
        </h2>
      </div>
     

     <table class="table table-success table-striped contact_section layout_padding">
      
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr>
                {{-- <th>{{$message['id']}}</th>
                <th>{{$message['name']}}</th>
                <th>{{$message['email']}}</th>
                <th>{{$message['subject']}}</th>
                <th>{{$message['message']}}</th> --}}

                <th>{{$message->id}}</th>
                <th>{{$message->name}}</th>
                <th>{{$message->email}}</th>
                <th>{{$message->subject}}</th>
                <th>{{$message->message}}</th>
                <th>
                    <a href="/contact/edit/{{$message['id']}}" class="btn btn-primary btn-sm">Edit</a>
                 <a href="/contact/delete/{{$message['id']}}" class="btn btn-secondary btn-sm">Delete</a>
                    {{-- <button type="button" class="contact_section layout_padding">Edit</button>
                    <button type="button" class="contact_section layout_padding">delete</button> --}}
                </th>
               
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
                
            </tr>

        </tfoot>
     </table>
     
      
    </div>
  </div>
</div>

@endsection