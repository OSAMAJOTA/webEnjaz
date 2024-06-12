@extends('layouts.master')
@section('title')
    عقود التشغيل
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

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
        .table th, .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #2e4583;
        }


    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/عقود التشغيل  </span>
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
    <!-- row -->
    <div class="row">

        @if (session()->has('add_comment'))
            <script>
                window.onload = function() {
                    notif({
                        msg: "تم اضافة ملاحظة بنجاح",
                        type: "success"
                    })
                }

            </script>



        @endif

            @if (session()->has('end_contract'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: "تم انهاء عقد التشغيل بنجاح",
                            type: "success"
                        })
                    }

                </script>



            @endif

            @if (session()->has('late_bonds'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: "تم سداد غرامة تأخير عقد التشغيل بنجاح",
                            type: "success"
                        })
                    }

                </script>



            @endif

            @if (session()->has('return_bonds'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: "تم استرداد  المبلغ للعميل  بنجاح",
                            type: "success"
                        })
                    }

                </script>



            @endif



            @if (session()->has('change_emp'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: "   تم تغير العاملة في العقد بنجاح",
                            type: "success"
                        })
                    }

                </script>

            @endif

        @if (session()->has('chang_sadad'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: "تم تحديث تاريخ السداد بنجاح",
                            type: "success"
                        })
                    }

                </script>

            @endif





                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card overflow-hidden">

                                    <div class="card-body">
                                        <div class="panel-group1" id="accordion11">
                                            <div class="panel panel-default  mb-4">
                                                <div class="panel-heading1 bg-primary ">
                                                    <h4 class="panel-title1">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFour1" aria-expanded="false">فلاتر البحث<i class="fe fe-arrow-left ml-2"></i></a>
                                                    </h4>
                                                </div>
                                                <form action="/serach_rent" method="POST" role="search" autocomplete="off">
                                                    {{ csrf_field() }}
                                                    <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                        <div class="panel-body border">

                                                            {{-- الصف الاول --}}
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label> رقم العقد </label>
                                                                    <div class="input-group sm ">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div><input aria-describedby="basic-addon1"  class="form-control" placeholder="" type="text" name="cont_num">
                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label>الإسم عربي</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="agent_name" placeholder="" type="text">
                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> حالة العقد</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name="cont_status"   >


                                                                            <option value="" selected>
                                                                              <option value="ساري" > ساري</option>
                                                                              <option value="منتهي" >منتهي</option>



                                                                        </select>
                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label>جوال / الهاتف</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text" name="agent_phone">
                                                                    </div><!-- input-group -->
                                                                </div>

                                                            </div>
                                                            {{-- الصف الثاني --}}

                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label> البريد الالكترونى</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text" name="agent_email">

                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> رقم الهوية
                                                                    </label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text" name="agent_id">

                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> تاريخ الانشاء</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="date" name="create_date" id="range">

                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> الجنسية</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name="nash"   >
                                                                            <option value="" selected>
                                                                            @foreach($nationalities as $nationalities)
                                                                                <option value="{{$nationalities->nationalities_name}}" >{{$nationalities->nationalities_name}}</option>
                                                                            @endforeach



                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>

                                                            </div>

                                                            {{-- الصف الثالث --}}
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label>الوظيفة</label>
                                                                    <div class="input-group sm ">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div>  <select class="form-control select2" name="work"   >
                                                                            <option value="" selected>
                                                                            @foreach($careers as $xx)
                                                                                <option value="{{$xx->careers_name}}" >{{$xx->careers_name}}</option>
                                                                            @endforeach



                                                                        </select>
                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label>تم الانشاء بواسطة</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div>

                                                                        <select class="form-control select2" name="create_by"   >
                                                                            <option value="" selected>
                                                                            @foreach($employees as $employees)
                                                                                <option value="{{$employees->employees_name}}" >{{$employees->employees_name}}</option>
                                                                            @endforeach



                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> ينتهي بعد</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="ادخل عدد الايام " type="text" name="end_after">
                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> النوع</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name="typ"   >


                                                                            <option value="" >
                                                                            </option>
                                                                            <option value="مدة"> مدة </option>


                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>

                                                            </div>
                                                            {{-- الصف الرابع --}}

                                                            <div class="row">


                                                                <div class="col-lg-3">
                                                                    <label> تاريخ نهاية العقد
                                                                    </label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>

                                                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="date" name="end_typ">

                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> الحالة المالية</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name="mony_status"   >


                                                                            <option value="" selected>

                                                                            </option>
                                                                            <option value="الكل"> الكل </option>
                                                                            <option value="1"> متبقي علي العقد </option>
                                                                            <option value="2">  للعميل مبلغ </option>


                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>



                                                                <div class="col-lg-3">
                                                                    <label> حالة اختيار العمالة</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name="maid_status"   >


                                                                            <option value="" >
                                                                            </option>
                                                                            <option value="1">لم يتم اختيار عاملة  </option>
                                                                            <option value="2">  تم اختيار عاملة</option>

                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> تاريخ نهاية العقد
                                                                    </label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder=""  type="date" name="end_date">

                                                                    </div><!-- input-group -->
                                                                </div>
                                                            </div>
                                                            {{-- الصف الخامس --}}



                                                            <div class="d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-primary"> بحث</button>
                                                                &nbsp;	&nbsp;	&nbsp;

                                                                <button type="button" onclick="location.href='/rent'" class="btn btn-dark">الغاء </button>





                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                        <div class="example">
                                            <div class="row row-xs wd-xl-80p">
                                                <div class="col-sm-6 col-md-2">
                                                    <form action="/rent">
                                                        <button class="btn btn-info btn-block">
                                                            <i
                                                                class="fas fa-file"></i>&nbsp;  الكل

                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                   @if(@isset($contract_count))

                                                        <form method="POST" action="/export_contract">
                                                            @csrf
                                                            <input name="contract" value="{{json_encode($contract_count)}}" hidden="hidden">
                                                            <button type="submit" class="btn btn-primary-gradient btn-block"><i class="fas fa-print"></i>&nbsp; طباعة</button>
                                                        </form>
                                                   @endif


                                                </div>


                                                <div class="col-sm-6 col-md-2">
                                                    <form action="/agents">
                                                        <button class="btn btn-info-gradient btn-block">

                                                            <i
                                                                class="fas fa-plus"></i>&nbsp;  اضافة عقد تشغيل

                                                        </button>
                                                    </form>
                                                </div>





                                            </div>
                                        </div>

                                            <div class="card card-primary">

                                                <div class="card-body text-primary ">
                                                    {{ $contract->links() }}
                                                   <div class="text-danger   text-left ">
                                                        <h7>عدد العقود</h7>
                                                        <h3 class="">  <b>{{$contract_count2}}</b> </h3>


                                                    </div>

                                                </div>
                                            </div>




        <!-- row closed -->
    </div>

    <!-- row closed -->
    </div>
                                <!-- كرت العقد-->
                                <div class="col-xl-12">

                                    @foreach($contract as $x)

                                        <div class="card">




                                                <?php
                                                $start =  Carbon\Carbon::parse($x->end_date);
                                                $now = Carbon\Carbon::now();


                                                $days_count = $start->diffInDays($now);


                                                ?>
                                            @if($start<$now or $x->status=='منتهي' )
                                                <div class="card-body" style="background-color: #ffd4d4a8">
                                            @elseif($days_count <= 3 )
                                                <div class="card-body" style="background-color: #f5ebcfa8">
                                                    @else
                                                        <div class="card-body" >
                                                            @endif

                                                            <div class="panel-body table-responsive">
                                                                <ul class="branchnameList">
                                                                    <li>
                                                                        <i class="fa-duotone fa-code-branch"></i>
                                                                        {{$x->companys_name }}
                                                                    </li>

                                                                    @if($start<$now or $x->status=='منتهي')
                                                                        <li class="bg-danger">
                                                                            <i class="fa-solid fa-timer"></i>
                                                                            فترة العقد انتهت
                                                                        </li>

                                                                    @endif



                                                                    <li class="bg-success">

                                                                        {{$x->sadad_typ }}                </li>
                                                                </ul>


                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <div class="text-center">

                                                                                    <p style="font-size:15px;">تم الانشاء بواسطة </p>
                                                                                    <h4 class="m-t-0">
                                                                                        {{$x->Created_by }}
                                                                                    </h4>
                                                                                    <a href="/contract_detils/{{$x->id }}">
                                                                                        <h1 class="text-custom font-60">   {{$x->id }}</h1>
                                                                                    </a>
                                                                                    <h6> {{$x->created_at }}</h6>


                                                                                    <div class="text-center">
                                                                                        @if($x->status=='ساري')
                                                                                            <h1 class="text-success" style=" color: #075e15 !important;
    font-weight: bold;">{{$x->status }}</h1>
                                                                                        @elseif($x->status=='منتهي')
                                                                                            <h1 class="text-success" style=" color: #5b0f0f !important; font-weight: bold;">{{$x->status }}</h1>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-7">
                                                                                <a href="agent_details/{{$x->agent_id}}">
                                                                                    <h5 class="m-t-0 header-title-small"  style=" color:black;"><b>بيانات العميل</b> </h5>
                                                                                    <h4 class="m-t-0 m-b-0"> {{$x->agents_name }}    </h4>
                                                                                </a>
                                                                                <a href="https://web.whatsapp.com/send?phone=+966{{$x->agent_phone1 }}" target="_blank"><span class="fab fa-whatsapp text-info m-r-5 m-t-5"></span> <b>{{$x->agent_phone1 }}</b></a>
                                                                                <p> <span class="fa fa-id-card-o m-r-5 m-l-5"></span>{{$x->id_num }}</p>
                                                                            </div>

                                                                        </div>


                                                                    </div>

                                                                    <div class="col-md-5">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <h4 class="m-t-0 header-title-small">
                                                                                    <b>
                                                                                        الجنسية          /     {{$x->typ }}
                                                                                    </b>
                                                                                </h4>

                                                                                <p class="m-t-5 m-b-5">{{$x->nash }} /  {{$x->WORK }} <small class="text-success m-r-15"><b>{{$x->Duration }} </b></small></p>

                                                                                <div class="row hideApplicant">
                                                                                    <div class="col-md-6">
                                                                                        <p class="text-info">تاريخ بداية العقد</p><b>{{$x->start_date }}</b>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <p class="text-info">تاريخ نهاية العقد</p><b>{{$x->end_date }}</b>
                                                                                    </div>
                                                                                </div>



                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <h4 class="m-t-0 header-title-small"><b>الاجمالى</b> </h4>
                                                                                <h1 class="text-inverse  " style="font-size:20px; color:#0162e8;"> <b>{{$x->tot }}</b></h1>
                                                                                <table class="table m-t-20 small">
                                                                                    <tbody><tr>
                                                                                        <td>العرض</td>
                                                                                        <td>{{$x->cost }}</td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>مبلغ ضريبة القيمة المضافة</td>
                                                                                        <td>{{$x->vat_cost }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>القيمة المتبقية شاملة الضريبة</td>
                                                                                        <td class="text-danger"><b>{{$x->rest }}</b></td>
                                                                                    </tr>
                                                                                    @if($x->man_discount>0)
                                                                                        <tr>
                                                                                            <td>خصم مدير </td>
                                                                                            <td class="text-danger"><b>{{$x->man_discount }}</b></td>
                                                                                        </tr>
                                                                                    @endif
                                                                                    @if($x->rest>0)
                                                                                        <tr>


                                                                                            <td>    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                                                       data-id="{{ $x->id }}" data-exp_sadad="{{ $x->exp_sadad }}"
                                                                                                       data-toggle="modal"
                                                                                                       href="#chnange_exp" title="تعديل">
                                                                                                    <i class="fa fa-edit"></i>
                                                                                                    <span></span>
                                                                                                </a>

                                                                                                تاريخ السداد المتوقع



                                                                                            </td>
                                                                                            <td class="text-danger"><b>{{$x->exp_sadad }}</b></td>
                                                                                        </tr>
                                                                                    @endif
                                                                                    @if($x->status=='ساري')
                                                                                        <tr>

                                                                                            <td>
                                                                                                <a href="#Open_ManagerDiscount" onclick="Open_ManagerDiscount(15101,5585,600.3,600.3,0);" title="اضافة خصم مدير على العقد" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                                                                                    <i class="fa fa-plus m-r-5"></i>
                                                                                                    <span> اضافة خصم مدير</span>
                                                                                                </a></td>

                                                                                        </tr>
                                                                                    @endif
                                                                                    </tbody></table>


                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 hideApplicant">
                                                                        <h4 class="m-t-0 header-title-small"><b>ادارة العمالة</b> </h4>

                                                                        <p> رقم العاملة : <b>
                                                                                @if($x->status=='ساري')
                                                                                    <a href="maidsDetails/{{$x->maids_id }}">
                                                                                        <h5 class="text-custom font-60">      {{$x->emp_num }}</h5>
                                                                                    </a>
                                                                                @endif


                                                                            </b></p>
                                                                        @if($x->status=='ساري')
                                                                            <h4 class="m-t-0 m-b-0"><a href="maidsDetails/{{$x->maids_id }}" title="">{{$x->emp_name }}</a></h4>
                                                                        @endif
                                                                        <span class="fa fa-id-card-o m-r-5 m-l-5"></span>                    <br>
                                                                        <ul class="list-group control m-b-2 user-list">

                                                                            <li class="list-group-itemm">
                                                                                <a class="modal-effect  btn btn-primary btn-sm"   data-effect="effect-scale" data-toggle="modal" href="#modaldemo1"   data-id="{{ $x->id }}" data-sections_name="{{ $x->emp_name }}"> <i
                                                                                        class="fas fa-plus"></i>&nbsp; اضافة ملاحظه</a>&nbsp;&nbsp;&nbsp;&nbsp; <span class="btn btn-sm btn-success "><a style="color: white" href="/contract_detils/{{$x->id }}/#comment">{{\App\contract_comment::where('contract_id', $x->id)->count()}}</a></span>
                                                                            </li>
                                                                            <li class="list-group-itemm">
                                                                                <a class="modal-effect  btn btn-primary btn-sm" data-effect="effect-scale" data-toggle="modal" href="#modaldemo2"   data-id="{{ $x->id }}" data-sections_name="{{ $x->emp_name }}"> <i
                                                                                        class="fas fa-plus"></i>&nbsp; اضافة شكوى</a>
                                                                            </li>




                                                                            <!--   ***********************************************************-->
                                                                            <div class="col-md-9 order-md-1">
                                                                                <form method="post" action="{{route('generate-qr-image')}}">
                                                                                    @csrf
                                                                                    @if($errors->any())
                                                                                        <div class="alert alert-danger">
                                                                                            <ul class="mb-0">
                                                                                                @foreach ($errors->all() as $error)
                                                                                                    <li>{{ $error }}</li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </div>
                                                                                    @endif
                                                                                    <div id="print_vat" style="display: none">
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="seller_name">Seller Name</label>
                                                                                            <input class="form-control form-control-lg" type="text" id="seller_name" name="seller_name" value="شركة الانجاز المعتمد للاستقدام">
                                                                                            <input class="form-control form-control-lg" type="text" id="con_id" name="con_id" value="{{$x->id}}">
                                                                                            <p class="form-text">Example: My Company</p>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="vat_number">VAT Number</label>
                                                                                            <input class="form-control form-control-lg" type="text" id="vat_number" name="vat_number" value="300617567500003">
                                                                                            <p class="form-text"><small>Example: 310000000000000</small></p>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="invoice_date">Date and Time</label>
                                                                                            <input class="form-control form-control-lg" type="datetime" id="invoice_date" name="invoice_date" value="{{ $x->created_at  }}">
                                                                                            <p class="form-text"><small>Example: 2022-12-15 14:41:15</small></p>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="total_amount">Total Amount (with VAT)</label>
                                                                                            <input class="form-control form-control-lg" type="text" id="total_amount" name="total_amount" value="{{  $x->tot  }}">
                                                                                            <p class="form-text"><small>Example: 2000.00</small></p>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="vat_amount">VAT Amount</label>
                                                                                            <input class="form-control form-control-lg" type="text" id="vat_amount" name="vat_amount" value="{{  $x->vat_cost }}">
                                                                                            <p class="form-text"><small>Example: 300.00</small></p>
                                                                                        </div>
                                                                                        <h5 class="card-title mb-3 mt-4">Options</h5>
                                                                                        <div class="ms-4 mb-3">
                                                                                            <div class="mb-3">
                                                                                                <input class="form-check-input" type="checkbox" id="qr_logo" name="qr_logo" {{ old('qr_logo') == 'on' ? 'checked' : '' }}>
                                                                                                <label class="form-check-label" for="qr_logo">Add an image in the center of the QR Code</label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="radio" name="qr_options" id="option1" value="download" >
                                                                                                <label class="form-check-label" for="option1">
                                                                                                    Download QR Code image
                                                                                                </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="radio" name="qr_options" id="option2" value="store">
                                                                                                <label class="form-check-label" for="option2">
                                                                                                    Save QR Code image to server
                                                                                                </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="radio" name="qr_options" id="option3" value="pdf" checked>
                                                                                                <label class="form-check-label" for="option3">
                                                                                                    Generate PDF with QR Code image
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <ul class="list-group control m-b-2 user-list">
                                                                                        <li class="list-group-itemm">
                                                                                            <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-file-pdf"></i>
                                                                                                <span> طباعة الفاتورة </span></button>
                                                                                        </li>
                                                                                    </ul>
                                                                                </form>
                                                                            </div>
                                                                            <!--   ***********************************************************-->

                                                                            <li class="list-group-itemm"  style="border-right:2px solid #00ff21;">
                                                                                <a href="/print_cont/{{$x->id }}" class="on-default edit-row" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">
                                                                                    <i class="fa fa-print"></i>
                                                                                    <span>طباعة العقد</span>
                                                                                </a>
                                                                            </li>




                                                                        </ul>

                                                                    </div>
                                                                    <!-- بداية العمود الاخير-->
                                                                    @if($x->status=='ساري')
                                                                        <div class="col-md-2 hideApplicant">

                                                                            <ul class="list-group control m-b-0 user-list">






                                                                                <li class="list-group-itemm">
                                                                                    <a onclick="StopContract(15101);" class="on-default edit-row" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">
                                                                                        <i class="fa-duotone fa-hand text-danger"></i>
                                                                                        <span>ايقاف العقد</span>
                                                                                    </a>
                                                                                </li>

                                                                                <li class="list-group-itemm liRenewContract" style="border-right:2px solid #ff6a00;">
                                                                                    <a onclick="RentContract.GetRenew(15101);">
                                                                                        <i class="fa fa-user-plus"></i>
                                                                                        <span>تجديد العقد</span>
                                                                                    </a>
                                                                                </li>






                                                                                <li class="list-group-itemm">


                                                                                    @if($x->emp_name=='')
                                                                                        <a class="modal-effect  btn btn-danger btn-sm"   data-effect="effect-scale" data-toggle="modal" href="#modaldemo3"   data-id="{{ $x->id }}" data-emp_name="{{ $x->emp_name }}" data-emp_num="{{ $x->emp_num }}" data-maids_id="{{ $x->maids_id }}"   >


                                                                                            <i class="fa fa-user-times m-r-5"></i>
                                                                                            <span>اضافة عاملة للعقد</span> </a>&nbsp;
                                                                                    @else
                                                                                        <a class="modal-effect  btn btn-primary btn-sm"   data-effect="effect-scale" data-toggle="modal" href="#modaldemo3"   data-id="{{ $x->id }}" data-emp_name="{{ $x->emp_name }}" data-emp_num="{{ $x->emp_num }}" data-maids_id="{{ $x->maids_id }}"   >


                                                                                            <i class="fa fa-user-times m-r-5"></i>
                                                                                            <span> انهاء خدمة العامل</span> </a>&nbsp;
                                                                                    @endif
                                                                                </li>
                                                                                <li class="list-group-itemm">
                                                                                    <a href="/rentupdate/{{$x->id}}" class="on-default edit-row" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">
                                                                                        <i class="fa fa-edit"></i>
                                                                                        <span>تعديل</span>
                                                                                    </a>
                                                                                </li>

                                                                                <li class="list-group-itemm">
                                                                                    <a class="modal-effect  btn btn-danger btn-sm"   data-effect="effect-scale" data-toggle="modal" href="#end_contract"   data-id="{{ $x->id }}" data-end_contract_date="{{ $x->end_date }}"  data-cost="{{ $x->cost }}" data-countss="{{ $x->countss }}" data-maid_id="{{ $x->maids_id }}"  >



                                                                                        <span>انهاء العقد</span> </a>&nbsp;
                                                                                </li>

                                                                            </ul>
                                                                            <br>




                                                                                <?php
                                                                                $start =  Carbon\Carbon::parse($x->end_date);
                                                                                $now = Carbon\Carbon::now();


                                                                                $days_count = $start->diffInDays($now);


                                                                                ?>


                                                                            @if($start>$now)
                                                                                <h4 class="m-t-0 header-title-small text-danger"><b>الايام المتبقية</b> </h4><br>
                                                                                <div class="d-flex justify-content-center">
                                                                                    <img src="assets/timer.png" width="25px" height="25px">
                                                                                    <h1 class="text"><b>
                                                                                            <span class="text-info">  {{$days_count+1}}</span>
                                                                                            @else
                                                                                                <h4 class="m-t-0 header-title-small text-danger"><b>الايام المتأخرة</b> </h4><br>
                                                                                                <div class="d-flex justify-content-center">
                                                                                                    <img src="assets/timer.png" width="25px" height="25px">
                                                                                                    <h1 class="text"><b>
                                                                                                            <span class="text-danger">   {{$days_count}}</span>
                                                                                                            @endif

                                                                                                        </b></h1>

                                                                                                </div>


                                                                                </div>
                                                                            @elseif($x->status=='منتهي')
                                                                                <div class="col-md-2 hideApplicant">

                                                                                    <p class="text-info font-bold">تم انهاء العقد</p>
                                                                                    @if($x->late_days>0 and $x->late_cost>0 )
                                                                                        <a class="modal-effect  btn btn-warning btn-sm"   data-effect="effect-scale" data-toggle="modal" href="#penalty"   data-id="{{ $x->id }}" data-late_days="{{ $x->late_days }}" data-tot="{{ $x->tot }}" data-countss="{{ $x->countss }}"  data-late_cost="{{ $x->late_cost }}" data-day_cost="{{ $x->day_cost }} " data-agents_name="{{ $x->agents_name }}"  >


                                                                                            <i class="fa fa-cash-register m-r-5"></i>
                                                                                            <span>دفع غرامة التأخير</span> </a>&nbsp;
                                                                                    @endif
                                                                                    @if($x->remaining_days>0 and $x->return_cost>0 )
                                                                                        <a class="modal-effect  btn btn-info btn-sm"   data-effect="effect-scale" data-toggle="modal" href="#return"   data-id="{{ $x->id }}" data-remaining_days="{{ $x->remaining_days }}" data-tot="{{ $x->tot }}" data-countss="{{ $x->countss }}"  data-late_cost="{{ $x->late_cost }}" data-day_cost="{{ $x->day_cost }} " data-agents_name="{{ $x->agents_name }}" data-return_cost="{{ $x->return_cost }}" data-agent_rest="{{ $x->rest }}" data-agent_sadad="{{ $x->sadad }}  "   >


                                                                                            <i class="fa fa-cash-register m-r-5"></i>
                                                                                            <span>استرداد مبلغ للعميل</span> </a>&nbsp;
                                                                                    @endif


                                                                                    <table class="table">
                                                                                        <tbody><tr>
                                                                                            <td>بواسطة</td>
                                                                                            <td> {{$x->end_by}} </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>سبب الانهاء</td>
                                                                                            <td>{{$x->end_reson}}</td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>تاريخ الانهاء</td>
                                                                                            <td>{{$x->end_contract_date}}</td>
                                                                                        </tr>
                                                                                        @if($x->late_cost>0)
                                                                                            <tr>
                                                                                                <td>عدد ايام التأخير</td>
                                                                                                <td>{{$x->late_days}}</td>
                                                                                            </tr>
                                                                                        @endif
                                                                                        @if($x->return_cost>0)
                                                                                            <tr>
                                                                                                <td>عدد الايام المتبقية </td>
                                                                                                <td>{{$x->remaining_days}}</td>
                                                                                            </tr>
                                                                                        @endif
                                                                                        <tr>
                                                                                            <td>ملحوظة</td>



                                                                                            <td>{{$x->end_comment}} </td>
                                                                                        </tr>
                                                                                        </tbody></table>
                                                                                    <!--  استرجاع  مبلغ للعميل فى  كل الحالات-->
                                                                                </div>
                                                                            @endif

                                                                            <!-- نهاية العمود الاخير-->
                                                                        </div>
                                                                </div>
                                                                @if($x->status=='منتهي')
                                                                    <div class="btn btn-info hideApplicant text-center btn-fullwidth text-white btn-trans col-md-12" STYLE="background-color: rgba(53, 184, 224, 0.15) !important;color:#35b8e0 !important;">
                                                                        <i class="fa fa-window-close m-r-5"></i><span>تم انهاء العقد  </span>
                                                                    </div>
                                                                @endif

                                                                @if($x->late_days>0 and $x->late_cost>0)
                                                                    <br>
                                                                    <div class="btn btn-warning hideApplicant text-center btn-fullwidth text-white btn-trans col-md-12" STYLE="background-color: #cba844;color:#cba844;">
                                                                        <i class="fa fa-window-close m-r-5"></i><span> يوجد غرامة تأخير علي العقد </span>
                                                                    </div>
                                                                @endif

                                                                @if($x->remaining_days>0 and $x->return_cost>0)
                                                                    <br>
                                                                    <div class="btn btn-warning hideApplicant text-center btn-fullwidth text-white btn-trans col-md-12" STYLE="background-color: #527589;color:#527589;">
                                                                        <i class="fa fa-window-close m-r-5"></i><span> يوجد استرداد مبلغ للعميل  </span>
                                                                    </div>
                                                                @endif
                                                                <!-- نهاية الكرت-->

                                                            </div>
                                                        </div>

                                                        @endforeach
                                                        <div class="card card-primary">

                                                            <div class="card-body text-primary ">
                                                                {{ $contract->links() }}
                                                                <div class="text-danger   text-left ">
                                                                    <h7>عدد العقود</h7>
                                                                    <h3 class="">  <b>{{$contract_count2}}</b> </h3>

                                                                </div>

                                                            </div>
                                                        </div>
    <!-- Container closed -->
    <div class="modal" id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة ملاحظه  </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                  type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="/rent_comment" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">التاريخ</label>
                            <input type="date" class="form-control" id="comment_date" name="comment_date" value="{{ date('Y-m-d') }}" readonly>
                            <input type="hidden" name="id" id="id" value="">
                            <label for="exampleInputEmail1">الملاحظات</label>
                           <textarea class="form-control" name="comment" id="comment" required></textarea>

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

                                <!-- Container closed -->

                                <!-- Container closed -->
                                <div class="modal" id="modaldemo2">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">اضافة شكوى  </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                           type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('sections.store') }}" method="post">
                                                    {{ csrf_field() }}

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">التاريخ</label>
                                                        <input type="date" class="form-control" id="comment_date" name="sections_name" readonly>
                                                        <input type="text" name="id" id="id" value="">
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

                                <!-- Container closed -->


                                <!-- Container closed -->
                                <div class="modal" id="modaldemo3">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">انهاء خدمة عاملة  </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                           type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('change_emp.store') }}" method="post">
                                                    {{ csrf_field() }}

                                                    <div class="form-group">

                                                        <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>

                                                            سبب الانهاء</label>
                                                        <select name="end_reson" id="end_reson" class="form-control"  required onchange="rate_maid()">
                                                            <!--placeholder-->
                                                            <option value=""selected >حدد السبب</option>
                                                            <option value="اضافة عاملة للعقد" >اضافة عاملة للعقد</option>
                                                                <option value="هروب العاملة" >هروب العاملة</option>
                                                            <option value="رغبة تبديل العامل" >رغبة تبديل العامل</option>
                                                            <option value="العاملة لا ترغب بالعمل" >العاملة لا ترغب بالعمل</option>
                                                            <option value="حاجة العاملة الي اجازة " >حاجة العاملة الي اجازة</option>
                                                            <option value=" العاملة مريضة " >العاملة مريضة</option>
                                                            <option value="  اجراء الخروج النهائي للعاملة بسبب نهاية خدمتها مع الشركة" >اجراء الخروج النهائي للعاملة بسبب نهاية خدمتها مع الشركة</option>


                                                        </select>
                                                        <div id="rate">

                                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>

                                                                تقييم العاملة الاولي</label>
                                                            <select name="maid_rate" id="maid_rate" class="form-control"  required>
                                                                <!--placeholder-->
                                                                <option value="" selected >حدد درجة التقييم </option>
                                                                <option value="1" >ممتاز</option>
                                                                <option value="2" >جيد</option>
                                                                <option value="3" >سيئ</option>



                                                            </select>
                                                        </div>


                                                        <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>رقم العاملة الجديدة </label>
                                                        <input type="text" class="form-control" id="emp_num" name="emp_num" value="" required  onkeyup="emp_numm()" >
                                                        <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>اسم العاملة   </label>
                                                        <input type="text" class="form-control" id="emp_name" name="emp_name" value="" readonly required>







                                                        <input type="text" class="form-control" id="alert" name="alert" value="0" style="text-align:right;color:#2c7ecd; font-size: 15px; height: 20px; background-color: white; font-weight: bold;border: none; " >
                                                        <div class="row">
                                                        <input type="text" class="form-control" id="alert2" name="alert2" value="" style="text-align:right;color: #ee335e; font-size: 15px; height: 20px; background-color: white; font-weight: bold;border: none; " readonly>
                                                        <input  class="btn-success " style="font-weight: bold;text-align:center;" id="connected_con_id"  name="connected_con_id" type="button" value="" >
                                                        </div>
                                                        <br>
                                                        <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>  ملاحظات  </label>
                                                        <textarea class="form-control" name="comment" id="comment"></textarea>

                                                        <br>
                                                        <input type="text" class="form-control" id="emp_new_id" name="emp_new_id" value="" required  hidden>
                                                        <input type="text" class="form-control" id="connected" name="connected" value="" hidden >
                                                        <input type="text" name="id" id="id" value="" hidden >
                                                        <input type="text" name="maids_id" id="maids_id" value=""  hidden>


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

                                <!-- Container closed -->


                                            <div class="modal fade" id="chnange_exp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">تعديل تاريخ السداد</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="/upd_exp_sada" method="post" autocomplete="off">
                                                                {{ method_field('post') }}
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id" id="id" value="">
                                                                    <label for="recipient-name" class="col-form-label"> تاريخ السداد الاول :</label>
                                                                    <input class="form-control" name="exp_sadad1" id="exp_sadad1" type="text" readonly>
                                                                    <label for="recipient-name" class="col-form-label"> تاريخ السداد الجديد :</label>
                                                                    <input class="form-control" name="exp_sadad2" id="exp_sadad2" type="date">
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

                                            <!-- Container closed -->
                                            <div class="modal" id="end_contract">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title"> انهاء العقد  </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                             type="button"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('end_contract.store') }}" method="post">
                                                                {{ csrf_field() }}

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">تاريخ نهاية العقد المتوقع</label>
                                                                    <input type="date" class="form-control text-center" id="end_contract_date" name="end_contract_date" readonly>
                                                                    <label for="exampleInputEmail1">تاريخ نهاية العقد الفعلي</label>
                                                                    <input type="date" class="form-control text-center" id="end_contract_date2" name="end_contract_date2"  onchange="count_day()" required>
                                                                    <input type="text" name="id" id="id" value="" hidden="hidden">
                                                                    <input type="text" name="maid_id" id="maid_id" value="" hidden="hidden">
                                                                    <label for="exampleInputEmail1">  سبب الانهاء </label>
                                                                <select class="form-control" name="end_reson" id="end_reson" required>
                                                                    <option value="لا شئ">لا شئ</option>
                                                                    <option value="انتهاء العقد بسبب انتهاء مدة العقد مع العميل">انتهاء العقد بسبب انتهاء مدة العقد مع العميل</option>
                                                                    <option value="عدم حاجة العميل للعامل لإغراض معينة(سفر العميل -عدم حاجة العاملة)">عدم حاجة العميل للعامل لإغراض معينة(سفر العميل -عدم حاجة العاملة)</option>
                                                                    <option value="لا يوجد سبب">لا يوجد سبب</option>
                                                                    <option value="احرى">احرى</option>


                                                                </select>
                                                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>

                                                                        تقييم العاملة في العقد</label>
                                                                    <select name="maid_rate" id="maid_rate" class="form-control"  required>
                                                                        <!--placeholder-->
                                                                        <option value="" selected >حدد درجة التقييم </option>
                                                                        <option value="1" >ممتاز</option>
                                                                        <option value="2" >جيد</option>
                                                                        <option value="3" >سيئ</option>



                                                                    </select>
                                                                    <label for="exampleInputEmail1"> ملاحظات </label>
                                                                    <textarea id="end_comment" name="end_comment" class="form-control">لا يوجد </textarea>
                                                                    <H3 hidden>عدد ايام التاخير</H3>
                                                                    <input type="text" id="late_days" name="late_days" hidden >
                                                                    <H3 hidden>عدد ايام المتبقية في العقد</H3>
                                                                    <input type="text" id="remaining_days" name="remaining_days" hidden >
                                                                    <input type="text" id="countss" name="countss" hidden="hidden" >
                                                                    <input type="text" id="cost" name="cost" hidden="hidden" >



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

                                                <!-- Container closed -->
                                                <div class="modal" id="penalty">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">    دفع غرامة تأخير  </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                                   type="button"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/pay_penalty" method="post">
                                                                    {{ csrf_field() }}

                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                        <div class="row">
                                                                            <label for="exampleInputEmail1" class="text-danger">يتم حساب اليوم ب150 ريال عن كل يوم تأخير !!! </label>

                                                                            <hr>
                                                                            <div class="col-md-6">
                                                                                <label for="exampleInputEmail1">اجمالي العقد</label>
                                                                                <input type="text" class="form-control text-center" id="tot" name="tot" readonly>
                                                                                <label for="exampleInputEmail1">عدد ايام العقد</label>
                                                                                <input type="text" class="form-control text-center" id="countss" name="countss" readonly>
                                                                                <input type="text" name="id" id="id" value="" hidden="hidden">

                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <label for="exampleInputEmail1">عدد ايام التأخير</label>
                                                                                <input type="text" class="form-control text-center" id="late_days" name="late_days" readonly>
                                                                                <label for="exampleInputEmail1">تكلفة اليوم</label>
                                                                                <input type="text" class="form-control text-center" id="day_cost" name="day_cost" readonly>
                                                                                <input type="text" name="id" id="id" value="" hidden="hidden">
                                                                                <input type="text" name="agents_name" id="agents_name" value="" hidden>


                                                                            </div>


                                                                        </div>
                                                                            <label for="exampleInputEmail1">مبلغ الغرامة</label>
                                                                            <input type="number" class="form-control text-center" id="late_cost" name="late_cost" readonly >
                                                                            <label for="exampleInputEmail1"> مبلغ السداد </label>
                                                                            <input type="number" class="form-control text-center" id="sadad" name="sadad" onkeyup="mydsadad()" required >

                                                                        <label for="exampleInputEmail1"> طريقة السداد  </label>
                                                                        <select class="form-control" name="catch_type" id="catch_type" required>
                                                                            <option value=""> حدد طريقة السداد</option>
                                                                            <option value="نقدآ">نقدآ</option>
                                                                            <option value="تحويل">تحويل</option>
                                                                        </select>
                                                                            <label for="inputName" class="control-label" hidden > <span class="text-danger font-bold"></span> ضريبة مبلغ السداد </label>
                                                                            <input type="number" class="form-control" id="sadad_vat" name="sadad_vat" value="0"  readonly hidden >
                                                                            <label for="inputName" class="control-label" hidden > <span class="text-danger font-bold"></span>  القيمة </label>
                                                                            <input type="number" class="form-control" id="sadad_co" name="sadad_co" value="0"  readonly hidden >

                                                                            <input type="text" class="form-control" id="sadad_ar" name="sadad_ar" value="" hidden >
                                                                            <input type="text" class="form-control" id="sadad_co_ar" name="sadad_co_ar" value="" hidden >
                                                                            <input type="text" class="form-control" id="sadad_vat_ar" name="sadad_vat_ar" value="" hidden >



                                                                    </div>




                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success">تاكيد</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                                    </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Container closed -->
                                                <div class="modal" id="return">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">   استرداد مبلغ للعميل    </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                                          type="button"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/pay_return" method="post">
                                                                    {{ csrf_field() }}

                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <label for="exampleInputEmail1" class="text-danger">اذا كان عدد ايام  العقد المنقضية 1 يوم يتم حساب اليوم بي 250 ريال !! </label>
                                                                                <label for="exampleInputEmail1" class="text-danger">اذا كان عدد ايام  العقد المنقضية  2-7 ايام يتم حساب اليوم بي 150 ريال !! </label>
                                                                                <label for="exampleInputEmail1" class="text-danger">اذا كان عدد ايام  العقد المنقضية  8-30 يوم يتم حساب اليوم بي 100 ريال !! </label>
                                                                                <div class="col-md-6">
                                                                                    <label for="exampleInputEmail1">اجمالي العقد</label>
                                                                                    <input type="text" class="form-control text-center" id="tot" name="tot" readonly>
                                                                                    <label for="exampleInputEmail1"> مبلغ السداد</label>
                                                                                    <input type="text" class="form-control text-center" id="agent_sadad" name="agent_sadad" readonly>
                                                                                    <input type="text" name="id" id="id" value="" hidden="hidden">
                                                                                    <label for="exampleInputEmail1">عدد الايام المتبقية</label>
                                                                                    <input type="text" class="form-control text-center" id="remaining_days" name="remaining_days" readonly>

                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="exampleInputEmail1">المتبقي علي العميل</label>
                                                                                    <input type="text" class="form-control text-center" id="agent_rest" name="agent_rest" readonly>
                                                                                    <label for="exampleInputEmail1">عدد ايام العقد</label>
                                                                                    <input type="text" class="form-control text-center" id="countss" name="countss" readonly>
                                                                                    <input type="text" name="id" id="id" value="" hidden="hidden">
                                                                                    <label for="exampleInputEmail1">عدد الايام المنقضية   </label>
                                                                                    <input type="text" class="form-control text-center" id="work_days" name="work_days" readonly>
                                                                                </div>

                                                                                <label for="exampleInputEmail1">تكلفة اليوم</label>
                                                                                <input type="text" class="form-control text-center" id="day_cost" name="day_cost" readonly>

                                                                                <input type="text" name="agents_name" id="agents_name" value="" hidden>


                                                                            </div>
                                                                            <label for="exampleInputEmail1">مبلغ الاسترداد</label>
                                                                            <input type="number" class="form-control text-center" id="return_cost" name="return_cost" readonly >
                                                                            <label for="exampleInputEmail1"> مبلغ الصرف </label>
                                                                            <input type="number" class="form-control text-center" id="sadad1" name="sadad1" onkeyup="mysarf()" required >

                                                                            <label for="exampleInputEmail1"> طريقة الصرف  </label>
                                                                            <select class="form-control" name="catch_type1" id="catch_type1" required>
                                                                                <option value=""> حدد طريقة الاسترداد</option>
                                                                                <option value="نقدآ">نقدآ</option>
                                                                                <option value="تحويل">تحويل</option>
                                                                            </select>
                                                                            <label for="inputName" class="control-label"  hidden> <span class="text-danger font-bold"></span> ضريبة مبلغ السداد </label>
                                                                            <input type="number" class="form-control" id="sadad_vat1" name="sadad_vat1" value="0"  readonly hidden >
                                                                            <label for="inputName" class="control-label" hidden > <span class="text-danger font-bold"></span>  القيمة </label>
                                                                            <input type="number" class="form-control" id="sadad_co1" name="sadad_co1" value="0"  readonly hidden >

                                                                            <input type="text" class="form-control" id="sadad_ar1" name="sadad_ar1" value="" hidden >
                                                                            <input type="text" class="form-control" id="sadad_co_ar1" name="sadad_co_ar1" value="" hidden >
                                                                            <input type="text" class="form-control" id="sadad_vat_ar1" name="sadad_vat_ar1" value="" hidden >



                                                                        </div>




                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-success">تاكيد</button>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

    <!-- main-content closed -->
@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
                                                <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
                                                <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
                                    <!--Internal  Form-elements js-->



                                                    <script>
                                                        $('#return').on('show.bs.modal', function(event) {
                                                            var button = $(event.relatedTarget)
                                                            var id = button.data('id')
                                                            var remaining_days = button.data('remaining_days')
                                                            var tot = button.data('tot')
                                                            var countss = button.data('countss')
                                                            var late_cost = button.data('late_cost')

                                                            var agents_name = button.data('agents_name')

                                                            var agent_rest = button.data('agent_rest')
                                                            var agent_sadad = button.data('agent_sadad')
                                                            var work_days=countss-remaining_days;
                                                            if(work_days==1){
                                                                var day_cost =250
                                                                var return_cost =agent_sadad-(day_cost*work_days);
                                                            }
                                                            if(work_days==2 || work_days==3 || work_days==4 ||work_days==5 ||work_days==6 || work_days==7){
                                                                var day_cost =150
                                                                var return_cost =agent_sadad-(day_cost*work_days);
                                                            }
                                                            if(work_days>7){
                                                                var day_cost =100
                                                                var return_cost =agent_sadad-(day_cost*work_days);
                                                            }




                                                            var modal = $(this)
                                                            modal.find('.modal-body #id').val(id);
                                                            modal.find('.modal-body #remaining_days').val(remaining_days);
                                                            modal.find('.modal-body #tot').val(tot);
                                                            modal.find('.modal-body #countss').val(countss);
                                                            modal.find('.modal-body #late_cost').val(late_cost);
                                                            modal.find('.modal-body #day_cost').val(day_cost);
                                                            modal.find('.modal-body #agents_name').val(agents_name);
                                                            modal.find('.modal-body #return_cost').val(return_cost);
                                                            modal.find('.modal-body #agent_rest').val(agent_rest);
                                                            modal.find('.modal-body #agent_sadad').val(agent_sadad);
                                                            modal.find('.modal-body #work_days').val(work_days);

                                                        })
                                                    </script>


                                                    <script>
                                                        $('#penalty').on('show.bs.modal', function(event) {
                                                            var button = $(event.relatedTarget)
                                                            var id = button.data('id')
                                                            var late_days = button.data('late_days')
                                                            var tot = button.data('tot')
                                                            var countss = button.data('countss')
                                                            var late_cost = button.data('late_cost')
                                                            var day_cost = button.data('day_cost')
                                                            var agents_name = button.data('agents_name')


                                                            var modal = $(this)
                                                            modal.find('.modal-body #id').val(id);
                                                            modal.find('.modal-body #late_days').val(late_days);
                                                            modal.find('.modal-body #tot').val(tot);
                                                            modal.find('.modal-body #countss').val(countss);
                                                            modal.find('.modal-body #late_cost').val(late_cost);
                                                            modal.find('.modal-body #day_cost').val(day_cost);
                                                            modal.find('.modal-body #agents_name').val(agents_name);


                                                        })
                                                    </script>


    <script>
        $('#modaldemo1').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);


        })
    </script>

                                    <script>
                                        $('#modaldemo2').on('show.bs.modal', function(event) {
                                            var button = $(event.relatedTarget)
                                            var id = button.data('id')


                                            var modal = $(this)
                                            modal.find('.modal-body #id').val(id);


                                        })
                                    </script>

                                    <script>
                                        $('#modaldemo3').on('show.bs.modal', function(event) {
                                            var button = $(event.relatedTarget)
                                            var id = button.data('id')
                                            var emp_name = button.data('emp_name')
                                            var emp_num = button.data('emp_num')
                                            var maids_id = button.data('maids_id')


                                            var modal = $(this)
                                            modal.find('.modal-body #id').val(id);
                                            modal.find('.modal-body #emp_name').val(emp_name);
                                            modal.find('.modal-body #emp_num').val(emp_num);
                                            modal.find('.modal-body #maids_id').val(maids_id);

                                        })
                                    </script>
                                                <script>
                                                    $('#chnange_exp').on('show.bs.modal', function(event) {
                                                        var button = $(event.relatedTarget)
                                                        var id = button.data('id')
                                                        var exp_sadad = button.data('exp_sadad')



                                                        var modal = $(this)
                                                        modal.find('.modal-body #id').val(id);
                                                        modal.find('.modal-body #exp_sadad1').val(exp_sadad);


                                                    })
                                                </script>
                                                <script>
                                                    $('#end_contract').on('show.bs.modal', function(event) {
                                                        var button = $(event.relatedTarget)
                                                        var id = button.data('id')
                                                        var end_contract_date = button.data('end_contract_date')
                                                        var maid_id = button.data('maid_id')
                                                        var countss = button.data('countss')
                                                        var cost = button.data('cost')



                                                        var modal = $(this)
                                                        modal.find('.modal-body #id').val(id);
                                                        modal.find('.modal-body #maid_id').val(maid_id);
                                                        modal.find('.modal-body #cost').val(cost);
                                                        modal.find('.modal-body #countss').val(countss);
                                                        modal.find('.modal-body #end_contract_date').val(end_contract_date);


                                                    })
                                                </script>




                                                <script>
                                                    function emp_numm(){
                                                        var emp_num = document.getElementById("emp_num").value
                                                        document.getElementById("emp_name").value = "";
                                                        document.getElementById("emp_new_id").value ="";
                                                        document.getElementById("connected").value = "";
                                                        document.getElementById("alert").value = "";
                                                        document.getElementById("alert2").value = "";


                                                        if (emp_num) {
                                                            $.ajax({
                                                                url: "{{ URL::to('getemp_name') }}/" + emp_num,
                                                                type: "GET",

                                                                dataType: "json",

                                                                success: function(data) {


                                                                    document.getElementById("emp_name").value = data['emp_name_ar'];
                                                                    document.getElementById("emp_new_id").value = data['id'];
                                                                    document.getElementById("connected").value = data['connected'];
                                                                    document.getElementById("connected_con_id").value = data['connected_con_id'];

                                                                    var connected = document.getElementById("connected").value
                                                                    if(connected==0){
                                                                        document.getElementById("alert").value = "متاحه للتأجير";
                                                                        $('#alert').prop('required',false);
                                                                        document.getElementById("alert2").value = "";
                                                                        $('#connected_con_id').hide();
                                                                    }else{
                                                                        $('#alert').prop('required',true);


                                                                        document.getElementById("alert2").value = " مربوطه بعقد ";
                                                                        document.getElementById("alert").value = "";
                                                                        $('#connected_con_id').show();
                                                                        document.getElementById("connected_con_id").setAttribute("onclick","location.href='/ser_cont/"+data['connected_con_id']+"'");


                                                                        notif({
                                                                            msg: " العاملة مربوطة بعقد يجب انهاء خدمتها اولا ",
                                                                            type: "error"
                                                                        })
                                                                    }



                                                                },


                                                            });

                                                        } else {
                                                            console.log('AJAX load did not work');
                                                        }


                                                    }



                                                </script>

                                                <script>
                                                    function rate_maid(){
                                                   var reson= document.getElementById("end_reson").value ;
                                                   if(reson=='اضافة عاملة للعقد'){
                                                       $('#rate').hide();
                                                       $('#maid_rate').prop('required',false);
                                                   }else {
                                                       $('#rate').show();
                                                       $('#maid_rate').prop('required',true);
                                                   }



                                                    }



                                                </script>


                                                <script>
                                                    $(document).ready(function() {


                                                        $('#connected_con_id').hide();

                                                    });


                                                </script>
                                                <script type = "text/javascript">
                                                    function show() {
                                                        document.getElementById('img1').style.visibility = 'visible';
                                                    }
                                                </script>
                                                <script type = "text/javascript">
                                                    function hide() {
                                                        document.getElementById('img1').style.visibility = 'hidden';
                                                    }
                                                </script>
                                                    <script>
                                                        function count_day(){


                                                            const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                                                            const firstDate = new Date(document.getElementById("end_contract_date").value);
                                                            const secondDate = new Date(document.getElementById("end_contract_date2").value);
                                                            if(firstDate > secondDate){

                                                                const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));

                                                                document.getElementById("late_days").value =0;
                                                                document.getElementById("remaining_days").value =diffDays;

                                                            }
                                                            else{

                                                                    const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));



                                                                    document.getElementById("late_days").value =diffDays;
                                                                    document.getElementById("remaining_days").value =0;
                                                                }
                                                           var late= document.getElementById("late_days").value;
                                                            var remaining =document.getElementById("remaining_days").value;
                                                           if(late>0){
                                                               alert("سيتم تطبيق غرامة تأخير علي  العميل")
                                                           }else if(remaining>0){
                                                               alert("سيتم تطبيق سياسة استرداد مبلغ للعميل")
                                                           }else{

                                                            }


                                                        }


                                                    </script>
                                                    <script>

                                                        function  mydsadad() {



                                                            var sadad = parseFloat(document.getElementById("sadad").value);

                                                                var sadad_vat=sadad-(sadad/1.15);
                                                                var sadad_co=sadad/1.15;

                                                                document.getElementById("sadad_co").value = parseFloat(sadad_co).toFixed(2);
                                                                document.getElementById("sadad_vat").value = parseFloat(sadad_vat).toFixed(2);



                                                                // تحويل اجمالي السداد الي نص
                                                                var sadad_ar = document.getElementById("sadad").value.split(".");

                                                                if (sadad_ar.length == 2){
                                                                    document.getElementById ("sadad_ar").value =  tafqeet (sadad_ar[0])+' '+'ريال سعودي'+' و ' + tafqeet (sadad_ar[1])+' '+'هللة فقط لا غير'  ;
                                                                }
                                                                else if (sadad_ar.length == 1){
                                                                    document.getElementById ("sadad_ar").value =  tafqeet (sadad_ar[0])+' '+'ريال سعودي فقط لا غير' ;
                                                                }

                                                                // تحويل قيمة السداد الي نص
                                                                var sadad_co = document.getElementById("sadad_co").value.split(".");

                                                                if (sadad_co.length == 2){
                                                                    document.getElementById ("sadad_co_ar").value =  tafqeet (sadad_co[0])+' '+'ريال سعودي'+' و ' + tafqeet (sadad_co[1])+' '+'هللة فقط لا غير'  ;
                                                                }
                                                                else if (sadad_co.length == 1){
                                                                    document.getElementById ("sadad_ar").value =  tafqeet (sadad_co[0])+' '+'ريال سعودي فقط لا غير' ;
                                                                }
                                                                // تحويل ضريبة السداد الي نص
                                                                var sadad_vat = document.getElementById("sadad_vat").value.split(".");

                                                                if (sadad_vat.length == 2){
                                                                    document.getElementById ("sadad_vat_ar").value =  tafqeet (sadad_vat[0])+' '+'ريال سعودي'+' و ' + tafqeet (sadad_vat[1])+' '+'هللة فقط لا غير'  ;
                                                                }
                                                                else if (sadad_vat.length == 1){
                                                                    document.getElementById ("sadad_vat_ar").value =  tafqeet (sadad_vat[0])+' '+'ريال سعودي فقط لا غير' ;
                                                                }






                                                        }



                                                    </script>
                                                    <script>

                                                        function  mysarf() {



                                                            var sadad = parseFloat(document.getElementById("sadad1").value);

                                                            var sadad_vat=sadad-(sadad/1.15);
                                                            var sadad_co=sadad/1.15;

                                                            document.getElementById("sadad_co1").value = parseFloat(sadad_co).toFixed(2);
                                                            document.getElementById("sadad_vat1").value = parseFloat(sadad_vat).toFixed(2);



                                                            // تحويل اجمالي السداد الي نص
                                                            var sadad_ar = document.getElementById("sadad1").value.split(".");

                                                            if (sadad_ar.length == 2){
                                                                document.getElementById ("sadad_ar1").value =  tafqeet (sadad_ar[0])+' '+'ريال سعودي'+' و ' + tafqeet (sadad_ar[1])+' '+'هللة فقط لا غير'  ;
                                                            }
                                                            else if (sadad_ar.length == 1){
                                                                document.getElementById ("sadad_ar1").value =  tafqeet (sadad_ar[0])+' '+'ريال سعودي فقط لا غير' ;
                                                            }

                                                            // تحويل قيمة السداد الي نص
                                                            var sadad_co = document.getElementById("sadad_co1").value.split(".");

                                                            if (sadad_co.length == 2){
                                                                document.getElementById ("sadad_co_ar1").value =  tafqeet (sadad_co[0])+' '+'ريال سعودي'+' و ' + tafqeet (sadad_co[1])+' '+'هللة فقط لا غير'  ;
                                                            }
                                                            else if (sadad_co.length == 1){
                                                                document.getElementById ("sadad_ar1").value =  tafqeet (sadad_co[0])+' '+'ريال سعودي فقط لا غير' ;
                                                            }
                                                            // تحويل ضريبة السداد الي نص
                                                            var sadad_vat = document.getElementById("sadad_vat1").value.split(".");

                                                            if (sadad_vat.length == 2){
                                                                document.getElementById ("sadad_vat_ar1").value =  tafqeet (sadad_vat[0])+' '+'ريال سعودي'+' و ' + tafqeet (sadad_vat[1])+' '+'هللة فقط لا غير'  ;
                                                            }
                                                            else if (sadad_vat.length == 1){
                                                                document.getElementById ("sadad_vat_ar1").value =  tafqeet (sadad_vat[0])+' '+'ريال سعودي فقط لا غير' ;
                                                            }






                                                        }



                                                    </script>
                                                <script>

                                                    import mobiscroll from "@mobiscroll/javascript-lite";

                                                    $( document ).ready(function() {
                                                        mobiscroll.datepicker('#range', {
                                                            select: 'range'
                                                        });
                                                    });
                                                </script>

                                                    <script src="{{ URL::asset('assets/plugins/tafgeet/Tafqeet.js') }}"></script>
@endsection
