<div id="registrationDiv">
    <div id="registrationFormHeader">
        <h1>Fill the form</h1>
    </div>
    <form method="post" name="registrationForm" id="registrationForm" action="registration/checkUser">
        <div id="registrationFormBody">
            <label for="userLogin">Login</label>
            <br><input class="registrationField" type="text" value="" name="userLogin" id="userLogin">
            <br><label for="userEmail">Email</label>
            <br><input class="registrationField" type="text" value="" name="userEmail" id="userEmail">
            <br><label for="userPassword">Password</label>
            <br><input class="registrationField" type="password" value="" name="userPassword" id="userPassword">
        </div>
        <div id="registrationFormFooter">
            <input type="button" class="prettyButton" value="Back" onclick="backToPreviousPage();">
            <input type="submit" class="prettyButton" value="Registration"">
            <textarea>
                <?=$data['hui'] ?>
            </textarea>
        </div>
    </form>
</div>