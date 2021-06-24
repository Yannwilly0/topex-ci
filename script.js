/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 
    (function($) {
   

    // Add active state to sidbar nav links
    /*
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

   
})(jQuery);
*/
$(document).ready(function() {
    "use strict";
            $('.confirmation').on('click', function () {
                return confirm('Voulez-vous générer un nouveau mot de passe pour cet utilisateur ?');
            });
            $(".toast").toast('show');
            
            $('#dataTable').DataTable({
            
                    
                "ordering": false,    // Ordering (Sorting on Each Column)will Be Disabled
            
                    //"info": false,         // Will show "1 to n of n entries" Text at bottom
            
                    "lengthChange": false ,// Will Disabled Record number per page
                    //"scrollY":        "200px",
                    //"scrollCollapse": true,
                    "iDisplayLength": 30,  
            });
            $('#dataTable').on( 'click', 'tbody tr', function () {
                window.location.href = $(this).data('href');
            });
            $('select').selectpicker();
            $("#sidebarToggle").on("click", function(e) {
                e.preventDefault();
                $("body").toggleClass("sb-sidenav-toggled");
            });

            $(".fav").click(function() {
                $(this).toggleClass('fa-bookmark-o');
                $(this).toggleClass('fa-bookmark');
            });

           


            //CHART JS

var ctx = document.getElementById('myChart');
percentage.push(100);
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          //labels: ['Maths', 'Ang', 'HG', 'Fr', 'SVT', 'PHY','EPS','PHILO','ALL'],
          labels: subjects,
          datasets: [{
              label: '% presences par matières',
              //data: [60, 79, 53, 75, 46, 83,78,55,90,100],
              data: percentage,
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              borderColor: 'rgba(54, 162, 235, 0.2)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });

  });
  
  