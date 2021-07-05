// CLICK ON SUBMIT AND get data by ajax
document.addEventListener("click",(e)=>
{
  
  if(e.target.classList.contains("submit"))
  {

 
    let form = document.querySelector(".users-form"),
    results = document.querySelector(".results"),
    formaction = form.getAttribute("action");

    let formdata = new FormData(form);


    //remove blur check data div 
    let alldivresults = document.querySelectorAll(".checkresults");

    // remove hide class of result div
    results.classList.remove("hide");

    alldivresults.forEach(el => {
      el.parentElement.removeChild(el)
    });

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
        if( res.error)
        {

          results.classList.add("failed");
          results.innerHTML = res.error;

        }
        else
        {
          results.classList.add("success");
          results.innerHTML = res.success;
          window.location.href = res.redirect;
        }
        
      })

  }
})


 function check_exiists_value_on_keyup(inputname)
{

  let input  = document.querySelector("[name='"+inputname+"']");


  input.addEventListener("blur",(e)=>
  {
    let inputvalue = input.value;
    let parentdiv = input.parentElement;
   
    let form = new FormData();
        form.append(inputname,inputvalue);
    let url = input.getAttribute("data-check");

    // remove result div first on blur
    let resultdiv = document.querySelector(".checkresults-"+inputname);
    if(resultdiv)
    {
      parentdiv.removeChild(resultdiv)
    }

    // remove any div result when submit click and not disppear yet
    document.querySelector(".results").classList.add("hide");

   fetch(url,{
     method: "Post",
     body : form
   })
    .then((resp)=>
    {
      return resp.json()
    })
    .then((data)=>
    {
      let resultdiv = document.createElement("div");
      resultdiv.classList.add("checkresults");
      resultdiv.classList.add("checkresults-"+inputname);
      parentdiv.appendChild(resultdiv);

      if(data.error)
      {


        resultdiv.innerHTML = data.error;
        resultdiv.classList.remove("hide");
        resultdiv.classList.add("failed");
      }
      if(data.success)
      {
        resultdiv.classList.remove("failed");
        resultdiv.classList.add("hide");
      }
  
    })
  })
}

 check_exiists_value_on_keyup("email");
 check_exiists_value_on_keyup("first_name");
 check_exiists_value_on_keyup("birthday");


 

