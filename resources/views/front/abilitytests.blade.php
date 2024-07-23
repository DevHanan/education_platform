@extends('front.layouts.master')
@section('title', '')
@section('content')
@include('front.layouts.common.navbar')
<style>
    body{
        margin: 0;
        padding: 0;
        font-family: 'roboto' , sans-serif;
        background-color: #F2F2F2;
    }
    h1{
        text-align: center;
        color: #333333;
    }
    .cardcontainer{
        width: 350px;
        height: 500px;
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        transition: 0.3s;
    }
    .cardcontainer:hover{
        box-shadow: 0 0 45px gray;
    }
    .photo{
        height: 300px;
        width: 100%;
    }
    .photo img{
        height: 100%;
        width: 100%;
    }
    .txt1{
        margin: auto;
        text-align: center;
        font-size: 17px;
    }
    .content{
        width: 80%;
        height: 100px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        top: -33px;
    }
    .photos{
        width: 90px;
        height: 30px;
        background-color: #E74C3C;
        color: white;
        position: relative;
        top: -30px;
        padding-left: 10px;
        font-size: 20px;
    }
    .txt4{
        font-size:27px;
        position: relative;
        top: 33px;
    }
    .txt5{
        position: relative;
        top: 18px;
        color: #E74C3C;
        font-size: 23px;
    }
    .txt2{
        position: relative;
        top: 10px;
    }
    .cardcontainer:hover > .photo{
        height: 200px;
        animation: move1 0.5s ease both;
    }
    @keyframes move1{
        0%{height: 300px}
        100%{height: 200px}
    }
    .cardcontainer:hover > .content{
        height: 200px;
    }
    .footer{
        width: 80%;
        height: 100px;
        margin-left: auto;
        margin-right: auto;
        background-color: white;
        position: relative;
        top: -15px;
    }
    .btn{
        position: relative;
        top: 20px;
    }
    #heart{
        cursor: pointer;
    }
    .like{
        float: right;
        font-size: 22px;
        position: relative;
        top: 20px;
        color: #333333;
    }
    .fa-gratipay{
        margin-right: 10px;
        transition: 0.5s;
    }
    .fa-gratipay:hover{
        color: #E74C3C;
    }
    .txt3{
        color: gray;
        position: relative;
        top: 18px;
        font-size: 14px;
    }
    .comments{
        float: right;
        cursor: pointer;
    }
    .fa-clock, .fa-comments{
        margin-right: 7px;
    }
</style>
<section class="header">
        <div class="text-center text-white">
          <h1 class="pb-3">إختبارات القدرات</h1>
          <!-- <p>تعرف على السياسات و اللوائح وكل ما يخص المؤسسة</p> -->
        </div>
      </section>
  
      <section class="tests container my-5 p-5 rounded">
          
      <div class="row">

      @if($tests)
      @foreach($tests as $test)
        <div class=" col-lg-6 cardcontainer">
            
            <div class="content">
                <p class="txt4">{{ $test->name }}</p>
                <p class="txt5">A city that never sleeps</p>
                <p class="txt2">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
            </div>
            <div class="footer">
                <p><a class="waves-effect waves-light btn" href="#">ابد الاختبار</a><a id="heart"><span class="like"><i class="fab fa-gratipay"></i>Like</span></a></p>
                <p class="txt3"><i class="far fa-clock"></i>10 Minutes Ago <span class="comments"><i class="fas fa-comments"></i>45 Comments</span></p>
            </div>
        </div>
        @endforeach
        @else
لا توجد بيانات للعرض
        @endif
    </div>
          <!-- <div class="row">
             
          @if($tests)
          @foreach($tests as $test)
              <div class="col-lg-6">
                  <div class="d-flex justify-content-between align-items-center bg-white rounded test-card mb-4">
                      <div>
                          <h3> {{ $test->name }}</h2>
                          <p class="mt-4">  {!! $test->description !!}</p>
                      </div>
                    
                  </div>
              </div>
              @endforeach
              @else

<p>  {{ __('admin.no_data_found')}}</p>
              @endif
             
          </div> -->
      </section>
@endsection