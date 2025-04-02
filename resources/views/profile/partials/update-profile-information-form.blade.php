<div class="card border-0">
    <div class="card-body">
        <form
            id="send-verification"
            class="d-none"
            method="post"
            action="{{ route('verification.send') }}"
        >
            @csrf
        </form>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="row">
                <!-- Profile Picture Upload-->
                <div class="col-md-5 row mb-3">
                    <!-- Profile Picture Display -->
                    <img id="profile_display"
                    src="{{ $user->image_url ? asset('storage/' . $user->image_url) : asset('images/default-profile.png') }}"
                    alt="Profile Picture"
                    class="rounded-circle img-fluid object-fit-cover border-gray-300 w-50 mx-auto  mb-2">


                    <!-- Upload Button -->
                    <div id="upload_wrapper" class="text-center mb-2">
                        <label for="profile_picture_input" class="fw-bold cursor-pointer">Change Profile Picture</label>
                        <input type="file" id="profile_picture_input" accept="image/*" style="display: none;">
                    </div>

                    <!-- Cropper + Confirm -->
                    <div id="crop_box" class="text-center" style="display: none;">
                        <img id="profile_preview" style="max-width: 300px;" />
                        <div class="mt-2">
                            <button type="button" class="btn btn-dark" onclick="confirmCrop()">Confirm</button>
                        </div>
                    </div>

                    <input type="hidden" name="cropped_image" id="cropped_image_input">
                </div>

                <div class="col-md-7">

                    <!-- Name Field -->
                    <div class="row mb-4 position-relative">
                        <div class="col-12 position-relative">
                            <label for="name"
                                class="bg-white px-2 position-absolute"
                                style="top: -0.6rem; left: 1rem; font-size: 0.85rem; z-index: 1;">
                                {{ __('Name') }}
                            </label>

                            <input id="name"
                                type="text"
                                class="form-control pt-3 @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                required autofocus autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="row mb-4 position-relative">
                        <div class="col-12 position-relative">
                            <label for="email"
                                class="bg-white px-2 position-absolute"
                                style="top: -0.6rem; left: 1rem; font-size: 0.85rem; z-index: 1;">
                                {{ __('Email') }}
                            </label>

                            <input id="email"
                                type="email"
                                class="form-control pt-3 @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="mb-0">
                                        {{ __('Your email address is unverified.') }}
                                        <button form="send-verification" class="btn btn-link p-0">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>
                                    @if (session('status') === 'verification-link-sent')
                                        <div class="alert alert-success mt-3 mb-0" role="alert">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Country Field -->
                    <div class="row mb-4 position-relative">
                        <div class="col-12 position-relative">
                            <label for="country"
                                class="bg-white px-2 position-absolute"
                                style="top: -1.1rem; left: 1rem; font-size: 0.85rem; z-index: 1;">
                                Country
                            </label>
                            <select id="country" name="country" class="form-control pt-4 select2">
                                @foreach(config('countries.list') as $country)
                                    <option value="{{ $country }}" {{ old('country', $user->country) == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Biography Field -->
                    <div class="row mb-4 position-relative">
                        <div class="col-12 position-relative">
                            <label for="biography"
                                class="bg-white px-2 position-absolute"
                                style="top: -0.6rem; left: 1rem; font-size: 0.85rem; z-index: 1;">
                                {{ __('Biography') }}
                            </label>

                            <textarea id="biography" name="biography"
                                class="form-control pt-3 @error('biography') is-invalid @enderror"
                                rows="5"
                                maxlength="255"
                                oninput="updateCharCount()"
                            >{{ old('biography', $user->biography) }}</textarea>

                            <small id="bio-char-count" class="text-muted d-block text-end mt-1">0 / 255</small>

                            @error('biography')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="row mb-0">
                        <div class="col-12 text-end d-flex justify-content-end gap-2">
                            <button class="btn btn-link text-dark p-0 m-0 text-decoration-none" onclick="toggleEdit(false)" type="button">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Profile') }}
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>
<script>
    function updateCharCount() {
        const textarea = document.getElementById('biography');
        const counter = document.getElementById('bio-char-count');
        counter.textContent = `${textarea.value.length} / 255`;
    }

    // Run on load
    document.addEventListener('DOMContentLoaded', updateCharCount);
</script>
<script src="{{ asset('js/cropper.js') }}"></script>
<script src="{{ asset('js/country.js') }}"></script>

