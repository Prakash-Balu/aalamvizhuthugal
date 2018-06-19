<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link rel="icon" href="../assets/images/favicon.png" type="image/png">
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
        <title>Registration</title>
        <style>
            .login-panel {
                margin-top: 150px;
            }
            .inner-form{
                float: none;
                margin:0 auto;
            }
            label.error {
                color: red;
                font-weight: normal;
                font-style: italic;
            }
            input.error {
                border: 1px solid red;
            }
            .panel-heading {
                color: #fff!important;
                background-color: #428bca!important;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 inner-form">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Membership</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" id="registration-form" action="registration.php">
                                <fieldset>
                                    <div class="form-group assoc">
                                        <label for="type">In which way do you associated with the founder of the organization?</label>
                                        <div class="radio">
                                            <label><input type="radio" name="sub_type" value="wellwisher">Wellwisher</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="sub_type" value="college">College</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="sub_type" value="friends">Friends</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="sub_type" value="students">Students</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Name" name="name" type="text" required id="name">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Designation" name="designation" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Date of birth" name="dob" type="text">
                                    </div>
                                    <div class="well">
                                        <div class="form-group">
                                            <label for="type">Address</label>
                                            <input class="form-control" placeholder="Door no." name="door_no" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Street" name="street" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Town" name="town" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Taluk" name="taluk" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="District" name="district" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Pincode" name="pincode" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Contact No *" name="contact_no" type="text" required id="contact_no">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail *" name="email" type="email" required id="email">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Place of working at present" name="place_of_work">
                                    </div>
                                    <div id="for_Students">
                                        <div class="form-group well">
                                            <label>Details of Educational Qualification</label>
                                            <div class="radio">
                                                <label><input type="radio" name="edu_type" value="school">School</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="edu_type" value="college">College</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Your desirable field" name="field" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Name of the teacher who impressed you at school/college" name="imp_person" type="text">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Your hobbies" name="hobbies"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Give any suggestion to develop the organization" name="suggestion"></textarea>
                                        </div>
                                    </div>
                                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit" name="submit" >
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script  type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"  crossorigin="anonymous"></script>
    <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    
    <script>
        jQuery(document).ready(function(){
            jQuery("input[name='sub_type']").click(function(){
                var subType = jQuery("input[name='sub_type']:checked").val();
                if(subType == 'students'){
                    jQuery('#for_Students').show();
                } else {
                    jQuery('#for_Students').hide();
                }
            });
            jQuery("#registration-form").validate({
			rules: {
				name: {
					required: true,
					minlength: 3
				},
				contact_no: {
					required: true,
					minlength: 10,
                                        maxlength: 10,
                                        digits: true
				},
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				name: {
					required: "Please enter your name",
					minlength: "Your username must consist of at least 3 characters"
				},
				contact_no: {
					required: "Please enter your mobile number",
					minlength: "Your password must be at least 5 characters long"
				},
				email: "Please enter a valid email address",
			}
		});
        });
    </script>


</html>

<?php
include("database/db_conection.php"); //make connection here
if (isset($_POST['submit'])) {

    $datas = valueSetter($_POST);

    foreach ($datas as $key => $data) {
        $datas[$key] = $dbcon->real_escape_string($data);
    }

    if ($datas['email'] == '') {
        echo"<script>alert('Please enter the email')</script>";
        exit();
    }

    if ($datas['contact_no'] == '') {
        echo"<script>alert('Please enter the email')</script>";
        exit();
    }

    $check_email_query = "select * from membership WHERE email='" . $datas['email'] . "'";
    $run_query = mysqli_query($dbcon, $check_email_query);

    if (mysqli_num_rows($run_query) > 0) {
        echo "<script>alert('Email {$datas['email']} is already exist in our database, Please try another one!')</script>";
        exit();
    }

    $keys = implode(',', array_keys($datas));
    $values = '"' . implode('","', $datas) . '"';
    $insert_user = "insert into membership ($keys) VALUE (" . $values . ")";
    if (mysqli_query($dbcon, $insert_user)) {
        echo "<script>alert('Registration success!')</script>";
    }
    
    sendSubscriptionConfirmationMail($datas);
    
}

function valueSetter($postData)
{
    $formFields = array('sub_type',
        'name',
        'dob',
        'door_no',
        'street',
        'town',
        'taluk',
        'district',
        'pincode',
        'contact_no',
        'email',
        'place_of_work',
        'edu_type',
        'field',
        'imp_person',
        'hobbies',
        'suggestion');
    $values = array();
    foreach ($formFields as $field) {
        if (!isset($postData[$field])) {
            $values[$field] = '';
        } else {
            $values[$field] = $postData[$field];
        }
    }

    return $values;
}

