@extends('layouts.master')
@section('title')
السندات العامة
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <style>
        <style>

        .branchname {
            float: right;
            position: absolute;
            background-color: #415a6f;
            right: 0;
            top: -9px;
            color: white;
            padding: 5px 12px;
        }
        .branchnameList li {
            background-color: #2196F3;
            padding: 5px 12px;
            color: white;
            float: right;
            margin: 2px;
        }
        .branchnameList {
            float: right;
            position: absolute;
            right: 0;
            top: -20px;
            list-style-type: none;
            margin-right: 0;
            padding-right: 0;
            z-index: 900;
        }
        .list-group-itemm {
            position: relative;
            display: block;
            padding: 0.25rem 1rem;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid #e7ebf3;
        }


    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> المحاسبة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/    <a href="/general_bonds">السندات العامة</a>/سند رقم {{$bonds->id}}</span>
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
    </div>


    <div class="col-12 ">
        <div class="card card-secondary">
            <div class="card-header pb-0">
                <h5 class="card-title mb-0 pb-0">بيانات السند رقم {{$bonds->id}} </h5>
            </div>
            <div class="row">
                <div class="col-sm-6">


                    <table class="table table-striped m-0">
                        <colgroup>
                            <col width="1">
                        </colgroup>

                        <tbody>
                        <tr>
                            <td class="text-nowrap text-right">نوع السند</td>
                            <td>
                                {{$bonds->bonds_type}}       </td>
                        </tr>

                        <tr>
                            <td class="text text-right">نوع القبض</td>
                            <td>
                                <button class="text-black btn-success btn btn-sm "> {{$bonds->catch_type}}   </button>                                </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap text-right">تاريخ الانشاء</td>
                            <td> {{$bonds->created_at}}    </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap text-right">تم الانشاء بواسطة</td>
                            <td> {{$bonds->Created_by}}    </td>
                        </tr>



                        </tbody>
                    </table>
                </div>

                <div class="col-sm-6">
                    <h4 class="m-t-0 header-title-small"><b>قيمة السند</b></h4>
                    <table class="table table-striped m-0">
                        <colgroup>
                            <col width="1">
                        </colgroup>

                        <tbody>
                        <tr>
                            <td class="text-nowrap text-right" style="width:1px">القيمة</td>
                            <td> <b>{{$bonds->bonds_cost}} </b></td>
                        </tr>

                        <tr>
                            <td class="text-nowrap text-right"></td>
                            <td>{{$bonds->bonds_cost_ar}}</td>
                        </tr>

                        <tr>
                            <td class="text-nowrap text-right">قيمة الضريبة</td>
                            <td> <b>{{$bonds->bonds_vat}}</b></td>
                        </tr>

                        <tr>
                            <td class="text-nowrap text-right"></td>
                            <td>{{$bonds->bonds_vat_ar}}</td>
                        </tr>

                        <tr>
                            <td class="text-nowrap text-right">اجمالى</td>
                            <td> <b>{{$bonds->bonds_total}}</b></td>
                        </tr>

                        <tr>
                            <td class="text-nowrap text-right"></td>
                            <td>{{$bonds->bonds_total_ar}}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <!--  نهاية كرت العرض-->


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
