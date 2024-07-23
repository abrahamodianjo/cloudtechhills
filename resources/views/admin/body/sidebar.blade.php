<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">C.T Hills</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='fadeIn animated bx bx-cctv'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Management System</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Home</div>
            </a>

            <ul>
                <li> <a href="{{ route('all.banner') }}"><i class='bx bx-radio-circle'></i> Banner </a></li>
                <li> <a href="{{ route('all.features') }}"><i class='bx bx-radio-circle'></i> Features </a></li>
                <li> <a href="{{ route('edit.countups') }}"><i class='bx bx-radio-circle'></i> Count up section </a></li>
                <li> <a href="{{ route('all.clients') }}"><i class='bx bx-radio-circle'></i>Our Clients</a></li>
                <li> <a href="{{ route('all.team') }}"><i class='bx bx-radio-circle'></i>Team Members </a></li>
                <li> <a href="{{ route('all.plan') }}"><i class='bx bx-radio-circle'></i>Membership Plans </a></li>
                <li> <a href="{{ route('parallax.setting') }}"><i class='bx bx-radio-circle'></i>Parallax</a></li>
                <li> <a href="{{ route('all.testmonials') }}"><i class='bx bx-radio-circle'></i>Testmonials </a></li>
            </ul>
        </li>



        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='fadeIn animated bx bx-buildings'></i>
                </div>
                <div class="menu-title">About Us</div>
            </a>
            <ul>
                <li> <a href="{{ route('edit.about.us.banner') }}"><i class='bx bx-radio-circle'></i>Banner </a></li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div><i class='bx bx-radio-circle'></i>
                        </div>
                        <div class="menu-title">Pie Chart Area</div>
                    </a> 
                    <ul>
                        <li>
                            <a href="{{ route('all.pie.chart') }}"><i class='bx bx-radio-circle'></i> Pie Chart </a>
                        </li>
                        <li>
                            <a href="{{ route('edit.pie.chart') }}"><i class='bx bx-radio-circle'></i> Short Note </a>
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-network'></i>
                </div>
                <div class="menu-title">Services</div>
            </a>
            <ul>
                <li> <a href="ecommerce-products.html"><i class='bx bx-radio-circle'></i>Products</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product Details</a>
                </li>
                <li> <a href="ecommerce-add-new-products.html"><i class='bx bx-radio-circle'></i>Add New Products</a>
                </li>
                <li> <a href="ecommerce-orders.html"><i class='bx bx-radio-circle'></i>Orders</a>
                </li>
            </ul>
        </li>




        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='fadeIn animated bx bx-news'></i>
                </div>
                <div class="menu-title">News</div>
            </a>
            <ul>
                <li> <a href="ecommerce-products.html"><i class='bx bx-radio-circle'></i>Products</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product Details</a>
                </li>
                <li> <a href="ecommerce-add-new-products.html"><i class='bx bx-radio-circle'></i>Add New Products</a>
                </li>
                <li> <a href="ecommerce-orders.html"><i class='bx bx-radio-circle'></i>Orders</a>
                </li>
            </ul>
        </li>




        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='fadeIn animated bx bx-id-card'></i>
                </div>
                <div class="menu-title">Contact</div>
            </a>
            <ul>
                <li> <a href="{{ route('site.setting') }}"><i class='bx bx-radio-circle'></i>Site Setting</a>
                </li>
                <li> <a href="{{ route('contact.message') }}"><i class='bx bx-radio-circle'></i>Contact Us Messages
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
