<div class="service-tabs m-t-40" id="tab-content">

  <div class="row tabs-nav">
    
    <ul class="service-tabs-nav">
      <li><a href="#" data-service="overview">Overview</a>

      <?php if (!empty($content[0]['chiro_overview'])): ?>
        <li><a href="#" data-service="chiro">Chiropractic</a>
      <?php endif ?>

      <?php if (!empty($content[0]['acu_overview'])): ?>
        <li><a href="#" data-service="acu">Acupuncture</a>
      <?php endif; ?>

      <?php if (!empty($content[0]['massage_overview'])): ?>
        <li><a href="#" data-service="mas">Massage</a>
      <?php endif; ?>

      <?php if (!empty($content[0]['pt_overview'])): ?>
        <li><a href="#" data-service="pt">Physical Therapy</a>
      <?php endif; ?>
    </ul>

  </div>

</div>

<div class="row service-descs">
  <ul>
    <li data-service="overview" class="service">
        <ul class="phase-tabs-nav">
          <?php $i = 1; ?>
          <?php foreach ($content as $phase): ?>
            <?php if (strtolower($phase['title']) != 'health maintenance'): ?>
              <li data-service="phase<?php echo $i; ?>">Phase <?php echo $i; ?>
            <?php else: ?>
              <li data-service="phase<?php echo $i; ?>">Health Maintenance
            <?php endif; ?>
            <?php $i++; ?>
          <?php endforeach ?>
        </ul> 

        <ul class="phase-descs">
          <?php $i = 1; ?>
          <?php foreach ($content as $phase): ?>
            <li data-service="phase<?php echo $i++; ?>" class="phase">
              <?php if (strtolower($phase['title']) != 'health maintenance'): ?>
                <h2><?php echo $phase['title'] ?></h2>
                <p><?php echo html_entity_decode($phase['description']); ?></p>
              <?php else: ?>
                <h2><?php echo $phase['title'] ?></h2>
                <p><?php echo html_entity_decode($phase['description']); ?></p>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
    </li><!-- overview -->
  
    <?php if ($content[0]['chiro_overview']): ?>
      <li data-service="chiro" class="service">
        <h2>Chiropractic</h2>
        <?php echo html_entity_decode($content[0]['chiro_overview']); ?>
      </li>   
    <?php endif ?>

    <?php if (!empty($content[0]['acu_overview'])): ?>
      <li data-service="acu" class="service">
        <h2>Acupuncture</h2>
        <?php echo html_entity_decode($content[0]['acu_overview']); ?>
      </li>   
    <?php endif ?>

    <?php if (!empty($content[0]['massage_overview'])): ?>
      <li data-service="mas" class="service">
        <h2>Massage</h2>
        <?php echo html_entity_decode($content[0]['massage_overview']); ?>
      </li>   
    <?php endif ?>

    <?php if (!empty($content[0]['pt_overview'])): ?>
      <li data-service="pt" class="service">
        <h2>Physical Therapy</h2>
        <?php echo html_entity_decode($content[0]['pt_overview']); ?>
      </li>   
    <?php endif ?>
  </ul>

  </div><!-- service-descs -->