<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ "dashboard" }}">JAGA ASA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">ADM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">MAIN MENU</li>

            <li class="{{ setActive('admin/dashboard') }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li  class="dropdown{{ setActive('admin/kategori'). setActive('admin/user'). setActive('admin/donatur'). setActive('admin/jenisbantuan') }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder"></i><span>Master</span></a>

                <ul class="dropdown-menu">

                    <li class="{{ setActive('admin/kategori') }}">
                        <a class="nav-link" href="{{ route('admin.kategori.index') }}">
                            <i class="fas fa-circle-notch"></i>Kategori
                        </a>
                    </li>
                    
                    <li class="{{ setActive('admin/donatur') }}">
                        <a class="nav-link" href="{{ route('admin.donatur.index') }}">
                            <i class="fas fa-circle-notch"></i>Donatur
                        </a>
                    </li>

                    <li class="{{ setActive('admin/jenisbantuan') }}">
                        <a class="nav-link" href="{{ route('admin.jenisbantuan.index') }}">
                            <i class="fas fa-circle-notch"></i>Jenis Bantuan
                        </a>
                    </li>

                    
                    @if(Auth::user()->role_id == '1')
                    <li class="{{ setActive('admin/user') }}">
                        <a class="nav-link" href="{{ route('admin.user.index') }}">
                            <i class="fas fa-circle-notch"></i>User
                        </a>
                    </li>
                    @endif

                </ul>
            </li>

            <li  class="dropdown {{ setActive('admin/stunting'). setActive('admin/sasaran')  }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-people-carry"></i><span>Bantuan</span></a>

                <ul class="dropdown-menu">

                    <li class="{{ setActive('admin/sasaran') }}">
                        <a class="nav-link" href="{{ route('admin.sasaran.index') }}">
                            <i class="fas fa-bullseye"></i>Sasaran Bantuan
                        </a>
                    </li>

                    <li class="{{ setActive('admin/stunting') }}">
                        <a class="nav-link" href="{{ route('admin.stunting.index') }}">
                            <i class="fas fa-child"></i>Stunting
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ setActive('admin/donasi') }}">
                <a class="nav-link" href="{{ route('admin.donasi.index') }}">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span>Donasi</span>
                </a>
            </li>
            
            
            {{-- @can('posts.index')
            <li class="{{ setActive('admin/post') }}"><a class="nav-link"
                    href="{{ route('admin.post.index') }}"><i class="fas fa-book-open"></i>
                    <span>Berita Lama</span></a></li>
            @endcan --}}



            {{-- @can('categories.index')
            <li class="{{ setActive('admin/category') }}"><a class="nav-link"
                    href="{{ route('admin.category.index') }}"><i class="fas fa-folder"></i>
                    <span>Kategori Berita Lama</span></a></li>
            @endcan --}}

            {{-- <li class="{{ setActive('admin/dokumen') }}">
                <a class="nav-link" href="{{ route('admin.dokumen.index') }}">
                    <i class="fas fa-book"></i>
                    <span>Dokumen</span>
                </a>
            </li>

            <li class="{{ setActive('admin/agenda') }}">
                <a class="nav-link" href="{{ route('admin.agenda.index') }}">
                    <i class="fas fa-bell"></i>
                    <span>Agenda</span>
                </a>
            </li>
 
            <li class="{{ setActive('admin/banner') }}">
                <a class="nav-link" href="{{ route('admin.banner.index') }}">
                    <i class="fas fa-image"></i>
                    <span>Banner</span>
                </a>
            </li>
             --}}
            {{-- <!-- <li class="{{ setActive('admin/tags') }}">
                <a class="nav-link"href="{{ route('admin.tags.index') }}">
                    <i class="fas fa-book-open"></i>
                    <span>Tag Baru </span>
                </a>
            </li> --> --}}

            {{-- @can('tags.index')
            <li class="{{ setActive('admin/tag') }}"><a class="nav-link"
                    href="{{ route('admin.tag.index') }}"><i class="fas fa-tags"></i> 
                    <span>Tags</span></a>
            </li>
            @endcan --}}


            {{-- @if(auth()->user()->can('photos.index') || auth()->user()->can('videos.index'))
            <li class="menu-header">GALERI</li>
            @endif --}}
            
            {{-- <li class="{{ setActive('admin/album') }}">
                <a class="nav-link"href="{{ route('admin.album.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Donaturs</span>
                </a>
            </li> --}}

            {{-- <li class="{{ setActive('admin/foto') }}">
                <a class="nav-link" href="{{ route('admin.foto.index') }}">
                    <i class="fas fa-image"></i>
                    <span>Foto</span>
                </a>
            </li>
             --}}
            {{-- <li class="{{ setActive('admin/video') }}">
                <a class="nav-link" href="{{ route('admin.video.index') }}">
                    <i class="fas fa-video"></i>
                    <span>Video</span>
                </a>
            </li> --}}

            {{-- <li class="{{ setActive('admin/slider') }}">
                <a class="nav-link" href="{{ route('admin.slider.index') }}">
                    <i class="fas fa-laptop"></i>
                    <span>Slider</span>
                </a>
            </li> --}}

            <!-- Pengaturan untuk template dan konfigurasi website (nama website, profil, dan deskripsi) -->
            @if(Auth::user()->role_id == '1')
            {{-- <li class="menu-header">PENGATURAN</li>      --}}
            
            {{-- <li class="{{ setActive('admin/template') }}">
                <a class="nav-link" href="{{ route('admin.template.index') }}">
                    <i class="fas fa-cog"></i>
                    <span>Template</span>
                </a>
            </li> --}}

            {{-- <li class="{{ setActive('admin/webconfig') }}">
                <a class="nav-link" href="{{ route('admin.webconfig.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>Web Config</span>
                </a>
            </li> --}}
            @endif  

            {{-- <li
                class="dropdown {{ setActive('admin/role'). setActive('admin/permission'). setActive('admin/user') }}">
                @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Users
                    Management</span></a>
                @endif
                
                <ul class="dropdown-menu">
                    @can('roles.index')
                        <li class="{{ setActive('admin/role') }}"><a class="nav-link"
                            href="{{ route('admin.role.index') }}"><i class="fas fa-unlock"></i> Roles</a>
                    </li>
                    @endcan

                    @can('permissions.index')
                        <li class="{{ setActive('admin/permission') }}"><a class="nav-link"
                        href="{{ route('admin.permission.index') }}"><i class="fas fa-key"></i>
                        Permissions</a></li>
                    @endcan

                    @can('users.index')
                        <li class="{{ setActive('admin/user') }}"><a class="nav-link"
                            href="{{ route('admin.user.index') }}"><i class="fas fa-users"></i> Users</a>
                    </li>
                    @endcan
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>