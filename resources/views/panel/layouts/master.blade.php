<!DOCTYPE html>
<html lang="en">

    <head>
      @include('panel.layouts.head-tag')
      @yield('head-tag')
    </head>


    <body class="app">
        <div class="flex">
            @include('panel.layouts.sidebar')

            <div class="content" style="direction: rtl">
                @include('panel.layouts.header')

                @yield('content')

            </div>
        </div> 
        @include('panel.layouts.script')           
        @yield('script')

        <section class="toast-wrapper flex-row-reverse">
            @include('panel.alerts.toast.success')
            @include('panel.alerts.toast.error')
        </section>

        @include('panel.alerts.sweetalert.error')
        @include('panel.alerts.sweetalert.success')

</body>
</html>






