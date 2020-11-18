<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart Animation</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" type="text/javascript"></script>


    

  
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

    <script src="./dropzone/dist/dropzone.js"></script>
    <script src="js/jscolor.js"></script>
    
    <link rel="stylesheet" type="text/css" href="./dropzone/dist/dropzone.css">
    
   
    <link rel="stylesheet" href="css/style.css">
    
    <script src="js/chartjs-plugin-watermark.js"></script>


    <link rel="apple-touch-icon" sizes="57x57" href="source/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="source/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="source/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="source/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="source/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="source/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="source/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="source/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="source/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="source/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="source/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="source/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="source/favicon-16x16.png">
    <link rel="manifest" href="source/manifest.json">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="source/ms-icon-144x144.png">
    <meta name="theme-color" content="#FFFFFF">
</head>


<body>
    <div id="loader-cont">
        <div class="loader"></div>
    </div>
    

   <!-- <?php include("navbar.php"); ?> 
   -->
   <div style="background: #00aeef; border:1px solid #00aeef; border-radius:4px; margin-bottom: 30px; 
    align-items: center;
    justify-content: center; box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25); margin-right: 24px; ">
    
     
   <h1 id="hTitle" class="header-text">Capture Chart Animation</h1>
   </div>
    <div class="row">
       <div class="columnl">
      
       <div class="chart column-left">
       <div style=" border:4px solid #fff; border-radius:4px; box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25); margin-bottom:10px;">
         <canvas id="myChart"></canvas>
         </div>
         <br>
         

         <div style=" text-align:center; border:4px solid #fafafa; border-radius:4px; padding-top:10px; padding-bottom: 10px; padding-left:10px; background:#fafafa; box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25);" >
         

         <input class="button-opt" type="button" value="Update chart" id="chart-data-btn">
     <form action="download.php" id="download-form" method="post" class="download-button-form">
        <input type="hidden" name="filename" value="" id="input-filename">
        <!-- <input type="submit" value="Download Video"> -->
    </form>
    <button id="video-download" class="generateButton button-opt">Generate video</button>
    <br>
    
    
</div>


          <br>
          <br>
          <div style="border:4px solid #fafafa; border-radius:4px; padding:10px; background: #fafafa; box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25);">
         <label for="column-data" class="text">Datasets values and labels:</label> <br>
           
           
           
           <!--   <input type="button" value="-" id="remove-data-column" onclick="removeNewDataColumn()"> -->
            

              <input type="text" name="column-data" id="chart-data-0" value="20, 10, 30, 25">
              <input type="text" id="legend-data-0" value= "Population (milions)">
              <input data-jscolor="" id="color-0" value="#4caf50">
              <hr id="hr0">
              
              <br>
              <br>
              

              <input type="text" name="column-data" id="chart-data-1" value="40, 20, 35, 30">
              <input type="text" id="legend-data-1" value= "Population (milions)">
              <input data-jscolor="" id="color-1" value="#00aeef">
              <button id="1" onClick='reply_click(this.id)' class='minusButton'>-</button>
              <hr id="hr1">
              
              <div id="br1">
              <br>
              <br>
              </div>
              

              <input type="text" name="column-data" id="chart-data-2" value="25, 45, 10, 15">
              <input type="text" id="legend-data-2" value= "Population (milions)">
              <input data-jscolor="" id="color-2" value="#e90c0c">
              <button id="2" onClick='reply_click(this.id)' class='minusButton'>-</button>
          
              <hr id="hr2">
              
              
              <div id="br2">
              <br>
              <br>
              </div>
              
              
   
              <div class="dataColumns">
     
              </div>

              <input type="button" value="+" id="add-data-column" onclick="addNewDataColumn()">
       </div>
    </div>
    </div>

       <div class="columnr">
           <div class="column-right">
           <div style=" border: 1px solid white; padding: 10px; border-radius: 4px; background:#fff; box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25);">
           <label for="chart-title" class="text">Question:</label> <br>
           <input type="text" id="input" value= "Enter question">
           <label for="chart-title" class="text">Question font:  <span id="demoQuestionFont"></span> px</label> <br>
           <input type="range" min="6" max="50" value="14" class="slider" id="myQuestionFont"> 
           <br>
           <br>
           </div>

           <br>

           <div style=" border: 1px solid white; padding: 10px; border-radius: 4px; background:#fff ;box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25);">
           <label for="chart-labels" class="text">Column names:</label> <br>
           <input type="text" name="chart-labels" id="chart-labels" value="Europe,Africa,Asia,America">
           <label for="chart-title" class="text">Column names font:<span id="demoColumnNamesFont"></span> px</label> <br>
           <input type="range" min="6" max="50" value="14" class="slider" id="myColumnNamesFont">
           <br>
           <br>
           </div>

           <br>
           <div style=" border: 1px solid white; padding: 10px; border-radius: 4px;background:#fff; box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25);">
           <label for="chart-title" class="text">Y-axes font:<span id="demoYaxesFont"></span> px</label> <br>
           <input type="range" min="6" max="50" value="14" class="slider" id="myYaxesFont">
           </div>
           
           <br>
           <!--
           <div style=" border: 1px solid white; padding: 10px; border-radius: 4px;background:#fff">
           <label for="chart-title" class="text">Legend font:<span id="demoLegendFont"></span> px</label> <br>
           <input type="range" min="6" max="50" value="14" class="slider" id="myLegendFont">
           </div>       
           <br>
            -->
           <div style=" border: 1px solid white; padding: 10px; border-radius: 4px;background:#fff; box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25);">
           <label for="chart-title" class="text">Chart-datasets-label font:<span id="demomyChartDatasetsFont"></span> px</label> <br>
           <input type="range" min="6" max="50" value="14" class="slider" id="myChartDatasetsFont">
           </div>       
           <br>

           <div style=" border: 1px solid white; padding: 10px; border-radius: 4px;background:#fff; box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25);">
           <label for="chart-animation" class="text">Animation duration (s):</label> <br>
           <input type="text" name="chart-animation" id="chartanimation" value="1">
           <br>
           <br>

           <label for="chart-animation-type" class="text">Animation type:</label> <br>
           <select name="forma" onchange="changeAnimation()" id="animation-changer">
              <option value="linear">Linear</option>
              <option value="easeInQuad">EaseInQuad</option>
              <option value="easeOutQuad">EaseOutQuad</option>
              <option value="easeInExpo">EaseInExpo</option>
              <option value="easeOutExpo">EaseOutExpo</option>
              <option value="easeInCirc">EaseInCirc</option>
              <option value="easeOutCirc">EaseOutCirc</option>
              <option value="easeInElastic">EaseInElastic</option>
              <option value="easeOutElastic">EaseOutElastic</option>
              <option value="easeInOutBounce">EaseInOutBounce</option>
           </select>
           <br>
           <br>

           <label for="chart-type" class="text">Chart type:</label> <br>
           <select name="forma" onchange="changeChart()" id="chart-changer">
              <option value="bar">BarChart</option>
              <option value="doughnut">DoughnutChart</option>
              <option value="line">LineChart</option>
           </select>




    <br>
    <br>

    <label class="text"  style="" >Percentage:</label> 
     <label class="switch2">
  <input type="checkbox" id="checkBoxPercentage" value="false">
  <span class="slider2 round">  </span>
</label>


<br>
<br>

    <label for="background-color" class="text">Background color:</label> <br>
    <input data-jscolor='' onchange="update(this.jscolor)" value="ffffff">
     <br>
     <br>

     </div>

    
     
    <!-- Chart color: <input data-jscolor="" value="ab2567"> 

    
     <br>
     <br>

     

--> 
<br>
<div style=" border: 1px solid white; padding: 10px; border-radius: 4px; background:#fff; box-shadow: 5px 5px 3px 0px rgba(0,0,0,0.25);">
<label class="text">Logo selector:</label>

<select name="cars" id="carrier" onchange="changeSelector()">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select>


<!-- <br> -->
<input type="button" id="clearBtn" value="Remove selected logo" style="width:50%" onclick="clearLogo()">
<br>



<div class="slidecontainer">
    <lanrl class="text">Logos Height: <span id="demo"></span> pixels</label>
    <input type="range" min="50" max="250" value="150" class="slider" id="myRange">
  
</div>

<br>



<form action="/uploadLogoImage.php"
     id="my-dropzone"
      class="dropzone"
      id="my-awesome-dropzone"></form>

<br>



   <div class="row3">
  <div class="column3">
  <img src="source/logo/newimage1.png" onerror="this.src='source/logo/defaultlogo.png';"  width="50" height="50" alt="Logo 1" id="imglogo1">
  </div>
  
  <div class="column3">
  <img src="source/logo/newimage2.png" onerror="this.src='source/logo/defaultlogo.png';"  width="50" height="50" alt="Logo 2" id="imglogo2">
  </div>
  
  <div class="column3">
  <img src="source/logo/newimage3.png" onerror="this.src='source/logo/defaultlogo.png';"  width="50" height="50" alt="Logo 3" id="imglogo3">
  </div>
  </div>
  <br>
  <input class="button-opt" type="button" id="uploadBtn" value="Save logos"  onclick="uploadLogo()">
</div>


<br>


<!--<input type="button" id="mergeBtn" value="Merge"  onclick="mergeLogo()">-->

    
 <br>
<!--
     <input class="button-opt" type="button" value="Update chart" id="chart-data-btn">
     <form action="download.php" id="download-form" method="post" class="download-button-form">
        <input type="hidden" name="filename" value="" id="input-filename"> 
        -->

        <!-- <input type="submit" value="Download Video"> -->
        <!--
    </form>
    <button id="video-download" class="generateButton button-opt">Generate video</button>
-->
    </div>
    </div>
   </div>

   

    <script>
    
   //LOGO PIXEL SLIDER 
    var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
var sliderVal=150;

output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
  sliderVal=this.value;
}

//LEGEND PIXEL SLIDER
var sliderQuestionFont = document.getElementById("myQuestionFont");
var outputQuestionFont = document.getElementById("demoQuestionFont");
var sliderValQuestionFont=14;

outputQuestionFont.innerHTML = sliderQuestionFont.value;

sliderQuestionFont.oninput = function() {
  outputQuestionFont.innerHTML = this.value;
  sliderValQuestionFont=this.value
}


//COLUMN NAMES PIXEL SLIDER
var sliderColumnNamesFont = document.getElementById("myColumnNamesFont");
var outputColumnNamesFont = document.getElementById("demoColumnNamesFont");
var sliderValColumnNamesFont=14;

outputColumnNamesFont.innerHTML = sliderColumnNamesFont.value;

sliderColumnNamesFont.oninput = function() {
  outputColumnNamesFont.innerHTML = this.value;
  sliderValColumnNamesFont=this.value
}

//LEGEND PIXEL SLIDER
/*
var sliderLegendFont = document.getElementById("myLegendFont");
var outputLegendFont = document.getElementById("demoLegendFont");
var sliderValLegendFont=14;

outputLegendFont.innerHTML = sliderLegendFont.value;

sliderLegendFont.oninput = function() {
  outputLegendFont.innerHTML = this.value;
  sliderValLegendFont=this.value
 
}

*/


//YAXES FONT

var sliderYaxesFont = document.getElementById("myYaxesFont");
var outputYaxesFont = document.getElementById("demoYaxesFont");
var sliderValYaxesFont=14;

outputYaxesFont.innerHTML = sliderYaxesFont.value;

sliderYaxesFont.oninput = function() {
  outputYaxesFont.innerHTML = this.value;
  sliderValYaxesFont=this.value
}


//CHART DATASETS FONT

var sliderChartDatasetsFont = document.getElementById("myChartDatasetsFont");
var outputChartDatasetsFont = document.getElementById("demomyChartDatasetsFont");
var sliderValChartDatasetsFont=14;

outputChartDatasetsFont.innerHTML = sliderChartDatasetsFont.value;

sliderChartDatasetsFont.oninput = function() {
  outputChartDatasetsFont.innerHTML = this.value;
  sliderValChartDatasetsFont=this.value
}




      var maximum;

      var logoCounter=1;

function changeSelector(){
   logoCounter =$('#carrier').find(":selected").val();
   console.log(logoCounter);
}
/*
      function count(){
        return logoCounter;
      }

      function displayCounter(){
        document.getElementById("carrier").innerHTML= count();
      }

      function plusLogo(){
        if(logoCounter < 3){
          logoCounter++;
        }
        displayCounter();
        console.log(logoCounter);
      }

      function minusLogo(){
        if(logoCounter > 1){
          logoCounter--;
        }
        displayCounter();
        console.log(logoCounter);
      }

*/

      

      
var srcLogo;
Dropzone.options.myDropzone = {
  maxFiles:1,
  acceptedFiles: 'image/png',
  init: function() {
    this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
      });
        this.on("thumbnail", function(file) {
          srcLogo= file.dataURL;
         //   console.log(file.dataURL); // will send to console all available props
            file.previewElement.addEventListener("click", function() {
               console.log(file.name);
            });
        });
  }
};








/*
Dropzone.options.myDropzone = {
  maxFiles: 1,
  accept: function(file, done) {
    console.log("uploaded");
    done();
  },
  init: function() {
    this.on("maxfilesexceeded", function(file){
        alert("No more files please!");
    });
  }
};*/
// document.getElementById("chart-playagain-btn").onclick = function() { 
    
//     var ctx = document.getElementById("myChart").getContext("2d");

//      // Remove the old chart and all its event handles
//      if (chart) {
//        chart.destroy();
//      }

// // Chart.js modifies the object you pass in. Pass a copy of the object so we can use the original object later
//     var temp = jQuery.extend(true, {}, chart.config);
//     temp.type =$('#chart-changer').find(":selected").val();;
//     chart = new Chart(ctx, temp)

  

 input.oninput = function() {
   // hTitle.innerHTML = input.value;
  
   chart.options.title.text= input.value;

  };

  $("#checkBoxPercentage").on('change', function() {
    
  if ($(this).is(':checked')) {
    $(this).attr('value', 'true');
    chart.options.scales.yAxes[0].ticks.callback= function (tick) {
                return tick.toString()+ "%";
              };


    chart.options.plugins.datalabels.formatter = function (value) {
            return Math.round(value) + "%";
          }
    chart.options.scales.yAxes[0].ticks.max= 100;

    if("line" == ($('#chart-changer').find(":selected").val())){
  arrayCounter.forEach((element) => {

  chart.options.plugins.datalabels.formatter = function (value) {
            return Math.round(value);
          }
  
  });
}
    chart.update();
  } else {
    $(this).attr('value', 'false');
    find_max_value();

    chart.options.plugins.datalabels.formatter = function (value) {
            return Math.round(value);
          }

    chart.options.scales.yAxes[0].ticks.callback= function (tick) {
                return tick.toString();
              };
              chart.options.scales.yAxes[0].ticks.max= defaultmaximum;
    chart.update();
    
   
  }});



var arrayCounter= [0,1,2];
 var i= 2; 
 function addNewDataColumn(){
i++;
arrayCounter.push(i);
console.log(arrayCounter);
//  console.log(b);
  $(".dataColumns").append( "</p><input type='text' name='column-data' id='chart-data-"+i+"' value='20, 10, 30, 50'>  <input type='text' id='legend-data-"+i+"' value= 'Population (milions)'> <input class='jscolor' id='color-"+i+"' value= '#00aeef'> <button id="+i+" onClick='reply_click(this.id)' class='minusButton'>-</button> <hr id='hr"+i+"'> <div id='br"+i+"'><br><br> </div>");
   var color = new jscolor($(".dataColumns").find('input.jscolor:last')[0]);0
}

function remove(array, element) {
  
  var element2=parseInt(element);
  
  const index = array.indexOf(element2);
  array.splice(index, 1);



  let removalIndex = chart.data.datasets.indexOf(element2); //Locate index of ds1

   chart.data.datasets.splice(removalIndex+1, 1);

  
}

function reply_click(clicked_id)
  {
      // alert(clicked_id);

      var element = document.getElementById("chart-data-" + clicked_id);
    element.parentNode.removeChild(element);
    var element1 = document.getElementById("legend-data-" + clicked_id);
    element1.parentNode.removeChild(element1);
    var element2 = document.getElementById("color-" + clicked_id);
    element2.parentNode.removeChild(element2);
    var element3 = document.getElementById(""+clicked_id+"");
    element3.parentNode.removeChild(element3);
    var element4 = document.getElementById("hr"+clicked_id);
    element4.parentNode.removeChild(element4);
    var element5 = document.getElementById("br"+clicked_id);
    element5.parentNode.removeChild(element5);
    
    
    remove(arrayCounter, clicked_id);
    
  }

  
  function find_max_value(){
    maximum=0;
    arrayCounter.forEach((element) => {
    var newData = $("#chart-data-" + element + "").val();
    newData.replace(/\s/g, "");
    newData = newData.split(",");
    newData.forEach((element) => {
      element = parseFloat(element);
      if(element > maximum){
        maximum=element;
      }
    });
  })
  defaultmaximum= maximum;
  console.log(maximum);
}



  var invoke_make_blank = true;

    if (invoke_make_blank)
    {
        
      document.getElementById('myChart').style.backgroundColor = '#fff';  
       Chart.plugins.register({
         beforeDraw: function(chartInstance) {
           var ctx = chartInstance.chart.ctx;
             ctx.fillStyle = '#fff';
           ctx.fillRect(0, 0, chartInstance.chart.width, chartInstance.chart.height);
         }
     });
        invoke_make_blank = false;
       
    }



 




function update(jscolor) {
    // 'jscolor' instance can be used as a string
    Chart.plugins.register({
        beforeDraw: function(chartInstance) {
            var ctx = chartInstance.chart.ctx;
            ctx.fillStyle = '#' + jscolor;
            ctx.fillRect(0, 0, chartInstance.chart.width, chartInstance.chart.height);
        }
    });
    chart.update();
    document.getElementById('myChart').style.backgroundColor = '#' + jscolor;
}






function changeChart(){

  if("doughnut" == ($('#chart-changer').find(":selected").val())){
  arrayCounter.forEach((element) => {

    //console.log("av av" + element);
  chart.data.datasets[element].borderColor= "#fff";

  chart.options.scales.xAxes[0].gridLines.drawBorder=false;
  chart.options.scales.xAxes[0].ticks.display=false;
  chart.options.scales.yAxes[0].gridLines.drawBorder=false;
  chart.options.scales.yAxes[0].ticks.display=false;

  });
}

if("bar" == ($('#chart-changer').find(":selected").val())){
  arrayCounter.forEach((element) => {

   // console.log("av av" + element);
  chart.data.datasets[element].borderColor= "#" + document.getElementById("color-" + element + "").value;
  });

  chart.options.scales.xAxes[0].gridLines.drawBorder=true;
  chart.options.scales.xAxes[0].ticks.display=true;
  chart.options.scales.yAxes[0].gridLines.drawBorder=true;
  chart.options.scales.yAxes[0].ticks.display=true;
}


if("line" == ($('#chart-changer').find(":selected").val())){
  arrayCounter.forEach((element) => {

   // console.log("av av" + element);
  chart.data.datasets[element].borderColor= "#" + document.getElementById("color-" + element + "").value;

  chart.options.plugins.datalabels.formatter = function (value) {
            return Math.round(value);
          }
  
  });
  chart.options.scales.xAxes[0].gridLines.drawBorder=true;
  chart.options.scales.xAxes[0].ticks.display=true;
  chart.options.scales.yAxes[0].gridLines.drawBorder=true;
  chart.options.scales.yAxes[0].ticks.display=true;
}



 var ctx = document.getElementById("myChart").getContext("2d");

// Remove the old chart and all its event handles
if (chart) {
  chart.destroy();
}



// Chart.js modifies the object you pass in. Pass a copy of the object so we can use the original object later
var temp = jQuery.extend(true, {}, chart.config);
temp.type =$('#chart-changer').find(":selected").val();



chart = new Chart(ctx, temp);


   
}

function changeAnimation(){

chart.options.animation.easing =$('#animation-changer').find(":selected").val();;

}


function changeAnimationDuration(){
    var time= document.getElementById('Animation')
}




</script>

</body>
<script src="js/chart.js" type="text/javascript"></script>

</html>