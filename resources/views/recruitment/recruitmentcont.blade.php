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
                <form action="{{ route('rent.store') }}" method="post" enctype="multipart/form-data" id="myForm"
                      autocomplete="off">
                    {{ csrf_field() }}
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">بيانات العميل</h5>
                    </div>
                    <div class="card-body text-primary">
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
                                <label class="rdiobox"><input checked name="rdio" type="radio" value="1" onclick="showElement(2)"> <span> معين</span></label>
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <label class="rdiobox"><input  name="rdio" type="radio" value="2" onclick="showElement(1)"> <span>غير معين </span></label>
                            </div>
                            <div class="col-lg-3">
                                <label class="rdiobox"><input name="rdio" type="radio"  value="3" onclick="showElement(3)"> <span> تفويض</span></label>
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <label class="rdiobox"><input  name="rdio" type="radio" value="4" onclick="showElement(4)"> <span> معروفة</span></label>
                            </div>

                        </div>

<br>
                        <div id="yes" style="display:none">
                            <div class="row">
                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>    العمر  </label>
                                    <select name="Accommodation_type" id="Accommodation_type" class="form-control"  required>
                                        <!--placeholder-->
                                        <option value="" selected disabled>حدد  </option>


                                    </select>
                                </div>

                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  الديانة </label>
                                    <select name="Accommodation_type" id="Accommodation_type" class="form-control"  required>
                                        <!--placeholder-->
                                        <option value="" selected disabled>حدد  </option>


                                    </select>
                                </div>

                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  سبق له العمل </label>
                                    <select name="Accommodation_type" id="Accommodation_type" class="form-control"  required>
                                        <!--placeholder-->
                                        <option value="" selected disabled>حدد  </option>


                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>    مؤهلات أخرى </label>
                                    <input type="text" class="form-control" id="home_phone" name="home_phone" required>
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
                                <select name="nash" id="nash" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="" selected>حدد الجنسية</option>
                                    @foreach($nationalities as $x)
                                        <option value="{{$x->nationalities_name}}" >{{$x->nationalities_name}}</option>
                                    @endforeach
                                </select>
                                <br>

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>

                                    الوظيفة</label>
                                <select name="WORK" id="WORK" class="form-control"  required>
                                    <!--placeholder-->
                                    @foreach($careers as $x)
                                        <option value="{{$x->careers_name}}" selected>{{$x->careers_name}}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>طريقة السداد</label>
                                <select name="sadad_typ" id="sadad_typ" class="form-control" onchange="showsadad()" required  >
                                    <!--placeholder-->
                                    <option value="نقدآ" selected >نقدآ</option>

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
                                            <td> <span class="AgentCostInRiyalslbl">3639.85</span></td>
                                        </tr>

                                        <tr>
                                            <td>الراتب الخاص بالعرض</td>
                                            <td> <span class="OfferSalarylbl">900</span></td>
                                        </tr>


                                        </tbody>
                                    </table>
                                    <h2 class="text-custom text-center  font-100 ContractOfferPrice" style="text-align:right;font-weight: bold;border: none; font-size: 55px;">2487.09</h2>
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
                                <label class="rdiobox"><input  name="rdio" type="radio" value="1" onclick="showVisa(1)"> <span>توجد تأشيرة </span></label>
                            </div>
                            <div class="col-lg-6">
                                <label class="rdiobox"><input checked name="rdio" type="radio" value="2" onclick="showVisa(2)"> <span> اصدار تأشيرة </span></label>
                            </div>
                        </div>

                        </div>

                        <br>
                        <div id="visa" style="display:none">
                            <div class="row">

                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>     رقم التأشيرة </label>
                                    <input type="text"  class="form-control" id="home_phone" name="home_phone" required>
                                </div>


                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>     تاريخ التأشيرة هجرى </label>
                                    <input type="date"  class="form-control" id="home_phone" name="home_phone" required>
                                </div>

                                <div class="col-sm">
                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>تاريخ التأشيرة  ميلادي </label>
                                    <input type="date"  class="form-control" id="home_phone" name="home_phone" required>
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



                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> الجنسية</label>
                                    <select name="nash" id="nash" class="form-control"  required>
                                        <!--placeholder-->
                                        <option value="" selected> جهة الوصول</option>
                                        @foreach($nationalities as $x)
                                            <option value="{{$x->nationalities_name}}" >{{$x->nationalities_name}}</option>
                                        @endforeach
                                    </select>
                                    <br>

                                    <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>

                                        الراتب</label>

                                    <input type="text"  class="form-control" id="home_phone" name="home_phone" required>

                                </div>



                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="m-t-0 header-title-small"><b>الاجمالى</b></div>
                                        <div class="col-md-12">
                                            <table class="table   m-0">
                                                <input data-val="true" data-val-number="The field AgentCostInRiyals must be a number." data-val-required="The AgentCostInRiyals field is required." id="AgentCostInRiyals" name="AgentCostInRiyals" type="hidden" value="3639.85">

                                                <input data-val="true" data-val-number="The field VATPercent must be a number." data-val-required="The VATPercent field is required." id="VATPercent" name="VATPercent" type="hidden" value="15">
                                                <tbody>
                                                <tr>
                                                    <td>تكلفة الاستقدام</td>
                                                    <td> <span class="ContractOfferPricelbl">2487.09</span>    </td>
                                                </tr>
                                                <tr class="DiscountOfficeCoststr" style="display: none;">
                                                    <td> خصم على   تكلفة الاستقدام</td>
                                                    <td> <span class="DiscountOfficeCostslbl">-0</span></td>
                                                </tr>
                                                <tr>
                                                    <td> تكلفة الوكيل</td>
                                                    <td> <span class="AgentCostInRiyalslbl">3639.85</span></td>
                                                </tr>

                                                <tr class="Ispaidtr" style="display: none;">
                                                    <td>تكلفة التأشيرة </td>
                                                    <td>2000</td>
                                                </tr>
                                                <tr class="otherExpencestr" style="display: none;">
                                                    <td>تكاليف أخرى </td>
                                                    <td> <span class="otherExpenceslbl">0</span></td>
                                                </tr>
                                                <tr class="ContractInsuranceAmounttr" style="display: none;">
                                                    <td>
                                                        تامين عقود العمالة المنزلية
                                                    </td>
                                                    <td> <span class="ContractInsuranceAmountlbl">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td>قيمة الضريبة </td>
                                                    <td> <span class="TaxValue">373.06</span></td>
                                                </tr>
                                                <tr class="AdminDiscounttr" style="display: none;">
                                                    <td>خصم  </td>
                                                    <td> <span class="AdminDiscountlbl">-0</span></td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h2 class="text-custom   font-100 ContractOfferTotalCost" style="text-align:center;font-weight: bold;border: none; font-size: 70px;">6500.00</h2>
                                               <br>
                                                <h7>تكاليف العقد</h7>
                                            </div>
                                            <br>


                                        </div>
                                        <div class="form-group">
                                           <label class="text-success">خصم المدير</label>
                                         <br>
                                            <input class="form-control disableNegative" data-val="true" data-val-number="The field خصم المدير must be a number." data-val-required="The خصم المدير field is required." id="AdminDiscount" name="AdminDiscount" type="text" value="0">
                                        </div>


                                        <div class="form-group">
                                            <label class="text-success">  خصم على التكاليف الخصم على تكاليف المكتب فقط و منها يتم تخفيض الضريبة</label>
                                            <br>
                                            <input class="form-control disableNegative" data-val="true" data-val-number="The field DiscountOfficeCosts must be a number." data-val-required="The DiscountOfficeCosts field is required." id="DiscountOfficeCosts" name="DiscountOfficeCosts" type="text" value="0">
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
            $(document).ready(function() {

            $('select[name="nash"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('nash') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            document.getElementById("emp_salary").value = "0";
                            document.getElementById("tamin").value = "0";
                            document.getElementById("cost").value = "0";
                            document.getElementById("countss").value = "0";
                            document.getElementById("vat_cost").value = "0";
                            document.getElementById("Total").value = "0";
                            document.getElementById("tot").value = "0";
                            document.getElementById("tota").value = "0.00";
                            document.getElementById("cost3").value = "0.00";
                            document.getElementById("tamin3").value = "0.00";
                            document.getElementById("man_discount").value = "0.00";
                            document.getElementById("rest2").value =  "0.00";
                            document.getElementById("sadad2").value = "0.00";
                            document.getElementById("rest").value =  "0.00";
                            document.getElementById("sadad").value =  "";

                            $('select[name="Duration"]').empty();
                            $('select[name="Duration"]').append("<option value=''>حدد المدة</option>");
                            $.each(data, function(key, value) {

                                $('select[name="Duration"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });



    </script>




                    <script>
                        function emp_numm(){
                            var emp_num = document.getElementById("emp_num").value
                            document.getElementById("emp_name").value = "";
                            document.getElementById("emp_id").value ="";
                            document.getElementById("connected").value = "";
                            document.getElementById("alert").value = "";
                            document.getElementById("alert2").value = "";
                            $('#connected_con_id').hide();
                            document.getElementById("maid_img").setAttribute("src",'');
                                if (emp_num) {
                                    $.ajax({
                                        url: "{{ URL::to('getemp_name') }}/" + emp_num,
                                        type: "GET",

                                        dataType: "json",

                                        success: function(data) {


                                            document.getElementById("emp_name").value = data['emp_name_ar'];
                                            document.getElementById("emp_id").value = data['id'];
                                            document.getElementById("connected").value = data['connected'];
                                            document.getElementById("connected_con_id").value = data['connected_con_id'];

                                            document.getElementById("maid_img").setAttribute("src",'/Attachments_maids/'+data['id']+'/'+data['file_name']);

                                            var connected = document.getElementById("connected").value
                                            if(connected==0){
                                                document.getElementById("alert").value = "متاحه للتأجير";
                                                $('#alert').prop('required',false);
                                                document.getElementById("alert2").value = "";
                                                $('#connected_con_id').hide();
                                            }else{
                                                $('#alert').prop('required',true);


                                                document.getElementById("alert2").value = " مربوطه بعقد رقم";
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


                            var total = parseFloat(document.getElementById("tot").value);
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




                    <script>

                        function no_emp(){
                          var btn= document.getElementById("btn_select_emp").value;
                          if(btn=="اضافة عاملة"){
                              $( "#emp_num" ).prop( "disabled", false );
                              $( "#emp_id" ).prop( "required", true );
                              $( "#btn_select_emp" ).val( "لا يوجد عامل في العقد" );
                              $( "#btn_select_emp" ).prop( "class", 'btn btn-primary');

                              document.getElementById("emp_name").value = "";
                              document.getElementById("emp_num").value = "";
                              document.getElementById("emp_id").value ="";
                              document.getElementById("connected").value = "";
                              document.getElementById("alert").value = " ";
                              document.getElementById("alert2").value = "";
                              $('#connected_con_id').hide();
                              document.getElementById("maid_img").setAttribute("src",'');
                          }else{
                            $( "#emp_num" ).prop( "disabled", true );
                              $( "#emp_id" ).prop( "required", false );
                            $( "#btn_select_emp" ).val( "اضافة عاملة" );
                            $( "#btn_select_emp" ).prop( "class", 'btn btn-danger');
                            document.getElementById("emp_name").value = "";
                            document.getElementById("emp_num").value = "";
                            document.getElementById("emp_id").value ="";
                            document.getElementById("connected").value = "";
                            document.getElementById("alert2").value = "";
                              document.getElementById("alert").value = "لا يوجد عاملة";
                            $('#connected_con_id').hide();
                            document.getElementById("maid_img").setAttribute("src",'');}
                        }


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
                            if(val==1)
                            {
                                document.getElementById('yes').style.display='block';

                            }else{
                                document.getElementById('yes').style.display='none';
                            }

                        }
                    </script>
                    <script>
                        function showVisa(val)
                        {
                            if(val==1)
                            {
                                document.getElementById('visa').style.display='block';

                            }else{
                                document.getElementById('visa').style.display='none';
                            }

                        }
                    </script>
                    <!--Internal  Form-elements js-->
@endsection
