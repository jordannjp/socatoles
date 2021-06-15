<x-admin-layout>
    @section("content")

                <div class="row">

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-user-o"></i></span>
                            <div class="text-right dash-widget-info">
                                <h3>{{ $ucount }}</h3>
                                <span class="widget-title1">Users <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
                            <div class="text-right dash-widget-info">
                                <h3>{{ $ocount }}</h3>
                                <span class="widget-title2">Orders <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-product-hunt"></i></span>
                            <div class="text-right dash-widget-info">
                                <h3>{{ $pcount }}</h3>
                                <span class="widget-title3">Products <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-registered"></i></span>
                            <div class="text-right dash-widget-info">
                                <h3>{{ $ccount }}</h3>
                                <span class="widget-title4">Categories <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>



@endsection

@section("scripts")

@endsection
</x-admin-layout>
