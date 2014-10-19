<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/admin/dashboard')}}">{{ trans('admin.project_name')}}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-wrench"></i> {{ trans('admin.system') }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('admin/system/setting')}}">{{ trans('admin.setting') }}</a></li>
                    </ul>
                </li>                           
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} 
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{url('admin/account')}}">
                                <i class="fa fa-fw fa-edit"></i> {{ trans('common.edit_account') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/password')}}">
                                <i class="fa fa-fw fa-key"></i> {{ trans('common.change_password') }}
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('admin/logout') }}">
                                <i class="fa fa-fw fa-power-off"></i> {{ trans('common.logout') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
