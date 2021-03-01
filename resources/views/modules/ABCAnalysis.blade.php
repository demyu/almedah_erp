

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.load('current', {
        'packages': ['table']
    });
    google.charts.setOnLoadCallback(drawStackBar);
    google.charts.setOnLoadCallback(drawPieChart);
    google.charts.setOnLoadCallback(drawTable);

    function drawStackBar() {
        var data = google.visualization.arrayToDataTable([
            ['Item Name', 'Design', 'Assembly', 'Repair'],
                    @foreach($result as $row)

        ['{{$row->item_name}}', {{$row-> design}}, {{$row -> assemblyi}}, {{$row -> repair}}],

    @endforeach

                    ]);
    var options_stacked = {
        title: 'Stock Analysis',
        colors: ['#ebe534', '#34eb9f', '#eb34d9'],
        chartArea: {
            width: '60%'
        },
        isStacked: true,
        hAxis: {
            title: 'Quantity',
            minValue: 0,
        },
        vAxis: {
            title: 'Item Name'
        },

    };
    var chart = new google.visualization.BarChart(document.getElementById('stackbar'));
    chart.draw(data, options_stacked);
            } //end of stack bar
    console.log(drawStackBar())


    function drawPieChart() {
        var data = google.visualization.arrayToDataTable([
            ['Categories', 'In-Stock'],
                    @foreach($result2 as $row)

        ['{{$row->category}}', {{$row->instock_category}}],

    @endforeach
                ]);

    var options_pie = {
        pieHole: 0.4,
        pieSliceTextStyle: {
            color: 'black',
        },
        pieSliceText: 'value'
    };
    var chart2 = new google.visualization.PieChart(document.getElementById('piechart'));
    chart2.draw(data, options_pie);
            } //end of piechart

    function drawTable() {
        var data = google.visualization.arrayToDataTable([
            ['ID', 'Item Code', 'Item Name', 'Category', 'UOM', 'In Stock', 'Stock Not In Use',
                'Design', 'Assembly', 'Repair'
            ],

                    @foreach($result3 as $row)

        [{{$row-> id}}, '{{$row->item_code}}', '{{$row->item_name}}', '{{$row->category}}', '{{$row->UOM}}', {{$row->in_stock}},{{$row ->not_instock}}, {{$row->station_design_quantity}}, {{$row->station_assembly_quantity}}, {{$row->station_repair_quantity}}],

    @endforeach
                ]);
    var chart3 = new google.visualization.Table(document.getElementById('tablechart'));
    chart3.draw(data, {
        showRowNumber: false,
        width: '100%',
        height: '25%'
    });
            } //end of tablechart

</script>


<div class="container-fluid">
    <div class="row d-flex justify-content-center">
    
        <div class="col-sm p-4 bg-light">

            <div class="row justify-content-center">
                
                <div class="p-3 mb-2 bg-gradient-light text-dark" style="background-color: #ebe534;">
                    <p style="text-align:center;">In Stock <br style="text-align:center;"></p>
                    <h1 style="text-align:center;">{{$inStock_Sum}}</h1>
                </div>
                <div class="p-3 mb-2 bg-gradient-light text-dark" style="background-color: #34eb9f;">
                    <p style="text-align:center;">Not in Stock <br style="text-align:center;"></p>
                    <h1 style="text-align:center;">{{$notInStock_Sum}}</h1>
                </div>
                <div class="p-3 mb-2 bg-gradient-light text-dark" style="background-color: #ebe534;">
                    <p style="text-align:center;">Design<br></p>
                    <h1 style="text-align:center;">{{$design_Sum}}</h1>
                </div>
                <div class="p-3 mb-2 bg-gradient-light text-dark" style="background-color: #34eb9f;">
                    <p style="text-align:center;">Assembly <br></p>
                    <h1 style="text-align:center;">{{$assembly_Sum}}</h1>
                </div>
                <div class="p-3 mb-2 bg-gradient-light text-dark" style="background-color: #eb34d9;">
                    <p style="text-align:center;"> Repair <br></p>
                    <h1 style="text-align:center;">{{$repair_Sum}}</h1>
                </div>
            </div>
       
    
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div id="stackbar" style="width: 600px; height: 500px;"></div>
                    <div style="width: 10px"></div>
                    <div id="piechart" style="width: 600px; height: 500px;"></div>
                </div>
            </div>
           
            <div id="tablechart" style="width: 100%; height: 600px;"></div>
    
        </div>
    
    </div>
</div>