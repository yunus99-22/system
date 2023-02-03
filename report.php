<?php
	include("connection.php");
	include("pdf/fpdf.php");

		$name = '';
		$pdo_statement = $con->prepare("SELECT Name,Age,Address,Age,No,Stutus,Date
			Date FROM customer where ID=ID");
			
			
			$pdo_statement->execute();
			$result = $pdo_statement->fetchAll();
		$n=1;

		$pdf=new FPDF();
		$pdf->addPage();
		$pdf->setSubject("customer");
		$pdf->setTitle("customer");
		$pdf->setFont("Arial","B",11);
		$pdf->SetTextColor(102, 0, 0);

		$pdf->ln(10); 
		$pdf->setFont("Arial","B",12);
		$pdf->SetTextColor(102, 49, 50);
		$pdf->cell(100,5,"customer Registration",0,0,'C');
		$pdf->ln(12);
		$pdf->cell(100,5," System",0,0,'C');
		$pdf->ln(12.5);
		$pdf->cell(100,5," customer-spice",0,0,'C');
		$pdf->ln(10);
		$pdf->image("p11.png",160,17,40);


			$pdf->ln(1);
			$pdf->setFont("Arial","B",11);
			$pdf->cell(15,8,"No",1,0,'C',0);
			$pdf->cell(40,8,"Name",1,0,'C',0);
			$pdf->cell(15,8,"Age",1,0,'C',0);
			$pdf->cell(30,8,"Address",1,0,'C',0);
			$pdf->cell(30,8,"No",1,0,'C',0);
			$pdf->cell(30,8,"Status",1,0,'C',0);
			$pdf->cell(35,8,"Date",1,0,'C',0);
			 
			$pdf->ln(8); 
			 
			foreach($result as $row) {
			$pdf->cell(15,8,$n++,1,0);
			$pdf->cell(40,8,$row['Name'],1,0);
			$pdf->cell(15,8,$row['Age'],1,0);
			$pdf->cell(30,8,$row['Address'],1,0);
			$pdf->cell(30,8,$row['No'],1,0);
			$pdf->cell(30,8,$row['Stutus'],1,0);
			$pdf->cell(35,8,$row['Date'],1,0);
			
			$pdf->ln(8); 
			}


	$pdf->output();

?>