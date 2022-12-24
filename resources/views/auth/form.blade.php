<form action="{{ route('login.action') }}" class="form-validate is-alter" autocomplete="off" method="POST">
    @csrf
    <div class="form-group">
        <div class="form-label-group">
            <label class="form-label" for="email-address">Username</label>
        </div>
        <div class="form-control-wrap">
            <input autocomplete="off" type="text" class="form-control form-control-lg" required id="email-address"
                placeholder="Silahkan masukan username" name="username">
        </div>
    </div><!-- .form-group -->
    <div class="form-group">
        <div class="form-label-group">
            <label class="form-label" for="password">Password</label>
        </div>
        <div class="form-control-wrap">
            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg"
                data-target="password">
                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
            </a>
            <input autocomplete="new-password" name="password" type="password" class="form-control form-control-lg"
                required id="password" placeholder="Silahkan masukan password">
        </div>
    </div><!-- .form-group -->
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
    </div>
</form><!-- form -->
