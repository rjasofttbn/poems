var user_types = {
			
			"Poet" :	"Poet",	
				
			};

function printuserOptions()
{
	for(key in user_types)
	{
		document.write('<option value="' + key + '">' +user_types[key] + '</option>');
	}
}
