@extends('layouts.main')
@section('title', 'Edit Bank Sampah')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-building amber-text s-18"></i>
                        Bank Sampah
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterBankSampah.bank_sampah.show', $bank_sampah->id_bank_sampah)}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                                <h4 id="formTitle">Edit Bank Sampah</h4><hr>
                               
                                
                                <!-- Data Sampah Terkelola -->
                               
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control light fs-14"  name="id_bank_sampah" id="id_bank_sampah"
                                                    value="{{$bank_sampah->id_bank_sampah}}" hidden>
                                        <input type="text" class="form-control light fs-14"  name="id" id="id"
                                                    value="{{$bank_sampah->id}}" hidden>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_masuk" class="font-weight-bold fs-14">Sampah Masuk (ton)<span
                                                        class="text-danger fs-12">*</span></label>
                                             <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_masuk" id="sampah_masuk"
                                                    value="{{$bank_sampah->sampah_masuk}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_landfil" class="font-weight-bold fs-14">Sampah Landfil (ton)<span
                                                        class="text-danger fs-12">*</span></label>
                                             <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_landfil" id="sampah_landfil"
                                                    value="{{$bank_sampah->sampah_landfil}}" required>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="pakan_ternak" class="font-weight-bold fs-14">Bahan baku Pakan Ternak (ton)<span
                                                        class="text-danger fs-12">*</span></label>
                                             <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="pakan_ternak" id="pakan_ternak"
                                                    value="{{$bank_sampah->pakan_ternak}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="kompos" class="font-weight-bold fs-14">Bahan baku Kompos (ton)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="kompos" id="kompos"
                                                value="{{$bank_sampah->kompos}}" required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2 ml-3">
                                            <label for="tahun" class="font-weight-bold fs-14">Tahun<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" name="tahun" id="datepicker"
                                                value="{{$bank_sampah->tahun}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="daur_ulang" class="font-weight-bold fs-14">Bahan baku Daur Ulang (ton)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="daur_ulang" id="daur_ulang"
                                                value="{{$bank_sampah->daur_ulang}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="up_cycle" class="font-weight-bold fs-14">Bahan baku Up-cycle (ton)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="up_cycle" id="up_cycle"
                                                value="{{$bank_sampah->up_cycle}}" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sumber_energi" class="font-weight-bold fs-14">Bahan baku Sumber Energi (ton)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sumber_energi" id="sumber_energi"
                                                value="{{$bank_sampah->sumber_energi}}" required>
                                        </div>
                                    </div>
                                </div>

                               
                                <div style="" class="ml-3 mt-3">

                                    <button type="submit" class="btn btn-success btn-sm" id="action"><i
                                            class="icon-save mr-1"></i>Rubah<span id="txtAction"></span></button>
                                    <!-- <a class="btn btn-secondary btn-sm white-text" onclick="add()" id="reset">Reset</a> -->
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
            url = "{{ route('MasterBankSampah.bank_sampah.kelola_update_bank_sampah') }}",
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
