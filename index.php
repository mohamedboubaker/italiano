<!DOCTYPE html>
<html>
	
	<head>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="dist/chartist.min.css">
		<script src="script.js"></script>
		<script src="charts_init.js"></script>
		<script src="jquery.js"></script>
		<script src="generate_random_word.js"></script>
		<script src="dist/chartist.min.js"></script>
	</head>	

	<body onload="chart_init()">
		
		<div class="w3-panel main ">
										
			<div class="w3-container w3-card-4 	 w3-center w3-pink"> 
				<p>
				
				<div id="num_words" class="w3-large">
					<?php
						include 'connect_2_db.php';
						$sql =	"SELECT * FROM parole";
						$result=$conn->query($sql);
						echo  $result->num_rows;
					?>
					words
				</div>
				</p>
			</div>
			
	

			<div class="w3-panel display-container" style="height:100%;border:solid 0px;padding:0px;"> <!-- Genrate + Input + Chart -->
				
				<div class="w3-cell w3-display-container" style="width:100%;"> <!-- Genratate + input -->
				
					<div> <!-- Generate word Section-->
						<div class="w3-panel w3-card-2" style="width:100%;" >
						<div>
							<div>
								<div>
									<div class="w3-display-container w3-cell" style="width:150px;height:60px;"> <div class="w3-display-middle"> <button class="w3-btn w3-blue" onclick="gen_word()">Generate</button> </div> </div>
									<div class="w3-display-container w3-cell" style="width:250px;height:60px;"> <div class="w3-display-middle"> <div class="w3-cell w3-center w3-margin-left w3-container" style="width:250px;" > <input type="text" class="w3-input w3-display-center" id="quiz_io" placeholder="" style="width:200px;;"> </div> </div> </div>
									
								</div>
								<div>
									<div class="w3-display-container w3-cell" style="width:150px;height:60px;"> <div class="w3-display-middle"> <button class="w3-btn w3-blue">Check</button> </div> </div>
									<div class="w3-display-container w3-cell" style="width:200px;height:60px;"> <div class="w3-display-middle"> <div id="quizz-answer" class="w3-text-green w3-xlarge">  </div></div></div>
								</div>
							</div>
						</div>
					</div>
					</div>
				
					<div> <!-- Input a new word Section -->
					
					<div style="width:100%;">
						<form class="w3-panel w3-card-2 ">
							<p>
							<label>Italian Word</label>
							<input id="it_word" type="text" name="Parola" class="w3-input w3-border">
							</p>
							<p>
							<label>English Translation</label>
							<input id="en_word" type="text" name="English" class="w3-input w3-border">
							</p>
					
							<div>
								<div class="w3-display-container w3-cell" style="width:200px;height:60px;border:solid 0px"><div class="w3-display-middle"><input type="submit" onclick="add_to_base()" value="Submit" class="w3-btn w3-blue "></div> </div>
								<div class="w3-display-container w3-cell" style="width:200px;height:60px;border:solid 0px;">
									<div class="w3-display-middle">
										<select id="nature" class="w3-blue w3-select" name="option" style="width:150px;">
											 <option value="0" disabled selected >Nature</option>
											 <option value="Verbo" class="w3-large">Verbo</option>
											 <option value="Nome" class="w3-large">Nome</option>
											 <option value="Aggettivo" class="w3-large">Aggettivo</option>
											 <option value="Avverbio" class="w3-large">Avverbio</option> 
											 <option value="Articolo" class="w3-large">Articolo</option> 
											 <option value="Pronome" class="w3-large">Pronome</option> 
											 <option value="Preposizione" class="w3-large">Preposizione</option> 
											 <option value="Congiunzione" class="w3-large">Coniugazione</option> 
											 
										</select>
									</div>
								</div>
							</div>
						</form>
					</div>
					</div>
				</div>

				
				<div class="w3-cell" style="border:solid 0px;padding-left:20px;"> <!--Pie Chart Section-->
					
					<div class="w3-card-2 w3-panel w3-center">
						<div class="ct-chart" id="chart1"></div>
					</div>
				
				</div>
			
			</div> <!-- End Input + chart -->



			<div id="main-table" > <!-- Table of words -->
				<table  class="w3-table w3-striped w3-hoverable w3-border">
					<tr>
						<th>Italian Word</th>
						<th>English Translation</th>
						<th>Nature</th>
						<th>Entry Date</th>
					</tr>
					
					<?php
						include 'connect_2_db.php';
						$sql =	"SELECT * FROM parole ORDER BY numero DESC";
						$result=$conn->query($sql);
	
						while ($row=$result->fetch_array()){
							echo "<tr>";
							echo "<td>" ,  $row["parola"]  , "</td>";
							echo "<td>" ,  $row["english"] , "</td>";
							echo "<td>" ,  $row["natura"]  , "</td>";
							echo "<td>" ,  $row["data"]    , "</td>";
							echo "</tr>";
							}

						$conn->close();
					?>
				</table>
				
			</div> <!-- End table of words -->

		</div>
	
	</body>
</html>
