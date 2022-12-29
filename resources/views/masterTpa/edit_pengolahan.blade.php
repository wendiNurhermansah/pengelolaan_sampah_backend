@extends('layouts.main')
@section('title', 'Edit Pengolahan TPA')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-retweet amber-text s-18"></i>
                        PENGOLAHAN TPA
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterTpa.tpa.show', $terkelola->id_tpa)}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
                        </li>
                    
                    </ul>
                </div>
        </div>
    </header>
<div class="container-fluid relative animatedParent animateOnce">
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b">
                    <div class="card-body">
                    <div id="load" class="loader" style="display: none">
                            <div class="plane-container">
                                <div class="preloader-wrapper small active">
                                    <div class="spinner-layer spinner-blue">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                    </div>

                                    <div class="spinner-layer spinner-red">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                    </div>

                                    <div class="spinner-layer spinner-yellow">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                    </div>

                                    <div class="spinner-layer spinner-green">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="alert"></div>
                            <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                {{ method_field('POST') }}
                                <input type="hidden" id="id" name="id"/>
                                <h4 id="formTitle">Edit Pengolahan TPA</h4><hr>
                               
                                
                                <!-- Data Sampah Terkelola -->
                               
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control light fs-14"  name="id_tpa" id="id_tpa"
                                                    value="{{$terkelola->id_tpa}}" hidden>
                                        <input type="text" class="form-control light fs-14"  name="id" id="id"
                                                    value="{{$terkelola->id}}" hidden>

                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_masuk" class="font-weight-bold fs-14">Sampah Masuk<span
                                                        class="text-danger fs-12">*</span></label>
                                             <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_masuk" id="sampah_masuk"
                                                    value="{{$terkelola->sampah_masuk}}" required>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_organik" class="font-weight-bold fs-14">Sampah Organik terolah<span
                                                        class="text-danger fs-12">*</span></label>
                                             <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_organik" id="sampah_organik"
                                                    value="{{$terkelola->sampah_organik}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_an_organik" class="font-weight-bold fs-14">Sampah An-Organik terolah<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_an_organik" id="sampah_an_organik"
                                                value="{{$terkelola->sampah_an_organik}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="energy" class="font-weight-bold fs-14">Energi yang dihasilkan (MW)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="energy" id="energy"
                                                value="{{$terkelola->energy}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_landfil" class="font-weight-bold fs-14">Sampah Landfil<span
                                                        class="text-danger fs-12">*</span></label>
                                             <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_landfil" id="sampah_landfil"
                                                    value="{{$terkelola->sampah_landfil}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="tahun" class="font-weight-bold fs-14">Tahun<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" name="tahun" id="datepicker"
                                                value="{{$terkelola->tahun}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="recovery_pemulung" class="font-weight-bold fs-14">Recovery Pemulung<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="recovery_pemulung" id="recovery_pemulung"
                                                value="{{$terkelola->recovery_pemulung}}" required>
                                        </div>
                                        
                                    </div>
                                </div>

                               
                                <div style="" class="ml-3 mt-3">

                                    <button type="submit" class="btn btn-success btn-sm" id="action"><i
                                            class="icon-save mr-1"></i>Rubah<span id="txtAction"></span></button>
                                    
                                </div>
                                

                            </form>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('script')

    <script type="text/javascript">
        function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
        //tahun 
        $("#datepicker").datepicker({
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years"
        });

       

    //resset
    function add(){
        save_method = "add";
        $('#form').trigger('reset');
    }




    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            $('#load').show();
            url = "{{ route('MasterTpa.edit_pengolahan.pengolahan_update') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    $('#load').hide();
                    location.reload();
                    add();
                },
                error : function(data){
                    err = '';
                    respon = data.responseJSON;
                    if(respon.errors){
                        $.each(respon.errors, function( index, value ) {
                            err = err + "<li>" + value +"</li>";
                        });
                    }
                    $('#load').hide();
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
            });
            return false;
        }
        $(this).addClass('was-validated');
    });


       

    </script>

@endsection
