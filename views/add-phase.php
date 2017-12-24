<?php require('./includes/header.php'); ?>
      <main>
        <div class="container content-wrapper">
          <h1 class="text-center">Add Phase</h1>
          <div class="row inner">
            <div class="diagnosis-form-wrapper">
              <form method="POST" action="/add-phase">
                <hr>
                <div class="well">
                  <div class="form-group">
                    <label for="code_id">Select Diagnostic Code to Add</p>
                    <select required class="form-control" id="code" name="code_id">
                      <option disabled selected value="">...Select Diagnosis Code</option>
                      <?php foreach ($codes as $row => $field): ?>
                        <option value="<?php echo $field['id']; ?>"><?php echo $field['code'] . " " . $field['the_title']; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <h3>Phase Title</h3>
                  <div class="form-group">
                    <label for="title">Enter title for phase (i.e. phase 1, phase 2, health maintenance)</label>
                    <input type="text" class="form-control" name="title">
                  </div>
                  <h3>Wellness Time (i.e. 0-10 days [0-33% wellness])</h3>
                  <div class="form-group">
                    <input type="text" class="form-control" name="wellness_time">
                  </div>
                  <h3>Chiro</h3>
                  <div class="form-group">
                    <label for="chiro_min">Enter minimum sessions for Chiropractic Sessions</label>
                    <input type="number" class="form-control" name="chiro_min">
                  </div>
                  <div class="form-group">
                    <label for="chiro_max">Enter maximum sessions for Chiropractic Sessions</label>
                    <input type="number" class="form-control" name="chiro_max">
                  </div>
                  <h3>Massage/Acu</h3>
                  <div class="form-group">
                    <label for="massage_min">Enter minimum sessions for Massage Sessions</label>
                    <input type="number" class="form-control" name="massage_min">
                  </div>
                  <div class="form-group">
                    <label for="massage_max">Enter maximum sessions for Massage Sessions</label>
                    <input type="number" class="form-control" name="massage_max">
                  </div>
                  <h3>Physical Therapy</h3>
                  <div class="form-group">
                    <label for="pt_min">Enter minimum sessions for Physical Therapy Sessions</label>
                    <input type="number" class="form-control" name="pt_min">
                  </div>
                  <div class="form-group">
                    <label for="pt_max">Enter maximum sessions for Physical Therapy Sessions</label>
                    <input type="number" class="form-control" name="pt_max">
                  </div>
                  <h3>Description</h3>
                  <p class="text-danger"><strong>Since Health Maintenance doesn't appear to have phases you can just simply fill out the description below.</strong></p>
                  <div class="form-group">
                    <textarea class="form-control" id="" name="description" cols="30" rows="10"></textarea>
                  </div>
                </div>
                <input type="submit" name="add-phase" class="btn btn-primary form-control"></input>
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