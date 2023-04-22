@extends('layouts.frontend')

@section('content')
<section class="binduz-er-about-us-area pb-60">
        <div class=" container">
            <div class="row">
                <div class="col-lg-12">
                    @php
                        $terms = App\Models\TermsUse::first();
                    @endphp

                    <div class="binduz-er-contact-us-box">
                        <h4 class="binduz-er-title mt-3">{{$terms->terms_name}}</h4>
                        <p>{!! $terms->terms_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== BINDUZ ABOUT US PART ENDS ======-->

@endsection
