<?php
  session_start();
  require '../config.php';
  date_default_timezone_set('Asia/Manila');
  $year = date("Y");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/ico" href="../favicon.ico">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content = "ie=edge">
    <title>Inventory</title>
    <link rel = "stylesheet" type = "text/css" href = "../css/fontawesome/css/all.min.css">
    <link rel = "stylesheet" href = "../css/normalize.css">
    <link rel = "stylesheet" href ="../css/index.css">
    <link rel = "stylesheet" href ="../css/tables.css">
    <link rel = "stylesheet" href ="../css/form-control.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    .modal-body {
      padding: 0;
      border-radius: 15px;
      display: flex;
      height: 590px;
      font-family: sans-serif;
    }

    .modal-content {
      border-radius: 20px;
    }

    .modal-content h1, .modal-content h2, .modal-content h3 {
      text-align: center;
    }

    .column {
      flex: 50%;
      padding: 10px;
    }

    .column#main {
      flex: 75%;
      padding: 50px;
      padding-left: 25px;
      margin-top: 0;
      margin-left: 15px;
    }

    #secondary {
      background-color: #ffcc3d;
      border-radius: 0 15px 15px 0;
      text-align: center;
    }

    #secondary .btn-primary {
      background: #f8f9fa4f;
      color: #000;
    }

    .modal-body label {
      margin-bottom: 0;
    }

    .sec-content {
      margin-top: 80%;
    }

    #submitbtn, #submitbtna ,#submitbtnb {
      background-color: #800000;
      color: #fff;
      width: 100px;
      opacity: 0.8;
      transition: 0.2s ease-in-out;
    }

    #submitbtn:hover, #cancelbtn:hover,
    #submitbtna:hover, #submitbtnb:hover {
      opacity: 1;
    }

    #submit_acc_num {
      background-color: #800000;
      color: #fff;
      width: 100px;
      opacity: 0.8;
      transition: 0.2s ease-in-out;
    }

    #submit_acc_num:hover, #cancelbtn:hover {
      opacity: 1;
    }

    #submit_bar {
      background-color: #800000;
      color: #fff;
      width: 100px;
      opacity: 0.8;
      transition: 0.2s ease-in-out;
    }

    #submit_bar:hover, #cancelbtn:hover {
      opacity: 1;
    }

    #cancelbtn {
      opacity: 0.9;
    }

    .modal input[type=text], select {
      width: 95%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .container2 {
      overflow-y: auto;
      height: 425px;
    }

    .wave svg {
      height: 105%;
      width: 97px;
    }

    .wave svg path {
      fill: #ffcc3d!important;
    }

    @media screen and (max-width: 1366px) {
      .modal {
        overflow-y: hidden;
      }

      .modal-body {
        height: 458px;
      }

      .column#main {
        flex: 75%;
        padding: 25px;
        margin-top: 0;
        margin-left: 15px;
      }

      .sec-content {
        margin-top: 70%;
      }

      .wave svg {
        height: 100%;
        width: 76.5px;
      }

      .modal input[type=text], select {
        width: 90%;
      }

      .container2 {
        overflow-y: auto;
        height: 280px;
      }
    }
    </style>
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
      <a href = "../index.php" class = "logout"><i class="fas fa-sign-out-alt" style = "padding: 0 30px;"></i>Logout</a></button>
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
            <li class = "nav__item">
              <div class = "tooltip">
                <span class = "tooltiptext-t1">All Materials</span>
                <a href = "../materials/index.php" class = "nav__link focus--box-shadow" role = "menuitem" aria-label = "Materials">
                  <svg class = "nav__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24" role = "presentation">
                    <path fill = "#6563ff" d = "M16.852,5.051h-4.018c0.131-0.225,0.211-0.482,0.211-0.761V3.528c0-0.841-0.682-1.522-1.521-1.522H8.478c-0.841,0-1.523,0.682-1.523,1.522V4.29c0,0.279,0.081,0.537,0.211,0.761H3.148c-0.841,0-1.522,0.682-1.522,1.523v9.897c0,0.842,0.682,1.523,1.522,1.523h13.704c0.842,0,1.523-0.682,1.523-1.523V6.574C18.375,5.733,17.693,5.051,16.852,5.051zM7.716,3.528c0-0.42,0.341-0.761,0.762-0.761h3.045c0.42,0,0.762,0.341,0.762,0.761V4.29c0,0.421-0.342,0.761-0.762,0.761H8.478c-0.42,0-0.762-0.34-0.762-0.761V3.528z M17.615,16.471c0,0.422-0.342,0.762-0.764,0.762H3.148c-0.42,0-0.761-0.34-0.761-0.762V9.62h15.228V16.471z M17.615,8.858H2.387V6.574c0-0.421,0.341-0.761,0.761-0.761h13.704c0.422,0,0.764,0.34,0.764,0.761V8.858z"/>
                  </svg>
                </a>
              </div>
            </li>
            <li class = "nav__item nav__item--isActive">
              <div class = "tooltip">
                <span class = "tooltiptext-t1">Inventory</span>
                <a href = "../inventory/index.php" class = "nav__link focus--box-shadow" role = "menuitem" aria-label = "Inventory">
                  <svg class = "nav__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24" role = "presentation">
                    <path fill = "#6563ff" d = "M6.634,13.591H2.146c-0.247,0-0.449,0.201-0.449,0.448v2.692c0,0.247,0.202,0.449,0.449,0.449h4.488c0.247,0,0.449-0.202,0.449-0.449v-2.692C7.083,13.792,6.881,13.591,6.634,13.591 M6.185,16.283h-3.59v-1.795h3.59V16.283zM6.634,8.205H2.146c-0.247,0-0.449,0.202-0.449,0.449v2.692c0,0.247,0.202,0.449,0.449,0.449h4.488c0.247,0,0.449-0.202,0.449-0.449V8.653C7.083,8.407,6.881,8.205,6.634,8.205 M6.185,10.897h-3.59V9.103h3.59V10.897z M6.634,2.819H2.146c-0.247,0-0.449,0.202-0.449,0.449V5.96c0,0.247,0.202,0.449,0.449,0.449h4.488c0.247,0,0.449-0.202,0.449-0.449V3.268C7.083,3.021,6.881,2.819,6.634,2.819 M6.185,5.512h-3.59V3.717h3.59V5.512z M15.933,5.683c-0.175-0.168-0.361-0.33-0.555-0.479l1.677-1.613c0.297-0.281,0.088-0.772-0.31-0.772H9.336c-0.249,0-0.448,0.202-0.448,0.449v7.107c0,0.395,0.471,0.598,0.758,0.326l1.797-1.728c0.054,0.045,0.107,0.094,0.161,0.146c0.802,0.767,1.243,1.786,1.243,2.867c0,1.071-0.435,2.078-1.227,2.837c-0.7,0.671-1.354,1.086-2.345,1.169c-0.482,0.041-0.577,0.733-0.092,0.875c0.687,0.209,1.12,0.314,1.839,0.314c0.932,0,1.838-0.173,2.673-0.505c0.835-0.33,1.603-0.819,2.262-1.449c1.322-1.266,2.346-2.953,2.346-4.751C18.303,8.665,17.272,6.964,15.933,5.683 M15.336,14.578c-1.124,1.077-2.619,1.681-4.217,1.705c0.408-0.221,0.788-0.491,1.122-0.812c0.97-0.929,1.504-2.168,1.504-3.485c0-1.328-0.539-2.578-1.521-3.516c-0.178-0.17-0.357-0.321-0.548-0.456c-0.125-0.089-0.379-0.146-0.569,0.041L9.769,9.327v-5.61h5.861l-1.264,1.216c-0.099,0.094-0.148,0.229-0.137,0.366c0.014,0.134,0.088,0.258,0.202,0.332c0.313,0.204,0.61,0.44,0.882,0.7c1.158,1.111,2.092,2.581,2.092,4.145C17.405,12.026,16.48,13.482,15.336,14.578" />
                  </svg>
                </a>
              </div>
            </li>
            <li class = "nav__item">
              <div class = "tooltip">
                <span class = "tooltiptext-t1">Changes</span>
                <a href = "../changes/index.php" class = "nav__link focus--box-shadow" role = "menuitem" aria-label = "Changes">
                  <svg class = "nav__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24" role = "presentation">
                    <path fill = "#6563ff" d = "M12.319,5.792L8.836,2.328C8.589,2.08,8.269,2.295,8.269,2.573v1.534C8.115,4.091,7.937,4.084,7.783,4.084c-2.592,0-4.7,2.097-4.7,4.676c0,1.749,0.968,3.337,2.528,4.146c0.352,0.194,0.651-0.257,0.424-0.529c-0.415-0.492-0.643-1.118-0.643-1.762c0-1.514,1.261-2.747,2.787-2.747c0.029,0,0.06,0,0.09,0.002v1.632c0,0.335,0.378,0.435,0.568,0.245l3.483-3.464C12.455,6.147,12.455,5.928,12.319,5.792 M8.938,8.67V7.554c0-0.411-0.528-0.377-0.781-0.377c-1.906,0-3.457,1.542-3.457,3.438c0,0.271,0.033,0.542,0.097,0.805C4.149,10.7,3.775,9.762,3.775,8.76c0-2.197,1.798-3.985,4.008-3.985c0.251,0,0.501,0.023,0.744,0.069c0.212,0.039,0.412-0.124,0.412-0.34v-1.1l2.646,2.633L8.938,8.67z M14.389,7.107c-0.34-0.18-0.662,0.244-0.424,0.529c0.416,0.493,0.644,1.118,0.644,1.762c0,1.515-1.272,2.747-2.798,2.747c-0.029,0-0.061,0-0.089-0.002v-1.631c0-0.354-0.382-0.419-0.558-0.246l-3.482,3.465c-0.136,0.136-0.136,0.355,0,0.49l3.482,3.465c0.189,0.186,0.568,0.096,0.568-0.245v-1.533c0.153,0.016,0.331,0.022,0.484,0.022c2.592,0,4.7-2.098,4.7-4.677C16.917,9.506,15.948,7.917,14.389,7.107 M12.217,15.238c-0.251,0-0.501-0.022-0.743-0.069c-0.212-0.039-0.411,0.125-0.411,0.341v1.101l-2.646-2.634l2.646-2.633v1.116c0,0.174,0.126,0.318,0.295,0.343c0.158,0.024,0.318,0.034,0.486,0.034c1.905,0,3.456-1.542,3.456-3.438c0-0.271-0.032-0.541-0.097-0.804c0.648,0.719,1.022,1.659,1.022,2.66C16.226,13.451,14.428,15.238,12.217,15.238" />
                  </svg>
                </a>
              </div>
            </li>
            <li class = "nav__item"> <!-- Changes -->
              <div class = "tooltip">
                <span class = "tooltiptext-t1">Staff</span>
                <a href = "../staff/index.php" class = "nav__link focus--box-shadow" role = "menuitem" aria-label = "Staff">
                  <svg class = "nav__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24" role = "presentation">
                    <path fill = "#6563ff" d = "M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z" />
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
              <h1><span class = "h1-admin">Inventory</span> Items</h1>
            </header>
            <ul class = "inventory__buttons">
              <li class = "inventory__item">
                <button type = "button" class = "accession-number" onclick = "document.getElementById('id01').style.display='block'" id = "anbtn">
                  <h2 class = "inventory-h2" style = "color: #fff;">Input Accession Number</h2><i class="fas fa-keyboard"></i>
                </button>
              </li>
              <li class = "inventory__item">
                <button type = "button" class = "barcode-scanner" onclick = "document.getElementById('id02').style.display='block'" id = "bsbtn">
                  <h2 class = "inventory-h2" style = "color: #fff;">Scan Barcode</h2><i class="fas fa-barcode"></i>
                </button>
              </li>
              <li class = "inventory__item">
                <button type = "button" class = "report-generator" id = "rgbtn">
                  <h2 class = "inventory-h2" style = "color: #fff;">Generate Report</h2><i class="fas fa-flag-checkered"></i>
                </button>
              </li>
            </ul>
          </section>
          <?php
          require "../staff/modal.php";
          require "../staff/modaldelete.php"
          ?>
        </main>
      </div>
    </div>

    <!-- Modal Input Accession Number -->
    <div class = "modal fade" id = "id01" >
      <div class = "modal-dialog" role = "document">
        <div class = "modal-content">
          <div class = "modal-body">
            <div class = "column" id = "main">
              <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
              <h1>Material Information</h1>
              <form  class = "materiala" method = "POST">
                <div class = "container2">
                  <h1 class = "modal-title"></h1>
                  <input type="hidden" name="function" id = "functiona" value = "accession-number">
                  <input type = "hidden" id = "ida" name = "id" value = "">

                  <label for = "acc_num">Accession Number</label>
                  <input type = "text" id = "acc_numa" name = "acc_num" placeholder = "Accession Number.." value="" autocomplete="off">

                  <label for = "barcode">Barcode</label>
                  <input type = "text" id = "barcodea" name = "barcode" placeholder = "Barcode.." value="" autocomplete="off">

                  <label for = "call_number">Call Number</label>
                  <input type = "text" id = "call_numbera" name = "call_number" placeholder = "Call Number.." value="" autocomplete="off">

                  <label for = "title">Material Title</label>
                  <input type = "text" id = "titlea" name = "title" placeholder = "Title.." value="" autocomplete="off">

                  <label for = "author">Material Author</label>
                  <input type = "text" id = "authora" name = "author" placeholder = "Author.." value="" autocomplete="off">

                  <label for = "volume">Material Volume</label>
                  <input type = "text" id = "volumea" name = "volume" placeholder = "Volume.." value="" autocomplete="off">

                  <label for = "year">Material Year</label>
                  <input type = "text" id = "yeara" name = "year" placeholder = "Year.." value="" autocomplete="off">

                  <label for = "edition">Material Edition</label>
                  <input type = "text" id = "editiona" name = "edition" placeholder = "Edition.." value="" autocomplete="off">

                  <label for = "publisher">Publisher of the Material</label>
                  <input type = "text" id = "publishera" name = "publisher" placeholder = "Publisher.." value="" autocomplete="off">

                  <label for = "pub_year">Year of Publication</label>
                  <input type = "text" id = "pub_yeara" name = "pub_year" placeholder = "Publication Year.." value="" autocomplete="off">

                  <label for = "circ_type">Circulation Type</label>
                  <select id = "circ_typea" name = "circ_type" value="">
                    <option value = "" selected>---none---</option>
                    <option value = "Circulation Book">Circulation Book</option>
                    <option value = "Circulation Monograph">Circulation Monograph</option>
                    <option value = "Cordillera Book">Cordillera Book</option>
                    <option value = "Cordillera Monograph">Cordillera Monograph</option>
                    <option value = "Cordillera Multimedia">Cordillera Multimedia</option>
                    <option value = "Filipiniana Reference">Filipiniana Reference</option>
                    <option value = "Filipiniana Archives">Filipiniana Archives</option>
                    <option value = "Filipiniana Book">Filipiniana Book</option>
                    <option value = "Filipiniana MO">Filipiniana MO</option>
                    <option value = "Filipiniana Monograph">Filipiniana Monograph</option>
                    <option value = "Filipiniana PIDS">Filipiniana PIDS</option>
                    <option value = "GRC Book">GRC Book</option>
                    <option value = "GRC MO">GRC MO</option>
                    <option value = "GRC Monograph">GRC Monograph</option>
                    <option value = "Howard Fry Special Collection - Room Use Only">Howard Fry Special Collection - Room Use Only</option>
                    <option value = "Multimedia Material">Multimedia Material</option>
                    <option value = "Non-Circulation">Non-Circulation</option>
                    <option value = "Periodicals - Room Use Only">Periodicals - Room Use Only</option>
                    <option value = "Reference - Room Use Only">Reference - Room Use Only</option>
                    <option value = "Reference - Room Use Only (Reserve Section)">Reference - Room Use Only (Reserve Section)</option>
                    <option value = "Reserve - Monograph">Reserve - Monograph</option>
                    <option value = "Reserve Book">Reserve Book</option>
                    <option value = "Reserve Book - 1 month loan">Reserve Book - 1 month loan</option>
                    <option value = "Reserve Book - Room Use Only">Reserve Book - Room Use Only</option>
                    <option value = "Room Use Only">Room Use Only</option>
                    <option value = "Thesis - Room Use Only">Thesis - Room Use Only</option>
                  </select>

                  <label for = "type">Type</label>
                  <select id = "typea" name = "type" value="">
                    <option value = "" selected>---none---</option>
                    <option value = "Article">Article</option>
                    <option value = "Book">Book</option>
                    <option value = "Computer File">Computer File</option>
                    <option value = "Map">Map</option>
                    <option value = "Mixed Material">Mixed Material</option>
                    <option value = "Music">Music</option>
                    <option value = "Serial">Serial</option>
                    <option value = "Thesis">Thesis</option>
                    <option value = "Visual Material">Visual Material</option>
                  </select>

                  <label for = "status">Status</label>
                  <select id = "statusa" name = "status" value="">
                    <option value = "" selected>---none---</option>
                    <option value = "Available Online">Available Online</option>
                    <option value = "In Process">In Process</option>
                    <option value = "In Stacks Area">In Stacks Area</option>
                    <option value = "Long Overdue">Long Overdue</option>
                    <option value = "Lost">Lost</option>
                    <option value = "On Loan">On Loan</option>
                    <option value = "On Shelf">On Shelf</option>
                    <option value = "Preservation Copy">Preservation Copy</option>
                  </select>

                  <label for = "location">Location</label>
                  <select id = "locationa" name = "location" value="">
                    <option value = "" selected>---none---</option>
                    <option value = "Cordillera/Northern Luzon Archives">Cordillera/Northern Luzon Archives</option>
                    <option value = "Graduate Resource Center">Graduate Resource Center</option>
                    <option value = "Knowledge and Training Resource Center">Knowledge and Training Resource Center</option>
                    <option value = "Main Library">Main Library</option>
                  </select>

                  <label for = "source">Source</label>
                  <input type = "text" id = "sourcea" name = "source" placeholder = "Material Source.." value="" autocomplete="off">

                  <button type = "button" class = "modalbtn" id = "submitbtna" style = "width: auto;">Save Changes</button>
                  <div class = "clearfix">
                  </div>
                </div>
              </form>
            </div>
            <div class = "wave">
              <!--<?//xml version="1.0" encoding="UTF-8"?>-->
              <svg viewBox="0 0 67 578" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="Page-1" stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
                      <path d="M11.3847656,-5.68434189e-14 C-7.44726562,36.7213542 5.14322917,126.757812 49.15625,270.109375 C70.9827986,341.199016 54.8877465,443.829224 0.87109375,578 L67,578 L67,-5.68434189e-14 L11.3847656,-5.68434189e-14 Z" id="Path" fill="#ffcc3d"></path>
                  </g>
              </svg>
            </div>
            <div class="column" id="secondary">
              <div class="sec-content">
                <h2>Input Accession Number</h2>
                <input type = "text" id = "input_acc_num" name = "acc_num" placeholder = "Accession Number.." value="" autocomplete="off">
                <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
                <button type = "button" class = "modalbtn" id = "submit_acc_num">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Barcode Scanner-->
    <div class = "modal fade" id = "id02" >
      <div class = "modal-dialog" role = "document">
        <div class = "modal-content">
          <div class = "modal-body">
            <div class = "column" id = "main">
              <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
              <h1>Material Information</h1>
              <form  class = "materialb" method = "POST">
                <div class = "container2">
                  <h1 class = "modal-title"></h1>
                  <input type="hidden" name="function" id = "function" value = "barcode">
                  <input type = "hidden" id = "idb" name = "id" value = "">

                  <label for = "acc_num">Accession Number</label>
                  <input type = "text" id = "acc_numb" name = "acc_num" placeholder = "Accession Number.." value="" autocomplete="off">

                  <label for = "barcode">Barcode</label>
                  <input type = "text" id = "barcodeb" name = "barcode" placeholder = "Barcode.." value="" autocomplete="off">

                  <label for = "call_number">Call Number</label>
                  <input type = "text" id = "call_numberb" name = "call_number" placeholder = "Call Number.." value="" autocomplete="off">

                  <label for = "title">Material Title</label>
                  <input type = "text" id = "titleb" name = "title" placeholder = "Title.." value="" autocomplete="off">

                  <label for = "author">Material Author</label>
                  <input type = "text" id = "authorb" name = "author" placeholder = "Author.." value="" autocomplete="off">

                  <label for = "volume">Material Volume</label>
                  <input type = "text" id = "volumeb" name = "volume" placeholder = "Volume.." value="" autocomplete="off">

                  <label for = "year">Material Year</label>
                  <input type = "text" id = "yearb" name = "year" placeholder = "Year.." value="" autocomplete="off">

                  <label for = "edition">Material Edition</label>
                  <input type = "text" id = "editionb" name = "edition" placeholder = "Edition.." value="" autocomplete="off">

                  <label for = "publisher">Publisher of the Material</label>
                  <input type = "text" id = "publisherb" name = "publisher" placeholder = "Publisher.." value="" autocomplete="off">

                  <label for = "pub_year">Year of Publication</label>
                  <input type = "text" id = "pub_yearb" name = "pub_year" placeholder = "Publication Year.." value="" autocomplete="off">

                  <label for = "circ_type">Circulation Type</label>
                  <select id = "circ_typeb" name = "circ_type" value="">
                    <option value = "" selected>---none---</option>
                    <option value = "Circulation Book">Circulation Book</option>
                    <option value = "Circulation Monograph">Circulation Monograph</option>
                    <option value = "Cordillera Book">Cordillera Book</option>
                    <option value = "Cordillera Monograph">Cordillera Monograph</option>
                    <option value = "Cordillera Multimedia">Cordillera Multimedia</option>
                    <option value = "Filipiniana Reference">Filipiniana Reference</option>
                    <option value = "Filipiniana Archives">Filipiniana Archives</option>
                    <option value = "Filipiniana Book">Filipiniana Book</option>
                    <option value = "Filipiniana MO">Filipiniana MO</option>
                    <option value = "Filipiniana Monograph">Filipiniana Monograph</option>
                    <option value = "Filipiniana PIDS">Filipiniana PIDS</option>
                    <option value = "GRC Book">GRC Book</option>
                    <option value = "GRC MO">GRC MO</option>
                    <option value = "GRC Monograph">GRC Monograph</option>
                    <option value = "Howard Fry Special Collection - Room Use Only">Howard Fry Special Collection - Room Use Only</option>
                    <option value = "Multimedia Material">Multimedia Material</option>
                    <option value = "Non-Circulation">Non-Circulation</option>
                    <option value = "Periodicals - Room Use Only">Periodicals - Room Use Only</option>
                    <option value = "Reference - Room Use Only">Reference - Room Use Only</option>
                    <option value = "Reference - Room Use Only (Reserve Section)">Reference - Room Use Only (Reserve Section)</option>
                    <option value = "Reserve - Monograph">Reserve - Monograph</option>
                    <option value = "Reserve Book">Reserve Book</option>
                    <option value = "Reserve Book - 1 month loan">Reserve Book - 1 month loan</option>
                    <option value = "Reserve Book - Room Use Only">Reserve Book - Room Use Only</option>
                    <option value = "Room Use Only">Room Use Only</option>
                    <option value = "Thesis - Room Use Only">Thesis - Room Use Only</option>
                  </select>

                  <label for = "type">Type</label>
                  <select id = "typeb" name = "type" value="">
                    <option value = "" selected>---none---</option>
                    <option value = "Article">Article</option>
                    <option value = "Book">Book</option>
                    <option value = "Computer File">Computer File</option>
                    <option value = "Map">Map</option>
                    <option value = "Mixed Material">Mixed Material</option>
                    <option value = "Music">Music</option>
                    <option value = "Serial">Serial</option>
                    <option value = "Thesis">Thesis</option>
                    <option value = "Visual Material">Visual Material</option>
                  </select>

                  <label for = "status">Status</label>
                  <select id = "statusb" name = "status" value="">
                    <option value = "" selected>---none---</option>
                    <option value = "Available Online">Available Online</option>
                    <option value = "In Process">In Process</option>
                    <option value = "In Stacks Area">In Stacks Area</option>
                    <option value = "Long Overdue">Long Overdue</option>
                    <option value = "Lost">Lost</option>
                    <option value = "On Loan">On Loan</option>
                    <option value = "On Shelf">On Shelf</option>
                    <option value = "Preservation Copy">Preservation Copy</option>
                  </select>

                  <label for = "location">Location</label>
                  <select id = "locationb" name = "location" value="">
                    <option value = "" selected>---none---</option>
                    <option value = "Cordillera/Northern Luzon Archives">Cordillera/Northern Luzon Archives</option>
                    <option value = "Graduate Resource Center">Graduate Resource Center</option>
                    <option value = "Knowledge and Training Resource Center">Knowledge and Training Resource Center</option>
                    <option value = "Main Library">Main Library</option>
                  </select>

                  <label for = "source">Source</label>
                  <input type = "text" id = "sourceb" name = "source" placeholder = "Material Source.." value="" autocomplete="off">
                  <button type = "button" class = "modalbtn" id = "submitbtnb" style = "width: auto;">Save Changes</button>
                  <div class = "clearfix">
                  </div>
                </div>
              </form>
            </div>
            <div class = "wave">
              <!--<?//xml version="1.0" encoding="UTF-8"?>-->
              <svg viewBox="0 0 67 578" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="Page-1" stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
                      <path d="M11.3847656,-5.68434189e-14 C-7.44726562,36.7213542 5.14322917,126.757812 49.15625,270.109375 C70.9827986,341.199016 54.8877465,443.829224 0.87109375,578 L67,578 L67,-5.68434189e-14 L11.3847656,-5.68434189e-14 Z" id="Path" fill="#ffcc3d"></path>
                  </g>
              </svg>
            </div>
            <div class="column" id="secondary">
              <div class="sec-content">
                <h2>Barcode Scanner</h2>
                <input type = "text" id = "input_barcode" name = "barcode" placeholder = "Scan Barcode.." value="" autocomplete="off">
                <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
                <button type = "button" class = "modalbtn" id = "submit_bar">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class = "modal" id = "report">
      <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
      <form class = "modal-content" id = "report-form" action = "../report/index.php" method = "POST">
        <div class = "container" style = "overflow-y: auto;">
        <h1 class = "modal-title">Generate Report</h1>
          <label for="report-select">Choose report to generate:</label>
          <select class = "report-select" id="report-select" name="report-select">
            <option value = "materials">Materials</option>
            <option value = "inventory">Inventory</option>
            <option value = "comparison">Comparison</option>
          </select>
          <div class="year-select" style="display: none">
            <label for="year1">Choose first year:</label>
            <select class = "year-select" id="year1" name="year1">
              <?php
                $sql = "SHOW COLUMNS FROM INVENTORY LIKE 'inv_%'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
              ?>
                <option value = "<?php echo substr($row["Field"], 4) ?>"><?php echo substr($row["Field"], 4) ?></option>
              <?php
                }
              ?>
            </select>
            <label for="year2">Choose second year:</label>
            <select class = "year-select" id="year2" name="year2">
              <?php
                $sql = "SHOW COLUMNS FROM INVENTORY LIKE 'inv_%'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
              ?>
                <option value = "<?php echo substr($row["Field"], 4) ?>"><?php echo substr($row["Field"], 4) ?></option>
              <?php
                }
              ?>
            </select>
          </div>
          <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
          <button type = "submit" class = "modalbtn">Generate Report</button>
        </form>
      </div>
    </div>
    <footer class = "footer">
      <p style = "float: left; padding-left: 10px; padding-top: 16px;">University of the Philippines - Baguio Library Inventory System</p>
      <p style = "float: right; padding-right: 10px; padding-top: 16px;">For news and related events visit:
        <a href = "https://www.facebook.com/OfficialUPB"><i class="fab fa-facebook-f"></i></a>
        <a href = "https://web.upb.edu.ph/"><i class="fas fa-globe"></i></a>
        <a href = "https://www.youtube.com/channel/UC1XJ8yRNRuDHmhJXtsLIB_g"><i class="fab fa-youtube"></i></a>
      </p>
    </footer>

    <script type = "text/javascript" src = "js/formhandler.js"></script>
    <script type = "text/javascript" src = "js/update.js"></script>
    <script type = "text/javascript" src = "js/buttons.js"></script>
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

    <script>
    // document.getElementById("rgbtn").onclick = function() {
    //   location.href = "../report/comparison.php";
    // };
    </script>
  </body>
</html>
