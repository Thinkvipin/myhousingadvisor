var dropdown=$(".country_code");dropdown.empty(),dropdown.append(''),dropdown.prop("selectedIndex",0);var url= "https://"+window.location.host+"/phone.json";$.getJSON(url,function(o){$.each(o,function(o,d){dropdown.append($("<option></option>").attr("value",d.code).text(d.dial_code+" - "+d.code).attr("id",d.dial_code))})});
