<footer class="primary-bg pt-5 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="subscribe w-75">
                    <h4 class="text-white"> اشترك فى نشرتنا الاخبارية </h4>
                    <p class="text-white py-3"> سجل ايميلك ليصلك كل ما هو جديد عن دورات وتخفيضات دوافير </p>
                    <form action="{{url('/post-maillist')}}" method="POST">
                        @csrf
                        <input type="email" class="form-control p-3" name="email" placeholder="البريد الألكتروني" required>
                        <div>
                            <button type="submit" class="btn rounded-pill secondary-bg text-white my-4">اشترك الان</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-6">
                <div class="footer_categories">
                    <h4 class="text-white">المسارات النشطة</h4>
                    <ul class="list-unstyled p-0">
                        @foreach($tracks as $track)
                        @if($track->in_footer == 1)
                        <li class="py-2"><a href="{{url('courses?track_id='.$track->id)}}" class="text-white text-decoration-none">{{ $track->name }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-6">
                <div class="footer_categories">
                    <h4 class="text-white">اكتشف</h4>
                    <ul class="list-unstyled p-0">
                        <li class="py-2"><a href="{{ url('/') }}" class="text-white text-decoration-none">الرئيسية</a></li>
                        <li class="py-2"><a href="{{ url('/about-us') }}" class="text-white text-decoration-none">من نحن</a></li>
                        <li class="py-2"><a href="{{ url('courses') }}" class="text-white text-decoration-none">الدورات</a></li>
                        @if($landing_setting->book_store_visiable==1 && $landing_setting->book_shop_url && $landing_setting->book_shop_url != null)
                        <li class="py-2"><a href="{{ url($landing_setting->book_shop_url)}}" class="text-white text-decoration-none">متجر الكتب</a></li>
                        @endif
                        <li class="py-2"><a href=" {{ url('/blogs') }}" class="text-white text-decoration-none">المدونة</a></li>
                        <li class="py-2"><a href="{{ url('/contactus') }}" class="text-white text-decoration-none">تواصل معنا</a></li>
                        <li class="py-2"><a href="#" class="text-white text-decoration-none">دليل المستخدم</a></li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-12">
                <div class="contact text-white">
                    <div class="logo"><a href="{{ url('/')}}"><img src="
                   {{ asset($setting->LogoFullPath) }}" alt="" style="max-height:140px;max-width:fit-content;"></a></div>
                    <h4 class="text-white pb-2">تواصل معنا</h4>
                    <p>
                        <a href="tel:{{ $setting->phone }}" class="text-white text-decoration-none"><i class="fa-solid fa-phone-flip ms-2"></i> {{ $setting->phone }} </a>
                    </p>
                    <p>
                        <a href="tel:{{ $setting->telephone }}" class="text-white text-decoration-none"><i class="fa-solid fa-phone-flip ms-2"></i> {{ $setting->telephone }} </a>
                    </p>
                    <p>
                        <a href="https://wa.me/{{ $setting->whatsapp }}" class="text-white text-decoration-none"><i class="fa-solid fa-mobile-screen ms-2"></i> {{ $setting->whatsapp }} </a>
                    </p>
                    <p class="mt-1"><i class="fa fa-envelope ms-2"></i> {{ $setting->email }}</p>

                    <div class="social">
                        <ul class="list-unstyled d-flex w-100 m-0 p-0">
                            @if($setting->facebook_url != null)
                            <li>
                                <a target="_blank" href="{{ $setting->facebook_url}}" class="d-flex justify-content-center align-items-center bg-white rounded-circle text-decoration-none mx-2">
                                    <i class="fa-brands fa-facebook-f fa-lg primary-color"></i>
                                </a>
                            </li>
                            @endif
                            @if($setting->whatsapp != null)
                            <li>
                                <a target="_blank" href="https://wa.me/{{ $setting->whatsapp }}" class="d-flex justify-content-center align-items-center bg-white rounded-circle text-decoration-none mx-2">
                                    <i class="fa-brands fa-whatsapp fa-lg primary-color"></i>
                                </a>
                            </li>
                            @endif

                            @if($setting->instgram_url != null)
                            <li>
                                <a target="_blank" href="{{ $setting->instgram_url }}" class="d-flex justify-content-center align-items-center bg-white rounded-circle text-decoration-none mx-2">
                                    <i class="fa-brands fa-instagram fa-lg primary-color"></i>
                                </a>
                            </li>
                            @endif
                            @if($setting->youtube_url != null)
                            <li>
                                <a target="_blank" href="{{ $setting->youtube_url }}" class="d-flex justify-content-center align-items-center bg-white rounded-circle text-decoration-none mx-2">
                                    <i class="fa-brands fa-youtube fa-lg primary-color"></i>
                                </a>
                            </li>
                            @endif
                            <!-- @if($setting->twitter_url != null)
                            <li>
                                <a target="_blank" href="{{ $setting->twitter_url }}" class="d-flex justify-content-center align-items-center bg-white rounded-circle text-decoration-none mx-2">
                                    <i class="fa-brands fa-x-twitter fa-lg primary-color"></i>
                                </a>
                            </li>
                            @endif -->
                            @if($setting->snapchat_url != null)
                            <li>
                                <a target="_blank" href="{{ $setting->snapchat_url }}" class="d-flex justify-content-center align-items-center bg-white rounded-circle text-decoration-none mx-2">
                                    <i class="fa-brands fa-snapchat fa-lg primary-color"></i>
                                </a>
                            </li>
                            @endif
                            @if($setting->telegram_number != null)
                            <li>
                                <a target="_blank" href="tel: {{ $setting->telegram_number }}" class="d-flex justify-content-center align-items-center bg-white rounded-circle text-decoration-none mx-2">
                                    <i class="fa-brands fa-telegram fa-lg primary-color"></i>
                                </a>
                            </li>
                            @endif

                            <!-- @if($setting->linkedin_url != null)
                            <li>
                                <a target="_blank" href="{{ $setting->linkedin_url }}" class="d-flex justify-content-center align-items-center bg-white rounded-circle text-decoration-none mx-2">
                                    <i class="fa-brands fa-linkedin fa-lg primary-color"></i>
                                </a>
                            </li>
                            @endif -->

                            @if($setting->tiktok_url != null)
                            <li>
                                <a target="_blank" href="{{ $setting->tiktok_url }}" class="d-flex justify-content-center align-items-center bg-white rounded-circle text-decoration-none mx-2">
                                    <i class="fa-brands fa-tiktok fa-lg primary-color"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <p style="text-align:center;color:#ffffff;">
                 <a href="https://wa.me/0201287848630" class="text-white text-decoration-none">
                    Developed with ♥️ by Brain Soft Solutions
    
                  </a>
                </p>
        </div>

    </div>
</footer>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="{{asset('public/front/js/jquery.min.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('public/front/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/front/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('public/front/js/select2.full.min.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!--animation-->
<script src="{{asset('public/front/js/pagination.js')}}"></script>

<script>
    AOS.init();
</script>


<script src="{{asset('public/front/js/price_filter.js')}}"></script>
<script src="{{asset('public/front/js/pagination.js')}}"></script>
<script src="{{asset('public/front/js/main.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });


    let categoryCards = document.querySelector('.categoryCards');
    let rowsCards = document.querySelector('.rowsCards');
    let paginationCards = document.querySelectorAll('#paginationCard .card_pagination');
    let paginationCardsImg = document.querySelectorAll('#paginationCard .paginationCardImg');
    let paginationCardsData = document.querySelectorAll('#paginationCard .paginationCardData');

    rowsCards.addEventListener('click', function() {
        categoryCards.classList.remove('active');
        rowsCards.classList.add('active');

        paginationCards.forEach(paginationCard => {
            paginationCard.classList.add('col-sm-12');
        });
        paginationCardsImg.forEach(paginationCardImg => {
            paginationCardImg.classList.remove('col-12');
            paginationCardImg.classList.add('col-4');
        });
        paginationCardsData.forEach(paginationCardData => {
            paginationCardData.classList.remove('col-12');
            paginationCardData.classList.add('col-8');
        });

        let paginationCardsDesc = document.querySelectorAll('#paginationCard article p');

        paginationCardsDesc.forEach(paginationCardDesc => {
            paginationCardDesc.style.cssText = 'white-space: normal;';
        });
    });

    categoryCards.addEventListener('click', function() {
        rowsCards.classList.remove('active');
        categoryCards.classList.add('active');

        paginationCards.forEach(paginationCard => {
            paginationCard.classList.remove('col-sm-12');

            paginationCardsImg.forEach(paginationCardImg => {
                paginationCardImg.classList.remove('col-4');
                paginationCardImg.classList.add('col-12');
            });
            paginationCardsData.forEach(paginationCardData => {
                paginationCardData.classList.remove('col-8');
                paginationCardData.classList.add('col-12');
            });
        });

        let paginationCardsDesc = document.querySelectorAll('#paginationCard article p');

        paginationCardsDesc.forEach(paginationCardDesc => {
            paginationCardDesc.style.cssText = 'white-space: nowrap;';
        });
    });
</script>

<script>
      document.addEventListener('DOMContentLoaded', function() {

    function checkAll(filterClass) {
        // Get the "Check All" checkbox and all other checkboxes
        const checkAllCheckbox = document.querySelector(`.${filterClass} #checkAll`);
        const checkboxes = document.querySelectorAll(`.${filterClass} .form-check-input:not(.check-all)`);

        // Add event listener to the "Check All" checkbox
        checkAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = checkAllCheckbox.checked;
            });
        });

        // Add event listener to other checkboxes to uncheck "Check All" if any checkbox is unchecked
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (!this.checked) {
                    checkAllCheckbox.checked = false;
                }
            });
        });
        
    }
});
</script>