<div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Sign in to CityBuzz</h3>
        </div>
            <?php echo $this->Session->Flash(); ?>
        <div class="panel-body">
            <?php echo $this->Form->create(array('role'=>'form')); ?>
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" type="email" 
                        name="data[User][email]" required autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="data[User][password]" type="password" required>
                    </div>
                    <!-- <div class="checkbox">
                        <label>
                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                        </label>
                    </div> -->
                    <!-- Change this to a button or input when using this as a form -->
                    <?php 
                        echo $this->Form->button(
                                            'Login',array('type'=>'submit',
                                                    'class'=>'btn btn-lg btn-success btn-block'
                                                )
                        );
                    ?>                    
                    </fieldset>
            </form>
        </div>
    </div>
    <div class="form-group">
           <center>
                    App. Ver -1.0.6  Dep on -14-03-2015 / 8:40 AM
           </center> 
    </div>
</div>
