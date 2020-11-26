//add item to archive list
function addToArchive(id, title) {
    //create link
    newLink = document.createElement("a");
    newLink.setAttribute("class", "hlink");
    newLink.setAttribute("href", "/post/" + id);
    newLink.innerText = title;

    //add link to item
    newListItem = document.createElement("li");
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
    ipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
    ipsumClasses = document.getElementsByClassName("ipsum");

    for (ipsumClass in ipsumClasses) {
        ipsumClasses[ipsumClass].innerHTML = ipsum;
    }
}

//load in parts of page from external files
async function loadParts() {
    //load header
    response = await fetch("/header.html");
    html = await response.text();
    document.getElementById("headerLoad").innerHTML = html;

    //load footer
    response = await fetch("/footer.html");
    html = await response.text();
    document.getElementById("footerLoad").innerHTML = html;

    //load left pane with desciption
    response = await fetch("/description.html");
    html = await response.text();
    document.getElementById("left").innerHTML = html;

    //load right pane with archive
    response = await fetch("/archive.html");
    html = await response.text();
    document.getElementById("right").innerHTML = html;

    if (document.getElementById("archiveList")) {
        loadArchive();
    }

    setipsum();
}