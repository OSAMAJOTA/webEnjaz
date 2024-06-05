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
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
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



        <br>   <br>   <br>
            <div class="col-12 ">
                <form action="{{ route('offers_recruitment.store') }}" method="post" enctype="multipart/form-data"
                      autocomplete="off">
                    {{ csrf_field() }}
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0">إضافة </h5>
                    </div>
                    <div class="card-body text-primary">
                        <div class="row">

                            <div class="col-md-8">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        نوع العامل
                                        <select class="form-control" name="emp_typ" id="emp_typ" onchange="hidDiv()">
                                            <option selected="selected" value="0">غير محدد</option>
                                            <option value="1">معين </option>
                                            <option value="2">غير معين</option>
                                            <option value="4">معروفه</option>
                                            <option value="3">تفويض</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        الجنسية
                                        <select class="form-control" name="nash" required><option value="">اختر</option>
                                            @foreach($nationalities as $x)
                                                <option value="{{$x->nationalities_name}}"> {{$x->nationalities_name}} </option>
                                            @endforeach
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="nationalityId" data-valmsg-replace="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        الوظيفة
                                        <select class="form-control" name="work" required>
                                            <option value="">اختر</option>

                                          @foreach($careers as $x)
                                                <option value="{{$x->careers_name}}"> {{$x->careers_name}} </option>
                                          @endforeach
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="jobId" data-valmsg-replace="true"></span>
                                    </div>
                                </div>



                                <div  id="Div_hide" >
                                    <div class="col-md-4"  >
                                    <div class="form-group">
                                        الديانة
                                        <select class="form-control" data-val="true"  id="religion" name="religion"><option selected="selected" value="غير محدد">غير محدد</option>
                                            <option value="مسلم">مسلم</option>
                                            <option value="غير مسلم">غير مسلم	</option>
                                        </select>
                                    </div>
                                    </div>
                                   <div class="col-md-4">
                                    <div class="form-group" id="Age" style="display: block">
                                        العمر
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
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"   >
                                        سبق لة العمل
                                        <select class="form-control" id="emp_exp" name="emp_exp">
                                            <option value="غير محدد">غير محدد</option>
                                            <option value="سبق له العمل">سبق له العمل</option>
                                            <option value="لم يسبق له العمل">لم يسبق له العمل</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group col-md-4">
                                    الراتب (راتب العاملة)
                                    <span class="field-validation-valid text-danger" data-valmsg-for="salary" data-valmsg-replace="true"></span>
                                    <input class="form-control" data-val="true" data-val-number="The field الراتب must be a number." data-val-required="الراتب مطلوب" id="salary" name="salary" type="text" value="0">
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="m-t-0 header-title-small"><b>اجمالي العرض</b></div>
                                    <div class=" text-center ">
                                        <table class="table table-striped m-0 pull-left">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    تكاليف الاستقدام المباشر / التوسط
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control justify-content-center" id="cost2" name="cost2" value="0.00" style="text-align:center;" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    ضريبة التكلفة
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control justify-content-center" id="vat_cost" name="vat_cost" value="0.00" style="text-align:center;" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    تكاليف الاستقدام الخارجية

                                                </td>
                                                <td>
                                                <input type="text" class="form-control justify-content-center" id="outcost2" name="outcost2" value="0.00" style="text-align:center;" readonly>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="col-md-4">
                                            <input class="text-center" style="text-align:center;color: #2c7ecd; font-size: 88px; height: 100px; background-color: white; font-weight: bold;border: none; " value="0.00" name="total_offer" id="total_offer">

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-4">


                                <div class="form-group col-md-12">
                                    <h4>تكاليف الاستقدام المباشر / التوسط</h4>
                                    <b>التكلفة </b>  (يقصد بالتكاليف المحلية للاستقدام (تكاليف ادارة المكتب . الارباح))
                                    <input class="form-control" id="cost" name="cost"  onkeyup="CalculateOffer()" type="text" value="0">

                                </div>

                                <div class="form-group col-md-12">
                                    <h4>تكاليف الاستقدام الخارجية</h4>
                                    <b>تكلفة الوكيل بالريال </b>
                                    (التكاليف المدفوعة الى الوكيل للدولة المرسلة للعمالة المنزلية)

                                    <input class=" form-control"  id="outCost" name="outCost" onchange="CalculateOffer()" onkeyup="CalculateOffer()" type="text" value="0">
                                    <h6 class="text-success">غير شامل الضريبة</h6>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        &nbsp;	&nbsp;	&nbsp;
                        <button type="submit" class="btn btn-dark">رجوع </button>
                    </div>
                </div>
                </form>
            </div>

            </div>

        </div>


        <!-- row closed -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->

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

    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
















    <script>
        function CalculateOffer(){

            var cost = parseFloat(document.getElementById("cost").value);
            var outCost = parseFloat(document.getElementById("outCost").value);
            var vat = cost*0.15;
            sumt = parseFloat(vat).toFixed(2);

            var total_offer=cost+outCost+vat;
            total = parseFloat(total_offer).toFixed(2);
            document.getElementById("vat_cost").value = sumt;
            document.getElementById("cost2").value = cost;
            document.getElementById("outcost2").value = outCost;
            document.getElementById("total_offer").value = total;




        }

    </script>
    <script>
        function hidDiv(){
            var emp_typ = parseFloat(document.getElementById("emp_typ").value);
if(emp_typ==2){
    $( document ).ready(function() {
        $('#Div_hide').show();
    });
}else{
            $( document ).ready(function() {
                $('#Div_hide').hide();
            });


}

        }

    </script>
    <script>
    $( document ).ready(function() {
        $('#Div_hide').hide();
    });
    </script>



@endsection
