
function sure()
{
    return(confirm('Etes-vous sûr de vouloir supprimer ce post?'));
}

function surecomment(id)
{

    if (window.confirm('Etes-vous sûr de vouloir supprimer ce commentaire?'))
    {
        window.location.href = "../php/commentedit.php?comment="+id;
    }
    
}

function addCommentDialog(post)  {

    var result = prompt("Votre commentaire", "");
    var user = "<?php echo $_SESSION['user']; ?>";

    if(result != null)  {
        window.location.href = "../php/addcomment.php?comment=" + result + "&user=" + user + "&post=" + post;

    }
}

function modifCommentDialog(commentaire, comm)  {

var result = prompt("Votre commentaire", comm);

if(result != null)  {
    window.location.href = "../php/commentedit.php?commentchange=" + result + "&id=" + commentaire;

}
}



function voircomments(p) {  
    console.log(p);
    
    var on = document.getElementById("voir"+p);
    var off = document.getElementById("pasVoir"+p);
    var comm = document.getElementById("comment"+p);

    console.log(comm);
    comm.style.display = 'block';
    off.style.display = 'block';
    on.style.display = 'none';

}

function pasvoircomments(p) {  
    console.log(p);
    var on = document.getElementById("voir"+p);
    var off = document.getElementById("pasVoir"+p);
    var comm = document.getElementById("comment"+p);

    console.log(comm);
    comm.style.display = 'none';
    off.style.display = 'none';
    on.style.display = 'block';
}

function jaime(p) {  
    
    var coeur = document.getElementById("coeur"+p);
    var coeurfull = document.getElementById("coeurfull"+p);
    var user = "<?php echo $_SESSION['user']; ?>";

    window.location.href = "../php/likes.php?jaime=" + p + "&user=" + user;


}

function jaimepas(p) {  
    
    var coeur = document.getElementById("coeur"+p);
    var coeurfull = document.getElementById("coeurfull"+p);
    var user = "<?php echo $_SESSION['user']; ?>";

    window.location.href = "../php/likes.php?jaimepas=" + p + "&user=" + user;


}
