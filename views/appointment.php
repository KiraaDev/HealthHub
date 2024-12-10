<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./assets/css/tooplate-style.css">
</head>

<body>


    <!-- HEADER -->
    <?php include './layouts/header.php' ?>

    <!-- NAVBAR -->
    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>

                <!-- lOGO TEXT HERE -->
                <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>ealth<i class="fa fa-h-square"></i>ub</a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/HealthHub/#top" class="smoothScroll">Home</a></li>
                    <li><a href="/HealthHub/#about" class="smoothScroll">About Us</a></li>
                    <li><a href="/HealthHub/#team" class="smoothScroll">Doctors</a></li>
                    <li><a href="/HealthHub/#news" class="smoothScroll">News</a></li>
                    <li><a href="/HealthHub/#google-map" class="smoothScroll">Contact</a></li>
                    <li class="appointment-btn"><a href="/HealthHub/appointment">Make an appointment</a></li>
                    <li class="appointment-btn"><a href="/HealthHub/login">Admin Login</a></li>
                </ul>
            </div>

        </div>
    </section>

    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <img src="./assets/images/appointment-image.jpg" class="img-responsive" alt="">
                </div>

                <div class="col-md-6 col-sm-6">
                    <!-- CONTACT FORM HERE -->
                    <form id="appointment-form" role="form" method="POST" action="#">

                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Make an appointment</h2>
                            <!-- Error message -->
                            <?php if (!empty($error)): ?>
                                <div class="error" style="color: red;">
                                    <?php echo htmlspecialchars($error); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Success message -->
                            <?php if (!empty($success)): ?>
                                <div class="success" style="color: green;">
                                    <?php echo htmlspecialchars($success); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <div class="col-md-6 col-sm-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"
                                    value="<?php echo isset($input['name']) ? htmlspecialchars($input['name']) : ''; ?>">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email"
                                    value="<?php echo isset($input['email']) ? htmlspecialchars($input['email']) : ''; ?>">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="date">Select Date</label>
                                <input type="date" name="appointment_date" class="form-control"
                                    value="<?php echo isset($input['appointment_date']) ? htmlspecialchars($input['appointment_date']) : ''; ?>">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="department">Select Department</label>
                                <select class="form-control" name="department">
                                    <option value="General Health" <?php echo isset($_POST['department']) && $_POST['department'] === 'General Health' ? 'selected' : ''; ?>>General Health</option>
                                    <option value="Cardiology" <?php echo isset($_POST['department']) && $_POST['department'] === 'Cardiology' ? 'selected' : ''; ?>>Cardiology</option>
                                    <option value="Dental" <?php echo isset($_POST['department']) && $_POST['department'] === 'Dental' ? 'selected' : ''; ?>>Dental</option>
                                    <option value="Medical Research" <?php echo isset($_POST['department']) && $_POST['department'] === 'Medical Research' ? 'selected' : ''; ?>>Medical Research</option>
                                </select>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="telephone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone"
                                    value="<?php echo isset($input['phone']) ? htmlspecialchars($input['phone']) : ''; ?>">

                                <label for="Message">Additional Message</label>
                                <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                                <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Button</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <!-- SCRIPTS -->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.stellar.min.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/smoothscroll.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
</body>

</html>