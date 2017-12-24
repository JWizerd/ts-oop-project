<?php require('./includes/header.php'); ?>
      <main>
        <div class="container content-wrapper">
          <h1 class="text-center">Update Phase</h1>
          <div class="row inner">
            <div class="diagnosis-form-wrapper">
              <form method="POST" action="/edit-phase">
              	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"> 
                <hr>
                <div class="well">
                  <h3>Phase Title</h3>
                  <div class="form-group">
                    <label for="title">Title for phase (i.e. phase 1, phase 2, health maintenance)</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $phase['title']; ?>">
                  </div>
                  <h3>Wellness Time (i.e. 0-10 days [0-33% wellness])</h3>
                  <div class="form-group">
                    <input type="text" class="form-control" name="wellness_time" value="<?php echo $phase['wellness_time']; ?>">
                  </div>
                  <h3>Chiro</h3>
                  <div class="form-group">
                    <label for="chiro_min">Minimum sessions for Chiropractic Sessions</label>
                    <input type="number" class="form-control" name="chiro_min" value="<?php echo $phase['chiro_min']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="chiro_max">Maximum sessions for Chiropractic Sessions</label>
                    <input type="number" class="form-control" name="chiro_max" value="<?php echo $phase['chiro_max']; ?>">
                  </div>
                  <h3>Massage/Acu</h3>
                  <div class="form-group">
                    <label for="massage_min">Enter minimum sessions for Massage Sessions</label>
                    <input type="number" class="form-control" name="massage_min" value="<?php echo $phase['massage_min']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="massage_max">Enter maximum sessions for Massage Sessions</label>
                    <input type="number" class="form-control" name="massage_max" value="<?php echo $phase['massage_max']; ?>">
                  </div>
                  <h3>Physical Therapy</h3>
                  <div class="form-group">
                    <label for="pt_min">Enter minimum sessions for Physical Therapy Sessions</label>
                    <input type="number" class="form-control" name="pt_min" value="<?php echo $phase['pt_min']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="pt_max">Enter maximum sessions for Physical Therapy Sessions</label>
                    <input type="number" class="form-control" name="pt_max" value="<?php echo $phase['pt_max'] ?>">
                  </div>
                  <h3>Description</h3>
                  <p class="text-danger"><strong>Since Health Maintenance doesn't appear to have phases you can just simply fill out the description below.</strong></p>
                  <div class="form-group">
                    <textarea class="form-control" id="" name="description" cols="30" rows="10"><?php echo html_entity_decode($phase['description']); ?></textarea>
                  </div>
                </div>
                <input type="submit" name="update-phase" class="btn btn-primary form-control"></input>
              </form><!-- phase form -->
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