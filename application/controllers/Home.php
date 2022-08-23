<?php

/**
 * Description of Home
 *
 * @author feherlaszlo
 */
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->helper(array('url', 'form'));
        //$this->load->library(array(''));
        //$this->load->model(array('cvmodel'));
        $this->load->library(array('Word', 'Excel'));
    }

    public function index() {
        if (isLogin()) {
            $output = [];
            $this->load->view('home', $output);
        } else {
            redirect('Login');
        }
    }

    public function word() {
        $source = 'assets\files\test.docx';
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
        $html = '';
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $ele1) {
                /* $paragraphStyle = $ele1->getParagraphStyle();
                  if ($paragraphStyle) {
                  $html .= '<p style="text-align:' . $paragraphStyle->getAlignment() . ';text-indent:20px;">';
                  } else {
                  $html .= '<p>';
                  } */
                if ($ele1 instanceof\PhpOffice\PhpWord\Element\TextRun) {
                    foreach ($ele1->getElements() as $ele2) {
                        if ($ele2 instanceof\PhpOffice\PhpWord\Element\Text) {
                            $style = $ele2->getFontStyle();
                            $fontFamily = $style->getName(); //mb_convert_encoding($style->getName(), 'UTF-8', 'UTF-8');
                            $fontSize = $style->getSize();
                            $isBold = $style->isBold();
                            $styleString = '';
                            $fontFamily && $styleString .= "font-family:{$fontFamily};";
                            $fontSize && $styleString .= "font-size:{$fontSize}px;";
                            $isBold && $styleString .= "font-weight:bold;";
                            $html .= sprintf('<span style="%s">%s</span>',
                                    $styleString,
                                    $ele2->getText()
                                    // mb_convert_encoding($ele2->getText(), 'UTF-8', 'UTF-8')
                            );
                        } elseif ($ele2 instanceof\PhpOffice\PhpWord\Element\Image) {
                            $imageSrc = 'assets/images/' . md5($ele2->getSource()) . '.' . $ele2->getImageExtension();
                            $imageData = $ele2->getImageStringData(true);
                            // $imageData = 'data:' . $ele2->getImageType() . ';base64,' . $imageData;
                            file_put_contents($imageSrc, base64_decode($imageData));
                            $html .= '<img src="' . $imageSrc . '" style="width:100%;height:auto">';
                        }
                    }
                } elseif ($ele1 instanceof \PhpOffice\PhpWord\Element\Table) {
                    $html .= '<table>';
                    foreach ($ele1->getRows() as $row) {
                        $html .= '<tr>';
                        foreach ($row->getCells() as $cell) {
                            $html .= '<td>';
                            foreach ($cell->getElements() as $cellElement) {
                                if ($cellElement instanceof\PhpOffice\PhpWord\Element\TextRun) {
                                    foreach ($cellElement->getElements() as $textRuns) {
                                        $html .= $textRuns->getText();
                                    }
                                }
                            }
                            $html .= '</td>';
                        }
                        $html .= '</tr>';
                    }
                    $html .= '</table>';
                } elseif ($ele1 instanceof \PhpOffice\PhpWord\Element\PreserveText) {
                    foreach ($ele1->getText() as $textElement) {
                        $html .= $textElement;
                    }
                }
                $html .= '</p>';
                //print(get_class($ele1));
                //print('<br>');
            }
        }
        print(mb_convert_encoding($html, 'UTF-8', 'UTF-8'));
    }

    public function Excel() {
        $source = 'assets\files\test.xlsx';
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($source);
        $rowIterator = $spreadsheet->getActiveSheet()->getRowIterator();
        foreach ($rowIterator as $row) {
            $cellIterator = $row->getCellIterator();
            foreach ($cellIterator as $cell) {
                $data[$row->getRowIndex()][$cell->getColumn()] = $cell->getCalculatedValue();
            }
        }
        var_dump($data);
    }

}
