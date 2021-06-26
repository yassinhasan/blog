
// here if have many slider so i will make loop of all
//calculate wrapers slides width 

let allslidesposts = document.querySelectorAll(".slider-post");

// wraper contain all posts slides
let slideswrapper = document.querySelector(".wrapper-slider");

// box contain scroll 
let mainslidesbox = document.querySelector(".slider-box");



allwidth = allslidesposts.length * allslidesposts[0].clientWidth + (60 * allslidesposts.length)
slideswrapper.style.width = allwidth+"px";


let next =document.querySelector(".next");
let prev =document.querySelector(".prev");

next.addEventListener("click",()=>
{
        next.classList.remove("disabled")
        prev.classList.remove("disabled")

     
    
        let change =  mainslidesbox.clientWidth + 30
        mainslidesbox.style.scrollBehavior = "smooth";
        // slideswrapper.style.scrollBehavior = "smooth";
        mainslidesbox.scrollLeft +=    change;

        console.log(mainslidesbox.scrollLeft, slideswrapper.clientWidth , mainslidesbox.clientWidth 
            , slideswrapper.clientWidth - mainslidesbox.clientWidth)
        if( mainslidesbox.scrollLeft  >= slideswrapper.clientWidth - mainslidesbox.clientWidth)
        {
        
         next.classList.add("disabled")
        }

})

prev.addEventListener("click",()=>
{
        prev.classList.remove("disabled")
        next.classList.remove("disabled")

      let change =  mainslidesbox.clientWidth + 30

        mainslidesbox.style.scrollBehavior = "smooth";

         mainslidesbox.scrollLeft -=  change;
         
         console.log(mainslidesbox.scrollLeft)
         if(mainslidesbox.scrollLeft    <= 0 )
         {
      
             prev.classList.add("disabled")
         }
        

})






window.addEventListener("resize",()=>
{
    allwidth = allslidesposts.length * allslidesposts[0].clientWidth + (60 * allslidesposts.length)
    slideswrapper.style.width = allwidth+"px";
    if(mainslidesbox.scrollLeft == 0)
    {
 
        prev.classList.add("disabled")
    }
})



