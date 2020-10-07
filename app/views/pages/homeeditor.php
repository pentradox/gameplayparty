<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card text-center my-4">
        <!-- navigation in .card-header -->
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">

            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tab1">Title</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab2">Slogan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab3">Titel sectie 1</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab4">Descriptie sectie 1</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab5">Titel sectie 2</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab6">Descriptie sectie 2</a>
            </li>

          </ul>
        </div>
        <!-- .card-body.tab-content  -->
        <div class="card-body tab-content">

          <div class="tab-pane fade active" id="tab1">
            <form action="<?php echo URLROOT; ?>/Dashboard/updatecontent" method="POST">
              <textarea type="text" name="home_title" class="textEditor"></textarea>
              <button class="btn btn-primary btn-block mt-4">Update</button>
            </form>
          </div>

          <div class="tab-pane fade" id="tab2">
            <form action="<?php echo URLROOT; ?>/Dashboard/updatecontent" method="POST">
              <textarea type="text" name="home_text" class="textEditor"></textarea>
              <button class="btn btn-primary btn-block mt-4">Update</button>
            </form>
          </div>

          <div class="tab-pane fade" id="tab3">
            <form action="<?php echo URLROOT; ?>/Dashboard/updatecontent" method="POST">
              <textarea type="text" name="section_1_title" class="textEditor"></textarea>
              <button class="btn btn-primary btn-block mt-4">Update</button>
            </form>
          </div>


          <div class="tab-pane fade" id="tab4">
            <textarea type="text" name="section_1_text" class="textEditor"></textarea>
            <button class="btn btn-primary btn-block mt-4">Update</button>
          </div>

          <div class="tab-pane fade" id="tab5">
            <textarea type="text" name="section_2_title" class="textEditor"></textarea>
            <button class="btn btn-primary btn-block mt-4">Update</button>
          </div>

          <div class="tab-pane fade" id="tab6">
            <textarea type="text" name="section_2_text" class="textEditor"></textarea>
            <button class="btn btn-primary btn-block mt-4">Update</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include APPROOT . "/views/fragments/footer.php"; ?>