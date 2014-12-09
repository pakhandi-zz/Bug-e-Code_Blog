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

<?php include "include/include_fb.php"; ?>
<?php   
        include "include/pass.php";
        $search_ele = $_POST['search_ele'];
        $conn = $passcode;
        $curr = $_GET['page'];
        $calc = ($curr)*5;
        $qw = "SELECT * FROM blog WHERE title like '%$search_ele%' OR post like '%$search_ele%' OR tag like '%$search_ele%' OR adv_tags like '%$search_ele%' ORDER BY priority DESC";

        $result = mysqli_query($conn,$qw);
        $row = mysqli_fetch_array($result);

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
            <li id="secrets_tab"><a href="tweets.php"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> &nbsp;Tweets</a></li>
            <li id="ind_tab"><a href="ind.php"><span class="glyphicon glyphicon-road" aria-hidden="true"></span><span class="badge counter" id="personal_counter"><?php echo $count_ind ?></span> &nbsp;Issues n fixes</a></li>
            <li id="archive_tab"><a href="archive.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> &nbsp;Archive</a></li>
            <li><a href="about/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;About</a></li>
            <!-- <li id="google_search">
                <script>
                    (function() {
                      var cx = '001385081325609340139:nd7iyqrjuey';
                      var gcse = document.createElement('script');
                      gcse.type = 'text/javascript';
                      gcse.async = true;
                      gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                          '//www.google.com/cse/cse.js?cx=' + cx;
                      var s = document.getElementsByTagName('script')[0];
                      s.parentNode.insertBefore(gcse, s);
                    })();
                  </script>
                  <gcse:search>Search</gcse:search>
            </li>  -->
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
            	$i=-1;
              for( ; ; )
              { 
              		$i++;
                  if ($row==NULL)
                    break;
                ?>

                <div class="panel panel-<?php echo $btn_clrs[$i%5]; ?>">
                    <div class="panel-heading">
                    <a href="<?php echo "post.php?pid=".$row['id']; ?>">
                      <h3 class="panel-title"><b><?php echo $row['title'] ?></b>
                    </a>
                          <span class="label label-default" id="title_time">
                            <?php echo $row['timest']; ?>
                          </span>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <span class="label label-default" id="title_time">
                            <a href="<?php echo "search.php?tag=".$row['tag']; ?>" >
                              <b><u><?php echo "Tag : ".$row['tag']; ?></u></b>
                            </a>
                          </span>
                          <br>
                          <span class="label label-default" id="title_time">
                          <?php if($row['category']=="tech")
                          			$link_category = "index.php";
                          		else if($row['category'] == "personal" )
                          			$link_category = "unplugged.php";
                          		else if($row['category'] == "ind" )
                          			$link_category = "ind.php"
                          ?>
                            <a href="<?php echo $link_category; ?>" >
                              <b><u><?php echo "Category : ".$row['category']; ?></u></b>
                            </a>
                          </span>
                      </h3>
                    </div>
                    <div itemscope itemtype="http://schema.org/Article" class="panel-body">
                      <?php 

                              $curr_post = $row['post'];
                              $curr_post = strip_tags($curr_post);
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
                
                
      </div>

      <div class="jumbotron" id="right_group">

        <!--  Search Box  -->
            <div class="row" id="search_bar_box">
              <div class="col-lg-6" id="search_bar">
              <form method="POST" action="find.php">
                <div class="input-group">
                  
                  <input type="text" class="form-control" name="search_ele" placeholder="Search">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                  </span>
                  
                </div><!-- /input-group -->
                </form>
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
          <!--  End of Search Box -->

        <?php
            $qw = "SELECT * FROM tags WHERE category='tech' ORDER BY posts DESC LIMIT 0, 5;";
            $result = mysqli_query($conn,$qw);
            //$row = mysqli_fetch_array($result);
        ?>
            <ul class="list-group">

                <?php
                    while($row = mysqli_fetch_array($result))
                    { ?>

                        <a href="<?php echo "search.php?tag=".$row['tags']; ?>">
                          <li class="list-group-item">
                              <span class="badge" ><?php echo $row['posts']; ?></span>
                                  <b><?php echo $row['tags']; ?></b>
                          </li>
                        </a>

            <?php   }

                ?>
            </ul>

            <div class="well" id="blog_fb">
                <center><h4>Like & Share This blog on FB</h4>
                    <div class="fb-like" 
                       data-href="https://www.facebook.com/pages/Bug-e-Code/758305594205082" 
                       data-width="200" 
                       data-layout="standard" 
                       data-action="like" 
                       data-show-faces="true" 
                       data-share="true">
                    </div>
                </center>
            </div>
            
            <div class="well" id="related_posts" itemscope itemtype="http://schema.org/Article">
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
                              <span>
                                  <b><?php echo substr($row['title'],0,38).".."."<br>"; ?></b>
                              </span>
                          </li>
                        </a>

            <?php   }

                ?>
            </div>
            
      </div>

                  
          
    </div>

</div>
</body>
</html>
<?php include "include/gao.php"; ?>
