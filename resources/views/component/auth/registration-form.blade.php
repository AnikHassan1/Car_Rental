<section class="vh-100">
    <div class="container card py-5 h-80 mt-5 shadow-lg">
        <div class="card-body">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="{{ asset('images/sign up.jfif') }}" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-4 col-lg-5 col-xl-4">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="Name">Name </label>
                        <input type="text" id="name" class="form-control form-control-lg"
                            placeholder="Your Name" />

                        <label class="form-label" for="email">Email </label>
                        <input type="email" id="email" class="form-control form-control-lg" placeholder="Email" />

                        <label class="form-label" for="password">Password </label>
                        <input type="text" id="password" class="form-control form-control-lg"
                            placeholder="Password" />

                        <button onclick="submit()" class="btn btn-primary btn-lg btn-block mt-2">Sign Up</button>
                        <div>
                          <h5>Already member?
                            <a href="{{ url('/login-page') }}"type="button"
                                class=" mt-3 w-50 text-bg-danger"> Login here</a>
                               </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    async function submit() {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        if (name.length === 0) {
            errorToast("Name is Required");
        } else if (email.length === 0) {
            errorToast("Email is Required");
        } else if (password.length === 0) {
            errorToast("password is Required");
        } else {
            let res = await axios.post('/signup', {
                name: name,
                email: email,
                password: password
            });
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(() => {
                    window.location.href="/login-page";
                }, 1000);
            } else {
                errorToast(res.data['message']);
            }
        }

    }
</script>
