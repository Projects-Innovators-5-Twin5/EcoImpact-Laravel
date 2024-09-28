@extends('front.layout')

@section('content')
<title>EcoImpact - Awareness Campaign Details page</title>

<link rel="stylesheet" href="{{ asset('css/compaign.css') }}">
<script src="{{ asset('js/landing.js') }}"></script>


<div class="mt-4">
        <div class="text-center mb-4">
            <h3 style="margin-right:15px;">{{$campaign->title}}</h3>
          
        </div>
</div>

<div style="background-image: url('{{ asset('storage/' . $campaign->image) }}'); background-size: cover; background-position: center; height: 400px; margin-top:30px;">
</div>


   <div class="d-flex">
        <div class="col-10 col-xl-4 mt-4 p-4">
            <div class="row">
                <div class="col-12">
                    <div class="card card-body border-0 shadow mb-4">
                       <p class="mt-2">Join us from <img src="/assets/img/deadline.png" alt="icon" class="icon" style="width:20px; height:20px;">  <span class="text-info fw-bold">{{ $startDate->format('l, F j, Y') }}</span> to <img src="/assets/img/deadline.png" alt="icon" class="icon" style="width:20px; height:20px;">  <span class="text-info fw-bold"> {{ $endDate->format('l, F j, Y') }} </span>  for our exciting campaign</p>
                        
                    </div>
                </div>

                
            </div>
               <div class="col-12">
                    <div class="card card-body border-0 shadow">
                        <h5>Campaign target Audience</h5>
                        <p class="mt-4">This campaign is designed specifically for:
                            <ul>
                              @foreach($campaign->target_audience as $audience)
                               <li>{{$audience}}</li>
                               @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
        </div>

        <div class="col-10 col-xl-8 mt-4 p-4">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Campaign Overview</h2>
                <p class="d-flex align-items-center">{{$campaign -> description}}</p>    
                
                <h2 class="h5 mt-2">Join Our Campaign!🌟</h2>
                <p class="d-flex align-items-center">We believe that every individual has the power to create change, and we want you to be part of our Sensibilisation Campaign! This is your opportunity to contribute to meaningful initiatives that can positively impact our community.</p>
                <p class="d-flex align-items-center"> By participating, you will not only gain valuable insights and experiences but also connect with like-minded individuals who share your passion for making a difference. Whether you’re looking to volunteer, share your ideas, or simply learn more, we welcome you to join us!</p>
                <p class="d-flex align-items-center">Don’t wait any longer! Click the button above to participate in our campaign and take the first step towards making a real impact. Together, we can create a brighter future!</p>
                <div class="d-flex justify-content-end">
                   <button class="btn btn-secondary " type="button"><a href="/register" class="text-btn" style="color:white;" >Join the Campaign!</a></button>
                </div>   

            </div>

        </div>

    </div>



@endsection