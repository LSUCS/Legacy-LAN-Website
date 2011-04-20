<?php

	class index {
		
		function run($parent) {
			
			$parent->displayHeader();
			
			$contents = file_get_contents("home.html");
			
			if ($parent->isadmin()) {
				if (isset($_GET["save"]) && isset($_POST["content"])) {
					file_put_contents("home.html", $_POST["content"]);
					$parent->actionResult(5);
				}
				echo '<form action="index.php?page=index&save=true" method="post">
						<textarea name="content" rows=30 cols=85>'.$contents.'</textarea>
						<input type="submit" value="Save" />
					  </form>';
				echo '<br />Use these tags for basic shizzle (they are all pre-formatted with CSS):<br />';
				echo htmlentities("<b>Text Here!</b> - Bold text")."<br />";
				echo htmlentities("<pre>Text Here</pre> - Pre-formatted text (doesn't ignore tabs, new lines etc)")."<br />";
				echo htmlentities("<ul><li>List item1</li><li>List item2</li><li>List item3</li></ul> - Bulleted list")."<br />";
				echo htmlentities("<h1>Big header!</h1> - Big header")."<br />";
				echo htmlentities("<p>Paragraph</p> - Paragraph. If you are just putting in a short bit of text, use this")."<br />";
				echo htmlentities("<hr /> - Horizontal line. Use this to separate sections")."<br />";
				echo htmlentities("<br /> - New line")."<br />";
				
			} else {
				echo '<div class="homePage">'.$contents.'</div>';
			}
			
			
			$parent->displayFooter();
			
		}
	
	
	}
	
?>