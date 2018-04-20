
<div id="wrapper_sidebar">
    <div id="wrapper_brand">
        <a href="/">
            <i class="fa fa-search" aria-hidden="true"></i> Admin</a>
    </div>
    <ul class="list-group" id="wrapper_menu">
        <li>
            <a href="#" class="list-group-item active">
                <i class="fas fa-tachometer-alt"></i>&nbsp;
                <strong>Dashboard</strong>
            </a>
        </li>
        <li>
            <a href="{{url('/')}}/backend/posts" class="list-group-item active">
                <i class="fas fa-pencil-alt"></i>&nbsp;
                <strong>Posts</strong>
            </a>
        </li>
        <li class="<?php if (isset($path) and $path=='backend/posts') { echo 'curent'; } ?>">
            <a href="{{url('/')}}/backend/posts" class="list-group-item">All Posts</a>
        </li>
        <li class="<?php if (isset($path) and $path=='backend/post/create') { echo 'curent'; } ?>">
            <a href="{{url('/')}}/backend/post/create" class="list-group-item">Add New</a>
        </li>
        <li class="<?php if (isset($path) and $path=='backend/tags') { echo 'curent'; } ?>">
            <a href="{{url('/')}}/backend/tags" class="list-group-item">Tags</a>
        </li>
        <li>
            <a href="{{url('/')}}/backend/pages" class="list-group-item active">
                <i class="fas fa-copy"></i>&nbsp;
                <strong>Pages</strong>
            </a>
        </li>
        <li class="<?php if (isset($path) and $path=='backend/pages') { echo 'curent'; } ?>">
            <a href="{{url('/')}}/backend/pages" class="list-group-item">All Pages</a>
        </li>
        <li class="<?php if (isset($path) and $path=='backend/page/create') { echo 'curent'; } ?>">
            <a href="{{url('/')}}/backend/page/create" class="list-group-item">Add New</a>
        </li>
        <li>
            <a href="{{url('/')}}/backend/users" class="list-group-item active">
                <i class="fas fa-users" aria-hidden="true"></i>&nbsp;
                <strong>Users</strong>
            </a>
        </li>
        <li class="<?php if (isset($path) and $path=='backend/users') { echo 'curent'; } ?>">
            <a href="{{url('/')}}/backend/users" class="list-group-item">All Users</a>
        </li>
        <li class="<?php if (isset($path) and $path=='backend/user/create') { echo 'curent'; } ?>">
            <a href="{{url('/')}}/backend/user/create" class="list-group-item">Add New</a>
        </li>
        <li>
            <a href="{{url('/')}}/backend/user/edit/46" class="list-group-item">Your Profile</a>
        </li>
        <li class="<?php if (isset($path) and $path=='backend/config') { echo 'curent'; } ?>">
            <a href="{{url('/')}}/backend/config" class="list-group-item active">
                <i class="fas fa-cogs" aria-hidden="true"></i>&nbsp;
                <strong>Config</strong>
            </a>
        </li>
        <li>
            <a href="#" class="list-group-item active">
                <i class="fas fa-sign-out-alt"></i>&nbsp;
                <strong>Log out</strong>
            </a>
        </li>
    </ul>
</div>