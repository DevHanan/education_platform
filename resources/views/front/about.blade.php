@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')

<section class="about">
    <div class="hero_sec pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img d-flex justify-content-center">
                        <img src="{{ asset($aboutsetting->backgroundImageFullPath)}}" class="img-fluid m-0" data-aos="fade-left" data-aos-duration="1000" alt="">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info position-relative py-5">
                        <img src="{{asset('/front/img/completed-bg.svg')}}" class="position-absolute w-100 h-100 img-fluid" alt="">
                        <h4 class="title py-5 pb-1 fw-bold secondary-color"> {{ $aboutsetting-> title}} </h4>
                        <div class="content fw-bold text-white">
                            {!! $aboutsetting->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

</section>
@endsection

@push('frontscript')
<script>
    $(document).ready(function() {
        // counter
        const counters = document.querySelectorAll(".count");
        const speed = 700;
        
        const isElementInViewport = (el) => {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        };
    
        const startCounterIfVisible = (counter) => {
            if (isElementInViewport(counter)) {
                const updateCount = () => {
                    const target = parseInt(counter.getAttribute("data-target"));
                    const count = parseInt(counter.innerText);
                    const increment = Math.ceil(target / speed);
        
                    if (count < target) {
                        counter.innerText = count + increment;
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            } else {
                window.addEventListener('scroll', () => {
                    if (isElementInViewport(counter)) {
                        startCounterIfVisible(counter);
                        // Remove the event listener once the counter starts
                        window.removeEventListener('scroll', arguments.callee);
                    }
                });
            }
        };
        
        counters.forEach(startCounterIfVisible);
    });
    </script>
@endpush