<x-app-layout>
    <div class="row">
        <h2> Edit User</h2>
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
        <form action="{{route('post-edit-user')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$user->id}}" name="user_id">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                <input type="text" name="email" class="form-control" value="{{$user->email}}" required>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Edit User</button>
            </div>

        </form>
    </div>
</x-app-layout>
