<!DOCTYPE html>

<html>

    <head>
        
        <!-- need to change this stuff at one point -->

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>HCKISA: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>HCKISA</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>
        
        
                
        <style>
        
            div.introwide {
                text-align: left;
                margin-left: 50px;
                margin-right: 50px;
            }
            
            div.intronarrow {
                text-align: left;
                margin-left: 170px;
                margin-right: 140px;
            }
            
            ul.header {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #555;
            }
            
            ul.staff {
                list-style-type: circle;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            
            
            li.header {
                float: left;
                font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;
            }
            
            li.staff{
                float: center;
            }
            
            li a {
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px 72.4px;
                text-decoration: none;
            }
            
            li a:hover {
                background-color: #111;
            }
            
            /*
            li b {
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px 72.7px;
                text-decoration: none;
            }
            
            li b:hover {
                background-color: #222;
            }
            */
                        
            div.img {
                margin: 5px;
                float: left;
                width: 225px;
            }
            
            div.img:hover {
                border: 1px solid #777;
            }
            
            div.img img {
                width: 100%;
                height: auto;
            }
            
            div.desc {
                padding: 15px;
                text-align: center;
                font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;
            }
            
            .circle {
              display: inline-block;
              position: relative;
            }
            .circle img {
              display: block;
            }
            .circle:after {
              content: "";
              position: absolute;
              left: 0;
              top: 0;
              width: 100%;
              height: 100%;
              background-image: radial-gradient(circle closest-side at center,
                rgba(255, 255, 255, 0) 0,
                rgba(255, 255, 255, 0) 80%, 
                rgba(255, 255, 255, 1) 100%
              );
            }
            
            body {
               padding: 10px;
               padding-bottom: 30px;   /* Height of the footer */
            }
            
            footer {
               position: fixed;
               text-align: center;
               line-height: 200%;
               bottom: 0;
               width: 83%;
               height: 30px;   /* Height of the footer */
               background: #ffffff;
               font-family:  "Palatino Linotype", "Book Antiqua", Palatino, serif;
            }
            
            /*@import url(http://fonts.googleapis.com/css?family=Varela+Round);*/


            .slides {
                padding: 0;
                width: 609px;
                height: 420px;
                display: block;
                margin: 0 auto;
                position: relative;
            }
            
            .slides * {
                user-select: none;
                -ms-user-select: none;
                -moz-user-select: none;
                -khtml-user-select: none;
                -webkit-user-select: none;
                -webkit-touch-callout: none;
            }
            
            .slides input { display: none; }
            
            .slide-container { display: block; }
            
            .slide {
                top: 0;
                opacity: 0;
                width: 609px;
                height: 420px;
                display: block;
                position: absolute;
            
                transform: scale(0);
            
                transition: all .7s ease-in-out;
            }
            
            .slide img {
                width: 100%;
                height: 100%;
            }
            
            .nav label {
                width: 200px;
                height: 100%;
                display: none;
                position: absolute;
            
            	  opacity: 0;
                z-index: 9;
                cursor: pointer;
            
                transition: opacity .2s;
            
                color: #FFF;
                font-size: 156pt;
                text-align: center;
                line-height: 380px;
                font-family: "Varela Round", sans-serif;
                background-color: rgba(255, 255, 255, .3);
                text-shadow: 0px 0px 15px rgb(119, 119, 119);
            }
            
            .slide:hover + .nav label { opacity: 0.5; }
            
            .nav label:hover { opacity: 1; }
            
            .nav .next { right: 0; }
            
            input:checked + .slide-container  .slide {
                opacity: 1;
            
                transform: scale(1);
            
                transition: opacity 1s ease-in-out;
            }
            
            input:checked + .slide-container .nav label { display: block; }
            
            .nav-dots {
            	width: 100%;
            	bottom: 9px;
            	height: 11px;
            	display: block;
            	position: absolute;
            	text-align: center;
            }
            
            .nav-dots .nav-dot {
            	top: -5px;
            	width: 11px;
            	height: 11px;
            	margin: 0 4px;
            	position: relative;
            	border-radius: 100%;
            	display: inline-block;
            	background-color: rgba(0, 0, 0, 0.6);
            }
            
            .nav-dots .nav-dot:hover {
            	cursor: pointer;
            	background-color: rgba(0, 0, 0, 0.8);
            }
            
            input#img-1:checked ~ .nav-dots label#img-dot-1,
            input#img-2:checked ~ .nav-dots label#img-dot-2,
            input#img-3:checked ~ .nav-dots label#img-dot-3,
            input#img-4:checked ~ .nav-dots label#img-dot-4,
            input#img-5:checked ~ .nav-dots label#img-dot-5,
            input#img-6:checked ~ .nav-dots label#img-dot-6 {
            background: rgba(0, 0, 0, 0.8);
            }
            
            table { 
                border-spacing: 100px;
            } 
            
            table.calendar td{
                padding: 0px;
                margin: 00px;
            }
            
            table.calendar {
                border-spacing: 50px;
                border-collapse: separate;
                table-layout: fixed;
                width: 950px;
            }
            
            td { 
                padding: 28px;
                font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;
            }
            
            tr.newevent {
                font-weight: bold;
            }
            
            tr.title {
                font-style: italic;
            }
                
        </style>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="Logo" src="/img/wordlogo.png" style="max-height: 150px;"/></a>
                </div>
                <ul class = "header">
                  <li class = "header"><a href="index.php" >About</a></li>
                  <li class = "header"><a href="staff.php">Staff</a></li>
                  <li class = "header"><a href="gallery.php">Gallery</a></li>
                  <li class = "header"><a href="calendar.php">Calendar</a></li>
                  <li class = "header"><a href="donation.php">Donate</a></li>
                </ul>
            </div>
            

            <div id="middle">
