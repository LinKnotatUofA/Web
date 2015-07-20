
<html>
<body>
    <h3>Group Form</h3>
    <form id="form1" method ="post" enctype="multipart/form-data">  
        <p>Group Name <input name ="type" type="text" /></p> 
       	<p>Describe what you're gonna do: <input name ="description" type="text" /></p> 
        <p>Tags: <input name="tags" type="date" /></p>
        
        <p>
            <label>Upload your image</label>
                     <input type="file" name="image"/>       
        </p>
        <p><input name ="submit" type="submit"/> <INPUT Type="button" VALUE="Cancel and go back" onClick="history.go(-1); return true;"></p>
    </form>
</body>
</html>