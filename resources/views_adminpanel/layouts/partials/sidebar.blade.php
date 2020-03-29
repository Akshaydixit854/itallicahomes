<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                {{--<img src="italica-img/logo.png" class="responsive-img" />--}}
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">{{ucwords(Auth::user()->name)}}</div>
                <div class="email">{{Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li {{ Route::is('profile.index')? 'class=active':'' }}><a
                                    href="{{ route('profile.index') }}"><i class="material-icons">person</i>Profile</a>
                        </li>
                        <li role="seperator" class="divider"></li>


                        <li>
                            <a href="{{ url('logout') }}"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="material-icons">logout</i>Logout
                            </a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li {{Route::is('dashboard')? 'class=active':''}}>
                    <a href="{{route('dashboard')}}">
                        <span><i class="fas fa-home"></i>Home</span>
                    </a>
                </li>
                @hasanyrole('superadmin|admin')
                
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">

                        <span><i class="fas fa-user"></i>Manage Users</span>
                    </a>
                    <ul class="ml-menu">
                        <li {{Route::is('permissions.index')||Route::is('permissions.create')||Route::is('permissions.edit')? 'class=active':''}}>
                            <a href="{{route('permissions.index')}}"><i class="fas fa-chevron-right"></i>Permissions</a>
                        </li>                       
                        <li {{Route::is('roles.index')||Route::is('roles.create')||Route::is('roles.edit')? 'class=active':''}}>
                            <a href="{{ route('roles.index') }}"><i class="fas fa-chevron-right"></i>Roles</a>
                        </li>
                        <li {{Route::is('users.index')||Route::is('users.create')||Route::is('users.edit')? 'class=active':''}}>
                            <a href="{{ route('users.index') }}"><i class="fas fa-chevron-right"></i>Users</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span><i class="fas fa-random"></i>Properties</span>
                    </a>
                    <ul class="ml-menu">
                        <li {{Route::is('properties.index')||Route::is('properties.create')||Route::is('properties.edit')? 'class=active':''}}>
                            <a href="{{ route('properties.index') }}"><i class="fas fa-chevron-right"></i>View All Properties</a>
                        </li>
                        <li {{Route::is('properties.index')||Route::is('properties.create')||Route::is('properties.edit')? 'class=active':''}}>
                            <a href="{{ route('properties.create') }}"><i class="fas fa-chevron-right"></i>Create A Property</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span><i class="fas fa-cogs"></i>Property Settings</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span><i class="fas fa-gift"></i>Property Offer</span>
                            </a>
                            <ul class="ml-menu">
                                <li {{Route::is('add-offer.index')||Route::is('add-offer.create')||Route::is('add-offer.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-offer.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                                </li>
                                <li {{Route::is('add-offer.index')||Route::is('add-offer.create')||Route::is('add-offer.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-offer.create') }}"><i class="fas fa-chevron-right"></i>Add New</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span><i class="fas fa-globe-asia"></i>Regions</span>
                            </a>
                            <ul class="ml-menu">
                                <li {{Route::is('add-region.index')||Route::is('add-region.create')||Route::is('add-region.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-region.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                                </li>
                                <li {{Route::is('add-region.index')||Route::is('add-region.create')||Route::is('add-region.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-region.create') }}"><i class="fas fa-chevron-right"></i>Add New</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span><i class="fas fa-directions"></i>Condition</span>
                            </a>
                            <ul class="ml-menu">
                                <li {{Route::is('add-condition.index')||Route::is('add-condition.create')||Route::is('add-condition.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-condition.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                                </li>
                                <li {{Route::is('add-condition.index')||Route::is('add-condition.create')||Route::is('add-condition.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-condition.create') }}"><i class="fas fa-chevron-right"></i>Add New</a>
                                </li>
                            </ul>
                        </li>
 <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span><i class="fas fa-map-marked-alt"></i>Destinations</span>
                            </a>
                            <ul class="ml-menu">
                                <li {{Route::is('add-destination.index')||Route::is('add-destination.create')||Route::is('add-destination.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-destination.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                                </li>
                                <li {{Route::is('add-destination.index')||Route::is('add-destination.create')||Route::is('add-destination.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-destination.create') }}"><i class="fas fa-chevron-right"></i>Add New</a>
                                </li>
                            </ul>
                        </li>
<li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span><i class="fas fa-sitemap"></i>Property Type</span>
                            </a>
                            <ul class="ml-menu">
                                <li {{Route::is('add-property-types.index')||Route::is('add-property-types.create')||Route::is('add-property-types.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-property-types.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                                </li>
                                <li {{Route::is('add-property-types.index')||Route::is('add-property-types.create')||Route::is('add-property-types.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-property-types.create') }}"><i class="fas fa-chevron-right"></i>Add New</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span><i class="fas fa-map-marker-alt"></i>Location</span>
                            </a>
                            <ul class="ml-menu">
                                <li {{Route::is('add-area.index')||Route::is('add-area.create')||Route::is('add-area.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-area.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                                </li>
                                <li {{Route::is('add-area.index')||Route::is('add-area.create')||Route::is('add-area.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-area.create') }}"><i class="fas fa-chevron-right"></i>Add New</a>
                                </li>
                            </ul>
                        </li>
<li>
<li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span><i class="fas fa-utensils"></i>Amenities</span>
                            </a>
                            <ul class="ml-menu">
                                <li {{Route::is('add-amenities.index')||Route::is('add-amenities.create')||Route::is('add-amenities.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-amenities.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                                </li>
                                <li {{Route::is('add-amenities.index')||Route::is('add-amenities.create')||Route::is('add-amenities.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-amenities.create') }}"><i class="fas fa-chevron-right"></i>Add New</a>
                                </li>
                            </ul>
                        </li>
<li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span><i class="fas fa-users"></i>Agencies</span>
                            </a>
                            <ul class="ml-menu">
                                <li {{Route::is('add-agency.index')||Route::is('add-agency.create')||Route::is('add-agency.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-agency.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                                </li>
                                <li {{Route::is('add-agency.index')||Route::is('add-agency.create')||Route::is('add-agency.edit')? 'class=active':''}}>
                                    <a href="{{ route('add-agency.create') }}"><i class="fas fa-chevron-right"></i>Add New</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span><i class="fas fa-blog"></i>Blog Posts</span>
                    </a>
                    <ul class="ml-menu">
                        <li {{Route::is('add-post.index')||Route::is('add-post.create')||Route::is('add-post.edit')? 'class=active':''}}>
                            <a href="{{ route('add-post.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                        </li>
                        <li {{Route::is('add-post.index')||Route::is('add-post.create')||Route::is('add-post.edit')? 'class=active':''}}>
                            <a href="{{ route('add-post.create') }}"><i class="fas fa-chevron-right"></i>Create a Post</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span><i class="fas fa-question-circle"></i>FAQs</span>
                    </a>
                    <ul class="ml-menu">
                        <li {{Route::is('add-faq.index')||Route::is('add-faq.create')||Route::is('add-faq.edit')? 'class=active':''}}>
                            <a href="{{ route('add-faq.index') }}"><i class="fas fa-chevron-right"></i>View All</a>
                        </li>
                        <li {{Route::is('add-faq.index')||Route::is('add-faq.create')||Route::is('add-faq.edit')? 'class=active':''}}>
                            <a href="{{ route('add-faq.create') }}"><i class="fas fa-chevron-right"></i>Create New</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span><i class="fas fa-address-book"></i>About</span>
                    </a>
                    <ul class="ml-menu">
                        <li {{Route::is('add-testimonial.index')||Route::is('add-testimonial.create')||Route::is('add-testimonial.edit')? 'class=active':''}}>
                            <a href="{{ route('add-testimonial.index') }}"><i class="fas fa-chevron-right"></i>Testimonials</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span><i class="fas fa-phone"></i>Contact</span>
                    </a>
                    <ul class="ml-menu">
                        <li {{Route::is('contact-enquiries.index')||Route::is('contact-enquiries.index')||Route::is('contact-enquiries.index')? 'class=active':''}}>
                            <a href="{{ url('') }}/admin/contact_enquiry/index"><i class="fas fa-chevron-right"></i>FAQ Page Enquiries</a>
                        </li>
                        <li {{Route::is('general-enquiries.index')||Route::is('general-enquiries.index')||Route::is('general-enquiries.index')? 'class=active':''}}>
                            <a href="{{ url('') }}/admin/general_index"><i class="fas fa-chevron-right"></i>Contact Page Enquiries</a>
                        </li>
                        <li {{Route::is('general-enquiries.index')||Route::is('general-enquiries.index')||Route::is('general-enquiries.index')? 'class=active':''}}>
                            <a href="{{ url('') }}/admin/properties_index"><i class="fas fa-chevron-right"></i>Property Page Enquiries</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span><i class="fas fa-envelope"></i>Inbox</span>
                    </a>
                    <ul class="ml-menu">
                        <li {{Route::is('inbox')||Route::is('inbox')||Route::is('inbox')? 'class=active':''}}>
                            <a href="{{url('')}}/admin/inbox"><i class="fas fa-chevron-right"></i>View All Messages</a>
                        </li>
                        <li {{Route::is('inbox')||Route::is('inbox')||Route::is('inbox')? 'class=active':''}}>
                            <a href="{{url('')}}/admin/inbox/unread"><i class="fas fa-chevron-right"></i>Unread</a>
                        </li>
                    </ul>
                </li>
                   <li>
                <a href="javascript:void(0);" class="menu-toggle">
                            <span><i class="fas fa-code-branch"></i>Services</span>
                    
                </a>
                 <ul class="ml-menu">
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span><i class="fas fa-envelope"></i>Owner</span>
                        </a>
                        <ul class="ml-menu">
                            <li {{Route::is('owner')||Route::is('owner')||Route::is('owner')? 'class=active':''}}>
                                <a href="{{url('')}}/admin/owner"><i class="fas fa-chevron-right"></i>View</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span><i class="fas fa-envelope"></i>Buyer</span>
                        </a>
                        <ul class="ml-menu">
                            <li {{Route::is('inbox')||Route::is('buyer')||Route::is('buyer')? 'class=active':''}}>
                                <a href="{{url('')}}/admin/buyer"><i class="fas fa-chevron-right"></i>View</a>
                            </li>
                        </ul>
                    </li>
                 </ul>
                </li>


                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span><i class="fas fa-users-cog"></i>Settings</span>
                    </a>
                    <ul class="ml-menu">
                        <li {{Route::is('settings.index')||Route::is('settings.create')||Route::is('settings.edit')? 'class=active':''}}>
                            <a href="{{ route('settings.create') }}"><i class="fas fa-chevron-right"></i>Configurations</a>
                        </li>
                        <li {{Route::is('terms-conditions.index')||Route::is('terms-conditions.create')||Route::is('terms-conditions.edit')? 'class=active':''}}>
                            <a href="{{url('')}}/admin/terms/index"><i class="fas fa-chevron-right"></i>Terms & Conditions</a>
                        </li>
                        <li {{Route::is('legal-notice')||Route::is('legal-notice.create')||Route::is('legal-notice.edit')? 'class=active':''}}>
                            <a href="{{url('')}}/admin/legal_notice/index"><i class="fas fa-chevron-right"></i>Legal Notice</a>
                        </li>
                        <li {{Route::is('privacy-policy')||Route::is('privacy-policy.create')||Route::is('privacy-policy.edit')? 'class=active':''}}>
                            <a href="{{url('')}}/admin/privacy_policy/index"><i class="fas fa-chevron-right"></i>Privacy Policy</a>
                        </li>
                    </ul>

                </li>
                @endrole

            <!-- <li {{Route::is('typography')? 'class=active':''}}>
                        <a href="{{route('typography')}}">
                            <i class="material-icons">text_fields</i>
                            <span>Typography</span>
                        </a>
                    </li>
                    <li {{Route::is('helper')? 'class=active':''}}>
                        <a href="{{route('form')}}">
                            <i class="material-icons">build</i>
                            <span>Form</span>
                        </a>
                    </li>
                    <li {{Route::is('helper')? 'class=active':''}}>
                        <a href="{{route('helper')}}">
                            <i class="material-icons">layers</i>
                            <span>Helper Classes</span>
                        </a>
                    </li>
                    <li {{Route::is('widget')? 'class=active':''}}>
                        <a href="{{route('widget')}}">
                            <i class="material-icons">widgets</i>
                            <span>Widgets</span>
                        </a>
                    </li>
                    <li {{Route::is('table')? 'class=active':''}}>
                        <a href="{{route('table')}}">
                            <i class="material-icons">view_list</i>
                            <span>Tables</span>
                        </a>
                    </li>
                    <li {{Route::is('media')? 'class=active':''}}>
                        <a href="{{route('media')}}">
                            <i class="material-icons">perm_media</i>
                            <span>Medias</span>
                        </a>
                    </li>
                    <li {{Route::is('chart')? 'class=active':''}}>
                        <a href="{{route('chart')}}">
                            <i class="material-icons">pie_chart</i>
                            <span>Charts</span>
                        </a>
                    </li> -->

                {{--<li class="header">LABELS</li>--}}
                {{--<li>
                    <a href="javascript:void(0);">
                        <i class="material-icons col-red">donut_large</i>
                        <span>Important</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons col-amber">donut_large</i>
                        <span>Warning</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons col-light-blue">donut_large</i>
                        <span>Information</span>
                    </a>
                </li>--}}
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; {{ now()->year }} <a href="javascript:void(0);">Italica Admin</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
