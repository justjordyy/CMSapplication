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
