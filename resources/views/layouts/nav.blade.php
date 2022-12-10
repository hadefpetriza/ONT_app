<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo" height="24" class="d-inline-block align-text-top">
                PT TELEKOMUNIKASI INDONESIA
            </a> 
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ont.index') }}">Optical Network Terminal (ONT)</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @can('admin')
                            <li><a class="dropdown-item" href="{{ route('account.index') }}">Kelola Data User</a></li>
                            @endcan
                            <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>

                        </ul>
                    </li>
				</ul>
			</div>
		</div>
	</nav>