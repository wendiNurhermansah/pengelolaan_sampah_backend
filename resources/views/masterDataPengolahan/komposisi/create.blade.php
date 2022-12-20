@extends('layouts.main')
@section('title', 'Tambah Komposisi Sampah')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-tags amber-text s-18"></i>
                        Komposisi Sampah
                    </h4>
                </div>
                
            </div>
            <div class="row justify-content-between">
                    <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                        <li>
                            <a class="nav-link" href="{{route('MasterDataPengolahan.komposisi_sampah.index')}}"><i class="icon icon-arrow_back"></i>Semua Data</a>
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
                                @csrf
                                <input type="hidden" id="id" name="id"/>
                                <h4 id="formTitle">Tambah Komposisi Sampah</h4><hr>
                                
                                <div class="row">
                                      
                                    <div class="col-md-6">
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="tahun" class="font-weight-bold fs-14">Tahun<span
                                                    class="text-danger fs-12">*</span></label>
                                            <input type="text" class="form-control light fs-14" name="tahun" id="datepicker"
                                                value="" required>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_provinsi" class="font-weight-bold fs-14">Provinsi<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_provinsi" id="provinsi" autocomplete="off">
                                                 <option value="">Pilih</option>
                                                 @foreach($provinsi as $i)
                                                    <option value="{{$i->id}}">{{$i->n_provinsi}}</option>
                                                 @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_kabupaten" class="font-weight-bold fs-14">Kabupaten<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_kabupaten" id="kabupaten" autocomplete="off">
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_kecamatan" class="font-weight-bold fs-14">Kecamatan<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_kecamatan" id="kecamatan" autocomplete="off">
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="id_kelurahan" class="font-weight-bold fs-14">Kelurahan<span class="text-danger fs-12">*</span></label>
                                            <select class="select2 form-control light" name="id_kelurahan" id="kelurahan" autocomplete="off">
                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="alamat" class="font-weight-bold fs-14">Alamat<span
                                                    class="text-danger fs-12">*</span></label>
                                            <textarea name="alamat" id="alamat" class="form-control light" cols="5" rows="2" required></textarea>
                                        </div>  
                                        <div class="form-group mt-2 ml-3">
                                            <label for="sisa_makanan" class="font-weight-bold fs-14">Sisa Makanan (%)<span
                                                    class="text-danger fs-12"></span></label>
                                                    <input type="text" class="form-control light fs-14" name="sisa_makanan" id="sisa_makanan"
                                                value="" onkeypress="return hanyaAngka(event)">
                                        </div>
                                        <div class="form-group mt-2 ml-3">
                                            <label for="kayu" class="font-weight-bold fs-14">Kayu / Ranting (%)<span
                                                    class="text-danger fs-12"></span></label>
                                                    <input type="text" class="form-control light fs-14" name="kayu" id="kayu"
                                                value="" onkeypress="return hanyaAngka(event)">
                                        </div>          
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-group mt-2 ml-3">
                                            <label for="kertas" class="font-weight-bold fs-14">Kertas / Karton (%)<span
                                                    class="text-danger fs-12"></span></label>
                                                    <input type="text" class="form-control light fs-14" name="kertas" id="kertas"
                                                value="" onkeypress="return hanyaAngka(event)">
                                        </div>  
                                        <div class="form-group mt-2 ml-3">
                                            <label for="plastik" class="font-weight-bold fs-14">Plastik (%)<span
                                                    class="text-danger fs-12"></span></label>
                                                    <input type="text" class="form-control light fs-14" name="plastik" id="plastik"
                                                value="" onkeypress="return hanyaAngka(event)">
                                        </div>   

                                        <div class="form-group mt-2 ml-3">
                                            <label for="logam" class="font-weight-bold fs-14">Logam (%)<span
                                                    class="text-danger fs-12"></span></label>
                                                    <input type="text" class="form-control light fs-14" name="logam" id="logam"
                                                value="" onkeypress="return hanyaAngka(event)">
                                        </div>  
                                        <div class="form-group mt-2 ml-3">
                                            <label for="kain" class="font-weight-bold fs-14">Kain (%)<span
                                                    class="text-danger fs-12"></span></label>
                                                    <input type="text" class="form-control light fs-14" name="kain" id="kain"
                                                value="" onkeypress="return hanyaAngka(event)">
                                        </div> 
                                        <div class="form-group mt-2 ml-3">
                                            <label for="karet" class="font-weight-bold fs-14">Karet / Kulit (%)<span
                                                    class="text-danger fs-12"></span></label>
                                                    <input type="text" class="form-control light fs-14" name="karet" id="karet"
                                                value="" onkeypress="return hanyaAngka(event)">
                                        </div>  
                                        <div class="form-group mt-2 ml-3">
                                            <label for="kaca" class="font-weight-bold fs-14">Kaca (%)<span
                                                    class="text-danger fs-12"></span></label>
                                                    <input type="text" class="form-control light fs-14" name="kaca" id="kaca"
                                                value="" onkeypress="return hanyaAngka(event)">
                                        </div>  
                                        <div class="form-group mt-2 ml-3">
                                            <label for="lainnya" class="font-weight-bold fs-14">Lainnya (%)<span
                                                    class="text-danger fs-12"></span></label>
                                                    <input type="text" class="form-control light fs-14" name="lainnya" id="lainnya"
                                                value="" onkeypress="return hanyaAngka(event)">
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

        //getprovinsi 
        $('#provinsi').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kabupaten').html(option);
            $('#kecamatan').html(option);
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kabupaten').html("<option value=''>Loading...</option>");
            url = "{{ route('MasterTpa.kabupatenByProvinsi', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kabupaten +"</li>";
                    });
                    $('#kabupaten').empty().html(option);
                    $("#kabupaten").val($("#kabupaten option:first").val()).trigger("change.select2");
                }else{
                    $('#kabupaten').html(option);
                    $('#kecamatan').html(option);
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });


    $('#kabupaten').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kecamatan').html(option);
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kecamatan').html("<option value=''>Loading...</option>");
            url = "{{ route('MasterTpa.kecamatanByKabupaten', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kecamatan +"</li>";
                    });
                    $('#kecamatan').empty().html(option);
                    $("#kecamatan").val($("#kecamatan option:first").val()).trigger("change.select2");
                }else{
                    $('#kecamatan').html(option);
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });
    $('#kecamatan').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kelurahan').html("<option value=''>Loading...</option>");
            url = "{{ route('MasterTpa.kelurahanByKecamatan', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kelurahan +"</li>";
                    });
                    $('#kelurahan').empty().html(option);
                    $("#kelurahan").val($("#kelurahan option:first").val()).trigger("change.select2");
                }else{
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
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
            url = "{{ route('MasterDataPengolahan.komposisi_sampah.store') }}",
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
