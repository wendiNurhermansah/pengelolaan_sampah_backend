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
    
    

    <li>
        <a href="{{route('MasterTpa.tpa.index')}}"><i class="icon icon-refresh orange-text s-18"></i>
        <span>TPA</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    @endcan 

    @can('bank_sampah')

    

    
    <li>
        <a href="{{route('MasterBankSampah.bank_sampah.index')}}"><i class="icon icon-archive blue-text s-18"></i>
        <span>BANK SAMPAH</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    @endcan

    

    
    @can('tps3r')
    

    
    <li>
        <a href="{{route('MasterTps3r.tps3r.index')}}"><i class="icon icon-building green-text s-18"></i>
        <span>TPS3R</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    
    @endcan

    

  

    @can('masterDataPengolahan')

    <li class="header light"><strong>MASTER DATA PENGOLAHAN SAMPAH</strong></li>
    <li>
        <a href="{{route('MasterDataPengolahan.timbulan_sampah.index')}}"><i class="icon icon-asterisk blue-text s-18"></i>
        <span>Timbulan Sampah</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    <li>
        <a href="{{route('MasterDataPengolahan.komposisi_sampah.index')}}"><i class="icon icon-tags green-text s-18"></i>
        <span>Komposisi Sampah</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    <li>
        <a href="{{route('MasterDataPengolahan.sumber_sampah.index')}}"><i class="icon icon-pause orange-text s-18"></i>
        <span>Sumber Sampah</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    @endcan
      







    <li class="header light"><strong></strong></li>
    
   
</ul>
