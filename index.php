<?php

#Data Table for locations of images on the server

#The three main (green) "Access Buttons" at the homepage
$left = "'left.png'"; #Aspect Ratio 3:1 Light Green
$right = "'right.png'"; #Aspect Ratio 1:1 Dark Green
$left_dark = "'left_dark.png'"; #$left with brightness -25; used when mouse is hovering
$right_dark = "'right_dark.png'"; #$right with brightness -25; used when mouse is hovering

#That one weird bar thing
$bar = "'bar.png'"; #Aspect 10:1

$q = '"';
?>

<html>
<body style="text-align:center; margin:0px;">
<script type="text/javascript">
    function getPlatform() {
        var w = window.innerWidth;
        var h = window.innerHeight;
        var txt = new String(window.location.href + "&width=" + w + "&height=" + h);
        window.location.href = txt;
    }
    window.onload = function() {
        var location = window.location.href;
        if (location.indexOf("width")==-1) {
            getPlatform();
        }
    };
    function darkenButton(x, left) {
        if (left==true) {
            x.style.backgroundImage = "url(" + <?php echo $q, $left_dark, $q; ?> + ")";
        }
        else {
            x.style.backgroundImage = "url(" + <?php echo $q, $right_dark, $q; ?> + ")";
        }
    }
    function lightenButton(x, left) {
        if (left==true) {
            x.style.backgroundImage = "url(" + <?php echo $q, $left, $q; ?> + ")";
        }
        else {
            x.style.backgroundImage = "url(" + <?php echo $q, $right, $q; ?> + ")";
        }
    }
</script>
<?php
#Desktop Mode
$width = $_GET['width'];
$height = $_GET['height'];
$widthb = ($_GET['width']*.15);
$heightb = ($widthb/3);
$textheight = ($heightb/4);
$font = '"Times New Roman"';

echo '<img src="load.gif" style="width:', $width, '" >';

echo '<div 
     style=" 
       background-color:#696969;
       margin:0px; 
       padding=0px;
       width:', $width, 'px;
     " >';

echo '<div id="pull_down_bar" style="background-image:url(', $bar ,'); background-size:100%; background-repeat:no-repeat; width:', $width/2, 'px; height:', $width/20, 'px; margin-left:', $width/4, 'px; margin-bottom:', $width/40, '"></div>';

function greenButton($text) {
    global $widthb, $heightb, $textheight, $left, $right, $width;

    echo '<div 
           id="', strtolower($text) ,'_left" 
           onmouseover="darkenButton(this, true)" 
           onmouseout="lightenButton(this, true)" 
           style="
             display: inline-block;
             background-image:url(', $left, ');
             background-size: 100%;
             background-repeat:no-repeat;
             width:', $widthb, 'px;
             height:', $heightb, 'px;
             cursor:pointer;
           ">';
    echo '<p 
           style="
             color:white;
             font-size:', $textheight*1.9, 'px;
             padding-top:', $textheight*1.05, 'px;
             padding-left:0px;
             padding-bottom:', $textheight*1.05, 'px;
             margin:0px;
             line-height:', $textheight*1.9, 'px;
           ">
           ', $text, '
           </p>';
    echo '</div>';
    echo '<div
          id="students_right" 
          onmouseover="darkenButton(this, false)" 
          onmouseout="lightenButton(this, false)" 
          style="
            display: inline-block; 
            background-image:url(', $right, '); 
            background-size: 100%; 
            background-repeat:no-repeat; width:', $heightb, 'px; 
            height:', $heightb, 'px; margin-right:', ($width*.05), ';
            cursor:pointer;
          ">
            <p 
            style="
              color:transparent; 
              font-size:', $textheight*2, 'px; 
              padding-top:', $textheight, 'px; 
              padding-left:0px; padding-bottom:', $textheight, 'px; 
              margin:0px; 
              line-height:', $textheight*2, 'px;',
             '">
               .
             </p>
           </div>';
}


greenButton("STUDENTS");
greenButton("SPONSORS");
greenButton("COMMUNITY");
echo '</div>';

?>
</body>
</html>