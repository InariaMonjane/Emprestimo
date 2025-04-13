<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(config('app.name')); ?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo e(url('/home')); ?>"><b><?php echo e(config('app.name')); ?></b></a>
    </div>

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('password.email')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    <?php if($errors->has('email')): ?>
                        <span class="error invalid-feedback"><?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="<?php echo e(route("login")); ?>">Login</a>
            </p>
            <p class="mb-0">
                <a href="<?php echo e(route("register")); ?>" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<script src="<?php echo e(mix('js/app.js')); ?>" defer></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\emprestimos\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>