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
<style>
#blog_fb
{
    position: fixed;
    padding: 5px;
    top: 10px;
    right: 60px;
}
#twitter-widget-0
{
    width: 100% !important;
}
</style>
</head>
<body>
<?php include "include/include_fb.php"; ?>
<?php   
        include "include/pass.php";
        $conn = $passcode;
        $curr = $_GET['page'];
        $calc = ($curr)*5;

        include "include/get_count.php";
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
            <li id="home_tab"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span><span class="badge counter" id="home_counter"><?php echo $count_home; ?></span> &nbsp;Home</a></li>
            <li id="personal_tab"><a href="unplugged.php"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span><span class="badge counter" id="personal_counter"><?php echo $count_personal ?></span> &nbsp;Personal Blog</a></li>
            <li id="tool_tab"><a href="http://tools.bugecode.com" target="_blank"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> &nbsp;Tools</a></li>
            <li class="active" id="secrets_tab"><a href="#"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> &nbsp;Tweets</a></li>
            <li id="ind_tab"><a href="ind.php"><span class="glyphicon glyphicon-road" aria-hidden="true"></span><span class="badge counter" id="personal_counter"><?php echo $count_ind ?></span> &nbsp;Issues n Development</a></li>
            <li id="archive_tab"><a href="archive.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> &nbsp;Archive</a></li>
            <li><a href="about/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;About</a></li>
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <?php

        $btn_clrs = array("primary", "success", "info", "warning", "danger");

    ?>
    <div id="major">
        <div class="jumbotron" id="left_group">

            <div class="well">
            
                <a class="twitter-timeline" href="https://twitter.com/AsimKPrasad" width="100%" data-widget-id="537197823502987264">Tweets by @AsimKPrasad</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

            </div>
                
      </div>

      <div class="jumbotron" id="right_group">
        <?php
            $qw = "SELECT * FROM tags ORDER BY posts DESC LIMIT 0, 5;";
            $result = mysqli_query($conn,$qw);
            //$row = mysqli_fetch_array($result);
        ?>
            <ul class="list-group">

                <?php
                    while($row = mysqli_fetch_array($result))
                    { ?>

                        <a href="<?php echo "search.php?tag=".$row['tags']; ?>">
                          <li class="list-group-item">
                              <span class="badge"><?php echo $row['posts']; ?></span>
                                  <b><?php echo $row['tags']; ?></b>
                          </li>
                        </a>

            <?php   }

                ?>
            </ul>
            
            <div class="well" id="related_posts">
            <center><h4><i>Featured Posts : </i></h4></center>
                <?php
                    $qw = "SELECT * FROM blog ORDER BY priority DESC LIMIT 0, 5;";
                    $result = mysqli_query($conn,$qw);
                    while($row = mysqli_fetch_array($result))
                    { 
                        if($row['id']==$pid)
                          continue;
                      ?>

                        <a href="<?php echo "post.php?pid=".$row['id']; ?>">
                          <li class="list-group-item">
                              <span class="badge"><?php echo $row['posts']; ?></span>
                                  <b><?php echo substr($row['title'],0,38).".."."<br>"; ?></b>
                          </li>
                        </a>

            <?php   }

                ?>
            </div>
            
      </div>

      <div class="well" id="blog_fb">
        <center><h4>Like & Share This blog on FB</h4>
        <div class="fb-like" 
           data-href="https://www.facebook.com/pages/Bug-e-Code/758305594205082" 
           data-width="200" 
           data-layout="button_count" 
           data-action="like" 
           data-show-faces="false" 
           data-share="true">
        </div>
        </center>
      </div>            
          
    </div>

</div>
</body>
</html>
<?php include "include/gao.php"; ?>
