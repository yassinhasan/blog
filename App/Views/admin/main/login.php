<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= fullurl("admin/dashboard/submit") ?>" method="POST" class="form" > 
    <label for="email">
        username
    </label>
    <input type="text" name="email" id="email" step=".1">
    <label for="password">
        password
    </label>
    <input type="password" name="password" id="password">
    <label for="cpassword">
            cpassword
    </label>
    <input type="cpassword" name="cpassword" id="cpassword">
    <hr>
    <input type="file" name="image" class="file">
    <button type="submit" class="sub">
        submit
    </button>
</form>

    <script>
    let form = document.querySelector(".form");
    let btn = document.querySelector(".sub");

    btn.addEventListener("click",(e)=>
    {
        e.preventDefault();
        let form = document.querySelector(".form");

        let senddata = new FormData(form);
        let url = form.getAttribute("action");
        fetch(url,{
            method: "POST",
            body : senddata

        })
        .then((res)=>
        {
            return res.json();
        })
        .then((data)=>
        {
            console.log(data)
        })


    })
    </script>
</body>
</html>

