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
                <p style="color: orange; text-transform: uppercase; font-weight: bold;">
                    <?php echo $_SESSION['username'][0]['author']; ?>
                </p>
            </li>
            <li>
                <div class="dashboard">WELCOME ADMIN</div>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/admin/category">Category</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/admin/C_Admin_SubCategory">Sub-Category</a>
            </li>
           <!--  <li>
                <a href="<?php echo base_url(); ?>index.php/manager/C_Admin_Video">Videos</a>
            </li> -->
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/admin/system">Videos Manager</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/admin/view/sharelink">Videos Link Manager </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/admin/view/unagreedsharelink">Unapproved Videos Link</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/admin/C_Upload_Image">Upload Image</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/admin/C_Download_Image">Download Image</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/manager/order">User</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>">Back Home</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/admin/logout">Log out</a>
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