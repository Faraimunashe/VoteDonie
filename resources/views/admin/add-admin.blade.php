<x-app-layout>
    <div class="row">
        <h2> Add Admin</h2>
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
        <form action="{{ route('add-admin-post') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">User</span>
                <input type="text" class="form-group" name="name" placeholder="username">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="email">Email</span>
                <input type="email" class="form-group" name="email" placeholder="email">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="password">Password</span>
                <input type="password" class="form-group" name="password" placeholder="password">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="cpassword">Confirm password</span>
                <input type="password" class="form-group" name="password_confirmation"
                    placeholder="Confirm password">
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Add Admin</button>
            </div>

        </form>
    </div>
</x-app-layout>
