<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!-- User details -->
 

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <!-- Dashboard Sidebar -->
            <li>
                <a href="{{url('admin/dashboard')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Category Sidebar -->

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect" >
                    <i class="fas fa-outdent"></i>
                    <span>Category</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('admin.add-category')}}">Add New Category</a></li>
                    <li><a href="{{route('admin.category')}}">Category All View</a></li>
                </ul>
            </li>

            <!-- Tag Sidebar -->

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class=" fas fa-cross"></i>
                    <span>Tag</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('admin.add-tag')}}">Add New Tag</a></li>
                    <li><a href="{{route('admin.tag')}}">Tag All View</a></li>
                </ul>
            </li>

            <!-- Post Sidebar -->
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-edit"></i>
                    <span>Post</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('admin.add-post')}}">Add New Post</a></li>
                    <li><a href="{{route('admin.posts')}}">Post All View</a></li>
                </ul>
            </li>

            <!-- User Role -->
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class=" fas fa-user-alt"></i>
                    <span>User</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('admin.users')}}">User Role</a></li>
                   
                </ul>
            </li>

            <!-- About -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-book-reader"></i>
                        <span>About</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.about-us')}}">About</a></li>
                    
                    </ul>
                </li>

                 <!-- Privacy -->
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-warehouse"></i>
                        <span>Privacy & Policy </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.privacy')}}">Privacy</a></li>
                    
                    </ul>
                </li>

                
                 <!-- Terms Of Use -->
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-buffer"></i>
                        <span>Terms Of Use </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.terms-Use')}}">Terms Of Use</a></li>
                    
                    </ul>
                </li>

              <!-- Setting -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-settings-2-line"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.setting')}}">Setting</a></li>
                    
                    </ul>
                </li>



        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>