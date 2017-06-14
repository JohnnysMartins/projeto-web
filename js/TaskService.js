var TaskService = (function () {
    function TaskService() {
        this.readXmlFile(TaskService.XML_FILE);
    }

    TaskService.prototype.addTask = function (task) {
        console.log(task);
        var newTask = this.xmlDoc.createElement("task");

        var user = this.xmlDoc.createElement("user");
        user.appendChild(this.xmlDoc.createTextNode(task.user));

        var title = this.xmlDoc.createElement("title");
        title.appendChild(this.xmlDoc.createTextNode(task.title));

        var date = this.xmlDoc.createElement("date");
        date.appendChild(this.xmlDoc.createTextNode(task.date));

        newTask.appendChild(user);
        newTask.appendChild(title);
        newTask.appendChild(date);
        this.xmlDoc.documentElement.appendChild(newTask);
        this.saveAsFile();
    };

    TaskService.prototype.getTasksByUserId = function (userId) {
        var tasks = [];
        var allUsers = this.xmlDoc.getElementsByTagName("user");

        for (var i = 0; i < allUsers.length; i++) {
            if (allUsers[i].childNodes[0].nodeValue == userId) {
                var task = {
                    "user" : allUsers[i].childNodes[0].nodeValue,
                    "title" : this.xmlDoc.getElementsByTagName("title")[i].childNodes[0].nodeValue,
                    "date" : this.xmlDoc.getElementsByTagName("date")[i].childNodes[0].nodeValue
                };
                tasks.push(task);
            }
        }
        console.log(tasks);
        return tasks;
    };

    TaskService.prototype.readXmlFile = function (xmlFile) {
        if(typeof window.DOMParser != "undefined") {

            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", xmlFile, false);
            if (xmlhttp.overrideMimeType){
                xmlhttp.overrideMimeType('text/xml');
            }
            xmlhttp.setRequestHeader('Access-Control-Allow-Origin', '*');
            xmlhttp.send();
            this.xmlDoc = xmlhttp.responseXML;
        }
        else{
            this.xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
            this.xmlDoc.async = "false";
            this.xmlDoc.load(TaskService.XML_FILE);
        }
    };

    TaskService.prototype.getXmlAsString = function() {
        return new XMLSerializer().serializeToString(this.xmlDoc);
    };


    TaskService.prototype.saveAsFile = function() {
        var result = false;
        $.ajax({
            type: "GET",
            url: "../php/saveXml.php?xml=" + this.getXmlAsString(),
            success: function(data){
                result = true;
            },
            error: function(e){
                console.log(e.message);
            }
        });
        return result;
    };
    return TaskService;
}());
TaskService.XML_FILE = 'xml/tasks.xml';

