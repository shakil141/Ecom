
   <!-- ########## START: MAIN HEADER PANEL ########## -->
    @include('admin.admin_pages.admin_main_header')
    <!-- ########## END: MAIN HEADER PANEL ########## -->
    @guest

    @else
        <!-- ########## START: LEFT PANEL ########## -->
            @include('admin.admin_pages.admin_sidebar')
        <!-- ########## END: LEFT PANEL ########## -->

        <!-- ########## START: HEAD PANEL ########## -->
            @include('admin.admin_pages.admin_topbar')
        <!-- ########## END: HEAD PANEL ########## -->

        <!-- ########## START: RIGHT PANEL ########## -->
            @include('admin.admin_pages.admin_notifications')
        <!-- ########## END: RIGHT PANEL ########## --->
    @endguest
    <!-- ########## START: MAIN PANEL ########## -->
    @yield('main_body')
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- ########## START: FOOTER PANEL ########## -->
    @include('admin.admin_pages.admin_main_footer')
    <!-- ########## END: FOOTER PANEL ########## --->
