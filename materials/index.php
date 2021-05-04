<?php
  session_start();
  if(!(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true)){
    header("location: ../index.php");
  }
  require '../config.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type = "image/ico" href="../favicon.ico">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content = "ie=edge">
    <title>Materials</title>
    <link rel = "stylesheet" type = "text/css" href = "../css/fontawesome/css/all.min.css">
    <link rel = "stylesheet" href = "../css/normalize.css">
    <link rel = "stylesheet" href ="../css/index.css">
    <link rel = "stylesheet" href ="../css/tables.css">
    <link rel = "stylesheet" href ="../css/modals.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class = "left-logo">
      <img src = "../img/logo.ico">
    </div>
    <div class = "sidebar" id = "sidebar">
      <div class = "sidebar-avatar">
        <img src = "../img/avatar.svg" alt = "">
        <h2>Admin</h2>
      </div><br>
      <a href = "javascript:void(0)" class = "closebutton" onclick = "closeNav()"><i class="fas fa-times"></i></a>
      <a href = "#" id = "staff-edit-form"><i class="fas fa-user-alt" style = "padding: 0 32px;"></i>Edit Profile</a>
      <a href = "#"><i class="fas fa-cloud-download-alt" style = "padding: 0 30px;"></i>Back up</a>
      <a href = "#"><i class="fas fa-sync" style = "padding: 0 33px;"></i>Restore</a>
      <a href = "../logout.php" class = "logout"><i class="fas fa-sign-out-alt" style = "padding: 0 30px;"></i>Logout</a></button>
    </div>
    <div id = "main">
      <div class = "wrapper">
        <nav class = "nav">
          <ul class = "nav__list" role = "menubar">
            <li class = "nav__item">
              <div class = "tooltip">
                <span class = "tooltiptext-t1">Home</span>
                <a href = "../dashboard/index.php" class = "nav__link focus--box-shadow" role = "menuitem" aria-label = "Home">
                  <svg class = "nav__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24" role = "presentation">
                    <path fill = "#6563ff" d = "M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"/>
                  </svg>
                </a>
              </div>
            </li>
            <li class = "nav__item nav__item--isActive">
              <div class = "tooltip">
                <span class = "tooltiptext-t2">All Materials</span>
                <a href = "../materials/index.php" class = "nav__link focus--box-shadow" role = "menuitem" aria-label = "Materials">
                  <svg class = "nav__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24" role = "presentation">
                    <path fill = "#6563ff" d = "M16.852,5.051h-4.018c0.131-0.225,0.211-0.482,0.211-0.761V3.528c0-0.841-0.682-1.522-1.521-1.522H8.478c-0.841,0-1.523,0.682-1.523,1.522V4.29c0,0.279,0.081,0.537,0.211,0.761H3.148c-0.841,0-1.522,0.682-1.522,1.523v9.897c0,0.842,0.682,1.523,1.522,1.523h13.704c0.842,0,1.523-0.682,1.523-1.523V6.574C18.375,5.733,17.693,5.051,16.852,5.051zM7.716,3.528c0-0.42,0.341-0.761,0.762-0.761h3.045c0.42,0,0.762,0.341,0.762,0.761V4.29c0,0.421-0.342,0.761-0.762,0.761H8.478c-0.42,0-0.762-0.34-0.762-0.761V3.528z M17.615,16.471c0,0.422-0.342,0.762-0.764,0.762H3.148c-0.42,0-0.761-0.34-0.761-0.762V9.62h15.228V16.471z M17.615,8.858H2.387V6.574c0-0.421,0.341-0.761,0.761-0.761h13.704c0.422,0,0.764,0.34,0.764,0.761V8.858z"/>
                  </svg>
                </a>
              </div>
            </li>
            <li class = "nav__item">
              <div class = "tooltip">
                <span class = "tooltiptext-t3">Inventory</span>
                <a href = "../inventory/index.php" class = "nav__link focus--box-shadow" role = "menuitem" aria-label = "Inventory">
                  <svg class = "nav__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24" role = "presentation">
                    <path fill = "#6563ff" d = "M6.634,13.591H2.146c-0.247,0-0.449,0.201-0.449,0.448v2.692c0,0.247,0.202,0.449,0.449,0.449h4.488c0.247,0,0.449-0.202,0.449-0.449v-2.692C7.083,13.792,6.881,13.591,6.634,13.591 M6.185,16.283h-3.59v-1.795h3.59V16.283zM6.634,8.205H2.146c-0.247,0-0.449,0.202-0.449,0.449v2.692c0,0.247,0.202,0.449,0.449,0.449h4.488c0.247,0,0.449-0.202,0.449-0.449V8.653C7.083,8.407,6.881,8.205,6.634,8.205 M6.185,10.897h-3.59V9.103h3.59V10.897z M6.634,2.819H2.146c-0.247,0-0.449,0.202-0.449,0.449V5.96c0,0.247,0.202,0.449,0.449,0.449h4.488c0.247,0,0.449-0.202,0.449-0.449V3.268C7.083,3.021,6.881,2.819,6.634,2.819 M6.185,5.512h-3.59V3.717h3.59V5.512z M15.933,5.683c-0.175-0.168-0.361-0.33-0.555-0.479l1.677-1.613c0.297-0.281,0.088-0.772-0.31-0.772H9.336c-0.249,0-0.448,0.202-0.448,0.449v7.107c0,0.395,0.471,0.598,0.758,0.326l1.797-1.728c0.054,0.045,0.107,0.094,0.161,0.146c0.802,0.767,1.243,1.786,1.243,2.867c0,1.071-0.435,2.078-1.227,2.837c-0.7,0.671-1.354,1.086-2.345,1.169c-0.482,0.041-0.577,0.733-0.092,0.875c0.687,0.209,1.12,0.314,1.839,0.314c0.932,0,1.838-0.173,2.673-0.505c0.835-0.33,1.603-0.819,2.262-1.449c1.322-1.266,2.346-2.953,2.346-4.751C18.303,8.665,17.272,6.964,15.933,5.683 M15.336,14.578c-1.124,1.077-2.619,1.681-4.217,1.705c0.408-0.221,0.788-0.491,1.122-0.812c0.97-0.929,1.504-2.168,1.504-3.485c0-1.328-0.539-2.578-1.521-3.516c-0.178-0.17-0.357-0.321-0.548-0.456c-0.125-0.089-0.379-0.146-0.569,0.041L9.769,9.327v-5.61h5.861l-1.264,1.216c-0.099,0.094-0.148,0.229-0.137,0.366c0.014,0.134,0.088,0.258,0.202,0.332c0.313,0.204,0.61,0.44,0.882,0.7c1.158,1.111,2.092,2.581,2.092,4.145C17.405,12.026,16.48,13.482,15.336,14.578" />
                  </svg>
                </a>
              </div>
            </li>
            <li class = "nav__item">
              <div class = "tooltip">
                <span class = "tooltiptext-t4">Changes</span>
                <a href = "../changes/index.php" class = "nav__link focus--box-shadow" role = "menuitem" aria-label = "Changes">
                  <svg class = "nav__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24" role = "presentation">
                    <path fill = "#6563ff" d = "M12.319,5.792L8.836,2.328C8.589,2.08,8.269,2.295,8.269,2.573v1.534C8.115,4.091,7.937,4.084,7.783,4.084c-2.592,0-4.7,2.097-4.7,4.676c0,1.749,0.968,3.337,2.528,4.146c0.352,0.194,0.651-0.257,0.424-0.529c-0.415-0.492-0.643-1.118-0.643-1.762c0-1.514,1.261-2.747,2.787-2.747c0.029,0,0.06,0,0.09,0.002v1.632c0,0.335,0.378,0.435,0.568,0.245l3.483-3.464C12.455,6.147,12.455,5.928,12.319,5.792 M8.938,8.67V7.554c0-0.411-0.528-0.377-0.781-0.377c-1.906,0-3.457,1.542-3.457,3.438c0,0.271,0.033,0.542,0.097,0.805C4.149,10.7,3.775,9.762,3.775,8.76c0-2.197,1.798-3.985,4.008-3.985c0.251,0,0.501,0.023,0.744,0.069c0.212,0.039,0.412-0.124,0.412-0.34v-1.1l2.646,2.633L8.938,8.67z M14.389,7.107c-0.34-0.18-0.662,0.244-0.424,0.529c0.416,0.493,0.644,1.118,0.644,1.762c0,1.515-1.272,2.747-2.798,2.747c-0.029,0-0.061,0-0.089-0.002v-1.631c0-0.354-0.382-0.419-0.558-0.246l-3.482,3.465c-0.136,0.136-0.136,0.355,0,0.49l3.482,3.465c0.189,0.186,0.568,0.096,0.568-0.245v-1.533c0.153,0.016,0.331,0.022,0.484,0.022c2.592,0,4.7-2.098,4.7-4.677C16.917,9.506,15.948,7.917,14.389,7.107 M12.217,15.238c-0.251,0-0.501-0.022-0.743-0.069c-0.212-0.039-0.411,0.125-0.411,0.341v1.101l-2.646-2.634l2.646-2.633v1.116c0,0.174,0.126,0.318,0.295,0.343c0.158,0.024,0.318,0.034,0.486,0.034c1.905,0,3.456-1.542,3.456-3.438c0-0.271-0.032-0.541-0.097-0.804c0.648,0.719,1.022,1.659,1.022,2.66C16.226,13.451,14.428,15.238,12.217,15.238" />
                  </svg>
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <main class = "main">
          <header class = "header">
            <div class = "header__wrapper">
              <form action = "" class = "search">
                <button class = "search__button focus--box-shadow" type = "submit">
                  <svg class = "search__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24">
                    <path d = "M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z" />
                  </svg>
                </button>
                <input class = "search__input focus--box-shadow" type = "text" placeholder = "Search for Material" />
              </form>
              <div class = "profile">
                <button class = "profile__button">
                  <span class = "profile__name">Admin</span>
                  <img id = "openbutton" onclick = "openNav()" class = "profile__img" src = "../img/avatar.svg" alt = "Profile Picture" loading = "lazy" />
                </button>
              </div>
            </div>
          </header>
          <section class = "section">
            <header class = "section__header">
              <h1>List of <span class = "h1-admin">All Materials</span></h1>
            </header>
            <ul class = "project">
              <li class = "project__item">
              	<div style = "display: inline-block; width: 100%;">
              		<div style = "float: left">
              			Showing
		              	<form style = "display: inline;" id = "limit-form">
		              		<input type = "number" min = "10" max = "100" id = "limit" name = "limit" value = "10" autocomplete = "off">
		              	</form>
		              	 Entries
              		</div>
                  <div style = "margin-left: 45%; margin-top: -20px;width: 33%;">
              			<button class = "previous" style = "color: #ffcc3d; font-size: 1.5em;"><i class="fas fa-caret-square-left" style = " transition: 0.1s ease-in-out;"></i></button>
              			<button class = "next" style = "color: #ffcc3d; font-size: 1.5em;"><i class="fas fa-caret-square-right" style = " transition: 0.1s ease-in-out;"></i></button>
              		</div>
              		<div style = "float: right; vertical-align: right; margin-top: -50px;">
              			<button class = "filter"><i class="fas fa-filter"></i></button>
              		</div>
              	</div>

                <div class = "allmaterials align-right-3rd-column" style = "overflow-x: auto; overflow-y: auto; height: 500px;">
                  <table id = "allmaterials" style = "border-radius: 1em;display: block;">
                  	<thead>
                  		<tr>
	                      <th style = "border-radius: 1em 0 0 0;" class = "sort" data-sort = "Accession Number">Accession Number</th>
	                      <th class = "sort" data-sort = "Barcode">Barcode</th>
	                      <th class = "sort" data-sort = "Call Number">Call Number</th>
	                      <th class = "sort" data-sort = "Title">Title</th>
	                      <th>Author</th>
	                      <th>Volume</th>
	                      <th>Year</th>
	                      <th>Edition</th>
	                      <th>Publisher</th>
	                      <th>Publication Year</th>
	                      <th>Circulation Type</th>
	                      <th>Type</th>
	                      <th>Status</th>
	                      <th>Source</th>
	                      <th>Location</th>
	                      <th>Last Year Inventoried</th>
	                      <th style = "border-radius: 0 1em 0 0;">Action</th>
	                    </tr>
                  	</thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
                <div style="display: inline-block; width: 100%; margin-top: 20px;">
              		<div style = "float: left; width: 33%">
              			Page
		              	<form style = "display: inline" id = "page-form">
		              		<input type="number" min = "1" id = "page-number" name = "page-number" value = "1">
		              	</form>
		              	of <span id = "total-pages"></span> (<span id = "total-materials"></span> entries)
              		</div>
              		<div style = "float: right; vertical-align: right; margin-top: -15px;">
              			<button class = "add">Add</button>
              		</div>
              	</div>
              </li>
            </ul>


            <?php
              require "modal.php";
              require "../staff/modal.php";
            ?>
          </section>
        </div>
      </main>
    </div>

    <footer class = "footer">
      <p style = "float: left; padding-left: 10px; padding-top: 16px;">University of the Philippines - Baguio Library Inventory System</p>
      <p style = "float: right; padding-right: 10px; padding-top: 16px;">For news and related events visit:
        <a href = "https://www.facebook.com/OfficialUPB"><i class="fab fa-facebook-f"></i></a>
        <a href = "https://web.upb.edu.ph/"><i class="fas fa-globe"></i></a>
        <a href = "https://www.youtube.com/channel/UC1XJ8yRNRuDHmhJXtsLIB_g"><i class="fab fa-youtube"></i></a>
      </p>
    </footer>
    <script type = "text/javascript" src = "js/variables.js"></script>
    <script type = "text/javascript" src = "js/formhandler.js"></script>
    <script type = "text/javascript" src = "js/update.js"></script>
    <script type = "text/javascript" src = "js/count.js"></script>
    <script type = "text/javascript" src = "js/findPage.js"></script>
    <script type = "text/javascript" src = "js/buttons.js"></script>
    <script type = "text/javascript" src = "js/initialize.js"></script>
    <script type = "text/javascript" src = "../staff/js/formhandler.js"></script>
    <script type = "text/javascript" src = "../staff/js/buttons.js"></script>
    <script>
      function openNav() {
        document.getElementById("sidebar").style.width = "500px";
        document.getElementById("main").style.marginRight = "250px";
      }

      function closeNav() {
        document.getElementById("sidebar").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
      }
    </script>
  </body>
</html>
