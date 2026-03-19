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

    $(".sendYamlForm").submit(function(e){
    	
    	$(".new-env-item-selected").each(function() {
          sendYaml($(this))
        });

		return false;
    })

    function sendYaml(yamlElement) {

    	yamlElement.append("<div class='loading-yaml-insertion' style='background: white; width: 100%; height: 100%; top: 0px; left: 0px; border-radius: 8px; position: absolute;'><br><br><br><br><br><br>Loading...</div>")
    	
    	yamlPath=yamlElement.attr("data-yaml")

    	$.ajax({
            url: "http://localhost:3000/auth0cli",
            type: "get",
            data: {yamlPath: yamlPath+".yaml",clientId: $("#clientId").val(),clientSecret: $('#modal_clientSecret').val(),tenantUrl:$('#tenantUrl').val()} ,
            success: function (response) {
            	yamlElement.find('.loading-yaml-insertion').hide();
            	yamlElement.find('.new-env-checkbox').hide()

				//Show the raw API response (in case the format isn't valid and the script crashes. Great error handling!
				console.log(response)
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        }).done(function( data ) {
			    
			  });
    }
	
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

                // Only replace if updatedHref is defined
                if(updatedHref && typeof updatedHref === 'string') {
                    updatedHref = updatedHref.replace(
                        new RegExp("<"+varNameToReplace+">","ig"),
                        newValue
                    );
                }

                if(updatedTitle && typeof updatedTitle === 'string') {
                    updatedTitle = updatedTitle.replace(
                        new RegExp("<"+varNameToReplace+">","ig"),
                        newValue
                    );
                }
            });

            // Update the button with all replacements applied
            if(updatedHref) {
                $(this).attr("href", updatedHref);
            }
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
			if(json.hasOwnProperty('user_id')) {
       			console.log("Found User ID, adding to #userId")
				$("#userId").val(json.user_id).change()
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

		// Extract role ID from /api/v2/roles endpoint responses
		if ($("#curlSyntax").html().indexOf("/api/v2/roles") >= 0) {
			// Check if response is an array (GET /api/v2/roles returns array)
			if (Array.isArray(json) && json.length > 0 && json[0].hasOwnProperty('id')) {
				console.log("Found Role ID from /api/v2/roles endpoint (array), adding to #roleId")
				$("#roleId").val(json[0].id).change()
			}
			// Check if response is a single object (POST /api/v2/roles returns single object)
			else if (json.hasOwnProperty('id') && json.id.startsWith('rol_')) {
				console.log("Found Role ID from /api/v2/roles endpoint (object), adding to #roleId")
				$("#roleId").val(json.id).change()
			}
		}

		// Extract organization ID from /api/v2/organizations endpoint responses
		if ($("#curlSyntax").html().indexOf("/api/v2/organizations") >= 0 && json.hasOwnProperty('id')) {
			console.log("Found Organization ID from /api/v2/organizations endpoint, adding to #organizationId")
			$("#organizationId").val(json.id).change()
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
	// Populate column names for fixCase function to work
	columnsArray.push("id","clientId","clientSecret","tenantUrl","displayName","title","audience","scope","returnUrl","organization","companyLogoImg","companyWallpaperImg", "subjectToken","subjectTokenType","primaryColor","secondaryColor","thirdColor","fourthColor","blankForNow","cssLink");

	//id;clientId;clientSecret;clientUrl;displayName;audience;scope;organization (title = clientUrl)
	// Standard environments removed - now only using custom environments from localStorage
	// Users can upload CSV files or manually add environments

	// DISABLED: setupEnvironments function removed - now using only custom environments



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

		$(document).on('click', '#newEnvButton', function() {
			$("#tres").toggle();
		})

		$(document).on('click', '.new-env-item', function() {
			$(this).toggleClass("secondaryColor")
			$(this).toggleClass("new-env-item-selected")
			$(this).children(".new-env-checkbox").eq(0).toggle().html("&#x2713;")
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
					
					// Handle both full path and relative path formats
				var cssPath = value.startsWith("resources/") ? value : "resources/css/highlight.js-styles/"+value;
				// Add cache busting to ensure theme loads
				$("#highlightJsStyle").attr("href", cssPath + '?v=' + Date.now());
				console.log('Applied CSS theme:', cssPath);
				// Re-highlight all code blocks with new theme
				setTimeout(function() {
					doHighlight();
				}, 100);
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

		// Function to apply saved environment
		function applySavedEnvironment() {
			const selectedEnv = localStorage.getItem("selectedEnvironment");
			if (typeof(Storage) !== "undefined" && selectedEnv && selectedEnv !== "") {
				$(".environmentSwitcherButton").removeClass("selectedEnvironmentCss").removeClass("primaryColor")

				environmentIdSelected = "#"+selectedEnv.replace("\t","")

				$(environmentIdSelected).addClass("selectedEnvironmentCss")

				// Trigger click to apply the environment settings
				$(environmentIdSelected).trigger('click')
				console.log('Applied saved environment:', selectedEnv);
			}
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

	// Global variable to store CSS themes
	window.availableCssThemes = [];

		$.ajax({
            url: "/api/css-files?scan=true",
            type: "get",
            success: function (response) {
            	var tmpDataArr = response;
            	var currentCss = $("#highlightJsStyle").attr("href").split('?')[0]; // Get current CSS without query params

            	// Store in global variable
            	window.availableCssThemes = tmpDataArr;

            	$.each(tmpDataArr, function(i, item) {
            		var isSelected = (tmpDataArr[i] === currentCss);
				    $("#cssSelector").append($('<option>', {
					    value: tmpDataArr[i],
					    text: tmpDataArr[i].substring(tmpDataArr[i].lastIndexOf("/") + 1).replace(".css",""),
					    selected: isSelected
					}));

				});
				console.log('Loaded', tmpDataArr.length, 'CSS themes. Current:', currentCss);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.error('Error loading CSS themes:', textStatus, errorThrown);
            }
        });

        $("#cssSelector").on('change', function() {
        	console.log('CSS Selector changed to:', this.value);
        	var newHref = this.value + '?v=' + Date.now(); // Cache busting
			$("#highlightJsStyle").attr("href", newHref);
			console.log('Updated highlightJsStyle href to:', newHref);
		});



		/*$("#highlightJsStyle").attr("href","resources/css/highlight.js-styles/base16/ros-pine.css")
		$("#highlightJsStyle").attr("href","resources/css/highlight.js-styles/base16/brogrammer.css")*/

		//Flytta till ny div
		//$('#curlDataSubmitButton').detach().appendTo("#apiDivHeaderApiResponse")

		//$('#curlDataSubmitButton').css({top:$("#apiResponse").offset().top, left: $("#apiResponse").offset().left, position:"absolute"});

		// ============================================================================
		// Custom Environment Management
		// ============================================================================

		const CUSTOM_ENVS_KEY = 'customEnvironments';
		// standardEnvironments removed - now only using custom environments

		/**
		 * Load custom environments from localStorage
		 */
		function loadCustomEnvironments() {
			try {
				const stored = localStorage.getItem(CUSTOM_ENVS_KEY);
				return stored ? JSON.parse(stored) : [];
			} catch (e) {
				console.error('Error loading custom environments:', e);
				return [];
			}
		}

		/**
		 * Save custom environments to localStorage
		 */
		function saveCustomEnvironments(environments) {
			try {
				localStorage.setItem(CUSTOM_ENVS_KEY, JSON.stringify(environments));
				return true;
			} catch (e) {
				console.error('Error saving custom environments:', e);
				alert('Failed to save environments. Storage may be full.');
				return false;
			}
		}

		/**
		 * Convert environment object to CSV line format
		 */
		function environmentToCSV(env) {
			const columns = [
				env.id || '',
				env.clientId || '',
				env.clientSecret || '',
				env.tenantUrl || '',
				env.displayName || '',
				env.title || '',
				env.audience || '',
				env.scope || 'offline openid email profile',
				env.returnUrl || '',
				env.organization || '',
				env.companyLogoImg || '',
				env.companyWallpaperImg || '',
				env.subjectToken || '',
				env.subjectTokenType || '',
				env.primaryColor || '',
				env.secondaryColor || '',
				env.thirdColor || '',
				env.fourthColor || '',
				env.blankForNow || '',
				env.cssLink || ''
			];
			return columns.join(';');
		}

		/**
		 * Parse CSV line to environment object
		 */
		function csvToEnvironment(csvLine) {
			const columns = csvLine.split(';').map(col => col.trim());
			return {
				id: columns[0],
				clientId: columns[1],
				clientSecret: columns[2],
				tenantUrl: columns[3],
				displayName: columns[4],
				title: columns[5],
				audience: columns[6],
				scope: columns[7],
				returnUrl: columns[8],
				organization: columns[9],
				companyLogoImg: columns[10],
				companyWallpaperImg: columns[11],
				subjectToken: columns[12],
				subjectTokenType: columns[13],
				primaryColor: columns[14],
				secondaryColor: columns[15],
				thirdColor: columns[16],
				fourthColor: columns[17],
				blankForNow: columns[18],
				cssLink: columns[19],
				isCustom: true
			};
		}

		/**
		 * Validate environment data
		 */
		function validateEnvironment(env) {
			const required = ['id', 'displayName', 'clientId', 'clientSecret', 'tenantUrl'];
			const missing = required.filter(field => !env[field] || env[field].trim() === '');

			if (missing.length > 0) {
				alert('Missing required fields: ' + missing.join(', '));
				return false;
			}

			// Check if ID already exists
			const existing = loadCustomEnvironments();
			if (existing.some(e => e.id === env.id) && !env.isEditing) {
				alert('Environment ID already exists. Please use a unique ID.');
				return false;
			}

			return true;
		}

		/**
		 * Render custom environments list
		 */
		function renderCustomEnvironmentsList() {
			const customEnvs = loadCustomEnvironments();
			const allEnvs = customEnvs; // Only custom environments now
			const container = $('#customEnvironmentsList');

			// Clear only environment items, keep the action buttons
			container.find('> div:not(#envActionButtons)').remove();

			if (allEnvs.length === 0) {
				container.append('<div style="color: #888; font-size: 12px; padding: 5px; margin-top: 10px;">No environments configured. Use ➕ to add an environment or 📤 to upload a CSV file.</div>');
				return;
			}

		allEnvs.forEach(env => {
			const isStandard = env.isStandard === true;
			const isCustom = !isStandard;

			const item = $('<div>', {
				style: 'display: inline-block; vertical-align: middle; padding: 3px 0; margin: 3px 0;'
			});

			// Create environment button wrapper with pen icon
			// Create environment button wrapper with pen icon
			const envButton = $('<a>', {
				href: 'javascript:;',
				id: env.id,
				class: 'htmlButton environmentSwitcherButton' + (isCustom ? ' customEnvironment' : ''),
				style: 'display: inline-block; font-size: 11px; line-height:11px; margin-right: 10px; position: relative;' + (isCustom ? ' background: #5bc0de;' : ''),
				text: env.displayName
			});


			// Add pen icon overlay
			// Add pen icon overlay
			const penIcon = $('<span>', {
				class: 'env-edit-icon',
				html: '✎',
				style: 'position: absolute; top: -5px; right: -5px; font-size: 10px; cursor: pointer; background: #f3bd09; color: black; padding: 2px 4px; border-radius: 3px; line-height: 1;',
				title: 'Edit environment',
				click: function(e) {
					e.stopPropagation();
					e.preventDefault();
					openEnvironmentModal(env);
				}
			});


			envButton.append(penIcon);

			// Set all data attributes for the environment
			Object.keys(env).forEach(key => {
				if (key !== 'isStandard' && key !== 'isCustom' && key !== 'isEditing') {
					envButton.attr('data-environmentvariable' + key.toLowerCase(), env[key] || '');
				}
			});
		item.append(envButton);
		container.append(item);
		});
		}

		/**
		 * Add custom environment buttons to selectEnvironment
		 */
		function addCustomEnvironmentButtons() {
			const customEnvs = loadCustomEnvironments();

			customEnvs.forEach(env => {
				const dataAttrs = Object.keys(env)
					.filter(key => key !== 'isCustom' && key !== 'isEditing')
					.map(key => `data-environmentVariable${key}="${env[key] || ''}"`)
					.join(' ');

				const button = `<a ${dataAttrs}
					href="javascript:;"
					title="${env.title || env.displayName}"
					id="${env.id}"
					class="htmlButton environmentSwitcherButton customEnvironment"
					style="display: inline-block; background: #5bc0de;">
					${env.displayName}
				</a>`;

				$('#selectEnvironment').append(button);
			});
		}

		/**
		 * Open environment editor modal
		 */
		function openEnvironmentModal(env = null) {
			const isEdit = !!env;

			$('#modalTitle').text(isEdit ? 'Edit Environment' : 'Add New Environment');

			// Populate CSS theme dropdown - always refresh to ensure latest themes are available
			$('#modal_cssLink').empty().append($('<option>', {
				value: '',
				text: '-- Select a theme --'
			}));

		// Function to populate dropdown from available themes
		var populateThemeDropdown = function() {
			var themesLoaded = false;

			// Try using the global array first (preferred method)
			if (window.availableCssThemes && window.availableCssThemes.length > 0) {
				window.availableCssThemes.forEach(function(cssPath) {
					var themeName = cssPath.substring(cssPath.lastIndexOf("/") + 1).replace(".css","");
					$('#modal_cssLink').append($('<option>', {
						value: cssPath,
						text: themeName
					}));
				});
				themesLoaded = true;
				console.log('Populated', window.availableCssThemes.length, 'CSS themes from global array');
			}
			// Fallback to DOM element if global array is empty
			else if ($('#cssSelector option').length > 0) {
				$('#cssSelector option').each(function() {
					$('#modal_cssLink').append($('<option>', {
						value: $(this).val(),
						text: $(this).text()
					}));
				});
				themesLoaded = true;
				console.log('Populated CSS themes from #cssSelector element');
			}

			// If still not loaded, retry after delay
			if (!themesLoaded) {
				console.log('CSS themes not loaded yet, retrying in 500ms...');
				setTimeout(populateThemeDropdown, 500);
			}
		};

		populateThemeDropdown();

			// Populate fields
			if (isEdit) {
				$('#modal_id').val(env.id).prop('disabled', true); // Can't change ID when editing
				$('#modal_displayName').val(env.displayName);
				$('#modal_clientId').val(env.clientId);
				$('#modal_clientSecret').val(env.clientSecret);
				$('#modal_tenantUrl').val(env.tenantUrl);
				$('#modal_title').val(env.title);
				$('#modal_audience').val(env.audience);
				$('#modal_scope').val(env.scope);
				$('#modal_returnUrl').val(env.returnUrl);
				$('#modal_organization').val(env.organization);
				$('#modal_companyLogoImg').val(env.companyLogoImg);
				$('#modal_companyWallpaperImg').val(env.companyWallpaperImg);
				$('#modal_subjectToken').val(env.subjectToken);
				$('#modal_subjectTokenType').val(env.subjectTokenType);
				$('#modal_primaryColor').val(env.primaryColor);
				$('#modal_secondaryColor').val(env.secondaryColor);
				$('#modal_thirdColor').val(env.thirdColor);
				$('#modal_fourthColor').val(env.fourthColor);
				$('#modal_cssLink').val(env.cssLink);

				// Show delete button only for custom environments
				if (!env.isStandard) {
					$('#deleteEnvironmentBtn').show();
				} else {
					$('#deleteEnvironmentBtn').hide();
				}
			} else {
				// Clear all fields
				$('#environmentEditorModal input[type="text"]').val('');
				$('#environmentEditorModal input[type="color"]').val('#000000');
				$('#modal_id').prop('disabled', false);
				$('#modal_scope').val('offline openid email profile');
				$('#advancedFields').hide();
				$('#deleteEnvironmentBtn').hide();
			}

			$('#environmentEditorModal').data('editingId', isEdit ? env.id : null);
			$('#environmentEditorModal').data('isCustom', isEdit && !env.isStandard);
			$('#environmentEditorModal').show();
		}

		/**
		 * Close environment editor modal
		 */
		window.closeEnvironmentModal = function() {
			$('#environmentEditorModal').hide();
		}

		/**
		 * Save environment from modal
		 */
		function saveEnvironmentFromModal() {
			const editingId = $('#environmentEditorModal').data('editingId');

			const env = {
				id: $('#modal_id').val().trim(),
				displayName: $('#modal_displayName').val().trim(),
				clientId: $('#modal_clientId').val().trim(),
				clientSecret: $('#modal_clientSecret').val().trim(),
				tenantUrl: $('#modal_tenantUrl').val().trim(),
				title: $('#modal_title').val().trim(),
				audience: $('#modal_audience').val().trim(),
				scope: $('#modal_scope').val().trim(),
				returnUrl: $('#modal_returnUrl').val().trim(),
				organization: $('#modal_organization').val().trim(),
				companyLogoImg: $('#modal_companyLogoImg').val().trim(),
				companyWallpaperImg: $('#modal_companyWallpaperImg').val().trim(),
				subjectToken: $('#modal_subjectToken').val().trim(),
				subjectTokenType: $('#modal_subjectTokenType').val().trim(),
				primaryColor: $('#modal_primaryColor').val(),
				secondaryColor: $('#modal_secondaryColor').val(),
				thirdColor: $('#modal_thirdColor').val(),
				fourthColor: $('#modal_fourthColor').val(),
				blankForNow: '',
				cssLink: $('#modal_cssLink').val(),
				isCustom: true,
				isEditing: !!editingId
			};

			if (!validateEnvironment(env)) {
				return;
			}

			let customEnvs = loadCustomEnvironments();

			if (editingId) {
				// Update existing
				const index = customEnvs.findIndex(e => e.id === editingId);
				if (index !== -1) {
					customEnvs[index] = env;
				}
			} else {
				// Add new
				customEnvs.push(env);
			}

			if (saveCustomEnvironments(customEnvs)) {
				closeEnvironmentModal();
				refreshEnvironments();
			}
		}

		/**
		 * Delete custom environment
		 */
		function deleteCustomEnvironment(envId) {
			if (!confirm('Are you sure you want to delete this environment?')) {
				return;
			}

			let customEnvs = loadCustomEnvironments();
			customEnvs = customEnvs.filter(e => e.id !== envId);

			if (saveCustomEnvironments(customEnvs)) {
				// If deleted env was selected, clear selection
				if (localStorage.getItem('selectedEnvironment') === envId) {
					localStorage.removeItem('selectedEnvironment');
				}
				closeEnvironmentModal();
				refreshEnvironments();
			}
		}

		/**
		 * Export custom environments as CSV
		 */
		function exportEnvironmentsAsCSV() {
			const customEnvs = loadCustomEnvironments();
			const allEnvs = customEnvs; // Only custom environments now

			if (allEnvs.length === 0) {
				alert('No environments to export.');
				return;
			}

			// Convert each environment to CSV line
			const csvLines = allEnvs.map(env => environmentToCSV(env));
			const csvContent = csvLines.join('\n');

			// Create a blob and download
			const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
			const link = document.createElement('a');
			const url = URL.createObjectURL(blob);

			link.setAttribute('href', url);
			link.setAttribute('download', 'all-environments.csv');
			link.style.visibility = 'hidden';

			document.body.appendChild(link);
			link.click();
			document.body.removeChild(link);
		}

		/**
		 * Handle CSV file upload
		 */
		function handleCSVUpload(event) {
			const file = event.target.files[0];
			if (!file) return;

			$('#uploadStatus').text('Processing...').css('color', '#f3bd09');

			const reader = new FileReader();
			reader.onload = function(e) {
				try {
					const content = e.target.result;
					const lines = content.split('\n').filter(line => line.trim() !== '');

					const newEnvs = [];
					const errors = [];

				const existingEnvs = loadCustomEnvironments();
				const existingIds = existingEnvs.map(e => e.id);

				lines.forEach((line, index) => {
					try {
						const env = csvToEnvironment(line);

						// Basic validation without duplicate check
						const required = ['id', 'displayName', 'clientId', 'clientSecret', 'tenantUrl'];
						const missing = required.filter(field => !env[field] || env[field].trim() === '');

						if (missing.length > 0) {
							errors.push(`Line ${index + 1}: Missing required fields: ${missing.join(', ')}`);
						} else if (existingIds.includes(env.id)) {
							errors.push(`Line ${index + 1}: Environment ID "${env.id}" already exists (skipped)`);
						} else {
							newEnvs.push(env);
						}
					} catch (err) {
						errors.push(`Line ${index + 1}: ${err.message}`);
					}
				});

					if (newEnvs.length > 0) {
						const customEnvs = loadCustomEnvironments();
						const merged = [...customEnvs, ...newEnvs];

						if (saveCustomEnvironments(merged)) {
							$('#uploadStatus').text(`✓ Added ${newEnvs.length} environment(s)`).css('color', '#5cb85c');
							setTimeout(() => $('#uploadStatus').text(''), 3000);
							refreshEnvironments();
						}
					}

					if (errors.length > 0) {
						alert('Some errors occurred:\n' + errors.join('\n'));
					}

				} catch (err) {
					$('#uploadStatus').text('✗ Upload failed').css('color', '#d9534f');
					console.error('CSV upload error:', err);
				}
			};

			reader.readAsText(file);
			event.target.value = ''; // Clear input
		}

		/**
		 * Refresh all environment displays
		 */
		function refreshEnvironments() {
			// Store currently selected environment ID
			const currentlySelected = $('.environmentSwitcherButton.selectedEnvironmentCss').attr('id');

			// Remove old custom environment buttons
			$('.customEnvironment').remove();

			// Re-add custom environment buttons
			// addCustomEnvironmentButtons(); // No longer needed - renderCustomEnvironmentsList handles this

			// Refresh custom environments list in config
			renderCustomEnvironmentsList();

			// Re-trigger click on the currently selected environment to update configDiv
			if (currentlySelected) {
				setTimeout(function() {
					$('#' + currentlySelected).click();
				}, 100);
			} else {
				// If no environment was selected, try to apply saved environment from localStorage
				setTimeout(function() {
					applySavedEnvironment();
				}, 100);
			}
		}

		// ============================================================================
		// Event Handlers
		// ============================================================================

		// Initialize custom environments on page load
		renderCustomEnvironmentsList();
		// addCustomEnvironmentButtons(); // No longer needed - renderCustomEnvironmentsList handles this

	// Apply saved environment after buttons are rendered
	setTimeout(function() {
		applySavedEnvironment();
	}, 100);


		// Upload CSV button
		$('#uploadCsvBtn').on('click', function() {
			$('#envCsvUpload').click();
		});

		// CSV upload handler
		$('#envCsvUpload').on('change', handleCSVUpload);

		// Export button
		$('#exportEnvironments').on('click', exportEnvironmentsAsCSV);

	// Download example CSV button
	$('#downloadExampleCsv').on('click', function() {
		const exampleCSV = 'example-env;client-id-here;client-secret-here;https://your-tenant.auth0.com;Example Environment;Hover text description;https://your-api.com/api;offline openid email profile;http://localhost/auth0;org_123ABC;https://example.com/logo.png;https://example.com/wallpaper.jpg;legacy-token-123;urn:ietf:params:oauth:token-type:jwt;#f3bd09;#44c7f4;#1f1f1f;#cccccc;;base16/brogrammer.css';

		const blob = new Blob([exampleCSV], { type: 'text/csv;charset=utf-8;' });
		const link = document.createElement('a');
		const url = URL.createObjectURL(blob);

		link.setAttribute('href', url);
		link.setAttribute('download', 'example-environment.csv');
		link.style.visibility = 'hidden';

		document.body.appendChild(link);
		link.click();
		document.body.removeChild(link);
	});

		// Manual add button
		$('#addEnvironmentManually').on('click', function() {
			openEnvironmentModal();
		});

	// Save button in modal
	$('#saveEnvironment').on('click', saveEnvironmentFromModal);

	// Cancel button in modal

	// Toggle advanced fields button
	$('#toggleAdvancedBtn').on('click', function() {
		$('#advancedFields').toggle();
	});
	$('#cancelEnvironmentBtn').on('click', function() {
		closeEnvironmentModal();
	});

	// Close X button in modal
	$('#modalCloseBtn').on('click', function() {
		closeEnvironmentModal();
	});

	// Delete button in modal
	$('#deleteEnvironmentBtn').on('click', function() {
		const editingId = $('#environmentEditorModal').data('editingId');
		if (editingId) {
			deleteCustomEnvironment(editingId);
		}
	});

	// Color input change handlers for live preview
	$('#modal_primaryColor, #modal_secondaryColor, #modal_thirdColor, #modal_fourthColor').on('input', function() {
		updateColorPreview($(this).attr('id'));
	});

	// Close modal with Escape key
	$(document).on('keydown', function(e) {
		if (e.key === 'Escape' && $('#environmentEditorModal').is(':visible')) {
			closeEnvironmentModal();
		}
	});

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
