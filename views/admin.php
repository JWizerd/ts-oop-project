<?php require('./includes/header.php'); ?>
<main>
  <div class="container">
    <div class="row">
      <div class="text-center col-sm-12">
        <h1 class="text-center">Admin Links</h1>
        <div>
          <table class="table">
            <tr>
              <td><a href="/view-users">View Users</a></td>
              <td class="text-left">View all users (username, id, and login count and password)</td>
            </tr>
            <tr>
              <td><a href="/register">Register User</a></td>
              <td class="text-left">Register new users and remove existing users</td>
            </tr>
            <tr>
              <td><a href="/add-diagnosis">Add Diagnosis</a></td>
              <td class="text-left">Add a new diagnosis with content such as diagnosis code (for identification), title of diagnosis and diagnosis biography. <span class="text-danger">Make sure to add phases to each diagnosis as the integrity of the layout depends on the relationship between diagnoses and phases. <a href="/add-phase">Click Here</a> to add a phase now.</span></td>
            </tr>
            <tr>
              <td><a href="/view-diagnoses">View Diagnosis</a></td>
              <td class="text-left">View, Delete and Update Diagnoses</td>
            </tr>
            <tr>
            <tr>
              <td><a href="/add-phase">Add Phase</a></td>
              <td class="text-left">Add phase content for diagnostic i.e. phase 1, phase 1 sessions for chiropractic, massage, acupuncture etc.</td>
            </tr>
              <td><a href="/view-phases">View Phases</a></td>
              <td class="text-left">View, Delete and Update Phases</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
<?php require('./includes/footer.php'); ?>