<!DOCTYPE html>
<html>

  <head>
    <title>eSwap</title>
    <meta charset="utf-8" />
    <link href="css/top.css" type="text/css" rel="stylesheet" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
  </head>
 
<body>
	<div id="top_banner">
		<div id="up">

        <div id="login">
            <?php
                session_start();
                if(empty($_SESSION["loginname"]))
                {

             ?>
            <a href="sign_in_form.php">sign in</a>|
            <a href="sign_up_form.php">sign up</a>
            <?php
                }
                else{
                        $firstname=$_SESSION["loginname"];
            ?>
            <a href="information.php">choose your operation,<?=$firstname?> </a>|
            <a href="logout.php">logout</a>
            <?php
                }
            ?>
            

        </div><!--login-->
        <form method="get" action="index.php">
            <div id="search">
                <input name="search" type="text" required="required"/>
                <input class="button" type="submit" value="search" title="search"/>
            </div>
        </form>
		
		</div><!--up-->

        <div id="down">
                <ul class="nav"> 
                     <li><a href="index.php?search=clothes">clothes</a> 
                    </li> 
                    <li><a href="index.php?search=shoes">shoes</a>   
                    </li> 
                    <li><a href="index.php?search=bag">bag</a>    
                    </li> 
                    <li><a href="index.php?search=cosmetics">cosmetics</a>    
                    </li> 
                    <li class="eswap"><a href="index.php">eswap</a>
                    </li> 
                    <li><a href="index.php?search=jewelry">jewelry</a> 
                    </li> 
                    <li><a href="index.php?search=book">book</a>  
                    </li> 
                    <li><a href="index.php?search=electronics">electronics</a>    
                    </li> 
                    <li><a href="index.php?search=furniture">furniture</a>    
                    </li> 
                </ul> 
            </div><!--downr-->
        </div><!--down-->
	</div><!--top_banner-->

    <div id="content">
        
        <div id="title"> 
            <?php
                if(empty($_GET["sort"]))
                {

            ?>
            Gallery Featured
            <?php
                    if (!empty($_GET["search"]))
                    {
                        $search = $_GET["search"];
            ?>
                        <a href="index.php?search=<?=$search?>&sort=1">sort by time</a>
            <?php
                    }
                    else
                    {
            ?>
                        <a href="index.php?sort=1">sort by time</a>
            <?php
                    }
                }
                else
                {
            ?>
                    Display In Order
            <?php
                }
            ?>
        </div>
        <hr/>
        
         <?php
            if(empty($_GET["sort"]))
            {
                
                $array=glob("eswap/*");
                for($i=0;$i<count($array);$i++)
                {
                    $name=basename($array[$i]);
                    $array1=glob("eswap/$name/goods/*");
                    foreach ($array1 as $array1 => $val) 
                    {
                        $j=basename($val);
                        $thing=file("eswap/$name/goods/$j/inf.txt",FILE_IGNORE_NEW_LINES);  
                        if (!empty($_GET["search"]))
                        {
                            $search=$_GET["search"];
                            if(strpos($thing[0], $search) === false&&$search!=$thing[2]) continue;
                        }
                        $information=file("eswap/$name/goods/$j/inf.txt",FILE_IGNORE_NEW_LINES);    
         ?>                   
                        <a href="goods.php?i=<?=$j?>&name=<?=$name?>"> 
                            <img src="eswap/<?=$name?>/goods/<?=$j?>/picture/picture1.png" />
                            <div class="info"><br>
                                    he wants a <?=$information[3]?></br>
                                    time:<?=$information[4]?><br>
                                    <strong>by <?=$name?></strong>
                            </div>
                        </a>
        <?php
                    }     
                }
                                  
            } 
            else
            {
                $upload=file("upload.txt",FILE_IGNORE_NEW_LINES);
                $n=count($upload);
                $h=0;
                
                for($i=$n-1;$i>0;$i=$i-2)
                {   
                    $t=$i-1;
                    if (file_exists("eswap/$upload[$t]/goods/$upload[$i]/inf.txt"))
                    {
                        $thing=file("eswap/$upload[$t]/goods/$upload[$i]/inf.txt",FILE_IGNORE_NEW_LINES);  
                        if (!empty($_GET["search"]))
                        {
                            $search=$_GET["search"];                              
                            if(strpos($thing[0], $search) === false&&$search!=$thing[2]) continue;
                        }
                        $information=file("eswap/$upload[$t]/goods/$upload[$i]/inf.txt",FILE_IGNORE_NEW_LINES);        
        ?>

                <a href="goods.php?i=<?=$upload[$i]?>&name=<?=$upload[$i-1]?>"> 
                <img src="eswap/<?=$upload[$i-1]?>/goods/<?=$upload[$i]?>/picture/picture1.png" />
                    <div class="info"><br>
                            by<?=$upload[$t]?><br>
                            he/she wants a <?=$information[3]?></br>
                            time:<?=$information[4]?>
                     </div>
        <?php
                    }
                }
            }
        ?>

        </div><!--content-->
    <div id="bottom">

            <p><strong>LOCATION:</strong> 92 Weijin Road, Tianjin,China    </p>
            <p><strong>CONTACTS:</strong> 123-456-7890, swap@tju.cn</p>
            <p><strong>Design By</strong> YU Qingjie, MENG Tongfu, CEN Shuihua</p>
    </div>
    <div class="copyright"><strong>copyright</strong>:2018 &copy all rights reserved</div>
</body>
</html>