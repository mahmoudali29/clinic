<div class="page-sidebar-wrapper" >
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>

                        {{-- Dashboard --}}

                        <li class="nav-item  {{(Request::segment(2) == 'dashboard' ? 'start active open' : '') }}">
                            <a href="{{ url('admin/dashboard') }}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span> <!--White space -->
                            </a>
                        </li>

                        {{-- Admins Options --}}

                        <li class="nav-item {{(Request::segment(2)) == 'admins' || (Request::segment(2)) == 'resetpassword' ? 'start active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">All Admins</span>
                                <span class="selected"></span> <!--White space -->
                                <span class="arrow {{(Request::segment(2)) == 'admins' ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{(Request::segment(2)) == 'admins' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                    <a href="{{ url('admin/admins/create') }}" class="nav-link ">
                                        <i class="icon-plus"></i>
                                        <span class="title">Add New Admin</span>
                                         
                                    </a>
                                </li>
                                <li class="nav-item {{(Request::segment(2)) == 'admins' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/admins') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">All Admins</span>
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>
                    
                       {{-- Departments Options --}}

                        <li class="nav-item {{(Request::segment(2)) == 'departments' ? 'start active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">All Departments</span>
                                <span class="selected"></span> <!--White space -->
                                <span class="arrow {{(Request::segment(2)) == 'departments' ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{(Request::segment(2)) == 'departments' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                    <a href="{{ url('admin/departments/create') }}" class="nav-link ">
                                        <i class="icon-plus"></i>
                                        <span class="title">Add New Department</span>
                                         
                                    </a>
                                </li>
                                <li class="nav-item {{(Request::segment(2)) == 'departments' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/departments') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">All Departments</span>
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>
                                   
                        {{-- Jobs Options --}}

                        <li class="nav-item {{(Request::segment(2)) == 'jobs' ? 'start active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">All Jobs</span>
                                <span class="selected"></span> <!--White space -->
                                <span class="arrow {{(Request::segment(2)) == 'jobs' ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{(Request::segment(2)) == 'jobs' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                    <a href="{{ url('admin/jobs/create') }}" class="nav-link ">
                                        <i class="icon-plus"></i>
                                        <span class="title">Add New Job</span>
                                         
                                    </a>
                                </li>
                                <li class="nav-item {{(Request::segment(2)) == 'jobs' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/jobs') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">All Jobs</span>
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>


                         {{-- staff Options --}}

                         <li class="nav-item {{(Request::segment(2)) == 'staff' || (Request::segment(2)) == 'resetpassword' ? 'start active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">All Staff</span>
                                <span class="selected"></span> <!--White space -->
                                <span class="arrow {{(Request::segment(2)) == 'staff' ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{(Request::segment(2)) == 'staff' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                    <a href="{{ url('admin/staff/create') }}" class="nav-link ">
                                        <i class="icon-plus"></i>
                                        <span class="title">Add New Staff</span>
                                         
                                    </a>
                                </li>
                                <li class="nav-item {{(Request::segment(2)) == 'staff' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/staff') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">All Staff</span>
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>



                        
                         {{-- staffSalary Options --}}

                         <li class="nav-item {{(Request::segment(2)) == 'staffSalary' || (Request::segment(2)) == 'resetpassword' ? 'start active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">All staffSalary</span>
                                <span class="selected"></span> <!--White space -->
                                <span class="arrow {{(Request::segment(2)) == 'staffSalary' ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{(Request::segment(2)) == 'staffSalary' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                    <a href="{{ url('admin/staffSalary/create') }}" class="nav-link ">
                                        <i class="icon-plus"></i>
                                        <span class="title">Add New staffSalary</span>
                                         
                                    </a>
                                </li>
                                <li class="nav-item {{(Request::segment(2)) == 'staffSalary' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/staffSalary') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">All staffSalary</span>
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>



                        {{-- Countries Options --}}

                        <li class="nav-item {{(Request::segment(2)) == 'countries' ? 'start active open' : '' }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-book"></i>
                                    <span class="title">All Countries</span>
                                    <span class="selected"></span> <!--White space -->
                                    <span class="arrow {{(Request::segment(2)) == 'countries' ? 'open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{(Request::segment(2)) == 'countries' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                        <a href="{{ url('admin/countries/create') }}" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Add New Country</span>
                                             
                                        </a>
                                    </li>
                                    <li class="nav-item {{(Request::segment(2)) == 'countries' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                        <a href="{{ url('admin/countries') }}"" class="nav-link ">
                                            <i class="fa fa-database"></i>
                                            <span class="title">All Countries</span>
                                            
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Areas Options --}}

                                    <li class="nav-item {{(Request::segment(2)) == 'areas' ? 'start active open' : '' }}">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <i class="fa fa-book"></i>
                                                <span class="title">All Areas</span>
                                                <span class="selected"></span> <!--White space -->
                                                <span class="arrow {{(Request::segment(2)) == 'areas' ? 'open' : '' }}"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="nav-item  {{(Request::segment(2)) == 'areas' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                                    <a href="{{ url('admin/areas/create') }}" class="nav-link ">
                                                        <i class="icon-plus"></i>
                                                        <span class="title">Add New Area</span>
                                                        
                                                    </a>
                                                </li>
                                                <li class="nav-item {{(Request::segment(2)) == 'areas' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                                    <a href="{{ url('admin/areas') }}"" class="nav-link ">
                                                        <i class="fa fa-database"></i>
                                                        <span class="title">All Areas</span>
                                                        
                                                    </a>
                                                </li>
                                            </ul>
                                    </li>
                            {{-- Cities Options --}}

                            <li class="nav-item {{(Request::segment(2)) == 'cities' ? 'start active open' : '' }}">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-book"></i>
                                        <span class="title">All Cities</span>
                                        <span class="selected"></span> <!--White space -->
                                        <span class="arrow {{(Request::segment(2)) == 'cities' ? 'open' : '' }}"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  {{(Request::segment(2)) == 'cities' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                            <a href="{{ url('admin/cities/create') }}" class="nav-link ">
                                                <i class="icon-plus"></i>
                                                <span class="title">Add New City</span>
                                                
                                            </a>
                                        </li>
                                        <li class="nav-item {{(Request::segment(2)) == 'cities' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                            <a href="{{ url('admin/cities') }}"" class="nav-link ">
                                                <i class="fa fa-database"></i>
                                                <span class="title">All Cities</span>
                                                
                                            </a>
                                        </li>
                                    </ul>
                                </li>



                                {{-- branches Options --}}

                                    <li class="nav-item {{(Request::segment(2)) == 'branches' ? 'start active open' : '' }}">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <i class="fa fa-book"></i>
                                                <span class="title">All Branches</span>
                                                <span class="selected"></span> <!--White space -->
                                                <span class="arrow {{(Request::segment(2)) == 'branches' ? 'open' : '' }}"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="nav-item  {{(Request::segment(2)) == 'branches' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                                    <a href="{{ url('admin/branches/create') }}" class="nav-link ">
                                                        <i class="icon-plus"></i>
                                                        <span class="title">Add New Branch</span>
                                                        
                                                    </a>
                                                </li>
                                                <li class="nav-item {{(Request::segment(2)) == 'branches' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                                    <a href="{{ url('admin/branches') }}"" class="nav-link ">
                                                        <i class="fa fa-database"></i>
                                                        <span class="title">All Branches</span>
                                                        
                                                    </a>
                                                </li>
                                            </ul>
                                    </li>

                                    {{-- rooms Options --}}

                                    <li class="nav-item {{(Request::segment(2)) == 'rooms' ? 'start active open' : '' }}">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="fa fa-book"></i>
                                            <span class="title">All Rooms</span>
                                            <span class="selected"></span> <!--White space -->
                                            <span class="arrow {{(Request::segment(2)) == 'rooms' ? 'open' : '' }}"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  {{(Request::segment(2)) == 'rooms' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                                <a href="{{ url('admin/rooms/create') }}" class="nav-link ">
                                                    <i class="icon-plus"></i>
                                                    <span class="title">Add New Room</span>
                                                    
                                                </a>
                                            </li>
                                            <li class="nav-item {{(Request::segment(2)) == 'rooms' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                                <a href="{{ url('admin/rooms') }}"" class="nav-link ">
                                                    <i class="fa fa-database"></i>
                                                    <span class="title">All Rooms</span>
                                                    
                                                </a>
                                            </li>
                                        </ul>
                                </li>
                                {{-- Patients Options --}}

                                <li class="nav-item {{(Request::segment(2)) == 'patients' ? 'start active open' : '' }}">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-book"></i>
                                        <span class="title">All Patients</span>
                                        <span class="selected"></span> <!--White space -->
                                        <span class="arrow {{(Request::segment(2)) == 'patients' ? 'open' : '' }}"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  {{(Request::segment(2)) == 'patients' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                            <a href="{{ url('admin/patients/create') }}" class="nav-link ">
                                                <i class="icon-plus"></i>
                                                <span class="title">Add New Patient</span>
                                                
                                            </a>
                                        </li>
                                        <li class="nav-item {{(Request::segment(2)) == 'patients' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                            <a href="{{ url('admin/patients') }}"" class="nav-link ">
                                                <i class="fa fa-database"></i>
                                                <span class="title">All Patients</span>
                                                
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- BranchAdmins Options --}}

                                <li class="nav-item {{(Request::segment(2)) == 'branch_admins' ? 'start active open' : '' }}">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-book"></i>
                                        <span class="title">All Branches Admins</span>
                                        <span class="selected"></span> <!--White space -->
                                        <span class="arrow {{(Request::segment(2)) == 'branch_admins' ? 'open' : '' }}"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  {{(Request::segment(2)) == 'branch_admins' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                            <a href="{{ url('admin/branch_admins/create') }}" class="nav-link ">
                                                <i class="icon-plus"></i>
                                                <span class="title">Add New Branch Admins</span>
                                                
                                            </a>
                                        </li>
                                        <li class="nav-item {{(Request::segment(2)) == 'branch_admins' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                            <a href="{{ url('admin/branch_admins') }}"" class="nav-link ">
                                                <i class="fa fa-database"></i>
                                                <span class="title">All Branches Admins</span>
                                                
                                            </a>
                                        </li>
                                    </ul>
                            </li>
                            {{-- Allowance Options --}}

                            <li class="nav-item {{(Request::segment(2)) == 'hr_allowances' ? 'start active open' : '' }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-book"></i>
                                    <span class="title">All Allowances</span>
                                    <span class="selected"></span> <!--White space -->
                                    <span class="arrow {{(Request::segment(2)) == 'hr_allowances' ? 'open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{(Request::segment(2)) == 'hr_allowances' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                        <a href="{{ url('admin/hr_allowances/create') }}" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Add New Allowance</span>
                                                
                                        </a>
                                    </li>
                                    <li class="nav-item {{(Request::segment(2)) == 'hr_allowances' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                        <a href="{{ url('admin/hr_allowances') }}"" class="nav-link ">
                                            <i class="fa fa-database"></i>
                                            <span class="title">All Allowances</span>
                                            
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Salary Options --}}

                        <li class="nav-item {{(Request::segment(2)) == 'hr_salaries' ? 'start active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">All Salary</span>
                                <span class="selected"></span> <!--White space -->
                                <span class="arrow {{(Request::segment(2)) == 'hr_salaries' ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{(Request::segment(2)) == 'hr_salaries' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                    <a href="{{ url('admin/hr_salaries/create') }}" class="nav-link ">
                                        <i class="icon-plus"></i>
                                        <span class="title">Add New Salary</span>
                                            
                                    </a>
                                </li>
                                <li class="nav-item {{(Request::segment(2)) == 'hr_salaries' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/hr_salaries') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">All Salaries</span>
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>

                                     {{-- Deductions Options --}}

                            <li class="nav-item {{(Request::segment(2)) == 'hr_deductions' ? 'start active open' : '' }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-book"></i>
                                    <span class="title">All Deduction</span>
                                    <span class="selected"></span> <!--White space -->
                                    <span class="arrow {{(Request::segment(2)) == 'hr_deductions' ? 'open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{(Request::segment(2)) == 'hr_deductions' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                        <a href="{{ url('admin/hr_deductions/create') }}" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Add New Deduction</span>
                                                
                                        </a>
                                    </li>
                                    <li class="nav-item {{(Request::segment(2)) == 'hr_deductions' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                        <a href="{{ url('admin/hr_deductions') }}"" class="nav-link ">
                                            <i class="fa fa-database"></i>
                                            <span class="title">All Deductions</span>
                                            
                                        </a>
                                    </li>
                                </ul>
                            </li>

                                {{-- Insurance Options --}}

                            <li class="nav-item {{(Request::segment(2)) == 'hr_insurances' ? 'start active open' : '' }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-book"></i>
                                    <span class="title">All Insurances</span>
                                    <span class="selected"></span> <!--White space -->
                                    <span class="arrow {{(Request::segment(2)) == 'hr_insurances' ? 'open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{(Request::segment(2)) == 'hr_insurances' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                        <a href="{{ url('admin/hr_insurances/create') }}" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Add New Insurance</span>
                                                
                                        </a>
                                    </li>
                                    <li class="nav-item {{(Request::segment(2)) == 'hr_insurances' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                        <a href="{{ url('admin/hr_insurances') }}"" class="nav-link ">
                                            <i class="fa fa-database"></i>
                                            <span class="title">All Insurances</span>
                                            
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Staff Insurance Options --}}
                                

                            <li class="nav-item {{(Request::segment(2)) == 'staffs_insurances' ? 'start active open' : '' }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-book"></i>
                                    <span class="title">All Staffs Insurances</span>
                                    <span class="selected"></span> <!--White space -->
                                    <span class="arrow {{(Request::segment(2)) == 'staffs_insurances' ? 'open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{(Request::segment(2)) == 'staffs_insurances' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                        <a href="{{ url('admin/staffs_insurances/create') }}" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Add New Staff Insurance</span>
                                                
                                        </a>
                                    </li>
                                    <li class="nav-item {{(Request::segment(2)) == 'staffs_insurances' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                        <a href="{{ url('admin/staffs_insurances') }}"" class="nav-link ">
                                            <i class="fa fa-database"></i>
                                            <span class="title">All Staffs Insurances</span>
                                            
                                        </a>
                                    </li>
                                </ul>
                            </li>
                                {{-- Loan Options --}}

                                <li class="nav-item {{(Request::segment(2)) == 'hr_loans' ? 'start active open' : '' }}">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="fa fa-book"></i>
                                        <span class="title">All Loans</span>
                                        <span class="selected"></span> <!--White space -->
                                        <span class="arrow {{(Request::segment(2)) == 'hr_loans' ? 'open' : '' }}"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  {{(Request::segment(2)) == 'hr_loans' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                            <a href="{{ url('admin/hr_loans/create') }}" class="nav-link ">
                                                <i class="icon-plus"></i>
                                                <span class="title">Add New Loan</span>
                                                    
                                            </a>
                                        </li>
                                        <li class="nav-item {{(Request::segment(2)) == 'hr_loans' && (Request::segment(3)) == 'search_preview' ? 'start active open' : '' }} ">
                                            <a href="{{ url('admin/hr_loans/search_preview') }}"" class="nav-link ">
                                                <i class="fa fa-database"></i>
                                                <span class="title">Search Staff Loan</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{(Request::segment(2)) == 'hr_loans' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                            <a href="{{ url('admin/hr_loans') }}"" class="nav-link ">
                                                <i class="fa fa-database"></i>
                                                <span class="title">All Loans</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                         {{-- Setting Options --}}
                        
                         <li class="nav-item {{(Request::segment(2)) == 'settings' ? 'start active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-tasks"></i>
                                <span class="title">Settings</span>
                                <span class="selected"></span> <!--White space -->
                                <span class="arrow {{(Request::segment(2)) == 'settings' ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                 
                                <li class="nav-item {{(Request::segment(2)) == 'settings' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/settings') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">All Settings</span>
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>
 
                        

                         
                         {{-- Finance Department --}}
                        <li class="nav-item {{(Request::segment(2)) == 'items' ||  (Request::segment(2)) == 'incomes'  ||  (Request::segment(2)) == 'outcomes'? 'start active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">{{trans('finance.finance_department')}}</span>
                                <span class="selected"></span> <!--White space -->
                                <span class="arrow {{(Request::segment(2)) == 'items' || (Request::segment(2)) == 'incomes'  || (Request::segment(2)) == 'outcomes' ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{(Request::segment(2)) == 'items' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                    <a href="{{ url('admin/items') }}" class="nav-link ">
                                        <i class="icon-plus"></i>
                                        <span class="title">{{trans('finance.items')}}</span>
                                         
                                    </a>
                                </li>
                                <li class="nav-item {{(Request::segment(2)) == 'incomes' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/incomes') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">{{trans('finance.incomes')}}</span>
                                        
                                    </a>
                                </li>
                                <li class="nav-item {{(Request::segment(2)) == 'outcomes' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/outcomes') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">{{trans('finance.outcomes')}}</span>
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- reservations --}}

                        <li class="nav-item {{(Request::segment(2)) == 'reservations' ? 'start active open' : '' }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-tasks"></i>
                                    <span class="title">Reservations</span>
                                    <span class="selected"></span> <!--White space -->
                                    <span class="arrow {{(Request::segment(2)) == 'reservations' ? 'open' : '' }}"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  {{(Request::segment(2)) == 'reservations' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                        <a href="{{ url('admin/reservations/create') }}" class="nav-link ">
                                            <i class="icon-plus"></i>
                                            <span class="title">Add Reservation</span>
                                             
                                        </a>
                                    </li>
                                    <li class="nav-item {{(Request::segment(2)) == 'reservations' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                        <a href="{{ url('admin/reservations') }}"" class="nav-link ">
                                            <i class="fa fa-database"></i>
                                            <span class="title">All Reservations</span>
                                            
                                        </a>
                                    </li>
                                    <li class="nav-item {{(Request::segment(2)) == 'reservationspayment' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                            <a href="{{ url('admin/reservationspayment') }}"" class="nav-link ">
                                                <i class="fa fa-database"></i>
                                                <span class="title"> Reservations Payment</span>
                                                
                                            </a>
                                    </li>

                                </ul>
                            </li>



                             {{-- payrolls --}}

                        <li class="nav-item {{(Request::segment(2)) == 'payrolls' ? 'start active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-tasks"></i>
                                <span class="title">payrolls</span>
                                <span class="selected"></span> <!--White space -->
                                <span class="arrow {{(Request::segment(2)) == 'payrolls' ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  {{(Request::segment(2)) == 'payrolls' && (Request::segment(3)) == 'create' ? 'start active open' : '' }}">
                                    <a href="{{ url('admin/payrolls/create') }}" class="nav-link ">
                                        <i class="icon-plus"></i>
                                        <span class="title">Add payroll</span>
                                         
                                    </a>
                                </li>
                                <li class="nav-item {{(Request::segment(2)) == 'payrolls' && (Request::segment(3)) == '' ? 'start active open' : '' }} ">
                                    <a href="{{ url('admin/payrolls') }}"" class="nav-link ">
                                        <i class="fa fa-database"></i>
                                        <span class="title">All payrolls</span>
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>


                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>