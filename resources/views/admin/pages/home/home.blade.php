@extends('admin.layouts.home_layout')
{{--/admin/post/index--}}

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">

    <link rel="stylesheet" href="{{url('assets/all_pages/datepicker/persian-datepicker.css')}}"/><!--datepicker-->
    {{--    <script src="assets/all_pages/datepicker/jquery.js"></script><!--datepicker-->--}}
    <script src="{{url('assets/all_pages/js/jquery.js')}}"></script>

    <script src="{{url('assets/all_pages/datepicker/persian-date.js')}}"></script><!--datepicker-->
    <script src="{{url('assets/all_pages/datepicker/persian-datepicker.js')}}"></script><!--datepicker-->
@endsection

@section('title')
    صفحه اصلی ادمین سایت
@endsection

@section('content')

    <div class="row tm-content-row tm-mt-big">
        <div class="tm-col tm-col-big">
            <div class="bg-white tm-block h-100">
                <h2 class="tm-block-title">چه تعداد پست در هر دسته بندی</h2>
                <canvas id="myChart2"></canvas>
            </div>
        </div>
        <div class="tm-col tm-col-big">
            <div class="bg-white tm-block h-100">
                <h2 class="tm-block-title">تعداد نفراتی که در هر ماه عضو سایت شدند</h2>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="tm-col tm-col-small">
            <div class="bg-white tm-block h-100">
                <h2 class="tm-block-title">محبوبیت پست های سایت</h2>
                <canvas id="myChart3" class="chartjs-render-monitor"></canvas>
            </div>
        </div>

{{--        <div class="tm-col tm-col-big">--}}
{{--            <div class="bg-white tm-block h-100">--}}
{{--                <h2 class="tm-block-title">Performance</h2>--}}
{{--                <canvas id="barChart"></canvas>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="tm-col tm-col-small">--}}
{{--            <div class="bg-white tm-block h-100">--}}
{{--                <canvas id="pieChart" class="chartjs-render-monitor"></canvas>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="tm-col tm-col-big">
            <div class="bg-white tm-block h-100">
                <div class="row">
                    <div class="col-8">
                        <h2 class="tm-block-title d-inline-block">Top Product List</h2>

                    </div>
                    <div class="col-4 text-right">
                        <a href="products.html" class="tm-link-black">View All</a>
                    </div>
                </div>
                <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                    <li class="tm-list-group-item">
                        Donec eget libero
                    </li>
                    <li class="tm-list-group-item">
                        Nunc luctus suscipit elementum
                    </li>
                    <li class="tm-list-group-item">
                        Maecenas eu justo maximus
                    </li>
                    <li class="tm-list-group-item">
                        Pellentesque auctor urna nunc
                    </li>
                    <li class="tm-list-group-item">
                        Sit amet aliquam lorem efficitur
                    </li>
                    <li class="tm-list-group-item">
                        Pellentesque auctor urna nunc
                    </li>
                    <li class="tm-list-group-item">
                        Sit amet aliquam lorem efficitur
                    </li>
                </ol>
            </div>
        </div>
        <div class="tm-col tm-col-big">
            <div class="bg-white tm-block h-100">
                <h2 class="tm-block-title">تقویم شمسی</h2>
                <div style="margin-top: 50px">
{{--                    <div id="calendar"></div>--}}
                    <div class="locale-fa" style="direction: initial"></div>

                </div>
            </div>
        </div>
        <div class="tm-col tm-col-small">
            <div class="bg-white tm-block h-100">
                <h2 class="tm-block-title">Upcoming Tasks</h2>
                <ol class="tm-list-group">
                    <li class="tm-list-group-item">List of tasks</li>
                    <li class="tm-list-group-item">Lorem ipsum doloe</li>
                    <li class="tm-list-group-item">Read reports</li>
                    <li class="tm-list-group-item">Write email</li>

                    <li class="tm-list-group-item">Call customers</li>
                    <li class="tm-list-group-item">Go to meeting</li>
                    <li class="tm-list-group-item">Weekly plan</li>
                    <li class="tm-list-group-item">Ask for feedback</li>

                    <li class="tm-list-group-item">Meet Supervisor</li>
                    <li class="tm-list-group-item">Company trip</li>
                </ol>
            </div>
        </div>
    </div>

@endsection

@section('custom-js')
    <script>
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
            // barChart,
            // pieChart;
        // DOM is ready
        $(function () {
            updateChartOptions();
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart
            drawCalendar(); // Calendar

            $(window).resize(function () {
                updateChartOptions();
                updateLineChart();
                updateBarChart();
                reloadPage();
            });
        })
        //i added
        // Global Options
        // Chart.defaults.global.defaultFontFamily = 'Lato';
        // Chart.defaults.global.defaultFontSize = 18;
        // Chart.defaults.global.defaultFontColor = '#777';

        let myChart = document.getElementById('myChart').getContext('2d');

        let userRegisterChart = new Chart( myChart ,{
            type: 'bar', //bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{

                labels:['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند'],
                datasets:[{
                    label: 'ثبت نام',
                    data: [
                        {{$all_months[1]}},
                        {{$all_months[2]}},
                        {{$all_months[3]}},
                        {{$all_months[4]}},
                        {{$all_months[5]}},
                        {{$all_months[6]}},
                        {{$all_months[7]}},
                        {{$all_months[8]}},
                        {{$all_months[9]}},
                        {{$all_months[10]}},
                        {{$all_months[11]}},
                        {{$all_months[12]}}],
                    // backgroundColor: 'green,'
                    backgroundColor: [
                        // '#9f132100',
                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(153,102,255,0.2)',
                        'rgba(255,159,64,0.2)',

                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(153,102,255,0.2)',
                        'rgba(255,159,64,0.2)',
                    ],
                    borderWidth:1.2,
                    borderColor:[
                        'rgba(255,99,132,0.6)',
                        'rgba(54,162,235,0.6)',
                        'rgba(255,206,86,0.6)',
                        'rgba(75,192,192,0.6)',
                        'rgba(153,102,255,0.6)',
                        'rgba(255,159,64,0.6)',

                        'rgba(255,99,132,0.6)',
                        'rgba(54,162,235,0.6)',
                        'rgba(255,206,86,0.6)',
                        'rgba(75,192,192,0.6)',
                        'rgba(153,102,255,0.6)',
                        'rgba(255,159,64,0.6)',
                    ],
                    hoverBorderWidth:2,
                    // hoverBorderColor:'#000,'

                }]
            },
            options:{
                title:{
                    // display:true,
                    // text:'تعداد نفراتی که در هر ماه عضو سایت شدند',
                    // fontsize:25,
                },
                legend:{
                    // display:false,
                  // position:'right',
                }
            },
            layouts:{
                // padding:{
                //     left:50,
                //     right:0,
                //     top:0,
                //     bottom:0,
                // }
            },
            tooltips:{
                // enabled:false, //doesn't work
            }
        });

        //i added

        let myChart2 = document.getElementById('myChart2').getContext('2d');

        let categoryPostsCount = new Chart( myChart2 ,{
            type: 'line', //bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:[
                    @foreach($categories as $category)
                        '{{$category->title}}',
                    {{--console.log({{$category->title}}),--}}
                    @endforeach


                ],
                datasets:[{
                    label: 'محبوبیت دسته',
                    data: [
                        @foreach($cat_posts_count as $cat_post_count)
                            '{{$cat_post_count}}',
                        @endforeach
                        ],
                    backgroundColor: ['#9f132100',],
                    borderWidth:1.2,
                    borderColor:['red'],
                    hoverBorderWidth:2,
                    // hoverBorderColor:'#000,'

                }]
            },

            options: {
                scaleShowValues: true,
                scales: {
                    xAxes: [{
                        ticks: {
                            autoSkip: false
                        }
                    }]
                }
            },
        });

        //i added

        let myChart3 = document.getElementById('myChart3').getContext('2d');

        let likedPostsOrNot = new Chart( myChart3 ,{
            type: 'pie', //bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{

                labels:['dislike','like',],
                datasets:[{
                    // label: 'محبوبیت پست ها',
                    data: [
                        {{$dislikes}},
                        {{$likes}},
                    ],
                    backgroundColor: ['#9966ff','#4bc0c0'],
                }]
            },
            options: {
                // Boolean - whether or not the chart should be responsive and resize when the browser does.

                responsive: true,

                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

                maintainAspectRatio: false,
            },
        });


    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".example1").pDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '.observer-example-alt'
            });
        });

        $('.locale-fa').persianDatepicker({
            inline: true,

        });
    </script>
@endsection
