<?php if(isset($_GET['createdpage'])) { ?>
    <div class="alert alert-success alert-dismissible fade show popsize" role="alert">
        page created succesfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
<?php } ?>
<?php if(isset($_GET['updatedpage'])) { ?>
    <div class="alert alert-success alert-dismissible fade show popsize" role="alert">
        page updated succesfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
<?php } ?>
<?php if(isset($_GET['deletedpage'])) { ?>
    <div class="alert alert-success alert-dismissible fade show popsize" role="alert">
        page delted succesfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
<?php } ?>
<div class="alertsize">
    <a class="btn btn-success" href="./adminaddpage.php" role="button">add page</a>
</div>
<hr class="pagelisthr">
<div class="pageslist">
    <table class="table">
        <tr>
            <th>Page ID</th>
            <th>Page name</th>
            <th>Visibility</th>
            <th>Admin page</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
        $pages->returnPagesInfo();
        ?>
    </table>
</div>







<div class="modal" id="deletePageModal" tabindex="-1" aria-labelledby="deletePageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePageModalLabel">Log out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to <strong>permanently</strong> this page?</p>
                <form id="deletePageForm" method="POST">
                    <button type="submit" name="deletePageForm" class="btn btn-light">Delete</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php if(isset($_GET['delete'])) {
    echo "<script>
    var myModal = new bootstrap.Modal(document.getElementById('deletePageModal'))
        var modal = document.getElementById('deletePageModal')
        myModal.show();
    </script>";
}
?>