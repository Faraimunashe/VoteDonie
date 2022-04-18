<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Get started with Bootstrap, the world&rsquo;s most popular framework for building responsive, mobile-first sites, with jsDelivr and a template starter page.">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">

    <meta name="docsearch:language" content="en">
    <meta name="docsearch:version" content="5.1">

    <title>ZEC Voting System - User</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.1/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <header class="navbar navbar-expand-md navbar-dark bd-navbar">
        <nav class="container-xxl flex-wrap flex-md-nowrap" aria-label="Main navigation">
            <a class="navbar-brand p-0 me-2" href="/dashboard" aria-label="Bootstrap">
                <img src="{{ asset('images/zimbabwe-removebg-preview.png') }}" width="40" height="32"
                    class="d-block my-1" viewBox="0 0 118 94" role="img" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bdNavbar"
                aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>

            </button>

            <div class="collapse navbar-collapse" id="bdNavbar">
                @if (Auth::user()->hasRole('admin'))
                    <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav pt-2 py-md-0">
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="{{ route('contestants') }}" rel="noopener">Contestants</a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="{{ route('users') }}" rel="noopener">Users</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav pt-2 py-md-0">
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="{{ route('profile') }}" rel="noopener">My Profile</a>
                        </li>
                    </ul>
                @endif

                <hr class="d-md-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap ms-md-auto">

                </ul>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="btn btn-bd-download d-lg-inline-block my-2 my-md-0 ms-md-3">Logout</button>
                </form>
            </div>
        </nav>
    </header>



    <nav class="bd-subnavbar py-2" aria-label="Secondary navigation">
        <div class="container-xxl d-flex align-items-md-center">
            @if (Auth::user()->hasRole('user'))
                <h5 class="">Welcome voting user</h5>
            @else
                <h5 class="">Welcome Admin</h5>
            @endif





    </nav>


    <div class="container-xxl my-md-4 bd-layout">
        <aside class="bd-sidebar">
            <nav class="collapse bd-links" id="bd-docs-nav" aria-label="Docs navigation">
                <ul class="list-unstyled mb-0 py-3 pt-md-1">
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded" data-bs-toggle="collapse"
                            data-bs-target="#getting-started-collapse" aria-expanded="true" aria-current="true">
                            Menu Option
                        </button>

                        <div class="collapse show" id="getting-started-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                @if (Auth::user()->hasRole('user'))
                                    <li><a href="/dashboard" class="d-inline-flex align-items-center rounded">Vote
                                            Screen</a></li>
                                    <li><a href="{{ route('result') }}"
                                            class="d-inline-flex align-items-center rounded">Voting Results</a>
                                    </li>
                                    <li><a href="{{ route('profile') }}"
                                            class="d-inline-flex align-items-center rounded">Profile Info</a>
                                    </li>
                                @else
                                    <li><a href="{{ route('users') }}"
                                            class="d-inline-flex align-items-center rounded">Users List</a></li>
                                    <li><a href="{{ route('contestants') }}"
                                            class="d-inline-flex align-items-center rounded">Contestants List</a></li>
                                    <li><a href="{{ route('admin-locations') }}"
                                            class="d-inline-flex align-items-center rounded">Locations List</a>
                                    </li>
                                    <li><a href="{{ route('admin-parties') }}"
                                            class="d-inline-flex align-items-center rounded">Parties List</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                </ul>
                @if (Auth::user()->hasRole('admin'))
                    <ul class="list-unstyled mb-0 py-3 pt-md-1">
                        <li class="mb-1">
                            <button class="btn d-inline-flex align-items-center rounded" data-bs-toggle="collapse"
                                data-bs-target="#getting-started-collapse" aria-expanded="true" aria-current="true">
                                Action Option
                            </button>

                            <div class="collapse show" id="getting-started-collapse">
                                <ul class="list-unstyled fw-normal pb-1 small">
                                    <li><a href="{{ route('addcontestants') }}"
                                            class="d-inline-flex align-items-center rounded">Add Contestant</a></li>
                                    <li><a href="{{ route('admin-location-index') }}"
                                            class="d-inline-flex align-items-center rounded">Add Location</a>
                                    </li>
                                    <li><a href="{{ route('admin-party-index') }}"
                                            class="d-inline-flex align-items-center rounded">Add Party</a></li>
                                    <li><a href="{{ route('add-admin') }}"
                                            class="d-inline-flex align-items-center rounded">Add Admin</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                @endif

            </nav>

        </aside>

        <main class="bd-main order-1">
            {{ $slot }}
        </main>
    </div>




    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
    <script src="https://getbootstrap.com/docs/5.1/assets/js/docs.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>
