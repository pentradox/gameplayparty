<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>

<div class="col flex-column p-0" id="dash-container">
  <div class="section px-4">
    <div class="intro">
      <div class="text-container">
        <h1>
          Welcome
          <?php echo $_SESSION["username"] ?>
        </h1>
      </div>
    </div>

    <div class="row mt-5 mr-auto">
    <div class="col-md-8">
    

    <section id="auth-button"></section>
<section id="view-selector"></section>
<section id="timeline"></section>




    </div>
    <?php 
   

if($_SESSION["roles"] == 1){
  echo'

  <div class="col-md-4">
    <div class="row">
      <div class="col-md-6">

        <div class="card">
          <div class="card-body">
            <i class="fa fa-id-card" aria-hidden="true"></i>
            <p class="card-text">Pagina`s aanpassen</p>
            <a href=" '.URLROOT.'/Dashboard/pageOverview" class="btn btn-primary">Klik hier</a>
          </div>
        </div>

      </div>
      <div class="col-md-6">

        <div class="card">
          <div class="card-body">
            <i class="fa fa-id-card" aria-hidden="true"></i>
            <p class="card-text">Pakketen aanmaken</p>
            <a href="'. URLROOT .' /Dashboard/createPacket" class="btn btn-primary">Klik hier</a>
          </div>
        </div>

      </div>';
}else{
  echo'
  

<div class="col-md-6 m-auto ">
  <div class="row">
    <div class="col-md-6">

      <div class="card">
        <div class="card-body">
          <i class="fa fa-id-card" aria-hidden="true"></i>
          <p class="card-text">Acount instellingen</p>
          <a href=" '.URLROOT.'/Dashboard/pageOverview" class="btn btn-primary">Klik hier</a>
        </div>
      </div>

    </div>
    <div class="col-md-6">

      <div class="card">
        <div class="card-body">
          <i class="fa fa-id-card" aria-hidden="true"></i>
          <p class="card-text">Zalen toevoegen</p>
          <a href=" '.URLROOT.'/Dashboard/createhall" class="btn btn-primary">Klik hier</a>
        </div>
      </div>

    </div>
  ';
}

      ?>

      
          <!-- <div class="col-md-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Test</h5>
                <p class="card-text">Test2</p>
                <a href="#" class="btn btn-primary">Test3</a>
              </div>
            </div>

          </div> -->


        </div>
<!-- 
        <div class="row mt-3">
          <div class="col-md-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Test</h5>
                <p class="card-text">Test2</p>
                <a href="#" class="btn btn-primary">Test3</a>
              </div>
            </div> -->

          </div>
          <!-- <div class="col-md-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Test</h5>
                <p class="card-text">Test2</p>
                <a href="#" class="btn btn-primary">Test3</a>
              </div>
            </div> -->

          </div>


        </div>

      </div>

    </div>

      <!-- <?php
      if($_SESSION["roles"] == 1) {
        echo '<form action="' . URLROOT . '/Dashboard/updatecontent" method="POST">';
        //home pagina
        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel*</label>
        <textarea type="text" name="home_title" rows="1" class="form-control" required>' . $data[0][0]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Motto*</label>
        <textarea type="text" rows="3" name="home_text" class="form-control" required>'  . $data[0][0]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel Sectie 1*</label>
        <textarea type="text" rows="1" name="home_section_1_title" class="form-control" required>'  . $data[0][1]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Sectie 1*</label>
        <textarea type="text" rows="3" name="home_section_1_text" class="form-control" required>'  . $data[0][1]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel Sectie 2*</label>
        <textarea type="text" rows="1" name="home_section_2_title" class="form-control" required>'  . $data[0][2]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Sectie 2*</label>
        <textarea type="text" rows="3" name="home_section_2_text" class="form-control" required>'  . $data[0][2]->text . '</textarea>';
        echo'</div>';

        //contact pagina
        echo '<label class="text-info" for="hall_number">Contact Pagina Titel*</label>
        <textarea type="text" name="contact_title" rows="1" class="form-control" required>' . $data[1][0]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Contact Pagina beschrijving*</label>
        <textarea type="text" rows="3" name="contact_text" class="form-control" required>'  . $data[1][0]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Contact Pagina Titel Sectie 1*</label>
        <textarea type="text" rows="1" name="contact_section_1_title" class="form-control" required>'  . $data[1][1]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">contact Pagina Sectie 1*</label>
        <textarea type="text" rows="3" name="contact_section_1_text" class="form-control" required>'  . $data[1][1]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">contact Pagina Titel Sectie 2*</label>
        <textarea type="text" rows="1" name="contact_section_2_title" class="form-control" required>'  . $data[1][2]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">contact Pagina Sectie 2*</label>
        <textarea type="text" rows="3" name="contact_section_2_text" class="form-control" required>'  . $data[1][2]->text . '</textarea>';
        echo'</div>';

        echo '<button class="btn btn-info btn-block mt-5" type="submit">Update</button>';
        echo "</form>";
      }
      ?> -->
    </div>
    <!-- <div class="row">
      <div class="col-md-4">
        <h3>HIER1</h3>
      </div>

      <div class="col-md-4">
        <h3>HIER2</h3>
      </div>

      <div class="col-md-4">
        <h3>HIER3</h3>
      </div>

    </div> -->

  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
	crossorigin="anonymous">
</script>
<script src="<?php echo URLROOT; ?>/js/wysiwyg.js"></script>
<script src="<?php echo URLROOT; ?>/js/cardNav.js"></script>


<script>
(function(w,d,s,g,js,fjs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
}(window,document,'script'));
</script>
<script>
gapi.analytics.ready(function() {

  // Step 3: Authorize the user.

  var CLIENT_ID = '643022025064-3j7s0hik7ua7gg4g2akds4bs69794roq.apps.googleusercontent.com';

  gapi.analytics.auth.authorize({
    container: 'auth-button',
    clientid: CLIENT_ID,
  });

  // Step 4: Create the view selector.

  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector'
  });

  // Step 5: Create the timeline chart.

  var timeline = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:sessions',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
    },
    chart: {
      type: 'LINE',
      container: 'timeline'
    }
  });

  // Step 6: Hook up the components to work together.

  gapi.analytics.auth.on('success', function(response) {
    viewSelector.execute();
  });

  viewSelector.on('change', function(ids) {
    var newIds = {
      query: {
        ids: ids
      }
    }
    timeline.set(newIds).execute();
  });
});
</script>
<?php include APPROOT . "/views/fragments/footer.php"; ?>
