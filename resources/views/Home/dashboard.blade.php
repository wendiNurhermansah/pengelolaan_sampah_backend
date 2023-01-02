@extends('layouts.main')
@section('title', 'Dashboard')

@section('style')



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
                                    <span class="icon icon-note-list text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title">Pengurangan Sampah</div>
                                <h5 class="sc-counter mt-3">1228 </h5>
                                <h5>Ton/Thn</h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-mail-envelope-open s-48"></span>
                                </div>
                                <div class="counter-title ">Penanganan Sampah</div>
                                <h5 class="sc-counter mt-3">1228 </h5>
                                <h5>Ton/Thn</h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-stop-watch3 s-48"></span>
                                </div>
                                <div class="counter-title">Sampah Terkelola</div>
                                <h5 class="sc-counter mt-3">1228 </h5>
                                <h5>Ton/Thn</h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-inbox-document-text s-48"></span>
                                </div>
                                <div class="counter-title">Sampah Tidak Terkelola</div>
                                <h5 class="sc-counter mt-3">550 </h5>
                                <h5>Ton/Thn</h5>
                            </div>
                            <div class="progress progress-xs r-0">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="128"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white p-4 r-5">
                            <div style="text-align:center">

                                <h4>
                                SEBARAN FASILITAS PENGELOLAAN SAMPAH 
                                </h4>
                                <p style="font-size: small;">Sebaran Fasilitas Pengelolaan Sampah adalah Sebaran fasilitas pengelolaan sampah <br> untuk mengetahui lokasi TPA, TPS 3R, Bank Sampah, dan lain-lain.</p>
                            </div> <hr>

                            <div id="maps">
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
                                <p style="font-size: small;">Grafik Komposisi Sampah terbagi 2 yaitu Grafik Komposisi Sampah berdasarkan Jenis Sampah dan Grafik Komposisi Sampah  berdasarkan Sumber Sampah. <br> Grafik Komposisi Sampah dibawah ini adalah Tahun Saat ini.</p>
                            </div> <hr>
                            
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

    

   

@endsection
