<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>
        <div class="card-body">
        <?php if (Auth::check()) { ?>
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/posts') }}">
                       <i class="fa fa-feed"></i> Posts
                    </a>
                </li>
            </ul>
        <?php } ?>
        @role('super-admin')
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/user') }}">
                        <i class="fa fa-users"></i>  Users
                    </a>
                </li>
            </ul>
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/inactives') }}">
                    <i class="fa fa-user-times"></i> Inactives
                    </a>
                </li>
            </ul>
            <ul class="nav" role="tablist">
                <li role="presentation">
                     <a href="{{ url('/admin/role') }}">
                     <i class="fa fa-legal"></i> Roles
                     </a>
                </li>        
            </ul>
            <ul class="nav" role="tablist">
                    <li role="presentation">
                         <a href="{{ url('/admin/permission') }}">
                            <i class="fa fa-check-square"></i> Permissions
                         </a>
                    </li>        
            </ul>
            @endrole
            @role('super-admin|admin')
            <ul class="nav" role="tablist">
                    <li role="presentation">
                         <a href="{{ url('/admin/activity_log') }}">
                         <i class="fa fa-history"></i> History
                         </a>
                    </li>        
            </ul>
            @endrole
        </div>
    </div>
</div>