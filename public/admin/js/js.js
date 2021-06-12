// login sysytem fetch

let form = document.querySelector("#loginform");
let logginbutton = document.querySelector(".btn-login");
let boxresult = document.querySelector("#results");

/*
scenario

get all form data by new form   ^^

after click on button login  ^^
prevent default

make fetch to logincontroller submit page  ^^

make sure submit page return results or error  ^^

fetch result and convert it to json   ^^

if error loop for it and make  div for it 

if succesful make redirect on admin page with wellcome message 

*/
let email = document.querySelector("input[name=email]");

let password = document.querySelector("input[name=password]");



logginbutton.addEventListener("click",(e)=>
{
    e.preventDefault();

    let methodtype = form.getAttribute("method");
    let urlrequest = form.getAttribute("action");
    let formdate = new FormData(form);
    // formdate.append("email",email.value)
    // formdate.append("password",password.value)
    
    fetch(urlrequest,
    {
        method : methodtype,
        // headers: {
        //      'Content-Type': 'application/json'
        //   //  'Content-Type': 'application/x-www-form-urlencoded',
        //   },
        body: formdate
    })
    .then((resp)=>
    {
      return resp.json();
    })
    .then( (res)=>
    {
        
        boxresult.classList = "";
        
        if( Array.isArray(res) == true)
        {
            boxresult.classList.add("alert");
            boxresult.classList.add("alert-danger");
            let x= "";
            for(let y  = 0 ; y < res.length ; y ++)
            {
                x += res[y] + "<br>";
            }
            boxresult.innerHTML = x;
        }
        else if(typeof res == "object" && res != null)

        {
            boxresult.classList.add("alert");
            boxresult.classList.add("alert-success");
            boxresult.innerHTML = "<b> wellcome " +res.users.first_name + "</b> back";
            setTimeout(()=>
            {
               window.location.href = res.url
            //  console.log(res.url)
            },1000)

           
        }
        
    })
   

})


// popup form


