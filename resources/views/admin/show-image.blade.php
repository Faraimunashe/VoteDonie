<x-app-layout>
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <div class="row">
        <h1>{{ $user->firstnames }} {{ $user->lastname }} National ID</h1>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-2">
                            <img src="{{ asset('images/natid') }}/{{ $user->image }}" alt="Responsive image"
                                style="width: 280px; border-radius: 10px;">
                        </div>
                    </div>
                </div>

                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-2">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    @php
                                        $profileimage = \App\Models\Image::where('user_id', $user->id)->first();

                                    @endphp
                                    @if (is_null($profileimage))
                                        <img src="{{ asset('images/natid/uesr.png') }}"
                                            alt="Generic placeholder image" class="img-fluid"
                                            style="width: 180px; border-radius: 10px;">
                                    @else
                                        <img src="{{ asset('images/profiles') }}/{{ $profileimage->name }}"
                                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    @endif
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">{{ $user->firstnames }} {{ $user->lastname }}</h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $user->natid }}</p>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $user->sex }}</p>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $user->dob }}</p>
                                    <div class="d-flex pt-1">
                                        <a href="/admin/users"
                                            onclick="return confirm('Are you sure you want to disapprove this user?')"
                                            class="btn btn-outline-danger me-1 flex-grow-1">Disapprove</a>
                                        <a onclick="return confirm('Do you want to approve this user?')"
                                            class="btn btn-success flex-grow-1"
                                            href="{{ route('make-voter', $user->id) }}" class="btn btn-secondary">
                                            approve
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
</x-app-layout>
