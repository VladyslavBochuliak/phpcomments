
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
<div class="container">
    <div class="row">
        <h3>All comments</h3>
    </div>
    <div class="comments col-md-6">
    <?php require_once 'main.class.php';
        $comments = new main();
        echo $comments->show_comment();
    ?>
    </div>

    <div class="row">
        <h3>Add comment</h3>
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="widget-area no-padding blank">
                <div class="status-upload">
                    <form method="post" action="/ajax/add_comment.php" class="send" enctype="multipart/form-data">
                    	<input type="email" name="email" required="required" placeholder="email">
                    	<input type="text" name="name" placeholder="Name">
                    	<input type="file" name="fileToUpload" id="fileToUpload" accept="image/png,image/jpg">
                        <textarea name="subject" placeholder="What are you doing right now?" ></textarea>
                        <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Submit</button>
                    </form>
                </div><!-- Status Upload  -->
            </div><!-- Widget Area -->
        </div>

    </div>
</div>
</body>
</html>
