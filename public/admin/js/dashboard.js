// dashboard

function toggle_dropdownmenu(selector)
{
  selector.addEventListener("click",(e)=>
  {
    let item =  selector.parentElement.querySelector(".dropdown-menu");

    item.classList.contains("show") ?  item.classList.remove("show")  :  item.classList.add("show") ;

    let alldrop = document.querySelectorAll(".dropdown-menu");
    alldrop.forEach((e)=>
    {
      let item =  selector.parentElement.querySelector(".dropdown-menu");
      if(e !== item)
      {
        e.classList.remove("show")
      }
      })
  })
}


let bell = document.querySelector(".thebell"),
    avatar_pic = document.querySelector(".theavatar");
toggle_dropdownmenu(bell);
toggle_dropdownmenu(avatar_pic);





let bars = document.querySelector(".bars"),
    sidebar = document.querySelector(".sidebar");
bars.addEventListener("click",()=>
{
  bars.querySelector("i").classList.contains("fa-bars") ? bars.querySelector("i").classList.replace("fa-bars","fa-times") : bars.querySelector("i").classList.replace("fa-times","fa-bars");
  sidebar.classList.contains("active") ? sidebar.classList.remove("active") : sidebar.classList.add("active")
})


let sidebaritems = document.querySelectorAll(".sidebar-item");

sidebaritems.forEach((e)=>
{
  e.addEventListener("click",()=>
  {
    removeactive(sidebaritems)
    e.classList.add("active");
  })
})

function removeactive(selector)
{
  selector.forEach((e)=>
  {
    e.classList.remove("active");
  })
}


// chart

var options = {
  chart: {
    type: 'area',
    width: '100%',
    height: "100%"
  },
  series: [{
    name: 'visitors',
    data: [30,40,35,50,49,60,70,91,125]
  },
{
  name: 'newusers',
  data: [123,20,33,60,49,10,70,291,25] 
}],
  xaxis: {
    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
  },
  colors: ['#f00', '#009688', '#546E7A']
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

 // chart.render();


// change theme

let themeicon = document.querySelector(".changetheme");

themeicon.addEventListener("click",()=>
{
  document.body.classList.toggle("dark");
  let icon = themeicon.querySelector(".changeteheme");
  // console.log(icon.classList.contains("fa-moon"))
  icon.classList.contains("fa-moon") ?  icon.classList.replace("fa-moon","fa-sun") :  icon.classList.replace("fa-sun","fa-moon");
})


//open popup


    let popup = document.querySelector(".popup-container"),
    closepopup = document.querySelector(".close-pop-button"),
    overlay = document.querySelector(".overlay"),
    addcategory = document.querySelector(".add-cat-button"),
    editbtn = document.querySelector(".btn-edit");

 

    //
    if(addcategory)
    {
                
       
  
    addcategory.addEventListener("click",(e)=>
    {
        e.preventDefault();
        url = addcategory.getAttribute("data-target-url");

        fetch(url)
        .then((resp)=>
        {
          return resp.text();
        })
        .then((data)=>
        {
          popup.innerHTML = data;
          if(popup.classList.contains("hide"))
          {
            popup.classList.remove("hide");
          }

        })
    })
    }


    // add form by edit click
    
    //stop clicking on icon 


      document.addEventListener("click",(e)=>
      {
        if(e.target.classList.contains("fa-edit"))
        {

          let btn = e.target;
          if(confirm("are your sure edit")  === true)
          {
            let url = btn.parentElement.getAttribute("data-form-taregt");
            fetch(url,
              {
                method : "POST",

              })
              .then((res)=>
              {
                return res.text();
              })
              .then
              ((html)=>
              {
                popup.innerHTML = html;
                if(popup.classList.contains("hide"))
                {
                  popup.classList.remove("hide");
                }
              })
          }
          else
          {
            return false
          }
        }

      })

    //close pop up
    
    document.addEventListener("click",(e)=>
    {
      if(e.target.classList.contains("overlay"))
      {
        popup.classList.add("hide");
      }
      if(e.target.classList.contains("close-pop-button"))
      {
        e.preventDefault()
        popup.classList.add("hide");
      }
      if(closepopup)
      {
        closepopup.addEventListener("click",(e)=>
        {
          e.preventDefault()
        })
      }

    })


    // CLICK ON SUBMIT AND get data by ajax
    document.addEventListener("click",(e)=>
    {
      if(e.target.classList.contains("submit"))
      {
       
        let submitbutton = e.target,
        form = submitbutton.parentElement.parentElement.parentElement,
        results = document.querySelector(".results"),
        loading = document.querySelector(".loading"),
        formaction = form.getAttribute("action");

        console.log(formaction)
        let formdata = new FormData(form);

        form.classList.add("load");
        loading.classList.add("show");
        fetch(formaction,
          {
            method : "POST",

            body : formdata

          })
          .then((res)=>
          {
            return res.json();
          })
          .then((res)=>
          {
            if(res)
            {
            //clear loading
            form.classList.remove("load");
            loading.classList.remove("show");
            }

            if( res.error)
            {



              results.classList.add("failed");
              results.innerHTML = res.error;

            }
            else
            {
              results.classList.add("success");
              results.innerHTML = res.success;
              window.location.href = form.getAttribute("data-target");
            }
            
          })

      }
    })


        // CLICK ON SUBMIT AND get data by ajax
        document.addEventListener("click",(e)=>
        {
          if(e.target.classList.contains("delete-icon"))
          {
           
            let submitbutton = e.target.parentElement,
            formaction = submitbutton.getAttribute("data-form-taregt");
            if(confirm("are your sure delete")  === true)
            {
              fetch(formaction)
              .then((res)=>
              {
                return res.json();
              })
              .then((res)=>
              {

                  window.location.href = res.redirect;
                
              })
    
            }
          }
        })


    //     document.addEventListener('DOMContentLoaded', ()=>{  
    //       console.log("yes")
    //       if(document.querySelector(".daetails"))
    //       {

    //         CKEDITOR.replace( 'details' );
    //       }
    //       else
    //       {
    //         console.log("|mo")
    //       }
    // })    


