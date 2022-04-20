<?php
$display = "d-block";
$log = "d-none";
include 'include/header.php';
include 'include/traitement.php';
if (isset($_SESSION['user_id'])) {
?>

    <div class="container  ps-5 d-flex flex-column align-items-start justify-content-center" style="height: 90%;">
        <h1 class="mb-5"> Welcome, <?= $_SESSION['user_username']; ?> !</h1>
        <p class="h3 mb-3"> Your profile : </p>

        <table class="table mt-2">

            <tr>
                <th scope="row">Username :</th>
                <td> <?= $_SESSION['user_username']; ?></td>
            </tr>

            <tr>
                <th scope="row">Signup date :</th>
                <td> <?= $_SESSION['user_date'] ?></td>
            </tr>

            <tr>
                <th scope="row">Last login : </th>
                <td> <?= $_SESSION['date'] ?></td>
            </tr>

        </table>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php } else {
    header("Location:index.php");
}
?>
</body>

</html>