<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css"
        integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css">
    <title>TPGBHS</title>
</head>

<body>

    <!-- filtering starts  -->
    <section>
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <h1>TPGBHS</h1>

                    </div>
                    <div class="col-md-4">

                        <form class="form-horizontal" action="">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="edtkeyword"> Keyword</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edtKeyword" name="edtKeyword"
                                        placeholder="Enter Keyword" required>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-10">


                                    <!-- keyword type start  -->

                                    <select name="strKeyWord" id="strKeyWord" class=" form-control mb-2" required>
                                        <option value=''>Select Keyword Type</option>
                                        <option value="STD_NAME">STD_NAME</option>
                                        <option value="NICK_NAME">NICK_NAME</option>
                                        <option value="INVITATION_NAME">INVITATION_NAME</option>
                                        <option value="SCHOOL_NAME">SCHOOL_NAME</option>
                                        <option value="SSC_PASS_YEAR">SSC_PASS_YEAR</option>
                                        <option value="COLLAGE_NAME">COLLAGE_NAME</option>
                                        <option value="HSC_PASS_YEAR">HSC_PASS_YEAR</option>
                                        <option value="PRESENT_PROFESSION">PRESENT_PROFESSION</option>
                                        <option value="WORK_PLACE_NAME">WORK_PLACE_NAME</option>
                                        <option value="WORK_PLACE_ADDRESS">WORK_PLACE_ADDRESS</option>
                                        <option value="SPOUSE_NAME">SPOUSE_NAME</option>
                                        <option value="BABY_NAME">BABY_NAME</option>
                                        <option value="EMAIL">EMAIL</option>
                                        <option value="PHONE">PHONE</option>
                                        <option value="BLOOD_GROUP">BLOOD_GROUP</option>
                                        <option value="EMERGENCY_PHONE">EMERGENCY_PHONE</option>
                                    </select>
                                    <!-- keyword type end  -->
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-success float-right" id="submit" name="submit"
                                        value="Find">
                                </div>
                            </div>
                        </form>


                    </div>
                    <div class="col-md-4">
                        <a href="#" class='btn btn-primary float-right'>Add New</a>
                    </div>
                </div>
            </div>




        </div>
    </section>
    <!-- filtering ends  -->

    <!-- show output starts  -->

    <section class='header'>
        <?php 
            // include 'Connection.php';
            error_reporting(0);
            set_time_limit(1000);

            if (isset($_GET['submit'])){

              // grab value from submit data from url starts
							$TP_STR_KEY_WORD = $_GET['strKeyWord'];
							$TP_EDIT_KEY_WORD = $_GET['edtKeyword'];
							// grab value from submit data from url ends


							// execute query starts
							$curs = oci_new_cursor($conn);

							$stid = oci_parse($conn, "begin APPS_SELECTED_DATA.APPS_GET_STUDENT_DTL(:cur_data,:strKeyWord,:edtKeyword); end;");


							oci_bind_by_name($stid, ":cur_data", $curs, -1, OCI_B_CURSOR);
							oci_bind_by_name($stid, ":strKeyWord", $TP_STR_KEY_WORD, -1, SQLT_CHR);
							oci_bind_by_name($stid, ":edtKeyword", $TP_EDIT_KEY_WORD, -1, SQLT_CHR);

							oci_execute($stid);
							oci_execute($curs);
                            // execute query ends
                            
                            // store fetch data in variable array starts 
							while (($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
								$output[] = $row;
							}
							// store fetch data in variable array ends

            }
        ?>
        <p class="title">information</p>

        <!-- table start  -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Profile Picture</th>
                                <th>Full Name</th>
                                <th>Org. Name</th>
                                <th>Mobile No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ncn</td>
                                <td>ncn</td>
                                <td>ncn</td>
                                <td>ncn</td>
                                <td><a href="#" class='btn btn-primary ml-4'>Edit Button</a></td>
                            </tr>


                            <tr>
                                <td>ncn</td>
                                <td>ncn</td>
                                <td>ncn</td>
                                <td>ncn</td>
                                <td><a href="#" class='btn btn-primary ml-4'>Edit Button</a></td>
                            </tr>


                            <tr>
                                <td>ncn</td>
                                <td>ncn</td>
                                <td>ncn</td>
                                <td>ncn</td>
                                <td>ncn</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>






        <!-- table end  -->


    </section>
    <!-- show output ends  -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>