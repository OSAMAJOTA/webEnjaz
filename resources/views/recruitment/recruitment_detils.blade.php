@extends('layouts.master')
@section('title')
    تفاصيل العقد
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
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="/rent">  عقود التوسط</a> </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> تفاصيل العقد/{{$recruitment->agents_name}} </span>
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
    @if (session()->has('add_bonds'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافة سند قبض بنجاح",
                    type: "success"
                })
            }

        </script>



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








                    <!--نهاية الكرت-->
                    <!--كرت-->

                <div class="col-12 ">
                    <div class="card card-primary">

                        <div class="card-body text-primary">

                            <h4 class="m-t-0 header-title-small"><b>  {{$recruitment->agents_name}}</b></h4>

                            <div class="text-danger  pull-right ">

                                <a class="btn btn-info-gradient float-left mt-3 mr-2" href="/recruitment"  >
                                    رجوع
                                </a>
                                <a class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()" href="/print_cont/">
                                    <i class="mdi mdi-printer ml-1"></i>طباعة
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            <div class="col-12 ">
                <div class="card card-primary">

                    <div class="card-body text-primary">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="m-t-0 header-title-small"><b>المعلومات الاساسية </b></h4>
                                <table class="table table-striped m-0">
                                    <tbody>
                                    <tr>
                                        <td>رقم العقد</td>
                                        <td>{{$recruitment->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>نوع العقد</td>
                                        <td>توسط</td>
                                    </tr>
                                    <tr>
                                        <td>رقم عقد مساند</td>
                                        <td>{{$recruitment->musaned_cont}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            رقم عقد مساند التوثيق
                                        </td>
                                        <td>{{$recruitment->musaned_tawthiq}}</td>
                                    </tr>
                                    <tr>
                                        <td>اسم الفرع</td>
                                        <td>   {{$recruitment->companys_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>حالة العقد</td>
                                        <td>عقد جديد</td>
                                    </tr>

                                    <tr>
                                        <td>نوع عقد التوسط</td>
                                        <td>
                                            عقد مساند
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>تاريخ الانشاء</td>
                                        <td>{{$recruitment->created_at}}</td>
                                    </tr>

                                    <tr>
                                        <td>تم الانشاء بواسطة</td>
                                        <td> {{$recruitment->Created_by}}</td>
                                    </tr>

                                    <tr>
                                        <td>تاريخ التوقيع</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>شروط اخرى</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>تأمين العقد</td>
                                        <td>ليس لديه تأمين</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-4">
                                <h4 class="m-t-0 header-title-small"><b>معلومات اضافية</b></h4>
                                <table class="table table-striped m-0">
                                    <tbody>
                                    <tr>
                                        <td> <label for="contractEnd">مدة العقد</label></td>
                                        <td> سنتان</td>
                                    </tr>
                                    <tr>
                                        <td>عدد مرات الاتصال</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>تاريخ الوصول</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td> <label for="contractEnd">جهة الوصول الخاصة بالعميل</label></td>
                                        <td> {{$recruitment->destination}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h4 class="m-t-20 header-title-small"><b>الوكيل</b></h4>
                                <table class="table table-striped m-0">
                                    <tbody>
                                    <tr>
                                        <td>اسم الوكيل</td>
                                        <td><a href="/ar-sa/AgentAssignment/ViewAssignment?AssignmentTypeId=1"></a></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <br>

                            </div>


                            <div class="col-md-4">

                                <h4 class="m-t-0 header-title-small"><b>معلومات الرحلة</b></h4>
                                <table class="table table-striped m-0">
                                    <tbody>

                                    <tr>
                                        <td> <label for="contractEnd">جهة وصول الرحلة</label></td>
                                        <td> الرياض</td>
                                    </tr>
                                    <tr>
                                        <td>الخطوط الناقلة</td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td>وقت الوصول</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>رقم الرحلة</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>



















                <div class="col-12 ">
                    <div class="card card-primary">

                        <div class="card-body text-primary">
                 <div class="row">
                     <div class="col-md-4">
                         <h4 class="m-t-0 header-title-small"><b>بيانات التأشيرة </b></h4>
                         <table class="table table-striped m-0">
                             <tbody>
                             <tr>
                                 <td>رقم التأشيرة</td>
                                 <td>{{$recruitment->visa_number}}</td>
                             </tr>
                             <tr>
                                 <td> تاشيره تاهيل شامل</td>
                                 <td>
                                     لا
                                 </td>
                             </tr>
                             <tr>
                                 <td>تاريخ التأشيرة هجرى</td>
                                 <td>{{$recruitment->hijri_visa}}</td>
                             </tr>
                             <tr>
                                 <td>تاريخ التأشيرة</td>
                                 <td>{{$recruitment->date_visa}}</td>
                             </tr>
                             <tr>
                                 <td>الوظيفة</td>
                                 <td> {{$recruitment->work_emp}}</td>
                             </tr>
                             <tr>
                                 <td>حالة التأشيرة</td>
                                 @if($recruitment->hasVisa)
                                 <td class="">تم الاصدار</td>
                                 @else
                                     <td>اصدار تاشيرة</td>
                                 @endif
                             </tr>
                             <tr>
                                 <td>الجنسية</td>
                                 <td>{{$recruitment->nash}}</td>
                             </tr>


                             </tbody>
                         </table>
                     </div>
                     <div class="col-md-4">
                         <h2 class="m-t-0 header-title-small"><b>بيانات العميل</b></h2>
                         <table class="table table-striped m-0">
                             <tbody>
                             <tr>
                                 <td>اسم العميل</td>
                                 <td>{{$recruitment->agents_name}}   </td>
                             </tr>
                             <tr>
                                 <td>رقم الهوية</td>
                                 <td>{{$recruitment->id_num}}</td>
                             </tr>
                             </tbody>
                         </table>
                         <h2 class="m-t-0 header-title-small"><b>عميل نقل الكفالة</b></h2>
                         <table class="table table-striped m-0">
                             <tbody>
                             <tr>
                                 <td>اسم العميل</td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>رقم الهوية</td>
                                 <td></td>
                             </tr>
                             </tbody>
                         </table>

                     </div>

                </div>

                            </div>
                        </div>

                    </div>










                <div class="col-12 ">
                    <div class="card card-primary">

                        <div class="card-body text-primary">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="m-t-0 header-title-small"><b>بيانات العرض</b></h4>
                                    <table class="table table-striped m-0">
                                        <tbody>


                                        <tr>
                                            <td>تكلفة الطلب</td>
                                            <td><b>{{$recruitment->istgdam_cost}}</b></td>
                                        </tr>
                                        <tr>
                                            <td> خصم على تكلفة الطلب</td>
                                            <td><b>{{$recruitment->DiscountOfficeCosts}}</b></td>
                                        </tr>

                                        <tr>
                                            <td>مبلغ ضريبة القيمة المضافة</td>
                                            <td><b>{{$recruitment->cost_vat}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>خصم المدير</td>
                                            <td><b> - {{$recruitment->man_dis}}</b> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                تامين عقود العمالة المنزلية
                                            </td>
                                            <td><b>لا يوجد </b> </td>
                                        </tr>

                                        <tr>
                                            <td>الراتب</td>
                                            <td><b>{{$recruitment->salary}}</b> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="m-t-0 header-title-small"><b>اجمالى العقد</b></div>
                                    <div class="text-center">
                                        <h2 class="text-primary  font-100 ContractOfferPrice">{{$recruitment->total_value}}</h2>
                                        <h5>السعر الخاص بالتكلفة الكلية للعقد</h5>
                                        <div class="row">
                                            <div class="widget-detail-1 col-md-4">
                                                <h2 class="p-t-10 m-b-0"> {{$recruitment->sadad}}</h2>
                                                <p class="text-muted">تم سداد</p>
                                            </div>
                                            <div class="widget-detail-1 col-md-4">
                                                <h2 class="p-t-10 m-b-0"> 0 </h2>
                                                <p class="text-muted">المصروفات</p>
                                            </div>
                                            <div class="widget-detail-1 col-md-4 ">
                                                <h2 class="p-t-10 m-b-0  text-danger"> {{$recruitment->rest}} </h2>
                                                <p class="text-danger">المتبقى للدفع</p>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            </div>

                        </div>
                        <section> <br><br></section>
                        @if($recruitment-> rest>0)
                            <section class="row">

                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <strong>تنبيه! لم يتم دفع اجمالي التكلفة حتي الان </strong>
                                    </div>
                                </div>
                            </section>
                            <section class="row">

                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <strong> تاريخ السداد المتوقع لدفع القيمة المتبقية للعقد  {{$recruitment->exp_sadad}} </strong>
                                    </div>
                                </div>
                            </section>
                        @else
                            <section class="row">

                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <strong>تم سداد</strong>
                                    </div>
                                </div>
                            </section>
                        @endif
                    </div>



























                    <div class="card card-primary">

                        <div class="card-body text-primary">

                            <div class="row">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-12">
                                    <h4 class="m-t-0 header-title-small"><b> السندات  </b></h4>
                                    <div class="example">
                                        <div class="panel panel-primary tabs-style-2">
                                            <div class=" tab-menu-heading">
                                                <div class="tabs-menu1">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs main-nav-line">
                                                        <li><a href="#tab4" class="nav-link active" data-toggle="tab"> السندات</a></li>
                                                        @if($recruitment-> rest>0)
                                                            <li><a href="#tab5" class="nav-link" data-toggle="tab"> إضافة سند</a></li>
                                                        @endif

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel-body tabs-menu-body main-content-body-right border">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab4">
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0 table table-hover"
                                                                   style="text-align:center">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th scope="col"><b>رقم السند</b></th>
                                                                    <th scope="col"><b> نوع السند</b></th>
                                                                    <th scope="col"><b> نوع القبض</b></th>
                                                                    <th scope="col"><b>المبلغ</b> </th>
                                                                    <th scope="col"> <b>المبلغ مكتوب</b></th>
                                                                    <th scope="col"><b> تاريخ الانشاء</b></th>
                                                                    <th scope="col"><b>ملاحظات</b> </th>
                                                                    <th scope="col"><b>العمليات</b></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach ($bonds as $bonds)

                                                                    <tr>
                                                                        <td style="font-size: 13px">{{  $bonds->id }}</td>
                                                                        <td style="font-size: 13px">{{ $bonds->bonds_type }}</td>
                                                                        <td style="font-size: 13px">{{ $bonds->catch_type }}</td>
                                                                        <td style="font-size: 13px"> {{ $bonds->bonds_total }}</td>
                                                                        <td style="font-size: 13px">{{ $bonds->bonds_total_ar }}</td>
                                                                        <td style="font-size: 13px">{{ $bonds->created_at }}</td>
                                                                        <td style="font-size: 13px">{{ $bonds->comment }}</td>
                                                                        <td colspan="2" style="font-size: 15px">

                                                                            <a class="btn btn-outline-success btn-sm"
                                                                               href="/generate-pdf/{{$bonds->id}}"
                                                                               role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                                عرض</a>

                                                                            <a class="btn btn-outline-info btn-sm"
                                                                               href="/generate-pdf-download/{{$bonds->id}}"
                                                                               role="button"><i
                                                                                    class="fas fa-download"></i>&nbsp;
                                                                                تحميل</a>





                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>

                                                            </table>

                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab5">
                                                        <form action="/general_bonds_rec" method="post" enctype="multipart/form-data" id="myForm"
                                                              autocomplete="off">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label class="text-info">بيانات السند</label>
                                                                        <select class="form-control" name="" id="" required>
                                                                            <option class="form-control" value="">حدد نوع السند</option>
                                                                            <option class="form-control">سند قبض عقد</option>
                                                                        </select>

                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label class="text-black-50">المتبقي علي العقد</label>
                                                                        <input type="number" class="form-control" name="rest_in_cont" id="rest_in_cont" value="{{ $recruitment-> rest}}" readonly/>
                                                                        <label class="text-black-50" hidden>المتبقي علي الاساسي</label>
                                                                        <input type="number" class="form-control" name="rest_in_cont2" id="rest_in_cont2" value="{{ $recruitment-> rest}}" hidden />

                                                                    </div>

                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label class="text-black-50">نوع القبض</label>
                                                                        <select class="form-control" name="sadad_typ" id="sadad_typ" required>
                                                                            <option class="form-control" value=""></option>
                                                                            <option class="form-control" value="نقدآ">نقدآ</option>
                                                                            <option class="form-control" value="تحويل">تحويل</option>
                                                                        </select>

                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label class="text-black-50">المبلغ</label>
                                                                        <input type="number" class="form-control" value="0.00" required name="sadad_cont" id="sadad_cont" onkeyup="check_and_ar()"/>
                                                                        <label for="inputName" class="control-label" hidden > <span class="text-danger font-bold"></span> ضريبة مبلغ السداد </label>
                                                                        <input type="number" class="form-control" id="sadad_vat" name="sadad_vat" value="0"  readonly hidden >
                                                                        <label for="inputName" class="control-label" hidden > <span class="text-danger font-bold"></span>  القيمة </label>
                                                                        <input type="number" class="form-control" id="sadad_co" name="sadad_co" value="0"  readonly hidden>
                                                                        <input type="number" class="form-control" id="contract_id" name="contract_id" value="{{ $recruitment->id}}"  readonly hidden>

                                                                        <input type="text" class="form-control" id="sadad_ar" name="sadad_ar" value="" readonly hidden>
                                                                        <input type="text" class="form-control" id="sadad_co_ar" name="sadad_co_ar" value=""  readonly hidden>
                                                                        <input type="text" class="form-control" id="sadad_vat_ar" name="sadad_vat_ar" value=""  readonly hidden>
                                                                        <input type="text" class="form-control" id="agents_name" name="agents_name" value="{{$recruitment->agents_name}}" readonly required hidden >
                                                                    </div>


                                                                </div>
                                                                <hr>
                                                                <div class="row">

                                                                    <div class="col-md-6">

                                                                        <button class="btn btn-success ">حفظ</button>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
























                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card overflow-hidden">

                                <div class="card-body">
                                    <div class="panel-group1" id="accordion11">
                                        <div class="panel panel-default  mb-4">
                                            <div class="panel-heading1 bg-primary ">
                                                <h4 class="panel-title1">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFour1" aria-expanded="false">تحديثات العقد<i class="fe fe-arrow-left ml-2"></i></a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                <div class="panel-body border">

                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0 table table-hover"
                                                               style="text-align:center">
                                                            <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">#</th>
                                                                <th scope="col"> سبب التحديث</th>
                                                                <th scope="col">بواسطة</th>
                                                                <th scope="col">تاريخ العملية</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>22</td>
                                                                    <td>22</td>
                                                                    <td>11</td>


                                                                </tr>

                                                            </tbody>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default mb-0">
                                            <div class="panel-heading1  bg-primary">
                                                <h4 class="panel-title1">
                                                    <a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive2" aria-expanded="false"> الملاحظات <i class="fe fe-arrow-left ml-2"></i></a>

                                                </h4>
                                            </div>
                                            <div id="collapseFive2" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                <div class="panel-body border">
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0 table table-hover"
                                                               style="text-align:center">
                                                            <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">الملاحظات</th>
                                                                <th scope="col">التاريخ</th>
                                                                <th scope="col">بواسطة</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            @foreach ($comment as $x)

                                                                <tr>

                                                                    <td>{{ $x->comment }}</td>
                                                                    <td>{{ $x->created_at }}</td>
                                                                    <td>{{ $x->Created_by }}</td>

                                                                </tr>
                                                            @endforeach
                                                            </tbody>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>






                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
















                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card overflow-hidden">

                                <div class="card-body">
                                    <div class="panel-group1" id="accordion22">
                                        <div class="panel panel-default  mb-4">
                                            <div class="panel-heading1 bg-primary ">
                                                <h4 class="panel-title1">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion22" href="#collapseFour3" aria-expanded="false"> مرفقات العقد<i class="fe fe-arrow-left ml-2"></i></a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour3" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                <div class="panel-body border">

                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0 table table-hover"
                                                               style="text-align:center">
                                                            <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">#</th>
                                                                <th scope="col"> سبب التحديث</th>
                                                                <th scope="col">بواسطة</th>
                                                                <th scope="col">تاريخ العملية</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <tr>
                                                                <td>1</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>11</td>


                                                            </tr>

                                                            </tbody>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default mb-0">
                                            <div class="panel-heading1  bg-primary">
                                                <h4 class="panel-title1">
                                                    <a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion22" href="#collapseFive4" aria-expanded="false"> الشكاوي <i class="fe fe-arrow-left ml-2"></i></a>

                                                </h4>
                                            </div>
                                            <div id="collapseFive4" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                                <div class="panel-body border">
                                                    <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words </p>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
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
                        <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
                        <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>



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
                        <script>
                            function check_and_ar(){
                                var  rest_in_cont= document.getElementById('rest_in_cont').value;
                                var  rest_in_cont2 = document.getElementById('rest_in_cont2').value;
                                var sadad_cont= document.getElementById('sadad_cont').value;
                                var test_value=rest_in_cont2-sadad_cont;
                                if(test_value<0){
                                    alert('لا يمكن اضافة مبلغ اكبر من القيمة المتبقية علي العقد')
                                    document.getElementById('sadad_cont').value='0.00';
                                    document.getElementById('rest_in_cont').value=rest_in_cont2;
                                }else{
                                    document.getElementById('rest_in_cont').value=rest_in_cont2-sadad_cont;
                                    var sadad_vat=parseFloat(sadad_cont-(sadad_cont/1.15)).toFixed(2)

                                        document.getElementById('sadad_vat').value=sadad_vat;
                                    var sadad_co=parseFloat(sadad_cont/1.15).toFixed(2);
                                    document.getElementById('sadad_co').value=sadad_co;





                                    // تحويل اجمالي السداد الي نص
                                    var sadad_ar = document.getElementById("sadad_cont").value.split(".");

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

                            }
                        </script>
                        <script src="{{ URL::asset('assets/plugins/tafgeet/Tafqeet.js') }}"></script>
@endsection
