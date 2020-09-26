<div id="content-wrap">
    <div class="row">
        <div class="col-2 p-0">
            <?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
        </div>
        <div class="col py-5 " id="dash-container">
            <div class="row justify-content-center">
                <form action="" class="col-md-9 col-lg-8 col-xl-6 border border-light p-5">
                    <div class="text-info text-center mb-5">
                        <h3 class="text-info  mb-4">Bioscoop zaal toevoegen</h3>
                        <div class="form-group">
                            <label class="text-info" for="name">Naam</label>
                            <input type="text" class="form-control" id="name" name="name" required />
                        </div>
                        <div class="form-group">
                            <label class="text-info" for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required />
                        </div>
                        <div class="form-group">
                            <label class="text-info" for="name">Naam</label>
                            <input type="text" class="form-control" id="name" name="name" required />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>