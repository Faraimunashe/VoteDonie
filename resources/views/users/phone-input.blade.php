<x-app-layout>
    <div class="row">
        <h2> Add your phone please</h2>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
            <x-auth-validation-errors class="alert alert-danger" role="alert" :errors="$errors" />
        <form action="{{route('phone')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Phone number</span>
                <input type="tel" name="phone" class="form-control" placeholder="+263783540959" aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Add Phone</button>
            </div>
        </form>
    </div>
</x-app-layout>
