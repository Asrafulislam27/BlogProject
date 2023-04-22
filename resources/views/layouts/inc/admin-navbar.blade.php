<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                       

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                       

                        
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>
                        @php
                            $id = Auth::user()->id;
                            $data = App\Models\User::find($id);

                        @endphp

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{(!empty($data->Profile_image)) ? url('Upload/Profile/'.$data->Profile_image):url('Upload/no_image.jpg')}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{$data->name}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{route('admin.profile')}}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <a class="dropdown-item" href="{{route('change.password')}}"><i class="ri-lock-unlock-line align-middle me-1"></i> Password Change</a>
                                <a class="dropdown-item d-block" href="#"><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </div>

                        
            
                    </div>
                </div>
            </header>
