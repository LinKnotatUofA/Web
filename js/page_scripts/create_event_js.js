
        
            
			function displayCreateEvent() {         
              
                  
                var dialog1 = $.Dialog({
                    shadow: true,
                    overlay: false,
                    draggable: true,
                    icon: '<img src="Assets/default_user.png">',
                    title: 'Create Event',
                    width: 700,
                    height: 700,
                      

                    padding: 10,
                    resizable: true,
                    onShow: function () {
                        var content = '<iframe style="border: 10px;" src="' + 'events/upload_events.php' + '" width="100%" height="700"></iframe>';

                        $.Dialog.title("create event");
                        $.Dialog.content(content);
                    }
                      
                });
                
               //dialog1.html('<iframe style="border: 10px; float:bottom; " src="' + 'events/upload_events.php' + '" width="100%" height="100%"></iframe>');
                 //dialog1.dialog( "option", "title", "Dialog Title" ) 
                dialog1.dialog('open');
                

            }
         
      