<?php
$display = "d-block";
$log = "d-none";

include 'include/header.php';
include 'include/traitement.php';

if (isset($_POST['add'])) {
    $dbC->addContact($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['adresse']);
}
if (isset($_GET['id'])) {
    $dbC->delete($_GET['id']);
}
if (isset($_POST['edit'])) {
    $dbC->update($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['adresse']);
}
if (isset($_GET['edit'])) {
    $modal = "display:block;";
    $contact = $dbC->affichUpdate($_GET['edit']);
} else {
    $modal = "display:none;";
}
$lignes = $db->affichage();
//
?>

<div class="container-fluid">
    <div class="row">
        <div class="mt-5 d-flex">
            <h3>Add contact</h3>
        </div>
        <?php
        if (isset($_GET['pageerror'])) echo "<div class='text-danger'>{$_GET['pageerror']}</div>";
        ?>
        <div class="mt-5">
            <div class="d-flex justify-content-between px-2">
                <h1>Contact List </h1>
                <button class="btn btn-primary fs-5 px-4" data-bs-toggle="modal" data-bs-target="#creatmodal">Add new contact </button>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-hover table-striped  mt-2">
                    <?php
                    if ($lignes->rowCount() < 1) {
                        echo "<div class='fs-5'> no results.</div>";
                    } else {
                        foreach ($lignes as $ligne) {
                    ?>

                            <tr class="text-nowrap align-middle">
                                <td scope="row" class="ps-5"> <?php echo $ligne['name']; ?></td>
                                <td><?php echo $ligne['email'];  ?></td>
                                <td><?php echo $ligne['phone']; ?></td>
                                <td><?php echo $ligne['Adress']; ?></td>
                                <td><a href="contact.php?edit=<?php echo $ligne['id']; ?>" class="btn">Edit <i class="fa fa-pen text-dark ps-2"></i> </a> </td>
                                <td><a href="contact.php?id=<?php echo $ligne['id']; ?>" class="btn">delete <i class="fa fa-trash text-dark ps-2"></i> </a> </td>
                            </tr>

                    <?php }
                    } ?>


                </table>
            </div>
        </div>

    </div>

</div>
<!-- model Edit contact -->
<div class="modal" id="myModal" style="<?php echo $modal; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <form class="p-4" method="POST" action="#" id="form" onsubmit="return validateInputs()">
                    <input type="hidden" name="id" value="<?php if (isset($contact['id'])) echo $contact['id']; ?>">

                    <p class="text-uppercase h4 text-center fw-bold"> Edit Contact </p>

                    <div class="form-group mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Entre your name" value="<?php if (isset($contact['name'])) echo $contact['name']; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Entre your phone" value="<?php if (isset($contact['phone'])) echo $contact['phone']; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Entre your email" value="<?php if (isset($contact['email'])) echo $contact['email']; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">adresse</label>
                        <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Entre your adresse" value="<?php if (isset($contact['Adress'])) echo $contact['Adress']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3" name="edit">Edit</button>
                    <a href="contact.php" class="btn btn-secondary w-100">Go back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end edit contact -->

<!-- MODAL CONFIRMATION -->
<!-- <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confiramtion</h5>
                <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="#">
                <input type="hidden" name="id_delete" id="id_delete" value="" />

                <div class="modal-body">
                    Do you really want to delete?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="delete" name="delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!-- MODAL CONFIRMATION -->


<!-- model add -->
<div class="modal" id="creatmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="form" method="POST" onsubmit="return validateContact();">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="mt-2">Add Contact</h5>
                        <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="fs-5 fw-bold">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-6 form-group">
                            <label for="username">Name</label>
                            <input type="text" name="name" id="namee" class="form-control mt-2" placeholder="Enter name">
                            <div class="error">
                                <?php
                                if (isset($_GET['error'])) {
                                    echo $_GET['error'];
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-6 form-group">
                            <label for="phone">phone</label>
                            <input type="number" name="phone" id="phonee" class="form-control mt-2" placeholder=" Enter phone">
                            <div class="error">
                                <?php
                                if (isset($_GET['error'])) {
                                    echo $_GET['error'];
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" id="emaile" class="form-control mt-2" placeholder=" Enter email">
                        <div class="error">
                            <?php
                            if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            }
                            ?>
                        </div>

                    </div>

                    <div class="form-group ">
                        <label for="adresse">adresse</label>
                        <textarea type="text" id="adressee" name="adresse" class="form-control md-textarea mt-2" placeholder="Enter adresse"></textarea>
                        <div class="error">
                            <?php
                            if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary btn-md mt-2 px-3" id="add" name="add" value="add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/validationContact.js"></script>

</body>

</html>