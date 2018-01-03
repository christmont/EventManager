<!DOCTYPE html>
@extends('layout2.app')
<html>

    
        @section('content')
         <br><br>
       <center> <h1>Register Subevent</h1></center>
       <br><br>
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action ="/subevent/register" method ="post" enctype = "multipart/form-data">
          {{csrf_field()}}
          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company-name">Subevent Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name ="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company-description">Subevent Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" name="description" class="form-control col-md-7 col-xs-12">
                          <br><br>  <br><br>  
                        
                     </div>
                   </div>
                  
                     
                            <div class="form-group">
                              
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company-description">Event Schedule<span class="required">*</span>
                        </label><div class="col-md-6 col-sm-9 col-xs-12">
                                <div class="input-prepend input-group" >
 
                                  <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                  <input type="text" name="schedule" id="reservation-time" class="form-control" value="01/01/2016 - 01/25/2016" />
                                 
                       
</div>

                                </div>
                              
                            </div>
                       
                              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subevent Type</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <select class="form-control" name ="type">
                            <option value ="1">Single</option>
                            <option value ="2">In and Out</option>
                           
                          </select>
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Event</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <select class="form-control" name ="event">
                            @foreach($events as $event)
                              
                              <option value ="{{$event->id}}">{{$event->name}}</option>
                            @endforeach
                           
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company-name">Subevent Count <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="name" name ="count" required="required" class="form-control col-md-7 col-xs-12">
           <br><br> <br>       
<label class="custom-file col-sm-9">
                              <input type="file" id="file" class="custom-file-input col-md-7 col-xs-12" name="file">
                              <span class="custom-file-control col-md-7 col-xs-12" id="upload-file-info"></span>
                            </label>
                       </div>
                      </div>

                      
                   

                  


                         
                      
                     
                    
                    
                          
                           
                           
                     

                       

                           
                      
                   
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Register</button>
                        </div>
                      </div>

                    </form>
                  </div> @endsection
                
            <script>
            $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });</script>
       

</html>
