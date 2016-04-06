<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
        @if (Auth::check())

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{{ isset( ? Auth::user()->name : Auth::user()->email }}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        @else
            
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Send IT</li>
            <!-- Optionally, you can add icons to the links -->
            @if (Auth::check())
                <li><a href="{{ URL::route('dashboard') }}"><span>Dashboard</span><i class="fa fa-dashboard pull-right"></i></a></li>
                
                <li><a href="{{ URL::route('upload') }}"><span>Upload</span><i class="fa fa-cloud-upload pull-right"></i></a></li>
                <li><a href="{{ URL::route('history') }}"><span>Verlauf</span><i class="fa fa-history pull-right"></i></a></li>
                <li><a href="{{ URL::route('users') }}"><span>Benutzerverwaltung</span><i class="fa fa-users pull-right"></i></a></li>
                <li class="treeview">
                    <a href="{{ URL::route('profile') }}"><span>Einstellungen</span> <i class="fa fa-gear pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">Link in level 2</a></li>
                        <li><a href="#">Link in level 2</a></li>
                    </ul>
                </li>
                <li><a href="/logout"><span>Logout</span><i class="fa fa-sign-out pull-right"></i></a></li>
            @else
                <li><a href="/login"><span>Login</span><i class="fa fa-sign-in pull-right"></i></a></li>
            @endif
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
3. footer.blade.php

