@extends('layouts.frontend')

@section('content')
<section class="binduz-er-about-us-area pb-60">
        <div class=" container">
            <div class="row">
                <div class="col-lg-12">
                    @php
                        $abouts = App\Models\About::first();
                    @endphp

                    <div class="binduz-er-contact-us-box">
                        <h4 class="binduz-er-title mt-3">{{$abouts->about_name}}</h4>
                        <p>{!! $abouts->about_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== BINDUZ ABOUT US PART ENDS ======-->

@endsection
