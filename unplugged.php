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
      
</style>
</head>
<body>
<?php   
        include "include/pass.php";
        $conn = $passcode;
        $curr = $_GET['page'];
        $calc = ($curr)*5;
        $qw = "SELECT * FROM blog WHERE CATEGORY='personal' ORDER BY id DESC LIMIT ".$calc.", 5;";
        
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
            <li class="active"><a href="#">Personal Blog</a></li>
            <li><a href="http://tools.bugecode.com">Tools</a></li>
            <li><a href="about/">About</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <?php

        $btn_clrs = array("primary", "success", "info", "warning", "danger");

    ?>
    <div id="major">
        <div class="jumbotron" id="left_group">
            <?php

              for($i=0; $i<5; $i++)
              { ?>

                <div class="panel panel-<?php echo $btn_clrs[$i]; ?>">
                    <div class="panel-heading">
                      <h3 class="panel-title"><?php echo $row['title'] ?>
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
                      <?php 

                              $curr_post = $row['post'];
                            
                              echo substr($curr_post,0,100);
                              
                      ?>
                      <a href="<?php echo "post.php?pid=".$row['id']; ?>">
                      <span class="label label-info">..Read More</span>
                      </a>
                    </div>
                </div>

       <?php  $row = mysqli_fetch_array($result);
              }

            ?>
                
                <center>
                <div class="pagination pagination-centered" id="pagination_box">
                  <ul>
                    <li><a href="unplugged.php">&laquo;</a></li>
                  <?php
                      $start = max($curr-2,1);
                      $end = max($curr+2,5);

                      $i=$start;
                      for( ; $i<=$end; $i++)
                      {
                          if($i==$curr+1)
                          {
                              echo "<li class=\"disabled\"><a href=\"#\">".$i."</li>";
                          }
                          else
                          {
                              $j=$i-1;
                              echo "<li><a href=\"unplugged.php?page=".$j."\">".$i."</a></li>";
                          }
                      }

                  ?>
                    <li><a href="<?php $temp=$curr+1; echo "unplugged.php?page=".$temp; ?>">&raquo;</a></li>
                 </ul>
                </div>
                </center>
      </div>

      <div class="jumbotron" id="right_group">
        <?php
            $qw = "SELECT * FROM tags WHERE category='personal' ORDER BY posts DESC LIMIT 0, 5;";
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56207835-2', 'auto');
  ga('send', 'pageview');

</script>