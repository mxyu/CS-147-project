<!DOCTYPE html> 
<html>

<head>
  <title>Bookends</title> 
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="apple-touch-icon" href="appicon.png" />
  <link rel="apple-touch-startup-image" href="startup.png">
  
  <script src="//cdn.optimizely.com/js/141321804.js"></script>

</head> 
<body> 
  <script src="swipeview.js"></script>
  <style>
  html, body { height:100%; }
  body {    
    padding:0;
    margin:0;
    background:#393939;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    -o-user-select:none;
    user-select:none;
    -webkit-text-size-adjust:none;
    -moz-text-size-adjust:none;
    -ms-text-size-adjust:none;
    -o-text-size-adjust:none;
    text-size-adjust:none;
    color:#eee;
    font-family:helvetica;
    font-size:12px;
  }

  #wrapper {
    margin-top: 0px;
    width:100%;
    min-width:320px;
    height:100%;
  }

  #nav {
    position:absolute;
    z-index:100;
    bottom:5px;
    width:120px;
    height:20px;
    left:50%;
    padding:0;
    margin:0 0 0 -60px;
  }

  #nav li {
    display:block;
    float:left;
    width:6px;
    height:6px; line-height:6px;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    -ms-border-radius:3px;
    -o-border-radius:3px;
    border-radius:3px;
    background:rgba(255,255,255,0.1);
    overflow:hidden;
    padding:0;
    margin:6px 10px 0 0;
    text-align:center;
  }

  #nav li#prev {
    background:transparent;
  }

  #nav li#next {
    margin-right:0;
    background:transparent;
  }

  #nav li.selected {
    background:rgba(255,255,255,0.4);
  }

  #swipeview-slider > div {
    position:relative;
    display:-webkit-box;
    display:-moz-box;
    display:-ms-box;
    display:-o-box;
    display:box;
    -webkit-box-orient:vertical;
    -moz-box-orient:vertical;
    -ms-box-orient:vertical;
    -o-box-orient:vertical;
    box-orient:vertical;
    -webkit-box-pack:center;
    -moz-box-pack:center;
    -ms-box-pack:center;
    -o-box-pack:center;
    box-pack:center;
    -webkit-box-align:center;
    -mox-box-align:center;
    -ms-box-align:center;
    -o-box-align:center;
    box-align:center;
    overflow:hidden;
  }

  #swipeview-slider img {
    display:block;
    border:5px solid #eee;
    -webkit-box-shadow:0 2px 6px #000;
    -moz-box-shadow:0 2px 6px #000;
    -ms-box-shadow:0 2px 6px #000;
    -o-box-shadow:0 2px 6px #000;
    box-shadow:0 2px 6px #000;
    -webkit-border-radius:0px;
    -moz-border-radius:0px;
    -ms-border-radius:0px;
    -o-border-radius:0px;
    border-radius:0px;
    -webkit-transition-duration:.4s;
    -moz-transition-duration:.4s;
    -ms-transition-duration:.4s;
    -o-transition-duration:.4s;
    transition-duration:.4s;
    -webkit-transition-property:opacity;
    -moz-transition-property:opacity;
    -ms-transition-property:opacity;
    -o-transition-property:opacity;
    transition-property:opacity;
    opacity:1;
    pointer-events:none;
  }

  #wrapper > div > .swipeview-loading {
    background-image:-webkit-gradient(linear, 0 0, 0 100%, from(#444), to(#555)),
      -webkit-gradient(linear, 0 0, 100% 0, from(#777), to(#777));
    background-position:50% 50%, 50% 50%;
    background-size:200px 140px, 210px 150px;
    background-repeat:no-repeat;
  }

  #wrapper > div > .swipeview-loading img,
  #swipeview-slider img.loading {
    -webkit-transition-duration:0s;
    opacity:0;
  }
  
  .title {
    margin-top: 8px;
    color: #fff;  
    position: absolute;
    font-family: HelveticaNeue, Helvetica;
    font-weight: bold;
    font-size: 16px;  
    width: 100%;
    text-align: center;
  }
  
  .done {
    z-index: 1000000;
    margin-top: 8px;
    text-shadow: 0px 1px 1px #555;
    color: #111;
    font-weight: bold;
    position: absolute;
    font-family: HelveticaNeue, Helvetica;
    font-size: 14px;  
    margin-top: 8px;
    right: 8px;
    text-align: right;
  }

  </style>
  

      <div class="title">Tutorial</div>      
      <a href="http://stanford.edu/~mxyu/cgi-bin/bookly/profile.php" class="done">Done</a>          
          
      <div id="wrapper">
         <div class="title">Tutorial</div>      
          <a href="http://stanford.edu/~mxyu/cgi-bin/bookly/profile.php" class="done">Done</a>
        
        
      </div>
      
      
        <ul id="nav">
          <li id="prev" onclick="gallery.prev()"></li>
          <li class="selected" onclick="gallery.goToPage(0)"></li>
          <li onclick="gallery.goToPage(1)"></li>
          <li onclick="gallery.goToPage(2)"></li>
          <li onclick="gallery.goToPage(3)"></li>
          <li onclick="gallery.goToPage(4)"></li>
          <li onclick="gallery.goToPage(5)"></li>
          <li id="next" onclick="gallery.next()"></li>
        </ul>

      <script type="text/javascript">
      document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

      var gallery,
        el,
        i,
        page,
        dots = document.querySelectorAll('#nav li'),
        slides = [
          {
            img: 'images/h1.png',
            width: 207,
            height: 270
          },
          {
            img: 'images/h2.png',
            width: 207,
            height: 270
          },
          {
            img: 'images/h3.png',
            width: 207,
            height: 270
          },
          {
            img: 'images/h4.png',
            width: 207,
            height: 270
          },
          {
            img: 'images/h5.png',
            width: 207,
            height: 270
          },
          {
            img: 'images/h6.png',
            width: 207,
            height: 270
          }
        ];

      gallery = new SwipeView('#wrapper', { numberOfPages: slides.length });
      
      // Load initial data
      for (i=0; i<3; i++) {
        page = i==0 ? slides.length-1 : i-1;
        el = document.createElement('img');
        el.className = 'loading';
        el.src = slides[page].img;
        console.log(el.src);
        el.width = slides[page].width;
        el.height = slides[page].height;
        el.onload = function () { this.className = ''; }
        gallery.masterPages[i].appendChild(el);
      }
      
      gallery.onFlip(function () {
        
        var el, upcoming, i;
                
        for (i=0; i<3; i++) {
          upcoming = gallery.masterPages[i].dataset.upcomingPageIndex;
      
          if (upcoming != gallery.masterPages[i].dataset.pageIndex) {
            el = gallery.masterPages[i].querySelector('img');
            el.className = 'loading';
            el.src = slides[upcoming].img;
            el.width = slides[upcoming].width;
          	el.height = slides[upcoming].height;
          }
        }
        
        console.log(upcoming);
        
        document.querySelector('#nav .selected').className = '';
        dots[gallery.pageIndex+1].className = 'selected';
        
      });
      
      gallery.onMoveOut(function () {
       gallery.masterPages[gallery.currentMasterPage].className = gallery.masterPages[gallery.currentMasterPage].className.replace(/(^|\s)swipeview-active(\s|$)/, '');
      });
      
      gallery.onMoveIn(function () {
       var className = gallery.masterPages[gallery.currentMasterPage].className;
       /(^|\s)swipeview-active(\s|$)/.test(className) || (gallery.masterPages[gallery.currentMasterPage].className = !className ? 'swipeview-active' : className + ' swipeview-active');
      });

      </script>

</body>
</html>