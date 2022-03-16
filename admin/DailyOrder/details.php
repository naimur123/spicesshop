<?php 
require "fpdf.php";

$rec_id = 0;
if(isset($_GET['id']))
{
	$rec_id = $_GET['id'];
}

$db = new PDO('mysql:host=localhost;dbname=spicesshop_spiceshop','spicesshop_spiceshop','Moshla@1010');

class myPDF extends FPDF{
    function header(){
        $this->image('logo.png',10,6);
        $this->SetFont('Arial','B',18);
        $this->Cell(300,5,'Spices Shop Limited',0,0,'C');
        $this->Ln();
        $this->Ln();
        $this->SetFont('Arial','B',12);
		$this->Cell(0,5,'Address: 82,Shohid Faruk Shorok Road',0,0,'R');
        $this->Ln();
        $this->Cell(0,5,'        South Jatrabari, Dhaka-1204',0,0,'R');
        $this->Ln();
        $this->Cell(0,5,'Helpline: 01977733240',0,0,'R');
        $this->Ln();
        $this->Cell(0,5,'Email: support@spicesshop.com',0,0,'R');
        $this->Ln(10);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
	
function customerviewAddress($db){
		global $rec_id;
        $this->SetFont('Arial','',10);
        $stmt = $db->query('SELECT orders.created, orders.id, customer_registration.full_name, customer_registration.address,customer_registration.customer_area,customer_registration.phone FROM orders JOIN customer_registration ON orders.customer_id=customer_registration.id and orders.id = '.$rec_id);
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
		$this->SetFont('Arial','B',10);
			$this->Cell(0,5,'Shipping Info: ',1,0,'C');			
			$this->Ln();
			$this->Cell(22,5,'Full Name: ',0,0,'L');
            $this->Cell(0,5,$data->full_name,0,0,'L');
			$this->Ln();
            $this->Cell(22,5,'Address: ',0,0,'L');
			$this->Cell(0,5,$data->address,0,0,'L');
			$this->Ln();
		    $this->Cell(22,5,'Area: ',0,0,'L');
            $this->Cell(0,5,$data->customer_area,0,0,'L');
			$this->Ln();
			$this->Cell(22,5,'Phone: ',0,0,'L');
            $this->Cell(0,5,$data->phone,0,0,'L');
			$this->Ln();
			$this->Cell(22,5,'Order Date:',0,0,'L');
            $this->Cell(0,5,$data->created,0,0,'L');
            $this->Ln();
            $this->Cell(22,5,'Order ID:',0,0,'L');
            $this->Cell(0,5,$data->id,0,0,'L');
			$this->Ln();
        }
    }
	
    function headerTable(){
         $this->SetFont('Arial','B',9);
        // $this->Cell(20,8,'Order ID',1,0,'C');
        $this->Cell(115,6,'Item Name',1,0,'C');
        //$this->Cell(20,8,'Unit',1,0,'C');
        $this->Cell(20,6,'Rate',1,0,'C');
        $this->Cell(20,6,'Unit',1,0,'C');
		$this->Cell(20,6,'QTY',1,0,'C');
		$this->Cell(20,6,'Price',1,0,'C');
        $this->Ln();
		
    }
    function viewTable($db){
	
		global $rec_id;
	
		//$productID = $_REQUEST['id'];
		 
        $this->SetFont('Arial','',9);
        $stmt = $db->query('SELECT orders.id as ordid, products.id,products.products_name,products.quantity,order_items.product_price,order_items.quantity as qty,order_items.product_price*order_items.quantity as total FROM orders join order_items on orders.id = order_items.order_id JOIN products on order_items.product_id= products.id where order_items.order_id='.$rec_id);
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            //$this->Cell(20,8,$data->ordid,1,0,'C');
            $this->Cell(115,6,$data->products_name,1,0,'L');
            //$this->Cell(20,8,$data->quantity,1,0,'C');
            $this->Cell(20,6,$data->product_price,1,0,'C');
            $this->Cell(20,6,$data->quantity,1,0,'C');
			$this->Cell(20,6,$data->qty,1,0,'C');
			
			$this->Cell(20,6,$data->total,1,0,'C');
            $this->Ln();
        }
    }
	
function customerviewProductPrice($db){
		global $rec_id;
		
        $this->SetFont('Times','',10);
        $stmt = $db->query('SELECT orders.sub_total_price,orders.shipping_cost,orders.discount_amount, orders.total_price,orders.payment_method FROM `orders` WHERE id='.$rec_id);
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
			$this->Ln();
			$this->SetFont('Times','B',11);
			$this->Cell(25,8,'Sub Total: ',0,0,'L');
            $this->Cell(150,8,$data->sub_total_price.' TK',0,0,'L');
			$this->Ln();
            $this->Cell(25,8,'Shipping Fee: ',0,0,'L');
			$this->Cell(150,8,$data->shipping_cost.' TK',0,0,'L');
			$this->Ln();
			$this->Cell(25,8,'Discount: ',0,0,'L');
            $this->Cell(150,8,$data->discount_amount.' TK',0,0,'L');
			$this->Ln();
			$this->Cell(25,8,'Grand Total: ',0,0,'L');
            $this->Cell(150,8,$data->total_price.' TK',0,0,'L');
			$this->Ln();
			$this->Cell(30,8,'Payment method: ',0,0,'L');
			$this->Cell(150,8,$data->payment_method,0,0,'L');
			$this->Ln();
			$this->Ln();
			$this->Cell(450,10,'I certify that i have recieved the item mentioned above in good condition',0,0,'L');
			$this->Ln();
			$this->Ln();
			$this->Cell(100,10,'Customer Signature',0,0,'L');
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('','A4',0);
$pdf->customerviewAddress($db);
$pdf->headerTable();
$pdf->viewTable($db);
//$pdf->customerviewProductPrice($db);
$pdf->Output();