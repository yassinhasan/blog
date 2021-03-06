// dashboard
// toggle active on sidebar links by window href

(function(){

    let activepage = window.location.href;
    activepage = activepage.split("/").pop()
    
     let x = document.getElementById(activepage+"-link");
     if(x)
     {
      x.classList.add("active")
     }
})()
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


// let sidebaritems = document.querySelectorAll(".sidebar-item");

// sidebaritems.forEach((e)=>
// {
//   e.addEventListener("click",()=>
//   {
//     removeactive(sidebaritems)
//     e.classList.add("active");
//   })
// })

// function removeactive(selector)
// {
//   selector.forEach((e)=>
//   {
//     e.classList.remove("active");
//   })
// }


// chart





var options = {
  chart: {
    type: 'area',
    width: '100%',
    height: "100%"
  },
  series: [{
    name: 'new users',
    data: [1,4]
  },
{
  name: 'users created',
  data: [3,1] 
}],
  xaxis: {
    years: []
  },
  colors: ['#f00', '#009688', '#546E7A']
}

let chart =document.querySelector("#chart");




if(chart)
{
  var thegraph = new ApexCharts(document.querySelector("#chart"), options);
  thegraph.render()

}


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



    closepopup = document.querySelector(".close-pop-button"),
    addcategory = document.querySelector(".add-cat-button"),
    editbtn = document.querySelector(".btn-edit");


    let tags = [];

    //
    if(addcategory)
    {
                
  
  
    addcategory.addEventListener("click",(e)=>
    {
        e.preventDefault();


        //


        //
        url = addcategory.getAttribute("data-target-url");

        fetch(url)
        .then((resp)=>
        {
          return resp.text();
        })
        .then((data)=>
        {
          
          let html = new DOMParser();
          let dom =  html.parseFromString(data,"text/html");

          let  popup_container = dom.querySelector(".popup-container");

          // start tags

          let tagcontainer = dom.querySelector(".tag-container");
          let  input = dom.querySelector(".tag-input");



          function createtags(label)
          {
            let div =document.createElement("div");
                div.setAttribute("class" , "tag");
                
            let span = document.createElement("span");
                let text = document.createTextNode(label);
                span.appendChild(text);
            let i = document.createElement("i");
                i.setAttribute("class", "fas fa-times deltags");
                i.setAttribute("data-target", label);
                
                  div.appendChild(span);
                  div.appendChild(i);
                  return div;
          }

          function reset()
          {
              document.querySelectorAll(".tag").forEach((tag)=>
              {
                  tag.parentElement.removeChild(tag)
              })
          }

          function addtags()
          {
            reset()
            tags.slice().reverse().forEach((tag)=>
            {
                  let tagdiv = createtags(tag);
                  tagcontainer.prepend(tagdiv)
            })
          }

          if(input)
          {
            
            input.addEventListener("keyup",(e)=>
            {

              if(e.keyCode   ==  32 )
              {
              
                tags.push(input.value);
                addtags(input.value)
                input.value = "";
                
              }
            })
          }


          document.addEventListener("click",(e)=>
          {
          if(e.target.classList.contains("deltags"))
            {
              let value =e.target.getAttribute("data-target");
              let index = tags.indexOf(value);
              tags = [...tags.slice(0,index) , ...tags.slice(index+ 1)];
              addtags()
            }

          })

          // end tags
        
  
          document.body.append(popup_container);

          // document.body.appendChild(popform);
           let details = document.querySelector(".details");
           if(details)
           {
                     CKEDITOR.replace( 'details' );
           }
           
  



        })
    })
    }




    //close pop up
    
    document.addEventListener("click",(e)=>
    {
      if(e.target.classList.contains("overlay"))
      {
        document.querySelector(".popup-container").remove();

      }
      if(e.target.classList.contains("close-pop-button"))
      {
        e.preventDefault()
        document.querySelector(".popup-container").remove();
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

    let count = 0;
    document.addEventListener("click",(e)=>
    {
      
      if(e.target.classList.contains("submit"))
      {
   
        let submitbutton = e.target,
        form = submitbutton.parentElement.parentElement.parentElement.parentElement,
        results = document.querySelector(".results"),
        columnresults =   document.querySelector(".columnresults"),
        loading = document.querySelector(".loading"),
        formaction = form.getAttribute("action");


        //


        //

        let details = document.body.querySelector(".details");
        if(details)
        {
                  details.value = CKEDITOR.instances.details.getData();
        }

        
        let  input = document.querySelector(".tag-input");
       
        if(input)
        {
          input.value = tags.toString();
        }
      
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
            if( res.existserror)
            {

              columnresults.classList.add("failed");
              columnresults.innerHTML = res.existserror;

            }
            if( res.columnerror)
            {

              columnresults.classList.add("failed");
              columnresults.innerHTML = res.columnerror;

            }

            else if(res.columnsuccess)
            {

              columnresults.classList.add("success");
              columnresults.innerHTML = res.columnsuccess;
              /*

              here i need to add new input another old one 
              how to do this dynamicaly

              */
              window.localStorage.setItem(res.columnname+"-input",[res.columnname , res.inputtype])
              window.location.href = res.redirect;
         
            }
            else if(res.success)
            {
              results.classList.add("success");
              results.innerHTML = res.success;
             window.location.href = form.getAttribute("data-target");
            }
            
          })

      }
    })




   
   


    //

        // add form by edit click
    



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
                ((data)=>
                {
                  let html = new DOMParser();
                  let dom =  html.parseFromString(data,"text/html");

                     
                  // let details = dom.querySelector(".details");
                  let  popup_container = dom.querySelector(".popup-container"),

  
                 //  detalais.value = CKEDITOR.instances.details.getData()

          // start tags

           tagcontainer = dom.querySelector(".tag-container"),
            input = dom.querySelector(".tag-input");
          if(input)
          {
                      tags = input.getAttribute("data-value").split(",");
          }

          function createtags(label)
          {
            let div =document.createElement("div");
                div.setAttribute("class" , "tag");
                
            let span = document.createElement("span");
                let text = document.createTextNode(label);
                span.appendChild(text);
            let i = document.createElement("i");
                i.setAttribute("class", "fas fa-times deltags");
                i.setAttribute("data-target", label);
                
                  div.appendChild(span);
                  div.appendChild(i);
                  return div;
          }
          addtags()
          function reset()
          {
              document.querySelectorAll(".tag").forEach((tag)=>
              {
                  tag.parentElement.removeChild(tag)
              })
          }

          function addtags()
          {
            reset()
            tags.slice().reverse().forEach((tag)=>
            {
                  let tagdiv = createtags(tag);
                  tagcontainer.prepend(tagdiv)
            })
          }

          if(input)
          {
            
            input.addEventListener("keyup",(e)=>
            {

              if(e.keyCode   ==  32 )
              {
              
                tags.push(input.value);
                addtags(input.value)
                input.value = "";
                
              }
            })
          }


          document.addEventListener("click",(e)=>
          {
          if(e.target.classList.contains("deltags"))
            {
              let value =e.target.getAttribute("data-target");
              let index = tags.indexOf(value);
              tags = [...tags.slice(0,index) , ...tags.slice(index+ 1)];
              addtags()
            }

          })

          // end tags
          document.body.append(popup_container);
                  CKEDITOR.replace( 'details' );
  
                })
            }
            else
            {
              return false
            }
          }
  
        })

        // CLICK ON delete 
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





       if(document.querySelector(".sitemessage"))
       {
        CKEDITOR.replace( 'sitemessage' );
       }



       let savenormalform = document.querySelector(".saveform");
       if(savenormalform)
       {
                savenormalform.addEventListener("click",()=>
       {
       
       })
       }

        
 // add column in settings page and open popup settings
 
 let add_column  = document.querySelector(".add-new-settings");
 if(add_column)
 {
   add_column.addEventListener("click",(e)=>
   {
     e.preventDefault();
    let url = add_column.getAttribute("data-target");
    
    fetch(url).then(resp=> resp.text())
    .then((data)=>{

      let html = new DOMParser();

      let dom =  html.parseFromString(data,"text/html");

      let popup_container = dom.querySelector(".popup-container");

      popup_container.classList.remove("hide")

      document.body.append(popup_container);

      // noew i opended pop up

      // now i will make when change on select and select select so i will show text to enter value and option

    })
  })

 }


 for(let key of  Object.keys(window.localStorage))
 {
    if(key.endsWith("-input"))
    {
      let divinputinfo = window.localStorage.getItem(key);
      let inputname = divinputinfo.split(",").shift();
      let inputtype = divinputinfo.split(",").pop();

      let divel = document.createElement("div");
      divel.classList.add("form-group");
      divel.classList.add("fullwidth");
   
      let label = document.createElement("label");
      label.setAttribute("for",inputname);
      let labeltext = document.createTextNode(inputname);
      label.appendChild(labeltext);
   
      let input = document.createElement("input");
      input.classList.add("form-input");
      input.setAttribute("type",inputtype);
      input.setAttribute("name",inputname);
      input.setAttribute("placeholder",inputname+"...");
   
      divel.appendChild(label);
      divel.appendChild(input);
   
      let mainitem =document.querySelector(".mainpage-form-items")
      mainitem.insertBefore(divel, mainitem.firstElementChild.nextSibling)

    }
 }

     

   
   /*

    <select name="status">
        <option value="" >select   status</option>
        <option value="enabled"  <?= (isset($status) &&  $status === 'enabled') ? 'selected' : "" ?>>Enabled</option>
        <option value="disabled" <?= (isset($status) &&  $status === 'disabled') ? 'selected' : "" ?>>Disabled</option>                                          
    </select>

   */
