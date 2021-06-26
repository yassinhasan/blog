
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


