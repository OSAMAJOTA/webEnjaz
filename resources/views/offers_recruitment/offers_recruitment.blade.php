@extends('layouts.master')
@section('title')
    عروض واسعار التوسط
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
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
                <h4 class="content-title mb-0 my-auto"> عقود التوسط</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/    عروض واسعار التوسط</span>
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
                        <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                            <div class="panel-body border">
                                {{-- الصف الاول --}}
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label> المهنة
                                        </label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                            </div>
                                            <select class="form-control select2" name="status_id"   required>


                                                <option value="" selected>

                                                </option>
                                                <option value="الكل"> الكل </option>
                                                <option value="بانتظارالتوجيه"> عاملة منزلية  </option>
                                                <option value="بانتظار التواصل معه">  سائق خاص </option>


                                            </select>

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

                                    <div class="col-lg-3">
                                        <label> مدة التشغيل</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                            </div>
                                            <select class="form-control select2" name="status_id"   required>


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
                                {{-- الصف الثاني --}}




                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary"> بحث</button>
                                        &nbsp;	&nbsp;	&nbsp;

                                        <button type="button" onclick="location.href='/agents'" class="btn btn-dark">الغاء </button>









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
                            <form action="add_recruitment">
                                <button class="btn btn-info btn-block">

                                    <i
                                        class="fas fa-plus"></i>&nbsp;  اضافة

                                </button>
                            </form>
                        </div>




                    </div>
                </div>


            </div>



        <br>   <br>   <br>

    @foreach($offer as $offer)
    <!--   كرت العرض-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">


                    </div>

                </div>
                <div class="card-body">
                    <div class="panel-body table-responsive">
                        <div class="row">
                            <div class="branchname">شركة الانجاز المعتمد للاستقدام</div>
                            <div class="col-md-8">
                                <a href="/osama">

                                        <div class="row">
                                            <div class="col-md-12">

                                            </div>

                                            <div class="col-md-2">
                                                <p style="font-size:12px;">نوع العامل  </p>
                                                <h2 class="m-t-0 m-b-0" style="font-size:22px;">
                                                    @if($offer->emp_typ==1)
                                                        معين
                                                    @elseif($offer->emp_typ==2)
                                                        غير معين
                                                    @elseif($offer->emp_typ==3)
                                                        معروفة
                                                    @elseif($offer->emp_typ==0)
                                                        غير محدد
                                                    @else
                                                        تفويض
                                                    @endif                                      </h2>
                                            </div>
                                            <div class="col-md-2">
                                                <p style="font-size:12px;">الجنسية </p>
                                                <h2 class="m-t-0 m-b-0" style="font-size:22px;">{{$offer->nash}}</h2>
                                            </div>
                                            <div class="col-md-2">
                                                <p style="font-size:12px;">الوظيفة </p>
                                                <h2 class="m-t-0 m-b-0" style="font-size:22px;"> {{$offer->work}}  </h2>
                                            </div>

                                            <div class="col-md-2">
                                                <p style="font-size:12px;">سبق لة العمل </p>
                                                <h2 class="m-t-0 m-b-0" style="font-size:22px;"> {{$offer->emp_exp}}  </h2>
                                            </div>

                                            <div class="col-md-2">
                                                <p style="font-size:12px;">العمر </p>
                                                <h2 class="text-success" style="font-size:22px;"> -- </h2>
                                            </div>
                                            <div class="col-md-2">
                                                <p style="font-size:12px;">الديانة </p>
                                                <h2 class="text-success" style="font-size:22px;"> {{$offer->religion}}  </h2>
                                            </div>
                                        </div>


                                </a>
                            </div>

                            <div class="col-md-3">
                                <table class="table">
                                    <tbody><tr>
                                        <td>الراتب</td>
                                        <td>التكلفة</td>
                                        <td></td>
                                        <td>الاجمالي</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$offer->salary}} </b></td>
                                        <td><b>{{$offer->cost2}}</b></td>
                                        <td><b></b></td>
                                        <td><b>{{$offer->total_offer}}</b></td>
                                        <td style="width:60px;">
                                            <a href="" class="btn m-b-5 p-0 m-0">
                                                <i class="fa fa-edit m-r-5"></i>
                                            </a>
                                            <a onclick="" class="btn m-b-5 text-danger  p-0 m-0">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody></table>

                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <table class="table table-striped table-bordered dataTable">

                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--  نهاية كرت العرض-->
    @endforeach

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

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="sections/update" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="recipient-name" class="col-form-label">اسم القسم:</label>
                            <input class="form-control" name="sections_name" id="sections_name" type="text">
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
    <!-- delete -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                  type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="sections/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="sections_name" id="sections_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
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




    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var sections_name = button.data('sections_name')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #sections_name').val(sections_name);

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
