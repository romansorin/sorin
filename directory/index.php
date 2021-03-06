<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '/srv/http/inc/includes.php';?>
    <?php require 'form_process.php';?>
    <link rel="stylesheet" href="form.css">
    <title>Directory | Mentor High School</title>
    <meta name="description" content="This is a description">
</head>

<body>
    <?php include '/srv/http/inc/header.php';?>
    <div class="container">
        <div id="failure"><?=$failure?></div>
        <div class="contact-header"><h1>Faculty & Staff  - Form Submission</h1></div>
        <div class="row">
            <div class="col-sm-12" id="form-info">
                <p>Please fill out this form to submit information to be included in the faculty and staff directory.</p>
                <br>
                <p>Required fields are marked with an asterisk (*).</p>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form id="contact" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="firstname">First Name *</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$firstname?>" tabindex="1">
                        <span class="error"><?=$name_error?></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="lastname">Last Name *</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$lastname?>" tabindex="2">
                        <span class="error"><?=$name_error?></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email *</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?=$email?>" tabindex="3">
                        <span class="error"><?=$email_error?></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="fac_staff">Faculty or Staff (Type: F or S) *</label>
                        <input type="text" class="form-control" id="fac_staff" name="fac_staff" value="<?=$fac_staff?>" tabindex="4">
                        <span class="error"><?=$fs_error?></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="dept">Department (ex. Department of Mathematics, Department of Guidance) *</label>
                        <input type="text" class="form-control" id="dept" name="dept" value="<?=$dept?>" tabindex="5">
                        <span class="error"><?=$dept_error?></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="unit">Unit (ex. Department of Guidance, Unit 10)</label>
                        <input list="numbers" class="form-control" id="unit" name="unit" value="<?=$unit?>" tabindex="6">
                        <datalist id="numbers">
                            <option value="" selected disabled hidden>Choose here</option>
                            <option value="9">Unit 9</option>
                            <option value="10">Unit 10</option>
                            <option value="11">Unit 11</option>
                            <option value="12">Unit 12</option>
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="subject">OR : Subject (ex. Department of Mathematics, Calculus)</label>
                        <input type="text" class="form-control" id="subject" name="subject" value="<?=$subject?>" tabindex="7">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="room">Room</label>
                        <input type="text" class="form-control" id="room" name="room" value="<?=$room?>" tabindex="8">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="tel">Telephone</label>
                        <input type="text" class="form-control" id="tel" name="tel" value="<?=$tel?>" tabindex="9">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="fax">Fax</label>
                        <input type="text" class="form-control" id="fax" name="fax" value="<?=$fax?>" tabindex="10">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="bio">Bio (prior education, interests, etc.)</label>
                        <textarea class="form-control" id="bio" name="bio" rows="4" cols="50" value="<?=$bio?>" tabindex="11"></textarea>
                    </div>
                    <button type="submit" class="btn contact-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <?php include '/srv/http/inc/footer.php';?>
</body>

</html>