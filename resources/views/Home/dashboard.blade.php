@extends('layouts.main')
@section('title', 'Dashboard')

@section('style')



<link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />





@endsection

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid relative animatedParent animateOnce">
    
    <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
             <!--Today Tab Start-->
             <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
                
                <div class="row my-3">
                    <div class="col-md-3">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-asterisk text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title">Timbulan <br> Sampah</div>
                                <h5 class="sc-counter mt-3">{{$timbulan}} </h5>
                                <h5>Ton/Thn</h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-refresh text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title ">Sampah Masuk <br> TPA</div>
                                <h5 class="sc-counter mt-3">{{$tpa}} </h5>
                                <h5>Ton/Thn</h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-archive text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title">Sampah Masuk <br> Bank Sampah</div>
                                <h5 class="sc-counter mt-3">{{$bank_sampah}} </h5>
                                <h5>Ton/Thn</h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-factory text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title">Sampah Masuk <br> TPS3R</div>
                                <h5 class="sc-counter mt-3">{{$tps3r}} </h5>
                                <h5>Ton/Thn</h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="white p-4 r-5">
                            <div style="text-align:center">

                                <h4>
                                SEBARAN FASILITAS PENGELOLAAN SAMPAH 
                                </h4>
                                <p style="font-size: small;">Sebaran Fasilitas Pengelolaan Sampah adalah Sebaran fasilitas pengelolaan sampah <br> untuk mengetahui lokasi TPA, TPS 3R, Bank Sampah, dan lain-lain.</p>
                            </div> <hr>

                            <div style="text-align:center; height: 500px;"> 
                                <div id='map' style="height: 450px;"></div>

                            </div>




                            
                            
                            
                            
                        </div>
                        
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="white p-5 r-5">

                            <div style="text-align:center">

                                <h4>
                                GRAFIK KOMPOSISI SAMPAH 
                                </h4>
                                <p style="font-size: small;">Grafik Komposisi Sampah terbagi 2 yaitu Grafik Komposisi Sampah berdasarkan Jenis Sampah dan Grafik Komposisi Sampah  berdasarkan Sumber Sampah. <br> Grafik Komposisi Sampah dibawah ini adalah Tahun {{$tahun}}.</p>
                            </div> <hr>`

                            <div class="row text-center">
                                <div class="col-md-6">
                                    <div id="chart1"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="chart2"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                

                

               
               
            </div>
            <!--Today Tab End-->

           
        </div>
    </div>
</div>


@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/10.3.2/highcharts.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>

<script>
    const defaultLocation = [106.69285988221327, -6.290379573167988]

    mapboxgl.accessToken = '{{env("MAPBOX_KEY")}}';
    var map = new mapboxgl.Map({
        container: 'map',
        center: defaultLocation,
        zoom: 12.15,
        style: 'mapbox://styles/mapbox/streets-v11'
    });

   
</script>

<script type="text/javascript">
    

    // Data retrieved from https://netmarketshare.com
        Highcharts.chart('chart1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Komposisi Sampah Berdasarkan Jenis Sampah'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>:<br> {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: [{
                    name: 'Sisa Makanan',
                    y: {!!$sisa_makanan!!},
                    sliced: true,
                    selected: true
                    
                }, {
                    name: 'Kayu/Danting/Daun',
                    y: {!!$kayu!!}
                },  {
                    name: 'Kertas/Karton',
                    y: {!!$kertas!!}
                }, {
                    name: 'Plastik',
                    y: {!!$plastik!!}
                }, {
                    name: 'Karet/Kulit',
                    y: {!!$karet!!}
                },  {
                    name: 'Kain',
                    y: {!!$kain!!}
                }, {
                    name: 'Kaca',
                    y: {!!$kaca!!}
                }, {
                    name: 'Logam',
                    y: {!!$logam!!}
                }, {
                    name: 'Lainnya',
                    y: {!!$lainnya!!}
                }]
            }]
        });


        //chart2
        Highcharts.chart('chart2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Komposisi Sampah Berdasarkan Sumber Sampah'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: <br> {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: [{
                    name: 'Rumah Tangga',
                    y: {!! $rumah_tangga !!},
                    sliced: true,
                    selected: true
                }, {
                    name: 'Perkantoran',
                    y:{!! $perkantoran !!}
                },  {
                    name: 'Pasar Tradisional',
                    y: {!! $pasar !!}
                }, {
                    name: 'Pusat Perniagaan',
                    y: {!! $perniagaan !!}
                }, {
                    name: 'Fasilitas Publik',
                    y: {!! $publik !!}
                },  {
                    name: 'Kawasan',
                    y: {!! $kawasan !!}
                }, {
                    name: 'Lainnya',
                    y: {!! $lainnya2 !!}
                }]
            }]
        });

</script>

    

   

@endsection
