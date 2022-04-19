<?php
$log = "d-block";
$display = "d-none";
include 'include/header.php';
include 'include/traitement.php';
if (isset($_POST['create'])) {
    $db->SignUpUser($_POST['username'], $_POST['password'], $_POST['password_verify']);
}
?>
<main>


    <div class="container">
        <div class=" row d-flex align-items-center">
            <div class=" d-flex justify-content-around  flex-wrap flex-lg-nowrap mt-5 ">
                <div class="col-md-4">
                    <img class="img-fluid" src="registre.png" alt="login form">
                </div>
                <div class="col-12 col-md-6 pe-0 ">
                    <form id=" form" method="POST" onsubmit="return validateInputs()">
                        <h1 class="text-center text-black pt-5">Sign up</h1>


                        <div class="form-group mt-3">
                            <label for="username">Username</label><br>
                            <input type="text" name="username" id="username" class="form-control mt-2" placeholder="Username">
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
                            <input type="password" name="password" id="password1" class="form-control mt-2" placeholder="Password">
                            <div class="error"></div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password verify</label><br>
                            <input type="password" name="password_verify" id="password2" class="form-control mt-2" placeholder="Password verify">
                            <div class="error"></div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-md  text-white w-100 mt-2" name="create" id="create" value="Sign up" style="background-color :#455A64">
                        </div>
                        <div class="text-right mt-3">
                            <p> Already have an account ? <a href="authenticate.php" class="text-decoration-none">Login</a> here </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/ValidationUser.js"> </script>
</body>

</html>