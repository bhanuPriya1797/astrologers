<style>
.content h4{
  font-size: 1.5em;
  margin-bottom: 20px;
  text-transform: uppercase;
  color: #000;
  font-size: 2em;
  max-width: 600px;
  position: relative;
}
.content h4:after{
  position: absolute;
  content: attr(data-text);
  top: 0;
  left: 0;
  right: 0;
  text-shadow: 1px 1px 2px rgba(255,255,255,0.4);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.content p{
  font-size: 1.2em;
  color: #0d0d0d;
}
.content .btns{
  margin: 25px 0;
  display: inline-flex;
}
.content .btns a{
  display: inline-block;
  margin: 0 10px;
  text-decoration: none;
  border: 2px solid #69a6ce;
  color: #69a6ce;
  font-weight: 500;
  padding: 10px 25px;
  border-radius: 25px;
  text-transform: uppercase;
  transition: all 0.3s ease;
}
.content .btns a:hover{
  background: #00386b;
  color: #fff;
}
</style>

<div class="separator"></div>
      <section class="login space login-space bg-wave">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-12 mx-auto">
                  <div class="login-box shadow-pnel step1">
                     <div class="login-form shadow">
                        <div id="error-page">
         <div class="content">
            <h2 class="header" data-text="404">
               404
            </h2>
            <h3 data-text="Opps! Page not found" style="color:red;">
               Opps! Page not found
            </h3>
            <br>
            <h4>
               Sorry, the page you're looking for doesn't exist.
            </h4>
            <div class="btns">
               <a href="<?php echo base_url();?>">return home</a>
            </div>
         </div>
      </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>