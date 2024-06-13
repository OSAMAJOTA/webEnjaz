<!-- main-header opened -->
@if (session()->has('transfer_done'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم تحويل المبلغ ",
                type: "success"
            })
        }

    </script>
@endif

    @if (session()->has('transfer_error'))
        <script>
            window.onload = function() {
                notif({
                    msg: "لا يوجد رصيد كافي ",
                    type: "error"
                })
            }

        </script>



@endif
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">

                        <img src="{{URL::asset('assets/img/logo.png')}}" width="50px" height="50px">
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						<div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
							<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
						</div>
					</div>
                  <h1>osama</h1>
					<div class="main-header-right">
                        <?php $users=\App\user_treasure::where('user_id',Auth::user()->id)->latest('created_at')->first()  ?>
                        <a  class=" btn btn-outline-primary btn-sm" data-effect="effect-fall" data-toggle="modal" href="#transfer" style="font-weight: bold;font-size: 12PX" title="رصيد الخزينة">{{$users->treasure}} ريال</a>

						<ul class="nav">
							<li class="">
								<div class="dropdown  nav-itemd-none d-md-flex">
									<a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
										<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/us_flag.jpg')}}" alt="img"></span>
										<div class="my-auto">
											<strong class="mr-2 ml-2 my-auto">English</strong>
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
										<a href="#" class="dropdown-item d-flex ">
											<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/french_flag.jpg')}}" alt="img"></span>
											<div class="d-flex">
												<span class="mt-2">French</span>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex">
											<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/germany_flag.jpg')}}" alt="img"></span>
											<div class="d-flex">
												<span class="mt-2">Germany</span>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex">
											<span class="avatar ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/italy_flag.jpg')}}" alt="img"></span>
											<div class="d-flex">
												<span class="mt-2">Italy</span>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex">
											<span class="avatar ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/russia_flag.jpg')}}" alt="img"></span>
											<div class="d-flex">
												<span class="mt-2">Russia</span>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex">
											<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/spain_flag.jpg')}}" alt="img"></span>
											<div class="d-flex">
												<span class="mt-2">spain</span>
											</div>
										</a>
									</div>
								</div>
							</li>
						</ul>
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>
							<div class="dropdown nav-item main-header-message ">
								<a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class=" pulse-danger"></span></a>
								<div class="dropdown-menu">
									<div class="menu-header-content bg-primary text-right">
										<div class="d-flex">
											<h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">الرسائل</h6>
											<span class="badge badge-pill badge-warning mr-auto my-auto float-left">تعين قراءة الكل</span>
										</div>
										<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 "> 0 عدد الرسائل الغير مقروءة</p>
									</div>
									<div class="main-message-list chat-scroll">





									</div>
									<div class="text-center dropdown-footer">
										<a href="text-center">VIEW ALL</a>
									</div>
								</div>
							</div>
							<div class="dropdown nav-item main-header-notification">
								<a class="new nav-link" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class=" pulse"></span></a>
								<div class="dropdown-menu">
									<div class="menu-header-content bg-primary text-right">
										<div class="d-flex">
											<h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">الاشعارات</h6>
                                            <span class="badge badge-pill badge-warning mr-auto my-auto float-left"><a
                                                    href="\MarkAsRead_all">تعين قراءة الكل</a></span>
										</div>
										<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">  عدد الاشعارات الغير مقروءة {{ auth()->user()->unreadNotifications->count() }}</p>
									</div>

									<div class="main-notification-list Notification-scroll">
                                        @foreach (auth()->user()->unreadNotifications as $notification)
										<a class="d-flex p-3 border-bottom"  href="{{ url('ReadNotification') }}/{{ $notification->data['id'] }}"  data-id="{{$notification->id}}">
											<div class="notifyimg bg-danger">
												<i class="la la-user-check text-white"></i>
											</div>

											<div class="mr-3">

                                                <h5 class="notification-label mb-1">{{ $notification->data['title'] }}
                                                    <div class="notification-subtext">

                                                        {{ $notification->data['user'] }}
                                                        {{ $notification->created_at }}

                                                    </div>
											</div>

											<div class="mr-auto" >
												<i class="las la-angle-left text-left text-muted"></i>
											</div>

										</a>
                                        @endforeach
									</div>

									<div class="dropdown-footer">
										<a href="">VIEW ALL</a>
									</div>
								</div>
							</div>
							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}" class=""></div>
											<div class="mr-3 my-auto">
												<h6>{{auth()->user()->name}} </h6><span>{{auth()->user()->email}} </span>
											</div>
										</div>
									</div>
									<a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>الصفحة الشخصية</a>
									<a class="dropdown-item" href=""><i class="bx bx-cog"></i> تعديل البيانات </a>
									<a class="dropdown-item" href=""><i class="bx bx-envelope"></i>الرسائل</a>
									<a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i>  اعدادات الحساب</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                            class="bx bx-log-out"></i>تسجيل خروج</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</div>
							</div>
                            @can('اظهر المستخدمون المتصلين')
							<div class="dropdown main-header-message right-toggle">
								<a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
								<button class="btn-success-gradient btn-sm " title="المستخدمون ">online </button>
								</a>
							</div>
                            @endcan
						</div>
					</div>
				</div>
			</div>
<div class="modal" id="transfer">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">   رصيد الخزينة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>


            </div>
            <div class="modal-body">
                    <?php

                    $treasures=\App\user_treasure::where('user_id',Auth::user()->id)->latest()->get()

                    ?>
                @foreach($treasures as $treasures)
                    @if($treasures->typ==1)
                    <a href="/contract_detils/{{$treasures->contract_id}}" class="p-3 d-flex border-bottom">
                        <div class="  drop-img  cover-image  "
                             data-image-src="{{ URL::asset('assets/img/faces/income.png') }}">
                            <span class="avatar-status bg-teal"></span>
                        </div>
                        <div class="wd-90p">
                            <div class="d-flex">


                            </div>
                            <p class="mb-0 desc">{{$treasures->comment}}</p>
                            <p class="time mb-0 text-left float-right mr-2 mt-2">{{$treasures->created_at}}</p>

                            <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الحالي</span>&nbsp;&nbsp; {{$treasures->treasure}}</p>
                            <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الوارد</span>&nbsp;&nbsp; {{$treasures->amount}}</p>
                            <p class="time mb-0 text-left right-right mr-2 mt-2 text-danger " style="font-weight: bold"> <span class="text-info">الرصيد السابق</span>&nbsp;&nbsp; {{$treasures->last_treasure}}</p>

                        </div>
                    </a>
                    @elseif($treasures->typ==11)
                        <a href="/recruitment_detils/{{$treasures->contract_id}}" class="p-3 d-flex border-bottom">
                            <div class="  drop-img  cover-image  "
                                 data-image-src="{{ URL::asset('assets/img/faces/income.png') }}">
                                <span class="avatar-status bg-teal"></span>
                            </div>
                            <div class="wd-90p">
                                <div class="d-flex">


                                </div>
                                <p class="mb-0 desc">{{$treasures->comment}}</p>
                                <p class="time mb-0 text-left float-right mr-2 mt-2">{{$treasures->created_at}}</p>

                                <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الحالي</span>&nbsp;&nbsp; {{$treasures->treasure}}</p>
                                <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الوارد</span>&nbsp;&nbsp; {{$treasures->amount}}</p>
                                <p class="time mb-0 text-left right-right mr-2 mt-2 text-danger " style="font-weight: bold"> <span class="text-info">الرصيد السابق</span>&nbsp;&nbsp; {{$treasures->last_treasure}}</p>

                            </div>
                        </a>

                    @elseif($treasures->typ==2)
                        <!-- التحويل تصميم-->

                        <a href="#" class="p-3 d-flex border-bottom">
                            <div class="  drop-img  cover-image  "
                                 data-image-src="{{ URL::asset('assets/img/faces/transfer.png') }}">
                                <span class="avatar-status bg-teal"></span>
                            </div>
                            <div class="wd-90p">
                                <div class="d-flex">

                                </div>

                                <p class="mb-0 desc">{{$treasures->comment}}</p>
                                <p class="time mb-0 text-left float-right mr-2 mt-2">{{$treasures->created_at}}</p>

                                <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الحالي</span>&nbsp;&nbsp; {{$treasures->treasure}}</p>
                                <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الوارد</span>&nbsp;&nbsp; {{$treasures->amount}}</p>
                                <p class="time mb-0 text-left right-right mr-2 mt-2 text-danger " style="font-weight: bold"> <span class="text-info">الرصيد السابق</span>&nbsp;&nbsp; {{$treasures->last_treasure}}</p>


                            </div>
                        </a>
                    @elseif($treasures->typ==3)

                        <!-- التحويل الصادر-->

                        <a href="#" class="p-3 d-flex border-bottom">
                            <div class="  drop-img  cover-image  "
                                 data-image-src="{{ URL::asset('assets/img/faces/transfer2.jpg') }}">
                                <span class="avatar-status bg-teal"></span>
                            </div>
                            <div class="wd-90p">
                                <div class="d-flex">

                                </div>

                                <p class="mb-0 desc">{{$treasures->comment}}</p>
                                <p class="time mb-0 text-left float-right mr-2 mt-2">{{$treasures->created_at}}</p>

                                <p class="time mb-0 text-left right-right mr-2 mt-2 text-success " style="font-weight: bold"> <span class="text-info">الرصيد الحالي</span>&nbsp;&nbsp; {{$treasures->treasure}}</p>
                                <p class="time mb-0 text-left right-right mr-2 mt-2 text-danger " style="font-weight: bold"> <span class="text-info">الرصيد الصادر</span>&nbsp;&nbsp; {{$treasures->amount}}-</p>
                                <p class="time mb-0 text-left right-right mr-2 mt-2 text-danger " style="font-weight: bold"> <span class="text-info">الرصيد السابق</span>&nbsp;&nbsp; {{$treasures->last_treasure}}</p>


                            </div>
                        </a>

                    @endif
                @endforeach


                <!-- التحويل تصميم-->



            </div>
            <div class="modal-footer">

                <a href="/All_treasures/{{Auth::user()->id}}" class="btn ripple btn-info" >عرض العمليات</a>
                <a class="btn ripple btn-success" data-effect="effect-fall" data-toggle="modal" href="#send_mony"  data-dismiss="modal">تحويل</a>

                <button class="btn ripple btn-danger" data-dismiss="modal" type="button">خروج</button>

            </div>
        </div>
    </div>
</div>


<div class="modal" id="send_mony">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">

            <form action="{{ route('tranfer_mony') }}" method="post" autocomplete="off">
                {{ method_field('post') }}
                {{ csrf_field() }}
            <div class="modal-header">
                <h6 class="modal-title"> تحويل</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <p class="time mb-0  right-right mr-2 mt-2 text-success " style="font-weight: bold;font-size:22px"> <span class="text-info">الرصيد الحالي</span>&nbsp;&nbsp; {{$users->treasure}}</p>
                <hr>
                <?php $all_users=\App\User::all();  ?>
<div class="card-info">
    <label class="label">تحويل الي حساب :</label>
    <select class="form-control" name="user_id" id="user_id" required>
        <option value="" >اختار الحساب</option>
        <@foreach($all_users as $all_users)
             @if($all_users->id==Auth::user()->id)
            @else
                <option value="{{$all_users->id}}">{{$all_users->name}} </option>
            @endif

        @endforeach
    </select>

</div>
                <hr>
                <div class="text-black">ادخل المبلغ</div>
                <hr>
                <input class="form-control" type="number" name="user_balance" id="user_balance" value="{{$users->treasure}}" required hidden>
                <input class="form-control" type="number" name="balance" id="balance" value="0.00" required onkeyup="Check_balance()">
                <hr>
                <input class="form-control" type="number" name="sender_id" id="sender_id" value="{{Auth::user()->id}}" required hidden>

                <select class="form-control" name="transaction_reson" id="transaction_reson" required>
                    <option value=""> سبب التحويل</option>

                            <option value="تحصيل"> تحصيل</option>
                    <option value="تحويل لموظف اخر"> تحويل لموظف اخر</option>



                </select>

            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="submit">تحويل </button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /main-header -->
