@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
     بيانات العميل
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="/agents">العملاء</a>   </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     بيانات العميل/ <b>{{$agents->agents_name}}</b></span>
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


    <div class="col-12 ">
        <div class="card card-secondary">
            <div class="card-header pb-0">
                <h5 class="card-title mb-0 pb-0">المعلومات الاساسية </h5>
            </div>
            <div class="card-body text-secondary">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-striped m-0">
                            <tbody>
                            <tr>
                                <td>اسم العميل عربى</td>
                                <td>{{$agents->agents_name}}</td>
                            </tr>
                            <tr>
                                <td>اسم العميل إنجليزى</td>
                                <td>{{$agents->agents_name_en}}</td>
                            </tr>
                            <tr>
                                <td class="text-success">اسم المستخدم للدخول للنظام</td>
                                <td class="text-success">{{$agents->id_num}}</td>
                            </tr>
                            <tr>
                                <td>الجنسية</td>
                                <td>{{$agents->nash}}</td>
                            </tr>
                            <tr>
                                <td>نوع الهوية</td>
                                <td> {{$agents->id_tybe}}</td>
                            </tr>
                            <tr>
                                <td>رقم الهوية</td>
                                <td>{{$agents->id_num}}</td>
                            </tr>

                            <tr>
                                <td>تاريخ الهوية</td>
                                <td>{{$agents->birth_date}}</td>
                            </tr>










                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table class="table table-striped m-0">
                            <tbody>

                            <tr>
                                <td>تاريخ الميلاد</td>
                                <td>{{$agents->birth_date}}</td>
                            </tr>

                            <tr>
                                <td>الحالة الاجتماعية </td>
                                <td>{{$agents->marital_status}}</td>
                            </tr>

                            <tr>
                                <td>نوع السكن</td>
                                <td>{{$agents->Accommodation_type}}</td>
                            </tr>
                            <tr>
                                <td>جوال / الهاتف</td>
                                <td>{{$agents->agent_phone1}}</td>
                            </tr>
                            <tr>
                                <td>الجوال 2</td>
                                <td>{{$agents->agent_phone2}}</td>
                            </tr>
                            <tr>
                                <td>هاتف المنزل</td>
                                <td>{{$agents->home_phone}}</td>
                            </tr>





                            </tbody>
                        </table>
                    </div>



                    <div class="col-md-4">
                        <table class="table table-striped m-0">
                            <tbody>
                            <tr>
                                <td>العنوان عربى</td>
                                <td>{{$agents->add_ar}}</td>
                            </tr>
                            <tr>
                                <td>العنوان انجليزي</td>
                                <td>{{$agents->add_en}}</td>
                            </tr>

                            <tr>
                                <td>الحى</td>
                                <td>{{$agents->hood_ar}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>










                    <br>




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
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFour1" aria-expanded="false">عقود التشغيل<i class="fe fe-arrow-left ml-2"></i></a>
                                </h4>
                            </div>
                            <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                <div class="panel-body border">
                                    <table class="table">
                                        <tbody><tr>
                                            <td><b>رقم العقد </b></td>
                                            <td><b>اسم العاملة </b></td>
                                            <td><b> مدة العقد</b></td>
                                            <td><b> تاريخ الاضافة</b></td>
                                            <td><b>حالة العقد</b> </td>

                                        </tr>
                                        @foreach ($contract as $x)

                                            <td><b><a href="/contract_detils/{{$x->id }}"> {{$x->id}}</a></b></td>
                                            <td><b><a href="/maidsDetails/{{$x->maids_id}}"> {{$x->emp_name}}</a></b></td>
                                            <td><b>{{$x->Duration}} </b></td>
                                            <td><b>{{$x->created_at}} </b></td>
                                            <td><b>{{$x->status}} </b></td>


                                            </tr>
                                        @endforeach
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default mb-0">
                            <div class="panel-heading1  bg-primary">
                                <h4 class="panel-title1">
                                    <a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive2" aria-expanded="false">عقود التوسط <i class="fe fe-arrow-left ml-2"></i></a>
                                </h4>
                            </div>
                            <div id="collapseFive2" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                                <div class="panel-body border">
                                    <div class="alert alert-danger mg-b-0" role="alert">
                                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>عقود التوسط  </strong> تحت الاجراء
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 ">
        <div class="card card-secondary">
            <div class="card-header pb-0">
                <h5 class="card-title mb-0 pb-0">الملاحظات</h5>
            </div>
            <div class="card-body text-secondary">

            </div>

        </div>
    </div>

    <!-- /row -->

    <!-- delete -->

    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
