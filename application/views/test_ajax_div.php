<html>
    <head>
        <title>DOM mannipulation</title>

        <script lang="javascript">
            <!--
        //Create a boolean variable to check for a valid Internet Explorer instance.
            var xmlhttp = false;
            //Check if we are using IE.
            try {
                //If the Javascript version is greater than 5.
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

                //alert ("You are using Microsoft Internet Explorer.");
            } catch (e) {

                //If not, then use the older active x object.
                try {
                    //If we are using Internet Explorer.
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    //alert ("You are using Microsoft Internet Explorer");
                } catch (E) {
                    //Else we must be using a non-IE browser.
                    xmlhttp = false;
                }
            }
            //If we are using a non-IE browser, create a javascript instance of the object.
            if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                xmlhttp = new XMLHttpRequest();
                //alert ("You are not using Microsoft Internet Explorer");
            }

            function saveComment(comment) {
                var node = document.getElementById("content");
                var newNode = document.createElement("div");
//                var txt = document.createTextNode(comment);
//                newNode.appendChild(txt);

                id ='result'+Math.random();
                newNode.setAttribute("id", id);

                serverPage = '<?php echo base_url(); ?>welcome/view_comment/' + comment;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        node.appendChild(newNode);
                        document.getElementById(id).innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.send(null);
            }
        </script>
    </head>
    <body>
        <div id="content">
            <div>
                Content node
            </div>
        </div>
        <div>
            <textarea id="comment"></textarea>
            <input type="button" value="Add Node" onclick="saveComment(comment.value)" />
        </div>
    </body>
</html>