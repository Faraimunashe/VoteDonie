<x-app-layout>
    <div class="row">
        <h2> Verify your phone number</h2>
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
        <form action="{{route('verify')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Verification code</span>
                <input type="tel" name="code" class="form-control" placeholder="XXXX" aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Verify Phone</button>
            </div>

        </form>
    </div>
</x-app-layout>
