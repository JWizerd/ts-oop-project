<?php require('./includes/header.php'); ?>
      
      <main>
        <div class="container content-wrapper">
          <h1 class="text-center">Update Diagnosis <?php echo $diagnosis['code']; ?> <?php echo $diagnosis['id']; ?></h1>
          <div class="row inner">
            <div class="diagnosis-form-wrapper">
              <form method="POST" action="/edit-diagnoses">

                <input type="hidden" name="id" class="form-control" value="<?php echo $diagnosis['id']; ?>">
                
                <h2>Code</h2>
                <div class="form-group">
                  <input type="text" name="code" class="form-control" value="<?php echo $diagnosis['code']; ?>">
                </div>


                <h2>Title</h2>
                <div class="form-group">
                  <input type="text" name="the_title" class="form-control" value="<?php echo $diagnosis['the_title']; ?>">
                </div>
                
                <h2>Visits</h2>
                <div class="form-group">
                  <label for="min_visits">Enter minimum sessions visits for Diagnosis</label>
                  <input type="number" class="form-control" name="min_visits" value="<?php echo $diagnosis['min_visits']; ?>">
                </div>
                <div class="form-group">
                  <label for="max_visits">Enter maximum sessions visits for Diagnosis</label>
                  <input type="number" class="form-control" name="max_visits" value="<?php echo $diagnosis['max_visits']; ?>">
                </div>
            
                <h2>Chiropractic Overview</h2>
                <hr>
                <div class="well">
                  <h3>Description</h3>
                  <div class="form-group">
                    <textarea id="" name="chiro_overview" cols="30" rows="10"><?php echo $diagnosis['chiro_overview']; ?></textarea>
                  </div>
                </div>
                <!--  End Chriopractic Overview -->

                <h2>Massage Overview</h2>
                <hr>
                <div class="well">
                  <h3>Description</h3>
                  <div class="form-group">
                    <textarea id="" name="massage_overview" cols="30" rows="10"><?php echo $diagnosis['massage_overview']; ?></textarea>
                  </div>
                </div>
                <!--  End Massage Overview -->
                
                <h2>Acupuncture Overview</h2>
                <hr>
                <div class="well">
                  <h3>Description</h3>
                  <div class="form-group">
                    <textarea id="" name="acupuncture_overview" cols="30" rows="10"><?php echo $diagnosis['acu_overview']; ?></textarea>
                  </div>
                </div>
                <!--  End Acu Overview -->

                <h2>Physical Therapy Overview</h2>
                <hr>
                <div class="well">
                  <h3>Description</h3>
                  <div class="form-group">
                    <textarea id="" name="pt_overview" cols="30" rows="10"><?php echo $diagnosis['pt_overview']; ?></textarea>
                  </div>
                </div>
                <!--  End Chriopractic Overview -->

                <input type="submit" class="btn btn-primary form-control"></input>
              </form>
            </div>  
          </div>
        </div>
      </main>

      <?php
      /** 
       * @todo Replace API Key with your own as explained in TinyMCE documentation: https://www.tinymce.com/docs/get-started-cloud/editor-and-features/ 
      **/
      ?>
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=zu1wqhfyqrym6mj58ggkvhqphy8iumc94x5ud6tlmnxhrqk7"></script>
      <script>
        tinymce.init({ selector:'textarea' });
      </script>
<?php require('./includes/footer.php'); ?>