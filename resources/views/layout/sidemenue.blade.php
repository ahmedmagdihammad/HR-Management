<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->name}}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        @if(Auth::user()->type == 1)
        <li @if(Route::is('company') ) class="treeview active" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-industry"></i> <span>Companies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Route::is('company') || Route::is('profileComp') || Route::is('service') || Route::is('companies.customer') || Route::is('getCustomerComp')) class="active" @endif><a href="{{route('company')}}"><i class="fa fa-industry"></i> Companies</a></li>
          </ul>
        </li>
        @else
        <li>
          <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <li @if(Route::is('branch') || Route::is('tracks') || Route::is('times') || Route::is('levels') || Route::is('batches') || Route::is('groups')) class="treeview active" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Adminstration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Route::is('branch')) class="active" @endif><a href="{{route('branch')}}"><i class="fa fa-map-marker"></i> Branches</a></li>
          </ul>
        </li>
        <li @if(Route::is('firstLine') || Route::is('secondtLine') || Route::is('outPayment') || Route::is('allCommission') || Route::is('salaries')) class="active treeview" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-area-chart"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Route::is('salaries')) class="active" @endif><a href="{{route('salaries')}}"><i class="fa fa-money"></i> Payroll</a></li>
            <li @if(Route::is('allCommission')) class="active" @endif><a href="{{route('allCommission')}}"><i class="fa fa-money"></i> All Commission</a></li>
            {{-- <li @if(Route::is('firstLine')) class="active" @endif><a href="{{route('firstLine')}}"><i class="fa fa-clock-o"></i> First line</a></li> --}}
            {{-- <li @if(Route::is('secondtLine')) class="active" @endif><a href="{{route('secondtLine')}}"><i class="fa fa-clock-o"></i> Second line</a></li> --}}
            <li @if(Route::is('outPayment')) class="active" @endif><a href="{{route('outPayment')}}"><i class="fa fa-clock-o"></i> Out of payment</a></li>
          </ul>
        </li>
        <li @if(Route::is('commission') || Route::is('firstSecond') || Route::is('corp_name')) class="treeview active" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Route::is('commission')) class="active" @endif ><a href="{{route('commission')}}"><i class="fa fa-money"></i> Commission</a></li>
            {{-- <li @if(Route::is('firstSecond')) class="active" @endif><a href="{{route('firstSecond')}}"><i class="fa fa-clock-o"></i> First and Second setting</a></li> --}}
            <li @if(Route::is('corp_name')) class="active" @endif><a href="{{route('corp_name')}}"><i class="fa fa-clock-o"></i> Corporate Name</a></li>
          </ul>
        </li>
        <li @if(Route::is('lead.payment') || Route::is('leadCall') || Route::is('lead.index') || Route::is('customer') || Route::is('print_cart') || Route::is('family') || Route::is('documentCust') || Route::is('payCustomer') || Route::is('profile') || Route::is('refund') || Route::is('call_center') || Route::is('allDocumentCustomer') || Route::is('documentPay') || Route::is('filterCustomer') || Route::is('print_id_card')) class="active treeview" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-group"></i> <span>Customers Manager</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li @if(Route::is('lead.payment') || Route::is('lead.index') || Route::is('leadCall') ) class="active" @endif ><a href="{{route('lead.index')}}"><i class="fa fa-users"></i> Leads</a></li>
            <li @if(Route::is('payCustomer') || Route::is('refund') || Route::is('customer') || Route::is('documentCust') || Route::is('profile') || Route::is('call_center') || Route::is('documentPay') || Route::is('filterCustomer') || Route::is('family') || Route::is('print_cart') || Route::is('print_id_card')) class="active" @endif><a href="{{route('customer')}}"><i class="fa fa-group"></i> Customers</a></li>
            {{-- <li @if(Route::is('allDocumentCustomer')) class="active" @endif><a href="{{route('allDocumentCustomer')}}"><i class="fa fa-photo"></i> Document</a></li> --}}
            <!-- <li><a href="#"><i class="fa fa-check-square"></i> Student Attendance</a></li> -->
            <!-- <li><a href="#"><i class="fa fa-calendar"></i> Absence Report</a></li> -->
          </ul>
        </li>
        <li  @if(Route::is('new_group') || Route::is('employee.profile') || Route::is('department') || Route::is('job') ||Route::is('employee') ||Route::is('document') || Route::is('award') || Route::is('discount') || Route::is('allDocumentEmployee')) class="active treeview" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>HR Department</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <!-- <li><a href="#"><i class="fa fa-plus-square"></i> Applicants</a></li> -->
            <li @if(Route::is('department')) class="active" @endif><a href="{{route('department')}}"><i class="fa fa-sitemap"></i> Departments</a></li>
            <li @if(Route::is('job')) class="active" @endif><a href="{{route('job')}}"><i class="fa fa- fa-lightbulb-o"></i> Jobs</a></li>
            <li @if(Route::is('employee.profile') || Route::is('document') || Route::is('employee') || Route::is('award') || Route::is('discount')) class="active" @endif><a href="{{route('employee')}}"><i class="fa fa-user-plus"></i> Employees</a></li>
            {{-- <li @if(Route::is('allDocumentEmployee')) class="active" @endif><a href="{{route('allDocumentEmployee')}}"><i class="fa fa-photo"></i> Document</a></li> --}}
            <li @if(Route::is('new_group')) class="active" @endif><a href="{{route('new_group')}}"><i class="fa fa-money"></i> Add New Group</a></li>
            <!-- <li ><a href="#"><i class="fa fa-pie-chart"></i> Survey</a></li> -->
          </ul>
        </li>
        <li @if(Route::is('commissionExp') || Route::is('commissionPay') || Route::is('payment') || Route::is('expense') || Route::is('offer') || Route::is('expensesType') || Route::is('allDocumentsPay')) class="treeview active" @else class="treeview" @endif>
          <a href="#">
            <i class="fa fa-calculator"></i> <span>Accounting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i> Debtors</a></li> -->
            <li @if(Route::is('commissionPay') || Route::is('payment') ) class="active" @endif ><a href="{{route('payment')}}"><i class="fa fa-credit-card"></i> Payments</a></li>
            <!-- <li @if(Route::is('allDocumentsPay')) class="active" @endif ><a href="{{route('allDocumentsPay')}}"><i class="fa fa-photo"></i> Document</a></li> -->
            <!-- <li><a href="#"><i class="fa fa-credit-card"></i> Refunds </a></li> -->
            <!-- <li><a href="#"><i class="fa fa-dollar"></i> Pay Types</a></li> -->
            <li @if(Route::is('offer')) class="active" @endif><a href="{{route('offer')}}"><i class="fa fa-money"></i> Offer</a></li>
            <li @if(Route::is('expensesType')) class="active" @endif><a href="{{route('expensesType')}}"><i class="fa fa-shopping-basket"></i> Expenses Type</a></li>
            <li @if(Route::is('commissionExp') || Route::is('expense')) class="active" @endif><a href="{{route('expense')}}"><i class="fa fa-shopping-basket"></i> Expenses</a></li>
          </ul>
        </li>
        @endif
      </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>