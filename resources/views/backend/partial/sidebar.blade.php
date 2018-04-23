<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p style="text-transform: capitalize">{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            @if(Auth::user()->role_id)
                 <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-user text-yellow"></i>
                        <span>NGƯỜI DÙNG</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('user.create')}}"><i class="fa fa-plus-circle"></i> Thêm Người Dùng</a>
                        </li>
                        <li><a href="{{route('user.index')}}"><i class="fa fa-list-ul"></i> Tất Cả Người Dùng</a></li>
                    </ul>
                </li>
            @endif
                <li><a href="{{route('about.index')}}"><i class="fa fa-book text-fuchsia"></i> <span>Giới thiệu</span></a></li>
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-bookmark text-green"></i>
                        <span>Slider</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('slider.create')}}"><i class="fa fa-plus-circle"></i> Thêm</a>
                        </li>
                        <li><a href="{{route('slider.index')}}"><i class="fa fa-list-ul"></i> Danh sách</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-image text-green"></i>
                        <span>Bộ sưu tập</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('gallery.create')}}"><i class="fa fa-plus-circle"></i> Thêm</a>
                        </li>
                        <li><a href="{{route('gallery.index')}}"><i class="fa fa-list-ul"></i> Danh sách</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-briefcase text-green"></i>
                        <span>Dịch vụ</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('service.create')}}"><i class="fa fa-plus-circle"></i> Thêm</a>
                        </li>
                        <li><a href="{{route('service.index')}}"><i class="fa fa-list-ul"></i> Danh sách</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-leanpub text-yellow"></i>
                        <span>Loại Tin tức</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('category.create')}}"><i class="fa fa-plus-circle"></i> Thêm</a>
                        </li>
                        <li><a href="{{route('category.index')}}"><i class="fa fa-list-ul"></i> Danh sách</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-leanpub text-yellow"></i>
                        <span>Tin tức</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('news.create')}}"><i class="fa fa-plus-circle"></i> Thêm</a>
                        </li>
                        <li><a href="{{route('news.index')}}"><i class="fa fa-list-ul"></i> Danh sách</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-youtube text-yellow"></i>
                        <span>Video</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('video.create')}}"><i class="fa fa-plus-circle"></i> Thêm</a>
                        </li>
                        <li><a href="{{route('video.index')}}"><i class="fa fa-list-ul"></i> Danh sách</a></li>
                    </ul>
                </li>
                <li><a href="{{route('banner.index')}}"><i class="fa fa-bold text-aqua"></i> <span>Banner</span></a></li>
                <li><a href="{{route('contact.index')}}"><i class="fa fa-bell text-aqua"></i> <span>LIÊN HỆ</span></a></li>
                <li><a href="{{route('config.index')}}"><i class="fa fa-cogs text-aqua"></i> <span>Thông tin chung</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>