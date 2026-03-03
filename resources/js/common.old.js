
$(function()
{
	var emptyOutputMsg = "Not a curl command";
	var formattedEmptyOutputMsg = '<span style="color: #777;">'+emptyOutputMsg+'</span>';

	// Hides placeholder text
	$('#curlDataTextarea').on('focus', function() {
		if (!$(this).val())
			$('#output').html(formattedEmptyOutputMsg);
	});

	// Shows placeholder text
	$('#curlDataTextarea').on('blur', function() {
		if (!$(this).val())
			$('#output').html(formattedEmptyOutputMsg);
	}).blur();

	// Automatically do the conversion
	$('#curlDataTextarea').keyup(function()
	{
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

	// Highlights the output for the user
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
    
    $('.switchIframe').click(function() {
        switchToId = $(this).attr('data-example')
        switchToUrl = $(this).attr('data-url')
        //Used for switching examples 
        $('#iframeStatus').html("")
        $('#iframeSubStatus').html("")
        $('#iframeDiv iframe').hide()
        $("#curlDataForm").hide()
        $('#'+switchToId).attr('src', switchToUrl).show();
        $(".main-menu__content").hide()
	});
    
    $('.examples').on('click', '.switchExample', function() {
        $('#iframeDiv iframe').hide()
        //Used for switching examples 
        switchExampleId = $(this).data( "example" );
        $("#curlDataForm").show()
		$('#curlDataTextarea').val($("#"+switchExampleId).html().replaceAll("&lt;","<").replaceAll("&gt;",">")).keyup();
	});

    $(".apiCall.insuranceCollection").each(function(i, obj) {
        //Generates the .examples menu from the data in the #apiCalls div
        $(".examples #autofillAndSwitcher").append('<a href="javascript:" class="switchExample" data-example="'+$(this).attr("id")+'">'+$(this).data("apicallname")+'</a><br>')
    });
    
    $(".apiCall.insuranceManager").each(function(i, obj) {
        //Generates the .examples menu from the data in the #apiCalls div
        $(".examples #insuranceManager").append('<a href="javascript:" class="switchExample" data-example="'+$(this).attr("id")+'">'+$(this).data("apicallname")+'</a><br>')
    });
    
    $(".apiCall.pensionManager").each(function(i, obj) {
        //Generates the .examples menu from the data in the #apiCalls div
        $(".examples #pensionManager").append('<a href="javascript:" class="switchExample" data-example="'+$(this).attr("id")+'">'+$(this).data("apicallname")+'</a><br>')
    });
    
    $("#curlDataForm").submit(function(e){
        e.preventDefault();
        if($("#output").text().indexOf("Not a curl command") > -1){
            console.log("Error, not a valid CURL command")
            return false;
            
        }
        
        $.ajax({
            url: "test.php",
            type: "post",
            data: {curlData: $('#curlDataTextarea').val(), curlProduct: "autofillAndSwitcher"} ,
            success: function (response) {
                var tmpData = JSON.parse(response);
                 var formattedData = JSON.stringify(tmpData, null, '\t');
                 $('#apiResponse').text(formattedData);
               // $("#apiResponse").append( response );
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    });
    
    $("ul div a").prepend("<span style='color: black'>></span> ")
    
    $(".main-menu__section").mouseenter(function() {
        $(this).children(".main-menu__content").css('display', 'flex')
    }).mouseleave(function() {
        $(this).children(".main-menu__content").hide()
    })
    
    $(".switchExample").click(function() {
        $('#iframeStatus').html("")
        $('#iframeSubStatus').html("")
        $(".main-menu__content").hide()
	});

    $(".main-menu__category-link").eq(0).mouseover()
    
});
