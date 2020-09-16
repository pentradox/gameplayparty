<div class="container-dashboard">
    <?php include APPROOT."/views/fragments/dashboardNav.php"; ?>
        <main>
            <div class="intro">
                <div class="text-container">
                    <h1>Welcome <?php echo $_SESSION["userid"] ?></h1>
                </div>
            </div>
        </main>
     </div>

<?php include APPROOT."/views/fragments/footer.php"; ?>