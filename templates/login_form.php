          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <h2>Login with your account</h2>

                    <form method="POST">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                      <div class="form-check">
                        
                        <button type="submit" class="btn btn-primary float-right">Login</button>
                      </div>
                      
                    </form>

              </div>




          <?php if (!empty($errors)): ?>
    
              <div class="col-md-12" style="padding:10px;">
              
                <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <ul>
                 <?php foreach ($errors as $error) {

                  echo '<li>'.$error.'</li>';

                 } ?>
               </ul>
               </div> 

              </div>

          <?php endif; ?>