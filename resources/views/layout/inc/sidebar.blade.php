<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">

    <div class="logo"><a href="#" class="simple-text logo-normal">
            Happeniess Shop
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('categories') }}">
                    <i class="material-icons">category</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('add-category') }}">
                    <i class="material-icons">add</i>
                    <p>Add Category</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/products') }}">
                    <i class="material-icons">list</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('add-product') }}">
                    <i class="material-icons">add</i>
                    <p>Add Products</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="material-icons">home</i>
                    <p>Home Page</p>
                </a>
            </li>
            {{-- <li class="nav-item ">
                <a class="nav-link" href="./tables.html">
                    <i class="material-icons">content_paste</i>
                    <p>Table List</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
