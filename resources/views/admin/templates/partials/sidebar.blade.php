<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Jumbotron</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i class="fa fa-bullhorn" aria-hidden="true"></i><span
                                        class="hide-menu">Announcement</span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">

                                    @if (auth()->user()->can('create announcement'))
                                    <li class="sidebar-item"><a href="{{ route('announcement.create')}}" class="sidebar-link"><span
                                                class="hide-menu"> Create</span></a>
                                    </li>
                                    @endif

                                    @if (auth()->user()->can('index announcement') || auth()->user()->can('edit announcement') || auth()->user()->can('delete announcement') )
                                    <li class="sidebar-item"><a href="{{ route('announcement.index')}}" class="sidebar-link"><span
                                                class="hide-menu"> List</span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="{{ route('announcement.show-deletes')}}" class="sidebar-link"><span
                                        class="hide-menu"> Recycle Bin</span></a>
                                    </li>
                                    @endif
                                </ul>
                            </li>

                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fa fa-th-large" aria-hidden="true"></i><span
                                    class="hide-menu">Carousel</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">

                                @if (auth()->user()->can('create carousel'))
                                <li class="sidebar-item"><a href="{{ route('carousel.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Create</span></a>
                                </li>
                                @endif

                                @if (auth()->user()->can('index carousel') || auth()->user()->can('edit carousel') || auth()->user()->can('delete carousel'))
                                <li class="sidebar-item"><a href="{{ route('carousel.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> List</span></a>
                                </li>
                                @endif

                            </ul>
                        </li>

                        {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i class="fa fa-th-large" aria-hidden="true"></i><span
                                class="hide-menu">Prayer Schedule</span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">

                            @if (auth()->user()->can('setting prayer schedule'))
                            <li class="sidebar-item"><a href="{{ route('jadwal-sholat.index')}}" class="sidebar-link"><span
                                class="hide-menu"> Settings</span></a>
                            </li>
                            @endif

                        </ul>
                    </li> --}}

                <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Acara & Info</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-paper-plane" aria-hidden="true"></i><span
                            class="hide-menu">Post </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">

                            @if (auth()->user()->can('create post'))
                            <li class="sidebar-item"><a href="{{ route ('post.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Create Post</span></a>
                            </li>
                            @endif

                            @if (auth()->user()->can('index post') || auth()->user()->can('edit post') || auth()->user()->can('delete post'))
                            <li class="sidebar-item"><a href="{{ route ('post.index')}}" class="sidebar-link"><span
                                    class="hide-menu"> List Post</span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route ('post.show-deletes')}}" class="sidebar-link"><span
                                    class="hide-menu"> Recycle Bin</span></a>
                            </li>
                            @endif
                        </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-th-large" aria-hidden="true"></i><span
                            class="hide-menu">Category </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            @if (auth()->user()->can('create category'))
                            <li class="sidebar-item"><a href="{{ route ('category.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Create Category</span></a>
                            </li>
                            @endif

                            @if (auth()->user()->can('index category') || auth()->user()->can('edit category') || auth()->user()->can('delete category'))
                            <li class="sidebar-item"><a href="{{ route ('category.index')}}" class="sidebar-link"><span
                                    class="hide-menu"> List Category</span></a>
                            </li>
                            @endif
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-tags" aria-hidden="true"></i><span
                            class="hide-menu">Tags </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        @if (auth()->user()->can('create tag'))
                            <li class="sidebar-item"><a href="{{ route ('tag.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Create Tag</span></a>
                            </li>
                        @endif

                        @if (auth()->user()->can('index tag') || auth()->user()->can('edit tag') || auth()->user()->can('delete tag'))
                        <li class="sidebar-item"><a href="{{ route ('tag.index')}}" class="sidebar-link"><span
                                    class="hide-menu"> List Tag
                                </span></a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Infaq & Wakaf</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-cubes" aria-hidden="true"></i><span
                            class="hide-menu">Donation Package</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        @if (auth()->user()->can('create donation package'))
                            <li class="sidebar-item"><a href="{{ route('donation-package.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Create</span></a>
                            </li>
                        @endif

                        @if (auth()->user()->can('index donation package') || auth()->user()->can('edit donation package') || auth()->user()->can('delete donation package'))
                            <li class="sidebar-item"><a href="{{ route('donation-package.index')}}" class="sidebar-link"><span
                                    class="hide-menu"> List</span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route('donation-package.show-deletes')}}" class="sidebar-link"><span
                            class="hide-menu"> Recycle Bin</span></a>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i class="fa fa-camera" aria-hidden="true"></i><span
                        class="hide-menu">Gallery</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        @if (auth()->user()->can('create gallery donation'))
                        <li class="sidebar-item"><a href="{{ route('gallery.create')}}" class="sidebar-link"><span
                        class="hide-menu"> Create</span></a>
                        </li>
                        @endif

                        @if (auth()->user()->can('index gallery donation') || auth()->user()->can('edit gallery donation') || auth()->user()->can('delete gallery donation'))
                        <li class="sidebar-item"><a href="{{ route('gallery.index')}}" class="sidebar-link"><span
                                class="hide-menu"> List</span></a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i class="fa fa-credit-card" aria-hidden="true"></i><span
                        class="hide-menu">Transaction</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">

                        @if (auth()->user()->can('index transaction') || auth()->user()->can('edit transaction') || auth()->user()->can('delete transaction') || auth()->user()->can('show transaction'))
                        <li class="sidebar-item"><a href="{{ route('transaction.index')}}" class="sidebar-link"><span
                                class="hide-menu"> List</span></a>
                        </li>
                        @endif

                        @if (auth()->user()->can('delete transaction'))
                        <li class="sidebar-item"><a href="{{ route('transaction.show-deletes')}}" class="sidebar-link"><span
                        class="hide-menu"> Recycle Bin</span></a>
                        </li>
                        @endif
                </ul>
            </li>
        

            <li class="list-divider"></li>
            <li class="nav-small-cap"><span class="hide-menu">LAZHAQ Report</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i class="fa fa-sticky-note" aria-hidden="true"></i><span
                        class="hide-menu">Receipt</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">

                        @if (auth()->user()->can('create lazhaq receipt'))
                        <li class="sidebar-item"><a href="{{ route('penerimaan-lazhaq.create')}}" class="sidebar-link"><span
                                class="hide-menu"> Create</span></a>
                        </li>
                        @endif

                        @if (auth()->user()->can('index lazhaq receipt') || auth()->user()->can('edit lazhaq receipt') || auth()->user()->can('delete lazhaq receipt'))
                        <li class="sidebar-item"><a href="{{ route('penerimaan-lazhaq.index')}}" class="sidebar-link"><span
                                class="hide-menu"> List</span></a>
                        </li>
                        @endif
                </ul>
            </li>

            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i class="fa fa-heart" aria-hidden="true"></i><span
                    class="hide-menu">Distribution</span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">

                        @if (auth()->user()->can('create lazhaq distribution'))
                        <li class="sidebar-item"><a href="{{ route('penyaluran-lazhaq.create')}}" class="sidebar-link"><span
                                class="hide-menu"> Create</span></a>
                        </li>
                        @endif

                        @if (auth()->user()->can('index lazhaq distribution') || auth()->user()->can('edit lazhaq distribution') || auth()->user()->can('delete lazhaq distribution'))
                        <li class="sidebar-item"><a href="{{ route('penyaluran-lazhaq.index')}}" class="sidebar-link"><span
                            class="hide-menu"> List</span></a>
                        </li>
                        @endif
            </ul>
        </li>

        <li class="list-divider"></li>
            <li class="nav-small-cap"><span class="hide-menu">Qurban Report</span></li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i class="fa fa-sticky-note" aria-hidden="true"></i><span
                        class="hide-menu">Receipt</span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">

                    @if (auth()->user()->can('create lazhaq receipt'))
                    <li class="sidebar-item"><a href="{{ route('penerimaan-qurban.create')}}" class="sidebar-link"><span
                                class="hide-menu"> Create</span></a>
                    </li>
                    @endif

                    @if (auth()->user()->can('index lazhaq receipt') || auth()->user()->can('edit lazhaq receipt') || auth()->user()->can('delete lazhaq receipt'))
                    <li class="sidebar-item"><a href="{{ route('penerimaan-qurban.index')}}" class="sidebar-link"><span
                                class="hide-menu"> List</span></a>
                    </li>
                    @endif

                </ul>
            </li>

            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i class="fa fa-heart" aria-hidden="true"></i><span
                    class="hide-menu">Distribution</span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">

                @if (auth()->user()->can('create qurban distribution'))
                <li class="sidebar-item"><a href="{{ route('penyaluran-qurban.create')}}" class="sidebar-link"><span
                    class="hide-menu"> Create</span></a>
                </li>
                @endif

                @if (auth()->user()->can('index qurban distribution') || auth()->user()->can('edit qurban distribution') || auth()->user()->can('delete qurban distribution'))
                <li class="sidebar-item"><a href="{{ route('penyaluran-qurban.index')}}" class="sidebar-link"><span
                            class="hide-menu"> List
                        </span></a>
                </li>
                @endif

            </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
            aria-expanded="false"><i class="fa fa-camera" aria-hidden="true"></i><span
                class="hide-menu">Gallery</span></a>
        <ul aria-expanded="false" class="collapse  first-level base-level-line">

            @if (auth()->user()->can('create qurban distribution gallery'))
            <li class="sidebar-item"><a href="{{ route('gallery-qurban.create')}}" class="sidebar-link"><span
                class="hide-menu"> Create</span></a>
            </li>
            @endif

            @if (auth()->user()->can('index qurban distribution gallery') || auth()->user()->can('edit qurban distribution gallery') || auth()->user()->can('delete qurban distribution gallery'))
            <li class="sidebar-item"><a href="{{ route('gallery-qurban.index')}}" class="sidebar-link"><span
                        class="hide-menu"> List</span></a>
            </li>
            @endif

        </ul>
    </li>




                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">User Management</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i class="fa fa-user-plus" aria-hidden="true"></i><span
                        class="hide-menu">Roles </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">

                    @if (auth()->user()->can('create role'))
                    <li class="sidebar-item"><a href="{{ route ('roles.create')}}" class="sidebar-link"><span
                                class="hide-menu"> Create Role</span></a>
                    </li>
                    @endif

                    @if (auth()->user()->can('index role') || auth()->user()->can('delete role'))
                    <li class="sidebar-item"><a href="{{ route ('roles.index')}}" class="sidebar-link"><span
                                class="hide-menu"> List Role
                            </span></a>
                    </li>
                    @endif
                </ul>
            </li>

            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><span
                    class="hide-menu">Permission </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                
                @if (auth()->user()->can('permissions'))
                <li class="sidebar-item"><a href="{{ route('users.roles_permission') }}" class="sidebar-link"><span
                            class="hide-menu"> Check Permission</span></a>
                </li>
                @endif

            </ul>
        </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i><span
                            class="hide-menu">Users </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">

                        @if (auth()->user()->can('create users'))
                        <li class="sidebar-item"><a href="{{ route ('user.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Create User</span></a>
                        </li>
                        @endif

                        @if (auth()->user()->can('index users') || auth()->user()->can('edit users') || auth()->user()->can('delete users'))
                        <li class="sidebar-item"><a href="{{ route ('user.index')}}" class="sidebar-link"><span
                                    class="hide-menu"> List User
                                </span></a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="list-divider"></li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>