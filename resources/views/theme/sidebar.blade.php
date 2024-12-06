
            <a href="{{route('admin')}}" class="flex items-center {{request()->is('admin/dashboard') ? 'active-nav-link opacity-100' : 'opacity-75'}} text-white py-2 pl-3nav-item">
                <i class="fas fa-fw fa-tachometer-alt mx-3"></i>
                {{__('Dashboard')}}
            </a>
            <a href="{{route('category.index')}}" class=" {{request()->is('admin/category*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3nav-item">
                <i class="fas fa-list mx-3"></i>
                {{__('Categories')}}
            </a>
            <a href="{{route('posts.index')}}" class="{{request()->is('admin/posts*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3nav-item">
                <i class="fas fa-pen mx-3"></i>
                {{__('Posts')}}
            </a>
            <a href="{{route('roles.index')}}" class="{{request()->is('admin/role*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3nav-item">
                <i class="fas fa-book mx-3"></i>
                {{__('Roles')}}

            </a>
            <a href="{{route('permissions')}}" class="{{request()->is('admin/permission*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3nav-item">
                <i class="fas fa-table mx-3"></i>
                {{__('Permission')}}
            </a>
            <a href="{{route('users.index')}}" class="{{request()->is('admin/users*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3 nav-item">
                <i class="fas fa-user mx-3"></i>
                {{__('Users')}}
            </a>
            <a href="{{route('pages.index')}}" class="{{request()->is('admin/pages*') ? 'active-nav-link opacity-100' : 'opacity-75'}} flex items-center text-white  hover:opacity-100 py-2 pl-3 nav-item">
                <i class="fas fa-book mx-3"></i>
                {{__('Pages')}}
            </a>

