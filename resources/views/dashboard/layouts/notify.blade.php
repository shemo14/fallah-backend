
<!-- Right Sidebar -->
<div class="side-bar right-bar">
    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="zmdi zmdi-close-circle-o"></i>
    </a>
    <h4 class="">التقارير</h4>
    <div class="notification-list nicescroll">
        <ul class="list-group list-no-border user-list">
            @foreach(reports() as $r)
                <li class="list-group-item">
                    <a href="{{route('allreports')}}" class="user-list-item">
                        <div class="avatar">
                            <img src="{{appPath()}}/images/admins/{{$r->User->avatar}}">
                        </div>
                        <div class="user-desc">
                            <span class="name">{{$r->User->name}}</span>
                            <span class="desc">{{$r->event}}</span>
                            <span class="time">{{$r->created_at->diffForHumans()}}</span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /Right-bar -->
