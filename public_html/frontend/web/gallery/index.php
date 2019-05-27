<?php $page = "index" ; include 'header.php';  ?>

    <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
        <!-- content begin -->
        <div id="content" class="no-bottom no-top">

            <!-- revolution slider begin -->
            <section>
             <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="img_/1.JPG" data-thumb="img_/1.JPG" alt="" />
                <img src="img_/2.JPG" data-thumb="img_/2.JPG" alt=""  /></a>
                <img src="img_/3.JPG" data-thumb="img_/3.JPG" alt=""  />
                
            </div>
            
        </div>
            </section>
            <!-- revolution slider close -->

            </div>


         <?php include 'footer.php' ?>

    <script type="text/javascript" src="jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({manualAdvance:false});
    });
    </script>