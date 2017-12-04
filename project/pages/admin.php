<html>	
<div> 
	<div class="bs-example">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="comments.php">Comments</a></li>
			<li><a data-toggle="tab" href="shows.php">Shows</a></li>
			<li><a data-toggle="tab" href="albums.php">Albums</a></li>
		</ul>
		<div class="tab-content">
			<div id="comments" class="tab-pane fade in active">
				<h3>Comments</h3>
				<!--Code to display table-->
				<?php
					session_start();
					include "../mysqli_connect.php"
					
					$result=mysql_query("SELECT (Comment) FROM BandComments LEFT JOIN PerformanceComments on 
										Band.Count_id = PerformanceComments.Count_id Where Count_id >= 0");
					
					while($test = mysql_fetch_array($result))
					{
						id = $test['Count_id'];	
						echo "<tr align='center'>";	
						echo"<td><font color='black'>" .$test['Count_id']."</font></td>";
					//	echo"<td><font color='black'>" .$test['Performance_id']."</font></td>";
					//	echo"<td><font color='black'>". $test['Band_id']. "</font></td>";
						echo"<td><font color='black'>". $test['Comment']. "</font></td>";
						//link that will redirect to edit & delete php
						//echo"<td> <a href ='view.php?Count_id=$id'>Edit</a>";
						echo"<td> <a href ='deleteComment.php?Count_id=$id'><center>Delete</center></a>";
											
						echo "</tr>";
					}
					mysql_close($conn);
				?>
			</div>
			<div id="shows" class="tab-pane fade">
				<h3>Shows</h3>
				<!--Code to display table-->
				<?php
					session_start();
					include "../mysqli_connect.php"
					
					$result=mysql_query("SELECT * FROM Performance LEFT JOIN Band 
					on Performance.Band_id = Band.Band_id LEFT JOIN Venue on Performance.Venue_id = Venue.Venue_id");

					while($test = mysql_fetch_array($result))
					{
						id = $test['Venue_id'];	
						echo "<tr align='center'>";	
						echo"<td><font color='black'>" .$test['Band_Name']."</font></td>";
						echo"<td><font color='black'>" .$test['Performance_date']."</font></td>";
						echo"<td><font color='black'>". $test['Performance_id']. "</font></td>";
						echo"<td><font color='black'>". $test['Name']. "</font></td>";
						echo"<td><font color='black'>". $test['Address']. "</font></td>";
						echo"<td><font color='black'>". $test['City']. "</font></td>";
						echo"<td><font color='black'>". $test['State']. "</font></td>";
						//link that will redirect to edit & delete php
						// there is no table in database for this to be updated 
						//		(table = temp table creation from left joins)
						//echo"<td> <a href ='updateShow.php?BookID=$id'>Edit</a>";
						//echo"<td> <a href ='deleteShows.php?Venue_id=$id'><center>Delete</center></a>";
											
						echo "</tr>";
					}
					mysql_close($conn);
				?>
			</div>
			<div id="songs" class="tab-pane fade">
				<h3>Songs</h3>
				<!--Code to display table-->
					<?php
					session_start();
					include "../mysqli_connect.php"
					
					$result=mysql_query("SELECT * FROM Song");
						

					while($test = mysql_fetch_array($result))
					{
						id = $test['Song_id'];	
						echo "<tr align='center'>";	
						echo"<td><font color='black'>" .$test['Name']."</font></td>";
						echo"<td><font color='black'>" .$test['Duration']."</font></td>";
						echo"<td><font color='black'>". $test['Year_Released']. "</font></td>";
						echo"<td><font color='black'>". $test['Album']. "</font></td>";
						//link that will redirect to edit & delete php
						echo"<td> <a href ='updateSong.php?Song_id=$id'>Edit</a>";
						echo"<td> <a href ='deleteSong.php?Song_id=$id'><center>Delete</center></a>";
											
						echo "</tr>";
					}
					mysql_close($conn);
				?>
			</div>
		</div>
	</div>
</div>

<head>
<title>Admin</title>
</head>
<body>

<form action="admin.php" method="post">

<b>Admin</b>

<p>
<input type="submit" name="search" value="Search" />
</p>

</form>
</body>
</html>