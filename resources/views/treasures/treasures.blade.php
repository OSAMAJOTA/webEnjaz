@extends('layouts.master')
@section('title')
    الصناديق
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> المحاسبة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الصناديق</span>
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
                        <h4 class="card-title mg-b-0">الصناديق </h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-20p"><span></span></th>
                                <th class="wd-lg-8p"><span>اسم الموظف</span></th>

                                <th class="wd-lg-20p"><span>اخر تحديث</span></th>
                                <th class="wd-lg-20p"><span>المبلغ</span></th>

                                <th class="wd-lg-20p">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>

@foreach($user_treasures as $x)
                            <tr>
                                <td>
                                    <img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{URL::asset('assets/img/6.jpg')}}">
                                </td>
                                <td>{{$x->User->name}}</td>
                                <td>
                                    {{$x->updated_at}}
                                </td>
                                <td class="text-center">
                                    <span class="label text-black d-flex"><div class="dot-label bg-success ml-1"></div> <b>{{$x->treasure}}</b> </span>
                                </td>

                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">
                         عرض
                                    </a>
                                    <a href="#" class="btn btn-sm btn-info">
                                        <i class="las la-pen"></i>
                                    </a>

                                </td>
                            </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination mt-4 mb-0 float-left">
                        <li class="page-item page-prev disabled">
                            <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
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
