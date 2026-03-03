<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<!--

Possible new themes:
base16-atelier-forrest
base16-atelier-seaside
base16-bespin
base16-colors
base16-darkmoss
base16-green-screen
base16-hardcode
base16-heetch-dark!
base16-humaoid-dark
base16-ros-pine
green-screen
github-dark-dimmed
rose-pine-moon-min
https://localhost/auth0api

Rainbow
Monokai sublime
ros pine moon
ros pine
-->

<!DOCTYPE html>
	<html>
		<head>
			<title>Auth0 - Kaustinen test environment</title>
	    <link rel="shortcut icon" href="favicon.png">
			<meta charset="utf-8">
			<link id="highlightJsStyle" rel="stylesheet" href="resources/css/highlight.js-styles/base16/brogrammer.css">	
			<script src="resources/js/jquery.min.js" type="text/javascript"></script>
			<script src="resources/js/highlight.pack.js" type="text/javascript"></script>
			<script src="resources/js/common.js" type="text/javascript"></script>
			<script src="resources/js/curl-to-php.js" type="text/javascript"></script>			
			<!--<link rel="stylesheet" href="resources/css/color-brewer.css">-->
	    <link rel="stylesheet" href="resources/css/common.css">

		</head>
		<body>

			<?php
			$_POST['pass'] = "auth0testenvironmentssalesengineersftw";
			if(isset($_POST['pass']) && $_POST['pass'] == "auth0testenvironmentssalesengineersftw")
			{

				?>
	        <div style="display: none;" id="apiCalls">



	     <textarea class="apiCall generateUserAuthenticationUrl" data-availablenextsteps="requestAccessToken 2" id="generateUserAuthenticationDefault" data-apiCallName="Login" data-apiCallNameFamily="Login Flow" data-requesttype="getUrl" data-buttonName="Login" data-apiCallInformation="Hi and welcome to Kaustinens API playground! 👋<br><br>This is a place for you to play around with Auth0s APIs, test out various user flows and much more! Either you can start a standard login flow below, or use the menu on the left to do something completely different. This tool is a playground, go enjoy it!<br><br>Click below to start logging in:"><tenantUrl>/authorize?response_type=code&audience=<audience>&client_id=<clientId>&scope=<scope>&prompt=<promptLogin>&organization=<organization>&connection=<connection>&redirect_uri=<returnUrl></textarea>

	     <!--<textarea class="apiCall generateUserAuthenticationUrl" id="generateUserAuthenticationAllUrl" data-apiCallName="Authorization Code Flow" data-apiCallNameFamily="Login Flow" data-requesttype="getUrl" data-buttonName="Authorization Code Flow" data-apiCallInformation="Hi and welcome to Kaustinens API playground! 👋<br><br>This is a place for you to play around with Auth0s APIs, test out various user flows and much more! Either you can start a standard login flow below, or use the menu on the left to do something completely different. This tool is a playground, go enjoy it!<br><br>Click below to start logging in:"><tenantUrl>/authorize?response_type=code&audience=<audience>&client_id=<clientId>&redirect_uri=http%3A%2F%2Flocalhost/auth0&scope=<scope>&prompt=<promptLogin>&organization=<organization>&connection=<connection></textarea>-->

	     	<!-- prompt=consent -->

	      <textarea class="apiCall generateUserAuthenticationUrl" id="generateUserAuthenticationDbUrl" data-apiCallName="Database SSO Login" data-requesttype="getUrl" data-buttonName="Database Login"><tenantUrl>/authorize?response_type=code&connection=Username-Password-Authentication&client_id=<clientId>&redirect_uri=http%3A%2F%2Flocalhost/auth0&audience=<audience>&scope=<scope>&prompt=<promptLogin>&organization=<organization></textarea>

	      <textarea class="apiCall generateUserAuthenticationUrl" id="generateUserAuthenticationGoogleUrl" data-apiCallName="Google Login" data-requesttype="getUrl" data-buttonName="Google Login"><tenantUrl>/authorize?response_type=code&audience=<audience>&connection=google-oauth2&client_id=<clientId>&redirect_uri=<returnUrl>&scope=<scope>&prompt=<promptLogin>&organization=<organization></textarea>

		<!--<textarea class="apiCall generateUserAuthenticationUrl" id="requestIdTokenImplicitFlow" data-apiCallName="Implicit Flow" data-requesttype="getUrl" data-buttonName="Implicit Flow" data-apiCallInformation="🚧 Initiate the Implicit Flow"><tenantUrl>/authorize?response_type=id_token&client_id=<clientId>&redirect_uri=<returnUrl>/implicit.php&scope=<scope>&response_mode=form_post&nonce=nonce&connection=<connection>&state=implicit</textarea>-->

		<textarea class="apiCall generateUserAuthenticationUrl" id="initiateLoginPar" data-apiCallName="PAR Login" data-requesttype="POST" data-apiCallInformation="🚧 Initiate the PAR login flow">curl --location '<tenantUrl>/oauth/par' \
		--header 'Content-Type: application/x-www-form-urlencoded' \
		--data-urlencode 'client_id=<clientId>' \
		--data-urlencode 'client_secret=<clientSecret>' \
		--data-urlencode 'redirect_uri=<returnUrl>' \
		--data-urlencode 'response_type=code' \
		--data-urlencode 'scope=<scope>' \
		--data-urlencode 'state=par' \
		--data-urlencode 'audience=<audience>'</textarea>

		<textarea class="apiCall generateUserAuthenticationUrl" id="initiateDeviceAuthorizatoinFlow" data-apiCallName="Device Authorization" data-requesttype="POST" data-apiCallInformation="🚧 Initiate the DAF login flow, complete it in the next API call called Complete Device Authorization Flow">curl --location '<tenantUrl>/oauth/device/code' \
		--header 'Content-Type: application/x-www-form-urlencoded' \
		--header 'Accept: application/json' \
		--data-urlencode 'client_id=<clientId>' \
		--data-urlencode 'scope=<scope>' \
		--data-urlencode 'audience=<audience>'</textarea>

		<textarea class="apiCall generateUserAuthenticationUrl" id="completeDeviceAuthorizatoinFlow" data-apiCallName="Complete Device Authorization Flow" data-requesttype="POST" data-apiCallInformation="🚧 Complete the DAF login flow">curl --location '<tenantUrl>/oauth/token' \
		--header 'content-type: application/x-www-form-urlencoded' \
		--data-urlencode 'grant_type=urn:ietf:params:oauth:grant-type:device_code' \
		--data-urlencode 'device_code=<deviceCode>' \
		--data-urlencode 'client_id=<clientId>'</textarea>

	      <textarea class="apiCall generateUserAuthenticationUrl" id="requestAccessToken" data-apiCallName="Request Access Token" data-requesttype="POST" data-apiCallInformation="🚧 Request access token from the returned code:">curl --location '<tenantUrl>/oauth/token' \
			--header 'content-type: application/x-www-form-urlencoded' \
			--data-urlencode 'grant_type=authorization_code' \
			--data-urlencode 'client_id=<clientId>' \
			--data-urlencode 'client_secret=<clientSecret>' \
			--data-urlencode 'code=<code>' \
			--data-urlencode 'redirect_uri=<returnUrl>' \</textarea>

			<textarea class="apiCall userActions" id="logoutUser" data-apiCallName="Logout User" data-requesttype="getUrl" data-buttonName="User Logout" data-apiCallNameFamily="User Actions" data-apiCallInformation="🚧 Logout a user from a local database"><tenantUrl>/v2/logout?returnTo=<returnUrl>?logout=true&client_id=<clientId>&redirect_uri=<returnUrl></textarea>

			<textarea class="apiCall userActions" id="logoutUserOidc" data-apiCallName="Logout User (OIDC)" data-requesttype="getUrl" data-buttonName="User Logout (OIDC)" data-apiCallInformation="Logout the user"><tenantUrl>/v2/logout?federated=true&client_id=<clientId>&returnTo=<returnUrl>?logout=true</textarea>

			

			<textarea class="apiCall userActions" id="createDbUser" data-apiCallName="Create Database User" data-requesttype="POST" data-apiCallInformation="🚧 Creates a database user within Auth0s own database<br><br>⚠️ Make sure to change the username and password to a new user">curl --location '<tenantUrl>/dbconnections/signup' \
			--header 'Content-Type: application/json' \
			--header 'Accept: application/json' \
			--data-raw '{
			  "client_id": "<clientId>",
			  "email": "authHej@atko.email",
			  "password": "Trettontrettiosju1337@",
			  "connection": "Username-Password-Authentication",
			  "username": "authHej",
			  "given_name": "Bo",
			  "family_name": "Ek",
			  "name": "Bo Ek",
			  "picture": "https://kausti.com/blogg/wp-content/uploads/2025/07/image_editor_output_image692387893-17524385280715192236037412144301.jpg",
			  "user_metadata": {}
			}'</textarea>

			<textarea class="apiCall userActions" id="changeUserPassword" data-apiCallName="Change User Password 🚧" data-requesttype="POST" data-apiCallInformation="Change a users password:">curl --location '<tenantUrl>/dbconnections/signup' \
			--header 'Content-Type: application/json' \
			--header 'Accept: application/json' \
			--data-raw '{
			  "client_id": "<clientId>",
			  "email": "authHej@atko.email",
			  "password": "Trettontrettiosju1337@",
			  "connection": "Username-Password-Authentication",
			  "username": "authHej",
			  "given_name": "Bo",
			  "family_name": "Ek",
			  "name": "Bo Ek",
			  "picture": "https://kausti.com/blogg/wp-content/uploads/2025/07/image_editor_output_image692387893-17524385280715192236037412144301.jpg",
			  "user_metadata": {}
			}'</textarea>

			<textarea class="apiCall passwordLess" id="initiatePasswordlessLogin" data-apiCallName="Initiate Passworless Login" data-requesttype="POST" data-apiCallNameFamily="Passwordless Login" data-apiCallInformation="Initiate a passwordless login using a OTP code">curl --location '<tenantUrl>/passwordless/start' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--header 'Authorization: Bearer <accessToken>' \
--data-urlencode 'client_id=<clientId>' \
--data-urlencode 'connection=email' \
--data-urlencode 'email=michael.kaustinen@atko.email' \
--data-urlencode 'send=code' \
--data-urlencode 'client_secret=<clientSecret>'
			</textarea>

			<textarea class="apiCall passwordLess" id="validateOtpCode" data-apiCallName="Validate Passwordless Login OTP" data-requesttype="POST" data-apiCallInformation="Validate the OTP from the previous API call by entering it into the input box: ">curl --location '<tenantUrl>/oauth/token' \
			--header 'Content-Type: application/json' \
			--data-raw '{
			    "grant_type": "http://auth0.com/oauth/grant-type/passwordless/otp",
			    "client_id": "<clientId>",
			    "client_secret": "<clientSecret>",
			    "otp": "<mfaOtp>",
			    "realm": "email",
			    "username": "michael.kaustinen@atko.email",    
			    "scope": "<scope>",
			    "redirect_uri": "<returnUrl>"
			}'</textarea>

			<!-- ⚠️ This call will not work unless MFA is enabled on your tenant! --> 
			<!--<textarea class="apiCall mfa" id="mfaInitiateLogin" data-apiCallName="MFA Login Initiation" data-requesttype="POST" data-apiCallNameFamily="MFA" data-apiCallInformation="Initiate MFA login for a user.<br><br>⚠️ Please note: Make sure to use a tenant with MFA enabled for this API call, else it will fail">curl --location '<tenantUrl>/oauth/token/' \
			--header 'content-type: application/x-www-form-urlencoded' \
			--data-urlencode 'grant_type=client_credentials' \
			--data-urlencode 'client_id=<clientId>' \
			--data-urlencode 'client_secret=<clientSecret>' \
			--data-urlencode 'audience=<audience>' \
			--data-urlencode 'scope=<scope>'
			</textarea>

			<textarea class="apiCall mfa" id="getMfaAuthenticators" data-apiCallName="List MFA Authenticators" data-requesttype="GET" data-apiCallInformation="List all MFA Authentication devices a user have. E.g. if they have activated the Auth0 Guardian app and entered their phone number this call will list those two options. If no MFA types have been enabled by the user this result will be empty:">curl --location '<tenantUrl>/mfa/authenticators' \
--header 'authorization: Bearer <mfaToken>' \
--header 'content-type: application/json' \</textarea>
		

			<textarea class="apiCall mfa" id="mfaLogin" data-apiCallName="Verify OTP" data-requesttype="POST" data-apiCallInformation="Verify the OTP code from the previous API call:">curl --location '<tenantUrl>/oauth/token' \
--header 'content-type: application/x-www-form-urlencoded' \
--data-urlencode 'grant_type=http://auth0.com/oauth/grant-type/mfa-otp' \
--data-urlencode 'client_id=<clientId>' \
--data-urlencode 'client_secret=<clientSecret>' \
--data-urlencode 'mfa_token=<mfaToken>' \
--data-urlencode 'otp=<otp>'</textarea>
-->

			<textarea class="apiCall generateUserAuthorizationUrl" id="generateUserAuthorizationUrl" data-apiCallName="Request User Authorization (Authorization Code Flow)" data-apiCallNameFamily="Authorization" data-requesttype="getUrl" data-buttonName="Authorization Code Flow" data-apiCallInformation="Generate User Authorization URL via the Authorization Code flow: "><tenantUrl>/authorize?audience=https://localhost/auth0api&scope=read:appointments&response_type=code&client_id=<clientId>&prompt=<promptLogin>&organization=<organization>&connection=<connection>&redirect_uri=http%3A%2F%2Flocalhost%2Fauth0</textarea>

			<!-- ⚠️ This call will not work unless your application type is SAP in the Auth0 Dashboard! --> 
			<textarea class="apiCall generateUserAuthorizationUrl" id="generateUserAuthorizationPkceUrl" data-apiCallName="Request User Authorization (PKCE)" data-requesttype="getUrl"  data-buttonName="Request User Authorization (PKCE)" data-apiCallInformation="Request User Authorization using PKCE:">
			<tenantUrl>/authorize?response_type=code&client_id=<clientId>&scope=<scope>&code_challenge=<codeChallenge>&code_challenge_method=S256&state=pkce&audience=<audience>&prompt=<promptLogin>&redirect_uri=<returnUrl></textarea>

			<textarea class="apiCall generateUserAuthorizationUrl" id="requestAccessTokenPkce" data-apiCallName="Request Access Token (PKCE)" data-requesttype="POST" data-apiCallInformation="🚧 Request access token from the returned code using PKCE">curl --location '<tenantUrl>/oauth/token' \
			--header 'Content-Type: application/x-www-form-urlencoded' \
			--header 'Accept: application/json' \
			--data-urlencode 'grant_type=authorization_code' \
			--data-urlencode 'client_id=<clientId>' \
			--data-urlencode 'code=<code>' \
			--data-urlencode 'code_verifier=<codeVerifier>' \
			--data-urlencode 'redirect_uri=<returnUrl>'</textarea>

<!--
<tenantUrl>/authorize?response_type=code&client_id=<clientId>&redirect_uri=http://localhost/auth0&scope=read:appointments&code_challenge=577295be00674421f038dff8d756fa3db533cc937265c3ae7edab559&code_challenge_method=S256&state=pkce&audience=https://localhost/auth0api -->

			<textarea class="apiCall callLocalhostAuth0Api" id="callLocalhostAuth0Api" data-apiCallName="Call localhost/auth0api" data-apiCallNameFamily="Localhost API" data-requesttype="POST" data-apiCallInformation="⚠️ Requires the environment called Demo <br><br>🚧 This API call will send an access_token to the API on /auth0api, and the API will then try to verify the token, both in terms of making sure the signature is correct as well as display the token content if all is OK">
			curl --location 'http://localhost/auth0api/' \
			--header 'content-type: application/x-www-form-urlencoded' \
			--header 'Authorization: Bearer <accessToken>' \
			--data-urlencode 'redirect_uri=<returnUrl>'</textarea>

			<textarea class="apiCall callLocalhostAuth0Api" id="callLocalhostAuth0ApiWithIncorrectToken" data-apiCallName="Incorrect token test (will fail)" data-requesttype="POST" data-apiCallInformation="⚠️ This API call will fail. And it is supposed to do so to show the token validation from the API">curl --location 'http://localhost/auth0api/' \
			--header 'content-type: application/x-www-form-urlencoded' \
			--header 'Authorization: Bearer eyJxbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6IjNILWdmOGVqMkJBY3hRUWdoQ01sRyJ9.eyJpc3MiOiJodHRwczovL2thdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20vIiwic3ViIjoiYXV0aDB8NjhkMjg4NDYxOWUzNGFhMmE0M2MzYzM1IiwiYXVkIjoiaHR0cHM6Ly9sb2NhbGhvc3QvYXV0aDBhcGkiLCJpYXQiOjE3NTg2MzU2MTksImV4cCI6MTc1ODcyMjAxOSwic2NvcGUiOiJyZWFkOmFwcG9pbnRtZW50cyIsImF6cCI6ImQ1QXVVNmFBb1FxNEc4dFBlV2xITk1nOW1RSjVWcjF5In0.I36gBNZxbQsNNFb08NPz7eH-AhyFnHpi4L2_rJBclXnay05v8mtF-EidBOyVSW1p8rFExsVgsAYJRkeJpkPKrG23l_Ok-eP70bvUDeXmciiYPDDJg5j47hY2WC3mh-vB1DHWfdQTn851vazvhIweNp4OjqPdM7Y4pl9HSfAavSeNRoVyjmWYtdNLuEjM0A-douH96JQ-HZHBF7xqd4-OsN9njHqZdT5f1YkqsBiZETNmNsYdtA8UkH-ru7-IwYIDQxX7UuvBXF76xDu1MbroZdN45suczlhwDkphJz6lsAkzybXK5gegT-_7mFckjoi81qwduVp318TqVQ4HPwHPEA' \
			--data-urlencode 'redirect_uri=http://localhost/this-call-will-fail'</textarea>

			<textarea class="apiCall callLocalhostAuth0Api" id="customTokenExchange" data-apiCallName="Custom Token Exchange" data-requesttype="POST" data-apiCallInformation="⚠️ Exchanges a legacy token for a new Auth0 token">
			curl --location '<tenantUrl>/oauth/token' \
			--header 'Content-Type: application/x-www-form-urlencoded' \
			--header 'Accept: application/json' \
			--data-urlencode 'grant_type=urn:ietf:params:oauth:grant-type:token-exchange' \
			--data-urlencode 'subject_token_type=<subjectTokenType>' \
			--data-urlencode 'subject_token=<accessToken>' \
			--data-urlencode 'client_id=<clientId>' \
			--data-urlencode 'client_secret=<clientSecret>'
			--data-urlencode 'audience=<audience>' \
			--data-urlencode 'scope=<scope>'  \</textarea>

			<!--<textarea class="apiCall dynamicallyRegisterApplication" id="dynamicallyRegisterApplication" data-apiCallName="Dynamically Register Application" data-requesttype="POST" data-apiCallNameFamily="Other" data-apiCallInformation="🚧 Dynamically create an application (requires a setting to be enabled on the tenant to work)">curl --location '<tenantUrl>/oidc/register' \
			--header 'Content-Type: application/json' \
			--data '{
			    "client_name": "Application name",
			    "redirect_uris": [
			        "https://localhost/auth0"
			    ],
			    "token_endpoint_auth_method": "client_secret_post"
			}'</textarea>-->

			<textarea class="apiCall managementApi" id="getManagementApiAccessToken" data-apiCallName="Get Management API Access Token" data-requesttype="POST" data-apiCallNameFamily="Management API" data-apiCallInformation="🚧 Get an access token for the Management API">curl --location '<tenantUrl>/oauth/token' \
			--header 'content-type: application/x-www-form-urlencoded' \
			--data 'grant_type=client_credentials' \
			--data 'client_id=<clientId>' \
			--data 'client_secret=<clientSecret>' \
			--data 'audience=<tenantUrl>/api/v2/'</textarea>

			<textarea class="apiCall managementApi" id="setUserProfileImage" data-apiCallName="Update user profile image" data-requesttype="PATCH" data-apiCallInformation="🚧 Update a users profile image">curl --location '<tenantUrl>/api/v2/users/<userId>' \
--header 'content-type: application/json' \
--header 'authorization: Bearer <managementApiAccessToken>' \
--data-urlencode '{"picture": "https://kausti.com/okta/marielle.jpeg"}'</textarea>

			<textarea class="apiCall managementApi" id="getSubOrganizatios" data-apiCallName="Get all Organizations a user belongs to" data-requesttype="GET" data-apiCallInformation="🚧 Get all organizations a user belongs to">curl --location '<tenantUrl>/api/v2/users/<userId>/organizations' \
			--header 'Accept: application/json' \
			--header 'Authorization: Bearer <managementApiAccessToken>'</textarea>

			<textarea class="apiCall managementApi" id="getUserInfo" data-apiCallName="Get all information about a user" data-requesttype="GET" data-apiCallInformation="🚧 Get all user info">curl --location '<tenantUrl>/api/v2/users/<userId>' \
			--header 'Accept: application/json'
			--header 'Authorization: Bearer <managementApiAccessToken>'</textarea>

			<textarea class="apiCall managementApi" id="getUserMfaAuthenticationMethods" data-apiCallName="Get User MFA options" data-requesttype="GET" data-apiCallInformation="🚧 Retrieve detailed list of MFA authentication methods associated with a specified user">curl --location '<tenantUrl>/api/v2/users/<userId>/authentication-methods' \
			--header 'Accept: application/json'
			--header 'Authorization: Bearer <managementApiAccessToken>'</textarea>

			<textarea class="apiCall managementApi" id="getUserLogs" data-apiCallName="Get a Users Logs" data-requesttype="GET" data-apiCallInformation="🚧 Retrieve log events for a specific user">curl --location '<tenantUrl>/api/v2/users/<userId>/logs' \
			--header 'Accept: application/json'
			--header 'Authorization: Bearer <managementApiAccessToken>'</textarea>

			<textarea class="apiCall managementApi" id="getUsersSessions" data-apiCallName="Get a Users Sessions" data-requesttype="GET" data-apiCallInformation="🚧 Get a users logged in sessions">curl --location '<tenantUrl>/api/v2/users/<userId>/sessions' \
			--header 'Accept: application/json'
			--header 'Authorization: Bearer <managementApiAccessToken>'</textarea>

			<textarea class="apiCall managementApi" id="deleteUserSession" data-apiCallName="Delete a specific User session" data-requesttype="DELETE" data-apiCallInformation="🚧 Delete a users session">curl --location '<tenantUrl>/api/v2/sessions/<sessionId>' \
			--header 'Accept: application/json'
			--header 'Authorization: Bearer <managementApiAccessToken>'</textarea>

			<textarea class="apiCall managementApi" id="linkAccounts" data-apiCallName="Link accounts" data-requesttype="DELETE" data-apiCallInformation="🚧 Link two user accounts. When logging in with the secondary email address the user will be logged in as the primary user.">curl --location '<tenantUrl>/api/v2/users/<userId>/identities' \
			--header 'Authorization: Bearer <managementApiAccessToken>' \
			--header 'content-type: application/json' \
			--data '{
			    "provider": "<provider>",
			    "user_id": "<linkUserId>"
			}'</textarea>

</div>

		<div id="pf">
		  <div id="uno">
		    

	        <header class="header" style="display: inline-block; margin: 0px; float: left; margin-top: 1em; margin-left: 1em; margin-right: 2em; height: 100%;">

		<!--<div style="background: red !important;">-->
			<a href="/auth0"><img src="logo.svg" style="max-width: 250px; margin-top: 5px; margin-right: 2em; margin-bottom:2em; float: left; z-index: 99; position: relative;" /></a>

			<div style="float: left; margin-left: -175px; margin-top: 60px; color: white; text-transform: uppercase; border-radius: 5px; font-size: 8px; position: relative; padding: 1em 1em 1em 1em; margin-bottom: 20px;" id="logoImage">Kaustinens API playground</div>
			<div style="clear: both"></div>

			<!--<div style="clear: both;"></div>-->
		<!--</div>-->
<div id="headerDivForSelect" style="float: left !important; display: inline-table; padding-right: 2em; padding-left: 1em;"></div>

	        </header>


			<main>

				<div style="position: absolute; left: 260px; top: 20px; z-index: 199;">
						  <form id="curlDataForm" class="language-curl" style="padding: 3em; border-radius: 10px	;">
									<div style="color: white;">
										<h4><span id="apiCallNameDiv"></span></h4>
										<div style="margin: 5px 5px 0px 5px; border-top: 2px solid transparent; font-size: 13px; display: block;" class="secondaryFontColor" id="breadcrumbsDiv"></div>
									</div>
									
									<div class="welcomeDiv primaryColor" style="margin-top: 13px;background: #f3bd09; border-radius: 8px; padding: 8px; font-size: 10px; margin-bottom: -15px; padding-bottom:2em; z-index: 100; width: 500px;">Introduction</div>

									<div class="instructionsDiv fourthFontColor" id="getUrlInformationText" style=""></div>

		                				<div id="generateUserAuthenticationUrlButtonDiv" style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; width: 500px; padding: 10px; padding-top: 1em; padding-bottom:3em;"><!--<br><span style=" color: #44c7f4">Hi!</span><br><br>Welcome to Kaustinen's Auth0 API playground! 🚧<br><br> Here you can test out various user flows, from logging in to initiating step up Authentication and much more.<br><br><br>Click below to start an authentication flow (or select another API call<br>in the lefthand menu for other stuff):<br><br><br><br>-->
									<div style="margin-left: 0px; width: 100%; overflow: hidden; word-break: break-all;">
		                				<div id="addGetUrlButton"></div>

		                				<!--<div id="generateUserAuthorizationUrlButtonDivButton"></div>-->
		                				
		                				<!---->
		                			</div>

		                				<!--<br><br><br><br><span style="color: #44c7f4">How it works</span><br><br>The CURL boxes you see in the various flows contains the raw CURL commands that will be sent by this site's backend to the Auth0 API. The responses from the API are then presented in the API Response box.<br><br><br>--></div>



									<div style="float: left;width: 500px; margin-right: 2em;">	<div class="apiDivHeader primaryColor" id="apiDivHeaderId">API Call (CURL)</div>							
										<textarea id="curlDataTextarea" rows="11" placeholder="Paste curl here" style="width: 100%;">x</textarea><br>

										<pre><div class="instructionsDiv primaryFontColor" id="curlSyntaxInformationText"></div><code id="curlSyntax" class="language-curl" style="padding: 1em; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; padding:10px;"></code></pre>
<div id='getExtraInformationDiv' style='float:left; color: white; /*background: #1f1f1f;*/ opacity: 1; width: 500px; z-index: 900; position: relative; display: none; text-align: right; margin-top: -2em; min-height: auto; background: #1f1f1f; border-radius: 8px; padding-bottom:2em;'><div id="getExtraInformationDivCentered" style="margin-right: 1.5em; margin-top: 10px;"></div></div>

										<input id="curlDataSubmitButton" class="thirdColor" type="submit" value="Send request" style="float:left; margin-top: 1.4em;"> 
										<input class="showCurlDataTextarea fourthColor" type="submit" value="Edit" title="Edit API call" style="float:left; display: none;margin-top: 1.4em;"><!-- <input id="editCurlDataTextareaButton" style="background: black; color: #f3bd09; margin: 2px 5px 2px 5px;" type="submit" value="Edit">-->

										
										<div style="clear:both"></div>
										<br><br>
									</div>

									<div style="display: block; float: left; width: 500px;">

										<!-- Removed class="apiDivHeader" -->
										<div class="apiDivHeader secondaryColor" id="apiDivHeaderApiResponse" style="">API Response<div id='jwtActionsButtons' style='float: right;'></div></div>

		                				<pre><code id="apiResponse" class="primaryFontColor language-json" style="min-height: 228px; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; height: auto;"></code></pre>

		                				<div id="jwtDisplayerAccessToken" class="jwtDisplayer" style="display: none;">
											<div class='apiDivHeader primaryColor' style='background: #f3bd09; margin-bottom:-10px;'>Access Token JWT content</div><pre><code class='language-json'></code></pre>
										</div>

										<div id="jwtDisplayerIdToken" class="jwtDisplayer" style="display: none;">
											<div class='apiDivHeader primaryColor' style='background: #f3bd09; margin-bottom:-10px; '>ID Token JWT content</div><pre><code class='language-json'></code></pre>
										</div>
										
										<div id="qrCodeDiv">
											<img id="qrCodeTest" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAMQAAADEAQAAAADo3bPGAAABmUlEQVR4Xu2WQW7EQAgE+wf8/5f8gHQx8tqJkksEN7O2ZaYOC0yDR/WHpX6uXPaSl2D/JpJCyvCvVIG7QoLLb0aVEe2uEEWkzevlJ+4acYqSXeVx98ipqt/2iK9O1An79VnRUYIkHvZDO3MEQ4HIg0DaFgiFtNaNUOQR5gbJU0QhRKeZJLpBiix9I0JL3oq8IhgmXcuTsPetWiQLpNPz4tVhzniFUE7ULkSZ2QFsEPKLztcqYVigxg1S9O+ZD3ZbkhvEIfCvTAnkoV5cIKyKIY460OK9p7MkjgSZRUfuV0WnCZ+LIw31dUcwSegp8kP2vOtW/ChJeglfqKOVv0RwHYEL68dprQXCvBOITKM3coUUDZx9Ego2MT8dPEvs8Mdi9rFrLZENQj2RYqJIvk+fCEaJM/RdfUwt+vkTwTQpxl77p5PvCCYJxoxgstJkj54bJSw6S1pXyL2DWSDBhQaTjXtGMEzUQudUx/dWZLtF4iScvXTv6TjhSWeR56Ois4TlQpBt6iPkAiFFSmlfbOF37cyRX+0lL8GGyRckWyV0dh1WeAAAAABJRU5ErkJg"></div>

	                	<div id="output" style="display:none;"></div>
									</div>

									<div style="clear: both;"></div>

	            </form>
				</div>
				
				

				<!--filter: invert(1);-->

				

				<a href="#pf" id="goToProfileView" style='position: absolute; right: 30px; top: 10px; margin-right: 60px; z-index:9999; background: black; border-radius: 4px; padding:4px;'><img src="icon-user.svg" style="width:25px; filter:invert(100%);"/></a>

				<div style="clear: both;"></div>
			</main>
		  </div>
		  <div id="dos" style="display: flex; justify-content: center; align-items: center; height:100vh;">
			
			<div style="width: 1000px; margin: 0 auto;">
				
				
				<div style="float: left;" class="blackBox">
					<div style="background-color: rgb(31, 31, 31); border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 8px; font-size: 10px;  margin-top:1em; width: 260px; background-size: 100% auto; background-repeat: no-repeat; background-position: top center;  text-align: center; color: rgb(31, 31, 31)">
						<!--<div style="float:left; margin-left: -30px; margin-top: -30px; ">
							<img style="height:70px; width: 70px; border-radius: 50%; border: 0px solid #1f1f1f;" src="https://kausti.com/icons8/bricks-on-moon.png"> 
						</div>-->
						<span id="profileEnvironmentName">GUI Example</span>
						<!--&nbsp;&nbsp;&nbsp;&nbsp;-->
						
					</div>
					<!--<div style="background-color: #1f1f1f; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 8px; font-size: 10px; padding-bottom:2em; margin-top:1em; width: 260px; height: 130px; background-image: url('/auth0/horiz0n.jpg'); background-size: 100% auto; background-repeat: no-repeat; background-position: top center;  text-align: center; font-size: 15px;">
						<br><br><img style="height:60%; width: auto;" src="https://kausti.com/okta/horizon.png">
					</div>-->
			  		<div style="min-height: 228px; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; background: #1f1f1f;width: 260px; color: white; padding: 10px;text-align: center;" >
			  			<div id="companyLogoImgContainer" style="margin-top: -62px; margin-left: -30px;  border-radius: 50%;  max-width:100px; height: 76px;"><img class="profileImage companyLogoImg" style="max-width: 100px; height: 76px;  border-radius: 50%; border: 3px #1f1f1f solid;  background: #1f1f1f" src="auth0-favicon.svg"/></div>
			  			<br><div>

			  				<div class="profileImage"></div>
			  				<!--<img class="profileImage" style="" src="https://www.ftz.dk/wp-content/uploads/FTZ_Logo_White.svg"/>-->
			  				<!--<img class="profileImage" style="max-width: 196px; height: 96px;" src="auth0-favicon.svg"/>-->
			  				<!-- kausti.com/okta/horizon.png -->
			  			<span><span class="profileName">Not logged in</span></span></div>

			  			
			  			<br><br>
			  			<div style="line-height: 50px; overflow-wrap: break-word;">
				  			<span class="profileLogin"></span>

				  			
				  				<!--<div id="addGetUrlButton" style="display: flex; width: 100%; margin-top: 8px">
									<a href="https://kaustinen.cic-demo-platform.auth0app.com/authorize?audience=https://localhost/auth0api&amp;scope=read:appointments&amp;response_type=code&amp;	client_id=d5AuU6aAoQq4G8tPeWlHNMg9mQJ5Vr1y&amp;redirect_uri=http://localhost/auth0&amp;prompt=<promptLogin>&state=showProfile" class="htmlButton" style="display: flex; margin: auto;"> Authorize app</a>

				  				</div>-->
				  			<br>
				  			

				  			<!-- <profileinitiatePasswordless>
				  			<profilemfaLogin>
				  			<profileauthorizeApplication>
				  			<profilecallLocalhostApi>-->
			  			</div>
			  		</div>
			  	</div>

		  		<div style="float: left; width: 650px; margin-left: 50px;">
			  		<div class="profileDetailsHeader secondaryColor" style="border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 8px; font-size: 10px; padding-bottom:2em; margin-top:1em; width: 100%; height: 1em;">Profile</div>
			  		<div id="profileDetailsDiv" style="min-height: 500px;border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; background: #1f1f1f;width: 100%; color: white; padding: 10px; height: auto; overflow-x: auto;" >
			  			<span class="profileIntro">Welcome!

			  		Feel free to login.</span>
			  			<!--<pre style="width: 100%; margin-top: 0px; padding-top: 0px"><code class="tokenInfo language-json" style="width: 100%; overflow: hidden;"></code></pre>--><br><br>
			  			
			  			<pre style="width: 100%; overflow-wrap: break-word;"><code class="profileInfo language-json" style="width: 100%;"></code></pre>
			  			<br>

			  		</div>
			  	</div>
		  		<div style="clear: both"></div>
		  	
		  	</div>
		    <a href="#dv" id="goToDevView" style='position: absolute; right: 30px; top: 10px; margin-right: 60px; z-index: 9999; padding:0px; background: black; border-radius: 4px;'><img src="icon-backend.svg" style='height:29px; filter: invert(100%); margin-top:3px'/></a>


		  </div>
		</div>

		<div id="loggedInUserIdTokenAndAccessToken" style="width: 500px; z-index: 999; position: absolute; right: 10px; bottom: 60px; display: none">
			<div class="apiDivHeader" style="position: sticky; z-index:1000; border-bottom-right-radius: 0px;border-bottom-left-radius: 0px; padding-bottom: 8px; margin-bottom:0px;">User Info</div>
			<div style="width: 500px;">	
				<pre><code class="idTokenAndAccessToken language-json"></code></pre>
			</div>
		</div>

		<div id="loggedInUserSession" style='position: absolute; right: 10px; bottom: 10px; z-index:9999; background: #1f1f1f; color: #f3bd09; line-height: 11px; padding: 8px 15px 0px 8px; display: none; border-radius: 8px; margin-top:-4px; font-size:9px; min-height:42px;'><img class="topRightLoggedInUserImageContainer" src="" style="width: 42px; float: left; margin-right: 1em; margin-top: -8px; margin-left: -10px; border-top-left-radius: 8px; border-bottom-left-radius: 8px;"> Name: <span class="topRightLoggedInUserNameContainer"></span><br><span class="topRightUserInfo"><img src='idtoken-yellow.png' style="width: 10px; margin-top:3px;"></span> <span class="topRightLogout"><img src="logout.svg" style="width: 10px; margin-top:3px;"></span></div>

		<div id="coverPage" style="background: black; opacity: 0.6; position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;z-index: 9900;  display: none;"></div>

		<div id="showErrorContainer" style="z-index: 10000; position: absolute; left: 50%; width: 500px; margin-left: -250px; top: 200px; display: none;">
			<div id="closeErrorContainer" style="position: absolute; top: 0px; right:0px;z-index: 999999; margin-right: -10px;"><img src="https://kausti.com/icons8/Close%20Window.png" style="width: 20px;"></div>
			<div style="margin-top: 13px;background: #ff2200; border-radius: 8px; padding: 8px; font-size: 10px; margin-bottom: -15px; padding-bottom:2em; z-index: 100; width: 500px;">Error!</div>
			<div id="showError" style="background: #1f1f1f; padding: 8px; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; width: 500px; color: white; min-height: 300px;"></div>
		</div>

		<div style="position: absolute; top: 20px; right: 58px; border-radius: 10px; text-align: right; background: white; padding: 0.5em 1em 0.5em 1em; color: white; display: none; background: #1f1f1f; z-index: 99999 !important; max-width:920px" id="configDiv">
					<div class="showSettings" style=" position: absolute; top: 0px; right: 0px; margin-right: -12px; margin-top: -12px; width: 24px; height: 24px; background: black; border-radius: 6px; z-index: 99999;">
						<div style="background: #eb5424; border-radius: 18px; width: 16px; height: 16px; position: relative; bottom:-4px; right: -4px; text-align: center; line-height:16px; font-weight: bold; color: black; font-size: 8px;z-index: 99998 !important;">X</div>
					</div>


					<div id="selectEnvironment" style="line-height: 1em; padding-bottom: 6px; border-bottom: 1px solid #5f5f5f;">Environment:


					</div>
					<div style="column-count: 2;">
						URL: <input id="tenantUrl" type="text" value="" class="settingsInput"/><br>
						Company Logo: <input id="companyLogoImg" type="text" value="" class="settingsInput"/><br>
						Return URL: <input id="returnUrl" type="text" value="" class="settingsInput"/><br>
						Client ID: <input id="clientId" type="text" value="" class="settingsInput"/><br>
						Client Secret: <input id="clientSecret" type="text" value="" class="settingsInput"/><br>
						Organization: <input id="organization" type="text" value="" class="settingsInput"/><br>
						Connection: <input id="connection" type="text" value="" class="settingsInput"/><br>
						Audience: <input id="audience" type="text" value="" class="settingsInput"/><br>
						Scope: <input id="scope" type="text" value="" class="settingsInput"/><br>
						Code: <input id="code" type="text" value="" class="settingsInput"/><br>
						Access Token: <input id="accessToken" type="text" value="" class="settingsInput"/><br>
						MFA Token: <input id="mfaToken" type="text" value="" class="settingsInput"/><br>
						<span style="display: none" >MFA OTP (Email): <input id="mfaOtp" type="text"value="" class="settingsInput"/><br></span>
						OTP: <input id="otp" type="text" value="" class="settingsInput"/><br>
						Code Verifier: <input id="codeVerifier" type="text" value="" class="settingsInput"/><br>
						Code Challenge: <input id="codeChallenge" type="text" value="" class="settingsInput"/><br>
						Request URI: <input id="requestUri" type="text" value="" class="settingsInput"/><br>
						Device code: <input id="deviceCode" type="text" value="" class="settingsInput"/><br>
						Prompt variables: <input id="promptLogin" type="text" value="" class="settingsInput"/><br>
						Sub (User ID): <input id="userId" type="text" value="" class="settingsInput" /><br>
						Users Session ID: <input id="sessionId" type="text" value="" class="settingsInput" /><br>
						User ID for account linking: <input id="linkUserId" type="text" value="" class="settingsInput" /><br>
						Account linking User ID provider: <input id="provider" type="text" value="" class="settingsInput" /><br>
						Management API Access Token: <input id="managementApiAccessToken" type="text" value="" class="settingsInput" /><br>
						Subject Token: <input id="subjectToken" type="text" value="" class="settingsInput" /><br>
						Subject Token Type: <input id="subjectTokenType" type="text" value="" class="settingsInput" /><br>
						Primary Color: <input id="primaryColor" type="text" value="" class="settingsInput" /><br>
						Secondary Color: <input id="secondaryColor" type="text" value="" class="settingsInput" /><br>
						
					</div>
					<br><br>

				<!--  Country: <select style="background: #a2e96b; border-width: 0px !important;">
											<option>test</option>
										<option>test2</option>
									</select>-->
				</div>
				<div style="clear: both;"></div>
		<div style="position: absolute; right: 30px; top: 10px; margin-right: 10px;z-index:9999; background: black; border-radius: 4px; padding: 2px;" class="showSettings"><img src="icon-settings.svg" style="width:27px; margin-top:2px; filter: invert(100%);"/></div>

		<script type="text/javascript" src="resources/js/highlight.js"></script>
		<!-- OLD 2026-02-28 <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.11.1/build/highlight.min.js"></script>-->
		<script type="text/javascript" src="resources/js/curl.js"></script>
		<script type="text/javascript" src="resources/js/json.js"></script>
		<script type="text/javascript" src="resources/js/flip.js"></script>
		<script type="text/javascript">
		  hljs.configure({languages:[]});
		  hljs.highlightAll();
		</script>
<!--<select id='cssSelector'></select>-->
		</body>

	</html>



<?php
}
else
{
    if(isset($_POST))
    {?>
					<div style="top: 2em !important; position: absolute !important; left: 2em !important;">
            <form method="POST" action="index.php">
            <div style='float: left; vertical-align: middle !important; '>Pass <input type="password" name="pass" style='padding: 0.5em; width: 200px;'></input></div>
            <input type="submit" name="Login" value="Go" style='padding: 0.6em; left: 10px !important; width: 100px;'></input>
            </form>
					</div>
    <?php
		}
}
?>
