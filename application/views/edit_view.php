<div class="container" style="margin-top: 100px;">
    <div class="row"></div>

    <form action="edit" method="post" id="createForm" enctype="multipart/form-data">

        <h3 style="text-align: center;">Edit the article</h3>
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" 
            aria-describedby="emailHelp" placeholder="Input your task" 
            value="<?php echo $data['title']; ?>">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" class="form-control" name="content" id="content" placeholder="Description" value="<?php echo $data['content']; ?>">
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" accept="image/*" class="form-control" name="photo"
             id="photo">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" id="category">
                <option value="Technology" <?php if($data['category_name'] == "Technology") echo "selected"; ?>>Technology</option>
                <option value="Fashion" <?php if($data['category_name'] == "Fashion") echo "selected"; ?>>Fashion</option>
                <option value="Sports" <?php if($data['category_name'] == "Sports") echo "selected"; ?>>Sports</option>
                <option value="Food" <?php if($data['category_name'] == "Food") echo "selected"; ?>>Food</option>
                <option value="Travel" <?php if($data['category_name'] == "Travel") echo "selected"; ?>>Travel</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</div>
<script src="/js/validate.js"></script>
