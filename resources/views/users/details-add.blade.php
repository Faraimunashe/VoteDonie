<x-app-layout>
    <div class="row">
        <h2> Add user information</h2>
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
        <form action="{{ route('add-details') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Firstname</span>
                <input type="text" name="firstname" class="form-control" placeholder="e.g Donie"
                    aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Lastname</span>
                <input type="text" name="lastname" class="form-control" placeholder="Koronya"
                    aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Gender</span>
                <select name="gender" class="form-control" aria-label="Sizing example input" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">National ID</span>
                <input type="text" name="natid" class="form-control" placeholder="12-4536213 P 65"
                    aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Birthday</span>
                <input type="date" name="dob" class="form-control" max="2004-12-31" aria-label="Sizing example input"
                    required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
                <input type="text" name="address" class="form-control" placeholder="123 Area  Cresent Somewhere"
                    aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Constituence</span>
                <select name="location" class="form-control" aria-label="Sizing example input" required>
                    @php
                        $location = \App\Models\Locations::all();
                    @endphp
                    @foreach ($location as $loc)
                        <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Save Details</button>
            </div>
        </form>
    </div>
</x-app-layout>
