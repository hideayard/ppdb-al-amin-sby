<div class="container-fluid py-5 bg-secondary" style="height: 100vh;">
<?php if($this->session->flashdata('message')){
    echo '<div class="alert alert-danger">'.$this->session->flashdata('message').'</div>';
    }
    ?>
    <form class="mt-5" action="<?= base_url('Login/act_login'); ?>" method="post" style="width: 100%; max-width: 420px; padding: 15px; margin: auto;">
        <div class="text-center mb-4">
            <img src="http://ppdbalaminsby.web.id//assets/img/yysn.png" height="72" width="72" class="mb-4 rounded">
            <h1 class="h3 mb-3 font-weight-normal text-white ">Silahkan Mengisi Data Login</h1>
        </div>
        <div class="form-label-group">
            <input type="text" id="inputemail" placeholder="Username" name="username" class="form-control" required autofocus>
            <label for="inputemail"></label>
        </div>
         <div class="form-label-group">
            <input type="password" id="inputpassword" placeholder="Password" name="password" class="form-control" required autofocus>
            <label for="inputpassword"></label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <p class="mt-5 mb-3 text-white text-center">&copy; PPDB Al-Amin Surabaya 2021</p>
    </form>
</div>