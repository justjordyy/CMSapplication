<a class="btn btn-success" href="./adminaddpage.php" role="button">add page</a>

<table class="table">
    <tr>
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
