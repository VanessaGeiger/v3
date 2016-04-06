<!-- Main Header -->
<header class="main-header">

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">

        <div class="container">

        <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="navbar-collapse" class="collapse navbar-collapse pull-left">
                <a class="navbar-brand" href="/">
                    <b>Send</b>
                    IT
                </a>
            <ul class="nav navbar-nav">
                <!-- Optionally, you can add icons to the links -->
                @if (Auth::check())
                    <li><a href="{{ URL::route('dashboard') }}"><i class="fa fa-dashboard pull-down"></i> Dashboard</a></li>
                    <li><a href="{{ URL::route('upload') }}"><i class="fa fa-cloud-upload pull-down"></i> Upload</a></li>
                    <li><a href="{{ URL::route('history') }}"><i class="fa fa-history pull-down"></i> Verlauf</a></li>
                    <li><a href="{{ URL::route('users') }}"><i class="fa fa-users pull-down"></i> Benutzerverwaltung</a></li>
                    <li><a href="{{ URL::route('profile') }}"><i class="fa fa-gear pull-down"></i> Einstellungen</a></li>
                @else
                    <li><a href="/login"><i class="fa fa-sign-in pull-down"></i> Login</a></li>
                @endif


            </ul>

</div>



        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image"/>
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li><!-- end message -->
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>

                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{count($notify_expiration)}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">
                        @if (count($notify_expiration)==0)
                                    Es steht keine Datei vor dem Ablauf
                                @elseif (count($notify_expiration)==1)
                                    Es steht {{count($notify_expiration)}} Datei vor dem Ablauf
                                @else
                                    Es stehen {{count($notify_expiration)}} Dateien vor dem Ablauf 
                                @endif
                        </li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                @foreach ($notify_expiration as $ne)
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="{{ asset("/bower_components/icons/".$ne->get_extension().".png") }}" class="img" alt=""/>
                                        </div>
                                        <!-- Message title and timestamp -->
                                       
                                        <!-- The message -->{{$ne->get_percentage()}}
                                        <p><i class="fa fa-clock-o"></i> {{$ne->expiration->format('d. M. Y - H:i:s')}}<br /><i class="fa fa-file-o"></i> {{$ne->filename}} <div class="progress xs" style="margin-top: 5px;">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                              <span class="sr-only"></span>
                                            </div>
                                          </div></p>
                                       
                                    </a>
                                </li><!-- end message -->
                                @endforeach
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><!--<a href="#">See All Messages</a>--></li>
                    </ul>
                </li><!-- /.messages-menu -->

                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-success">{{count($notify_downloaded)}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">
                        @if (count($notify_downloaded)==0)
                            Es wurden noch keine Datei gedownloaded
                        @elseif (count($notify_downloaded)==1)
                            Es wurde {{count($notify_downloaded)}} Datei gedownloaded
                        @else
                            Es wurden {{count($notify_downloaded)}} Dateien gedownloaded
                        @endif
                        </li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                @foreach ($notify_downloaded as $nd)
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="{{ asset("/bower_components/icons/".$nd->get_extension().".png") }}" class="img" alt=""/>
                                        </div>
                                        <!-- Message title and timestamp -->
                                       
                                        <!-- The message -->
                                        <p><i class="fa fa-clock-o"></i> {{$nd->downloaded_at->format('d. M. Y - H:i:s')}}<br /><i class="fa fa-file-o"></i> {{$nd->filename}}<br /><i class="fa fa-user"></i> {{$nd->recipient}}</p>
                                    </a>
                                </li><!-- end message -->
                                @endforeach
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><!--<a href="#">See All Messages</a>--></li>
                    </ul>
                </li><!-- /.messages-menu -->


               
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        {{--<img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image"/>--}}
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("/bower_components/admin-lte/dist/img/avatar3.png") }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->department }}<br />Angemeldet seit {{ Auth::user()->created_at->format('M. Y') }}</small>
                            </p>
                        </li>
                     {{--   <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>--}}
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ URL::route('profile') }}" class="btn btn-default btn-flat">Profil</a>
                            </div>
                            <div class="pull-right">
                                <a href="/logout" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>