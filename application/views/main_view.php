<a href="main/create" id="createBTN" class="btn btn-primary rounded-circle">+</a>
<div class="container">
    <?php

    foreach ($data as $row) {
        $page = file_get_contents('application/views/templates/main_content.html');
        $page = str_replace("###TITLE###", $row['title'], $page);
        $page = str_replace("###CONTENT###", $row['content'], $page);
        $page = str_replace("###DATE###", $row['created_at'], $page);
        $page = str_replace("###CATEGORY###", $row['category_name'], $page);
        $page = str_replace("###IMG###", $row['photo'], $page);
        $editButton = "<a href='main/edit/{$row['id']}' class='crudBtn btn btn-primary'>Edit</a>";
        $deleteButton = "<a href='#' class='crudBtn btn btn-danger' onclick='confirmDelete({$row['id']})'>Delete</a>";;

        $page = str_replace("###EDIT###", $editButton, $page);
        $page = str_replace("###DELETE###", $deleteButton, $page);
        echo $page;
    }
    ?>
</div>
<script src="/js/confirm_delete.js">
   
</script>