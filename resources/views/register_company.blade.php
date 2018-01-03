<!DOCTYPE html>
@extends('layout2.app')
<html>
  
       
    
        @section('content')
         <br><br>
       <center> <h1>Register Company</h1></center>
       <br><br>
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action ="/partner/register" method ="post" enctype = "multipart/form-data">
          {{csrf_field()}}
          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company-name">Company Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name ="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company-description">Company Overview 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" name="description" class="form-control col-md-7 col-xs-12">
                          <br><br>  <br><br>  

                           <label class="custom-file col-sm-9">
                              <input type="file" id="file" class="custom-file-input col-md-7 col-xs-12" name="file">
                              <span class="custom-file-control col-md-7 col-xs-12" id="upload-file-info"></span>
                            </label>
                        </div>
                      </div>
                   
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Register</button>
                        </div>
                      </div>

                    </form>
                  </div> @endsection
                
            
       

</html>
