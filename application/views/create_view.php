<div class="container" style="margin-top: 100px;" >
    <div class="row">
    </div>

    <form action="store" method="post" id="createForm" enctype="multipart/form-data">
        <h3 style="text-align: center;">Add new article</h3>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Input your task">
        </div>
        <div class="form-group">
            <label for="content">content</label>
            <input type="text" class="form-control" name="content" id="content" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" accept="image/*" class="form-control" name="photo" id="photo">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" id="category">
                <option value="Technology">Technology</option>
                <option value="Fashion">Fashion</option>
                <option value="Sports">Sports</option>
                <option value="Food">Food</option>
                <option value="Travel">Travel</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
<script src="/js/validate.js"></script>