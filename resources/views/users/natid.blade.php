<x-app-layout>
    <div class="row">
        <h2> Upload nationalid image</h2>
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
        <form action="{{ route('add-natid') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="file" name="image" class="form-control" placeholder="image of natid"
                    aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Save Details</button>
            </div>
        </form>
    </div>
</x-app-layout>
