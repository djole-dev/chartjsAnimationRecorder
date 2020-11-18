// bar chart
if (chart == null) {
  var image = new Image();
  image.src = "source/logo/merged.png";
  var defaultmaximum = 50;
  var chart = new Chart(document.getElementById("myChart"), {
    type: "bar",
    data: {
      labels: ["Europe", "Africa", "Asia", "America"],
      datasets: [
        {
          label: "Population (milions)",
          backgroundColor: [
            "#4caf50",
            "#4caf50",
            "#4caf50",
            "#4caf50",
            "#4caf50",
          ],
          fill: false,
          data: ["20", "10", "30", "25"],
          borderWidth: 3,
          borderColor: "#4caf50",
          pointBorderWidth: 15
        },
        {
          label: "Population (milions)",
          backgroundColor: [
            "#00aeef",
            "#00aeef",
            "#00aeef",
            "#00aeef",
            "#00aeef",
          ],
          fill: false,
          data: ["40", "20", "35", "30"],
          borderWidth: 3,
          borderColor: "#00aeef",
          pointBorderWidth: 15
        },
        {
          label: "Population (milions)",
          backgroundColor: [
            "#e90c0c",
            "#e90c0c",
            "#e90c0c",
            "#e90c0c",
            "#e90c0c",
          ],
          fill: false,
          data: ["25", "45", "10", "15"],
          borderWidth: 3,
          borderColor: "#e90c0c",
          pointBorderWidth: 15
        },
      ],
    },

    options: {
      elements: {
        arc: {
          borderWidth: 10
        }
      },
      cutoutPercentage: 60,
      responsive: true,
      /*
      labels: {
        render: 'percentage',
        fontColor: function (data) {
          var rgb = hexToRgb(data.dataset.backgroundColor[data.index]);
          var threshold = 140;
          var luminance = 0.299 * rgb.r + 0.587 * rgb.g + 0.114 * rgb.b;
          return luminance > threshold ? 'white' : 'white';
        },
        precision: 2
      },*/
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 70
        }
      },
      plugins: {
        datalabels: {
          display: true,
          align: 'center',
          anchor: 'center',
          color: "#fff",
          formatter: function (value) {
            return Math.round(value);
          },
          font: {
            size: 14,
          }
        }
      },
      legend: {
        display: true,
        labels: {
          fontSize: 14, //LEGEND FONT
        }
      },
      title: {
        display: true,
        text: "Enter question",

        fontSize: 14, //TITLE fontSize

      },
      animation: {
        duration: 1000,
        easing: "linear",

      },
      scales: {
        xAxes: [
          {
            gridLines: {
              drawOnChartArea: false,
              drawBorder: true
            },
            ticks: {
              display: true,
              beginAtZero: true,
              fontSize: 14 // X-axis fontSize
            },
          },
        ],
        yAxes: [
          {
            gridLines: {
              drawOnChartArea: false,
              drawBorder: true
            },
            ticks: {
              display: true,
              beginAtZero: true,
              fontSize: 14,  // Y-axis font size
              max: defaultmaximum,
              callback: function (tick) {
                return tick.toString();
              }
            }
          },
        ],
      },

      watermark:
      {
        image: image,
        height: "100%",
        width: "50%",
        x: "50%",
        y: "0%",
      },



    },
  });
}
var m = 1;


$("#chart-data-btn").click(function () {
  // get new data
  //chart.removeData();

  find_max_value();
  var checkboxval = $("#checkBoxPercentage").val();
  console.log(checkboxval);
  if (checkboxval == 'false') {
    chart.options.scales.yAxes[0].ticks.max = defaultmaximum;
  }
  chart.clear();

  var z = 0;
  var br = 0;
  arrayCounter.forEach((element) => {
    var newData = $("#chart-data-" + element + "").val();
    newData.replace(/\s/g, "");
    newData = newData.split(",");
    newData.forEach((element) => {
      element = parseFloat(element);
    });

    // get new labels
    var newLabels = $("#chart-labels").val();
    newLabels.replace(/\s/g, "");
    newLabels = newLabels.split(",");
    console.log(element);
    chart.data.datasets[br].label = document.getElementById(
      "legend-data-" + element + ""
    ).value;
    chart.data.datasets[br].backgroundColor =
      "#" + document.getElementById("color-" + element + "").value;







    chart.data.datasets[br].fill = false;

    chart.data.datasets[br].pointBorderWidth = 15;

    chart.data.datasets[br].borderColor =

      "#" + document.getElementById("color-" + element + "").value;

    // chart.data.datasets[br].borderColor = "#fff";
    if ("doughnut" == ($('#chart-changer').find(":selected").val())) {
      arrayCounter.forEach((element) => {

        console.log("av av" + element);
        chart.data.datasets[element].borderColor = "#fff";

      });
    }

    if ($('#chart-changer').find(":selected").val() == "line") {
      chart.data.datasets[br].borderColor =
        "#" + document.getElementById("color-" + element + "").value;
      //  chart.data.datasets[br].borderColor = "#fff";
    }
    chart.data.datasets[br].borderWidth = 3;

    updateChart(chart, newLabels, newData, br);
    br++;
    console.log(srcLogo);

  })
});

function mergeLogo() {
  mergeImage();
}

function clearLogo() {
  if (logoCounter == 1) {

    $.ajax({
      type: "POST",
      url: '/deleteFile1.php',
      success: function () {
        console.log("Delete files");

        setTimeout(function () {


          var timestamp1 = new Date().getTime();
          var el1 = document.getElementById("imglogo1");
          el1.src = "source/logo/newimage1.png?t=" + timestamp1;

        }, 1000);
      }
    });

  }
  if (logoCounter == 2) {



    $.ajax({
      type: "POST",
      url: '/deleteFile2.php',
      success: function () {
        console.log("Delete files");

        setTimeout(function () {

          var timestamp2 = new Date().getTime();
          var el2 = document.getElementById("imglogo2");
          el2.src = "source/logo/newimage2.png?t=" + timestamp2;

        }, 1000);
      }
    });
  }
  if (logoCounter == 3) {



    $.ajax({
      type: "POST",
      url: '/deleteFile3.php',
      success: function () {
        console.log("Delete files");

        setTimeout(function () {

          var timestamp3 = new Date().getTime();
          var el3 = document.getElementById("imglogo3");
          el3.src = "source/logo/newimage3.png?t=" + timestamp3;



        }, 1000);
      }
    });

  }


}

function uploadLogo() {
  if (srcLogo) {
    $.ajax({
      type: "POST",
      url: "/uploadLogoImage.php", // path to uploadImageLogo
      data: {
        imageData: srcLogo,
        counter: logoCounter,

      },
      success: function () {
        console.log("image sent");
        setTimeout(function () {
          // chart.options.watermark.image = image;
          //chart.update();
          //image.src =
          // "source/logo/newimage.png" + `?v=${new Date().getTime()}`;

          // chart.update();
          console.log("thats it");

          var timestamp1 = new Date().getTime();
          var el1 = document.getElementById("imglogo1");
          el1.src = "source/logo/newimage1.png?t=" + timestamp1;

          var timestamp2 = new Date().getTime();
          var el2 = document.getElementById("imglogo2");
          el2.src = "source/logo/newimage2.png?t=" + timestamp2;

          var timestamp3 = new Date().getTime();
          var el3 = document.getElementById("imglogo3");
          el3.src = "source/logo/newimage3.png?t=" + timestamp3;


          srcLogo = null;
        }, 1000);

        setTimeout(function () {
          chart.options.watermark.image = image;
          chart.update();
          image.src =
            "source/logo/merged.png" + `?v=${new Date().getTime()}`;

          chart.update();



        }, 1000);
      },
    });
  }

  setTimeout(function () {
    mergeImage();
  }, 2000);
}


function mergeImage() {
  $.ajax({
    type: "POST",
    url: '/mergeTransp.php',
    data: {
      height: sliderVal
    },
    success: function (output) {
      console.log(output);
      setTimeout(function () {
        chart.options.watermark.image = image;
        chart.update();
        image.src =
          "source/logo/merged.png" + `?v=${new Date().getTime()}`;

        chart.update();



      }, 1000);

    }
  });
}

function updateChart(chart, newLabels, newData, y) {
  chart.data.labels = newLabels;
  chart.data.datasets[y].data = newData;
  //chart.data.datasets[y].label = document.getElementById(
  //  "legend-data-" + y + ""
  //).value;

  if (m + 2 <= i) {
    var newDataset = {
      label: "New data",
      backgroundColor: "#00aeef",
      // borderColor: "rgba(99, 255, 132, 1)",
      borderWidth: 1,
      data: newData,
    };

    //  chart.data.datasets.backgroundColor = "#00aeef";
    chart.data.datasets.push(newDataset);
    m++;
  }

  // chart.data.datasets[y].label = document.getElementById(
  //  "legend-data-" + y + ""
  //).value;

  // generate random color for each label
  var count = 0;
  newLabels.forEach((element) => {
    ++count;
  });
  //var newBackgroundColors = Array();
  // newLabels.forEach((element) => {
  //   newBackgroundColors.push(getRandomColor());
  // });
  // chart.data.datasets[0].backgroundColor = newBackgroundColors;
  // perform chart update
  // Chart.defaults.global.defaultFontSize = 18;
  //chart.options.legend.labels.fontSize = sliderValLegendFont;
  chart.options.title.fontSize = sliderValQuestionFont;

  chart.options.scales.xAxes[0].ticks.fontSize = sliderValColumnNamesFont;
  chart.options.scales.yAxes[0].ticks.fontSize = sliderValYaxesFont;

  chart.options.plugins.datalabels.font.size = sliderValChartDatasetsFont;
  chart.update();

  // document.getElementById("chart-playagain-btn") = function() {
  reloadChart();

  //}
}
function reloadChart() {
  var ctx = document.getElementById("myChart").getContext("2d");

  // Remove the old chart and all its event handles
  if (chart) {
    chart.destroy();
  }

  // Chart.js modifies the object you pass in. Pass a copy of the object so we can use the original object later
  var temp = jQuery.extend(true, {}, chart.config);
  temp.type = $("#chart-changer").find(":selected").val();
  chart = new Chart(ctx, temp);
}

function getRandomColor() {
  var letters = "0123456789ABCDEF";
  var color = "#";
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
function resetAnimation() {
  counter = 0;
  fileId = Date.now();
  totalNumberOfFrames = chart.options.animation.duration / imageTakingInterval;
  imageArray = [];
  console.log("reset", counter, fileId, totalNumberOfFrames, imageArray);
}

chartanimation.oninput = function () {
  chart.options.animation.duration = chartanimation.value * 1000;
  chart.update();
  console.log(chart.options.animation.duration);
};

var index = 0;
const btnDisplay = document.querySelector("#btnDisplay");
var interval;
var counter = 0;
var imageArray = [];
var fileId = Date.now();
var framesPerSecond = 25;
var imageTakingInterval = (1 / framesPerSecond) * 1000;
var totalNumberOfFrames =
  chart.options.animation.duration / imageTakingInterval; // because time is mesured in miliseconds
//download-for
$("#loader-cont").hide();
$("#loader-cont").height($(document).height());

$("#video-download").click(function () {
  $("#loader-cont").show();

  reloadChart();
  console.log(imageTakingInterval);
  interval = setInterval(
    createImageFromCanvas,
    imageTakingInterval,
    totalNumberOfFrames
  );
});

function createImageFromCanvas(totalNumberOfFrames) {
  console.log("chart duration: ", chart.options.animation.duration);
  console.log(
    "num of frames: ",
    chart.options.animation.duration / imageTakingInterval
  );
  if (counter > chart.options.animation.duration / imageTakingInterval + 50) {
    clearInterval(interval);
    console.log("done creating images sequence");
    sendImage();
  }
  var canvas = document.querySelector("#myChart");
  var dataURL = canvas.toDataURL("image/jpeg");
  console.log(dataURL);
  imageArray.push(dataURL);
  counter++;
  console.log(counter);
}
function downloadVideo() {
  console.log("submit form");
  //fileId = Date.now();
  setTimeout(function () {
    document.getElementById("download-form").submit(function () {
      alert("Video downloaded");
    });
  }, 1000);
  setTimeout(function () {
    window.location.reload();
  }, 2000);
}

function sendImage() {
  $.ajax({
    type: "POST",
    url: "/upload.php",
    data: {
      imageData: imageArray[index],
      index: index + 1,
      fileId: fileId,
      lastIndex: chart.options.animation.duration / imageTakingInterval + 50,
    },
    success: function (output) {
      console.log(output);
      index++;
      if (index < imageArray.length) {
        sendImage();
      } else {
        alert("video created");
        downloadVideo();
        $(function () {
          var newFileName = fileId + ".mp4";
          $("input[id=input-filename]").val(newFileName);
        });
      }
    },
  });
}

