<!DOCTYPE html>
<html>
<head>
	<title>MIS</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>">
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="navbar navbar-default">
	<div class="container">
		<h1><span class="glyphicon glyphicon-home"></span>&nbsp;MIS Finals</h1>
	</div>
</div>
<div class="container">

<div class="container">
	<h3>Teachers List</h3>
	<div class="alert alert-success" style="display: none;">
		
	</div>
	<a class='btn btn-primary m-b-1em' href="<?php echo base_url();?>santiago/index">View Students List</a>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
			<tr>
				<td>Account Number</td>
				<td>Student Name</td>
				<td>Address</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody id="showdata">
			
		</tbody>
	
	</table>

</div>
<div class="container">
<input type="button" class="btn btn-primary addmodal" name="add" id="btnadd" value="Add New">
</div>



</div>

</body>
</html>

<div id="studentModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">PROFILE</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="myForm">
            <div class="form-group row">
              <label for="lastn" class="col-sm-4 col-form-label">LAST NAME</label>
              <div class="col-sm-8">
              <input name="lastn" onkeyup="this.value = this.value.toUpperCase();" type="text" class="form-control" text-transform: uppercase>  
              </div>
                        
            <label for="firstn" class="col-sm-4 col-form-label">FIRST NAME</label>
            <div class="col-sm-8">
              <input name="firstn" style="text-transform: uppercase;" type="text" class="form-control"> 
              </div>              
                          
            <label for="mid_i" class="col-sm-4 col-form-label">MIDDLE INITIAL</label>  
             <div class="col-sm-8">
               <input name="mid_i" style="text-transform: uppercase;" type="text" maxlength="2" class="form-control">
              </div>             
            
            <label for="addr" class="col-sm-4 col-form-label">ADDRESS</label> 
             <div class="col-sm-8">
                <input name="addr" style="text-transform: uppercase;" type="text" class="form-control"> 
              </div>              
           
            <label for="gen" class="col-sm-4 col-form-label">GENDER</label>
             <div class="col-sm-8">
                 <input name="gen" type="text" maxlength="1" class="form-control">
              </div> 
          
            <label for="acct" class="col-sm-4 col-form-label">ACCOUNT ID</label>
             <div class="col-sm-8">
              <input name="acct" type="number" min="1" max="999999999" maxlength="10" class="form-control"> 
              </div> 
               
            <label for="dofb" class="col-sm-4 col-form-label">DATE OF BIRTH</label>
             <div class="col-sm-8">
             <input name="dofb" type="date" class="form-control">
               
              </div> 
           <label for="con" class="col-sm-4 col-form-label">CONTACT NUMBER</label>
            <div class="col-sm-8">
             <input name="con" type="number" min="1" max="999999999" maxlength="10" class="form-control">     
              </div> 
           
            <input name="typ" type="hidden" value="T" class="form-control"> 
            </div>        
         </form>
      </div>
      <div class="modal-footer">
        <button id="btnaddd" type="submit" class="btn btn-primary">ADD</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- END ADD MODAL -->

<script>	
$(function(){
    showAllTeacher()

	


		

		//function
		function showAllTeacher(){
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url() ?>santiago/showAllTeacher',
				async: false,
				dataType: 'JSON',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html +='<tr>'+
									'<td>'+data[i].	acct_ID+'</td>'+
									'<td>'+data[i].lname+', '+data[i].fname+' '+data[i].mi+'.</td>'+
									'<td>'+data[i].address+'</td>'+
									'<td>'+
										'<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">View</a>'+
										'<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
										'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
									'</td>'+
							    '</tr>';
					}
					$('#showdata').html(html);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}
	});


</script>