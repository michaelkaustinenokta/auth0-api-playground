/*
ulrik@email.com
Swedenpws123
Norwaypwd123

Common accesses

Build the moon inc
https://saas-crm-api.com/api
offline email profile offline_access openid email profile read:internal-system-x update:internal-system-x read:partner-system

Pulse app
https://pulse.com/api1
offline email profile create:pulse-report read:pulse-report 

Build the moon org
org_KAH7hJrZJONOvy8l

Prompt
consent login

Connection
oidc-server

https://kaustinen.cic-demo-platform.auth0app.com/authorize?response_type=code&audience=https://saas-crm-api.com/api&client_id=mEfDBs83wcGgGv5vLNF1fILbWdMpt5T1&redirect_uri=http%3A%2F%2Flocalhost/auth0&scope=offline%20email%20profile%20offline_access%20openid%20email%20profile%20read:internal-system-x%20update:internal-system-x%20read:partner-system&connection=oidc-server&prompt=login

https://saas-crm-api.com/api

read:internal-system-x update:internal-system-x read:partner-system

Scenario 1:
Org: org_KAH7hJrZJONOvy8l
No connection
employee@buildthemoon.com

Scenario 2:
No org
Connection: oidc-server
partner@partner.com



*/

$(function()
{

	var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');

	        if (sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
	        }
	    }
	    return false;
	};

		//Update breadcrumbs when breadcrumbs clicked
		$(document).on('click', '.switchExampleBreadcrumb', function() {

			goTo = $(this).index()+1;

			$("#"+activeSelect).prop("selectedIndex",goTo).change()

			return false;

		})

	function doHighlight() {
		$("[data-highlighted='yes']").each(function(i, obj) {
			$(this).attr('data-highlighted','');
		})
		
		hljs.highlightAll();
		
	}

	
	$(document).on('keyup paste change click', '.extraUserInput', function(){

		$("#"+$(this).attr("id").replace("UserInput","")).val($(this).val())

		updateCurlDataTextArea($("#"+switchExampleId).html().replaceAll("&lt;","<").replaceAll("&gt;",">").replaceAll(/\t/gi,""));
		
		triggerAuthTokenChange();
		/*if(e.which == 13) {
			$("#getExtraInformationDiv").css("margin-left","-10000px")

	    }*/
	});

	function updateCurlDataTextArea(newText) {

		if(newText!=$('#curlDataTextarea').val()){
			
			$('#curlDataTextarea').val(newText)
			$('#curlSyntax').text($('#curlDataTextarea').val());
			doHighlight();

		}

	}

	//Show the correct API based on which Select that is clicked
    $(document).on('change click', 'select:not(".settingsInput"):not("#cssSelector")', function() {

    		$("#getExtraInformationDiv").hide()

    	//Om det börjar strula, ändra document till "*" och change click till att bara vara change
    		activeSelect = $(this).attr("id");

			switchExampleId = $(this).find(':selected').attr('data-example');

			$("#curlDataForm").show()

			if(switchExampleId==undefined) {
				console.log("bug here, this should never happen")
			}

			updateCurlDataTextAreaWithThisText = $("#"+switchExampleId).html().replaceAll("&lt;","<").replaceAll("&gt;",">").replaceAll(/\t/gi,"")
			updateCurlDataTextArea(updateCurlDataTextAreaWithThisText);
			

			instructionsText = $("#"+switchExampleId).attr("data-apicallinformation");
			
			if(instructionsText==undefined) {
				$(".instructionsDiv").html("").hide()
			}
			else {
				$(".instructionsDiv").html(instructionsText).show();
			}

			/*
//Solves the bug but creates other problems....
			try{
				updateCurlDataTextArea($("#"+switchExampleId).html().replaceAll("&lt;","<").replaceAll("&gt;",">").replaceAll(/\t/gi,""));

			}catch(e){

			}*/
			
			triggerAuthTokenChange();
			handleApiResponse();

				appendText = ""
				countItems = 0;
				
				//Find the active option in the active select, loop through it and create the breadcrumbs


				/*$("#"+switchExampleId).each(function(i, obj) {
					if($(this).attr('data-availablenextsteps')) {
						breadCrumbsToCreate = $(this).attr('data-availablenextsteps').split(" ");
						breadCrumbsToCreate.forEach(async (k,v) => {

						countItems++;

						styleSelectedItem = "";

						separator = " →"

						elementText = $(this).attr("data-apiCallName")


						pc=""

						if($("#"+activeSelect).not(":disabled").prop("selectedIndex")==countItems) {
							styleSelectedItem = "switchExampleBreadcrumbSelected";
							pc= "style='background: "+$(".thirdColor").eq(0).css( "background-color")+"'"
						}
						else {
							styleSelectedItem = "switchExampleBreadcrumb"//";
						}

						if($("#"+$(this).attr('data-example')).attr("data-requestType")=="getUrl" && countItems>1) {
							separator ="";
							elementText = "Login options"
							styleSelectedItem = styleSelectedItem + " hideGetUrl"
							$(this).hide()
						}
							appendText += "<a href='javascript:;' class='"+styleSelectedItem+" breadcrumbDataType "+$(this).attr("data-requestType")+"' data-example='"+$(this).attr('data-example')+"' "+pc+">"+elementText.replace("Authorization Code Flow","Login links") + "</a>"+separator;
						})
					}
				});*/

				$("select").find("[data-example='"+switchExampleId+"']").parent().children("option").not(":disabled").each(function(i, obj) {
					countItems++;


					styleSelectedItem = "";

					separator = " → "

					elementText = $(this).text()

					if($(this).parent().attr("id")=="userActionsDiv" || $(this).parent().attr("id")=="callLocalhostAuth0ApiDiv") {
						separator = " | "
					}

					pc=""
					if($("#"+activeSelect).not(":disabled").prop("selectedIndex")==countItems) {
						styleSelectedItem = "switchExampleBreadcrumbSelected";
						pc= "style='background: "+$(".thirdColor").eq(0).css( "background-color")+"'"
					}
					else {
						styleSelectedItem = "switchExampleBreadcrumb"//";
					}

					if($("#"+$(this).attr('data-example')).attr("data-requestType")=="getUrl" && countItems>1) {
						separator ="";
						elementText = "Login options"
						styleSelectedItem = styleSelectedItem + " hideGetUrl"
						$(this).hide()
					}
					
					appendText += "<a href='javascript:;' class='"+styleSelectedItem+" breadcrumbDataType "+$("#"+switchExampleId).attr("data-requestType")+"' data-example='"+$(this).attr('data-example')+"' "+pc+">"+elementText.replace("Authorization Code Flow","Login links") + "</a>"+separator;
					
				})

				appendText = appendText.replace(/\s\→\s$/,"")
				appendText = appendText.replace(/\s\|\s$/,"")

				$("#breadcrumbsDiv").html("&nbsp;↳ "+appendText).show()

				$("#apiCallNameDiv").html("<span style='padding: 4px 7px 4px 0px; color: white !important; border-radius: 5px; font-weight: 300; font-size: 18px;'> "+$(this).prev().text()+"</span> ")

					$("#apiDivHeaderId").text($("#"+activeSelect+" option:selected").text())
					$(".welcomeDiv").text("Action Box")
					//$(".welcomeDiv").text($("#"+activeSelect+" option:selected").attr("data-apiCallNameFamily"))
				//}

					
				/*if(updateCurlDataTextAreaWithThisText.includes("<manualInput_")) {
					typeOfVariable = updateCurlDataTextAreaWithThisText.match(/<manualInput_([^>]+)>/i)[1]
					console.log(typeOfVariable)
					getExtraInformationFromUser('OTP from Google Authenticator: <input id="'+typeOfVariable+'UserInput" class="extraUserInput settingsInput" type="text" value=""/>')
					
				}*/

				if(updateCurlDataTextAreaWithThisText.includes("<otp>")) {

					getExtraInformationFromUser('OTP from Google Authenticator: <input id="otpUserInput" class="extraUserInput settingsInput" type="text" value=""/>')
					
				}

				if(updateCurlDataTextAreaWithThisText.includes("<mfaOtp>")) {

					getExtraInformationFromUser('OTP code from your email inbox: <input id="mfaOtpUserInput" class="extraUserInput settingsInput" type="text" value=""/>')
					
				}

				if(updateCurlDataTextAreaWithThisText.includes("<provider>") && updateCurlDataTextAreaWithThisText.includes("<linkUserId>")) {

					getExtraInformationFromUser('Primary User ID: <input id="userIdUserInput" class="extraUserInput settingsInput" type="text" value=""/><br>Secondary User ID: <input id="linkUserIdUserInput" class="extraUserInput settingsInput" type="text" value=""/><br>User ID provider: <input id="providerUserInput" class="extraUserInput settingsInput" type="text" value=""/>')
					

				}


				



				if($("#"+switchExampleId).attr("data-requesttype")=="getUrl") {

				    $("#"+activeSelect+" option").each(function() {
				    	
				    	if($(this).attr("class")!=undefined)
				    	{
				    		textareaId = $(this).data("example");
				    		$("#addGetUrlButton").html("")
				    		
				    		if($("#"+textareaId).hasClass("apiCall")) {
				    			
				    			classToList = '.'+$("#"+textareaId).attr("class").replace("apiCall ","")


				    			linksToAdd = "";

								$(classToList).each(function(y,u) {
									
									//$("#"+activeSelect+" :selected").data("posttype")

									if($(this).attr("data-requestType")=="getUrl") {
										
										linksToAdd += "<a id='buttonId"+$(this).attr("id")+"' href='"+$(this).text()+"' class='htmlButton' style='background: "+$(".secondaryColor").eq(0).css( "background-color")+"'title='"+$(this).text()+"'> "+$(this).attr("data-buttonName")+"</a><br>\n\n"
										
									}
									
									
								})

				    			$("#addGetUrlButton").append(linksToAdd);

				    			//$(".profileLogin").append(linksToAdd);
				    			//FIXA SEN BUG

				    			triggerAuthTokenChange()

				    		}
				    		
					    	
					    	
				    	}
				    	
					})

					$("#generateUserAuthenticationUrlButtonDiv").show();
					$("#curlSyntax").hide();
					$(".showCurlDataTextarea").hide();
					$("#apiResponse").hide();
					$("#curlDataSubmitButton").hide();
					$(".apiDivHeader").hide();
					$(".welcomeDiv").show();
					$("#curlSyntaxInformationText").hide();
					$("#getUrlInformationText").show();
					
				}
				else {
					$("#generateUserAuthenticationUrlButtonDiv").hide();
					$("#curlSyntax").show()
					$(".showCurlDataTextarea").show();
					$(".welcomeDiv").hide();
					$("#apiResponse").show();
					$("#curlDataSubmitButton").show();
					$(".apiDivHeader").show();
					$("#curlDataTextarea").hide();
					$("#getUrlInformationText").hide();
					$("#curlSyntaxInformationText").show();
				}
				$(".jwtDisplayer").hide();

				return false;

	});

	function getExtraInformationFromUser(elementHtmlToAdd) {
		/*if($('#getExtraInformationDivCentered').html()!='OTP from Google Authenticator: <input id="otpUserInput" class="extraUserInput settingsInput" type="text" value=""/>'){*/
			
			$('#getExtraInformationDivCentered').html(elementHtmlToAdd).parent().show()


		//}
	}

	activeSelect = ""
	
	//Initiated at page load, generates the API call selects html code
    $(".apiCall").each(function(i, obj) {
		activeSelect = $("select").eq(0).attr("id");
        
		//Generates the .examples menu from the data in the #apiCalls div
        classToCreateSelectHtml = $(this).attr('class').replace("apiCall","").trim()+"Div"

        if($("#"+classToCreateSelectHtml).length<1) {

			//Decides the display texts in the selects and options, however this couldve been done much better in retrospect
            displayMethodText = "";

			var familyName = $("."+$(this).attr('class').replace("apiCall ","")).eq(0).attr("data-apiCallNameFamily")

    		if(familyName != null) {
    			displayMethodText = familyName;
    		}

			//Add the h4 title for each select
            $("#headerDivForSelect").append("<h4>"+displayMethodText+"</h4><select style='margin-bottom: 1em;' class='primaryColor' id='"+classToCreateSelectHtml+"'></select>")
						//$("#headerDivForSelect").append("<div style='float: left; text-align: center; margin-right: 1em;'><h4>"+displayMethodText+"</h4><select id='"+classToCreateSelectHtml+"'></select></div>")
						$("#"+classToCreateSelectHtml).append('<option disabled>API</option>')

        }
		
		//Add each option for each API call
        $("#"+classToCreateSelectHtml).append('<option class="switchExample" data-postType="'+$(this).data("requesttype")+'" data-example="'+$(this).attr("id")+'">'+$(this).data("apicallname")+'</option>')

    });
	
	//When submitting the curl form
    $("#curlDataForm").submit(function(e){
        e.preventDefault();
		
		//If the curl call isn't valid, show an error and stop the call before sending it to the backend
        if($("#output").text().indexOf("Not a curl command") > -1){
            $("#apiResponse").text("[Not sent to the API] Reason: Not a valid Curl command")
            console.log("Error, not a valid CURL command")
            console.log($("#curlDataForm").html())
            return false;

        }
				//If everything goes well, show a loading gif while waiting for the backend response
				$('#apiResponse').html("<img src='loading.gif'>");
				
				requestType = "GET";

				activeOption = "#"+$("#"+activeSelect+" option").eq($("#"+activeSelect).prop("selectedIndex")).attr("data-example");

				if ($(activeOption).attr("data-requestType")){
						requestType = $(activeOption).attr("data-requestType");
				}

		//Send the curl command to the backend
        $.ajax({
            url: "http://localhost:3000/api/proxy",
            type: "post",
            data: {curlData: $('#curlDataTextarea').val(), curlProduct: "", requestType: requestType} ,
            success: function (response) {

				if(response=="Not found.") {
					alert('Check data-requesttype="POST" on the <textarea> html code, its likely POST when it should be GET or vice versa.' )
				}
				else if(response=='"[PHP backend test.php] Incorrect API url "Error, bad requesttype') {
					return false;
				}

				//Show the raw API response (in case the format isn't valid and the script crashes. Great error handling!
				$('#apiResponse').text(response);

				var tmpData = JSON.parse(response);
                var formattedData = JSON.stringify(tmpData, null, '\t');
                $('#apiResponse').text(formattedData);
                handleApiResponse();
            },
            error: function(jqXHR, textStatus, errorThrown) {
               //console.log(textStatus, errorThrown);
            }
        }).done(function( data ) {
			    if ( console && console.log ) {
			      //console.log( "Sample of data:", data );
			    }
			  });


    });
	
	//Used for changing the authtoken and more in the API calls to the configured API details
    function triggerAuthTokenChange() {
        // Start with the original template from the selected API example
        // This ensures we always replace placeholders from the template, not from already-replaced text
        let updatedCurlText = "";

        if(typeof switchExampleId !== 'undefined' && switchExampleId) {
            updatedCurlText = $("#"+switchExampleId).html().replaceAll("&lt;","<").replaceAll("&gt;",">").replaceAll(/\t/gi,"");
        } else {
            // Fallback to current textarea value if no template is selected
            updatedCurlText = $("#curlDataTextarea").val();
        }

        // First, store original templates for all buttons (if not already stored)
        $(".htmlButton").each(function() {
            if(!$(this).data("original-href")) {
                $(this).data("original-href", $(this).attr("href"));
            }
            if($(this).attr("title") && !$(this).data("original-title")) {
                $(this).data("original-title", $(this).attr("title"));
            }
        });

        // Loop through all configDiv inputs and accumulate replacements
        $("#configDiv input").each(function(y, o) {
            const varNameToReplace = $(this).attr("id");
            const newValue = $(this).val();

            //console.log(varNameToReplace+" "+newValue)

            // Accumulate the replacement in our working string
            updatedCurlText = updatedCurlText.replace(
                new RegExp("<"+varNameToReplace+">","ig"),
                newValue
            );
        });

        // Now update all buttons with accumulated replacements
        $(".htmlButton").each(function() {
            let updatedHref = $(this).data("original-href") || $(this).attr("href");
            let updatedTitle = $(this).data("original-title") || $(this).attr("title");

            // Apply all input replacements to the button's original template
            $("#configDiv input").each(function() {
                const varNameToReplace = $(this).attr("id");
                const newValue = $(this).val();

                updatedHref = updatedHref.replace(
                    new RegExp("<"+varNameToReplace+">","ig"),
                    newValue
                );

                if(updatedTitle) {
                    updatedTitle = updatedTitle.replace(
                        new RegExp("<"+varNameToReplace+">","ig"),
                        newValue
                    );
                }
            });

            // Update the button with all replacements applied
            $(this).attr("href", updatedHref);
            if(updatedTitle) {
                $(this).attr("title", updatedTitle);
            }
        });

        // Update the textarea ONCE with all replacements applied
        updateCurlDataTextArea(updatedCurlText);


    }
    $(document).on('keyup change', '#curlDataTextarea', function() {
    	$('#curlSyntax').text($('#curlDataTextarea').val());
		doHighlight();
		return false;
    })

    $(".showCurlDataTextarea").click(function(e,i) {
    	e.preventDefault();
    	
    	$("#curlDataTextarea").toggle().css("height",$("#curlSyntax").outerHeight).focus()
    	$("#curlSyntax").toggle()
    	$(".instructionsDiv").hide()
    	
    	return false;
    })

		newCollectionId="";

	//If the API returns an CollectionID, regex replace it in all API calls
    function handleApiResponse() {
       var IS_JSON = true;
       try
       {
       		var json = $.parseJSON($("#apiResponse").text());
       }
       catch(err)
       {
               IS_JSON = false;
       }     

    	if(IS_JSON==true){
			
			console.log("JSON true")
    		
    		if(json.hasOwnProperty('sessions')) {
    			try
		       {
		       		$("#sessionId").val(json.sessions[0].id).change()
		       }
		       catch(err){} 

    		}

    		if ($("#curlSyntax").html().indexOf("/api/v2/sessions") >= 0 && Object.keys(json).length === 0) {
	    		$("#apiResponse").text("Session "+$("#sessionId").val()+" deleted, and user was logged out 👋")
	    		
	    		localStorage.removeItem("loggedInUser")
	    		$("#loggedInUserSession").hide();
	    	}

       		if(json.hasOwnProperty('access_token')) {
       			console.log("Found access token, adding to #accessToken")
				
				decodedIdToken = ""
				decodedAccessToken = ""

				try {
				  decodedIdToken = parseJwt(json.id_token);
				}
				catch(err) {
				  console.log("JWT id_token might be broken")
				  console.log(json.id_token)
				  json.id_token=''
				}

				try {
				  decodedAccessToken = parseJwt(json.access_token);
				}
				catch(err) {
				  console.log("JWT access_token might be opaque, won't be able to decrypt so emptying the array")
				  console.log(json.access_token)
				  json.access_token=''
				}

				//alert(decodedIdToken+decodedAccessToken)

				$("#jwtDisplayerAccessToken code").text(JSON.stringify(decodedAccessToken, null, '\t'))

				$("#jwtDisplayerIdToken code").text(JSON.stringify(decodedIdToken, null, '\t'))

				
				$(".closeJwtDisplayer").hide()
				$(".jwtDisplayer .apiDivHeader").append("<div class='closeJwtDisplayer' style='color: black; float: right; margin-bottom:-2px;'><img src='close.svg'></div>")

				$("#jwtActionsButtons").html("<div style='float: right;' class='showJwtDisplayerButton' id='jwtDisplayerIdTokenButton'><img src='idtoken.png'></div> <div class='showJwtDisplayerButton' style='float: right;' id='jwtDisplayerAccessTokenButton'><img src='key.png'></div>")
				
				$(".copyText").hide()
				$(".apiDivHeader").append("<div class='copyText'><img src='copyText.svg'></div>")
				
       			if(decodedAccessToken.aud==$("#tenantUrl").val()+"/api/v2/") {
					$("#managementApiAccessToken").val(json.access_token).change()
				}
				else {
					$("#accessToken").val(json.access_token).change()
					
					if(decodedIdToken!=''){
						$("#userId").val(decodedAccessToken.sub).change()
						
						localStorage.setItem("loggedInUser",JSON.stringify(decodedIdToken));
						localStorage.setItem("loggedInUserAccessToken",JSON.stringify(decodedAccessToken));
						$(".topRightLoggedInUserNameContainer").html(JSON.parse(localStorage.getItem("loggedInUser")).name);
		    			$(".topRightLoggedInUserImageContainer").attr("src",JSON.parse(localStorage.getItem("loggedInUser")).picture);
		    			$(".idTokenAndAccessToken").text("ID Token\n\n"+JSON.stringify(JSON.parse(localStorage.getItem("loggedInUser")), null, '\t')+"\n\nAccess Token:\n"+JSON.stringify(JSON.parse(localStorage.getItem("loggedInUserAccessToken")), null, '\t'))
		    			$(".profileInfo").text("ID Token\n\n"+JSON.stringify(JSON.parse(localStorage.getItem("loggedInUser")), null, '\t')+"\n\nAccess Token:\n"+JSON.stringify(JSON.parse(localStorage.getItem("loggedInUserAccessToken")), null, '\t'))
		    			$(".profileName").html("<br>"+JSON.parse(localStorage.getItem("loggedInUser")).name)
						$("div.profileImage").css('background-image','url('+JSON.parse(localStorage.getItem("loggedInUser")).picture+')').css('border-width','0px');
						$("div.profileImage").addClass("profileImageLoggedIn")
		    			if(JSON.parse(localStorage.getItem("loggedInUser")).name!=null){
		    				$("#loggedInUserSession").show();
		    			}
	    			}

				}



				
				
				/*
https://kaustinen.cic-demo-platform.auth0app.com/authorize?response_type=code&client_id=d5AuU6aAoQq4G8tPeWlHNMg9mQJ5Vr1y&client_secret=ZGHof2CjyNfw6X6Q0s72J-XY71fNYKJWy7TcPQGztei49rDZunERP7RWWsJ5sjwq&redirect_uri=http%3A%2F%2Flocalhost/auth0&scope=openid%20profile%20email&prompt=login

				*/
			}
			if(json.hasOwnProperty('mfa_token')) {
       			console.log("Found MFA token, adding to #mfaToken")
				$("#mfaToken").val(json.mfa_token).change()
			}
			if(json.hasOwnProperty('request_uri')) {
       			console.log("Found request_uri, adding to #requestUri")
				$("#requestUri").val(json.request_uri).change()
			}
			if(json.hasOwnProperty('request_uri')) {
				getExtraInformationFromUser('<a href="'+$("#tenantUrl").val()+'/authorize?client_id='+$("#clientId").val()+'&request_uri='+$("#requestUri").val()+'" class="htmlButton">Continue PAR flow</a>')

			}
			if(json.hasOwnProperty('device_code') && json.hasOwnProperty('verification_uri_complete')) {
       			console.log("Found DAF call!")
       			$("#deviceCode").val(json.device_code).change()
       			getExtraInformationFromUser('<a target="_blank" href="'+json.verification_uri_complete+'" class="htmlButton" id="continueDafFlowButton">Continue DAF flow</a>')
				
			}

        }

		doHighlight()
    	return false;
    }

/*
		$('#curlDataForm').css("display","block")
		$("#curlDataTextarea").text($("#apiCalls").eq(0).text())
*/

		//Show the settings div
		$(".showSettings").click(function() {
			$("#configDiv").toggle()
		})

		$("#apiResponse").on('change',function(e){
		});

		$("#configDiv input").on('paste keyup',function(e){
			createProfileButtons()
			//configdiv error
			triggerAuthTokenChange()
			//$(selectedEnvironmentId).click()
		});

		/*$("a").on('click',function(e){
			console.log($(this))
			return false;
			if($(this).attr("id")=="#dv") {
			alert($(this).html())
			//return false;
			}

			
		});*/		

		//Settings div, update the API div with the new credentials

		$(document).on('keyup paste change click', '.settingsInput', function() {
				
				if (typeof(Storage) !== "undefined") {
					localStorage.setItem($(this).attr("id"), $(this).val());
					
					//console.log($(this).attr("id")+ " " +$(this).val())

				}				

			 	triggerAuthTokenChange()
		});
		
		$('.settingsInput').each(function( index ) {

				if (typeof(Storage) !== "undefined") {

					$(this).val(localStorage.getItem($(this).attr("id"), $(this).val()));
				}

			 	triggerAuthTokenChange()
		});
		
		//Check if the input is a valid cURL command
	var emptyOutputMsg = "Not a curl command";
	var formattedEmptyOutputMsg = '<span style="color: #777;">'+emptyOutputMsg+'</span>';

	// Hides cURL check placeholder text
	$('#curlDataTextarea').on('focus', function() {
		if (!$(this).val())
			$('#output').html(formattedEmptyOutputMsg);
	});

	// Shows curl check placeholder text
	$('#curlDataTextarea').on('blur', function() {
		if (!$(this).val())
			$('#output').html(formattedEmptyOutputMsg);
	}).blur();

	$('#curlDataTextarea').keyup(function()
	{
		//Friday feeling! Här behöver allt innan curl strippas bort, så ingen kommentar får finnas med för då pajar allt
		var input = $(this).val();
		if (!input)
		{
			$('#output').html(formattedEmptyOutputMsg);
			return;
		}

		try {

			var output = curlToPHP(input);
			if (output) {
				var coloredOutput = hljs.highlight("php", output);
				$('#output').html(coloredOutput.value);
			}
		} catch (e) {
			$('#output').html('<span class="clr-red">'+e+'</span>');
		}
	});

	// Highlights the cURL output for the user
	$('#output').click(function()
	{
		if (document.selection)
		{
			var range = document.body.createTextRange();
			range.moveToElementText(this);
			range.select();
		}
		else if (window.getSelection)
		{
			var range = document.createRange();
			range.selectNode(this);
			window.getSelection().addRange(range);
		}
	});

	var columnsArray = [];

	//id;clientId;clientSecret;clientUrl;displayName;audience;scope;organization (title = clientUrl)
	// Try new dynamic config endpoint, fallback to static environments
	$.get('/api/config').done(function(data) {
		setupEnvironments(data, true); // Pass flag indicating dynamic config
	}).fail(function() {
		// Fallback to original endpoint if new one not available
		$.get('/api/environments', function(data) {
			setupEnvironments(data, false);
		});
	});

	function setupEnvironments(configDataToSetup, isDynamic) {
		
		/*configDataToSetup = `kaustinen-demo;d5AuU6aAoQq4G8tPeWlHNMg9mQJ5Vr1y;ZGHof2CjyNfw6X6Q0s72J-XY71fNYKJWy7TcPQGztei49rDZunERP7RWWsJ5sjwq;https://kaustinen.cic-demo-platform.auth0app.com;Demo;General demo environment;https://localhost/auth0api;offline openid email profile read:appointments;http://localhost/auth0;
		pkce-test;d7wpRNvlezrA0FfSNYcHfAfELN6mKAW6;kBMtLc6j79XyvUrgaxjWuDc1BXebYbOS9lA2AEChIr8fWnWLARWr328qUB2Li46C;https://kaustinen.cic-demo-platform.auth0app.com;PKCE;Proof Key for Code Exchange (PKCE);https://pulse.com/api1;offline openid email profile create:pulse-report read:pulse-report;http://localhost/auth0;
		par-test;j68KgrFlrknel3QpFuH4rZFgxVEgCxzf;VwwG9DG6T99mXKZkiQBV9-4xAYMHaA0ytGXn1R19UYsxF70tFn3wYU-5ED0IbNLQ;https://kaustinen.cic-demo-platform.auth0app.com;PAR;Push Authorization Requests;https://pulse.com/api1;offline openid email profile create:pulse-report read:pulse-report;http://localhost/auth0;
		mfa-test;xx864WxjVm70bVoiR5F0W2FmztOPJjep;YvI_R74ccnUC2tOnNhR6DaUNUVI1Rx2iPY1FoZ-8RzJDtHZFZRn_MQfFFlyedy_t;https://mfa-kaustinen.cic-demo-platform.auth0app.com;MFA;Multifactor Authentication Test;https://mfaapi.com/;read:mfa_restricted;http://localhost/auth0;
		native-test;1niCyOXXUDBfRfmRnUjtHl0OCwlFFL1K;2yECdnWYuTYzeeuUnVoIwJrQgXVdoOo-Bh3pm03JYdqIuECRp_j1ACylujuBTqKr;https://kaustinen.cic-demo-platform.auth0app.com;DAF;Device Authorization Flow;https://pulse.com/api1;offline openid email profile create:pulse-report read:pulse-report;http://localhost/auth0;
		authkaustiom;d5AuU6aAoQq4G8tPeWlHNMg9mQJ5Vr1y;ZGHof2CjyNfw6X6Q0s72J-XY71fNYKJWy7TcPQGztei49rDZunERP7RWWsJ5sjwq;https://auth.kausti.com;auth.kausti.com;auth.kausti.com;https://pulse.com/api1;offline openid email profile create:pulse-report read:pulse-report;http://localhost/auth0;
		org-no;cfOX6MYfw9NGmjneXWkTVPr9Zj0dEEmA;tMD57vsYfNXgJLLZ5KD5ueglljgDUSMf9ZmzFb9KRZdtU0jErpUhTWX4lynjQLNG;https://xlent-test.cic-demo-platform.auth0app.com;Org NO;Org NO;https://norway.com/api;offline openid email profile read:lusekofta;http://localhost/auth0;org_EoEZrac6jhz1rkov
		org-se;rZmoVKa3dZ4MkRqRhNfWwvHZNLHSlmzH;i0N0ODTWpxuC5xuRejfuM6_teJT8I58XXUZYDQr44EPrYeqoq8I4AeFhHWPHOJtB;https://xlent-test.cic-demo-platform.auth0app.com;Org SE;Org SE;https://sweden.com/api;offline openid email profile openid read:surstromming;http://localhost/auth0;org_O2SJaXurkVYFTdO6`
*/
		
		columnsArray.push("id","clientId","clientSecret","tenantUrl","displayName","title","audience","scope","returnUrl","organization","companyLogoImg","companyWallpaperImg", "subjectToken","subjectTokenType","primaryColor","secondaryColor","thirdColor","fourthColor","blankForNow","cssLink")

		/*
		organizations-test;mEfDBs83wcGgGv5vLNF1fILbWdMpt5T1;u1mG4j-7wOEWLhOhOmahQpZFmc7UAfebb27o3H0Yw3maT0OScr8yeMt80R9ZwGK4;https://kaustinen.cic-demo-platform.auth0app.com;Fortress BI;Fortress BI;https://saas-crm-api.com/api;offline openid email profile create:offline email profile offline_access openid email profile read:internal-system-x update:internal-system-x read:partner-system;http://localhost/auth0;org_KAH7hJrZJONOvy8l
		pulse-saas;ceuq0b4MZDrwh6M8LOtSWXLZvYtjzwAm;fLe0HW211lnksWQD62Bq13Z-dRP6GiaUJ6dZIrGczAYubP67aZaRiWJkxPlDlU1A;https://kaustinen.cic-demo-platform.auth0app.com;Pulse SaaS;Pulse SaaS;https://pulse.com/api1;offline openid email profile create:pulse-report read:pulse-report;http://localhost/auth0;
	organizations-and-personal;wuDzkJv36DkY4FKHjy6eSPw5lIQpID9X;CZp895-9Y5fn-7Q4IYWh3HgT9nzP7HmuZz2veetRFyx-IYwYFSU54z_2QGGGaYUa;https://kaustinen.cic-demo-platform.auth0app.com;School;Teachers,parents and principal as roles, multiple organizations
		*/
		const configsToSetup = configDataToSetup.replace("\t","").replace("\n\n","").split("\n");

		configsToSetup.forEach(function (item, index) {
			
			  columns = item.split(";");

			  var dataElementsToAdd = "";

				columnsArray.forEach(async (k,v) => {
				
				if(columns[v]!="" && columns[v]!=undefined) 
				{
				 	columns[v] = columns[v].replace("\t","")
				}

				  dataElementsToAdd+='data-environmentVariable'+columnsArray[v]+'="'+columns[v]+'" '

				});

			  environmentId = columns[0].replace("\t","")
			  environmentClientId = columns[1].replace("\t","")
			  environmentClientSecret = columns[2].replace("\t","")
			  environmentClientUrl = columns[3].replace("\t","")
			  environmentClientButtonName = columns[4].replace("\t","")
			  environmentHoverText = columns[5].replace("\t","")
			  environmentAudience = columns[6].replace("\t","")
			  environmentScope = columns[7].replace("\t","")
			  environmentReturnUrl = columns[8].replace("\t","")

			  // If dynamic config and returnUrl is detection marker, use current origin
			  if (isDynamic && environmentReturnUrl === '__DETECT__') {
			      environmentReturnUrl = window.location.origin;
			  }

			  environmentOrganization = columns[9].replace("\t","")
			  environmentCompanyLogoImg = ""
			  environmentCompanyWallpaperImg = ""
			  environmentPrimaryColor = ""
			  environmentSecondaryColor = ""
			  environmentThirdColor = ""
			  environmentFourthColor = ""
			  environmentBlankForNow = ""
			  environmentCssLink = ""

			  if(columns[10] != "" && columns[10] != undefined) {
			  	environmentCompanyLogoImg = columns[10].replace("\t","")
			  }

			  if(columns[11] != "" && columns[11] != undefined) {
			  	environmentCompanyWallpaperImg = columns[11].replace("\t","")
			  }

			  subjectToken = columns[12].replace("\t","")
			  subjectTokenType = columns[13].replace("\t","")

			  if(columns[14] != "" && columns[14] != undefined) {
			  	 environmentPrimaryColor = columns[14].replace("\t","")
			  }

			  if(columns[15] != "" && columns[15] != undefined) {
			  	environmentSecondaryColor = columns[15].replace("\t","")
			  }

			  if(columns[16] != "" && columns[16] != undefined) {
			  	environmentThirdColor = columns[16].replace("\t","")
			  }

			  if(columns[17] != "" && columns[17] != undefined) {
			  	environmentFourthColor = columns[17].replace("\t","")
			  }

			  if(columns[18] != "" && columns[18] != undefined) {
			  	environmentBlankForNow = ""
			  }

			  if(columns[19] != "" && columns[19] != undefined) {
			  	environmentCssLink = columns[19].replace("\t","")
			  }

			$("#selectEnvironment").append('<a '+dataElementsToAdd+' href="javascript:;" title="'+environmentHoverText+'" id="'+environmentId+'" class="htmlButton environmentSwitcherButton" style="display: inline-block;">'+environmentClientButtonName+'</a>');
			//$("#selectEnvironment").append('<a href="javascript:;" data-environmentVariableScope="'+environmentScope+'" data-environmentVariableScope="'+environmentScope+'" data-environmentVariableAudience="'+environmentAudience+'" title="'+environmentHoverText+'" id="'+environmentId+'" class="htmlButton environmentSwitcherButton" style="display: inline-block;" data-clientId="'+environmentClientId+'" data-clientSecret="'+environmentClientSecret+'" data-clientUrl="'+environmentClientUrl+'" data-returnUrl="'+environmentReturnUrl+'">'+environmentClientButtonName+'</a>');



		});
		selectedEnvironmentId ="";

		if("selectedEnvironment" in localStorage) {
			selectedEnvironmentId = "#"+localStorage.getItem("selectedEnvironment").replace("\t","")

		}
		else {
			selectedEnvironmentId=$(".environmentSwitcherButton").eq(0).attr("id")
		}

		$(selectedEnvironmentId).addClass("selectedEnvironmentCss").click().change()
		$("#"+activeSelect+" option:selected").prop("selected",true).click().change()



	}


        $(document).on('contextmenu', '.hljs-string', function(e) {
        	

        	console.log("Copied text");
            
            var copyText = $(this).text().match(/(?<==)[^']+/);

            if(copyText==null){
            	copyText = $(this).text().match(/(?<=: )[^']+/);
            }
       
            if(copyText==null){
            	copyText = $(this).text().match(/\"(.*)\"/)[1];
            }

            if(copyText!=null){
	        	navigator.clipboard.writeText(copyText);
	        }
        });

        // This function creates the secret key (the verifier)
		function generateCodeVerifier() {
		    // (Assuming you have a function like this from our previous examples)
		    const randomBytes = new Uint8Array(32);
		    window.crypto.getRandomValues(randomBytes);
		    const byteString = String.fromCharCode(...randomBytes);
		    const base64 = btoa(byteString);
		    return base64.replace(/\+/g, '-').replace(/\//g, '_').replace(/=/g, '');
		}

		// Your function, which creates the lock (the challenge) from the key
		async function generateCodeChallengeFromVerifier(verifier) {
		    const encoder = new TextEncoder();
		    const data = encoder.encode(verifier);
		    const digest = await window.crypto.subtle.digest('SHA-256', data);
		    
		    const byteString = String.fromCharCode(...new Uint8Array(digest));
		    const base64 = btoa(byteString);
		    return base64.replace(/\+/g, '-').replace(/\//g, '_').replace(/=/g, '');
		}
		
		async function startLoginProcess() {
		    // 1. Generate the SECRET code verifier first. This is the value you need		    

		    if(localStorage.getItem("codeVerifier")==""){
		    	const codeVerifier = generateCodeVerifier();
		    	console.log("Secret Verifier generated (keep this safe):", codeVerifier);
		    	$("#codeVerifier").val(codeVerifier).change()
		    } else {
		    	$("#codeVerifier").val(localStorage.getItem("codeVerifier")).change()
		    }
		    // 3. Now, generate the PUBLIC code challenge from the verifier.
		    const codeChallenge = await generateCodeChallengeFromVerifier($("#codeVerifier").val());
		    //console.log("Public Challenge generated (send this now):", codeChallenge);
		    $("#codeChallenge").val(codeChallenge).change()

		    // 4. Redirect the user to the login page with the codeChallenge.
		    // window.location.href = `...&code_challenge=${codeChallenge}&...`;
		}

		startLoginProcess();
		createProfileButtons();

		function createProfileButtons() {
			linksToAdd="";
			showSocialIcons = true;

			if(showSocialIcons==true) {

					$("[data-requestType='getUrl']").not("#requestIdTokenImplicitFlow").not("#logoutUserOidc").not("#generateUserAuthorizationPkceUrl").not("#generateUserAuthorizationUrl").each(function(y,u) {
						
						iconImg="";

						switch ($(this).attr("id")) {
							case "generateUserAuthenticationDefault":	
								iconImg = "Login <img class='socialButtonIcon' src='https://kausti.com/icons8/facebook-circled--v1.png'> <img class='socialButtonIcon' src='https://kausti.com/icons8/Google.png'> <img class='socialButtonIcon' style='max-height:22px; margin-bottom: -6px' src='https://cdn-icons-png.flaticon.com/512/9850/9850774.png'>";
								break;
						  	case "generateUserAuthenticationDbUrl":
						    	iconImg = "Database <img class='socialButtonIcon' style='max-height:22px; margin-bottom: -6px' src='https://cdn-icons-png.flaticon.com/512/9850/9850774.png'>";
						    	break;
						    case "generateUserAuthenticationGoogleUrl":
						    	iconImg = "Google <img class='socialButtonIcon' src='https://kausti.com/icons8/Google.png'>";
						    	break;
						    case "logoutUser":
						    	iconImg = "Log out<img class='socialButtonIcon' src='https://kausti.com/icons8/door-opened.png'>";
						    	break;
						}

						linksToAdd += "<a href='"+$(this).text()+"#pf' class='htmlButton primaryColor' id='profileButton"+$(this).attr("id")+"' style='background: "+$("#primaryColor").val()+"'>"+iconImg+"</a><br>\n\n"
					})

				}
				else {
					$("[data-requestType='getUrl']").not("#requestIdTokenImplicitFlow").not("#generateUserAuthenticationDbUrl").not("#generateUserAuthenticationGoogleUrl").not("#logoutUserOidc").not("#generateUserAuthorizationPkceUrl").not("#generateUserAuthorizationUrl").each(function(y,u) {
						linksToAdd += "<a href='"+$(this).text()+"#pf' class='htmlButton' id='profileButton"+$(this).attr("id")+"'> "+$(this).attr("data-buttonName").replace(" (OIDC)","").replace("User ","")+"</a><br>\n\n"
					})
				}

					

			$(".profileLogin").html(linksToAdd);

		}

		function skipFlipAnimation() {
			$("#pf").css({transition:"transform 0s"});

			window.location.href = "#pf"

			$("#pf").css({transition:"transform 0.6s"});
		}

		if(getUrlParameter("error_description")!=false && getUrlParameter("error")!=false) {
			$("#showError").html(getUrlParameter("error_description"))
			$("#showErrorContainer").show()
			$("#coverPage").show()
			//alert(getUrlParameter("error_description"))
		}

		$(document).on('click', '#closeErrorContainer', function() {
			$("#showError").html(getUrlParameter("error_description"))
			$("#showErrorContainer").hide()
			$("#coverPage").hide()
			
		})

		if(window.location.hash == "#pf" || localStorage.getItem("showDos")!=null) {

			skipFlipAnimation()

			setTimeout(function (){
				$("#curlDataSubmitButton").click()
			}, 250);
		}

		$(document).on('click', '#goToProfileView', function() {
			localStorage.setItem("showDos",true)
		})

		$(document).on('click', '#goToDevView', function() {
			localStorage.removeItem("showDos")
		})

		//If clicked on #pf
		//If clicked on #dv

		if(getUrlParameter('state') == "showProfile") {

			createProfileButtons()

			skipFlipAnimation()

			setTimeout(function (){
				$("#curlDataSubmitButton").click()
			}, 250);

			$(".profileIntro").html("You are now logged in! Find your token info below: ")

			/*
			Profileinfo set in function that populates the profile .idTokenAndAccessToken element
			*/ 	
		}
		else {
	    	$("select option:not(disabled)").parent().eq(0).prop("selectedIndex",1).change()
	    }

		if(getUrlParameter('logout') != false) {
			localStorage.removeItem("loggedInUser")
			
			$("main").prepend("<div id='loggedOutBanner' style='color: #f3bd09; width: 100%; padding: 1em; text-align: center; background: black; padding-right:300px; padding-left: 100px;'>⚠️ You've been logged out! ⚠️</div><br><br><br><br>")
			$("#loggedOutBanner").delay(3000).fadeOut('slow');

			
		}
		else if(getUrlParameter("code")!=false) {

			getCode = getUrlParameter('code');
			$("#code").val(getCode);

			$("#apiResponse").text("Code returned in URL: \n"+ getCode)
			activeSelect="generateUserAuthenticationUrlDiv";
		    activeSelectText="Request Access Token"
		    $("#"+activeSelect).val(activeSelectText).change()
			
			if(getUrlParameter('state') == "pkce") {
				
				$("#generateUserAuthorizationUrlDiv").find("[data-example='requestAccessTokenPkce']").prop('selected', true).change()
			}
			else if(getUrlParameter('state') == "par") {
				$("[data-example='requestAccessToken']").prop('selected', true).change()
			}
			else {
				
		    	
	    	}

	    }
	    
	    triggerAuthTokenChange()
	    
	    if(localStorage.getItem("loggedInUser")!=null){
		    
		    $(".topRightLoggedInUserNameContainer").html(JSON.parse(localStorage.getItem("loggedInUser")).name);
		    $(".topRightLoggedInUserImageContainer").attr("src",JSON.parse(localStorage.getItem("loggedInUser")).picture);
		   	$(".idTokenAndAccessToken").text("ID Token\n\n"+JSON.stringify(JSON.parse(localStorage.getItem("loggedInUser")), null, '\t')+"\n\nAccess Token:\n"+JSON.stringify(JSON.parse(localStorage.getItem("loggedInUserAccessToken")), null, '\t'))
		   	$(".profileInfo").text("ID Token\n\n"+JSON.stringify(JSON.parse(localStorage.getItem("loggedInUser")), null, '\t')+"\n\nAccess Token:\n"+JSON.stringify(JSON.parse(localStorage.getItem("loggedInUserAccessToken")), null, '\t'))
		   	$(".profileIntro").text("Welcome! See your token info below:")
		   	$(".profileName").html("<br>"+JSON.parse(localStorage.getItem("loggedInUser")).name)
			$("div.profileImage").css('background-image','url('+JSON.parse(localStorage.getItem("loggedInUser")).picture+')').css('border-width','0px');
			$("div.profileImage").addClass("profileImageLoggedIn")

		   	doHighlight();

		    if(JSON.parse(localStorage.getItem("loggedInUser")).name!=null){
	    		$("#loggedInUserSession").show();
	    	}
	   	}
	   	else {
	   		$("#loggedInUserSession").hide();
	   	}

		function parseJwt (token) {
		    var base64Url = token.split('.')[1];
		    var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
		    var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
		        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
		    }).join(''));

		    return JSON.parse(jsonPayload);
		}

		if(document.cookie.indexOf('id_token=')>-1 && getUrlParameter("implicit")!=false) {

			alert("ID Token returned from Auth0: "+getCookie("id_token"));	
			$("#accessToken").val(getCookie("id_token"));
			/*$("#apiResponse").text(getCookie("id_token"))
			doHighlight()
			$("#apiResponse").show()*/
		}

		function getCookie(name) {
		  const value = `; ${document.cookie}`;
		  const parts = value.split(`; ${name}=`);
		  if (parts.length === 2) return parts.pop().split(';').shift();
		}

		

		function fixCase(nameToFix) {

			if(nameToFix=="href" || nameToFix=="id" || nameToFix=="class" || nameToFix=="title" || nameToFix=="style" ) {
				return nameToFix;
			}
			else {
				toReturn = ""

				columnsArray.forEach(async (k,v) => {
					  if(nameToFix==k.toLowerCase()) {
					  	toReturn = k;
					  }
				});
				
				
				
				if(toReturn=="") {
					console.log("error: Fix the env variable " + nameToFix)
				}
				else {

					return toReturn;
				}
			}
		}

		$(document).on('click', '.environmentSwitcherButton', function() {

			$.each(this.attributes, function(i, attrib){

			     var name = fixCase(attrib.name.replace("data-environmentvariable",""));
			     //console.log(primaryColor)

			     var value = attrib.value;

			     // Auto-detect returnUrl if marker is present
			     if (name === 'returnUrl' && value === '__DETECT__') {
			         value = window.location.origin;
			     }

			     $("#"+name).val(value).change()

			    if(name == "companyLogoImg" && $("#companyLogoImg") != "") {
					$(".companyLogoImg").attr("src",value)
				}
				
				if(name == "companyWallpaperImg" && $("#companyWallpaperImg") != "") {

					$("#dos").css('backgroundImage',"url("+value+")");
				}

				if(name == "primaryColor" && value != "") {
					$("#dos .htmlButton").addClass("primaryColor")
			  	  	$("#uno select").addClass("primaryColor")
			  	  	$(".primaryColor").css({"background": value})
			  	  	$(".primaryFontColor").css({"color": value})
			  	  	
				}

				if(name == "secondaryColor" && value != "") {

			  	  	$(".secondaryColor").css({"background": value})
			  	  	$(".secondaryFontColor").css({"color": value})
			  	  	
					
				}

				if(name == "thirdColor" && value != "") {
					$("#uno .thirdFontColor").css({"color": value})
					$("#uno .thirdColor").css({"background": value})
				}

				if(name == "fourthColor" && value != "") {
					
					$(".fourthFontColor").css({"color": value})
					$(".fourthColor").css({"background": value})
				}

				if(name == "cssLink" && value != "") {
					
					$("#highlightJsStyle").attr("href","resources/css/highlight.js-styles/"+value)
				}

				

			});

			

			$("#profileEnvironmentName").html($(this).text())

			$(".profileDetailsHeader").html($(this).text()+" profile")

			

			if (typeof(Storage) !== "undefined") {
				localStorage.setItem("selectedEnvironment", $(this).attr("id"));
			}
			
			$(".environmentSwitcherButton").removeClass("selectedEnvironmentCss")

			$(this).addClass("selectedEnvironmentCss")

			$("#"+activeSelect+" option:selected").prop("selected",true).change()

			//console.log()
			createProfileButtons();

			triggerAuthTokenChange();
		})

		if (typeof(Storage) !== "undefined" && localStorage.getItem("selectedEnvironment")!="") {
			$(".environmentSwitcherButton").removeClass("selectedEnvironmentCss").removeClass("primaryColor")

			environmentIdSelected = "#"+localStorage.getItem("selectedEnvironment").replace("\t","")
			
			$(environmentIdSelected).addClass("selectedEnvironmentCss")
		}

		$(document).on('click', '.showJwtDisplayerButton', function() {
			$("#"+$(this).attr("id").replace("Button","")).toggle();
		})

		$(document).on('click', '.closeJwtDisplayer', function() {
			$(this).parents(".jwtDisplayer").hide()
		})

		$(document).on('click', '.topRightLogout', function() {
			localStorage.removeItem("loggedInUser")
			localStorage.removeItem('jwt')
			window.location.href="/"
		})

		$(document).on('click', '.topRightUserInfo', function() {
			$("#loggedInUserIdTokenAndAccessToken").toggle()
		})


		$(document).on('click', '.copyText', function() {

			console.log("Adding Curl to clipboard:")
			console.log($(this).parent().siblings("pre").children(".hljs").text())
			
			navigator.clipboard.writeText($(this).parent().siblings("pre").children(".hljs").text());
  
		});

		$.ajax({
            url: "/api/css-files?scan=true",
            type: "get",
            success: function (response) {
            	var tmpDataArr = response;

            	$.each(tmpDataArr, function(i, item) {
				    $("#cssSelector").append($('<option>', {
					    value: tmpDataArr[i],
					    text: tmpDataArr[i].substring(tmpDataArr[i].lastIndexOf("/") + 1).replace(".css","")
					}));

				});
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.error('Error loading CSS themes:', textStatus, errorThrown);
            }
        });

        $("#cssSelector").on('change', function() {
        	console.log(this.value)
			$("#highlightJsStyle").attr("href",this.value)
		});


		$(".selectedEnvironmentCss").click()

		/*$("#highlightJsStyle").attr("href","resources/css/highlight.js-styles/base16/ros-pine.css")
		$("#highlightJsStyle").attr("href","resources/css/highlight.js-styles/base16/brogrammer.css")*/
		
		//Flytta till ny div
		//$('#curlDataSubmitButton').detach().appendTo("#apiDivHeaderApiResponse")
		
		//$('#curlDataSubmitButton').css({top:$("#apiResponse").offset().top, left: $("#apiResponse").offset().left, position:"absolute"});


});

/*
Test credentials:

200001020000
311776c4-449d-4e7b-bc57-8c4c046df9e3
cb479ceb-7667-4309-afb0-539860ac5830
879e1adf-fe3b-4a10-bdfc-dd011fc0cce3
f5bad9a1-f47d-49e9-bfbf-4794b9bfc273
fb06eddd-5589-4823-b433-dc6ffd4e66e6

*/