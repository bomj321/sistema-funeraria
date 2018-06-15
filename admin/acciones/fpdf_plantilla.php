<?php
	require '../fpdf/fpdf.php';
	
	class PDF extends FPDF
	{

	protected $javascript;
	protected $n_js;

	function IncludeJS($script, $isUTF8=false) {
		if(!$isUTF8)
			$script=utf8_encode($script);
		$this->javascript=$script;
	}

	function _putjavascript() {
		$this->_newobj();
		$this->n_js=$this->n;
		$this->_put('<<');
		$this->_put('/Names [(EmbeddedJS) '.($this->n+1).' 0 R]');
		$this->_put('>>');
		$this->_put('endobj');
		$this->_newobj();
		$this->_put('<<');
		$this->_put('/S /JavaScript');
		$this->_put('/JS '.$this->_textstring($this->javascript));
		$this->_put('>>');
		$this->_put('endobj');
	}

	function _putresources() {
		parent::_putresources();
		if (!empty($this->javascript)) {
			$this->_putjavascript();
		}
	}

	function _putcatalog() {
		parent::_putcatalog();
		if (!empty($this->javascript)) {
			$this->_put('/Names <</JavaScript '.($this->n_js).' 0 R>>');
		}
	}
	
		function Header()
		{
			$this->Image('../img/logo.png', 10, 5, 40);
			$this->SetFont('Arial','B',5);
			$this->Ln(10);
			$this->MultiCell(40,3,'Calle Santome # 102, Tel.:809-521-3511, Cel.:809-250-3711 y 809-627-7485 Azuaje R.D.',0,'C',0);
			$this->SetFont('Arial','B',10);			
			$this->Cell(40,10, 'Factura',0,1,'C');
			$this->Ln(0);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}


	}
?>