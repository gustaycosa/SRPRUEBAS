<!DOCTYPE html>
<html>
    <?php include("head-gobernador.php"); ?>
   <style>
        html, body {
          height: 100%;
        }

        body {
          padding: 50px 0 0 0;
        }

        .navbar-toggle {
          float: left;
          margin-left: 15px;
        }

        @media (min-width: 0) {
          .navbar-toggle {
            display: block; /* force showing the toggle */
          }
        }

        @media (min-width: 992px) {
          body {
            padding: 0;
          }
          .navbar {
            right: auto;
            background: none;
            border: none;
          }
        }
    </style>

  <body cz-shortcut-listen="true">
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
      <a class="navmenu-brand" href="#">Project name</a>
      <ul class="nav navmenu-nav">
        <li><a href="../navmenu/">Slide in</a></li>
        <li class="active"><a href="./">Push</a></li>
        <li><a href="../navmenu-reveal/">Reveal</a></li>
        <li><a href="../navbar-offcanvas/">Off canvas navbar</a></li>
      </ul>
      <ul class="nav navmenu-nav">
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu navmenu-nav">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="navbar navbar-default navbar-fixed-top">
      <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="container">
      <div class="page-header">
        <h1>Off Canvas Push Menu Template</h1>
      </div>
      <p class="lead">This example demonstrates the use of the offcanvas plugin with a push effect.</p>
      <p>You get the push effect by setting the <code>canvas</code> option to 'body'.</p>
      <p>Also take a look at the example for a navmenu with <a href="../navmenu">slide in effect</a> and <a href="../navmenu-reveal">reveal effect</a>.</p>
    </div><!-- /.container -->

          <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="../../dist/js/jasny-bootstrap.min.js"></script>
    <script src="../../../js/offcanvas.js"></script>
    <?php include("script-gobernador.php"); ?>
</body>

</html>
