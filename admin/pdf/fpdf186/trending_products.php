<?php
include("../../../require/database_connection.php");
include("fpdf.php");

class Getdata {
    public static function fetch_trending_products($connection) {
        $query = "SELECT product_id, product_name, price, stock_quamtitiy, sold_count 
                  FROM products 
                  ORDER BY sold_count DESC 
                  LIMIT 10";
        $result = mysqli_query($connection->connection, $query);
        if ($result) {
            return $result;
        }
        return false;
    }
}

$pdf = new FPDF();
$pdf->AddPage();

// Title
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Top 10 Trending Products Report',0,1,'C');
$pdf->Ln(5);


// Table Header
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(52,152,219); // Blue background
$pdf->SetTextColor(255,255,255); // White text
$pdf->Cell(20,10,'ID',1,0,'C',true);
$pdf->Cell(60,10,'Product Name',1,0,'C',true);
$pdf->Cell(30,10,'Price ($)',1,0,'C',true);
$pdf->Cell(30,10,'In Stock',1,0,'C',true);
$pdf->Cell(30,10,'Sold',1,1,'C',true);

// Fetch Data
$pdf->SetFont('Arial','',11);
$data = Getdata::fetch_trending_products($connection);

// Alternate row colors
$fill = false;
$pdf->SetFillColor(240,240,240); // very light gray
$pdf->SetTextColor(0);

if ($data && mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
        $pdf->Cell(20,10,$row['product_id'],1,0,'C',$fill);
        $pdf->Cell(60,10,$row['product_name'],1,0,'L',$fill);
        $pdf->Cell(30,10,number_format($row['price'],2),1,0,'C',$fill);
        $pdf->Cell(30,10,$row['stock_quamtitiy'],1,0,'C',$fill);
        $pdf->Cell(30,10,$row['sold_count'],1,1,'C',$fill);

        $fill = !$fill;
    }
} else {
    $pdf->Cell(170,10,'No products found',1,1,'C');
}

$pdf->Output();
?>
