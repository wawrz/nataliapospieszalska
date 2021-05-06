<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/creating-a-contact-form.html
*/
require_once("./include/fgcontactform.php");

$formproc = new FGContactForm();


//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('wawrzyniec.rzezniak@gmail.com'); //<<---Put your email address here
$formproc->AddRecipient('lukaszpospieszalski@gmail.com'); //<<---Put your email address here
$formproc->AddRecipient('nataliarzezniak@gmail.com'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('CnRrspl1FyEylUj');


if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact us</title>
      <link rel="STYLESHEET" type="text/css" href="contact.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact us</title>
      <link rel="STYLESHEET" type="text/css" href="css/contact.css" />
      <link rel="STYLESHEET" type="text/css" href="css/style.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>

      <style type="text/css">
        @font-face {font-family: unuf; src: url('FONTS/Intro Cond Light Free.otf');} 
        @font-face {font-family: sans; src: url('FONTS/SourceSansPro-Light.ttf');} 
        @font-face {font-family: sansreg; src: url('FONTS/SourceSansPro-Regular.ttf');} 
        @font-face {font-family: theano; src: url('FONTS/TheanoModern-Regular.ttf');} 
        @font-face {font-family: gillsans; src: url('FONTS/GillSansMTPro-Light.otf');} 
        @font-face {font-family: neutramid; src: url('FONTS/NeutraDisplay-MediumAlt.otf');} 
        @font-face {font-family: neutrabold; src: url('FONTS/NeutraDisplay-BoldAlt.otf');} 
        @font-face {font-family: code; src: url('FONTS/CODE_Light.otf');} 
        @font-face {font-family: codeBold; src: url('FONTS/CODE_Bold.otf');}
      </style>
</head>
<body>

<!-- Form Code Start -->
<form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<h3>Kontakt</h3>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
<input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

<div class='short_explanation'> </div>

<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
<div class='container'>
    <h4 for='name' >Imię i Nazwisko: </h4>
    <input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
<div class='container'>
    <h4 for='email' >Adres Email:</h4>
    <input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" />
    <span id='contactus_email_errorloc' class='error'></span>
</div>

<div class='container'>
    <h4 for='message' >Wiadomość:</h4>
    <span id='contactus_message_errorloc' class='error'></span>
    <textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
</div>


<div class='container'>
    <input type='submit' name='Submit' value='Wyślij' />
</div>

</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");

// ]]>
</script>

</body>
</html