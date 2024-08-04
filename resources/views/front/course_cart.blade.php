@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')
<section class="cartPage my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 right-class">
                <h5 class="fw-bold">تفاصيل الدفع</h5>
                <div class="row">
                    <div class="col-12">
                        @if($paymenttypes)
                        <div class="pay_methods shadow my-3 p-3 px-2 d-flex justify-content-around align-items-center flex-wrap">
                            @foreach ($paymenttypes  as $record )
                            @if($record->type == 'visa')
                          <div class="d-flex mb-1">
                                <input type="radio" name="pay_method" value="a" id="visa" onclick="showForm('visaForm')">
                                <label for="visa" class="p-2 rounded shadow-sm py-2 px-4 me-2 ">
                                    <img src="{{ asset($record->ImageFullPath) }}" alt="">
                                </label>
                            </div>
                            @elseif($record->type == 'paypal')

                            <div class="d-flex mb-1">
                                <input type="radio" name="pay_method" value="a" id="paypal" onclick="showForm('paypalForm')">
                                <label for="paypal" class="p-2 rounded shadow-sm py-2 px-4 me-2 ">
                                    <img src="{{ asset($record->ImageFullPath) }}" alt="">
                                </label>
                            </div>
                            @elseif($record->type == 'cash')
                            <div class="d-flex">
                                <input type="radio" name="pay_method" value="a" id="yandex" onclick="showForm('cashForm')">
                                <label for="yandex" class="p-2 rounded shadow-sm py-2 px-4 me-2 text-center" style="max-height:100px;">
                                    <img src="{{ asset($record->ImageFullPath) }}" alt="" style="max-height:60px;">
                                    <p style="font-size: 10px;" class="m-0 secondary-color">موبايل كاش</p>
                                </label>
                            </div>
                            @else

                            <div class="d-flex mb-1">
                                <input type="radio" name="pay_method" value="a" id="external" onclick="showForm('externalForm')" checked>
                                <label for="external" class="p-2 rounded shadow-sm py-2 px-4 me-2 text-center" style="cursor: pointer;max-height:100px;">
                                    <img src="{{ asset($record->ImageFullPath) }}" alt="" style="max-height:60px;"> <span class="primary-color" style="font-size: 12px;">تحويل خارجي</span>
                                </label>
                            </div>

                            @endif
                            @endforeach
                        </div>
                        @endif
                    </div>

                </div>
                <form action="" class="normal d-none">
                    <div class="payment shadow-sm p-4 my-3">
                        <h5 class="fw-bold">الدفع</h5>
                        <hr>
                        <label class="fw-bold mb-3">رقم البطاقة</label>
                        <input type="text" class="form-control mb-3" placeholder="1234  5678  9101 1121">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3">تاريخ الانتهاء</label>
                                <input type="text" class="form-control mb-3" placeholder="شهر / سنة">
                            </div>
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3">الرقم السري ( CVV )</label>
                                <input type="text" class="form-control mb-3" placeholder="123">
                            </div>
                        </div>
                        <div class="form-check mb-3 d-flex">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label mx-5" for="flexCheckChecked">
                                حفظ بيانات البطاقة
                            </label>
                        </div>
                        <label class="fw-bold mb-3">عنوان إرسال الفواتير</label>
                        <select class="form-control select2 p-4 py-5">
                            <option selected="selected">مصر</option>
                            <option>Alaska</option>
                        </select>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3">المدينة</label>
                                <input type="text" class="form-control mb-3" placeholder="مثال : الجيزة">
                            </div>
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3"> الرمز البريدي </label>
                                <input type="text" class="form-control mb-3" placeholder="مثال : 77889">
                            </div>
                        </div>
                    </div>
                    <button class="btn secondary-bg rounded-pill text-white w-100 my-3 py-3">احصل على الدورة الآن</button>
                </form>
                <form action="" class="paypalForm d-none">
                <?php 
                     $paypal = \App\Models\PaymentType::where('type','paypal')->first();   
                    ?>
                    <input type="hidden" name="payment_type_id" value="{{$paypal->id}}">
                    <div class="payment shadow-sm p-4 my-3">
                        <h5 class="fw-bold">الدفع</h5>
                        <hr>
                        <p>يمكنك الدفع مباشرة من خلال حسابك على باي بال، اضغط زر الدفع لاتمام العملية
                            اخفاء زر الدفع واظهار زر دفع بواسطة باي بال كالآتي
                        </p>
                        <div class="d-flex justify-content-center">
                            <div class="p-2" style="background-color: rgb(232, 232, 232);">
                                <a href="#" class="btn px-5 d-flex justify-content-center align-items-center" style="height: 50px;;background-color: rgb(241, 185, 44);">
                                    <img src="{{asset('public/front/img/icons/paypal.svg')}}" class="img-fluid" alt=""> Pay with
                                </a>
                            </div>
                        </div>
                    </div>
                    <button class="btn secondary-bg rounded-pill text-white w-100 my-3 py-3">احصل على الدورة الآن</button>
                </form>
                <form action="" class="cashForm d-none">
                <?php 
                     $cash = \App\Models\PaymentType::where('type','cash')->first();   
                    ?>
                    <input type="hidden" name="payment_type_id" value="{{$cash->id}}">
                    <div class="payment shadow-sm p-4 my-3">
                        <h5 class="fw-bold">الدفع</h5>
                        <hr>
                        <label class="fw-bold mb-3">رقم الموبايل ( رقم المحفظة الالكترونية )</label>
                        <input type="text" class="form-control mb-3" placeholder="012345678910">
                        <div class="form-check mb-3 d-flex">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label mx-5" for="flexCheckChecked">
                                حفظ بيانات البطاقة
                            </label>
                        </div>
                        <label class="fw-bold mb-3">عنوان إرسال الفواتير</label>
                        <select class="form-control select2 p-4 py-5">
                            <option selected="selected">مصر</option>
                            <option>Alaska</option>
                        </select>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3">المدينة</label>
                                <input type="text" class="form-control mb-3" placeholder="مثال : الجيزة">
                            </div>
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3"> الرمز البريدي </label>
                                <input type="text" class="form-control mb-3" placeholder="مثال : 77889">
                            </div>
                        </div>
                    </div>
                    <button class="btn secondary-bg rounded-pill text-white w-100 my-3 py-3">احصل على الدورة الآن</button>
                </form>
                <form action="" class="visaForm d-none">
                    @csrf
                    <?php 
                     $model = \App\Models\PaymentType::where('type','visa')->first();   
                    ?>
                    <input type="hidden" name="payment_type_id" value="{{$model->id}}">
                    <div class="payment shadow-sm p-4 my-3">
                        <h5 class="fw-bold">الدفع</h5>
                        <hr>
                        <label class="fw-bold mb-3">طرق الدفع المحفوظة</label>
                        <div class=" mb-4 mx-1 d-flex flex-wrap justify-content-around">
                            <div class="position-relative my-1">
                                <input type="radio" class="position-absolute" style="top: 9px;left:10px" name="visa-type" id="visaType1" checked>
                                <label for="visaType1" class="shadow-sm rounded p-2 px-3">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="img"><img src="{{asset('public/front/img/icons/visa-logo.png')}}" alt=""></div>
                                        </div>
                                        <div class="col-8">
                                            <p class="fw-bold mb-0"> 1234 ****</p>
                                            <a href="#" class="text-decoration-none">تعديل . visa</a>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="position-relative my-1">
                                <input type="radio" class="position-absolute" style="top: 9px;left:10px" name="visa-type" id="visaType2">
                                <label for="visaType2" class="shadow-sm rounded p-2 px-3">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="img"><img src="{{asset('public/front/img/icons/visa-logo.png')}}" alt=""></div>
                                        </div>
                                        <div class="col-8">
                                            <p class="fw-bold mb-0"> 1234 ****</p>
                                            <a href="#" class="text-decoration-none">تعديل . visa</a>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="position-relative my-1">
                                <button class="btn shadow-sm rounded p-2 px-3 h-100">
                                    <img src="{{asset('public/front/img/icons/add-square.png')}}" alt=""> <span class="primary-color" style="font-size: 12px;">اضف بطاقة جديدة </span>
                                </button>
                            </div>
                        </div>

                        <label class="fw-bold mb-3" for="">اسم حامل البطاقة</label>
                        <input type="text" class="form-control mb-3" placeholder="مثال : محمد سامح">
                        <label class="fw-bold mb-3" for="">رقم البطاقة </label>
                        <input type="text" class="form-control mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3" for=""> تاريخ انتهاء الصلاحية </label>
                                <input type="text" class="form-control mb-3" placeholder="شهر / سنة">
                            </div>
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3">الرقم السري ( CVV )</label>
                                <input type="text" class="form-control mb-3" placeholder="123">
                            </div>
                        </div>
                        <label class="fw-bold mb-3">عنوان إرسال الفواتير</label>
                        <select class="form-control select2 p-4 py-5">
                            <option selected="selected">مصر</option>
                            <option>Alaska</option>
                        </select>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3">المدينة</label>
                                <input type="text" class="form-control mb-3" placeholder="مثال : الجيزة">
                            </div>
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3"> الرمز البريدي </label>
                                <input type="text" class="form-control mb-3" placeholder="مثال : 77889">
                            </div>
                        </div>
                    </div>
                    <button class="btn secondary-bg rounded-pill text-white w-100 my-3 py-3">احصل على الدورة الآن</button>
                </form>
                @if(isset($externelPayment))
                <form action="{{url('subscribe')}}" class="externalForm " method="POST" enctype="multipart/form-data">
                    @csrf
                    <?php 
                     $externel = \App\Models\PaymentType::where('type','externel')->first();   
                    ?>
                    <input type="hidden" name="payment_type_id" value="{{$externel->id}}">
                    <div class="payment shadow-sm p-4 my-3">
                        <h5 class="fw-bold">تحويل خارجي</h5>
                        <hr>
                        <p class="fw-bold mb-3" for="">يمكنك ارسال المبلغ من خلال الوسايل التالية</p>
                        <label class="mb-3 fw-bold">رقم محفظة للتحويل</label>
                        <div class="d-flex align-items-baseline mb-3">
                            <p class="fw-bold">{{ $externelPayment->mobile_cash_number }}</p> <i class="fa-regular fa-copy mx-3 fa-lg" style="cursor: pointer;"></i>
                        </div>

                        <label class="mb-3 fw-bold">رابط حساب باي بال</label>
                        <div class="d-flex align-items-center mb-3">
                            <p class="fw-bold">{{ $externelPayment->paypal_link }}</p> <i class="fa-regular fa-copy mx-3 fa-lg" style="cursor: pointer;"></i>
                        </div>

                        <label class="mb-3 fw-bold"> حساب فورى</label>
                        <div class="d-flex align-items-center mb-3">
                            <p class="fw-bold">{{ $externelPayment->fawry_number }}</p> <i class="fa-regular fa-copy mx-3 fa-lg" style="cursor: pointer;"></i>
                        </div>

                        <input type="hidden"  name="paid" value="{{$course->TotalDiscount}}" id="finalPrice">
                        <input type="hidden" name="course_id" value="{{$course->id}}" id="course_id">
                        <input type="hidden"  name="coupon_id" value="" id="coupon_id">

                        <label class="fw-bold mb-3">رقم العملية</label>
                        <input type="text" class="form-control mb-3" name="transcation_id">

                        <div class="px-5 d-flex flex-column align-items-center">
                            <div class="img_box rounded d-flex flex-column align-items-center justify-content-center">
                                <p> اسحب صورة الفاتورة هنا <img name="bill" src="{{asset('public/front/img/icons/upload.png')}}" alt=""></p>
                            </div>
                            <div class="choose_img position-relative d-flex justify-content-center my-3">
                                <input type="file" class="position-absolute" id="fileInput" name="bill" required>
                                <div class="btn secondary-bg text-white py-2 px-4 text-center rounded">اختر الملف</div>
                            </div>
                        </div>

                        <label class="fw-bold mb-3">عنوان إرسال الفواتير</label>
                        <select class="form-control select2 p-4 py-5" name="country_id">
                            @foreach($countries as $country)
                            <option value="{{$country->id}}"> {{$country->name }}</option>
                            @endforeach
                        </select>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3">المدينة</label>
                                <input type="text" name="city" class="form-control mb-3" placeholder="مثال : الجيزة">
                            </div>
                            <div class="col-sm-6">
                                <label class="fw-bold mb-3"> الرمز البريدي </label>
                                <input type="text" name="postal_code" class="form-control mb-3" placeholder="مثال : 77889">
                            </div>
                            <input type="hidden" value="{{$course->id}}" name="course_id">
                        </div>
                    </div>
                    <button type="submit" class="btn secondary-bg rounded-pill text-white w-100 my-3 py-3">احصل على الدورة الآن</button>
                </form>
                <p class="text-center">من خلال إكمال عملية الشراء ، فإنك توافق على <a target="_blank" href="{{url('/policies')}}" class="text-decoration-none secondary-color">شروط الخدمة</a> هذه.</p>
                @endif
            </div>

            <div class="col-lg-4 left-class">
                <h5 class="fw-bold">تفاصيل الطلب</h5>
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="course_content shadow-sm my-4 p-2">
                            <div class="img"><img  src="{{ $course->imageFullPath }}" class="img-fluid w-100" alt="" style="max-height:220px;"></div>
                            <div class="info mt-4 px-4">
                                <p class="course_title mb-0 fw-bold"> {{ $course->name }}</p>
                                <p class="secondary-color" style="font-size: 14px;">
                                    @if($course->tracks)
                                    @foreach ($course->tracks as $item)
                                    {{ $item->name  }}
                                    @endforeach
                                    @endif
                                </p>
                                <div class="d-flex align-items-center">
                                    <div class="img"><img src="{{asset('public/front/img/user4.png')}}" alt=""></div>
                                    <p class="mx-2 fw-bold">
                                        @if($course->instructors)
                                        @foreach($course->instructors as $item)
                                        {{ $item->name }}
                                        @endforeach

                                        @endif

                                    </p>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-around" style="font-size: 14px;">
                                    <p> <i class="fa-solid fa-graduation-cap ms-1"></i> {{ $course->difficultyLevelLabel }}</p>
                                    <p> <i class="fa-regular fa-clock ms-1"></i> {{ $course->period }} {{ $course->periodLabel }}</p>
                                    <p> <i class="fa-solid fa-laptop ms-1"></i> {{ $course->lectures()->count()}} محاضرة</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="course_price shadow-sm my-4 p-2">
                            <div class="info mt-4 px-4">
                                <div class="row">
                                    <div class="col-7">
                                        <p class="fw-bold">السعر الاساسي :</p>
                                    </div>
                                    <div class="col-5">
                                        <span class=""> {{ $course->TotalDiscount }} {{ $setting->currency }}</span>

                                        <span class=" text-decoration-line-through mx-2 primary-color"> {{ $course->price }} {{ $setting->currency }}</span>

                                    </div>
                                </div>
                                <p class="fw-bold">كوبون خصم</p>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control mb-3" placeholder="57CTWAY" name="coupon_id" id="couponinput">
                                    </div>
                                    <div class="col-6">
                                        <button data-id="{{$course->id}}"  id="check-discount-button" class="btn secondary-bg rounded text-white ">تطبيق الخصم</button>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-7">
                                        <p class="fw-bold">تخفيض :</p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mx-3 fw-bold" id="coupon-message"> </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-7">
                                        <p class="fw-bold">الأجمالي :</p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mx-3 fw-bold" id="total-message"> {{ $course->TotalDiscount }} {{ $setting->currency }} </p>
                                    </div>
                                </div>
                            </div>
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
    
    $("#check-discount-button").click(function() {
        var code = document.getElementById('couponinput').value;
        var id = $(this).data('id');
        console.log(code);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{url('checkcoupon')}}",
            data: {
                'code': code,
                'course_id': id,
            },
            success: function(response) {
                    if (response.status === 'success') {
                        $('#coupon-message').html(response.discount + '%');
                        $('#total-message').html(response.total);
                        document.getElementById("finalPrice").value = response.total;
                        document.getElementById("coupon_id").value = response.coupon;

                    } else {
                        $('#coupon-message').html('Coupon Not vaild');
                        document.getElementById("finalPrice").value = response.total;
                        document.getElementById("coupon_id").value = response.coupon;

                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }

        });
    })
})
</script>
<script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>  
    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const imgBox = document.querySelector('.img_box');
                    imgBox.innerHTML = ''; // Clear previous content
                    const img = document.createElement('img');
                    img.src = reader.result;
                    img.alt = 'Selected Image';
                    img.className = 'img-fluid rounded-circle';
                    img.style.cssText = 'width: 100%; height: 100%;';
                    imgBox.style.cssText = 'background: transparent; width:213px;height:200px;padding: 0';
                    imgBox.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });        
    </script>
    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const imgBox = document.querySelector('.img_box');
                    imgBox.innerHTML = ''; // Clear previous content
                    const img = document.createElement('img');
                    img.src = reader.result;
                    img.alt = 'Selected Image';
                    img.className = 'img-fluid rounded-circle';
                    img.style.cssText = 'width: 100%; height: 100%;';
                    imgBox.style.cssText = 'background: transparent; width:213px;height:200px;padding: 0';
                    imgBox.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        }); 
        
        function showForm(formId) {
            var forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.classList.add('d-none');
            });
            // Show the selected form
            document.querySelector('.' + formId).classList.remove('d-none');
        }
    </script>   

    <script>
        //<!-- copy -->
        document.addEventListener('DOMContentLoaded', function() {
          const copyIcons = document.querySelectorAll('.fa-copy');
    
          copyIcons.forEach(icon => {
            icon.addEventListener('click', function() {
              const textToCopy = this.previousElementSibling.textContent.trim();
              navigator.clipboard.writeText(textToCopy).then(() => {
                alert('copied successfully!');
              }).catch(err => {
                console.error('Error copying text: ', err);
              });
            });
          });
        });
    </script>
@endpush
