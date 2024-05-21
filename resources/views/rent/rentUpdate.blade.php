@extends('layouts.master')
@section('title')
    إضافة عقد تشغيل
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
                <h4 class="content-title mb-0 my-auto">عقود التشغيل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/    إضافة عقد تشغيل  </span>
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
                <form action="/contract_update" method="post" enctype="multipart/form-data" id="myForm"
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
                                    <option value="{{$contract->companys_name}}" selected>{{$contract->companys_name}} </option>
                                    @foreach($companys as $x)

                                        <option value="{{$x->companys_name}}" >{{$x->companys_name}}</option>
                                    @endforeach



                                </select>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="cont_id" name="cont_id" value="{{$contract->id}}" readonly required hidden>
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>رقم الهوية</label>
                                <input type="text" class="form-control" id="id_num" name="id_num" value="{{$contract->id_num}}" readonly required>


                                <input type="text" class="form-control" id="agent_id" name="agent_id" value="{{$contract->agent_id }}" readonly hidden="hidden" >
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>الاسم عربى</label>
                                <input type="text" class="form-control" id="agents_name" name="agents_name" value="{{$contract->agents_name}}" readonly required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> جوال / الهاتف</label>
                                <input type="text" class="form-control" id="agent_phone1" name="agent_phone1" value="{{$contract->agent_phone1}}" readonly>
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

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> نوع التشغيل</label>
                                <select name="typ" id="typ" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="مدة" selected>مدة</option>



                                </select>
                                <br>
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> الجنسية</label>
                                <select name="nash" id="nash" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="{{$contract->nash}}" selected>{{$contract->nash}}</option>
                                    @foreach($nationalities as $x)
                                    <option value="{{$x->nationalities_name}}" >{{$x->nationalities_name}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> اختر مدة التشغيل</label>
                                <select name="Duration" id="Duration" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="{{$contract->Duration}}" >{{$contract->Duration}}</option>

                                </select>
                                <br>
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>  تاريخ بداية العقد</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{$contract->start_date}}"  onchange="inc_date()" required >
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>طريقة السداد</label>
                                <select name="sadad_typ" id="sadad_typ" class="form-control" onchange="showsadad()" required  >
                                    <!--placeholder-->
                                    <option value="{{$contract->sadad_typ}}" selected >{{$contract->sadad_typ}}</option>
                                    <option value="نقدآ"  >نقدآ</option>

                                    <option value="تحويل">تحويل</option>


                                </select>
                                <br>
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>

                                    الوظيفة</label>
                                <select name="WORK" id="WORK" class="form-control"  required>
                                    <!--placeholder-->
                                    <option value="{{$contract->WORK}}" selected>{{$contract->WORK}}</option>
                                    @foreach($careers as $x)
                                    <option value="{{$x->careers_name}}" >{{$x->careers_name}}</option>
                                    @endforeach

                                </select>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> تاريخ نهاية العقد</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{$contract->end_date}}" readonly  required>

                            </div>

                            <div class="col-md-4 price-info">

                                <div class="m-t-0 header-title-small"><b>السعر الخاص بالعرض</b></div>

                                    <div class="col-md-3">
                                    <input style="text-align:right;color:  #2c7ecd;padding-right: 150px; font-size: 88px; height: 100px; background-color: white; font-weight: bold;border: none; " type="text" name="tota" id="tota" value="{{$contract->tot}}" readonly>


                                </div>
                                <table class="table  m-b-0 p-b-0 VisaCost">
                                    <tbody><tr>
                                        <td></td>
                                        <td class="text-nowrap ApplicantSalary-head">راتب العامل</td>
                                        <td class="text-nowrap insurance-head">التأمين</td>
                                        <td class="text-nowrap advancePayment-head">قيمة الضريبة</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th class="text-danger ApplicantSalary"><input type="text" name="emp_salary" id="emp_salary" value="{{$contract->emp_salary}}" style="text-align:right;font-weight: bold;border: none;" readonly></th>
                                        <th class="text-danger insurance" ><input type="text" name="tamin" id="tamin" value="{{$contract->tamin}}" style="text-align:right;font-weight: bold;border: none;" readonly> </th>
                                        <th class="text-danger TaxValue"><input type="text" name="vat_cost" id="vat_cost" value="{{$contract->vat_cost}}" style="text-align:right;font-weight: bold;border: none;" readonly></th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="text-nowrap">المبلغ</td>
                                        <td class="text-nowrap">المدة</td>
                                        <td class="text-nowrap">الاجمالى</td>
                                    </tr>

                                    <tr class="period-ddl">
                                        <td>التكلفة</td>
                                        <th  class="text-danger costValueAmount" ><input type="text" name="cost" id="cost"  value="{{$contract->cost}}" style="text-align:right;font-weight: bold;border: none;" readonly></th>
                                        <th class="text-danger costValuePeriod"><input type="text" name="countss" id="countss" value="{{$contract->countss}}" style="text-align:right;font-weight: bold;border: none;"  readonly></th>
                                        <th class="text-danger costValueAmount"><input type="text" name="Total" id="Total"  value="{{$contract->tot}}" style="text-align:right;font-weight: bold;border: none;" readonly></th>
                                    </tr>
                                    </tbody></table>
                            </div>


                        </div>

                    </div>


                </div>
            </div>

            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <h5 class="card-title mb-0 pb-0"> تكاليف العقد </h5>
                    </div>
                    <div class="card-body text-primary">
                        <div class="row">
                            <div class="col-md-3">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>التكلفة</label>
                                <input type="text" class="form-control" id="cost3" name="cost3" value="{{$contract->cost}}" readonly>
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>التامين</label>
                                <input type="text" class="form-control" id="tamin3" name="tamin3" value="{{$contract->tamin}}" readonly>
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> خصم المدير</label>
                                <input type="number" class="form-control" id="man_discount" name="man_discount" value="{{$contract->man_discount}}" onkeyup="mydiscount()"  readonly >


                            </div>
                            <div class="col-md-3">
                                <div class="m-t-0 header-title-small"><b>الاجمالي</b></div>
                                <div class="text-center">

                                    <input style="text-align:center;color: #2c7ecd; font-size: 88px; height: 100px; background-color: white; font-weight: bold;border: none; " type="text" name="tot" id="tot" value="{{$contract->tot}}" readonly >

                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12">

            <div class="col-12">
                <div class="card card-primary">

                    <div class="card-body text-primary">
                        <div class="d-flex justify-content-center">
                            <button type="submit"  class="btn btn-primary">تحديث البيانات </button>
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
                    <!--Internal  Form-elements js-->
@endsection
