<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <h3 class="mb-5">Sign in</h3>
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>
                            <form action="<?= base_url('/login') ?>" method="post">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" id="username" class="form-control form-control-lg" name="username" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" />
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>