<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span data-feather="users"></span>
              Blog
           </a>
           <div class="dropdown-menu">
                <a class="dropdown-item nav-item"
                href="{{route('blogpost.create')}}">Add Blog</a>
                <a class="dropdown-item nav-item" href="{{route('blogpost.index')}}">Blog List</a>
                <a class="dropdown-item nav-item" href="{{route("blog.trashed")}}">Trashed Blog List</a>
           </div>
        </li>
        <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span data-feather="users"></span>
                 Project
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item nav-item" href="{{route('adminproject.create')}}">Add Project</a>
                <a class="dropdown-item nav-item" href="{{route('adminproject.index')}}">Project List</a>
                <a class="dropdown-item nav-item" href="{{route('adminproject.trashed')}}">Trashed Project List</a>
              </div>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span data-feather="users"></span>
                 Contact Message
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item nav-item" href="#">Message List</a>
                <a class="dropdown-item nav-item" href="#">Trashed Message</a>
              </div>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-toggle="dropdown">
               <span data-feather="users"></span>
                   Users
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item nav-item" href="#">User List</a>
                <a class="dropdown-item nav-item" href="#"></a>
              </div>
        </li>
    </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
            </a>
      </h6>
    </div>
  </nav>
