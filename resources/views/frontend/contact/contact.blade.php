@extends('layouts.frontend')

@section('content')
<div class="binduz-er-contact-us-area">
        <div class=" container">
        <div class="row">
                <div class=" col-lg-4">
                    <div class="binduz-er-contact-info-box">
                        @php 
                            $contact = App\Models\Setting::first();
                        @endphp
                        <h3 class="binduz-er-title">Corporate Office</h3>
                        <ul>
                            <li>Address: <span>{{$contact->address}}</span></li>
                            <li>Phone: <span>{{$contact->phone_number}}</span></li>
                            <li>Email: <span>{{$contact->email}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-lg-8">
                    <div class="binduz-er-contact-info-box">
                    <form action="{{route('send.message')}}" method="get">
                        @csrf
                            <div class="binduz-er-contact-title">
                                <h4 class="binduz-er-title">Get in touch & let us know</h4>
                            </div>
                            @if(session('message'))
                                <h6 class="alert alert-primary mb-3">{{session('message')}}</h6>
                            @endif
                                    <div class="">
                                        <input type="text"  name="name" class="form-control mt-3" placeholder="Name">
                                        <input type="email" name="email" class="form-control  mt-3" placeholder="Email">   
                                        <input type="text" name="subject"  class="form-control mt-3" placeholder="Subject">                                    
                                        <textarea name="body_message" class="form-control mt-3 " cols="30" rows="10" placeholder="Enter message"></textarea>
                                       
                                    </div>
                            <button class="btn btn-danger float-end mt-2">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== BINDUZ CONTACT US PART ENDS ======-->





@endsection