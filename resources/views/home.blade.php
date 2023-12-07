<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home | Laravel Blog</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('home_assets/assets/favicon.ico') }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('home_assets/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Laravel Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>assets/favicon.ico
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">                        
                        @if (Route::has('login'))
                            @auth                                
                                <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="#about_f">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="#about_f">Contact</a></li>
                                <li class="nav-item"><a class="nav-link " aria-current="page" href="#">Blog</a></li>                        
                                <li class="nav-item"><a class="nav-link " aria-current="page" href="{{ route('logout')}}">Logout</a></li>                        
                            @else  
                                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#about_f">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="#about_f">Contact</a></li>
                                <li class="nav-item"><a class="nav-link " aria-current="page" href="#">Blog</a></li>                                                      
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>                                                                    
                                @endif
                            @endauth
                        @endif                            
                    </ul>
                </div>
            </div>
        </nav>
       <br/>          
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                @if($homePost->count() > 0)
                @foreach($homePost as $rs)
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="small text-muted">{{ $rs->created_at->format('d-M-Y') }}</div>
                            <h2 class="card-title">{{ Str::limit($rs->title, 100) }}</h2>
                            <p class="card-text">{{ Str::limit($rs->content, 200) }}</p>
                            <a class="btn btn-primary" href="{{ route('single', $rs->id) }}">Read more →</a>
                        </div>
                    </div>                                                           
                </div>
                @endforeach           
              
                @else
                <tr>
                    <td class="text-center" colspan="5"><h5>No post available</h5></td>
                </tr>
                @endif  
                <!-- Side widgets-->
                
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark fixed-bottom" id="about_f">
            <div class="container"><p class="m-0 text-center text-white">Copyright © My Laravel Blog</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('home_assets/js/scripts.js') }}"></script>
    </body>
</html>
