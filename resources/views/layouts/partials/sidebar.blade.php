<!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{asset('images/users/profile.jpg')}}" alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5>{{ ucwords(Auth::user()->name) }}</h5>
                        <h5>{{ Auth::user()->email }}</h5>
                        <a href="javascript:void(0);" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="mailto: info@italicahomes.com" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                        <a onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                        
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="{{route('profile.index')}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <!-- text-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <!-- text-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="javascript:void(0);" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <!-- text-->
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">PERSONAL</li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard <!-- <span class="label label-rouded label-themecolor pull-right">4</span></span> --></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('')}}/admin"><i class="fa fa-eye"></i> Show Statistics </a></li>
                              <!--   <li><a href="index2.html">Analytical</a></li>
                                <li><a href="index3.html">Demographical</a></li>
                                <li><a href="index4.html">Modern</a></li> -->
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="ti ti-user"></i><span class="hide-menu">Manage Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('admin/permissions') }}">Permissions</a></li>
                                <li><a href="{{ url('admin/roles') }}">Roles</a></li>
                                <li><a href="{{url('admin/users')}}"><i class="fa fa-users"></i> Users</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Properties</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('admin/properties') }}"><i class="fa fa-eye"></i> View All Properties</a></li>
                                <li><a href="{{ url('admin/properties/create') }}"><i class="fa fa-plus"></i> Create a Property</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Property Setting</span></a>
                           <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu"> Property Offer</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('add-offer.index') }}"><i class="fa fa-eye"></i> View</a></li>
                                    <li><a href="{{ route('add-offer.create') }}"><i class="fa fa-plus"></i> Add New</a></li>
                                </ul>
                            </ul>
                            <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu"> Condition</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('add-condition.index') }}"><i class="fa fa-eye"></i> View</a></li>
                                    <li><a href="{{ route('add-condition.create') }}"><i class="fa fa-plus"></i> Add New</a></li>
                                </ul>
                            </ul>
                            <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu"> Regions</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('add-region.index') }}"><i class="fa fa-eye"></i> View</a></li>
                                    <li><a href="{{ route('add-region.create') }}"><i class="fa fa-plus"></i> Add New</a></li>
                                </ul>
                            </ul>
                             <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu"> Destinations</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('add-destination.index') }}"><i class="fa fa-eye"></i> View</a></li>
                                    <li><a href="{{ route('add-destination.create') }}"><i class="fa fa-plus"></i> Add New</a></li>
                                </ul>
                            </ul>
                             <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu"> Property Type</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('add-property-types.index') }}"><i class="fa fa-eye"></i> View</a></li>
                                    <li><a href="{{ route('add-property-types.create') }}"><i class="fa fa-plus"></i> Add New</a></li>
                                </ul>
                            </ul>
                             <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu"> Amenities</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('add-amenities.index') }}"><i class="fa fa-eye"></i> View</a></li>
                                    <li><a href="{{ route('add-amenities.create') }}"><i class="fa fa-plus"></i> Add New</a></li>
                                </ul>
                            </ul>
                             <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-reorder-horizontal"></i><span class="hide-menu"> Agencies</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('add-agency.index') }}"><i class="fa fa-eye"></i> View</a></li>
                                    <li><a href="{{ route('add-agency.create') }}"><i class="fa fa-plus"></i> Add New</a></li>
                                </ul>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-message"></i><span class="hide-menu">Blog Posts</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('add-post.index') }}"><i class="fa fa-eye"></i> View All</a></li>
                                <li><a href="{{ route('add-post.create') }}"><i class="fa fa-plus"></i> Create New</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-calendar-question"></i><span class="hide-menu">FAQ's</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('add-faq.index') }}"><i class="fa fa-eye"></i> View All</a></li>
                                <li><a href="{{ route('add-faq.create') }}"><i class="fa fa-plus"></i> Create New</a></li>
                            </ul>
                        </li>
                         <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-calendar-question"></i><span class="hide-menu">Testimonials</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('add-testimonial.index') }}"><i class="fa fa-eye"></i> View All</a></li>
                                <li><a href="{{ route('add-testimonial.create') }}"><i class="fa fa-plus"></i> Create New</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Inbox</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('')}}/admin/inbox"><i class="fa fa-eyes"></i> View All Messages</a></li>
                                <li><a href="{{url('')}}/admin/inbox/unread">Unread</a></li>
                                <li><a href="app-compose.html"><i class="fa fa-plus"></i> Compose Mail</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-grid"></i><span class="hide-menu">Services</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="ti ti-user"></i><span class="hide-menu"> Owner</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('')}}/admin/owner"><i class="fa fa-eye"></i> View</a></li>
                                    </ul>
                                <li><a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="ti ti-user"></i><span class="hide-menu"> Buyer</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('')}}/admin/buyer"><i class="fa fa-eye"></i> View</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-grid"></i><span class="hide-menu">Meta Tags</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('add-meta-tags.index') }}"><i class="fa fa-eye"></i> Title & Description</a></li>
                                <li><a href="{{ route('add-meta-tags.create') }}"><i class="fa fa-plus"></i> Add</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Setting</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('')}}/admin/setting/create">Configuration</a></li>
                                <li><a href="{{url('')}}/admin/inbox/unread">Terms & Conditions</a></li>
                                <li><a href="{{url('')}}/admin/legal_notice/index">Legal Notice</a></li>
                                <li><a href="{{url('')}}/admin/privacy_policy/index">Privacy Policy</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->