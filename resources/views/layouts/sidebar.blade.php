<?php
    //echo '<pre>'.print_R($this->data,1).'</pre>';
?>
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="javascript:void(0);"></a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{ env('APP_URL') }}/resources/img/favicon.ico" alt="User">
            </a>
        </li>

        <li class="xn-title text-right">

            <ul>
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">

                    {{--  <img src="{{ env('APP_URL') }}/resources/img/favicon.ico" /> --}}
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-bars"></span></a>
                </li>


                <!-- END TOGGLE NAVIGATION -->
            </ul>
        </li>
        <li class="x-active-nav"><a href="{{ url('dashboard') }}"><span class="fa fa-tachometer"></span> <span
                    class="xn-text">Dashboard</a></a></li>
        @if(session()->get('role')=="Company")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Company</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('company') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Company
                            Profile
                        </span></a> </li>


                <li class=""><a href="{{ url('company_employee') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Employee
                        </span></a></li>
                <li class=""><a href="{{ url('company_customers') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Customers
                        </span></a></li>
                <li class=""><a href="{{ url('company_postjob') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Post
                            Job
                        </span></a></li>
                <li class=""><a href="{{ url('company_emp_experience') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Experience
                        </span></a></li>

            </ul>
        </li>

        @elseif (session()->get('role')=="Consultancy")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Consultancy</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('consultancy') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Consultancy Profile
                        </span></a></li>
                <li class=""><a href="{{ url('consultancy_student') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Student
                        </span></a></li>

            </ul>
        </li>

        @elseif (session()->get('role')=="Individual")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">JobSeeker</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('jobseeker') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">JobSeeker
                            Profile
                        </span></a></li>

            </ul>
        </li>

        @elseif (session()->get('role')=="Subscriber")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Subscriber</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('subscriber') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Subscriber
                            Profile
                        </span></a></li>
                <li class=""><a href="{{ url('subscribe_group') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Subscribe
                            Groups
                        </span></a></li>

            </ul>
        </li>

        @else

        @if(is_null($sidebar))

        @else
        @foreach($sidebar as $val)






        @if($val->sub_menu_name=="Consultancy_List")

        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Consultancy</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('consultancy') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Consultancy List
                        </span></a></li>

            </ul>
        </li>
        @endif
        @if($val->sub_menu_name=="Company_List")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Company</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('company') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Company
                            List
                        </span></a> </li>




            </ul>
        </li>
        @endif
        @if($val->sub_menu_name=="Jobseeker_List")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">JobSeeker</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('jobseeker') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">JobSeeker
                            List
                        </span></a></li>

            </ul>
        </li>
        @endif
        @if($val->sub_menu_name=="Subscriber_List")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Subscriber</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('subscriber') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Subscriber
                            List
                        </span></a></li>


            </ul>
        </li>
        @endif
        @if($val->sub_menu_name=="Group_Admin")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Group Admin</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('employee') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Group
                            Admin
                        </span></a></li>

            </ul>
        </li>
        @endif
        @if($val->sub_menu_name=="Package_List")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Packages</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('package_list') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Package List
                        </span></a></li>

            </ul>
        </li>
        @endif
        @if($val->sub_menu_name=="Groups")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Groups</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('groups') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Groups
                        </span></a></li>
            </ul>
        </li>
        @endif
        @if($val->sub_menu_name=="Posts")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Group Posts</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">


                <li class=""><a href="{{ url('posts') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Posts
                        </span></a></li>

            </ul>
        </li>
        @endif
        @if($val->sub_menu_name=="Slider")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Slider Master</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('slider') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Slider
                        </span></a></li>
            </ul>
        </li>
        @endif
        @if($val->sub_menu_name=="Testimonials")
        <li class="openable open ">
            <a href="#">
                <span class="fa fa-edit"></span><span class="xn-text">Testimonial Master</span>
                <span class="menu-hover"></span>
            </a>
            <ul class="submenu">
                <li class=""><a href="{{ url('testimonials') }}"><span class="fa fa-list"></span> <span
                            class="submenu-label">Testimonials
                        </span></a></li>
            </ul>
        </li>
        @endif
        @endforeach
        @endif



        @endif




    </ul>
    <!-- END X-NAVIGATION -->
</div>
