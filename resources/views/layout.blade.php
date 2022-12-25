
    @include('frontend.frontend_partails.frontend_main_header')

    <!-- Humberger Begin -->
    @include('frontend.frontend_partails.frontend_humberger')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('frontend.frontend_partails.frontend_header')
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    @include('frontend.frontend_partails.frontend_hero')
    <!-- Hero Section End -->
    @yield('content')

    @include('frontend.frontend_partails.frontend_footer')
