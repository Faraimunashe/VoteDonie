
<x-app-layout>
    <div class="row">
        <h2> Add Contestant</h2>
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
        <form action="{{route('add-contestants')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">User</span>
                <select class="form-select" name="user_id" aria-label="Default select example">
                    <option value="">___SELECT USER_____</option>
                    @foreach ($users as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Position</span>
                <select class="form-select" name="type" aria-label="Default select example">
                    <option value="">___SELECT POSITION_____</option>
                    <option value="pres">Presidential</option>
                    <option value="mp">Parliament</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Location</span>
                <select class="form-select" name="location_id" aria-label="Default select example">
                    <option value="">___SELECT LOCATION_____</option>
                    @foreach ($locations as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Party</span>
                <select class="form-select" name="party_id" aria-label="Default select example">
                    <option value="">___SELECT PARTY_____</option>
                    @foreach ($parties as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Add Contestant</button>
            </div>

        </form>
    </div>
</x-app-layout>
