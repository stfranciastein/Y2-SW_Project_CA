<div class="accordion" id="passwordAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="passwordHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#passwordCollapse" aria-expanded="false" aria-controls="passwordCollapse">
                {{ __('Change Password') }}
            </button>
        </h2>
        <div id="passwordCollapse" class="accordion-collapse collapse" aria-labelledby="passwordHeading" data-bs-parent="#passwordAccordion">
            <div class="accordion-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                    <p>Ensure your account is using a long, random password to stay secure.</p>
                    <div class="row mb-1">
                        <label for="current_password" class="col-md-4 col-form-label text-md-end">
                            {{ __('Current Password') }}
                        </label>
                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required autocomplete="current-password">
                            @error('current_password', 'updatePassword')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="password" class="col-md-4 col-form-label text-md-end">
                            {{ __('New Password') }}
                        </label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password', 'updatePassword')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">
                            {{ __('Confirm Password') }}
                        </label>
                        <div class="col-md-6">
                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" name="password_confirmation" required>
                            @error('password_confirmation', 'updatePassword')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            @if (session('status') === 'password-updated')
                                <span class="m-1 fade-out">{{ __('Change Password') }}</span>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .accordion-button:not(.collapsed) {
        background-color: transparent !important;
        color: inherit !important;
        box-shadow: none !important;
    }
</style>
