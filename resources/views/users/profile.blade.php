<x-app-layout>
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <div class="row">
        <h1>User Profile</h1>
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                @php
                                    $profileimage = \App\Models\Image::where('user_id', $user->id)->first();

                                @endphp
                                @if (is_null($profileimage))
                                    <img src="{{ asset('images/voteuser.png') }}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                @else
                                    <img src="{{ asset('images/profiles') }}/{{ $profileimage->name }}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                @endif
                                <h5 class="my-3">{{ $user->firstnames }} {{ $user->lastname }}</h5>
                                <p class="text-muted mb-1">User</p>
                                <p class="text-muted mb-4">{{ $user->address }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary ms-1">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->firstnames }} {{ $user->lastname }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->sex }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <h3> Upload profile image</h3>
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <x-auth-validation-errors class="alert alert-danger" role="alert" :errors="$errors" />
                            <form action="{{ route('profile-upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="file" name="image" class="form-control" placeholder="image of natid"
                                        aria-label="Sizing example input" required>
                                </div>
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
</x-app-layout>
