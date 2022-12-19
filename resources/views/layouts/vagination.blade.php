<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li class="treeview"><a href="{{route('dashboard')}}">
        <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
    </a>
    </li>

    <li class="header light"><strong>MASTER ROLE</strong></li>
    @can('role')
    <li>
        <a href="{{route('MasterRole.role.index')}}">
            <i class="icon icon-key4 amber-text s-18"></i> <span>Role</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    @endcan

    @can('permission')

    <li class="no-b">
        <a href="{{route('MasterRole.permissions.index')}}">
            <i class="icon icon-clipboard-list2 text-success s-18"></i> <span>Permission</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan

    @can('pengguna')

    <li>
        <a href="{{route('MasterRole.pengguna.index')}}"><i class="icon icon-user blue-text s-18"></i>
        <span>Pengguna</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan

    

    <li class="header light"><strong>MASTER PENGELOLAAN SAMPAH</strong></li>
    @can('masterTpa')
    
    <li class="treeview"><a href="#"><i class="icon icon-refresh orange-text s-18"></i>TPA<i
                    class="icon icon-chevron-down s-10 mr-2 pull-right"></i></a>
        <ul class="treeview-menu">
            <!-- <li><a href="{{route('MasterTpa.jenis_tpa.index')}}"><i class="icon icon-circle-o"></i><span>Jenis TPA</span> </a>
            </li> -->
            <li><a href="{{route('MasterTpa.status_tpa.index')}}"><i class="icon icon-circle-o"></i><span>Status TPA</span> </a>
            </li>
            <li><a href="{{route('MasterTpa.tpa.index')}}"><i class="icon icon-circle-o"></i><span>TPA</span></a>
                </li>
            </ul>
    </li> 

    
   
    

    @endcan 

    @can('bank_sampah')

    

    <!-- <li class="treeview"><a href="#"><i class="icon icon-archive blue-text s-18"></i>BANK SAMPAH<i
        class="icon icon-chevron-down s-10 mr-2 pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{route('MasterBankSampah.jenis_bank_sampah.index')}}"><i class="icon icon-circle-o"></i><span>Jenis Bank Sampah</span>  </a>
            </li>
            <li><a href="{{route('MasterBankSampah.status_bank_sampah.index')}}"><i class="icon icon-circle-o"></i><span>Status Bank Sampah</span>  </a>
            </li>
            <li><a href="{{route('MasterBankSampah.bank_sampah.index')}}""><i class="icon icon-circle-o"></i><span>Bank Sampah</span></a>
                </li>
            </ul>
    </li>  -->
    <li>
        <a href="{{route('MasterBankSampah.bank_sampah.index')}}"><i class="icon icon-archive blue-text s-18"></i>
        <span>BANK SAMPAH</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    @endcan

    

    
    @can('tps3r')
    

    <!-- <li class="treeview"><a href="#"><i class="icon icon-building light-green-text s-18"></i>TPS3R<i
            class="icon icon-chevron-down s-10 mr-2 pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{route('MasterTps3r.jenis_tps3r.index')}}"><i class="icon icon-circle-o"></i><span>Jenis TPS3R</span>  </a>
            </li>
            <li><a href="{{route('MasterTps3r.status_tps3r.index')}}"><i class="icon icon-circle-o"></i><span>Status TPS3R</span>  </a>
            </li>
            <li><a href="{{route('MasterTps3r.tps3r.index')}}"><i class="icon icon-circle-o"></i><span>TPS3R</span></a>
                </li>
            </ul>
    </li>  -->

    <li>
        <a href="{{route('MasterTps3r.tps3r.index')}}"><i class="icon icon-building green-text s-18"></i>
        <span>TPS3R</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    
    @endcan

    

    @can('masterHasil_pengolahan')
    <li class="header light"><strong>MASTER HASIL PENGOLAHAN SAMPAH</strong></li>
    <li>
        <a href="{{route('MasterPengolahan.komposisi_sampah.index')}}"><i class="icon icon-leaf green-text s-18"></i>
        <span>Komposisi Sampah</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    <li>
        <a href="{{route('MasterPengolahan.sumber_sampah.index')}}"><i class="icon icon-filter orange-text s-18"></i>
        <span>Sumber Sampah</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    <li>
        <a href="#"><i class="icon icon-retweet blue-text s-18"></i>
        <span>Hasil Pengolahan Sampah</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan



    <li class="header light"><strong></strong></li>
    
   
</ul>
