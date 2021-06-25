<?php
  session_start();
  if(!(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"])){
    header("location: ../logout.php");
  }
  require '../config.php';
  $sql = "SELECT * FROM STAFF WHERE staff_id = " . $_SESSION['staff_id'];
  $result = $conn->query($sql);
  $staff = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/ico" href="../favicon.ico">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content = "ie=edge">
    <title>Dashboard</title>
    <link rel = "stylesheet" type = "text/css" href = "../css/fontawesome/css/all.min.css">
    <link rel = "stylesheet" href = "../css/normalize.css">
    <link rel = "stylesheet" href ="../css/index.css">
    <link rel = "stylesheet" href ="../css/todo.css">
    <link rel = "stylesheet" href ="../css/modals.css">
    <link rel = "stylesheet" href ="../css/loading.css">
    <link rel = "stylesheet" href ="../css/animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class = "left-logo">
      <img src = "../img/logo.ico">
    </div>
    <div class = "sidebar" id = "sidebar">
      <div class = "sidebar-avatar">
        <img src = "../img/avatar.svg" alt = "">
        <h2><?php echo $staff["staff_firstname"]?> <?php echo $staff["staff_lastname"]?></h2>
      </div><br>
      <a href = "javascript:void(0)" class = "closebutton" onclick = "closeNav()"><i class="fas fa-times"></i></a>
      <a href = "#" id = "staff-edit-form"><i class="fas fa-user-alt" style = "padding: 0 32px;"></i>Edit Profile</a>
      <a href = "#" class="backup" data-directory = "../backup/"><i class="fas fa-cloud-download-alt" style = "padding: 0 30px;"></i>Create Backup</a>
      <a href = "../img/User Manual.pdf" target = "_blank"><i class="fas fa-book" style = "padding: 0 34px;"></i>User Manual</a>
      <a href = "../logout.php" class = "logout"><i class="fas fa-sign-out-alt" style = "padding: 0 30px;"></i>Logout</a></button>
    </div>
    <div id = "main">
      <div id="loading-cover"></div>
      <div class = "wrapper">
        <nav class = "nav">
          <ul class = "nav__list" role = "menubar">
            <li class = "nav__item nav__item--isActive">
              <div class = "tooltip">
                <span class = "tooltiptext-t1">Dashboard</span>
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
            <li class = "nav__item">
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

            <?php
                if($staff['staff_type'] === 'admin'){
            ?>
            <li class = "nav__item"> <!-- Changes -->
              <div class = "tooltip">
                <span class = "tooltiptext-t1">Manage Staff</span>
                <a href = "../staff/index.php" class = "nav__link focus--box-shadow" role = "menuitem" aria-label = "Staff">
                  <svg class = "nav__icon" xmlns = "http://www.w3.org/2000/svg" viewBox = "0 0 24 24" role = "presentation">
                    <path fill = "#6563ff" d = "M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z" />
                  </svg>
                </a>
              </div>
            </li>
            <?php
            }
            ?>
          </ul>
        </nav>
        <main class = "main">
          <header class = "header">
            <div class = "header__wrapper">
              <h1><span class = "h1-admin">Dashboard</span></h1>
              <div class = "profile">
                <button class = "profile__button">
                  <span class = "profile__name"><?php echo $staff["staff_firstname"]?> <?php echo $staff["staff_lastname"]?></span>
                  <img id = "openbutton" onclick = "openNav()" class = "profile__img" src = "../img/avatar.svg" alt = "Profile Picture" loading = "lazy" />
                </button>
              </div>
            </div>
          </header>

          <section class = "section">
            <ul class = "project">
              <li class = "project__item">
                <div class = "team__header">
                  <video autoplay muted controls><source src = "../img/UPB-LIS short video.mp4" type = "video/mp4"></video>
                  <div class = "project__link">
                    <h3>University of the Philippines Baguio - Library Inventory System (UPB-LIS)</h3>
                    <br>
                    <p>The University of the Philippines - Baguio Library Inventory System (UPB-LIS) is a web-based application designed by UPB CS128 students for the exclusive use of the UPB Main Library staff. The software was developed to aid the staff in inventory management and simplify their overall workflow. </br></br>

                    A tailor-made database to handle the thousands of diverse sources the library houses was crafted. Users may easily view, add, or edit materials in the database accompanied with sorting, filtering, and report generation functions for efficient organization of data. </br></br>

                    It also allows manual inventorying (using accession number) and automated inventorying (using barcode scanner) options in its inventory page. All these functions, including more that have not been mentioned, are displayed through a user-friendly and accessible design for its users.
                  </p>
                  </div>
                </div>
              </li>
            </ul>
          </section>

          <section class = "section">
            <ul class = "team">
              <li class = "team__item">
                <div class = "team__link">
                  <h2 style = "text-align: center;">Announcements</h2><br>
                  <div class = "team__header">
                    <?php
                    //Restricted "add announcement" for non-admin users.
                    if($staff['staff_type'] === 'admin'){
                     ?>
                      <div class="inputFields">
                          <button type="submit" id="addBtnAnnounce" class="btn">Add Announcement</button>
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="content">
                    <ul id="announcements">
                    </ul>
                  </div>
                </div>
              </li>
              <li class = "team__item">
                <div class = "calendar-container">
                  <div class = "calendar">
                    <div class = "month">
                      <i class = "fas fa-angle-left prev"></i>
                      <div class = "date">
                        <h1>Calendar</h1>
                        <p></p>
                      </div>
                      <i class = "fas fa-angle-right next"></i>
                    </div>
                    <div class = "weekdays">
                      <div>Sun</div>
                      <div>Mon</div>
                      <div>Tue</div>
                      <div>Wed</div>
                      <div>Thu</div>
                      <div>Fri</div>
                      <div>Sat</div>
                    </div>
                      <div class = "days"></div>
                  </div>
                </div>
              </li>
              <li class = "team__item">
                <div class = "team__link">
                  <h2 style = "text-align: center; font-size: 2em;"><span class = "title">Todo</span>List</h2>
                  <div class = "team__header">                   
                    <div class="inputFields">
                        <input type="text" id="taskValue" placeholder="What do you need to do?">
                        <button type="submit" id="addBtn" class="btn add-button"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="content">
                    <ul id="tasks">
                        <div class = "pending-text"></div>
                    </ul>
                  </div>
                  </div>
                </div>
              </li>
            </ul>
          </section>
        </div>
        <?php
          require "../staff/modal.php";
          require "../backup/modal.php";
          require "modal.php";
          require "modalAnnouncement.php";
        ?>
      </main>
    </div>

    <footer class = "footer">
    <p style = "position: fixed; float: left; padding-left: 10px; padding-top: 16px;">University of the Philippines - Baguio Library Inventory System</p>
    <p style = "position: fixed; padding-top: 16px; padding-left: 45%; padding-right: 25%">
      &copy; <a href = "https://www.facebook.com/adrieeeeeeeee" target = "_blank" style = "color: #fff;">Aniban</a> |
      <a href = "https://www.facebook.com/tj.almonia" target = "_blank" style = "color: #fff;">Almonia</a> |
      <a href = "https://www.facebook.com/chrlscrdl" target = "_blank" style = "color: #fff;">Cordial</a> |
      <a href = "https://www.facebook.com/gisselle.derije/" target = "_blank" style = "color: #fff;">Derije</a> |
      <a href = "https://www.facebook.com/leandrei.sagun" target = "_blank" style = "color: #fff;">Sagun</a>
    </p>
    <p style = "float: right; padding-right: 10px; padding-top: 16px;">For news and related events visit:
      <a href = "https://www.facebook.com/upbaguiolibrary" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href = "http://mainlib.upb.edu.ph/" target="_blank"><i class="fas fa-globe"></i></a>
      <a href = "https://www.youtube.com/channel/UCgbOw9h1IXDnqH5SLc_nwFQ" target="_blank"><i class="fab fa-youtube"></i></a>
    </p>
    </footer>

    <script type = "text/javascript" src = "../staff/js/formhandler.js"></script>
    <script type = "text/javascript" src = "../staff/js/buttons.js"></script>
    <script type = "text/javascript" src = "../backup/js/functions.js"></script>
    <script type = "text/javascript" src = "js/script.js"></script>
    <script type = "text/javascript" src = "js/main.js"></script>
    <script type="text/javascript" src = "js/todolist.js"></script>
    <script type="text/javascript" src = "js/announcement.js"></script>
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
