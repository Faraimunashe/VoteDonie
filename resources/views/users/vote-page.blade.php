<x-app-layout>
    <div class="row">
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
        @foreach ($pballots as $item)
            <div class="col-lg-4">
                <div class="col-md-12">
                    <div class="card mb-3" style="width: 18rem;">
                        @php
                            $profileimage = \App\Models\Image::where('user_id', $item->id)->first();

                        @endphp
                        @if (is_null($profileimage))
                            <img src="{{ asset('images/voteuser.png') }}" height="170" class="card-img-top"
                                alt="...">
                        @else
                            <img src="{{ asset('images/profiles') }}/{{ $profileimage->name }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $item->firstnames }} {{ $item->lastname }}</b></h5>
                            <h6 class="card-title">{{ $item->sex }}</h6>
                            <h6 class="card-title">Presidential candidate</h6>
                            <h6 class="card-title">{{ $item->name }}</h6>
                            <div class="row">
                                @php
                                    $verified = \App\Models\Voter::where('user_id', Auth::user()->id)->first();
                                @endphp
                                @if (is_null($verified))
                                    <div class="alert alert-danger" role="alert">
                                        you're not verified
                                    </div>
                                @else
                                    <div class="col-lg-6">
                                        <form method="POST" action="{{ route('vote') }}">
                                            @csrf
                                            <input type="hidden" name="ballotid" value="{{ $item->id }}" required>
                                            <button type="submit" class="btn btn-primary position-relative"
                                                @if (is_null(\App\Models\Votes::where('user_id', Auth::user()->id)->first())) disabled @endif>
                                                vote
                                                <span
                                                    class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                                                    {{ \App\Models\Votes::count() }}
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-lg-6">

                                        @if (\App\Models\Votes::where('user_id', Auth::user()->id) != null)
                                            <form method="POST" action="{{ route('reset') }}">
                                                @csrf
                                                <input type="hidden" name="ballotid" value="{{ $item->id }}"
                                                    required>
                                                <button type="submit" class="btn btn-warning position-relative">
                                                    reset
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!---mps -->
    <div class="row">
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
        @foreach ($mballots as $item)
            <div class="col-lg-4">
                <div class="col-md-12">
                    <div class="card mb-3" style="width: 18rem;">
                        <img src="{{ asset('images/voteuser.png') }}" height="170" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $item->firstnames }} {{ $item->lastname }}</b></h5>
                            <h6 class="card-title">{{ $item->sex }}</h6>
                            <h6 class="card-title">Member of parliament</h6>
                            <h6 class="card-title">{{ $item->name }}</h6>
                            <div class="row">
                                @php
                                    $verified = \App\Models\Voter::where('user_id', Auth::user()->id)->first();
                                @endphp
                                @if (is_null($verified))
                                    <div class="alert alert-danger" role="alert">
                                        you're not verified
                                    </div>
                                @else
                                    <div class="col-lg-6">
                                        <form method="POST" action="{{ route('vote') }}">
                                            @csrf
                                            <input type="hidden" name="ballotid" value="{{ $item->id }}" required>
                                            <button type="submit" class="btn btn-primary position-relative"
                                                @if (is_null(\App\Models\Votes::where('user_id', Auth::user()->id)->first())) disabled @endif>
                                                vote
                                                <span
                                                    class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                                                    {{ \App\Models\Votes::count() }}
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-lg-6">

                                        @if (\App\Models\Votes::where('user_id', Auth::user()->id) != null)
                                            <form method="POST" action="{{ route('reset') }}">
                                                @csrf
                                                <input type="hidden" name="ballotid" value="{{ $item->id }}"
                                                    required>
                                                <button type="submit" class="btn btn-warning position-relative">
                                                    reset
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
