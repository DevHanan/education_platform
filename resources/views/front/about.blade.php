@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')

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