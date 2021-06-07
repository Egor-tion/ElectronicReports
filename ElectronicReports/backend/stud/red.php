<?php
if (isset($_GET["link"])){
  echo "<a href=\"./childrenListAd.html\" class=\"header_link\">К списку группы</a>
  </div>
  </header>

  <form id=\"form\" action=\"../backend/newchild.php?link=link\" method=\"post\" accept-charset=\"utf-8\">";

} else {
  echo "<a href=\"./childrenList.html\" class=\"header_link\">К списку группы</a>
  </div>
  </header>

  <form id=\"form\" action=\"../backend/newchild.php\" method=\"post\" accept-charset=\"utf-8\">";
}
?>
