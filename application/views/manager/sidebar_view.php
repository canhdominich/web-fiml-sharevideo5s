<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/vendor/css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <p style="color: #fff; text-transform: uppercase; font-weight: bold;"> <?php echo $_SESSION['username'][0]['author']; ?></p>
            </li>
            <li>
                <div class="dashboard"><?php echo $_SESSION['username'][0]['author'];?></div>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/myvideo">Manager Videos</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/sharelinkvideo">Manager Videos Link</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/contact">Contact</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/C_Account/logout">Log out</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Bootstrap core JavaScript -->


    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>