<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Appointment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


  <!-- Codes form auth  -->
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<!-- Codes of app.blade.php -->
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    App System
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


<!-- Code of mine  -->
<div class="container mt-3">
  <h2>Appointments <a class="btn btn-info" href="/category-create">Add Appointment</a></h2>
             
  @if(session()->has('success'))
    <div class="alert alert-info" role="alert">
      <strong>{{session()->get('success')}}</strong>
    </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Reason</th>
        <th>Date - Time</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
     
      <tr>
          <!-- <td>1</td>
          <td>PRabu</td>
          <td>prabhu@gmail.com</td>
          <td>923456789</td>
          <td>Birthday</td> -->
          <td>{{ $category->id}}</td>
          <td>{{ $category->name}}</td>
          <td>{{ $category->email}}</td>
          <td>{{ $category->number}}</td>
          <td>{{ $category->Reason}}</td>
          <td>{{ $category->date}}</td>
          <td>{{ $category->status }}</td>
          <td>
            <a href="/category-edit/{{$category->id}}" class="btn btn-sm btn-info">Edit</a>
            <!-- <a href="/category-delete/{{$category->id}}" class="btn btn-sm btn-danger">Delete</a> -->

            <form action="/category-delete/{{$category->id}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
          
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- <div class="d-flex justify-content-center"> -->
    
    {!!$categories->links('pagination::bootstrap-5')!!}
  <!-- </div> -->
</div>

<!-- User -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
