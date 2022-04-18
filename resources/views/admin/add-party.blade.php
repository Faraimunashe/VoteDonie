<x-app-layout>
    <div class="row">
        <h2> Add Party</h2>
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
        <form action="{{ route('admin-add-party') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Party Name</span>
                <input type="text" class="form-group" name="name" placeholder="enter party name">
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>

        </form>
    </div>
</x-app-layout>
