<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    @vite(['resources/css/style.css', 'resources/js/main.js'])
    <title>Admin Dashboard</title>
  </head>

  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <a href="#" class="logo">
        <i class="bx bx-code-alt"></i>
        <div class="logo-name"><span>Job Site</span></div>
      </a>
      <ul class="side-menu">
        <li>
          <a href="#"><i class="bx bxs-dashboard"></i>Dashboard</a>
        </li>
        <li class="active">
          <a href="#"><i class="bx bx-analyse"></i>Analytics</a>
        </li>
        <li>
          <a href="{{ route('profile.edit') }}"><i class="bx bx-group"></i>Users</a>
        </li>
        <li>
          <a href="#"><i class="bx bx-cog"></i>Settings</a>
        </li>
      </ul>
      <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
      </form>
        <ul class="side-menu">
            <li>
                <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bx bx-log-out-circle"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <div class="message">
        @if(session('message'))
            {{ session('message') }}
        @endif
    </div>

    <!-- Main Content -->
    <div class="content">
      <!-- Navbar -->
      <nav>
        <i class="bx bx-menu"></i>
        <form action="#">
          <div class="form-input">
            <input type="search" placeholder="Search..." />
            <button class="search-btn" type="submit">
              <i class="bx bx-search"></i>
            </button>
          </div>
        </form>
        <input type="checkbox" id="theme-toggle" hidden />
        <label for="theme-toggle" class="theme-toggle"></label>
        <a href="#" class="notif">
          <i class="bx bx-bell"></i>
          <span class="count">12</span>
        </a>
        <a href="#" class="profile">
          <img src="images/logo.png" />
        </a>
      </nav>

      <!-- End of Navbar -->

      <main>
        <div class="header">
          <div class="left">
            <h1>Admin Panel</h1>
            <ul class="breadcrumb">
              <li><a href="#"> Analytics </a></li>
              |
              <li><a href="#" class="active">Add Vaccency</a></li>
            </ul>
          </div>
        </div>

        <!-- Insights -->
        <ul class="insights">
          <li>
            <i class="bx bx-calendar-check"></i>
            <span class="info">
              <h3>{{ $usersCount }}</h3>
              <p>Total Users</p>
            </span>
          </li>
          <li>
            <i class="bx bx-show-alt"></i>
            <span class="info">
              <h3>{{ $jobsCount }}</h3>
              <p>Total Jobs</p>
            </span>
          </li>
          <li>
            <i class="bx bx-line-chart"></i>
            <span class="info">
              <h3>14,721</h3>
              <p>Searches</p>
            </span>
          </li>
          <li>
            <i class="bx bx-dollar-circle"></i>
            <span class="info">
              <h3>{{ $applicationsCount }}</h3>
              <p>Total Applications</p>
            </span>
          </li>
        </ul>
        <!-- End of Insights -->
        <div class="bottom-data">
          <div class="orders">
              <div class="header">
                  <i class='bx bx-receipt'></i>
                  <h3>Registered User</h3>
                  <i class='bx bx-filter'></i>
                  <i class='bx bx-search'></i>
              </div>
              <table>
                  <thead>
                      <tr>
                          <th>User</th>
                          <th>Email</th>
                          <th>User Type</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                  <tr>
                      <td>
                          <img src="{{ asset('images/profile-1.jpg') }}" alt="{{ $user->name }}" />
                          <p>{{ $user->name }}</p>
                      </td>
                      <td>{{ $user->email }}</td>
                      <td>
                        @if ($user->usertype == 'user')
                          <span class="status user">User</span>
                        @elseif ($user->usertype == 'admin')
                          <span class="status admin">Admin</span>
                        @else
                          <span class="status unknown">Unknown</span>
                        @endif
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>

          <!-- Reminders -->
          <div class="reminders">
              <div class="header">
                  <i class='bx bx-note'></i>
                  <h3>Remiders</h3>
                  <a href="/create" class="bx bx-filter"></a>
                  <i class='bx bx-plus'></i>
              </div>
                @forelse($reminders as $reminder)
                  <ul class="task-list">
                      <li class="{{ $reminder->completed ? 'completed' : 'not-completed' }}">
                          <div class="task-title">
                              <i class="{{ $reminder->completed ? 'bx bx-check-circle' : 'bx bx-x-circle' }}"></i>
                              <p>{{ $reminder->title }}</p>
                          </div>
                          @if(Auth::check())
                              <div class="clear">
                                  <a href="/delete/{{ $reminder->id }}" class="delete-link">Delete</a>
                              </div>
                              <div class="save">
                                  <a href="/update/{{ $reminder->id }}" class="edit-link">Edit</a>
                              </div>
                          @endif
                      </li>
                  </ul>
              @empty
                  <div>No Reminder Available.</div>
              @endforelse
          </div>

          <!-- End of Reminders-->
        </div>
      </main>
    </div>

    <script src="admin.js"></script>
  </body>
</html>
