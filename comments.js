function printComments(comms, cardid)
{
    var newcomment;
    var footers =  document.getElementsByName('comments-end');
    comms.forEach(function(element){
        newcomment = document.createElement('div');
        newcomment.className = "message-body";
        newcomment.innerHTML = "<strong>@" + element.user + "</strong> " + element.text;
        footers[footers.length - cardid].insertBefore(newcomment, null);
        document.getElementById('load' + cardid).style.display = "none";
   });
}

function getComments(id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
            var comments = JSON.parse(this.responseText);
            printComments(comments, id);
        }
    };
    xmlhttp.open("GET", "comments.php?id=" + id, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

function sendComment(id)
{
    var text = document.getElementById("comment" + id).value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xmlhttp.withCredentials = true;
    xmlhttp.open("POST", "newcomment.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send('id=' + id + '&text=' + text);
}

function showBox(id)
{
    document.getElementById('commdiv' + id).style.display = "";
}