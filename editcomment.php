
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <!--    <script src="/js/jquery.validate.min.js"></script>-->
    <script src="/js/main.js"></script>
</head>
<body>
<?php
    require_once 'db.class.php';
    if(isset($_GET['id']) & !empty($_GET['id'])) {
        //select query
        $id = $_GET['id'];
        $connection = new db();
        $selsql = "SELECT * FROM comments WHERE id=$id";
        $selres = mysqli_query($connection->connect(), $selsql);
        $selr = mysqli_fetch_assoc($selres);
    }
    ?>
<div class="panel panel-default">
    <div class="panel-body">
        <form method="post" action="/ajax/edit_comment.php" class="send">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Title" value="<?php echo $selr['name']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">EMail</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?php echo $selr['email']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Comment</label>
                <textarea name="subject" class="form-control" rows="6"><?php echo $selr['subject']; ?></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/png,image/jpg" value="<?php echo $selr['file']; ?>">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Post Status</label>
                        <select name="status"  class="form-control">
                            <option value="draft" <?php if($selr['status'] == "draft"){ echo "selected"; } ?>>Draft</option>
                            <option value="rejected" <?php if($selr['status'] == "rejected"){ echo "selected"; } ?>>Rejected</option>
                            <option value="published" <?php if($selr['status'] == "published"){ echo "selected"; } ?>>Published</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" id="id" value="<?php echo $selr['id']; ?>">
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
</body>
</html>