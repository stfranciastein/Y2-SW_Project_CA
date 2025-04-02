<div class="accordion mb-3" id="logoutAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="logoutHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#logoutCollapse" aria-expanded="false" aria-controls="logoutCollapse">
                {{ __('Log Out') }}
            </button>
        </h2>
        <div id="logoutCollapse" class="accordion-collapse collapse" aria-labelledby="logoutHeading" data-bs-parent="#logoutAccordion">
            <div class="accordion-body">
                <p>If you're done for now, click below to securely log out of your account.</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">{{ __('Log Out') }}</button>
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
