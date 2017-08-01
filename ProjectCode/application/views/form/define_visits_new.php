<script type="text/javascript">

/*	Set the entries that will increase every time
	the user adds a new language*/
var entries = 0;
function add_block()
{
    var var_name =prompt(" Please enter Blockname");
    if (var_name == "" || var_name == null)
    {
	alert("Please enter a name for the variable .");
    }
    else
    {
        entries++;
        var newNode = document.getElementById('block').cloneNode(true);
        newNode.id = '';
        newNode.style.display = 'block';
        var newField = newNode.childNodes;
        for (var i=0;i<newField.length;i++)
	{
            console.log(newField[i].id);
            var theName = newField[i].name;
            var theId = newField[i].id;
            if (theName)
            {
                newField[i].name = theName + entries;
            }
            if (theId == "var_name")
            {
		// Change the field to the user input
                newField[i].innerHTML = var_name;
            }
            if (theName == "var")
            {
            // Replace the hidden field with the correct language
                newField[i].value = var_name;
            }
	}
		// Insert the elements
	var insertHere = document.getElementById('writenode');
        var count = document.getElementsByName('count');
        count[0].value=  entries;
        var block = document.getElementsByName('openBlock');
        var blockExists = 1;
        block[0].value= blockExists;
	insertHere.parentNode.insertBefore(newNode,insertHere);
    }
}

function add_entrie(type)
{
        var block = document.getElementsByName('openBlock');
        
        if(block[0].value != 1)
        {
            alert("Please open a Block first");
            exit;
        }
	// Ask the user for input
	var var_name = prompt("Variable Name. Please no empty space use _","");
	if (var_name == "" || var_name == null)
	{
		alert("Please enter a name for the variable .");
	}
	else
	{
		entries++;
		// Find the element to be copied
		var newNode = document.getElementById(type).cloneNode(true);
		newNode.id = '';
		newNode.style.display = 'block';
		var newField = newNode.childNodes;
		// Give all fields a unique value
		for (var i=0;i<newField.length;i++)
		{
                    console.log(newField[i].id);
			var theName = newField[i].name;
                        var theId = newField[i].id;
			if (theName)
			{
                            newField[i].name = theName + entries;
			}
			if (theId == "var_name")
			{
				// Change the field to the user input
				newField[i].innerHTML = var_name;
			}
			if (theName == "var")
			{
				// Replace the hidden field with the correct language
				newField[i].value = var_name;
			}
		}
		// Insert the elements
                var count = document.getElementsByName('count');
                count[0].value=  entries;
		var insertHere = document.getElementById('writenode');
		insertHere.parentNode.insertBefore(newNode,insertHere);
	}
}
</script>

<?php

$openBlock =  false;
echo form_open('Form/create_new_examination');

echo "<br/>";
//echo form_open('form/create_form');
$variable = $this->input->post_get('var1', true);
if ($variable == null)
{ ?>
<strong>Define Variables (Entries)</strong>
<form>
<span id="writenode"></span>
<input type="button" value="Add Textfield/Number" onClick="add_entrie('readnode')" >
<input type="button" value="Add Dropdown" onClick="add_entrie('dropdown')" >
<input type="button" value="Add Block close current" onClick="add_block()" >
<?php 

    echo form_hidden('count',0);
    echo form_hidden('openBlock',0);
    echo form_hidden('sickness_id',$sickness_id);
    echo form_hidden('preview', true);
    echo form_submit('submit','Preview');
//<input type="submit" value="Submit" >
        ?>
</form>
<?php
}
else
{
	$final = 0;
	$i = 1;
	while($final == 0)
	{
		$getEntrie = "var".$i;
		$getRank = "rank".$i;
                $variable = $this->input->post_get($getEntrie, true);
                $rank = $this->input->post_get($getRank , true);

		if ($variable == "")
		{
			$final = 1;
		}
		if ($rank == 1)
		{
			$rank = "Text";
		}
		else if ($rank == 2)
		{
			$rank = "Number";
		}
                else if ($rank == 3)
		{
			$rank = "Dropdown";
		}
		if ($final == 0)
		{
			// Show the user the input
			echo("<p>Your <strong>$variable</strong> is <strong>$rank</strong>.</p>");
		}
		$i++;
                
	}
        set_value('count', $i);
} ?>
<hr />
<?php /*
<p><em>Using this technique, you can dynamically expand your HTML forms. You'll copy an existing element and give it a new ID.</em></p>
<p>Go to <a href="http://www.marcofolio.net/webdesign/expanding_a_html_form_using_javascript.html" title="Expanding a HTML form using JavaScript" target="_blank">the article</a> and download the source to implement it on your website.</p>
*/ 
?>

<div id="readnode" style="display: none">
	<strong id="var_name" name="var_name">Variable</strong>
	<input type="hidden" name="var" value="var" />
	<select name="rank">
		<option disabled="disabled" selected="selected">please Select</option>
		
		<option value="2">Number</option>
		<option value="1">Text</option>
	</select>
        <input type="text" name="Description" value="please enter text" />
	<input type="button" value="X" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" />
</div>
<div id="block" style="display: none">
    <strong id="var_name" name="var_name">Variable</strong>
    <input type="text" name="var" />
    <input type="hidden" name="rank" value="0" />
    <input type="button" value="X" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" />
    
</div>
<div id="dropdown" style="display: none">
	<strong id="var_name" name="var_name">Variable</strong>
	<input type="hidden" name="var" value="var" />
        <input type="hidden" name="rank" value="3" />
        <input type="text" name="Description" value="please enter text" />
        <input type="text" name="Dropdowns" value="please enter dropdowns comma separated" />
	<input type="button" value="X" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" />
</div>
