<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li class="treeview"><a href="#">
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

    @can('masterTpa')
    <li class="header light"><strong>MASTER TPA</strong></li>

    <li>
        <a href="{{route('MasterTpa.jenis_tpa.index')}}"><i class="icon icon-code-fork blue-text s-18"></i>
        <span>Jenis TPA</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    <li>
        <a href="{{route('MasterTpa.status_tpa.index')}}"><i class="icon icon-check blue-text s-18"></i>
        <span>Status TPA</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    <li>
        <a href="{{route('MasterTpa.tpa.index')}}"><i class="icon icon-retweet blue-text s-18"></i>
        <span>TPA</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>


    @endcan 

    
   
</ul>
