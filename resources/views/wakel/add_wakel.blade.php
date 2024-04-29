@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

@endsection
@section('title')
    اضافة وكيل
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الرئسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                       الوكلاء/ اضافة وكيل </span>
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
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('wakel.store') }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        {{-- الصف الاول --}}
                        <div class="row">
                            <div class="col-sm">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>اسم الوكيل عريى</label>
                                <input type="text" class="form-control" id="wakel_name" name="wakel_name"
                                       title="يرجي ادخال   اسم الوكيل عريى" required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> جوال / الهاتف</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       title="يرجي ادخال  جوال / الهاتف" required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> العنوان عربى</label>
                                <input type="text" class="form-control" id="add_ar" name="add_ar" required>
                            </div>


                        </div>
                        {{-- الصف الاول --}}

                        {{-- الصف الثاني --}}
                        <div class="row">
                            <div class="col-sm">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> اسم الوكيل إنجليزى</label>
                                <input type="text" class="form-control" id="wakel_name_en" name="wakel_name_en"
                                       title="يرجي ادخال  اسم الوكيل إنجليزى" required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> الجوال 2</label>
                                <input type="text" class="form-control" id="phone2" name="phone2"
                                       title="يرجي ادخال  الجوال 2 " required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> العنوان انجليزي</label>
                                <input type="text" class="form-control" id="add_en" name="add_en" required>
                            </div>


                        </div>


                        {{-- الصف الثاني --}}
                        {{-- الصف الثالث --}}
                        <div class="row">
                            <div class="col-sm">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>  اسم تسجيل الدخول</label>
                                <input type="text" class="form-control" id="login_name" name="login_name"
                                       title="يرجي ادخال   اسم تسجيل الدخول " required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> البريد الالكترونى  </label>
                                <input type="text" class="form-control" id="email" name="email"
                                       title="يرجي ادخال  البريد الالكترونى " required>
                            </div>

                            <div class="col-sm">
                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> اسم المنشأة  </label>
                                <input type="text" class="form-control" id="company_name_ar" name="company_name_ar" required>
                            </div>


                        </div>



                        {{-- الصف الثالث --}}
                        {{-- الصف الرابع --}}
                        <div class="row">


                            <div class="col">
                                <label for="inputName" class="control-label">الجنسية</label>
                                <select class="form-control select2" name="nash"   required>

                                    <option value="بلجيكا">  بلجيكا</option>
                                    <option value="الفلبين"> الفلبين </option>
                                    <option value=" اوغندا">   اوغندا</option>
                                    <option value="اثيوبيا"> اثيوبيا</option>
                                    <option value="مصر">   مصر   </option>
                                    <option value="السودان"> السودان</option>

                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> النوع</label>
                                <select name="wakel_type" class="form-control SlectBox" onclick="console.log($(this).val())" required
                                        onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="" selected disabled> الكل</option>

                                    <option value="توسط">توسط </option>
                                    <option value="تشغيل">تشغيل </option>

                                </select>
                            </div>
                            <div class="col-sm">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> اسم المنشأة انجليزى</label>
                                <input type="text" class="form-control" id="company_name_en" name="company_name_en"
                                       title="يرجي ادخال  اسم المنشأة انجليزى " required>
                            </div>


                        </div>
                        {{-- الصف الرابع --}}
                        {{-- الصف الخامس --}}
                        <div class="row">
                            <div class="col-md-4">

                                <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> رخصة الوكيل</label>
                                <input type="text" class="form-control" id="wakel_id" name="wakel_id"
                                       title="يرجي ادخال   رخصة الوكيل" required>
                            </div>




                        </div>


                        {{-- الصف الخامس --}}


            </div>
                <div class="col-12 ">
                    <div class="card card-secondary">

                        <div class="card-body text-secondary">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                &nbsp;&nbsp;&nbsp;
                                <button type="submit" class="btn btn-danger"> رجوع</button>
                            </div>
                        </div>

                    </div>
                </div>


        </div>



                    <!-- row closed -->

                        {{-- 3 --}}



        </div>
    </div>
    </div>
    </div>

    </div>
    </form>
    </div>
    <!-- row -->


    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--- Internal Accordion Js -->
    <script src="{{URL::asset('assets/plugins/accordion/accordion.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/accordion.js')}}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>







@endsection
