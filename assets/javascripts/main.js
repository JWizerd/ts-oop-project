(function($){
  // Immediately Invoked Fucntion Expresion invoked to create a new execution context therefore encapsulating any variables from the global object

  function initState(content, tabs) {
    /* to start hide all service descriptions */
    $(content).addClass('hide-tab')

    /* then show first one on page load */
    $(tabs).removeClass('active')
    $(tabs).first().addClass('active')
    $(content).removeClass('show-tab')
    $(content).first().addClass('show-tab')
  }

  function tabs(content, tabs) {
    initState(content, tabs)
    /* for each tab on click show corresponding service */
    $(tabs).on('click', function(e){
      e.preventDefault();

      var $this = $(this);
      $index = $this.index()

      /* get corresponding service li */
      var service = $(content).get($index)

      $(service).addClass('show-tab')
      .siblings()
      .removeClass('show-tab')

      $this.addClass('active')
      .siblings()
      .removeClass('active')
    })
  }

  function overviewPhaseRelationship() {

    $('.btn-overview').each(function(){

      $(this).on('click', function(e){

        var service = $(this).data('service')
        e.preventDefault();

        var topLocation = $('#tab-content').offset().top

        $("html, body").animate({ scrollTop: topLocation }, 500);

        // set tabs back to first overview tab on click
        initState('.service-descs .service', '.service-tabs-nav li')
        console.log(service)

        // if phase data is equal to btn overview data then show tab
        $('.phase-descs .phase').each(function() {
          if ($(this).data('service') === service) {
            console.log('content - ' + $(this).data('service'))
            $('.phase-descs .phase').removeClass('show-tab')
            $(this).addClass('show-tab')
          }
        })

        // if phase tab data is equal to btn overview data 
        // then add active class to tab
        $('.phase-tabs-nav li').each(function() {
          if ($(this).data('service') === service) {
            console.log('tab - ' + $(this).data('service'))
            $(this).siblings().removeClass('active')
            $(this).addClass('active')
          }
        })

      })

    })

  }

  function destroySessionAfterDuration() {
    var IDLE_TIMEOUT = 1800; //seconds 
    var idleSecondsCounter = 0;
    document.onclick = function() {
        idleSecondsCounter = 0;
    };
    document.onmousemove = function() {
        idleSecondsCounter = 0;
    };
    document.onkeypress = function() {
        idleSecondsCounter = 0;
    };
    window.setInterval(CheckIdleTime, 1000);

    function CheckIdleTime() {
        idleSecondsCounter++;
        if (idleSecondsCounter >= IDLE_TIMEOUT) {
            alert("Time expired due to inactivity. Please login again.");
            document.location.href = "/logout";
        }
    }
  }

  $(document).ready(function() {
    tabs('.service-descs .service', '.service-tabs-nav li')
    tabs('.phase-descs .phase', '.phase-tabs-nav li')
    overviewPhaseRelationship()
    destroySessionAfterDuration()
  })

}(jQuery))
