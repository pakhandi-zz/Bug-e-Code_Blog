<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Microdata markup added by Google Structured Data Markup Helper. -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>
    <?php include "include/blog_title_tab.php" ?>
</title>
<style type="text/css">

</style>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<link href="css/basic_common.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
 var RecaptchaOptions = 
 {
    theme : 'blackglass'
 };
 </script>
<style>


	#comment_box
	{
		padding: 2px;
		padding-left: 10px;
		padding-right: 10px;
	}

	#button1id
	{
		
	}

	#post_id
	{
		display: none;
	}
  #title_box
  {
    padding: 10px;
  }
      
</style>
</head>
<body>
<?php   
        include "include/pass.php";
        $conn = $passcode;
        $curr = $_GET['page'];
        $calc = ($curr)*5;
        $pid  = $_GET['pid'];
        if(!isset($_GET['pid']))
          $pid=101;
        $qw = "SELECT * FROM blog WHERE id=".$pid.";";
        $result = mysqli_query($conn,$qw);
        $row = mysqli_fetch_array($result);
?>
<div class="container">
  <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><?php include "include/blog_logo.php" ?><small>&nbsp;&nbsp;<?php include "include/blog_sub_logo.php" ?></small></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="unplugged.php">Personal Blog</a></li>
            <li><a href="http://tools.bugecode.com">Tools</a></li>
            <li><a href="about/">About</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div id="major">
        <div class="jumbotron" id="left_group">
        
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title" id="title_box"><?php echo $row['title'] ?>
                          <span class="label label-default" id="title_time">
                            <?php echo $row['timest']; ?>
                          </span>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <span class="label label-default" id="title_time">
                            <a href="<?php echo "search.php?tag=".$row['tag']; ?>" >
                              <b><u><?php echo "Tag : ".$row['tag']; ?></u></b>
                            </a>
                          </span>
                      </h3>
                    </div>
                    <div itemscope itemtype="http://schema.org/Article" class="panel-body">
                      <span itemprop="articleSection">
                        <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                                <span itemprop="name">
                                  <?php echo $row['post'] ?>
                                </span>
                        </span>
                      </span>
                    </div>
                </div>

                <div class="panel panel-danger">
                	<div class="panel-heading">
                		<h3 class="panel-title">Comments :</h3>
                	</div>
                </div>

                <div class="well">
                
                <?php
                $t=time();
                $btn_clrs = array("success", "info", "warning", "danger");
                $qw="SELECT * FROM blog_comments WHERE pid=".$pid." ORDER BY timest;";
                $result=mysqli_query($conn,$qw);

                date_default_timezone_set('Asia/Kolkata');
  				$date=date("G:i - m/d/y");
  				$i=0;
              while($row=mysqli_fetch_array($result))
              { 
              		$i++;
              		$i=$i%4;
              	?>

                <div class="panel panel-<?php echo $btn_clrs[$i]; ?>">
                    <div class="panel-heading">
                      <h5 class="panel-title"><?php echo $row['commentor']." <i>commented</i>" ?>
                          <span class="label label-default" id="title_time">
                            <?php echo $row['date_i']; ?>
                          </span>
                      </h5>
                    </div>
                    <div class="panel-body" id="comment_box">
                      <?php 

                              echo $row['comment'];
      
                      ?>
                    </div>
                </div>

       <?php  
              }

            ?>
            </div>

            <div class="well">
            <form action="blog_add_comment.php" method="POST" enctype="multipart/form-data">
              <fieldset>
            	<div class="input-group">
				  <span class="input-group-addon">Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				  <input type="text" class="form-control" placeholder="Name" id="uname" name="uname">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Mail-id : &nbsp;&nbsp;&nbsp;&nbsp;</span>
				  <input type="email" class="form-control" placeholder="Email-id" id="umail" name="umail">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Comment : </span>
				  <input type="text" class="form-control" placeholder="Comment" id="ucomment" name="ucomment">
				</div>
					<input type="text" id="post_id" class="form-control" name="pid" value="<?php echo $pid; ?>" readonly>
				<br>
				</p><label class=" control-label" for="textarea">You are not a bot ryt? :</label>
	            <center><div class="">
	              <?php require_once('recaptchalib.php');
	              $publickey = "XXXXXXXX"; // you got this from the signup page
	              echo recaptcha_get_html($publickey); ?>
	            </div></center>
	            <br>
				<center>
					<button id="button1id" name="button1id" class="btn btn-success" type="submit">Comment!!</button>
				</center>
			  </fieldset>
            </form>
            </div>

            <br><br><br>

                <center>
                    <nav>
                      <ul class="pager">
                        <?php
                            $opid=$pid-1;
                            $npid=$pid+1;
                            if($pid==101)
                            {
                        ?>
                                <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
                      <?php }
                            else
                            {
                        ?>
                                <li class="previous"><a href="<?php echo "post.php?pid=".$opid; ?>"><span aria-hidden="true">&larr;</span> Older</a></li>
                      <?php }
                        ?>  

                        <li class="next"><a href="<?php echo "post.php?pid=".$npid; ?>">Newer <span aria-hidden="true">&rarr;</span></a></li>
                      </ul>
                    </nav>
                </center>
      </div>

      <div class="jumbotron" id="right_group">
        <?php
            $qw = "SELECT * FROM tags ORDER BY posts DESC LIMIT 0, 5;";
            $result = mysqli_query($conn,$qw);
            $row = mysqli_fetch_array($result);
        ?>
            <ul class="list-group">

                <?php
                    for($i=0; $i<5; $i++)
                    { ?>

                        <a href="<?php echo "search.php?tag=".$row['tags']; ?>">
                          <li class="list-group-item">
                              <span class="badge"><?php echo $row['posts']; ?></span>
                                  <?php echo $row['tags']; $row = mysqli_fetch_array($result); ?>
                          </li>
                        </a>

            <?php   }

                ?>
            </ul>
      </div>

            
          
    </div>

</div>
</body>
</html>