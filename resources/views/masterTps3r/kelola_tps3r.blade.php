@extends('layouts.main')
@section('title', 'Kelola TPS3R')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-building amber-text s-18"></i>
                        Kelola TPS3R
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterTps3r.tps3r.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                        <div id="alert"></div>
                            <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                {{ method_field('POST') }}
                                <input type="hidden" id="id" name="id"/>
                                <h4 id="formTitle">Tambah Kelola TPS3R</h4><hr>
                               
                                
                                <!-- Data Sampah Terkelola -->
                               
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control light fs-14"  name="id_tps3r" id="id_tps3r"
                                                    value="{{$tps->id}}" hidden>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_masuk" class="font-weight-bold fs-14">Sampah Masuk (ton)<span
                                                        class="text-danger fs-12">*</span></label>
                                             <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_masuk" id="sampah_masuk"
                                                    value="" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sampah_landfil" class="font-weight-bold fs-14">Sampah Landfil (ton)<span
                                                        class="text-danger fs-12">*</span></label>
                                             <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sampah_landfil" id="sampah_landfil"
                                                    value="" required>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="pakan_ternak" class="font-weight-bold fs-14">Bahan baku Pakan Ternak (ton)<span
                                                        class="text-danger fs-12">*</span></label>
                                             <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="pakan_ternak" id="pakan_ternak"
                                                    value="" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="kompos" class="font-weight-bold fs-14">Bahan baku Kompos (ton)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="kompos" id="kompos"
                                                value="" required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2 ml-3">
                                            <label for="tahun" class="font-weight-bold fs-14">Tahun<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" name="tahun" id="datepicker"
                                                value="" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="daur_ulang" class="font-weight-bold fs-14">Bahan baku Daur Ulang (ton)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="daur_ulang" id="daur_ulang"
                                                value="" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="up_cycle" class="font-weight-bold fs-14">Bahan baku Up-cycle (ton)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="up_cycle" id="up_cycle"
                                                value="" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sumber_energi" class="font-weight-bold fs-14">Bahan baku Sumber Energi (ton)<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" onkeypress="return hanyaAngka(event)" name="sumber_energi" id="sumber_energi"
                                                value="" required>
                                        </div>
                                    </div>
                                </div>

                               
                                <div style="" class="ml-3 mt-3">

                                    <button type="submit" class="btn btn-primary btn-sm" id="action"><i
                                            class="icon-save mr-1"></i>Tambahkan<span id="txtAction"></span></button>
                                    <a class="btn btn-secondary btn-sm white-text" onclick="add()" id="reset">Reset</a>
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
            url = "{{ route('MasterTps3r.tps3r.kelola_store') }}",
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
