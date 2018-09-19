
//Called when the page has loaded
function addEventListeners()
{
  var chartButton = document.getElementById("chartButton")
  chartButton.addEventListener("click", loading , false);
}


function loading(e)
{
    var loading = '<span class="fa fa-spinner fa-spin fa-5x" style="padding:40px;"></span>' ;
    document.getElementById("content").innerHTML = loading ;
    loadEventsJSON();
}

function loadEventsJSON() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4)  {
      switch(this.status){
        case 200:
          renderJSON(this);
        break ;
        case 404:
          var error = this.status + " " + this.statusText ;
          showError(error) ;
        break ;
        case 500:
          var error = this.status + " " + this.statusText ;
          showError(error) ;
        break ;
      }
    }
  };

  xhttp.open("POST", "get_events.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("type=json");
}


function renderJSON(data)
{
  console.log(data) ;

}



function buildChart(chartData)
{

}


function showError($error)
{
  console.log($error) ;
}


//This function appends the responsive class to topNav on click of the mobile menu. This creates the responsive stacked menu
function showResponsiveMenu()
{
    var topNav = document.getElementById("myTopnav");
    if (topNav.className === "topnav")
    {
        topNav.className += " responsive";
    }
    else
    {
        topNav.className = "topnav";
    }
}
