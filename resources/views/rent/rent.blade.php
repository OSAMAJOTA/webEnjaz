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
                                                <form action="/Search_agents" method="POST" role="search" autocomplete="off">
                                                    {{ csrf_field() }}
                                                    <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                        <div class="panel-body border">
                                                            {{-- الصف الاول --}}
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label> الإسم عربي</label>
                                                                    <div class="input-group sm ">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> رقم الهوية</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="id_num" placeholder="" type="text">
                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> الجوال</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label>البريد الالكترونى</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                        </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                                                    </div><!-- input-group -->
                                                                </div>

                                                            </div>
                                                            {{-- الصف الثاني --}}

                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label> الجنسية</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name=""   >


                                                                            <option value="" >
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
                                                                    <label>عملاء مدينين
                                                                    </label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name=""   >


                                                                            <option value="" selected>

                                                                            </option>
                                                                            <option value="الكل"> الكل </option>
                                                                            <option value="بانتظارالتوجيه">  المدينين </option>
                                                                            <option value="بانتظار التواصل معه">  المسدد </option>

                                                                            ةغ
                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> عملاء بدون عقود</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name=""   >


                                                                            <option value="" selected>

                                                                            </option>
                                                                            <option value="الكل"> الكل </option>
                                                                            <option value="بانتظارالتوجيه">  لديهم عقود </option>
                                                                            <option value="بانتظار التواصل معه"> بدون عقد </option>


                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> مستوى التقيم</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name=""   >


                                                                            <option value="" selected>

                                                                            </option>
                                                                            <option value="الكل"> جيد </option>
                                                                            <option value="بانتظارالتوجيه"> ممتاز </option>
                                                                            <option value="بانتظار التواصل معه">   سئ</option>
                                                                            <option value="تم التواصل معه"> محظور </option>

                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label>عميل مهم</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name=""   >


                                                                            <option value="" selected>

                                                                            </option>
                                                                            <option value="الكل"> الكل </option>
                                                                            <option value="بانتظارالتوجيه"> هام </option>
                                                                            <option value="بانتظار التواصل معه"> غير مهم</option>

                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>

                                                                <div class="col-lg-3">
                                                                    <label> المسوق</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                        </div>
                                                                        <select class="form-control select2" name=""   >


                                                                            <option value="" selected>

                                                                            </option>
                                                                            <option value="الكل"> الكل </option>

                                                                        </select>

                                                                    </div><!-- input-group -->
                                                                </div>



                                                            </div>


                                                            <div class="d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-primary"> بحث</button>
                                                                &nbsp;	&nbsp;	&nbsp;

                                                                <button type="button" onclick="location.href='/agents'" class="btn btn-dark">الغاء </button>





                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                        <div class="example">
                                            <div class="row row-xs wd-xl-80p">
                                                <div class="col-sm-6 col-md-2">
                                                    <button class="btn btn-primary-gradient btn-block">



                                                        <i class="fas fa-print"></i>&nbsp; طباعة

                                                    </button>
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


                                        @foreach($contract as $x)
        <div class="col-xl-12">
            <div class="card">



                <!-- كرت العقد-->
                    <?php
                    $start =  Carbon\Carbon::parse($x->end_date);
                    $now = Carbon\Carbon::now();


                    $days_count = $start->diffInDays($now);


                    ?>
                @if($days_count<3)
                    <div class="card-body" style="background-color: #ffd4d4a8">
                        @else
                            <div class="card-body" >
                @endif

                    <div class="panel-body table-responsive">
                        <ul class="branchnameList">
                            <li>
                                <i class="fa-duotone fa-code-branch"></i>
                                {{$x->companys_name }}
                            </li>

                            @if($start<$now)
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

                                                <h1 class="text-success" style=" color: #075e15 !important;
    font-weight: bold;">{{$x->status }}</h1>
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
                                            <tr>
                                              <td>
                                                    <a href="#Open_ManagerDiscount" onclick="Open_ManagerDiscount(15101,5585,600.3,600.3,0);" title="اضافة خصم مدير على العقد" data-plugin="custommodal" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">
                                                        <i class="fa fa-plus m-r-5"></i>
                                                        <span> اضافة خصم مدير</span>
                                                    </a></td>

                                            </tr>

                                            </tbody></table>


                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 hideApplicant">
                                <h4 class="m-t-0 header-title-small"><b>ادارة العمالة</b> </h4>

                                <p> رقم العاملة : <b>
                                        <a href="maidsDetails/{{$x->maids_id }}">
                                            <h5 class="text-custom font-60">      {{$x->emp_num }}</h5>
                                        </a>


                                    </b></p>
                                <h4 class="m-t-0 m-b-0"><a href="maidsDetails/{{$x->maids_id }}">{{$x->emp_name }}</a></h4>
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



                                    <li class="list-group-itemm" style="border-right:2px solid #00ff21;">
                                        <a class="text-success" href="/ar-sa/RentContract/Print_RentContractInvoice?contractId=15101&amp;RepId=1" title="طباعة الفاتورة الضريبة" target="_blank">
                                            <i class="fa fa-file-pdf"></i>
                                            <span> طباعة الفاتورة الضريبة</span>
                                        </a>
                                    </li>

                                    <li class="list-group-itemm">
                                        <a href="/print_cont/{{$x->id }}" class="on-default edit-row" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">
                                            <i class="fa fa-print"></i>
                                            <span>طباعة</span>
                                        </a>
                                    </li>




                                </ul>

                            </div>

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
                                        <a href="/ar-sa/RentContract/Modify/15101" class="on-default edit-row" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">
                                            <i class="fa fa-edit"></i>
                                            <span>تعديل</span>
                                        </a>
                                    </li>

                                    <li class="list-group-itemm">
                                        <a href="#" onclick="OpenPopUp('con_15101',EditContractFinsh,new Array(15101,'2024/04/10'),this)" class="on-default edit-row" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">
                                            <i class="fa fa-edit-square-o"></i>
                                            <span>انهاء العقد</span>
                                        </a>
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
                                                <span class="text-info">  {{$days_count}}</span>
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
                        </div>
                    </div>
                </div>
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

        <!-- row closed -->
    </div>
    <!-- row closed -->
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

@endsection
