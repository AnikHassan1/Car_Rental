<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="{{ asset('images/sign in.jfif') }}" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                {{--  <form>  --}}
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">

                    <label class="form-label" for="email">Email address</label>
                    <input type="email" id="email" class="form-control form-control-lg" />
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">

                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" class="form-control form-control-lg" />
                </div>

                <div class="d-flex justify-content-around align-items-center mb-4">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <div>
                            <h5>You are not member?
                              <a href="{{ url('/signup-page') }}"
                                  class="  w-50 text-bg-danger"> Sign Up</a>
                                 </h5>
                          </div>
                    </div>
                    <a href="{{ url('/forget-page') }}">Forgot password?</a>
                </div>






                <!-- Submit button -->
                <button onclick="Login()" class="btn btn-primary btn-lg btn-block">Sign in</button>

                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                </div>

                <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998"
                    href="#!" role="button">
                    <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                </a>
                <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="background-color: #55acee"
                    href="#!" role="button">
                    <i class="fab fa-twitter me-2"></i>Continue with Twitter</a>

                // {{--  </form>  --}}
            </div>
        </div>
    </div>
</section>

<script>
    async function Login() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length == 0) {
            errorToast("Email is Required");
        } else if (password.length == 0) {
            errorToast("password is Required");
        } else {
            let res = await axios.post('/login', {
                email: email,
                password: password
            });
            if (res.status === 200 && res.data['status'] === 'success' && res.data['url']==="/admin-page") {
                successToast(res.data['message']);
                setTimeout(() => {
                    window.location.href = "/admin-page";
                }, 1000);
            }else if(res.status === 200 && res.data['status'] === 'success' && res.data['url']==="/"){
                successToast(res.data['message']);
                setTimeout(() => {
                    window.location.href = "/";
                }, 1000);
            }
             else {
                errorToast(res.data['message']);
            }
        }
    }
</script>
