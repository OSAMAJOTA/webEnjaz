@extends('layouts.master')
@section('title')
     العملاء
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ العملاء   </span>
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




        <div class="col-xl-12">
            <div class="card">


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
                                                <a href="/Export_agents" class="btn btn-primary-gradient btn-block">



                                                <i
                                                    class="fas fa-print"></i>&nbsp; طباعة</a>


                                            </div>


                                            <div class="col-sm-6 col-md-2">
                                                <form action="agents/create">
                                                <button class="btn btn-info-gradient btn-block">

                                                    <i
                                                        class="fas fa-plus"></i>&nbsp;  اضافة عميل

                                                </button>
                                                </form>
                                            </div>
                                            <div class="col-sm-6 col-md-2">
                                                <form action="agents/aa">
                                                <button class="btn btn-info-gradient btn-block">

                                                    <i
                                                        class="fas fa-plus"></i>&nbsp;   ارسال ايميل
                                                </button>
                                                </form>
                                            </div>
                                            <div class="col-sm-6 col-md-2">
                                                <button class="btn btn-primary-gradient btn-block">
                                                    <i
                                                        class="fas fa-plus-circle"></i>&nbsp;  اضافة من اكسيل</a>
                                                </button>
                                            </div>
                                            <div class="col-sm-6 col-md-2">
                                                <button class="btn btn-info-gradient btn-block">
                                                    <i
                                                        class="fas fa-chalkboard-teacher"></i>&nbsp;   فتح محادثة واتس اب</a>

                                                </button>
                                            </div>


                                        </div>
                                    </div>
                                    @foreach($agents as $x)

                            <!-- عميل 3 -->
                            <div class="col-xl-12">
                                <!-- div -->
                                <div class="card mg-b-20" id="tabs-style3">



                                    <div class="text-wrap">
                                        <div class="example">
                                            <div class="panel panel-primary tabs-style-3">
                                                <div class="tab-menu-heading">
                                                    <div class="tabs-menu ">
                                                        <!-- Tabs -->
                                                        <ul class="nav panel-tabs">
                                                            <li class=""><a href="#tab{{$x->id+500001}}" class="active" data-toggle="tab"><i class="fa fa-laptop"></i> العميل  </a></li>
                                                            <li><a href="#tab{{$x->id+600002}}" data-toggle="tab"><i class="fa fa-cube"></i> عقود التوسط </a></li>
                                                            <li><a href="#tab{{$x->id+700003}}" data-toggle="tab"><i class="fa fa-cogs"></i> عقود التشغيل  </a></li>
                                                            <li><a href="#tab{{$x->id+800004}}" data-toggle="tab"><i class="fa fa-tasks"></i>  كشف حساب </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body tabs-menu-body">
                                                    <div class="tab-content">



                                                        <div class="tab-pane active" id="tab{{$x->id+500001}}">
                                                            <div class="col-12  col-lg-12">
                                                                <div class="card card-primary">
                                                                    <div class="card-header pb-0">
                                                                        <h5 class="card-title mb-0 pb-0">    </h5>
                                                                    </div>
                                                                    <div class="card-body text-primary">

                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <a href="agent_details/{{$x->id}}">
                                                                                <p class="text-justify"  style="color: black"> اسم العميل</p>
                                                                                <h3> {{$x->agents_name}}</h3>
                                                                                </a>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;


                                                                                <span class="fab fa-whatsapp text-info m-r-5 m-t-5">    {{$x->agent_phone1}}</span>
                                                                                &nbsp; &nbsp; &nbsp;&nbsp;
                                                                                <span class="fa fa-id-card text-info m-r-5 m-l-5">{{$x->id_num}}</span>
                                                                                <br>

                                                                                @if($x->status_id=1)
                                                                                    <h3>   <span class="label  text-success d-flex " style="font-weight: bold;">
                                                <div class="dot-label bg-success ml-1"></div>نشط
                                            </span></h3>
                                                                                @else
                                                                                    <h3>   <span class="label  text-danger d-flex " style="font-weight: bold;">
                                                <div class="dot-label bg-danger ml-1"></div>محظور
                                            </span></h3>
                                                                                @endif
                                                                            </div>


                                                                            <div class="col-sm " style="color: black">
                                                                                <ul class="list-group">
                                                                                    <li>
                                                                                        <h5>الحالة الاجتماعية</h5>
                                                                                        <p>{{$x->marital_status}}</p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h5>نوع السكن</h5>
                                                                                        <p>{{$x->Accommodation_type}}</p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h5> الشكاوي</h5>
                                                                                        <p>0</p>
                                                                                    </li>








                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-sm">
                                                                                <ul class="list-group">
                                                                                    <li>
                                                                                        <h5>الجنسية</h5>
                                                                                        <p>{{$x->nash}} </p>
                                                                                    </li>

                                                                                    <li>
                                                                                        <h5>المدينة</h5>
                                                                                        <p>{{$x->city_ar}}</p>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h5> عقود التوسط</h5>
                                                                                        <p>0</p>
                                                                                    </li>

                                                                                    <li>
                                                                                        <h5> عقود التشغيل</h5>
                                                                                        <p style="font-weight: bold;">{{\App\contract::where('id_num', $x->id_num)->count()}}</p>
                                                                                    </li>


                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <div class="col">
                                                                                    <p><button class="btn-primary-gradient" >   إضــافة شكوي </button></p>
                                                                                    <form action="rent_cont/{{$x->id}}/{{$x->id}}/{{$x->id}}/{{$x->id}}">
                                                                                    <p><button class="btn-primary-gradient" >   إضــافة عقد توسط </button></p>
                                                                                    </form>

                                                                                    <form action="rentcont/{{$x->id}}/">
                                                                                    <p><button class="btn-primary-gradient">  إضــافة عقد تشغيل  </button></p>
                                                                                    </form>
                                                                                    <p><button class="btn-primary-gradient">  اضافة ملاحظة  </button></p>

                                                                                    <a class="btn-danger-gradient" data-target="#modaldemo5" data-toggle="modal" href="">حظر </a>


                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                    <div class="card-footer">



                                                                        <a href="" class="btn m-b-5">
                                                                            <i class="fa fa-eye m-r-5"></i>
                                                                            <span>عرض المزيد</span>
                                                                        </a>
                                                                        <a href="" class="btn m-b-5">
                                                                            <i class="fa fa-edit m-r-5"></i>
                                                                            <span>تعديل</span>
                                                                        </a>
                                                                        <a href="" class="btn m-b-5">
                                                                            <i class="fa fa-trash"></i>
                                                                            <span>حذف</span>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>

                                                        <div class="tab-pane" id="tab{{$x->id+600002}}">
                                                            <div class="alert alert-danger mg-b-0" role="alert">
                                                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <strong>لا يوجد</strong> عقود توسط
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab{{$x->id+700003}}">
                                                                <?php
                                                                $contract=\App\contract::select('*')->where('agent_id',$x->id)->get()
                                                                ?>

                                                            <table class="table">
                                                                <tbody><tr>
                                                                    <td><b>رقم العقد </b></td>
                                                                    <td><b>اسم العاملة </b></td>
                                                                    <td><b> مدة العقد</b></td>
                                                                    <td><b> تاريخ الاضافة</b></td>
                                                                    <td><b>حالة العقد</b> </td>

                                                                </tr>
                                                                @foreach ($contract as $a)

                                                                    <td><b><a href="/contract_detils/{{$a->id }}"> {{$a->id}}</a></b></td>
                                                                    <td><b><a href="/maidsDetails/{{$a->maids_id}}"> {{$a->emp_name}}</a></b></td>
                                                                    <td><b>{{$a->Duration}} </b></td>
                                                                    <td><b>{{$a->created_at}} </b></td>
                                                                    <td><b>{{$a->status}} </b></td>


                                                                    </tr>
                                                                @endforeach
                                                                </tbody></table>
                                                        </div>

                                                        <div class="tab-pane" id="tab{{$x->id+800004}}">
                                                            <div class="alert alert-info" role="alert">
                                                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <strong>كشف حساب العميل</strong>  تحت الاجراء
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!---Prism Pre code-->


                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- نهاية كرت العميييييل  -->
                                @endforeach
                        </div>
                    </div>
                    <!-- row closed -->
                </div>
            </div>



    <!-- Container closed -->
    </div>
    </div>
    <!-- main-content closed -->
    </div>
    <div class="modal" id="modaldemo5">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger mg-b-20">هل متأكد من عملية حظر العميل</h4>
                    <p class="mg-b-20 mg-x-20">عند حظر العميل لا يمكن اضافة عقد تشغيل او توسط للعميل.</p><button aria-label="Close" class="btn ripple btn-danger pd-x-25" data-dismiss="modal" type="button">نعم</button>
                </div>
            </div>
        </div>
    </div>



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
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var agents_name = button.data('agents_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #agents_name').val(agents_name);
        })

    </script>

    <script>
        $(document).ready(function() {

            $('#rate').hide();



            $('input[type="radio"]').click(function() {
                if ($(this).attr('id') == 'type_return') {
                    $('#rate').hide();
                    $('#return').show();
                } else if ($(this).attr('id') == 'type_rate') {
                    $('#rate').show();
                    $('#return').hide();
                }

                else {

                    $('#rate').hide();
                    $('#return').hide();
                }
            });
        });

    </script>


@endsection
