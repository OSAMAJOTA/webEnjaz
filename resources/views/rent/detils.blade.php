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
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="/rent">  عقود التشغيل</a> </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل العقد </span>
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








                    <!--نهاية الكرت-->
                    <!--كرت-->

                <div class="col-12 ">
                    <div class="card card-primary">

                        <div class="card-body text-primary">

                            <h4 class="m-t-0 header-title-small"><b> {{ $contract-> agents_name}}</b></h4>

                            <div class="text-danger  pull-right ">

                                <a class="btn btn-info-gradient float-left mt-3 mr-2" href="/rent"  >
                                    رجوع
                                </a>
                                <a class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()" href="/print_cont/{{$contract->id }}">
                                    <i class="mdi mdi-printer ml-1"></i>طباعة
                                </a>
                            </div>
                        </div>

                    </div>
                </div>



                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0 pb-0">معلومات العقد</h5>

                            </div>

                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-12">

                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="m-t-0 header-title-small"><b>معلومات العقد </b></h4>
                                        <table class="table table-striped m-0">
                                            <tbody>
                                            <tr>
                                                <td>رقم العقد</td>
                                                <td>{{ $contract-> id}}</td>
                                            </tr>
                                            <tr>
                                                <td>تاريخ الانشاء</td>
                                                <td>{{ $contract-> created_at}}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="m-t-0 header-title-small"><b>بيانات العميل</b></h4>
                                        <table class="table table-striped m-0">
                                            <tbody>
                                            <tr>
                                                <td>اسم العميل</td>
                                                <td>{{ $contract-> agents_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>رقم الهوية</td>
                                                <td>{{ $contract-> id_num}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="m-t-0 header-title-small"><b>معلومات الموظف</b></h4>
                                        <table class="table table-striped m-0">
                                            <tbody>
                                            <tr>
                                                <td>تم الانشاء بواسطة</td>
                                                <td>{{ $contract-> Created_by}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="m-t-0 header-title-small"><b>بيانات التأشيرة </b></h4>
                                        <table class="table table-striped m-0">
                                            <tbody>

                                            <tr>
                                                <td>الوظيفة عربى</td>
                                                <td> {{ $contract-> WORK}}</td>
                                            </tr>

                                            <tr>
                                                <td>الجنسية</td>
                                                <td>{{ $contract-> nash}}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>



                                    <div class="col-md-6">
                                        <h4 class="m-t-0 header-title-small"><b>بيانات العامل </b></h4>
                                        <table class="table table-striped m-0">
                                            <tbody>
                                            <tr>
                                                <td>اسم العامل عربى</td>
                                                <td>
                                                    {{ $contract-> emp_name}}                                </td>
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
                            <div class="col-md-12">

                            </div>
                            <div class="col-md-12">
                                <h4 class="m-t-0 header-title-small"><b>حركات العمالة  </b></h4>
                                <table class="table">
                                    <tbody><tr>
                                        <td><b>اسم العمالة</b></td>
                                        <td><b>سبب الانهاء</b></td>
                                        <td><b>تاريخ اضافة العاملة</b></td>
                                        <td><b>تاريخ انهاء خدمة العاملة</b></td>
                                        <td><b>مدة العمل باليوم</b></td>
                                        <td><b>حالة العامل</b> </td>
                                        <td><b>ملاحظات</b></td>
                                    </tr>
                                    @foreach ($maid_movment as $x)

                                        <td><b><a href="/maidsDetails/{{$x->maid_id}}"> {{$x->maid_name}}</a></b></td>
                                        @if($x->end_reson)
                                            <td><b>{{$x->end_reson}}</b></td>
                                        @else
                                            <td><b>--</b></td>
                                        @endif
                                        <td><b>{{$x->created_at}}</b></td>
                                        @if($x->end_date)
                                        <td><b>{{$x->end_date}}</b></td>
                                        @else
                                            <td><b>--</b></td>
                                        @endif
                                  <?php
                                        $start =  Carbon\Carbon::parse($x->created_at);
                                        $now = Carbon\Carbon::parse($x->end_date);


                                        $days_count = $start->diffInDays($now);

                                      ?>
                                    @if($x->end_date)
                                        <td><b>{{$days_count+1}} يوم</b></td>
                                    @else
                                        <td><b>--</b></td>
                                    @endif


                                        @if($x->status=='نشط')
                                        <td>  <span class="btn-sm disabled btn-success">{{$x->status}}</span></td>
                                        @else
                                            <td>  <span class="btn-sm disabled btn-danger">{{$x->status}}</span></td>
                                        @endif
                                        <td><b>{{$x->comment}} </b></td>


                                    </tr>
                                    @endforeach
                                    </tbody></table>

                            </div>


                </div>
            </div>
                </div>





                <div class="col-12 ">
                    <div class="card card-primary">

                        <div class="card-body text-primary">

                            <div class="row">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-12">
                                    <h4 class="m-t-0 header-title-small"><b>التكاليف  </b></h4>

                                    <div class="panel panel-primary panel-border">
                                        <div class="panel-heading">

                                        </div>
                                        <div class="panel-body table-responsive">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="m-t-0 header-title-small"><b>بيانات العرض</b></h4>
                                                    <table class="table table-striped m-0">
                                                        <tbody>
                                                        <tr>
                                                            <td>رقم العقد</td>
                                                            <td>  {{ $contract-> id}} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>اسم العامل عربى</td>
                                                            <td>
                                                                {{ $contract-> emp_name}}                                </td>
                                                        </tr>
                                                        <tr>
                                                            <td>السعر الخاص بالعرض</td>
                                                            <td><b>  {{ $contract-> cost}} </b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>التأمين</td>
                                                            <td><b>  {{ $contract-> tamin}} </b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>خصم المدير</td>
                                                            <td><b>-  {{ $contract-> man_discount}} </b> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>الاجمالى</td>
                                                            <td><b>  {{ $contract-> tot}} </b> </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>


                                                    @if($contract-> man_discount>0)
                                                    <div class="col-md-12" style="margin-top:20px">
                                                        <h4 class="m-t-0 header-title-small"><b>خصومات الادارة على العقد</b></h4>
                                                        <table class="table table-striped m-0">
                                                            <thead>
                                                            <tr>
                                                                <th> قيمة الخصم</th>
                                                                <th> التاريخ</th>
                                                                <th> الملاحظات</th>
                                                                <th> الموظف</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($man_discount as $dis)
                                                            <tr>
                                                                <td>{{$dis->man_discount}}</td>
                                                                <td>{{$dis->created_at}}</td>
                                                                <td>{{$dis->comment}}</td>
                                                                <td>{{$dis->Created_by}}</td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 m-b-25">
                                                    <div class="m-t-0 header-title-small"><b>اجمالى العقد</b></div>
                                                    <div class="text-center">



                                                            <input style="text-align:center;color: #2c7ecd; font-size: 88px; height: 100px; background-color: white; font-weight: bold;border: none; " type="text" name="tot" id="tot" value="{{ $contract-> tot}}" readonly >



<br>
                                                        <br>
                                                        <br>
                                                        <div class="row">
                                                            <div class="widget-detail-1 col-md-4">

                                                                <h2 class="p-t-10 m-b-0"> {{ $contract-> sadad}}</h2>
                                                                <p class="text-muted">تم سداد</p>
                                                            </div>
                                                            <div class="widget-detail-1 col-md-4">
                                                                <h2 class="p-t-10 m-b-0"> 0 </h2>
                                                                <p class="text-muted">المصروفات</p>
                                                            </div>

                                                            <div class="widget-detail-1 col-md-4 ">
                                                                <h2 class="p-t-10 m-b-0 text-danger "> {{ $contract-> rest}} </h2>
                                                                <p class="text-muted">المتبقى للدفع</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <section> <br><br></section>
                                            @if($contract-> rest>0)
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
                                                            <strong> تاريخ السداد المتوقع لدفع القيمة المتبقية للعقد  {{$contract-> exp_sadad}} </strong>
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
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>








                    <div class="col-12 ">
                        <div class="card card-primary">

                            <div class="card-body text-primary">

                                <div class="row">
                                    <div class="col-md-12">

                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="m-t-0 header-title-small"><b> السندات  </b></h4>


                                    </div>


                                </div>
                            </div>
                        </div>



                        <div class="card card-primary">

                            <div class="card-body text-primary">

                                <div class="row">
                                    <div class="col-md-12">

                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="m-t-0 header-title-small"><b> ايصال التحول  </b></h4>
                                        <div class="card card-statistics">

                                            <div class="card-body">
                                                <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                <h5 class="card-title">اضافة مرفقات</h5>
                                                <form method="post" action="{{ url('/contractAttachments') }}"
                                                      enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                               name="file_name" required>
                                                        <input type="hidden" id="customFile" name="contract_num"
                                                               value="{{ $contract-> id}}">
                                                        <input type="hidden" id="invoice_id" name="contract_id"
                                                               value="{{ $contract->id }}">
                                                        <label class="custom-file-label" for="customFile">حدد
                                                            المرفق</label>
                                                    </div><br><br>
                                                    <button type="submit" class="btn btn-primary btn-sm "
                                                            name="uploadedFile">تاكيد</button>
                                                </form>
                                            </div>

                                            <br>

                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table table-hover"
                                                       style="text-align:center">
                                                    <thead>
                                                    <tr class="text-dark">
                                                        <th scope="col">م</th>
                                                        <th scope="col">اسم الملف</th>
                                                        <th scope="col">قام بالاضافة</th>
                                                        <th scope="col">تاريخ الاضافة</th>
                                                        <th scope="col">العمليات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ($attachments as $attachment)
                                                            <?php $i++; ?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $attachment->file_name }}</td>
                                                            <td>{{ $attachment->Created_by }}</td>
                                                            <td>{{ $attachment->created_at }}</td>
                                                            <td colspan="2">

                                                                <a class="btn btn-outline-success btn-sm"
                                                                   href="{{ url('View_file_att') }}/{{ $contract->id }}/{{ $attachment->file_name }}"
                                                                   role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                    عرض</a>

                                                                <a class="btn btn-outline-info btn-sm"
                                                                   href="{{ url('download_att') }}/{{ $contract->id }}/{{ $attachment->file_name }}"
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
                                                                <?php $i = 0; ?>
                                                                @foreach ($history as $a)
                                                                        <?php $i++; ?>
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $a->update_reson }}</td>
                                                                        <td>{{ $a->Created_by }}</td>
                                                                        <td>{{ $a->created_at }}</td>


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
                                                        <a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive2" aria-expanded="false"> الشكاوي <i class="fe fe-arrow-left ml-2"></i></a>

                                                    </h4>
                                                </div>
                                                <div id="collapseFive2" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
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





















                                <div class="col-12 " id="comment">
                                    <div class="card card-primary">

                                        <div class="card-body text-primary">

                                            <div class="row">
                                                <div class="col-md-12">

                                                </div>
                                                <div class="col-md-12">
                                                    <h4 class="m-t-0 header-title-small"><b>  الملاحظات  </b></h4>
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
