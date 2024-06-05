@extends('layouts.master')
@section('title')
    إضافة عقد توسط
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
    <link href="{{URL::asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />


<style>
    .loader {
        display: none; /* اخفاء اللودر افتراضيًا */
        position: fixed;
        left: 50%;
        top: 50%;
        width: 50px;
        height: 50px;
        margin: -25px 0 0 -25px; /* لضمان وجود اللودر في منتصف الشاشة */
        border: 10px solid #f3f3f3;
        border-radius: 50%;
        border-top: 10px solid #3498db;
        animation: spin 2s linear infinite;
        z-index: 1000; /* لضمان ظهور اللودر فوق كل العناصر الأخرى */
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }



</style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">عقود التشغيل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/    إضافة عقد توسط  </span>
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





            <div class="col-12">
                <form action="{{ route('recruitment.store') }}" method="post" enctype="multipart/form-data" id="myForm"
                      autocomplete="off">
                    {{ csrf_field() }}
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">بيانات العميل</h5>
                    </div>
                    <div class="card-body text-primary">
                        <div class="row" >

                            <div class="col-sm">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>رقم الهوية</label>
                                <input type="text" class="form-control" id="id_num" name="id_num" value="{{$agents->id_num}}" readonly required>

                                <input type="text" class="form-control" id="agent_id" name="agent_id" value="{{$agents->id}}" readonly hidden="hidden" >
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>الاسم عربى</label>
                                <input type="text" class="form-control" id="agents_name" name="agents_name" value="{{$agents->agents_name}}" readonly required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> جوال / الهاتف</label>
                                <input type="text" class="form-control" id="agent_phone1" name="agent_phone1" value="{{$agents->agent_phone1}}" readonly>
                            </div>



                        </div>
                        <div class="row" >
                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> حدد الفرع </label>
                                <select name="companys_name" id="companys_name" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="" selected>حدد الفرع</option>
                                    @foreach($companys as $x)
                                        <option value="{{$x->companys_name}}" >{{$x->companys_name}}</option>
                                    @endforeach



                                </select>
                            </div>
                            <div class="col-sm">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>رقم العقد في مساند </label>
                                <input type="text" class="form-control" id="musaned_cont" name="musaned_cont" value=""  >


                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> رقم عقد مساند التوثيق</label>
                                <input type="text" class="form-control" id="musaned_tawthiq" name="musaned_tawthiq" value=""  >
                            </div>





                        </div>
                    </div>

                </div>


            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">بيانات العامل </h5>
                    </div>
                    <div class="card-body text-primary">

                            <div class="d-flex justify-content-center">
                                <div class="row">
                                <label class="text"> نوع العامل</label>
                                </div>


                            </div>
                        <br>
                        <div class="row mg-t-10">
                            <div class="col-lg-3">
                                <label class="rdiobox"><input checked name="emp_typ"  type="radio" value="1" onclick="showElement(1)"  > <span> معين</span></label>
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <label class="rdiobox"><input  name="emp_typ" type="radio" value="2" onclick="showElement(2)" > <span>غير معين </span></label>
                            </div>
                            <div class="col-lg-3">
                                <label class="rdiobox"><input name="emp_typ" type="radio"   value="3" onclick="showElement(3)" > <span> تفويض</span></label>
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <label class="rdiobox"><input  name="emp_typ" type="radio" value="4" onclick="showElement(4)" > <span> معروفة</span></label>
                            </div>

                        </div>
<input type="text" name="emp_typ2" id="emp_typ2" value="1">
<br>
                        <div id="yes" style="display:none">
                            <div class="row">
                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>    العمر  </label>
                                    <select class="form-control" id="Age" name="Age"><option selected="selected" value="0">غير محدد</option>
                                        <option value="1">من 25 الى 35</option>
                                        <option value="10">من 50 الى 55</option>
                                        <option value="11">من 20 الى 25</option>
                                        <option value="12">من 20 الى 30</option>
                                        <option value="13">من 25الى 50</option>
                                        <option value="17">من 18 الى 30</option>
                                        <option value="18">من 31 الى 40</option>
                                        <option value="19">من 41 الى 50</option>
                                        <option value="2">من 35 الى 45</option>
                                        <option value="20">من 51 الى 60</option>
                                        <option value="21">من 61 الى 65</option>
                                        <option value="22">من 21 فاكثر</option>
                                        <option value="23">من 22 الي 40</option>
                                        <option value="24">من 22 إلى 30</option>
                                        <option value="25">من31 إلى 40</option>
                                        <option value="26">من 41 إلى 50</option>
                                        <option value="27">أكبرمن 50</option>
                                        <option value="28">25 الي 45</option>
                                        <option value="29">من 49 الي 49 </option>
                                        <option value="3">من 45 الى 55</option>
                                        <option value="30">من 46 الي 49 </option>
                                        <option value="4">اكبر من 55</option>
                                        <option value="5">من 25 الى 30</option>
                                        <option value="50">30 - 18</option>
                                        <option value="51">31 - 40</option>
                                        <option value="52">41 - 50</option>
                                        <option value="53">51 - 60</option>
                                        <option value="54">61 - 65</option>
                                        <option value="6">من 30 الى 35</option>
                                        <option value="7">من 35 الى 40</option>
                                        <option value="8">من 40 الى 45</option>
                                        <option value="9">من 45 الى 50</option>
                                    </select>
                                </div>

                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  الديانة </label>
                                    <select class="form-control" data-val="true"  id="religion" name="religion"><option selected="selected" value="غير محدد">غير محدد</option>
                                        <option value="مسلم">مسلم</option>
                                        <option value="غير مسلم">غير مسلم	</option>
                                    </select>
                                </div>

                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  سبق له العمل </label>
                                    <select class="form-control" id="emp_exp" name="emp_exp">
                                        <option value="غير محدد">غير محدد</option>
                                        <option value="سبق له العمل">سبق له العمل</option>
                                        <option value="لم يسبق له العمل">لم يسبق له العمل</option>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="inputName" class="control-label">    مؤهلات أخرى </label>
                                    <input type="text" class="form-control" id="another_exp" name="another_exp" >
                                </div>


                            </div>
                        </div>


                    </div>


                </div>
            </div>
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">بيانات العرض</h5>

                    </div>
                    <div class="card-body text-primary">
                        <div class="row">
                            <div class="col-sm">



                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> الجنسية</label>
                                <select name="nash" id="nash" class="form-control"  required onchange="get_offer_rec()">
                                    <!--placeholder-->
                                    <option value="" selected>حدد الجنسية</option>
                                    @foreach($nationalities as $x)
                                        <option value="{{$x->nationalities_name}}" >{{$x->nationalities_name}}</option>
                                    @endforeach
                                </select>
                                <br>

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>

                                    الوظيفة</label>
                                <select name="WORK" id="WORK" class="form-control"  required onchange="get_off_value()">
                                    <!--placeholder-->


                                </select>

                                <input type="text" class="form-control" id="work_emp" name="work_emp" required hidden="hidden">
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>طريقة السداد</label>
                                <select name="sadad_typ" id="sadad_typ" class="form-control" onchange="showsadad()" required  >
                                    <!--placeholder-->
                                    <option value="" selected>حدد السداد</option>
                                    <option value="نقدآ"  >نقدآ</option>

                                    <option value="تحويل">تحويل</option>


                                </select>
                                <br>

                                <br>


                            </div>



                            <div class="col-md-6">
                                <div class="m-t-0 header-title-small"><b>السعر</b></div>
                                <div class="">
                                    <table class="table table-striped m-0 pull-left">
                                        <tbody>
                                        <tr>
                                            <td> تكلفة الوكيل</td>
                                            <td><input type="text" class="form-control" id="wakel_cost" name="wakel_cost" value="0" readonly></td>
                                        </tr>

                                        <tr>
                                            <td>الراتب الخاص بالعرض</td>
                                            <td> <input type="text" class="form-control" id="salary_emp" name="salary_emp" value="0" readonly></td>
                                        </tr>


                                        </tbody>
                                    </table>

                                    <input type="text" class="form-control text-center" style="text-align:right;font-weight: bold;border: none; height: auto; font-size: 75px; background-color: transparent;" id="cost1" name="cost1" value="0" readonly>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">  بيانات التاشيرة </h5>
                    </div>
                    <div class="card-body text-primary">

                        <div class="d-flex justify-content-center">
                            <div class="row">
                                <label class="text"> بيانات التأشيرة </label>
                            </div>


                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                        <div class="row col-md-6">
                            <div class="col-lg-6">
                                <label class="rdiobox"><input  name="hasVisa" type="radio" value="1" onclick="showVisa(1)"> <span>توجد تأشيرة </span></label>
                            </div>
                            <div class="col-lg-6">
                                <label class="rdiobox"><input checked name="hasVisa" type="radio" value="2" onclick="showVisa(2)"> <span> اصدار تأشيرة </span></label>
                            </div>
                        </div>

                        </div>

                        <br>
                        <div id="visa" style="display:none">
                            <div class="row">

                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>     رقم التأشيرة </label>
                                    <input type="text"  class="form-control" id="visa_number" name="visa_number" required>
                                </div>


                                <div class="col-sm">

                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>     تاريخ التأشيرة هجرى </label>
                                    <input type="text" class="form-control" id="hijri_visa" name="hijri_visa" required >
                                </div>

                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>تاريخ التأشيرة  ميلادي </label>
                                    <input type="date"  class="form-control" id="date_visa" name="date_visa" required>
                                </div>


                            </div>
                        </div>
                        <div id="visa_pay" style="display:none">
                        <div class="row mg-t-10">
                            <div class="col-lg-3">
                                <label class="rdiobox"><input  name="visa_pay"  type="radio" value="1" onclick="add_visa_cost(1)"  > <span> مدفوعة</span></label>
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <label class="rdiobox"><input checked name="visa_pay" type="radio" value="2" onclick="add_visa_cost(2)" > <span> غير مدفوعة </span></label>
                            </div>


                        </div>
                        </div>

                </div>
            </div>
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header pb-0">
                            <h5 class="card-title mb-0 pb-0">تكاليف العرض</h5>

                        </div>
                        <div class="card-body text-primary">
                            <div class="row">
                                <div class="col-sm">



                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> جهة الوصول </label>
                                    <select name="destination" id="destination" class="form-control"  required>
                                        <!--placeholder-->
                                        <option value="" selected> جهة الوصول</option>
                                        @foreach($citys as $x)
                                            <option value="{{$x->citys_name}}" >{{$x->citys_name}}</option>
                                        @endforeach
                                    </select>
                                    <br>

                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>

                                        الراتب</label>

                                    <input type="text"  class="form-control" id="salary" name="salary" required>

                                </div>



                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="m-t-0 header-title-small"><b>الاجمالى</b></div>
                                        <div class="col-md-12">
                                            <table class="table   m-0">



                                                <tbody>
                                                <tr>
                                                    <td>تكلفة الاستقدام</td>
                                                    <td> <input type="text"  class="form-control text-center" id="istgdam_cost" name="istgdam_cost" value="0" required readonly>  </td>
                                                </tr>

                                                <tr>
                                                    <td> تكلفة الوكيل</td>
                                                    <td> <input type="text"  class="form-control text-center" id="wakell_cost" name="wakell_cost" value="0" required readonly></td>
                                                </tr>





                                                <tr>
                                                    <td>قيمة الضريبة </td>
                                                    <td>  <input type="text"  class="form-control text-center" id="cost_vat" name="cost_vat" value="0" required readonly></td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h2 class="text-custom   font-100 ContractOfferTotalCost" style="text-align:center;font-weight: bold;border: none; font-size: 70px;">
                                                    <input type="text" class="form-control text-center" style="text-align:right;font-weight: bold;border: none; height: auto; font-size: 75px; background-color: transparent;" id="total_value" name="total_value" value="0" readonlyr >
                                                    <input type="text" class="form-control text-center" style="text-align:right;font-weight: bold;border: none; height: auto; font-size: 75px; background-color: transparent;" id="tota" name="tota" value="0" hidden>

                                                </h2>
                                               <br>
                                                <h7>تكاليف العقد</h7>
                                            </div>
                                            <br>


                                        </div>
                                        <div class="form-group">
                                           <label class="text-success">خصم المدير</label>
                                         <br>
                                            <input class="form-control disableNegative"  id="man_dis" name="man_dis" type="text" value="0" onkeyup="man_disc()">
                                        </div>


                                        <div class="form-group">
                                            <label class="text-success">  خصم على التكاليف الخصم على تكاليف المكتب فقط و منها يتم تخفيض الضريبة</label>
                                            <br>
                                            <input class="form-control disableNegative" id="DiscountOfficeCosts" name="DiscountOfficeCosts" type="text" value="0" onkeyup="cost_disc()">
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0"> السداد </h5>
                    </div>
                    <div class="card-body text-primary">
                        <div class="row">
                            <div class="col-md-3">


                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> مبلغ السداد</label>
                                <input type="text" class="form-control" id="sadad" name="sadad" value="" onkeyup="mydsadad()"  required>
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> المتبقي </label>
                                <input type="number" class="form-control" id="rest" name="rest" value="0"  readonly >
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> ضريبة مبلغ السداد </label>
                                <input type="number" class="form-control" id="sadad_vat" name="sadad_vat" value="0"  readonly >
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>  القيمة </label>
                                <input type="number" class="form-control" id="sadad_co" name="sadad_co" value="0"  readonly >


                            </div>
                            <div class="col-md-3">

                                <div class="text-center">
                                    <div class="m-t-0 header-title-small"><b>المدفوع</b></div>
                                    <input style="text-align:center;color: #2c7ecd; font-size: 60px; height: 100px; background-color: white; font-weight: bold;border: none; " type="text" name="sadad2" id="sadad2" value="0.00" readonly >

                                    <div class="m-t-0 header-title-small"><b>المتبقي</b></div>


                                    <input style="text-align:center;color: #ee335e; font-size: 60px; height: 100px; background-color: white; font-weight: bold;border: none; " type="text" name="rest2" id="rest2" value="0.00" readonly >
                                    <div class="loader" id="loader"></div>
<div class="" id="exp">
                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" id="sadad_btn"

                                       data-price="" data-toggle="modal"
                                       href="#exampleModal2" title="تعديل"><i class="las la-pen">تاريخ السداد المتوقع</i></a>
                                    <input type="date" class="form-control" id="exp_sadad" name="exp_sadad" value=""  >

</div>
                                    <input type="text" class="form-control" id="sadad_ar" name="sadad_ar" value="" hidden >
                                    <input type="text" class="form-control" id="sadad_co_ar" name="sadad_co_ar" value=""  hidden>
                                    <input type="text" class="form-control" id="sadad_vat_ar" name="sadad_vat_ar" value=""  hidden>

                                </div>
                                </div>





                        </div>
                        <br>
                        <div class="col-sm-12" id="isal">
                        <p class="text-danger">* صيغة المرفق يجب ان تكون pdf,png,jpg </p>
                        <h5 class="card-title">ايصال التحويل</h5>

                        <div class="col-sm-12 ">
                            <input type="file" name="pic"  id="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                   data-height="70" >
                        </div><br>
                    </div>


                </div>
            </div>
            <div class="col-12">
                <div class="card card-primary">

                    <div class="card-body text-primary">
                        <div class="d-flex justify-content-center">
                            <button type="submit"  class="btn btn-primary">حفظ البيانات</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger"> رجوع</button>
                        </div>
            </div>



        <!-- row closed -->
    </div>
    <!-- row closed -->
            </form>



                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تاريخ السداد المتوقع</h5>
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
                                        <label for="recipient-name" class="col-form-label">حدد التاريخ :</label>
                                        <input class="form-control" name="exp_date_sadad" id="exp_date_sadad" type="date" >
                                    </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="getsadad_date()">تاكيد</button>
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




                    <script>
                        var date = $('.fc-datepicker').datepicker({
                            dateFormat: 'yy-mm-dd'
                        }).val();

                    </script>






        <script>

            function get_offer_rec(){
                $('select[name="WORK"]').empty();
                var emp_typ= document.getElementById("emp_typ2").value;
                var nash= document.getElementById("nash").value;
                if(emp_typ==2){

                    var Age= document.getElementById("Age").value;
                    var religion= document.getElementById("religion").value;
                    var emp_exp= document.getElementById("emp_exp").value;
                    $.ajax({
                        url: "{{ URL::to('get_offer_rec') }}/"+nash+"/"+emp_typ+"/"+Age+"/"+religion+"/"+emp_exp,
                        type: "GET",

                        dataType: "json",

                        success: function(data) {
                            if (Object.keys(data).length === 0) {

                                notif({
                                    msg: "لا يوجد عروض متاحة ",
                                    type: "error"
                                })

                            } else {

                                $('select[name="WORK"]').empty();
                                $('select[name="WORK"]').append("<option value=''>حدد الوظيفة</option>");
                                $.each(data, function (key, value) {

                                    $('select[name="WORK"]').append('<option value="' +
                                        key + '">' + value + '</option>');
                                });
                                notif({
                                    msg: " يوجد عروض متاحة ",
                                    type: "success"
                                })
                            }
                        },


                    });

                }
                else{
                    $.ajax({
                        url: "{{ URL::to('get_offer_rec_typ') }}/"+nash+"/"+emp_typ,
                        type: "GET",

                        dataType: "json",

                        success: function(data) {

                            if (Object.keys(data).length === 0) {

                                    notif({
                                        msg: "لا يوجد عروض متاحة ",
                                        type: "error"
                                    })

                            } else {
                            $('select[name="WORK"]').empty();
                            $('select[name="WORK"]').append("<option value=''>حدد الوظيفة</option>");
                            $.each(data, function (key, value) {

                                $('select[name="WORK"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                                notif({
                                    msg: " يوجد عروض متاحة ",
                                    type: "success"
                                })
                        }


                        },


                    });

                }



            }



    </script>







                    <script>
                        $(document).ready(function() {

                            $('select[name="Duration"]').on('change', function() {
                                var SectionId = $(this).val();
                                if (SectionId) {
                                    $.ajax({
                                        url: "{{ URL::to('getdataoffer') }}/" + SectionId,
                                        type: "GET",

                                        dataType: "json",
                                        success: function(data) {


                                            document.getElementById("emp_salary").value = data['emp_salary'];
                                            document.getElementById("tamin").value = data['tamin'];
                                            document.getElementById("cost").value = data['cost'];
                                            document.getElementById("countss").value = data['countss'];
                                            document.getElementById("vat_cost").value = data['vat_cost'];
                                            document.getElementById("Total").value = data['Total'];
                                            document.getElementById("tot").value = data['Total'];
                                            document.getElementById("tota").value = data['cost'];
                                            document.getElementById("cost3").value =data['cost'];
                                            document.getElementById("tamin3").value = data['tamin'];
                                            document.getElementById("start_date").value = "{{ date('Y-m-d') }}";
                                            document.getElementById("rest2").value =data['Total'];

                                            var add_days=  data['countss'];

                                            var date=new Date(document.getElementById("start_date").value);
                                            var new_date =new Date(date.setDate(date.getDate() +parseInt(add_days)-1)) ;
                                            document.getElementById("end_date").valueAsDate =new_date;



                                        },

                                    });

                                } else {
                                    console.log('AJAX load did not work');
                                }


                            });

                        });



                    </script>


                    <script>
                        function getsadad_date(){
                            var exp_date= new Date(document.getElementById("exp_date_sadad").value);

                            document.getElementById("exp_sadad").valueAsDate =exp_date;

                        }
                    </script>

                    <script>
                        function inc_date(){
                            var add_days=document.getElementById("countss").value;

                            var date=new Date(document.getElementById("start_date").value);
                            var new_date =new Date(date.setDate(date.getDate() +parseInt(add_days)-1)) ;
                            document.getElementById("end_date").valueAsDate =new_date;
                        }
                    </script>

                    <script>

                        function  mydsadad() {
                            const loader = document.getElementById('loader');
                            const inputField = document.getElementById('sadad');

                            function showLoader() {
                                loader.style.display = 'block';
                            }

                            function hideLoader() {
                                loader.style.display = 'none';
                            }

                            // مثال: إظهار اللودر عند تغيير المدخل
                            inputField.addEventListener('input', function() {
                                showLoader();
                                // محاكاة وقت تحميل (يمكنك استبدال هذا بقيمتك الخاصة)
                                setTimeout(hideLoader, 1000);
                            });

                            var total = parseFloat(document.getElementById("total_value").value);
                            var sadad = parseFloat(document.getElementById("sadad").value);
                            var new_sadad=total-sadad;
                         if(sadad > total){
                            alert("مبلغ السداد اكبر من الاجمالي ");
                             document.getElementById("sadad").value="0.00";
                             document.getElementById("rest").value = "0.00";
                             document.getElementById("rest2").value = "0.00";
                             document.getElementById("sadad2").value = "0.00";
                                  }else{


                             sumq = parseFloat(new_sadad).toFixed(2);



                             document.getElementById("rest").value = sumq;
                             document.getElementById("rest2").value = sumq;



                             document.getElementById("sadad2").value = sadad;
                             var sadad_vat=sadad-(sadad/1.15);
                             var sadad_co=sadad/1.15;

                             document.getElementById("sadad_co").value = parseFloat(sadad_co).toFixed(2);
                             document.getElementById("sadad_vat").value = parseFloat(sadad_vat).toFixed(2);



                                // تحويل اجمالي السداد الي نص
                             var sadad_ar = document.getElementById("sadad2").value.split(".");

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


                             if(sumq > 0 ){

                                 $('#exp').show();
                                 $('#exp_sadad').prop('required',true);
                                 document.getElementById("required").setAttribute("required","required");
                             }else


                             $('#exp_sadad').prop('required',false);
                             $('#exp').hide();



                         }






                        }



                    </script>

                    <script>
                        function mydiscount() {

                            var total = parseFloat(document.getElementById("Total").value);
                            var man_des = parseFloat(document.getElementById("man_discount").value);
                            var new_total=total-man_des;





                                sumq = parseFloat(new_total).toFixed(2);



                                document.getElementById("tot").value = sumq;
                                var new_t=sumq;



                                var emp_salary=parseFloat(document.getElementById("emp_salary").value);
                                var emp_tot=new_t-emp_salary;

                            var new_cost=parseFloat(emp_tot/1.15).toFixed(2);

                                var new_vat=parseFloat(new_t-new_cost-emp_salary).toFixed(2);

                            document.getElementById("cost").value = new_cost;

                            document.getElementById("vat_cost").value = new_vat;
                            document.getElementById("tota").value = new_cost;

                            }



                    </script>
                    <script>
                        function showsadad(){
                        var val= document.getElementById('sadad_typ').value;



                            if(val=='نقدآ')
                            {

                                $('#isal').hide();
                                $("#pic").removeAttr("required");

                            }
                            else
                            {
                                $('#isal').show();
                                document.getElementById("pic").setAttribute("required","required");


                            }
                        }
                    </script>
                    <script>
                        $(document).ready(function() {

                            $('#isal').hide();
                            $('#connected_con_id').hide();

                        });


                    </script>






                    <script src="{{ URL::asset('assets/plugins/tafgeet/Tafqeet.js') }}"></script>

                    <script>
                        function main (){
                            var fraction = document.getElementById("txt").value.split(".");

                            if (fraction.length == 2){
                                document.getElementById ("sadad_ar").value =  tafqeet (fraction[0]) + " فاصلة " + tafqeet (fraction[1] );
                            }
                            else if (fraction.length == 1){
                                document.getElementById ("sadad_ar").value =  tafqeet (fraction[0])+'ريال فقط لا غير';
                            }
                        }
                    </script>



                    <!--Internal Fileuploads js-->
                    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
                    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
                    <!--Internal Fancy uploader js-->
                    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
                    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
                    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
                    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
                    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
                    <!--Internal  Notify js -->
                    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
                    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
                    <script src="{{ URL::asset('assets/plugins/tafgeet/Tafqeet.js') }}"></script>




                    <script>
                        function showElement(val)
                        {
                            if(val==2)
                            {
                                document.getElementById("wakel_cost").value = 0;
                                document.getElementById("salary_emp").value = 0;
                                document.getElementById("cost1").value = 0;
                                document.getElementById("salary").value = 0;

                                document.getElementById("istgdam_cost").value = 0;
                                document.getElementById("wakell_cost").value = 0;
                                document.getElementById("cost_vat").value = 0;
                                document.getElementById("total_value").value = 0;
                                document.getElementById('nash').value='حدد الجنسية';

                                document.getElementById('yes').style.display='block';


                            }else{
                                document.getElementById("wakel_cost").value = 0;
                                document.getElementById("salary_emp").value = 0;
                                document.getElementById("cost1").value = 0;
                                document.getElementById("salary").value = 0;

                                document.getElementById("istgdam_cost").value = 0;
                                document.getElementById("wakell_cost").value = 0;
                                document.getElementById("cost_vat").value = 0;
                                document.getElementById("total_value").value = 0;
                                document.getElementById('nash').value='حدد الجنسية';


                                document.getElementById('yes').style.display='none';

                            }
                            document.getElementById('emp_typ2').value=val;

                        }
                    </script>

                    <script>
                        function showVisa(val)
                        {
                            if(val==1)
                            {


                                document.getElementById('visa').style.display='block';
                                document.getElementById('visa_pay').style.display='none';
                                $('#hijri_visa').hijriDatePicker({
                                    hijri: true,
                                    showSwitcher: true
                                });

                            }else{
                                document.getElementById('visa').style.display='none';
                                document.getElementById('visa_pay').style.display='block';
                                $('#hijri_visa').hijriDatePicker({
                                    hijri: true,
                                    showSwitcher: true
                                });
                            }

                        }
                    </script>
                    <script>
                        function get_off_value()
                        {


                               var offer_id=document.getElementById('WORK').value;

                            $.ajax({
                                url: "{{ URL::to('getdataoffer_value') }}/" + offer_id,
                                type: "GET",

                                dataType: "json",
                                success: function(data) {


                                    document.getElementById("work_emp").value = data['work'];
                                    document.getElementById("wakel_cost").value = data['outcost2'];
                                    document.getElementById("salary_emp").value = data['salary'];
                                    document.getElementById("cost1").value = data['cost2'];
                                    document.getElementById("salary").value = data['salary'];

                                    document.getElementById("istgdam_cost").value = data['cost2'];
                                    document.getElementById("wakell_cost").value = data['outcost2'];
                                    document.getElementById("cost_vat").value = data['vat_cost'];
                                    document.getElementById("total_value").value = data['total_offer'];
                                    document.getElementById("tota").value = data['total_offer'];




                                },

                            });


                        }
                    </script>


                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <!-- تضمين مكتبة Hijri Date Picker -->
                    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.1.0/moment-hijri.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@qasemzadeh/hijri-datepicker@1.1.2/dist/js/bootstrap-hijri-datepicker.min.js"></script>

                    <script>
                        function man_disc()
                        {
                          var total= document.getElementById("tota").value;

                            var man_dis= document.getElementById("man_dis").value;

                            var new_val= parseFloat(total-man_dis).toFixed(2);
                           document.getElementById("total_value").value=new_val;

                                }
                    </script>
                    <script>
                        function cost_disc()
                        {

                            var cost=parseFloat(document.getElementById("cost1").value);

                            var wakell_cost=parseFloat(document.getElementById("wakell_cost").value);

                            var DiscountOfficeCosts=parseFloat(document.getElementById("DiscountOfficeCosts").value);



                            var new_cost=parseFloat(cost-DiscountOfficeCosts);
                            var new_vat=parseFloat(new_cost*0.15);

                            var new_total=parseFloat((new_cost)+(new_vat)+(wakell_cost)).toFixed(2);

                            document.getElementById("istgdam_cost").value=new_cost;
                            document.getElementById("cost_vat").value=new_vat;
                            document.getElementById("total_value").value=new_total;



                        }
                    </script>
                    <script>
                        $(document).ready(function() {

                        });
                    </script>




                    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
                    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>                 <!--Internal  Form-elements js-->
@endsection
