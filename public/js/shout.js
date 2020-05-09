function shout(event, gamertag, role, subscribed) {
   if(subscribed < 1) {
        //Not subscribed


        var ranges = [
            '\ud83c[\udf00-\udfff]', // U+1F300 to U+1F3FF
            '\ud83d[\udc00-\ude4f]', // U+1F400 to U+1F64F
            '\ud83d[\ude80-\udeff]'  // U+1F680 to U+1F6FF
        ];
        
        
        
        var str = $('#shoutArea').val();
    
        str = str.replace(new RegExp(ranges.join('|'), 'g'), '');
        $("#shoutArea").val(str);
        
    }
    
 
    // console.log(event.which);
    // return false;
    if(event.which == 13) {

        var shoutbox = $('#shoutbox');
        var shoutArea = $('#shoutArea');
        var the_text = shoutArea.val();
        // console.log(shoutArea.val());
        // var height = shoutbox.height;
        // shoutbox.scrollTop(height);
        
        var data = {
            shout: the_text
        };
        
        shoutArea.val(null);

        $.post('/shout', data, function success(response) {
            data = response;
            if(role == 'admin') {
                var shout = '<p  class="sentence" style="margin: 5px;"><small style="color: red;">'+gamertag+':</small> &nbsp;&nbsp;&nbsp; '+data.shout+'<hr></p>';
            }
            if(role == 'moderator') {
                var shout = '<p  class="sentence" style="margin: 5px;"><small style="color: purple;">'+gamertag+':</small> &nbsp;&nbsp;&nbsp; '+data.shout+'<hr></p>';
            }
            else {
                var shout = '<p  class="sentence" style="margin: 5px;"><small style="color: white;">'+gamertag+':</small> &nbsp;&nbsp;&nbsp; '+data.shout+'<hr></p>';
            }
                
            shoutbox.prepend(shout);
            // shoutbox.animate({ scrollTop: shoutbox.height() * 10000 }, "fast");
            

            shoutbox.animate({ scrollTop: 0 }, 500);
        


            
            
        });
    }
    
}