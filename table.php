<!--[if lte IE 8]>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
<![endif]-->
<!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
<!--<![endif]-->

<style>
.custom-wrapper {
    background-color: turquoise;
    margin-bottom: 1em;
    -webkit-font-smoothing: antialiased;
    height: 10em;
    overflow: hidden;
    -webkit-transition: height 0.5s;
    -moz-transition: height 0.5s;
    -ms-transition: height 0.5s;
    transition: height 0.5s;
}

.custom-wrapper.open {
    height: 14em;
}

.custom-menu-3 {
    text-align: right;
}

.custom-toggle {
    width: 34px;
    height: 34px;
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    display: none;
}

.custom-toggle .bar {
    background-color: #777;
    display: block;
    width: 20px;
    height: 2px;
    border-radius: 100px;
    position: absolute;
    top: 18px;
    right: 7px;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    transition: all 0.5s;
}

.custom-toggle .bar:first-child {
    -webkit-transform: translateY(-6px);
    -moz-transform: translateY(-6px);
    -ms-transform: translateY(-6px);
    transform: translateY(-6px);
}

.custom-toggle.x .bar {
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

.custom-toggle.x .bar:first-child {
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
}

@media (max-width: 47.999em) {

    .custom-menu-3 {
        text-align: left;
    }

    .custom-toggle {
        display: block;
    }

}
</style>
<div class="custom-wrapper pure-g" id="menu">
    
        
    <div class="pure-u-1 pure-u-md-1-3">
        <div class="pure-menu pure-menu-horizontal custom-can-transform">
            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Contact Form</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">View Database</a></li>
            </ul>
        </div>
    </div>
    
</div>
<script>
(function (window, document) {
var menu = document.getElementById('menu'),
    WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';

function toggleHorizontal() {
    [].forEach.call(
        document.getElementById('menu').querySelectorAll('.custom-can-transform'),
        function(el){
            el.classList.toggle('pure-menu-horizontal');
        }
    );
};

function toggleMenu() {
    // set timeout so that the panel has a chance to roll up
    // before the menu switches states
    if (menu.classList.contains('open')) {
        setTimeout(toggleHorizontal, 500);
    }
    else {
        toggleHorizontal();
    }
    menu.classList.toggle('open');
    document.getElementById('toggle').classList.toggle('x');
};

function closeMenu() {
    if (menu.classList.contains('open')) {
        toggleMenu();
    }
}

document.getElementById('toggle').addEventListener('click', function (e) {
    toggleMenu();
});

window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
})(this, this.document);

</script>








<style type = "text/css"> table, th, td {border: 2px solid black}; </style>
<style type = "text/css"> table {width: 75%}; </style>
<style type = "text/css"> table {margin: 0 auto}; </style>
<style type = "text/css"> td {text-align: center}; </style>
<style type = "text/css"> tr:nth-child(even) {background-color: #f2f2f2}; </style>


<div style="overflow-x:auto;">
<?php
        // create a self populating table of user
  try {
  $con= new PDO('mysql:host=localhost;dbname=contact_form;port=3306',"root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT * FROM user";
 
  // gets the column names
  print "<table> \n";
  $result = $con->query($query);
      
  //return only the first row 
  $row = $result->fetch(PDO::FETCH_ASSOC);
  print " <tr> \n";
  foreach ($row as $field => $value){
   print " <th>$field</th> \n";
  } 
  // end foreach
  print " </tr> \n";
      
  // query gets the data
  $data = $con->query($query);
  $data->setFetchMode(PDO::FETCH_ASSOC);
  foreach($data as $row){
   print " <tr> \n";
   foreach ($row as $name=>$value){
   print " <td>$value</td> \n";
   } // end field loop
   print " </tr> \n";
  } // end record loop
  print "</table> \n";
  } catch(PDOException $e) {
   echo 'ERROR: ' . $e->getMessage();
  } // end try
 ?>
</div>