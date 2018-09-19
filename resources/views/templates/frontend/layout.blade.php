<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        
        @yield('seo-title')
        
        @include('templates.frontend.partials.head')
        
        @yield('custom-css')
        
    </head>
    <body class="c-layout-header-fixed c-layout-header-mobile-fixed">
        
        @include('templates.frontend.partials.header')

        <!-- BEGIN: PAGE CONTAINER -->
        <div class="c-layout-page">
            
            @include('templates.frontend.partials.breadcrumbs')

            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: BLOG LISTING -->
            <div class="c-content-box c-size-md">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            
                            @yield('content')
                            
                        </div>
                        <div class="col-md-3">
                            
                            @include('templates.frontend.partials.sidebar')
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: BLOG LISTING  -->
            <!-- END: PAGE CONTENT -->
        </div>
        <!-- END: PAGE CONTAINER -->
        
        @include('templates.frontend.partials.footer')
        
        @yield('custom-js')
    </body>

</html>