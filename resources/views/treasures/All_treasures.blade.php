@extends('layouts.master')
@section('title')
    عمليات الصندوق
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> المحاسبة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عمليات الصندوق/{{$users_name}}</span>
            </div>
        </div>


    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">عمليات صندوق {{$users_name}}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    @foreach($procsess as $procsess)
                        @if($procsess->typ==1)
                            <a href="/contract_detils/{{$procsess->contract_id}}" class="p-3 d-flex border-bottom">
                                <div class="  drop-img  cover-image  "
                                     data-image-src="{{ URL::asset('assets/img/faces/income.png') }}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">


                                    </div>
                                    <p class="mb-0 desc">{{$procsess->comment}}</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">{{$procsess->created_at}}</p>

                                    <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الحالي</span>&nbsp;&nbsp; {{$procsess->treasure}}</p>
                                    <p class="time mb-0 text-left right-right mr-2 mt-2 text-danger " style="font-weight: bold"> <span class="text-info">الرصيد السابق</span>&nbsp;&nbsp; {{$procsess->last_treasure}}</p>

                                </div>
                            </a>
                        @elseif($procsess->typ==2)
                            <!-- التحويل تصميم-->

                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="  drop-img  cover-image  "
                                     data-image-src="{{ URL::asset('assets/img/faces/transfer.png') }}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">

                                    </div>

                                    <p class="mb-0 desc">{{$procsess->comment}}</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">{{$procsess->created_at}}</p>

                                    <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الحالي</span>&nbsp;&nbsp; {{$procsess->treasure}}</p>
                                    <p class="time mb-0 text-left right-right mr-2 mt-2 text-danger " style="font-weight: bold"> <span class="text-info">الرصيد السابق</span>&nbsp;&nbsp; {{$procsess->last_treasure}}</p>


                                </div>
                            </a>
                        @elseif($procsess->typ==3)

                            <!-- التحويل الصادر-->

                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="  drop-img  cover-image  "
                                     data-image-src="{{ URL::asset('assets/img/faces/transfer2.jpg') }}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">

                                    </div>

                                    <p class="mb-0 desc">{{$procsess->comment}}</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">{{$procsess->created_at}}</p>

                                    <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الحالي</span>&nbsp;&nbsp; {{$procsess->treasure}}</p>
                                    <p class="time mb-0 text-left right-right mr-2 mt-2 text-danger " style="font-weight: bold"> <span class="text-info">الرصيد السابق</span>&nbsp;&nbsp; {{$procsess->last_treasure}}</p>


                                </div>
                            </a>

                        @endif
                    @endforeach
                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- row closed  -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection
