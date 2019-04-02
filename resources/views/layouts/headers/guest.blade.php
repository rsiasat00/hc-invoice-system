<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    @if(Route::currentRouteName() == 'password.request')
                        <h1 class="text-white text-capitalize">Forgot Password?</h1>
                    @elseif(Route::currentRouteName() == 'password.reset')
                        <h1 class="text-white text-capitalize">Password Reset</h1>
                    @else
                        <h1 class="text-white text-capitalize">{{Route::currentRouteName()}}</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>