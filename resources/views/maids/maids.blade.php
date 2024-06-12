@extends('layouts.master')
@section('title')
    ادارة العمالة
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <style>

        .branchname {
            float: right;
            position: absolute;
            background-color: #415a6f;
            right: 0;
            top: -9px;
            color: white;
            padding: 5px 12px;
        }
        .branchnameList li {
            background-color: #2196F3;
            padding: 5px 12px;
            color: white;
            float: right;
            margin: 2px;
        }
        .branchnameList {
            float: right;
            position: absolute;
            right: 0;
            top: -20px;
            list-style-type: none;
            margin-right: 0;
            padding-right: 0;
            z-index: 900;
        }
        .list-group-itemm {
            position: relative;
            display: block;
            padding: 0.25rem 1rem;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid #e7ebf3;
        }


    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الرئيسة </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/      ادارة العمالة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- row -->
    <div class="row">

        @if (session()->has('Add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('Add') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('edit'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('edit') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif
    </div>
    <div class="row">

    </div>
    <div class="card-body">
        <div class="panel-group1" id="accordion11">
            <div class="panel panel-default  mb-4">
                <div class="panel-heading1 bg-primary " style="background-color: #3a4d67  !important;">
                    <h4 class="panel-title1">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFour1" aria-expanded="false">فلاتر البحث<i class="fe fe-arrow-left ml-2"></i></a>
                    </h4>
                </div>
                <form action="/Search_maids" method="POST" role="search" autocomplete="off">
                    {{ csrf_field() }}
                <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                    <div class="panel-body border">
                        {{-- الصف الاول --}}
                        <div class="row">


                            <div class="col-lg-3">
                                <label> رقم العامل</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text" name="emp_num">
                                </div><!-- input-group -->
                            </div>
                            <div class="col-lg-3">
                                <label> الإسم عربي</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                </div><!-- input-group -->
                            </div>
                            <div class="col-lg-3">
                                <label> الإسم إنجليزى</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                </div><!-- input-group -->
                            </div>





                            <div class="col-lg-3">
                                <label> الجنسية</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id"   >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> 1 يوم </option>
                                        <option value="بانتظارالتوجيه">  2 يوم</option>
                                        <option value="بانتظار التواصل معه"> 3 يوم </option>
                                        <option value="تم التواصل معه">   7 يوم </option>
                                        <option value="طلب زيارة منزلية"> 15 يوم</option>
                                        <option value="طلب  معاودة الاتصال في وقت لاحق">   شهر   </option>


                                    </select>

                                </div><!-- input-group -->
                            </div>


                        </div>
                        {{--  نهاية الاول --}}
                        {{-- الصف الثاني --}}
                        <div class="row">
                            <div class="col-lg-3">
                                <label> الوظيفة
                                </label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id"  >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> الكل </option>
                                        <option value="بانتظارالتوجيه"> عاملة منزلية  </option>
                                        <option value="بانتظار التواصل معه">  سائق خاص </option>


                                    </select>

                                </div><!-- input-group -->
                            </div>





                            <div class="col-lg-3">
                                <label> الوكلاء</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id"   >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> الكل </option>
                                        <option value="بانتظارالتوجيه">  بلجيكا</option>
                                        <option value="بانتظار التواصل معه"> الفلبين </option>
                                        <option value="تم التواصل معه">   اوغندا</option>
                                        <option value="طلب زيارة منزلية"> اثيوبيا</option>
                                        <option value="طلب  معاودة الاتصال في وقت لاحق">   مصر   </option>
                                        <option value="محظور"> السودان</option>
                                        ةغ
                                    </select>

                                </div><!-- input-group -->
                            </div>

                            <div class="col-lg-3">
                                <label>موظف</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id" >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> 1 يوم </option>
                                        <option value="بانتظارالتوجيه">  2 يوم</option>
                                        <option value="بانتظار التواصل معه"> 3 يوم </option>
                                        <option value="تم التواصل معه">   7 يوم </option>
                                        <option value="طلب زيارة منزلية"> 15 يوم</option>
                                        <option value="طلب  معاودة الاتصال في وقت لاحق">   شهر   </option>


                                    </select>

                                </div><!-- input-group -->
                            </div>

                            <div class="col-lg-3">
                                <label>نوع العامل </label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id" >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> 1 يوم </option>
                                        <option value="بانتظارالتوجيه">  2 يوم</option>
                                        <option value="بانتظار التواصل معه"> 3 يوم </option>
                                        <option value="تم التواصل معه">   7 يوم </option>
                                        <option value="طلب زيارة منزلية"> 15 يوم</option>
                                        <option value="طلب  معاودة الاتصال في وقت لاحق">   شهر   </option>


                                    </select>

                                </div><!-- input-group -->
                            </div>


                        </div>
                        {{--  نهاية الثاني --}}
                        {{-- الصف الثالث --}}
                        <div class="row">
                            <div class="col-lg-3">
                                <label> الحذف
                                </label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id" >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> الكل </option>
                                        <option value="بانتظارالتوجيه"> عاملة منزلية  </option>
                                        <option value="بانتظار التواصل معه">  سائق خاص </option>


                                    </select>

                                </div><!-- input-group -->
                            </div>
                            <div class="col-lg-3">
                                <label> رقم جواز السفر</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                </div><!-- input-group -->
                            </div>





                            <div class="col-lg-3">
                                <label> VIP</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id"   >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> الكل </option>
                                        <option value="بانتظارالتوجيه">  بلجيكا</option>
                                        <option value="بانتظار التواصل معه"> الفلبين </option>
                                        <option value="تم التواصل معه">   اوغندا</option>
                                        <option value="طلب زيارة منزلية"> اثيوبيا</option>
                                        <option value="طلب  معاودة الاتصال في وقت لاحق">   مصر   </option>
                                        <option value="محظور"> السودان</option>
                                        ةغ
                                    </select>

                                </div><!-- input-group -->
                            </div>
                            <div class="col-lg-3">
                                <label> رقم الهوية</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                </div><!-- input-group -->
                            </div>


                        </div>
                        {{--  نهاية الثالث --}}
                        {{-- الصف الرابع --}}
                        <div class="row">
                            <div class="col-lg-3">
                                <label> رقم التأشيرة</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                </div><!-- input-group -->
                            </div>
                            <div class="col-lg-3">
                                <label>

                                    تاريخ التأشيرة</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="date">
                                </div><!-- input-group -->
                            </div>

                            <div class="col-lg-3">
                                <label> رقم الرحلة</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                </div><!-- input-group -->
                            </div>
                            <div class="col-lg-3">
                                <label> العمر</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                </div><!-- input-group -->
                            </div>






                        </div>
                        {{--  نهاية الرابع --}}
                        {{-- الصف الخامس --}}
                        <div class="row">
                            <div class="col-lg-3">
                                <label> جنس العامل/ه
                                </label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id"  >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> الكل </option>
                                        <option value="بانتظارالتوجيه"> عاملة منزلية  </option>
                                        <option value="بانتظار التواصل معه">  سائق خاص </option>


                                    </select>

                                </div><!-- input-group -->
                            </div>

                            <div class="col-lg-3">
                                <label> جوال / الهاتف</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                </div><!-- input-group -->
                            </div>
                            <div class="col-lg-3">
                                <label> الخطوط الناقلة</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                </div><!-- input-group -->
                            </div>
                            <div class="col-lg-3">
                                <label> تاريخ الوصول</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="date">
                                </div><!-- input-group -->
                            </div>








                        </div>
                        {{--  نهاية الخامس --}}
                        {{-- الصف السادس --}}
                        <div class="row">
                            <div class="col-lg-3">
                                <label> تاريخ الانشاء
                                </label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="date">
                                </div><!-- input-group -->
                            </div>





                            <div class="col-lg-3">
                                <label>

                                    سبق لة العمل</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id" >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> الكل </option>
                                        <option value="بانتظارالتوجيه">  بلجيكا</option>
                                        <option value="بانتظار التواصل معه"> الفلبين </option>
                                        <option value="تم التواصل معه">   اوغندا</option>
                                        <option value="طلب زيارة منزلية"> اثيوبيا</option>
                                        <option value="طلب  معاودة الاتصال في وقت لاحق">   مصر   </option>
                                        <option value="محظور"> السودان</option>
                                        ةغ
                                    </select>

                                </div><!-- input-group -->
                            </div>

                            <div class="col-lg-3">
                                <label>  حالة اضافة العامل</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id" >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> 1 يوم </option>
                                        <option value="بانتظارالتوجيه">  2 يوم</option>
                                        <option value="بانتظار التواصل معه"> 3 يوم </option>
                                        <option value="تم التواصل معه">   7 يوم </option>
                                        <option value="طلب زيارة منزلية"> 15 يوم</option>
                                        <option value="طلب  معاودة الاتصال في وقت لاحق">   شهر   </option>


                                    </select>

                                </div><!-- input-group -->
                            </div>

                            <div class="col-lg-3">
                                <label>  رقم الصندوق</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select class="form-control select2" name="status_id" >


                                        <option value="" selected>

                                        </option>
                                        <option value="الكل"> 1 يوم </option>
                                        <option value="بانتظارالتوجيه">  2 يوم</option>
                                        <option value="بانتظار التواصل معه"> 3 يوم </option>
                                        <option value="تم التواصل معه">   7 يوم </option>
                                        <option value="طلب زيارة منزلية"> 15 يوم</option>
                                        <option value="طلب  معاودة الاتصال في وقت لاحق">   شهر   </option>


                                    </select>

                                </div><!-- input-group -->
                            </div>


                        </div>
                        {{--  نهاية السادس --}}






                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"> بحث</button>
                            &nbsp;	&nbsp;	&nbsp;

                            <button type="button" onclick="location.href='/maids'" class="btn btn-dark">الغاء </button>





                        </div>









                        </div>

                        <div class="row">





                        </div>

                    </div>
                </form>
                </div>
            </div>

        </div>
        <div class="example">
            <div class="row row-xs wd-xl-80p">
                <div class="col-sm-6 col-md-2">
                    <button class="btn btn-primary-gradient btn-block">



                        <i
                            class="fas fa-print"></i>&nbsp; طباعة</a>

                    </button>
                </div>


                <div class="col-sm-6 col-md-2">
                    <form action="maids/create">
                        <button class="btn btn-info-gradient btn-block">

                            <i
                                class="fas fa-plus"></i>&nbsp;  اضافة العمالة

                        </button>
                    </form>
                </div>
                <div class="col-sm-6 col-md-2">
                    <form action="agents/aa">
                        <button class="btn btn-info-gradient btn-block">

                            <i
                                class="fas fa-plus"></i>&nbsp;    رواتب العمالة
                        </button>
                    </form>
                </div>
                <div class="col-sm-6 col-md-2">
                    <button class="btn btn-primary-gradient btn-block">
                        <i
                            class="fas fa-plus-circle"></i>&nbsp;  اضافة عمالة من ملف </a>
                    </button>
                </div>
                <div class="col-sm-6 col-md-2">
                    <button class="btn btn-info-gradient btn-block">
                        <i
                            class="fas fa-chalkboard-teacher"></i>&nbsp; البحث السريع   </a>

                    </button>
                </div>


            </div>
        </div>
        <div class="example">
            <div class="row row-xs wd-xl-80p">



                <div class="col-sm-6 col-md-2">
                    <form action="/maids">
                        <button class="btn btn-info btn-block">
                            <i
                                class="fas fa-file"></i>&nbsp;  الكل

                        </button>
                    </form>
                </div>
                <div class="col-sm-6 col-md-2">
                    <form action="">
                        <button class="btn btn-success btn-block">

                            <i
                                class="fas fa-file"></i>&nbsp;     عمالة في التجربة

                        </button>
                    </form>
                </div>
                <div class="col-sm-6 col-md-2">
                    <form action="">
                        <button class="btn btn-success btn-block">

                            <i
                                class="fas fa-file"></i>&nbsp;     عمالة الاختيار

                        </button>
                    </form>
                </div>
                <div class="col-sm-6 col-md-2">
                    <form action="">
                        <button class="btn btn-success btn-block">

                            <i
                                class="fas fa-file"></i>&nbsp;     عمالة تحت الاجراء

                        </button>
                    </form>
                </div>
                <div class="col-sm-6 col-md-2">
                    <form action="">
                        <button class="btn btn-success btn-block">

                            <i
                                class="fas fa-file"></i>&nbsp;  خروج نهائي

                        </button>
                    </form>
                </div>
                <div class="col-sm-6 col-md-2">
                    <form action="">
                        <button class="btn btn-success btn-block">

                            <i
                                class="fas fa-file"></i>&nbsp;  داخل المملكة

                        </button>
                    </form>
                </div>




            </div>
        </div>


    </div>



    <br>   <br>   <br>
    <div class="col-12">
        <div class="card card-primary">

            <div class="card-body text-primary">
                {{ $maids->links() }}

            </div>
            <div class="text-danger   text-left ">
                <p class="">   {{$maids_count2}}</p>

        </div>
    </div>

@foreach($maids as $x)
    <!--  العاملة كرت -->
    <div class="col-12 ">
        <div class="card card-primary">
            <div class="card-header pb-0">
                <h5 class="card-title mb-0 pb-0"> بيانات العاملة</h5>
            </div>
            <div class="card-body text-primary">
                <div class="row">
                    <ul class="branchnameList">
                        <li>
                           <a class="btn-danger btn-sm disabled "> {{$x->emp_num}}</a>   /  شركة الانجاز المعتمد للاستقدام</li>
                        <li class="bg-inverse">
                            {{$x->emp_wakel}}
                        </li>
                        <li class="bg-success">
                            نجران - الإيواء
                        </li>
                    </ul>
                    <div class="col-md-2">
                        <img src="Attachments_maids/{{$x->id}}/{{$x->file_name}}" width="200px" height="200px">
                    </div>
                    <div class="col-md-2">
                        <a href="maidsDetails/{{$x->id}} ">
                            <p style="font-size:9px;">اسم العامل </p>
                            <h2 class="m-t-0 m-b-0 ">   {{$x->emp_name_en}}  </h2>
                            <h6 class="m-t-0 m-b-0 text-info"> {{$x->emp_name_en}} </h6>
                            <p class="m-t-5">
                                <span class="fa fa-flag text-info m-r-5 m-t-5"></span> <b>{{$x->emp_nash}}</b>
                                <span class="fa fa-id-card text-info m-r-5 m-l-5"></span> <b>{{$x->emp_passport}}</b>
                            </p>
                            <p class="m-t-5">
                                <span class="fa fa-home text-info m-r-5 m-t-5"></span> <b>   نجران - الإيواء</b>
                            </p>
                            <p class="m-t-5">

                                <span class="fa fa-check m-r-5 m-t-5"></span> <b class="text-success">تشغيل مدة</b>
                            </p>

                            <p class="m-t-5">
                            </p>

                            <p class="m-t-5">
                                <span>اسم الوكيل</span> <b class="text-success font-14"> {{$x->emp_wakel}}</b>
                            </p>
                            <p class="m-t-5">
                                <span>تم الانشاء بواسطة</span> <b class="text-success font-14">{{$x->Created_by}} </b>
                            </p>

                        </a>
                    </div>
                    <div class="col-md-2">
                        <ul class="list-group">
                            <li>
                                <h5>جنس العامل/ه</h5>
                                <p>
                                    {{$x->emp_gender}}

                                </p></li>
                            <li>
                                <h5>العمر</h5>
                                <p>

                                    {{$x->age}}
                                </p>
                            </li>
                            <li>
                                <h5>الديانة</h5>
                                <p>
                                    {{$x->emp_relegon}}
                                </p>
                            </li>
                            <li>
                                <h5>الحالة الاجتماعية</h5>
                                <p> {{$x->emp_m_status}}</p>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-2">
                        <ul class="list-group">
                            <li>
                                <h5>الوظيفة</h5>
                                <p>{{$x->emp_work}} </p>
                            </li>
                            <li>
                                <h5>سبق لة العمل</h5>
                                <p>
                                    {{$x->emp_is_work}}
                                </p>
                            </li>
                            <li>
                                <h5>خبرات سابقة</h5>
                                <p></p>
                            </li>

                            <li>
                                <h5>تاريخ السيرة الذاتيه</h5>
                                <p> {{$x->created_at}}</p>
                            </li>

                            <li class="list-group-item">
                                <a href="#ApplicantStatusUpdate" onclick="ApplicantStatusUpdate(131546)">

                                <span>
                                    تحديث حالة العامل
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <ul class="list-group control m-b-0 user-list">

                            <li class="list-group-itemm">
                                <input data-plugin="switchery" data-color="#dc3545" data-size="small" id="DisableVIP" name="DisableVIP" onchange="ChangeVIP($(this).is(':checked'),  '131546');" type="checkbox" value="true" data-switchery="true" style="display: none;"><span class="switchery switchery-small" style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;"><small style="left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span><input name="DisableVIP" type="hidden" value="false">                                                                            <span class="VIPText_131546"> VIP</span>
                            </li>
                            <li class="list-group-itemm" titel="يجب ان يكون العمال داخل السعودية">
                                <input data-plugin="switchery" data-color="#28a745" data-size="small" data-val="true" data-val-required="The WantToTransferServices field is required." disabled="True" id="WantToTransferServices" name="WantToTransferServices" titel="يجب ان يكون العمال داخل السعودية" type="checkbox" value="true" data-switchery="true" readonly="" style="display: none;"><span class="switchery switchery-small" style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s; opacity: 0.5;"><small style="left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span><input name="WantToTransferServices" type="hidden" value="false">                                    <span class="VIPText_131546"> ترغب فى النقل</span>

                            </li>
                            <li class="list-group-itemm" titel="يجب ان يكون العمال داخل السعودية">
                                <input data-plugin="switchery" data-color="#28a745" data-size="small" data-val="true" data-val-required="The WantToRent field is required." disabled="True" id="WantToRent" name="WantToRent" titel="يجب ان يكون العمال داخل السعودية" type="checkbox" value="true" data-switchery="true" readonly="" style="display: none;"><span class="switchery switchery-small" style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s; opacity: 0.5;"><small style="left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span><input name="WantToRent" type="hidden" value="false">                                    <span class="VIPText_131546"> ترغب فى التشغيل</span>
                            </li>





                            <li class="list-group-itemm">
                                <a onclick="alertMsg('سيتم عمل باك اوت للعامل','/ar-sa/Applicants/Addbackout/131546' )">
                                    <i class="fa fa-sort-numeric-asc m-r-5"></i>
                                    <span class="primary">إضــافة backout</span>
                                    <span class="label label-primary pull-right"></span>
                                </a>
                            </li>



                            <li class="list-group-itemm">
                                <a class="btn ripple btn-primary btn-sm" data-target="#upload_img" data-toggle="modal" href=""  data-id="{{ $x->id }}"   ">
                                    <i class="fa fa-eject m-r-5"></i>
                                    <span> رفع صور العامل</span>
                                </a>
                            </li>












                            <li class="list-group-itemm">
                                <a onclick="alertMsg('تاكيد خروج العامل من السكن','/ar-sa/housing/ExitApplicantToHousing/131546')" class="text-danger">
                                    <i class="fa fa-home m-r-5"></i>
                                    <span> خروج من الايواء</span>
                                </a>
                            </li>
                            <li class="list-group-itemm danger">
                                <a href="#custom-modal" class="text-danger" onclick="AddApplicantMovments(131546,'9',28)" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                    <i class="fa fa-sign-out m-r-5"></i>
                                    <span> خروج طوارئ</span>
                                </a>
                            </li>
                            <li class="list-group-itemm danger">
                                <a href="#custom-modal" class="text-danger" onclick="AddApplicantMovments(131546,'10',28)" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                    <i class="fa fa-sign-out m-r-5"></i>
                                    <span>تغير الايواء</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <ul class="list-group control m-b-0 user-list">
                            <li class="list-group-item">
                                <a href="#modalMedicalTest" onclick="EditAgentStatusHistory(131546,'MedicalTest')" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                    <i class="fa fa-user-md m-r-5"></i>
                                    <span>الفحص الطبي</span>
                                </a>
                            </li>
                            <li class="list-group-itemm text-danger">
                                <a href="#custom-modal" class="text-primary" onclick="AddApplicantMovments(131546,'3',28,'1')" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                    <i class="fa fa-heartbeat fa-1x m-r-5"></i>
                                    <span>مريض</span>
                                </a>
                            </li>
                            <li class="list-group-itemm danger">
                                <a href="#custom-modal" class="text-danger" onclick="AddApplicantMovments(131546,'2',28)" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                    <i class="fa fa-sign-out m-r-5"></i>
                                    <span> هروب العامل</span>
                                </a>
                            </li>
                            <li class="list-group-itemm text-danger">
                                <a href="#custom-modal" class="text-danger" onclick="AddApplicantMovments(131546,'4',28)" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                    <i class="fa fa-ban m-r-5"></i>
                                    <span> رفض العمل</span>
                                </a>
                            </li>
                            <li class="list-group-itemm text-danger">
                                <a href="#custom-modal" class="text-primary" onclick="AddApplicantMovments(131546,'6',28)" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                    <i class="fa fa-stop m-r-5"></i>
                                    <span> ايقاف مؤقت</span>
                                </a>
                            </li>
                            <li class="list-group-itemm text-danger">
                                <a href="#custom-modal" class="text-danger" onclick="AddApplicantMovments(131546,'7',28)" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                    <i class="fa fa-times m-r-5"></i>
                                    <span>خروج نهائى</span>
                                </a>
                            </li>
                        </ul>
                    </div>




                </div>
            </div>

        </div>
    </div>
    <!--  نهاية كرت العرض-->
@endforeach
    <div class="col-12">
        <div class="card card-primary">

            <div class="card-body text-primary ">
                {{ $maids->links() }}
            </div>

        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    <div class="modal" id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                  type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sections.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم القسم</label>
                            <input type="text" class="form-control" id="sections_name" name="sections_name">
                        </div>




                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="upload_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">رفع صور العمالة </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="maids_upload_img" method="post" autocomplete="off"  enctype="multipart/form-data">
                        {{ method_field('POST') }}
                        {{ csrf_field() }}
                        <div class="row">
                            <p class="text-danger">* صورة من جواز السفر </p><br>
                            <input type="text" name="id"  id="id"
                                   data-height="70" hidden />

                            <div class="col-sm-12 col-md-12">
                                <input type="file" name="passport_pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                       data-height="70" />
                            </div>

                            <p class="text-danger">*  صورة شخصية   </p>


                            <div class="col-sm-12 col-md-12">
                                <input type="file" name="profile" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                       data-height="70" />
                            </div>
                            <p class="text-danger">* صورة  كاملة للجسم </p>


                            <div class="col-sm-12 col-md-12">
                                <input type="file" name="full_pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                       data-height="70" />
                            </div>


                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>






        </div>
    </div>


    <!-- main-content closed -->
@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--- Internal Accordion Js -->
    <script src="{{URL::asset('assets/plugins/accordion/accordion.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/accordion.js')}}"></script>




    <script>
        $('#upload_img').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);


        })
    </script>



    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var sections_name = button.data('sections_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #sections_name').val(sections_name);
        })

    </script>
@endsection
