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
    اضافة عمالة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الرئسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                       ادارة العمالة/ اضافة عمالة </span>
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

            <form action="{{ route('maids.store') }}" method="post" enctype="multipart/form-data"
                  autocomplete="off">
                {{ csrf_field() }}
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <p>


                    </p>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-primary-gradient col-md-12 " id="basic">
                                       المعومات الاساسية
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <!-- الصف الاول -->
                                    <div class="row">
                                        <div class="col-sm">

                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> رقم العاملة</label>
                                            <input type="text" class="form-control" id="emp_num" name="emp_num"
                                                   title="يرجي ادخال  اسم العميل" required >
                                        </div>

                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> الاسم العربي</label>
                                            <input type="text" class="form-control" id="emp_name_ar" name="emp_name_ar"
                                                   title="يرجي ادخال  اسم العميل" required>
                                        </div>

                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>الاسم الانجليزي</label>
                                            <input type="text" class="form-control" id="emp_name_en" name="emp_name_en" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputName" class="control-label">   الديانة</label>
                                            <select name="emp_relegon" id="emp_relegon" class="form-control"  required>
                                                <!--placeholder-->
                                                <option value="الاسلام" >الاسلام </option>

                                                <option value="المسيحية">المسيحية</option>


                                            </select>
                                        </div>

                                    </div>
                                    <!-- نهاية الاول -->
                                    <!-- الصف الثاني -->
                                    <div class="row">


                                        <div class="col-sm">
                                            <label for="inputName" class="control-label">   الوظيفة</label>
                                            <select name="emp_work" id="emp_work" class="form-control"  required>
                                                <!--placeholder-->
                                                @foreach ($careers as $x)
                                                    <option value="{{ $x->careers_name }}"> {{ $x->careers_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>


                                        <div class="col-sm">
                                            <label for="inputName" class="control-label">   جنس العاملة</label>
                                            <select name="emp_gender" id="emp_gender" class="form-control"  required>
                                                <!--placeholder-->
                                                <option value="انثي" selected>انثي</option>

                                                <option value="زكر">زكر</option>


                                            </select>
                                        </div>

                                        <div class="col-sm">
                                            <label for="inputName" class="control-label">   الجنسية</label>
                                            <select name="emp_nash" id="emp_nash" class="form-control"  required>
                                                <!--placeholder-->
                                                @foreach ($nationalities as $x)
                                                    <option value="{{ $x->nationalities_name }}"> {{ $x->nationalities_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-sm">

                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>الراتب الاساسي</label>
                                            <input type="text" class="form-control" id="emp_salary" name="emp_salary"
                                                   title="يرجي ادخال  اسم العميل" required >
                                        </div>

                                    </div>
                                    <!-- نهاية الثاني -->
                                    <!-- الصف الثالث -->
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="inputName" class="control-label">   الوكلاء</label>
                                            <select name="emp_wakel" id="emp_wakel" class="form-control"  >
                                                <!--placeholder-->
                                                <option value=""></option>
                                                @foreach ($wakel as $x)
                                                    <option value="{{ $x->wakel_name }}"> {{ $x->wakel_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-sm">
                                            <label for="inputName" class="control-label">   الموظف المسؤول</label>
                                            <select name="emp_employee" id="emp_employee" class="form-control" >
                                                <!--placeholder-->
                                                <option value=""></option>
                                                @foreach ($employees as $x)
                                                    <option value="{{ $x->employees_name }}"> {{ $x->employees_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>رقم الصندوق</label>
                                            <input type="text" class="form-control" id="emp_box_num" name="emp_box_num" >
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span> رقم الحدود</label>
                                            <input type="text" class="form-control" id="emp_hodod_num" name="emp_hodod_num" >
                                        </div>


                                    </div>
                                <br><br>
                                    <h5 class="mb-0">
                                        <button type="button" class="btn btn-success  " id="osama"  onclick="ValidateTextBox()">
                                            التالي
                                        </button>
                                    </h5>
                                    <!-- نهاية الثالث -->


                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button type="button"  class="btn btn-primary-gradient col-md-12 collapsed"  id="basic2" >
                                        البيانات الشخصية
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <!-- الصف الاول -->
                                    <div class="row">
                                        <div class="col-sm">

                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> تاريخ الميلاد</label>
                                            <input type="date" class="form-control" id="age_date" name="age_date"
                                                   title="يرجي ادخال  اسم العميل" required onchange="agee()">
                                        </div>

                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>العمر</label>
                                            <input type="text" class="form-control" id="age" name="age"
                                                   title="يرجي ادخال  اسم العميل" required readonly>
                                        </div>

                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> العنوان عربي</label>
                                            <input type="text" class="form-control" id="emp_add_ar" name="emp_add_ar" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> العنوان انجليزي</label>
                                            <input type="text" class="form-control" id="emp_add_en" name="emp_add_en" required>
                                        </div>

                                    </div>
                                    <!-- نهاية الاول -->
                                    <!-- الصف الثاني -->
                                    <div class="row">


                                        <div class="col-sm">
                                            <label for="inputName" class="control-label">   الحالة الاجتماعية</label>
                                            <select name="emp_m_status" id="emp_m_status" class="form-control"  required>
                                                <!--placeholder-->
                                                <option value="" ></option>
                                                <option value="اعزب" >اعزب</option>

                                                <option value="متزوج">متزوج</option>
                                                <option value="مطلق">مطلق</option>
                                                <option value="ارملة">ارملة</option>
                                                <option value="منفصلة">منفصلة</option>

                                            </select>
                                        </div>


                                        <div class="col-sm">

                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> عدد الاطفال</label>
                                            <input type="number" class="form-control" id="emp_num_of_ch" name="emp_num_of_ch" value="0"
                                                   title="يرجي ادخال  اسم العميل" required onchange="con_to_en()">
                                        </div>

                                        <div class="col-sm">

                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>الوزن</label>
                                            <input type="number" class="form-control" id="emp_weight" name="emp_weight" value="0"
                                                   title="يرجي ادخال  اسم العميل" required onchange="con_to_en()">
                                        </div>
                                        <div class="col-sm">

                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>الطول</label>
                                            <input type="number" class="form-control" id="emp_length" name="emp_length" value="0"
                                                   title="يرجي ادخال  اسم العميل" required onchange="con_to_en()">
                                        </div>

                                    </div>
                                    <!-- نهاية الثاني -->
                                    <!-- الصف الثالث -->
                                    <div class="row">

                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> المستوي التعليمي</label>
                                            <input type="text" class="form-control" id="emp_edu_ar" name="emp_edu_ar" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>المستوي التعليمي انجليزي</label>
                                            <input type="text" class="form-control" id="emp_edu_en" name="emp_edu_en" required>
                                        </div>

                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>الجوال</label>
                                            <input type="text" class="form-control" id="emp_phone" name="emp_phone" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> جوال / هاتف</label>
                                            <input type="text" class="form-control" id="emp_phone2" name="emp_phone2" >
                                        </div>


                                    </div>
                                    <!-- نهاية الثالث -->
                                    <!-- الصف الرابع -->
                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>رقم الهوية</label>
                                            <input type="text" class="form-control" id="emp_id_num" name="emp_id_num" >
                                        </div>



                                    </div>
                                    <br><br>
                                    <button type="button" class="btn btn-success  " id="osama2"  onclick="ValidateTextBox2()">
                                        التالي
                                    </button>
                                    <!-- نهاية الرابع -->


                                </div>
                                </div>
                                <h5 class="mb-0">


                        </div>


                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-">
                                    <button type="button"  class="btn btn-primary-gradient col-md-12 collapsed" id="basic3" >
                                   معلومات الجواز
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <!-- الصف الاول-->
                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>رقم جواز السفر</label>
                                            <input type="text" class="form-control" id="emp_passport" name="emp_passport" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span>تاريخ اصدار جواز السفر</label>
                                            <input type="date" class="form-control" id="emp_passport_date" name="emp_passport_date" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold">*</span> تاريخ انتهاء جواز السفر</label>
                                            <input type="date" class="form-control" id="emp_passport_end_date" name="emp_passport_end_date" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>مكان الاصدار عربي</label>
                                            <input type="text" class="form-control" id="emp_isdar_ar" name="emp_isdar_ar" >
                                        </div>



                                    </div>
                                    <!-- نهاية  الاول-->
                                    <!-- الصف الثاني-->
                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>أسم أحد الأقارب عربى </label>
                                            <input type="text" class="form-control" id="emp_name_of_ahal_ar" name="emp_name_of_ahal_ar" >
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>أسم أحد الأقارب انجليزى</label>
                                            <input type="text" class="form-control" id="emp_name_of_ahal_en" name="emp_name_of_ahal_en" >
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>جوال احد الاقارب</label>
                                            <input type="text" class="form-control" id="emp_name_of_ahal_phne" name="emp_name_of_ahal_phne" >
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputName" class="control-label"> <span class="text-danger font-bold"></span>
                                                 مكان الاصدار انجليزى</label>
                                            <input type="text" class="form-control" id="emp_isdar_en" name="emp_isdar_en" >
                                        </div>

                                         <br>
                                        <br>
                                        <button type="button" class="btn btn-success  "  id="osama3"  onclick="ValidateTextBox3()">
                                            التالي
                                        </button>

                                    </div>
                                    <!-- نهاية  الثاني-->
                                </div>
                                <h5 class="mb-0">

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="head1">
                                <h5 class="mb-">
                                    <button type="button"  class="btn btn-primary-gradient col-md-12 collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                        خبرات سابقه
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse1" class="collapse" aria-labelledby="head1" data-parent="#accordion">
                                <div class="card-body">
                                    <label class="rdiobox"><input name="emp_is_work" value="1"  type="radio" Checked > <span>سبق له العمل </span></label>
                                    <label class="rdiobox"><input name="emp_is_work" value="0"  type="radio"  > <span>لم يسبق له العمل </span></label>
                                </div>
                                <h5 class="mb-0">
                                    <button type="button" class="btn btn-success  " data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                        التالي
                                    </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="head2">
                                <h5 class="mb-">
                                    <button type="button"  class="btn btn-primary-gradient  col-md-12 collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                  المهارات
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="head2" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="ckbox"><input type="checkbox" name="emp_cook" id="emp_cook" value="1"><span> الطبخ</span></label>
                                        </div>
                                        <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                            <label class="ckbox"><input  type="checkbox" name="emp_wash" id="emp_wash" value="1" ><span>الغسيل </span></label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="ckbox"><input type="checkbox" name="emp_clean" id="emp_clean" value="1"><span>التنظيف </span></label>
                                        </div>
                                        <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                            <label class="ckbox"><input  type="checkbox" name="emp_children" id="emp_children" value="1"><span>التعامل مع الاطفال </span></label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="ckbox"><input type="checkbox" name="emp_tilor" id="emp_tilor" value="1"><span>الخياطه </span></label>
                                        </div>
                                        <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                            <label class="ckbox"><input  type="checkbox" name="emp_drive" id="emp_drive" value="1"><span>قيادة السيارة </span></label>
                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                    <button type="button" class="btn btn-success  " data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                        التالي
                                    </button>
                                </div>
                                <h5 class="mb-0">

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="head3">
                                <h5 class="mb-">
                                    <button type="button"  class="btn btn-primary-gradient col-md-12 collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                       اللغات
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="head3" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> اللغة العربية</label>
                                            <select name="emp_arabic_lan" id="emp_arabic_lan" class="form-control"  required>
                                                <!--placeholder-->
                                                <option value="غير محدد" selected>غير محدد</option>

                                                <option value="جيد">جيد</option>
                                                <option value="متوسط">متوسط</option>
                                                <option value="ممتاز">ممتاز</option>

                                            </select>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputName" class="control-label"> اللغة الانجليزية</label>
                                            <select name="emp_english_lan" id="emp_english_lan" class="form-control"  required>
                                                <!--placeholder-->
                                                <option value="غير محدد" selected>غير محدد</option>

                                                <option value="جيد">جيد</option>
                                                <option value="متوسط">متوسط</option>
                                                <option value="ممتاز">ممتاز</option>

                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <button type="button" class="btn btn-success  " data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                        التالي
                                    </button>
                                </div>
                                <h5 class="mb-">

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="head4">
                                <h5 class="mb-0">
                                    <button type="button"  class="btn btn-primary-gradient col-md-12 collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                      معلومات اضافية
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse4" class="collapse" aria-labelledby="head3" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <label class="rdiobox"><input name="emp_type" value="1"  type="radio" Checked > <span>تشغيل </span></label>
                                        <label class="rdiobox"><input name="emp_type" value="0"  type="radio"  > <span> توسط </span></label>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <p class="text-danger">* صورة من جواز السفر </p><br>


                                        <div class="col-sm-12 col-md-12">
                                            <input type="file" name="passport_pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                                   data-height="70" />
                                        </div>

                                        <p class="text-danger">*  صورة شخصية   </p>


                                        <div class="col-sm-12 col-md-12">
                                            <input type="file" name="profile" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                                   data-height="70" />
                                        </div>
                                        <p class="text-danger">* صورة  كاملة للجسم </p>


                                        <div class="col-sm-12 col-md-12">
                                            <input type="file" name="full_pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                                   data-height="70" />
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-danger"> رجوع</button>
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
    <script>
        function agee(){

           var datee=document.getElementById('age_date').value;
            let date = new Date(datee);
            var year=date.getFullYear()

            let date2=new Date();
            var tod=date2.getFullYear();

            var agee=tod-year;

// Use "getYear()" method and stores
// the returned value to "n"


document.getElementById('age').value=agee;
        }



    </script>


    <script>

        function ValidateTextBox()
        {

            let a = document.getElementById('emp_num').value;
            let b = document.getElementById('emp_name_ar').value;
            let c = document.getElementById('emp_name_en').value;
            let d = document.getElementById('emp_relegon').value;
            let e = document.getElementById('emp_work').value;
            let f = document.getElementById('emp_gender').value;
            let g = document.getElementById('emp_salary').value;
            let h = document.getElementById('emp_wakel').value;
            let i = document.getElementById('emp_nash').value;


            if(a == ""){
                alert('ادخل رقم العاملة');
                return false;

            }else if(b==""){
                alert('ادخل اسم العاملة عربي ');
                return false;
            }else if(c==""){
                alert('ادخل اسم العاملة انجليزي');
                return false;
            }else if(d==""){
                alert('حدد ديانة العاملة');
                return false;
            }else if(e==""){
                alert('حدد وظيفة العاملة');
                return false;
            }else if(f==""){

                alert('حدد جنس العاملة');
                return false;
            }else if(g==""){

                alert('ادخل راتب العاملة');
                return false;
            }else if(h==""){
                alert('حدد الوكيل');
                return false;
            }else if(i==""){
                alert('حدد جنسية العاملة');
                return false;
            }




            else {
            document.getElementById("osama").setAttribute("data-toggle", "collapse");
            document.getElementById("osama").setAttribute("data-target", "#collapseTwo");
            document.getElementById("osama").setAttribute("aria-expanded", "true");
            document.getElementById("osama").setAttribute("aria-controls", "collapseTwo");



                document.getElementById("basic").setAttribute("data-toggle", "collapse");
                document.getElementById("basic").setAttribute("data-target", "#collapseOne");
                document.getElementById("basic").setAttribute("aria-expanded", "true");
                document.getElementById("basic").setAttribute("aria-controls", "collapseOne");


            }

        }
    </script>
    <!---->
    <script>

        function ValidateTextBox2()
        {

            let a = document.getElementById('age').value;
            let b = document.getElementById('emp_add_ar').value;
            let c = document.getElementById('emp_add_en').value;
            let d = document.getElementById('emp_m_status').value;
            let e = document.getElementById('emp_num_of_ch').value;
            let f = document.getElementById('emp_weight').value;
            let g = document.getElementById('emp_length').value;
            let h = document.getElementById('emp_edu_ar').value;
            let i = document.getElementById('emp_edu_en').value;
            let J = document.getElementById('emp_phone').value;


            if(a == ""){
                alert('حدد تاريخ ميلاد العمالة');
                return false;

            }else if(b==""){
                alert('ادخل عنون العاملة عربي ');
                return false;
            }else if(c==""){
                alert('ادخل عنوان العاملة انجليزي');
                return false;
            }else if(d==""){
                alert('حدد الحالة الاجتماعية للعاملة');
                return false;
            }else if(e==""){
                alert('حدد عدد الاطفال العاملة ');
                return false;
            }else if(f==""){

                alert('حدد وزن العاملة');
                return false;
            }else if(g==""){

                alert('ادخل طول العاملة');
                return false;
            }else if(h==""){
                alert('حدد مستوي التعليم عربي');
                return false;
            }else if(i==""){
                alert('حدد مستوي التعليم انجليزي');
                return false;
            }else if(J==""){
                alert('حدد جوال العاملة');
                return false;
            }
            else {


                document.getElementById("osama2").setAttribute("data-toggle", "collapse");
                document.getElementById("osama2").setAttribute("data-target", "#collapseThree");
                document.getElementById("osama2").setAttribute("aria-expanded", "true");
                document.getElementById("osama2").setAttribute("aria-controls", "collapseThree");

                document.getElementById("basic2").setAttribute("data-toggle", "collapse");
                document.getElementById("basic2").setAttribute("data-target", "#collapseTwo");
                document.getElementById("basic2").setAttribute("aria-expanded", "true");
                document.getElementById("basic2").setAttribute("aria-controls", "collapseTwo");
            }

        }
    </script>

    <!---->
    <script>

        function ValidateTextBox3()
        {

            let a = document.getElementById('emp_passport').value;
            let b = document.getElementById('emp_passport_date').value;
            let c = document.getElementById('emp_passport_end_date').value;



            if(a == ""){
                alert('ادخل رقم جواز العاملة ');
                return false;

            }else if(b==""){
                alert('حدد تاريخ اصدار الجواز');
                return false;
            }else if(c==""){
                alert('حدد تاريخ انتهاء الجواز');
                return false;
            }
            else {


                document.getElementById("osama3").setAttribute("data-toggle", "collapse");
                document.getElementById("osama3").setAttribute("data-target", "#collapse1");
                document.getElementById("osama3").setAttribute("aria-expanded", "true");
                document.getElementById("osama3").setAttribute("aria-controls", "collapse1");

                document.getElementById("basic3").setAttribute("data-toggle", "collapse");
                document.getElementById("basic3").setAttribute("data-target", "#collapseThree");
                document.getElementById("basic3").setAttribute("aria-expanded", "true");
                document.getElementById("basic3").setAttribute("aria-controls", "collapseThree");
            }

        }
    </script>







@endsection
