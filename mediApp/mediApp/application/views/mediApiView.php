<html>
<head>
    <title>MEDI APP in Codeigniter</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
        <br />
        <h3 align="center">MEDI APP in Codeigniter</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">MEDI APP in Codeigniter</h3>
                    </div>
                    <div class="col-md-6" align="right">
                        <button type="button" id="add_button" class="btn btn-info btn-xs">Add</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <span id="success_message"></span>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Blood Group</th>
                            <th>Place</th>
                            <th>Phone Number</th>
                            <th>Expire Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <span id="name_error" class="text-danger"></span>
                    <br />
                    <label>Blood Group</label>
                    <input type="text" name="blood_group" id="blood_group" class="form-control" />
                    <span id="blood_group_error" class="text-danger"></span>
                    <br />
                    <label>Place</label>
                    <input type="text" name="place" id="place" class="form-control" />
                    <span id="place_error" class="text-danger"></span>
                    <br />
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" />
                    <span id="phone_number_error" class="text-danger"></span>
                    <br />
                    <label>Expire Date</label>
                    <input type="text" name="expire_date" id="expire_date" class="form-control" />
                    <span id="expire_date_error" class="text-danger"></span>
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    function fetch_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>Test_medApi/action",
            method:"POST",
            data:{data_action:'fetch_all'},
            success:function(data)
            {
                $('tbody').html(data);
            }
        });
    }

    fetch_data();

    $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Blood Request");
        $('#action').val('Add');
        $('#data_action').val("Insert");
        $('#userModal').modal('show');
    });

    $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url() . 'Test_medApi/action' ?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                if(data.success)
                {
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    fetch_data();
                    if($('#data_action').val() == "Insert")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Inserted</div>');
                    }
                }

                if(data.error)
                {
                    $('#name_error').html(data.name_error);
                    $('#blood_group_error').html(data.blood_group_error);
                    $('#place_error').html(data.place_error);
                    $('#phone_number_error').html(data.phone_number_error);
                    $('#expire_date_error').html(data.expire_date_error);
                }
            }
        })
    });

    // $(document).on('click', '.edit', function(){
    //     var user_id = $(this).attr('id');
    //     $.ajax({
    //         url:"<?php echo base_url(); ?>Test_medApi/action",
    //         method:"POST",
    //         data:{user_id:user_id, data_action:'fetch_single'},
    //         dataType:"json",
    //         success:function(data)
    //         {
    //             $('#userModal').modal('show');
    //             $('#name').val(data.name);
    //             $('#blood_group').val(data.blood_group);
    //             $('#place').val(data.place);
    //             $('#phone_number').val(data.phone_number);
    //             $('#expire_date').val(data.expire_date);
    //             $('.modal-title').text('Edit User');
    //             $('#user_id').val(user_id);
    //             $('#action').val('Edit');
    //             $('#data_action').val('Edit');
    //         }
    //     })
    // });

    // $(document).on('click', '.delete', function(){
    //     var user_id = $(this).attr('id');
    //     if(confirm("Are you sure you want to delete this?"))
    //     {
    //         $.ajax({
    //             url:"<?php echo base_url(); ?>Test_medApi/action",
    //             method:"POST",
    //             data:{user_id:user_id, data_action:'Delete'},
    //             dataType:"JSON",
    //             success:function(data)
    //             {
    //                 if(data.success)
    //                 {
    //                     $('#success_message').html('<div class="alert alert-success">Data Deleted</div>');
    //                     fetch_data();
    //                 }
    //             }
    //         })
    //     }
    // });
    
});
</script>