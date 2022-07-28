<?php
$location="localhost"; //連到本機
$account="root";
$password="12345678";
if(isset($location) && isset($account) && isset($password)){
    $link=mysql_pconnect($location,$account,$password);
    mysql_query("SET NAMES 'utf8'");
    if(!$link){
        exit();
    }
}
require_once('TCPDF/tcpdf.php');
$select_db=@mysql_select_db("rent_database");
    if($select_db)
    {
		$no=$_GET["no"];
		$sql_query="select * from bill where b_number='".$no."'";
        $result=mysql_query($sql_query);
        $row = mysql_fetch_array($result);
        $b_number=$row[0];
        $price=$row[2];
    }
class MYPDF extends TCPDF {

	public function Header() {

        $this->SetFont('msungstdlight', '', 10);


        $title = '
<h4 style="font-size: 20pt; font-weight: normal; text-align: center;">國立高雄大學</h4>

<table>
    <tr>
        <td style="width: 30%;"></td>
        <td style="border-bottom: 2px solid black; font-size: 20pt; font-weight: normal; text-align: center; width: 40%;">繳費單</td>
        <td style="width: 30%;"></td>
    </tr>
    <tr>
        <td colspan="3"></td>
    </tr>
</table>';



        $fields = '
<table cellpadding="1" >
    <tr>
        <td style="width: 25%;"></td>
        <td width= 95px style="border-bottom: 1px solid black;">租借編號</td>
        <td width: 90px style="border-bottom: 1px solid black;">繳費事項</td>
        <td width: 90px style="border-bottom: 1px solid black;">金額</td>
        <td style="width: 30%;"></td>
    </tr>
</table>';

        switch ($this->getPage()) {
            case '1':

                $this->SetMargins(1, 50, 1);

                $html = $title . '
<table cellpadding="1">
    <tr>
        <td>列印日期：' . date('Y-m-d') . ' ' . date('H:i') . '</td>
        <td></td>
        <td></td>        
    </tr>
    <tr>
        <td colspan="3"></td>
    </tr>
</table>' .  $fields;
                break;

            default:
                $this->SetMargins(1, 40, 1);
                $html = $title . $fields; 
        }

        $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	}


	public function Footer() {

		$this->SetY(-15);

		$this->SetFont('helvetica', 'I', 8);

		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('國立高雄大學繳費單');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));


$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetMargins(1, 1, 1);


$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}


$pdf->setFontSubsetting(true);


$pdf->SetFont('msungstdlight', '', 10);


$pdf->AddPage('P', 'LETTER');

    $html .= '
        <tr border=1>
            <td style="width: 25%;"></td>
            <td width= 90px>'.$b_number.'</td>
            <td width= 90px>租借場地費用</td>
            <td width= 90px>'.$price.'</td>
            <td style="width: 35%;"></td>
        </tr>
        <tr>
            <td style="width:80%;"></td>
        </tr>
        <tr>
            <td style="width:80%;"></td>
        </tr>
        <tr>
            <td style="width:80%;"></td>
            <td>國立高雄大學出納組</td>
        </tr>';
$html = '
<table cellpadding="1">' . $html . '</table>';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$pdf->Output('mis-employees.pdf', 'I');

?>