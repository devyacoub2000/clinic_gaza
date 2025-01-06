<div id="sidebar_color" class=""> 
             
             <!-- Sidebar -->
       <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
               <div class="sidebar-brand-icon">
                   <i class="fas fa-store"></i>
               </div>
               <div class="sidebar-brand-text mx-3"> {{env('APP_NAME')}} </div>
           </a>

             <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

              <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.patients')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Patients</span></a>
            </li>

              <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.show_appointments')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Appointments</span></a>
            </li>

               <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.show_contacts')}}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Contact Us</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedepartment"
                    aria-expanded="true" aria-controls="collapsedepartment">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Departments</span>
                </a>
                <div id="collapsedepartment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{route('admin.department.index')}}">All Departments</a>
                        <a class="collapse-item" href="{{route('admin.department.create')}}">Add</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

              <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedoctor"
                    aria-expanded="true" aria-controls="collapsedoctor">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>Doctors</span>
                </a>
                <div id="collapsedoctor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{route('admin.doctor.index')}}">All Doctors</a>
                        <a class="collapse-item" href="{{route('admin.doctor.create')}}">Add</a>
                    </div>
                </div>
            </li>

                 <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

              <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseaddress"
                    aria-expanded="true" aria-controls="collapseaddress">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Address</span>
                </a>
                <div id="collapseaddress" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{route('admin.address.index')}}">All Addresss</a>
                        <a class="collapse-item" href="{{route('admin.address.create')}}">Add</a>
                    </div>
                </div>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

       </ul>

        </div>