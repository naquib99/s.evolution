@extends ('layouts.normalPage')
@section('content')

    <title> Create </title>
    <div class="container pt-3">
        <div class="row ">

            <div class="col-md-4 align-self-center">
                <button type="button" class="btn btn-primary">
                    <a href="/stock" class="text-light d-flex align-items-center">
                        <i class="fas fa-arrow-circle-left fa-2x text-light mr-3"></i> Back
                    </a>
                </button>
            </div>
            <div class="col-md-4 text-center pt-2">
                <h1>Report</h1>
            </div>
        </div>
        <hr>
    </div>

    <div id="content" class="container pt-3">

        <div class="d-flex justify-content-end">
            <button id="print_report" type="button" class="btn btn-secondary w-25" onclick="generatePDF()">
                <i class="fa fa-print" aria-hidden="true"></i> Print Report
            </button>
        </div>

        <div class="row pt-3">
            <div class="col-md-6">
                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3> Brands </h3>
                            </div>
                            <div class="card-body text-center">
                                <div class="d-flex justify-content-center text-center">
                                    {{-- Div for chart --}}
                                    <div id="dashboard_div" class="w-100">
                                        <div id="filter_div"></div>
                                        <div id="chart_div"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col">

                        <div class="card  h-100">
                            <div class="card-header">
                                <h3> Low Stock </h3>
                            </div>
                            <div class="card-body text-center">
                                {{-- Div for low stock chart --}}
                                <div id="low_stock_chart" class="w-100"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col">

                            <div class="card">
                                <div class="card-header">
                                    <h3> Brands </h3>
                                </div>
                                <div class="card-body text-center">
                                    {{-- Div for chart --}}
                                    <div id="item_by_category_div" class="w-100">
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        @foreach ($items4 as $item4)
                            <h3>Latest Order (Restocks)</h3>
                            @break
                        @endforeach

                    </div>
                    <div class="card-body">
                        <div class="card text-light p-3 bg-success">
                            <table>
                                @foreach ($items4 as $item4)
                                    <tr>
                                        <td style="width:55%;"><b>Order ID</b> : {{ $item4->order_id }}</td>
                                        <td><b>Total Price</b> : RM {{ $item4->total_price }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Staff ID</b> : {{ $item4->staff_id }}</td>
                                        <td><b>Date</b> : {{ $item4->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Status</b> : {{ $item4->order_status }}</td>
                                    </tr>
                                    @break
                                @endforeach

                            </table>
                        </div>
                        <div class="d-flex justify-content-center text-center pt-3">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($items4 as $item4)
                                    <tr>
                                        <td>{{ $item4->item_id }}</td>
                                        <td>{{ $item4->item_name }}</td>
                                        <td>{{ $item4->item_price }}</td>
                                        <td>{{ $item4->order_qty }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            // Load the Visualization API and the controls package.
            google.charts.load('current', {
                'packages': ['corechart', 'controls']
            });

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawDashboard);
            google.charts.setOnLoadCallback(drawLowStockChart);
            google.charts.setOnLoadCallback(drawItemByCategoryChart);

            //Responsive chart
            $(window).resize(function(){
                drawLowStockChart();
                drawDashboard();
                drawItemByCategoryChart();
            });

            // $(#print_report).click(function(){
            //     alert();
            // });

            // Callback that creates and populates a data table,
            // instantiates a dashboard, a range slider and a pie chart,
            // passes in the data and draws it.
            function drawLowStockChart() {

                // Create the data table
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Item');
                data.addColumn('number', 'Quantity');
                data.addRows([
                        @foreach ($items2 as $item2)
                    ['{{ $item2->item_name }}', {{ $item2->item_stock_qty }}],
                    @endforeach
                ]);

                // Set options bar chart.
                var options = {
                    title: 'Items Low in Stock',
                };

                // Instantiate and draw the chart
                var chart = new google.visualization.BarChart(document.getElementById('low_stock_chart'));
                chart.draw(data, options);

            }


            function drawDashboard() {

                // Create our data table.
                var data = google.visualization.arrayToDataTable([
                    ['Brand', 'Amount'],
                        @foreach ($items as $item)
                    ['{{ $item->item_brand }}', {{ $item->sum }}],
                    @endforeach
                ]);

                // Create a dashboard.
                var dashboard = new google.visualization.Dashboard(
                    document.getElementById('dashboard_div'));

                // Create a range slider, passing some options
                var donutRangeSlider = new google.visualization.ControlWrapper({
                    'controlType': 'NumberRangeFilter',
                    'containerId': 'filter_div',
                    'options': {
                        'filterColumnLabel': 'Amount'
                    }
                });

                // Create a pie chart, passing some options
                var pieChart = new google.visualization.ChartWrapper({
                    'chartType': 'PieChart',
                    'containerId': 'chart_div',
                    'options': {
                        'pieSliceText': 'value',
                        'legend': 'right',
                        'pieHole': 0.5
                    }
                });

                // Establish dependencies, declaring that 'filter' drives 'pieChart',
                // so that the pie chart will only display entries that are let through
                // given the chosen slider range.
                dashboard.bind(donutRangeSlider, pieChart);

                // Draw the dashboard.
                dashboard.draw(data);
            }

            function drawItemByCategoryChart() {

                // Create our data table.
                var data = google.visualization.arrayToDataTable([
                    ['Brand', 'Amount'],
                        @foreach ($items3 as $item3)
                    ['{{ $item3->item_category }}', {{ $item3->sum }}],
                    @endforeach
                ]);


                var options = {
                    title: 'Item by Category',
                };

                // Create a dashboard.
                var dashboard = new google.visualization.PieChart(document.getElementById('item_by_category_div'));

                // Draw the dashboard.
                dashboard.draw(data,options);
            }

            function generatePDF(){
                window.print();
            }

        </script>


@endsection
