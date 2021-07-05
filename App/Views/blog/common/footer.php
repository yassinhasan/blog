    <!-- ########### footer  ################ -->
    <footer class="footer">
        <div class="footer-box flex-row">
            <div class="footer-aboutus">
               <h2 class="h2"> about us </h2>
               <p class="p">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut molestiae cumque amet velit quod! Obcaecati reiciendis culpa sequi eum possimus</p>
            </h2>
            </div>
            <div class="footer-newletters">
                <h2 class="h2">  newletters </h2>
                <h3 class="h3"> stay update with our news</h3>
                <input type="email" placeholder="email">
                <i class="fas fa-arrow-right"></i>
            </div>
            <div class="footer-instagram">
                <h2 class="h2"> instagram </h2>
                <div class="instagram-img flex-row">
                   <div class="row-1">
                    <img src="<?= mlink("blog/images/background (4).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (5).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (1).jpg") ?>" alt="">
                   </div> 
                   <div class="row-1">
                    <img src="<?= mlink("blog/images/background (4).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (2).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (3).jpg") ?>" alt="">
                   </div> 
                   <div class="row-1">
                    <img src="<?= mlink("blog/images/background (2).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (5).jpg") ?>" alt="">
                    <img src="<?= mlink("blog/images/background (3).jpg") ?>" alt="">
                   </div> 
                </div>
           
            </div>
            <div class="footer-followus">
                <h2 class="h2">  follow us </h2>
                <h3 class="h3"> let us be special</h3>
                <div class="footer-social">
                   <a href="" > <i class="fab fa-facebook"></i>   </a>
                   <a href="" > <i class="fab fa-twitter"></i> </a>
                   <a href="" > <i class="fab fa-youtube"></i> </a>
                   <a href="" > <i class="fab fa-instagram"></i> </a>
                </div>
            </div>
        </div>
        <div class="rights">
            copytights &copy;2021 made by <i class="fas fa-heart"></i> yassin
        </div>
    </footer>

    <!-- ####x####### footer ########x######## -->
    
    <?= isset($blogjs)? $blogjs: "" ?>  
    <?= isset($formjs)? $formjs: "" ?>  
    <script src="<?= mlink("blog/js/main.js")?>"></script>    
</body>
</html>