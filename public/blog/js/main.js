
let navbars = document.querySelector(".collapse-icon i");
if(navbars)
{
    navbars.addEventListener("click",()=>
    {
        togglenav()
    })
}

function togglenav()
{
        document.querySelector(".nav").classList.toggle("show")
}

let mediquery = window.matchMedia("(max-width: 808px)");

window.addEventListener("resize",()=>
{
    if(!mediquery.matches)
    {
        document.querySelector(".nav").classList.remove("show")
    }
})


// get url then get last section of it like home or posts or category then add class active on click

let url = window.location.pathname;



 url = url.split("/").pop();

if(url.length == 0)
{
    url += "home";
}


console.log(url)
 document.querySelector( "[data-active ='"+ url+"-active']").classList.add("active");

