<script>

//Fonction "asynchrone" pour recuperer plus de posts dynamiquement
async function loadMorePosts(numberOfPostsAlready) {

const element = document.getElementById('morePosts');
if (element != null ) {element.remove();}

var sessionId = '<?php echo session_id(); ?>';
var url = "./assets/pages/load_more.php?firstPost=" + numberOfPostsAlready + "&PHPSESSID=" + sessionId;

var AJAXresult = await fetch(url);
writearea = document.getElementById("ShowPosts");
writearea.innerHTML = writearea.innerHTML + await AJAXresult.text();

}


window.onload = loadMorePosts(0);

</script>


    <div class="ordi">
        <h1>Derniers Posts</h1>
    </div>

    <h1 class="homecatname tel">Accueil</h1>
    <h2 class="lastposttitle tel">Derniers Posts</h2>

    <div class="postdivContent" id="ShowPosts">     
      
    </div>
