@extends('layouts.main')
@section('title', 'Dashboard')

@section('style')



<link href="https://api.mapbox.com/mapbox-gl-js/v2.12.0/mapbox-gl.css" rel="stylesheet">


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
                            @foreach ($tps3r_maps as $item)
                                <table id="tableData" style="display: none;">
                                    <tr>
                                        <td><input type="text" id="kode" value="{{ $item->kode }}" class="lokasi"></td>
                                        <td><input type="text" id="nama_fasilitas" value="{{ $item->nama_fasilitas }}"  class="nama_fasilitas"></td>
                                        <td><input type="text" id="luas" value="{{ $item->luas }}" class="luas"></td>
                                        <td><input type="text" id="latitude" value="{{ $item->latitude }}" class="latitude"></td>
                                        <td><input type="text" id="longitude" value="{{ $item->longitude }}" class="longitude"></td>
                                        <td><input type="text" id="alamat" value="{{ $item->alamat }}" class="alamat"></td>
                                    </tr>
                                </table>
                            @endforeach
                            @foreach ($bank_sampah_maps as $item)
                                <table id="tableData" style="display: none;">
                                    <tr>
                                        <td><input type="text" id="kode_bank_sampah" value="{{ $item->kode }}" class="lokasi_bank_sampah"></td>
                                        <td><input type="text" id="nama_fasilitas_bank_sampah" value="{{ $item->nama_fasilitas }}"  class="nama_fasilitas_bank_sampah"></td>
                                        <td><input type="text" id="luas_bank_sampah" value="{{ $item->luas }}" class="luas_bank_sampah"></td>
                                        <td><input type="text" id="latitude_bank_sampah" value="{{ $item->latitude }}" class="latitude_bank_sampah"></td>
                                        <td><input type="text" id="longitude_bank_sampah" value="{{ $item->longitude }}" class="longitude_bank_sampah"></td>
                                        <td><input type="text" id="alamat_bank_sampah" value="{{ $item->alamat }}" class="alamat_bank_sampah"></td>
                                    </tr>
                                </table>
                            @endforeach
                            @foreach ($tpa_maps as $item)
                                <table id="tableData" style="display: none;">
                                    <tr>
                                        <td><input type="text" id="kode_tpa" value="{{ $item->kode }}" class="lokasi_tpa"></td>
                                        <td><input type="text" id="nama_fasilitas_tpa" value="{{ $item->nama_fasilitas }}"  class="nama_fasilitas_tpa"></td>
                                        <td><input type="text" id="luas_tpa" value="{{ $item->luas }}" class="luas_tpa"></td>
                                        <td><input type="text" id="latitude_tpa" value="{{ $item->latitude }}" class="latitude_tpa"></td>
                                        <td><input type="text" id="longitude_tpa" value="{{ $item->longitude }}" class="longitude_tpa"></td>
                                        <td><input type="text" id="alamat_tpa" value="{{ $item->alamat }}" class="alamat_tpa"></td>
                                    </tr>
                                </table>
                            @endforeach
                            <div style="text-align: center; " class="mb-3">
                                <button class="btn btn-primary btn-sm" onclick="semua()">All</button>
                                <button class="btn btn-primary btn-sm" onclick="tpa()">TPA</button>
                                <button class="btn btn-primary btn-sm" onclick="tps3r()">TPS3R</button>
                                <button class="btn btn-secondary btn-sm" onclick="banksampah()">BANK SAMPAH</button>
                               
                            
                            <div class="tab-content mt-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-semua" role="tabpanel" aria-labelledby="pills-home-tab">
                                    @include('Home.maps3')
                                    
                                </div>
                                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    @include('Home.maps2')
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    @include('Home.mpas1')
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    @include('Home.maps')
                                </div>
                            </div>
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

<script type="text/javascript">

    //mapss

   


    function semua(){
        var url = "{{route('maps_semua')}}";
        window.location.href = url;
    }

  
     function tpa(){
        var url = "{{route('maps_tpa')}}";
        window.location.href = url;
    }

    
    function tps3r(){
      
        var url = "{{route('maps_tps3r')}}";
        window.location.href = url;
    }
    function banksampah(){

        var url = "{{route('maps_bank_sampah')}}";
        window.location.href = url;
      
    }

            var greenIcon = L.icon({
                iconUrl: 'images/marker_green.png',
                iconSize:     [30], // size of the icon
                iconAnchor:   [12, 12], // point of the icon which will correspond to marker's location
                popupAnchor:  [0, -12] // point from which the popup should open relative to the iconAnchor
            });
            var redIcon = L.icon({
                iconUrl: 'images/marker_red.png',
                iconSize:     [30],
                iconAnchor:   [12, 12],
                popupAnchor:  [0, -12]
            });
            var yellowIcon = L.icon({
                iconUrl: 'images/marker_yellow.png',
                iconSize:     [30],
                iconAnchor:   [12, 12],
                popupAnchor:  [0, -12]
            });
            var blueIcon = L.icon({
                iconUrl: 'images/marker_blue.png',
                iconSize:     [30],
                iconAnchor:   [12, 12],
                popupAnchor:  [0, -12]
            });
            var greyIcon = L.icon({
                iconUrl: 'images/marker_grey.png',
                iconSize:     [30],
                iconAnchor:   [12, 12],
                popupAnchor:  [0, -12]
            });

            
        //MARKER MAPS TPS3R

        var kode,nama_fasilitas, luas, latitude, longitude, alamat;
            var locations = [];
            const lokasi        = document.querySelectorAll(".lokasi");
            const Jnama_fasilitas   = document.querySelectorAll(".nama_fasilitas");
            
            const Jluas        = document.querySelectorAll(".luas");
            const Jlatitude            = document.querySelectorAll(".latitude");
            const Jlongitude          = document.querySelectorAll(".longitude");
            const Jalamat          = document.querySelectorAll(".alamat");

            for (let i = 0; i < lokasi.length; i++) {
                console.log(locations);
                kode           = lokasi[i].value;
                nama_fasilitas = Jnama_fasilitas[i].value;
                luas           = formatRupiah(Jluas[i].value);
                latitude       = Jlatitude[i].value;
                longitude      = Jlongitude[i].value;
                alamat         = Jalamat[i].value;

                var icon = greenIcon;

                locations[i]    = ["<b>TPS3R</b><br><table border='1'><tr><td>Kode</td><td>"+kode+"</td></tr><tr><td>Nama Fasilitas</td><td>"+nama_fasilitas+"</td></tr><tr><td>Luas</td><td>"+luas+"</td></tr><tr><td>Latitude</td><td>"+latitude+"</td></tr><tr><td>Longitude</td><td>"+longitude+"</td></tr><tr><td>Alamat</td><td>"+alamat+"</td></tr></table>", latitude, longitude, icon];
        }

        //MARKER MAPS BANK SAMPAH

        var kode_bank_sampah,nama_fasilitas_bank_sampah, luas_bank_sampah, latitude_bank_sampah, longitude_bank_sampah, alamat_bank_sampah;
            var locations2 = [];
            const lokasi2        = document.querySelectorAll(".lokasi_bank_sampah");
            const Jnama_fasilitas2   = document.querySelectorAll(".nama_fasilitas_bank_sampah");
            
            const Jluas2        = document.querySelectorAll(".luas_bank_sampah");
            const Jlatitude2           = document.querySelectorAll(".latitude_bank_sampah");
            const Jlongitude2         = document.querySelectorAll(".longitude_bank_sampah");
            const Jalamat2         = document.querySelectorAll(".alamat_bank_sampah");

            for (let i = 0; i < lokasi2.length; i++) {
               
                kode_bank_sampah           = lokasi2[i].value;
                nama_fasilitas_bank_sampah = Jnama_fasilitas2[i].value;
                luas_bank_sampah           = formatRupiah(Jluas2[i].value);
                latitude_bank_sampah       = Jlatitude2[i].value;
                longitude_bank_sampah      = Jlongitude2[i].value;
                alamat_bank_sampah         = Jalamat2[i].value;

                var icon = blueIcon;

                locations2[i]    = ["<b>BANK SAMPAH</b><br><table border='1'><tr><td>Kode</td><td>"+kode_bank_sampah+"</td></tr><tr><td>Nama Fasilitas</td><td>"+nama_fasilitas_bank_sampah+"</td></tr><tr><td>Luas</td><td>"+luas_bank_sampah+"</td></tr><tr><td>Latitude</td><td>"+latitude_bank_sampah+"</td></tr><tr><td>Longitude</td><td>"+longitude_bank_sampah+"</td></tr><tr><td>Alamat</td><td>"+alamat_bank_sampah+"</td></tr></table>", latitude_bank_sampah, longitude_bank_sampah, icon];
        }


        //MARKER TPA

        var kode_tpa,nama_fasilitas_tpa, luas_tpa, latitude_tpa, longitude_tpa, alamat_tpa;
            var locations3 = [];
            const lokasi3        = document.querySelectorAll(".lokasi_tpa");
            const Jnama_fasilitas3   = document.querySelectorAll(".nama_fasilitas_tpa");
            
            const Jluas3        = document.querySelectorAll(".luas_tpa");
            const Jlatitude3           = document.querySelectorAll(".latitude_tpa");
            const Jlongitude3         = document.querySelectorAll(".longitude_tpa");
            const Jalamat3         = document.querySelectorAll(".alamat_tpa");

            for (let i = 0; i < lokasi3.length; i++) {
               
                kode_tpa           = lokasi3[i].value;
                nama_fasilitas_tpa = Jnama_fasilitas3[i].value;
                luas_tpa           = formatRupiah(Jluas3[i].value);
                latitude_tpa       = Jlatitude3[i].value;
                longitude_tpa      = Jlongitude3[i].value;
                alamat_tpa         = Jalamat3[i].value;

                var icon = redIcon;

                locations3[i]    = ["<b>TPA</b><br><table border='1'><tr><td>Kode</td><td>"+kode_tpa+"</td></tr><tr><td>Nama Fasilitas</td><td>"+nama_fasilitas_tpa+"</td></tr><tr><td>Luas</td><td>"+luas_tpa+"</td></tr><tr><td>Latitude</td><td>"+latitude_tpa+"</td></tr><tr><td>Longitude</td><td>"+longitude_tpa+"</td></tr><tr><td>Alamat</td><td>"+alamat_tpa+"</td></tr></table>", latitude_tpa, longitude_tpa, icon];
        }






        var map = L.map('map').setView([-6.2845781934796054, 106.70521974885833], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                            attribution: '<a href="https://diskominfo.tangerangselatankota.go.id/">Diskominfo</a> Kota Tangerang Selatan',
                            maxZoom: 18,
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoicHJlc2Vuc2lrb21pbmZvIiwiYSI6ImNrejd2Y2txaTBuOGwycXFtdW56ZWVobnYifQ.vzuq9gaJtjvb2FvIQ-_hGA'
                        }).addTo(map);
            //tps3r marker
            for (var i = 0; i < locations.length; i++) {
                marker = new L.marker([locations[i][1], locations[i][2]], {icon: locations[i][3]})
                    .bindPopup(locations[i][0])
                    .addTo(map);
            }
            

            //bank sampah marker 
            for (var i = 0; i < locations2.length; i++) {
                marker = new L.marker([locations2[i][1], locations2[i][2]], {icon: locations2[i][3]})
                    .bindPopup(locations2[i][0])
                    .addTo(map);
            }

            //Tpa Marker

            for (var i = 0; i < locations3.length; i++) {
                marker = new L.marker([locations3[i][1], locations3[i][2]], {icon: locations3[i][3]})
                    .bindPopup(locations3[i][0])
                    .addTo(map);
            }

            L.control.scale().addTo(map);

            //Maps TPS3R

            var map1 = L.map('map1').setView([-6.2845781934796054, 106.70521974885833], 13);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                                attribution: '<a href="https://diskominfo.tangerangselatankota.go.id/">Diskominfo</a> Kota Tangerang Selatan',
                                maxZoom: 18,
                                id: 'mapbox/streets-v11',
                                tileSize: 512,
                                zoomOffset: -1,
                                accessToken: 'pk.eyJ1IjoicHJlc2Vuc2lrb21pbmZvIiwiYSI6ImNrejd2Y2txaTBuOGwycXFtdW56ZWVobnYifQ.vzuq9gaJtjvb2FvIQ-_hGA'
                            }).addTo(map1);
                //tps3r marker
                for (var i = 0; i < locations.length; i++) {
                    marker = new L.marker([locations[i][1], locations[i][2]], {icon: locations[i][3]})
                        .bindPopup(locations[i][0])
                        .addTo(map1);
                }

                L.control.scale().addTo(map1);


            //maps TPA
            var map2 = L.map('map2').setView([-6.2845781934796054, 106.70521974885833], 13);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                                attribution: '<a href="https://diskominfo.tangerangselatankota.go.id/">Diskominfo</a> Kota Tangerang Selatan',
                                maxZoom: 18,
                                id: 'mapbox/streets-v11',
                                tileSize: 512,
                                zoomOffset: -1,
                                accessToken: 'pk.eyJ1IjoicHJlc2Vuc2lrb21pbmZvIiwiYSI6ImNrejd2Y2txaTBuOGwycXFtdW56ZWVobnYifQ.vzuq9gaJtjvb2FvIQ-_hGA'
                            }).addTo(map2);

            //Tpa Marker

            for (var i = 0; i < locations3.length; i++) {
                marker = new L.marker([locations3[i][1], locations3[i][2]], {icon: locations3[i][3]})
                    .bindPopup(locations3[i][0])
                    .addTo(map2);
            }

            L.control.scale().addTo(map2);

            //maps Bank Sampah

            var map3 = L.map('map3').setView([-6.2845781934796054, 106.70521974885833], 13);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                                attribution: '<a href="https://diskominfo.tangerangselatankota.go.id/">Diskominfo</a> Kota Tangerang Selatan',
                                maxZoom: 18,
                                id: 'mapbox/streets-v11',
                                tileSize: 512,
                                zoomOffset: -1,
                                accessToken: 'pk.eyJ1IjoicHJlc2Vuc2lrb21pbmZvIiwiYSI6ImNrejd2Y2txaTBuOGwycXFtdW56ZWVobnYifQ.vzuq9gaJtjvb2FvIQ-_hGA'
                            }).addTo(map3);

            for (var i = 0; i < locations2.length; i++) {
                marker = new L.marker([locations2[i][1], locations2[i][2]], {icon: locations2[i][3]})
                    .bindPopup(locations2[i][0])
                    .addTo(map3);
            }
            L.control.scale().addTo(map3);







    /* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}


 



    

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
