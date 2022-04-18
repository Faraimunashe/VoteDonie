
<x-app-layout>
    <div class="row">
        <h2> Edit Contestant</h2>
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
        <form action="{{route('post-contestants')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$con->id}}" name="ballot_id">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Firstname</span>
                <input type="text" name="name" class="form-control" value="{{$con->firstnames}}" disabled required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Lastname</span>
                <input type="text" name="name" class="form-control" value="{{$con->lastname}}" disabled required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Gender</span>
                <input type="text" name="name" class="form-control" value="{{$con->sex}}" disabled required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Location</span>
                <select class="form-select" name="location" aria-label="Default select example">
                    @foreach ($locations as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Party</span>
                <select class="form-select" name="party" aria-label="Default select example">
                    @foreach ($parties as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Edit Contestant</button>
            </div>

        </form>
    </div>
</x-app-layout>
