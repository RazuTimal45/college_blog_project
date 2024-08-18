<nav class="sidebar" data-trigger="scrollbar">
    <div class="sidebar-header d-none d-lg-block">
    <div class="sidebar-toogle-pin">
        <i class="icofont-navigation-menu font-weight-200"></i>
    </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-category">Site Dashboard</li>
            <li class="active">
                <a href="{{route('backend.home')}}"
                ><i class="icofont-pie-chart"></i>
                    <span class="link-title">Dashboard</span></a
                >
            </li>
            <li class="nav-category">Posts</li>
            <li>
                <a href="#"
                ><i class="icofont-image"></i>
                    <span class="link-title">Posts</span></a
                >
                <ul class="nav sub-menu">
                    <li>
                        <a href="{{route('backend.posts.index')}}">view all Posts</a>
                    </li>
                    <li>
                        <a href="{{route('backend.posts.create')}}">create Posts</a>
                    </li>
                </ul>
            </li>
            <li class="nav-category">Posts Category</li>
            <li>
                <a href="#"
                ><i class="icofont-speech-comments"></i>
                    <span class="link-title">Categories</span></a
                >
                <ul class="nav sub-menu">
                    <li>
                        <a href="{{route('backend.categories.index')}}">view all Categories</a>
                    </li>
                    <li>
                        <a href="{{route('backend.categories.create')}}">create Category</a>
                    </li>
                </ul>
            </li>
             @if (auth()->user()->id === 1 )
            <li class="nav-category">Our users contact</li>
            <li>
                <a href="#"
                ><i class="icofont-contact-add"></i>
                    <span class="link-title">Customer Contact List</span></a
                >
                <ul class="nav sub-menu">
                    <li>
                        <a href="{{ route('backend.contacts.index') }}">view all contact list</a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="nav-category">Post Tags</li>
            <li>
                <a href="#"
                ><i class="icofont-hand"></i>
                    <span class="link-title">Tags</span></a
                >
                <ul class="nav sub-menu">
                    <li>
                        <a href="{{route('backend.tags.index')}}">view all tags</a>
                    </li>
                    {{-- <li>
                        <a href="{{route('backend.tags.create')}}">create tag</a>
                    </li> --}}
                </ul>
            </li>
            @if (auth()->user()->id === 1 )
            <li class="nav-category">Site Setting</li>
            <li>
                <a href="#"
                ><i class="icofont-settings"></i>
                    <span class="link-title">Setting</span></a
                >
                <ul class="nav sub-menu">
                     <li>
                        <a href="{{route('backend.setting.create')}}">view all settings</a>
                    </li>
                </ul>
            </li>
               @endif
        </ul>
    </div>
</nav>

