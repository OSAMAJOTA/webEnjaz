@extends('layouts.master')
@section('title')
الوكلاء
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



    </style>

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الوكلاء   </span>
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
                                            <div class="panel-heading1 bg-primary " style="background-color: #3a4d67  !important;">
                                                <h4 class="panel-title1">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFour1" aria-expanded="false">فلاتر البحث<i class="fe fe-arrow-left ml-2"></i></a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                <div class="panel-body border">
                                                    {{-- الصف الاول --}}
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label> اسم الوكيل </label>
                                                            <div class="input-group sm ">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                                            </div><!-- input-group -->
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <label> رقم الهاتف</label>
                                                            <div class="input-group mb-4">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                                                </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="" type="text">
                                                            </div><!-- input-group -->
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <label> البريد الالكتروني</label>
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
                                                                <select class="form-control select2" name="status_id"   required>


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

                                                    </div>
                                                    {{-- الصف الثاني --}}

                                                    <div class="row">


                                                        <div class="col-lg-3">
                                                            <label> نوع الوكيل
                                                            </label>
                                                            <div class="input-group mb-4">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                                                </div>
                                                                <select class="form-control select2" name="status_id"   required>


                                                                    <option value="" selected>

                                                                    </option>
                                                                    <option value="الكل"> الكل </option>
                                                                    <option value="بانتظارالتوجيه">  توسط </option>
                                                                    <option value="بانتظار التواصل معه">  تشغيل </option>


                                                                </select>

                                                            </div><!-- input-group -->
                                                        </div>




                                                    </div>

                                                    <div class="row">





                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="example">
                                        <div class="row row-xs wd-xl-80p">
                                            <div class="col-sm-6 col-md-2">
                                                <button class="btn btn-primary btn-block">



                                                    <i
                                                        class="fas fa-print"></i>&nbsp; طباعة</a>

                                                </button>
                                            </div>


                                            <div class="col-sm-6 col-md-2">
                                                <form action="wakel/create">
                                                    <button class="btn btn-info btn-block">

                                                        <i
                                                            class="fas fa-plus"></i>&nbsp;  اضافة وكيل

                                                    </button>
                                                </form>
                                            </div>




                                        </div>
                                    </div>


                            </div>
                        </div>
                            {{ $wakel->links() }}

                            @foreach($wakel as $x)
                            <!--  كرت الوكيل  -->
                            <div class="col-12 ">
                                <div class="card card-secondary">
                                    <div class="card-header pb-0">
                                        <div class="branchname">شركة الانجاز المعتمد للاستقدام</div>

                                    </div>
                                    <div class="card-body text-secondary">
                                        <div class="row">
                                            <div class="col-md-3 text-center">
                                                <h1 class="text-primary" style="font-size:20px">
                                                    <a href="/ar-sa/Agent/ViewAgent/a1f42c55-af74-459f-b3e3-4b7fbc7bd3a7"> {{$x->wakel_name}}</a>

                                                </h1>
                                                <h4 style="font-size:14px">{{$x->nash}}</h4>
                                            </div>

                                            <div class="col-md-3">
                                                <h6>البريد الالكترونى</h6>
                                                <h2 class="text-primary" style="font-size:20px">{{$x->email}}</h2>
                                                <h7 class="text-custom"></h7>
                                            </div>

                                            <div class="col-md-1">
                                                <h6>رخصة الوكيل </h6>
                                                {{$x->wakel_id}}
                                            </div>

                                            <div class="col-md-2">
                                                <h6>جوال / الهاتف</h6>
                                                <h5 class="text-custom">{{$x->phone}} </h5>
                                            </div>

                                            <div class="col-md-1">
                                                <h6 style="font-size:9px;">ATT </h6>
                                                <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="0 عقد">0<span class="fa fa-file-text text-primary p-l-r-10"></span></a>
                                                <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="0 ملفات">0<span class="fa fa-paperclip text-primary p-l-r-10"></span></a>
                                            </div>

                                            <div class="col-md-2">
                                                <ul class="list-group control m-b-0 user-list">
                                                    <li class="list-group-item">
                                                        <a href="">
                                                            <i class="fas fa-eye m-r-5"></i>
                                                            <span>عرض  ارساليات العقود</span>
                                                        </a>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <a href="">
                                                            <span class="fa fa-edit m-r-5"></span>
                                                            تعديل
                                                        </a>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <a href="" class="text-danger">
                                                            <i class="fa fa-trash"></i>
                                                            <span>حذف</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- نهاية كرت الوكيل  -->
                            @endforeach
                        <!-- row closed -->
                    </div>
                </div>
                    {{ $wakel->links() }}


                <!-- Container closed -->
            </div>
        </div>
        <!-- main-content closed -->
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
