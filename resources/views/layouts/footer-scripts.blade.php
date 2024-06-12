<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{URL::asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!--Internal  Form-elements js-->
<script>
    var sessionLifetime = {{ config('session.lifetime') }}; // مدة الجلسة بالدقائق
    var sessionTimeout;

    function startSessionTimer() {
        sessionTimeout = setTimeout(function() {
            alert("Your session has expired. You will be redirected to the login page.");
            window.location.href = '{{ route('login') }}';
        }, sessionLifetime * 60 * 1000);
    }

    function resetSessionTimer() {
        clearTimeout(sessionTimeout);
        startSessionTimer();
    }

    document.onload = startSessionTimer();
    document.onmousemove = resetSessionTimer;
    document.onkeypress = resetSessionTimer;
</script>

<script>


    function Check_balance() {
        var user_balance=document.getElementById('user_balance').value;
        var tranfer_balance=parseFloat(document.getElementById('balance').value).toFixed(2)

        var test_value=user_balance-tranfer_balance;

      if(test_value<0){
          alert('مبلغ التحويل اكبر من الرصيد المتوفر ');
          document.getElementById('balance').value=0.00;
      }
      else{

          }





    }

</script>
