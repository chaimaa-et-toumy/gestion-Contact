<?php
$log = "d-block";
$display = "d-none";
include 'include/header.php';
include 'include/traitement.php';
if (isset($_POST['submit'])) {
    $db->loginUser($_POST['username'], $_POST['password']);
}
?>
<main>
    <div id="login">
        <div class="container">
            <div class=" row d-flex align-items-center">
                <div class=" d-flex justify-content-between  flex-wrap flex-lg-nowrap mt-5 ">
                    <div class="d-none d-md-block pe-5">
                        <img class="img-fluid" src="login.svg" alt="login form" style="width:580px ; height: 463px;">
                    </div>
                    <div class="col-12 col-md-6 pe-0 ps-5 mt-4">
                        <form class="form" method="POST">
                            <h1 class="text-center text-black pt-5">Authenticate</h1>
                            <div class="form-group mt-3">
                                <label for="username">Username</label><br>
                                <input type="text" name="username" id="username" class="form-control mt-2 " placeholder="Username">
                                <div class="error">
                                    <?php
                                    if (isset($_GET['error'])) {
                                        echo $_GET['error'];
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label><br>
                                <input type="password" name="password" id="password" class="form-control  mt-2" placeholder="Password">
                                <div class="error">
                                    <?php
                                    if (isset($_GET['error'])) {
                                        echo $_GET['error'];
                                    } ?>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" name="submit" class="btn btn-md w-100 text-white mt-2" style="background-color: #2F2E41;" value="login">
                            </div>
                            <div class="text-right mt-3">
                                <p>No Account ? <a href="inscription.php" class="text-decoration-none" style="color: #3F3D56;">Sign up here</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/ValidationUser.js"></script>
</body>

</html>