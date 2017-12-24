  <section class="row phase-figures text-center">
    <div class="col-sm-12 m-b-10">
      <h2>Collaborative Care Plan</h2>
      <!-- <h5>DX Treatment Example (DX Treatment Example (Cervical Sprain/Strain))</h5> -->
      <?php if ($content[0]['min_visits'] > 0): ?>
        <h5>Target treatment number is <?php echo $content[0]['min_visits']; ?> - <?php echo $content[0]['max_visits']; ?> visits on this diagnosis.</h5>
      <?php endif ?>
      <h2 class="text-center"><strong><?php echo $content[0]['code']; ?>
      <?php if (!empty($content[0]['the_title'])): ?>
        - <?php echo $content[0]['the_title']; ?>
      <?php endif ?>
      </strong></h2>
    </div>  

    <!-- increment phases / 1 accounts for indexes in array -->
    <?php $i = 1; ?>
    <?php foreach ($content as $phase): ?>
      <div class="col-md-3 col-sm-6">
        <div class="phase-figure">
          <h5 class="phase-title"><?php echo $phase['title']; ?></h5>
          <?php if ($phase['wellness_time'] !== null): ?>
            <p><?php echo $phase['wellness_time']; ?></p>
            <hr>
          <?php endif; ?>
          <?php if ($phase['chiro_max']): ?>
            <h4>Chiro</h4>
            <p><?php echo $phase['chiro_min'] ?> - <?php echo $phase['chiro_max']; ?> Sessions</p>  
          <?php endif; ?>

          <?php if ($phase['massage_max']): ?>
            <h4>Soft Tissue Therapy/Acu</h4>
            <p><?php echo $phase['massage_min'] ?> - <?php echo $phase['massage_max']; ?> Sessions</p>
          <?php endif; ?>

          <?php if($phase['pt_max']) : ?>
            <h4>PT</h4>
            <p><?php echo $phase['pt_min'] ?> - <?php echo $phase['pt_max'] ?> Sessions</p>
          <?php endif; ?>
          
          <a href="" class="btn btn-primary btn-secondary btn-overview" data-service="phase<?php echo $i++; ?>">Overview</a>
          <a href="" class="btn btn-primary">Print</a>
        </div>
      </div>  
    <?php endforeach; ?>

  <!--  <ul class="col-sm-12 m-l-20 m-t-20 text-left">
      <li>Max number of visits is 30 visits over 60 days.</li>
    </ul> -->
    
</section>