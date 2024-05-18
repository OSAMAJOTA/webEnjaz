@extends('layouts.master')
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
            #cont_Button{
                display: none;
            }
        }

    </style>
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
     {{$contract->agents_name}}
@stop
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">عود التشغيل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ معيانة العقد</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('add_contract'))

        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافة عقد تشغيل بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-12 col-xl-12">
						<div class=" main-content-body-invoice" id="print">
							<div class="card card-invoice">
								<div class="card-body">
									<div class="invoice-header">
                                        <h1 class="invoice-title">عقد إعارة خدمات<br>   العمالةالمنزلية</h1>


										<div class="billed-from">
                                            <div class="row">

                                                <h6>  رقم العقد</h6>
                                                &nbsp;
                                                <h6>  : </h6>
                                                &nbsp;
                                                <h7>{{$contract->id}}</h7>
                                            </div>
                                            <div class="row">

                                                <h6> التاريخ</h6>
                                                &nbsp;
                                                <h6>  : </h6>
                                                &nbsp;
                                                <h7>{{$contract->created_at}}</h7>
                                            </div>


                                            <b><p>شركةالانجاز المعتمدللاستقدام بموجب السجل التجاري 5950032577و ترخيص وزارة العمل رقم 81 وبموجب العقدرقم 2427  <br>
											Email: contact@enjazm.com</p></b>
										</div><!-- billed-from -->
									</div><!-- invoice-header -->
									<div class="row mg-t-20">
										<div class="col-md">
                                            <div class="col-md">
                                                <label class="tx-black-600">بيانات العقد</label>
                                                <p class="invoice-info-row" ><span> اسم العاملة:</span><b> <span >{{$contract->emp_name}}</span></b></p>
                                                <p class="invoice-info-row"><span> رقم العاملة:</span><b> <span>{{$contract->emp_num}}</span></b></p>
                                                <p class="invoice-info-row"><span>تاريخ بداية العقد :</span> <b><span>{{$contract->start_date}}</span></b></p>
                                                <p class="invoice-info-row"><span>تاريخ نهاية العقد :</span><b> <span>{{$contract->end_date}}</span></b></p>
                                                <p class="invoice-info-row"><span> مدة العقد:</span> <b><span>{{$contract->Duration}}</span></b></p>
                                            </div>

										</div>
										<div class="col-md">
                                            <label class="tx-black-600"> تفاصيل الدفع</label>
											<p class="invoice-info-row"><span>  مبغ العقد:</span> <b><span>{{$contract->tot}}</span></b></p>
                                            <p class="invoice-info-row"><span>  مبلغ السداد: </span> <b><span> {{$contract->sadad}}</span></b></p>
											<p class="invoice-info-row"><span>  المتبقي :</span> <b><span>{{$contract->rest}}</span></b></p>

										</div>
									</div>
									<div class="table-responsive mg-t-40">
										<table class="table table-invoice border text-md-nowrap mb-0">
											<thead>
												<tr>

												</tr>
											</thead>
											<tbody>
												<tr>
													<li>حيث ان شركةالانجاز المعتمد مرخصة من قبل الجهات المختصة للعمل في مجال تقديم الخدمات العمالية للغير و لديها الخبرة
                                                        والإمكانيات اللازمة لتوفير خدمات العمالة المنزلية وفقا لانظمة واللوائح والتعليمات المعمول بها في المملكةالعربيةالسعودية وبما
                                                        لا يتعارض مع احكام الشريعة الإسلامية و لحاجة العميل في خدمات شركة الانجاز المعتمد في تأمين العمالة للعمل لديه و تحت
                                                        مسئوليته وبناء على ما تقدم فقد اتفق الطرفان بالنوايا الحسنة و الثقة المتبادلة و هما بكامل اهلتهما المعتبرة شرعًاونظامًا على ما
                                                        يلي:</li>

												</tr>
                                                <br>
                                                <br>

												<tr>
                                                    <li>
                                                        يجب على العميل عدم استغلال العاملةالمنزلية او اكراهها اوتهديدها اواستغلال ضعفها اوتأجير خدماتها اوتشغيلها وفقًا لنظام
                                                        الاتجار بالأشخاص السعودي الصادر بالمرسوم الملكي رقم م40/ وتاريخ 21/7/1430 هـ وفي حالثبوت أي من الحالات المذكورة سابقًا
                                                        يكون للشركةالحق في اتخاذ الاجراءات النظاميةاللازمة في مواجهةالعميل لدى الجهات النظاميةالمختصة.

                                                        </li>

												</tr>
                                                <br>
                                                <br>
                                                <tr>
                                                    <li>
                                                        يتم تسليم العاملة شريحة هاتف متنقل من قبل الشركة ولا يحق للعميل سحب الشريحة.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>


                                                <tr>
                                                    <li>
                                                        يحق للعاملة الحصول على فترات راحة خلال يوم العمل، وتكون ساعات العمل اليومية للعاملة10 ساعات.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>

                                                <tr>
                                                    <li>
                                                        يقوم العميل بتحمل كامل المسؤوليةالنظاميةاوالشرعية في حال قامت العاملةبتنفيذ امر مباشر من قبل العميل اوأحدافراد عائلته
                                                        بفعل مخالف للشرع والنظام .
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>

                                                <tr>
                                                    <li>
                                                        في حال تواجدالعميل في مدينةاومحافظة غير متواجد بها فرع اوسكن للشركة فإن العميل يلتزم بالتوجه لأقرب مدينة او
                                                        محافظة يوجد بها فرع للشركة لاستلام واسترجاع العاملة.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>
                                                <tr>
                                                    <li>
                                                        في حال رغبةالعميل تفويض الغير باستلام وارجاع العاملة فإن العميل يلتزم بتفويض الغير حسب الاجراءات المتبعة لدى الشركة
                                                        مع بقاءالمسئولية على العميل.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>
                                                <tr>
                                                    <li>
                                                        في حال وجود خدمات إضافية على سبيل المثال (توصيل العاملةمن وإلى العمل)فإنها تخضع لرسوم إضافية.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>
                                                <tr>
                                                    <li>
                                                        في حال تم التجديدالتلقائي لعقدالإعارة فإن العميل يتحمل دفع 250ريال عن كل يوم تأخير ويعتبر بقاء العاملة لديه بدون
                                                        تجديد لعقدالإعارة.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>
                                                <tr>
                                                    <li>
                                                        في حال إلغاءالعميل لعقد الإعارة قبل انقضاء المدةالمتعاقد عليها من قبل العميل يتم حسابها عليهم كالاتي:
                                                        (1)يوم 250 ريال, (7-2) ايام 150 ريال, (30-8) يوم 100 ريال عن كل يوم عمل قيمة إعارةالخدمة بناء على سعر اعارةالخدمة.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>
                                                <tr>
                                                    <li>
                                                        تلتزم الشركة بالحفاظ على معلومات العملاء وعدم إفشاءاواستخدام أي معلومات تتعلق بالعميل ما لم يتم طلبها من الجهات
                                                        الرسمية.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>
                                                <tr>
                                                    <li>
                                                        يلتزم العميل بعدم تشغيل أي من العاملةالمتعاقد معها في أعمال تختلف عن المهنةالمحددة ضمن هذا العقد سواء كان ذلك
                                                        بطريقة مباشرةأو غير مباشرةاوتشغيلهم لدى الغير اوإعادة تقديم إعارةالخدمات للغير اوترك العمالة تعمل لحسابها الخاص.
                                                    </li>
                                                </tr>

                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <tr>
                                                  <h7>تعليمات واجراءات حالات الارجاع:</h7>
                                                </tr>
                                                <br>
                                                <br>
                                                <tr>
                                                    <li>
                                                        تلتزم شركة الانجاز المعتمد بعدم استرجاع عاملتها دون سبب مشروع في حالة التزام العميل ببنودالعقد.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>
                                                <tr>
                                                    <li>
                                                        يلتزم العميل بإحضار العاملة لشركة الانجاز المعتمد اثناء سريان العقد لأي ظرف طارئ عند طلب شركة الانجاز المعتمدة ذلك بمدة اقصاها(2ايام)من
                                                        تاريخ الطلب.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>
                                                <br>

                                            <tr>
                                                <h7>تعليمات وحالات استبدال العاملة:</h7>
                                            </tr>
                                                <tr>
                                                    <li>
                                                        تلتزم شركة الانجاز المعتمد باستبدال العاملةالمقدمة للعميل بعد تطبيق تعليمات وإجراءات حالات الارجاع لنفس الجنسية في مدةاقصاها (3ايام)
                                                        ثلاثة أيام شريطة ان لا يكون العميل سببًا فيها حسب المذكور اعلاه.
                                                    </li>
                                                </tr>
                                                <tr>
                                                    <li>
                                                        لا يتم ايقاف قيمة ومدة اعارة الخدمة ما دامت العاملة لدى العميل و لأي سبب كان.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>

                                                    <li>
                                                        في حال هروب العاملة بعد انتهاء عقدالإعارة ولم يقم العميل بالتجديد او تسليم العاملة قبل او في يوم تاريخ الانتهاءالفعلي للعقد فإن العميل يتحمل
                                                        المسؤولية القانونية ودفع تكاليف الاستقدام وقد تصل الى (25000ريال) خمسه وعشرون ألف ريال لصالح شركة الانجاز المعتمد.
                                                    </li>
                                                </tr>
                                                <tr>
                                                    <li>
                                                        في حال رفضت العاملة للعمل بسبب سوءالمعاملةاو الاعتداءالجسدي من قبل العميل او من له علاقة بالعميل وثبت ذلك من خلال الجهات
                                                        المختصة يتحمل العميل مبلغ (4000ريال) اربعة الاف ريال بالإضافة الى تعويض العاملة عما لحق بها من اضرار وفقًا للنظام ولا يعفيه ذلك من
                                                        انعقاد المسؤولية الشرعية والنظامية عليه و يعتبر العقد لاغيًا ويحق لشركةالانجاز المعتمد إبلاغ الجهات المختصة لاتخاذاللازم.
                                                    </li>
                                                </tr>
                                                <br>
                                                <br>
                                                <br>

                                                <tr>
                                                    <div class="d-flex justify-content-center">
                                                    <h6>هذا والله ولي التوفيق</h6>
                                                    </div>
                                                </tr>
                                            <br>
                                                <br>
                                                <br>
                                                <br>





                                            </tbody>
										</table>
									</div>

                                    <div class="row mg-t-20">
                                        <div class="col-md">

                                            <div class="billed-to">
                                                <label class="tx-black-600">الطرف الاول </label>
                                                <br>
                                                <br>
                                                <div class="col-md-3">

                                                <div class="row">
                                                    <h6> التوقيع</h6>
                                                    &nbsp;
                                                    <h6>  : </h6>
                                                    &nbsp;

                                                </div>
                                                    <br>
                                                    <br>
                                                    <div class="row">
                                                        <h6>الختم</h6>
                                                        &nbsp;
                                                        <h6>  : </h6>
                                                        &nbsp;
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <label class="tx-black-600">الطرف الثاني </label>
                                            <p class="invoice-info-row"><span>الاسم: </span> <b><span>{{$contract->agents_name}}</span></b></p>
                                            <p class="invoice-info-row"><span>رقم الهوية</span> <b><span>{{$contract->id_num}}</span></b></p>
                                            <p class="invoice-info-row"><span>رقم الجوال :</span> <b><span>{{$contract->agent_phone1}} </span></b></p>
                                            <p class="invoice-info-row"><span>التوقيع :</span> <span> </span></p>
                                        </div>
                                    </div>

									<hr class="mg-b-40">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
                                            <i class="mdi mdi-printer ml-1"></i>طباعة
                                        </a>

                                        <a class="btn btn-info-gradient float-left mt-3 mr-2" id="cont_Button" href="/rent"  >
                                           عقود التشغيل
                                        </a>
                                    </div>


								</div>
							</div>
						</div>
					</div><!-- COL-END -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

</script>
@endsection
