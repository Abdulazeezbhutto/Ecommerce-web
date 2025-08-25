<?php 
include("../../../require/database_connection.php");
include("fpdf.php");

class getusers {
    public static function fetch_best_sellers($connection) {
        $query = "SELECT u.user_id AS user_id,
                        u.first_name AS user_name,
                        u.email,
                        SUM(o.total_ammount) AS total_sales,
                        COUNT(o.order_id) AS total_orders
                  FROM users u
                  LEFT JOIN orders o ON u.user_id = o.user_id
                  GROUP BY u.user_id, u.first_name, u.email
                  ORDER BY total_sales DESC
                  LIMIT 10;";
        
        $result = mysqli_query($connection->connection, $query);
        if ($result) {
            return $result;
        }
        return false;
    }
}

$pdf = new FPDF();
$pdf->AddPage();

// --- Report Title ---
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Top 10 Best Sellers Report',0,1,'C');
$pdf->Ln(5);

// --- Table Header ---
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(52,152,219); // Blue background
$pdf->SetTextColor(255,255,255); // White text
$pdf->Cell(20,10,'ID',1,0,'C',true);
$pdf->Cell(50,10,'Name',1,0,'C',true);
$pdf->Cell(60,10,'Email',1,0,'C',true);
$pdf->Cell(30,10,'Orders',1,0,'C',true);
$pdf->Cell(30,10,'Sales ($)',1,1,'C',true);

// --- Fetch Data ---
$pdf->SetFont('Arial','',11);
$result = getusers::fetch_best_sellers($connection);

// Alternate row colors
$fill = false;
$pdf->SetFillColor(240,240,240); // Light gray
$pdf->SetTextColor(0);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(20,10,$row['user_id'],1,0,'C',$fill);
        $pdf->Cell(50,10,$row['user_name'],1,0,'L',$fill);
        $pdf->Cell(60,10,$row['email'],1,0,'L',$fill);
        $pdf->Cell(30,10,$row['total_orders'],1,0,'C',$fill);
        $pdf->Cell(30,10,number_format($row['total_sales'],2),1,1,'R',$fill);

        $fill = !$fill; // alternate row background
    }
} else {
    $pdf->Cell(190,10,'No sellers found',1,1,'C');
}

$pdf->Output();
?>
