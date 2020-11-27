//add item to archive list
function addToArchive(id, title) {
    //create link
    newLink = document.createElement("a");
    newLink.setAttribute("class", "hlink");
    newLink.setAttribute("href", "/post/" + id);
    newLink.innerText = title;

    //add link to item
    newListItem = document.createElement("div");
    newListItem.appendChild(newLink);

    //add item to list
    document.getElementById("archiveList").appendChild(newListItem);
}

//load archive
function loadArchive() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            eval(this.responseText);
        }
    };
    xhttp.open("GET", "/getArchive.php", true);
    xhttp.send();
}

//load in lorem ipsum
function setipsum() {
    ipsum = `<p>Class hierarchy.<br>
    Nobody really decided on it,<br>
    It was all in place before we even realised.<br>
    The upper, middle and lower tiers.<br>
    Overall we are from the upper to lower middle,<br>
    Living each day in this delusional social structure.<br>
    We've decided that we really don't want to reach the upper class,<br>
    We're happy just being middle class romantics.
    </p>`;
    ipsumClasses = document.getElementsByClassName("ipsum");

    for (ipsumClass in ipsumClasses) {
        ipsumClasses[ipsumClass].innerHTML = ipsum;
    }
}

//load in parts of page from external files
async function loadParts() {
    //load header
    if (document.getElementById("headerLoad")) {
        response = await fetch("/header.html");
        html = await response.text();
        document.getElementById("headerLoad").innerHTML = html;
    }

    //load footer
    if (document.getElementById("footerLoad")) {
        response = await fetch("/footer.html");
        html = await response.text();
        document.getElementById("footerLoad").innerHTML = html;
    }

    //load left pane with desciption
    if (document.getElementById("left")) {
        response = await fetch("/description.html");
        html = await response.text();
        document.getElementById("left").innerHTML = html;
    }

    //load right pane with archive
    if (document.getElementById("right")) {
        response = await fetch("/archive.html");
        html = await response.text();
        document.getElementById("right").innerHTML = html;
    }

    if (document.getElementById("archiveList")) {
        loadArchive();
    }

    setipsum();
}