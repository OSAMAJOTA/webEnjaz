@extends('layouts.master')
@section('title')
    تفاصيل العاملة
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> <a href="/maids"> ادارة العمالة </a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل العمالة </span>
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
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">


                    </div>

                </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0"> المعلومات الاساسية</h5>
                            </div>
                            <div class="card-body text-primary">
                                <div  class="row">
                                <div class="col-md-3">
                                    <table class="table table-striped">
                                        <tbody><tr>
                                            <td>الرقم المرجعى</td>
                                            <td>{{$maids->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>رقم العامل</td>
                                            <td>{{$maids->emp_num}}</td>
                                        </tr>
                                        <tr>
                                            <td>الإسم عربي</td>
                                            <td>	{{$maids->emp_name_ar}}</td>
                                        </tr>
                                        <tr>
                                            <td>الإسم إنجليزى</td>
                                            <td>{{$maids->emp_name_en}}</td>
                                        </tr>
                                        <tr>
                                            <td>رقم الهوية</td>
                                            <td>{{$maids->emp_id_num}}</td>
                                        </tr>
                                        </tbody></table>

                                </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td>الديانة</td>
                                                <td>{{$maids->emp_relegon}}</td>
                                            </tr>
                                            <tr>
                                                <td>الوظيفة</td>
                                                <td>{{$maids->emp_work}}</td>
                                            </tr>
                                            <tr>
                                                <td>جنس العامل/ه</td>
                                                <td>{{$maids->emp_gender}}</td>
                                            </tr>
                                            <tr>
                                                <td>رقم الحدود</td>
                                                <td>{{$maids->emp_hodod_num}}</td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td>اسم الجنسية</td>
                                                <td>{{$maids->emp_nash}}</td>
                                            </tr>
                                            <tr>
                                                <td>الراتب الأساسي</td>
                                                <td>{{$maids->emp_salary}}</td>
                                            </tr>
                                            <tr>
                                                <td>تاريخ السيرة الذاتيه</td>
                                                <td>{{$maids->created_at}}</td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                    <div class="col-md-3">
                                        صورة شخصية
                                        <div class="col-md-12">
                                            <img src="/Attachments_maids/{{$maids->id}}/{{$maids->file_name}}" width="200px" height="200px">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">بيانات الجواز </h5>
                            </div>
                            <div class="card-body text-primary">
                       <div class="row">
                           <div class="col-md-3">
                               <table class="table table-striped">
                                   <tbody><tr>
                                       <td>رقم جواز السفر </td>
                                       <td>{{$maids->emp_passport}} </td>
                                   </tr>
                                   <tr>
                                       <td>تاريخ اصدار جواز السفر </td>
                                       <td>{{$maids->emp_passport_date}} </td>
                                   </tr>
                                   <tr>
                                       <td>تاريخ انتهاء جواز السفر </td>
                                       <td>{{$maids->emp_passport_end_date}} </td>
                                   </tr>
                                   </tbody></table>
                           </div>
                           <div class="col-md-3">
                               <table class="table table-striped">

                                   <tbody><tr>
                                       <td>  أسم أحد الأقارب انجليزى </td>
                                       <td>{{$maids->emp_name_of_ahal_en}}  </td>
                                   </tr>
                                   <tr>
                                       <td>جوال احد الاقارب </td>
                                       <td>{{$maids->emp_name_of_ahal_phne}}  </td>
                                   </tr>
                                   <tr>
                                       <td>أسم أحد الأقارب عربى </td>
                                       <td>{{$maids->emp_name_of_ahal_ar}}  </td>
                                   </tr>

                                   </tbody></table>
                           </div>
                           <div class="col-md-3">
                               <table class="table table-striped">

                                   <tbody><tr>
                                       <td>مكان الاصدار عربى </td>
                                       <td>{{$maids->emp_isdar_en}}  </td>
                                   </tr>
                                   <tr>
                                       <td>مكان الاصدار انجليزى </td>
                                       <td>{{$maids->emp_isdar_en}}  </td>
                                   </tr>
                                   </tbody></table>
                           </div>

                                 </div>
                            </div>

                        </div>
                    </div>
                    </div>
                    <!--كرت-->
                    <div class="col-12 ">
                        <div class="card card-primary">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">البيانات الشخصية</h5>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td>تاريخ الميلاد</td>
                                                <td>{{$maids->age_date}}</td>
                                            </tr>
                                            <tr>
                                                <td>العمر</td>
                                                <td>{{$maids->age}}</td>
                                            </tr>
                                            <tr>
                                                <td>الحالة الاجتماعية</td>
                                                <td>{{$maids->emp_m_status}}</td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td>العنوان عربى</td>
                                                <td> {{$maids->emp_add_ar}}</td>
                                            </tr>
                                            <tr>
                                                <td>العنوان انجليزي</td>
                                                <td>{{$maids->emp_add_en}} </td>
                                            </tr>
                                            <tr>
                                                <td>عددالاطفال</td>
                                                <td>{{$maids->emp_num_of_ch}}</td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td>الوزن</td>
                                                <td>{{$maids->emp_weight}}</td>
                                            </tr>
                                            <tr>
                                                <td>الطول</td>
                                                <td>{{$maids->emp_length}}</td>
                                            </tr>
                                            <tr>
                                                <td>  المستوى التعليمى عربى</td>
                                                <td>{{$maids->emp_edu_ar}}</td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td>الجوال</td>
                                                <td>{{$maids->emp_phone}}</td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--نهاية الكرت-->
                    <!--كرت-->
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">خبرات سابقة</h5>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td> سبق له العمل</td>
                                                <td>{{$maids->emp_is_work}} </td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--نهاية الكرت-->
                    <!--كرت-->
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">المهارات </h5>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td> الطبخ</td>
                                                @if($maids->emp_cook==1)
                                                <td>نعم </td>
                                                @else
                                                    <td>لا </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td> الغسيل</td>
                                                @if($maids->emp_wash==1)
                                                    <td>نعم </td>
                                                @else
                                                    <td>لا </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td> التنظيف</td>
                                                @if($maids->emp_clean==1)
                                                    <td>نعم </td>
                                                @else
                                                    <td>لا </td>
                                                @endif
                                            </tr>
                                            </tbody></table>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td> التعامل مع الاطفال</td>
                                                @if($maids->emp_children==1)
                                                    <td>نعم </td>
                                                @else
                                                    <td>لا </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td> الخياطة</td>
                                                @if($maids->emp_tilor==1)
                                                    <td>نعم </td>
                                                @else
                                                    <td>لا </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td> قيادة السيارة</td>
                                                @if($maids->emp_drive==1)
                                                    <td>نعم </td>
                                                @else
                                                    <td>لا </td>
                                                @endif
                                            </tr>
                                            </tbody></table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--نهاية الكرت-->
                    <!--كرت-->
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">اللغات</h5>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">

                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td>اللغة العربية </td>
                                                <td>{{$maids->emp_arabic_lan}}</td>
                                            </tr>
                                            <tr>
                                                <td>اللغة الانجليزية </td>
                                                <td>{{$maids->emp_english_lan}}  </td>
                                            </tr>


                                            </tbody></table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--نهاية الكرت-->
                    <!--كرت-->
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">معلومات اضافية </h5>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-4">
                                        <table class="table table-striped">
                                            <tbody><tr>
                                                <td>
                                                    نوع العامل
                                                </td>
                                                <td>
                                                    <span class="fa fa-check m-r-5 m-t-5"></span> <b class="text-success">تشغيل مدة</b>

                                                </td>
                                            </tr>
                                            <tr class="m-t-5">
                                                <td>
                                                    داخل المملكة
                                                </td>
                                                <td>
                                                    <span class="fa fa-check m-r-5 m-t-5"></span> <b class="text-primary">داخل المملكة</b>
                                                </td>
                                            </tr>

                                            <tr class="m-t-5">
                                                <td>
                                                    عدد الايام منذ الدخول للمملكة
                                                </td>
                                                <td>
                                                </td>
                                            </tr>

                                            <tr class="m-t-5">
                                                <td>
                                                    هل تم نقل الكفالة
                                                </td>
                                                <td>
                                                    <span class="fa  m-r-5 m-t-5"></span> <b class="text-danger">لم يتم نقل الكفالة</b>
                                                </td>
                                            </tr>
                                            <tr class="m-t-5">
                                                <td>
                                                    الوكيل
                                                </td>
                                                <td>
                                                    <span class=" m-r-5 m-t-5"></span> <b class="text-primary"></b>
                                                </td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="m-t-0 header-title-small"><b>صورة من جواز السفر</b></h4>
                                        <div class="form-group">
                                            <a href="/Attachments_maids_pass/{{$maids->id}}/{{$maids->passport_pic}}" target="_blank">
                                                <img src="/Attachments_maids_pass/{{$maids->id}}/{{$maids->passport_pic}}" width="200px" height="200px">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h4 class="m-t-0 header-title-small"><b>صورة كامل الجسم</b></h4>
                                            <div class="form-group">
                                                <a href="/Attachments_maids_full/{{$maids->id}}/{{$maids->full_pic}}" target="_blank">
                                                    <img src="/Attachments_maids_full/{{$maids->id}}/{{$maids->full_pic}}" width="200px" height="200px">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--نهاية الكرت-->
                    <div class="col-12">
                        <div class="card card-primary">

                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="card overflow-hidden">

                                            <div class="card-body">
                                                <div class="panel-group1" id="accordion11">
                                                    <div class="panel panel-default  mb-4">
                                                        <div class="panel-heading1 bg-primary ">
                                                            <h4 class="panel-title1">
                                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFour1" aria-expanded="false">تاريخ العقود<i class="fe fe-arrow-left ml-2"></i></a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                            <div class="panel-body border">
                                                                <div class="table-responsive">
                                                                    <table class="table text-md-nowrap" id="example3" data-page-length="50">
                                                                        <thead>
                                                                        <tr>
                                                                            <th class="border-bottom-0"><b>نوع العقد</b></th>
                                                                            <th class="border-bottom-0"><b>رقم العقد</b></th>

                                                                            <th class="border-bottom-0"><b>اسم العميل</b></th>
                                                                            <th class="border-bottom-0"><b>تاريخ الاضافة</b></th>
                                                                            <th class="border-bottom-0"><b>مدة العقد الكاملة</b></th>
                                                                            <th class="border-bottom-0"><b>تاريخ البدء </b></th>
                                                                            <th class="border-bottom-0"> <b>تاريخ  الانهاء</b></th>
                                                                            <th class="border-bottom-0"><b>مدة العمل بالايام </b></th>
                                                                            <th class="border-bottom-0"><b>تم الانشاء بواسطة</b> </th>


                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>


                                                                        @foreach($maidHistory as $x)

                                                                            <tr>
                                                                                <td>{{$x->contract_type}}</td>
                                                                                <td><a href="/contract_detils/{{$x->contract_id }}" >{{$x->contract_id }}</a></td>
                                                                                <td><a href="" >{{$x->agents_name}}</a></td>
                                                                                <td>{{$x->created_at}}</td>
                                                                                <td>{{$x->Duration}}</td>
                                                                                <td>{{$x->str_date}}</td>
                                                                                <td>{{$x->end_date}}</td>
                                                                                    <?php
                                                                                    $start =  Carbon\Carbon::parse($x->str_date);
                                                                                    $now = Carbon\Carbon::parse($x->end_date);


                                                                                    $days_count = $start->diffInDays($now);

                                                                                    ?>
                                                                                @if($x->end_date)
                                                                                    <td><b>{{$days_count+1}} يوم</b></td>
                                                                                @else
                                                                                    <td><b>--</b></td>
                                                                                @endif

                                                                                <td>{{$x->Created_by}}</td>

                                                                            </tr>



                                                                        @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default mb-0">
                                                        <div class="panel-heading1  bg-primary">
                                                            <h4 class="panel-title1">
                                                                <a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive2" aria-expanded="false">حركات الايواء <i class="fe fe-arrow-left ml-2"></i></a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseFive2" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                            <div class="panel-body border">
                                                                <div class="alert alert-info" role="alert">
                                                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <strong> حركات الايواء</strong>  تحت الاجراء
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

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
