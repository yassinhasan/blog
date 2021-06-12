"use strict";

// dashboard
function toggle_dropdownmenu(selector) {
  selector.addEventListener("click", function (e) {
    var item = selector.parentElement.querySelector(".dropdown-menu");
    item.classList.contains("show") ? item.classList.remove("show") : item.classList.add("show");
    var alldrop = document.querySelectorAll(".dropdown-menu");
    alldrop.forEach(function (e) {
      var item = selector.parentElement.querySelector(".dropdown-menu");

      if (e !== item) {
        e.classList.remove("show");
      }
    });
  });
}

var bell = document.querySelector(".thebell"),
    avatar_pic = document.querySelector(".theavatar");
toggle_dropdownmenu(bell);
toggle_dropdownmenu(avatar_pic);
var bars = document.querySelector(".bars"),
    sidebar = document.querySelector(".sidebar");
bars.addEventListener("click", function () {
  bars.querySelector("i").classList.contains("fa-bars") ? bars.querySelector("i").classList.replace("fa-bars", "fa-times") : bars.querySelector("i").classList.replace("fa-times", "fa-bars");
  sidebar.classList.contains("active") ? sidebar.classList.remove("active") : sidebar.classList.add("active");
});
var sidebaritems = document.querySelectorAll(".sidebar-item");
sidebaritems.forEach(function (e) {
  e.addEventListener("click", function () {
    removeactive(sidebaritems);
    e.classList.add("active");
  });
});

function removeactive(selector) {
  selector.forEach(function (e) {
    e.classList.remove("active");
  });
} // chart


var options = {
  chart: {
    type: 'area',
    width: '100%',
    height: "100%"
  },
  series: [{
    name: 'visitors',
    data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
  }, {
    name: 'newusers',
    data: [123, 20, 33, 60, 49, 10, 70, 291, 25]
  }],
  xaxis: {
    categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
  },
  colors: ['#f00', '#009688', '#546E7A']
};
var chart = new ApexCharts(document.querySelector("#chart"), options); // chart.render();
// change theme

var themeicon = document.querySelector(".changetheme");
themeicon.addEventListener("click", function () {
  document.body.classList.toggle("dark");
  var icon = themeicon.querySelector(".changeteheme"); // console.log(icon.classList.contains("fa-moon"))

  icon.classList.contains("fa-moon") ? icon.classList.replace("fa-moon", "fa-sun") : icon.classList.replace("fa-sun", "fa-moon");
});
var popup = document.querySelector(".popup-container"),
    closepopup = document.querySelector(".close-popup"),
    overlay = document.querySelector(".overlay"),
    addcategory = document.querySelector(".add-cat");
addcategory.addEventListener("click", function () {
  popup.classList.add("show");
});
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("overlay")) {
    popup.classList.remove("show");
  }
});
closepopup.addEventListener("click", function () {});