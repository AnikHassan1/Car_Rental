<section class="vh-100">
    <div class="container card py-5 h-80 mt-5 shadow-lg">
        <div class="card-body">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-4 col-lg-5 col-xl-4">
                    <div class="card-body">
                        <h4>SET NEW PASSWORD</h4>
                        <br />
                        <label>New Password</label>
                        <input id="password" placeholder="New Password" class="form-control" type="password" />
                        <br />
                        <label>Confirm Password</label>
                        <input id="re-pass" placeholder="Confirm Password" class="form-control" type="password" />
                        <br />
                        <button onclick="forgetPassword()" class="btn w-100 bg-gradient-primary">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    async function forgetPassword() {
        let password = document.getElementById('password').value;
        let repassword = document.getElementById('re-pass').value;

        if (password.length === 0) {
            errorToast('Password is required')
        } else if (repassword.length === 0) {
            errorToast('Confirm Password is required')
        } else if (password !== repassword) {
            errorToast('Password and Confirm Password must be same')
        } else {

            let res = await axios.post('/passwordForget', {
                password: password
            });

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function() {
                    window.location.href = "/login-page";
                }, 1000);
            } else {
                errorToast(res.data['message']);
            }
        }

    }
</script>
