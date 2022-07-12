<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="" class="nav-link px-2 text-secondary">Home</a></li>
        </ul>

        <div class="text-end">
          <?php

          if (isset($_SESSION['credid'])) {
            //tochangelogintologout
            echo "<button type=\"button\" class=\"btn btn-outline-light me-2\" onclick=\"location.href='/student_complaint_system/logoutdata.php'\">Logout</button>";
          } else {
            echo "<button type=\"button\" class=\"btn btn-outline-light me-2\" onclick=\"location.href='/student_complaint_system/login.php'\">Login</button>";
            echo "<button type=\"button\" class=\"btn btn-warning\" onclick=\"location.href='/student_complaint_system/register.php'\">Sign-up</button>";
          }

          ?>
        </div>
      </div>
    </div>
  </header>