@extends('admin::home')
@section('app.name', 'Admin Dashboard')
@section('content')
    <br>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> {{ $productCount }} </h3>
                            <p>{{ __('products') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href=" {{ url('admin/blogs') }} " class="small-box-footer">{{ __('More info') }} <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
            <!-- /.container-fluid -->
            <div class="row"><!-- 3 row Starts -->

                <div class="col-lg-12"><!-- col-lg-8 Starts -->

                    <div class="card card-primary"><!-- panel panel-primary Starts -->
                        <div class="card-header"><!-- panel-heading Starts -->

                            <h3 class="card-title"><!-- panel-title Starts -->

                                {{ __('Product Category') }}

                            </h3><!-- panel-title Ends -->

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                        </div><!-- panel-heading Ends -->

                        <div class="card-body"><!-- panel-body Starts -->

                            <div id="chartContainer5444" style="height: 300px; width: 100%;"></div>

                        </div>

                    </div>


                </div><!-- col-lg-8 Ends -->



            </div><!-- 3 row Ends -->


        </div>
    </section>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer5444", {
                exportEnabled: true,
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Product Category"
                },
                axisY: {
                    title: "Products"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "grey",
                    legendText: "Product Category",
                    dataPoints: @json($chartData)
                }]
            });

            chart.render();
        }
    </script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
