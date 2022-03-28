<?php

$db = require  "../phpmysql/database.php";

$contacts = $conn->query("SELECT * FROM contacts");


?>

<?php require  "./partials/header.php"?>
    <div class="container pt-4 pt3">
       <div class="row">
            <?php if ($contacts->rowCount() == 0): ?>
                <div class="col-md-4 mx-auto">
                    <div class="card card-body text-center">
                        <p>No contacts saved yet</p>
                        <a href="add.php">Add One!</a>
                    </div>
                </div>
            <?php endif ?>
                    <?php foreach ($contacts as $constant):?>
                       <div class="col-md-4 mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h3 class="card-title text-capitalize"><?= $constant ["name"]?></h3>
                                <p class="m-2"><?= $constant ["phone_nober"]?></p>
                                <a href="./edite.php?id=<?= $constant["id"]?>" class="btn btn-secondary mb-2">Edit Contact</a>
                                <a href="./delete.php?id=<?= $constant["id"]?>" class="btn btn-danger mb-2">Delete Contact</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>    

        </div>
    </div>

<?php require "./partials/footer.php"?>