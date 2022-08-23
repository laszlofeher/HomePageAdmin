<?php

/**
 * Description of Profile
 *
 * @author feherlaszlo
 */
class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library(array('form_validation'));
        $this->load->model(array('cvmodel', 'aboutmodel','blogmodel','tagmodel','categorymodel'));
        $this->load->library(array('Word', 'Excel'));
    }

    public function index() {
        if (isLogin()) {
            $output = [];
            $output['page'] = 'profile';
           
            $output['blogentries'] = $this->blogmodel->getBlogEntry();
            
            $output['cvwork'] = $this->cvmodel->getEmployment();
            $output['cvedu'] = $this->cvmodel->getEducation();
            $output['aboutme'] = $this->aboutmodel->getAbout();
            $this->load->view('home', $output);
        } else {
            redirect('Login');
        }
    }
    
    public function saveProfile(){
        $title      = $this->input->post('title');
        $content    = $this->input->post('content');
        $skype      = $this->input->post('skype');
        $phone      = $this->input->post('phone');
        $email      = $this->input->post('email');
        $website    = $this->input->post('website');
        $address    = $this->input->post('address');
        $firstname  = $this->input->post('firstname');
        $lastname   = $this->input->post('lastname');
        $other      = $this->input->post('other');
        $profession = $this->input->post('profession');
        $birthday   = $this->input->post('birthday');
        $city       = $this->input->post('city');
        $work       = $this->input->post('work');
        $leadtext   = $this->input->post('leadtext');
        $abouttext  = $this->input->post('abouttext');
        
        
        $data['title']      = $title;
        $data['content']    = $content;
        $data['skype']      = $skype;
        $data['phone']      = $phone;
        $data['email']      = $email;
        $data['website']    = $website;
        $data['address']    = $address;
        $data['firstname']  = $firstname;
        $data['lastname']   = $lastname;
        $data['other']      = $other;
        $data['profession'] = $profession;
        $data['birthday']   = $birthday;
        $data['city']       = $city;
        $data['work']       = $work;
        $data['leadtext']   = $leadtext;
        $data['abouttext']  = $abouttext;
        
        $aboutCount = $this->aboutmodel->getCount();
        var_dump($aboutCount);
        if( $aboutCount === 1){
            $id = $this->aboutmodel->getId();
            $this->aboutmodel->update($data, $id);
        }else if($aboutCount === 0){
            $this->aboutmodel->insert($data);
        }        
    }
        
    public function getEducationById(){
        $id = (int)$this->input->post('id');
        $detail = $this->cvmodel->getEducationById($id);
        print(json_encode($detail));        
    }
    
    public function saveEducation(){
        $id         = $this->input->post('id');
        $school     = $this->input->post('school');
        $faculty    = $this->input->post('faculty');
        $from       = $this->input->post('from');
        $to         = $this->input->post('to');
        $memo       = $this->input->post('memo');
        
        
        $data['school']     = $school;
        $data['faculty']    = $faculty;
        $data['from']       = $from;
        $data['to']         = $to;
        $data['memo']       = $memo;
        if($id === NULL){
            $this->cvmodel->insertEducation($data);
        } else {
            $this->cvmodel->updateEducation($data, $id);
        }
    }
    
    public function deleteEducation(){
        $id     = (int)$this->input->post('id');
        $this->cvmodel->deleteEducation($id);
    }
    
    public function getWorkById(){
        $id = (int)$this->input->post('id');
        $detail = $this->cvmodel->getWorkById($id);
        print(json_encode($detail));        
    }
    
    public function saveWork(){
        $id         = $this->input->post('id');
        $employer   = $this->input->post('employer');
        $position   = $this->input->post('position');
        $from       = $this->input->post('from');
        $to         = $this->input->post('to');
        $memo       = $this->input->post('memo');
        
        $data['employer']   = $employer;
        $data['position']   = $position;
        $data['from']       = $from;
        $data['to']         = $to;
        $data['memo']       = $memo;
        
        
        if($id === NULL){
            $this->cvmodel->insertWork($data);
        } else {
            $this->cvmodel->updateWork($data, $id);
        }
    }
    
    public function deleteWork(){
        $id     = (int)$this->input->post('id');
        $this->cvmodel->deleteWork($id);
    }
    
    public function uploadPicture(){
        $id = 1;
        $config['upload_path']          = '../home/assets/img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('picture'))
        {
            $error = array('error' => $this->upload->display_errors());
                
        }
        else
        {
            $picture = array('upload_data' => $this->upload->data());
            $data['picture'] = $picture['upload_data']['file_name'];
            $this->aboutmodel->update($data, $id);
            print(json_encode(['picture'=>$picture['upload_data']['file_name']]));  
        }
    }
    
    public function generatecv1(){
       
        $cvwork             = $this->cvmodel->getEmployment();
        $firstEmployment    = $this->cvmodel->getFirstEmployment();
        $cvedu              = $this->cvmodel->getEducation();
        $aboutme            = $this->aboutmodel->getAbout();
        
        
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setShowGridlines(false);
        $sheet->setCellValue("A1", "Közalkalmazotti önéletrajz");
        $sheet->mergeCells("A1:G1");

        $styleArray = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => '000000'),
                'size'  => 18,
                'name'  => 'Arial'
            ));

        //fejléc beállítása
        $sheet->getStyle('A1:G1')->applyFromArray($styleArray);

        $sheet->getColumnDimensionByColumn(1)->setAutoSize(false);
        $sheet->getColumnDimensionByColumn(1)->setWidth(70);

        $sheet->getColumnDimensionByColumn(2)->setAutoSize(false);
        $sheet->getColumnDimensionByColumn(2)->setWidth(20);

        $sheet->getColumnDimensionByColumn(3)->setAutoSize(false);
        $sheet->getColumnDimensionByColumn(3)->setWidth(20);

        $sheet->getColumnDimensionByColumn(4)->setAutoSize(false);
        $sheet->getColumnDimensionByColumn(4)->setWidth(20);

        $sheet->getRowDimension(1)->setRowHeight(110);

        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        //önarckép
/*
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Önarckép');
        $drawing->setDescription('önarckép');
        //$drawing->setPath('image.jpg'); // put your path and image here
        $drawing->setCoordinates('F1');
        $drawing->setWidthAndHeight(70, 125);
        $drawing->setOffsetX(20);
        //$drawing->setRotation(25);
        $drawing->getShadow()->setVisible(true);
        //$drawing->getShadow()->setDirection(45);
        $drawing->setWorksheet($sheet);
        //önarckép vége
 * 
 */
        //fejléc vége

        //személyes adatok
        $sheet->setCellValue("A2", "1. Személyi adatok");
        $styleVerdana10BoldArray = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => '000000'),
                'size'  => 10,
                'name'  => 'Verdana'
            ));

        $styleVerdana8BoldArray = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => '000000'),
                'size'  => 8,
                'name'  => 'Verdana'
            ));
        $sheet->getStyle('A2')->applyFromArray($styleVerdana10BoldArray);

        $sheet->getStyle('A2:A17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle('B2:B17')->applyFromArray($styleVerdana8BoldArray);

        $sheet->setCellValue("A4", "Vezetéknév/Utónév:");
        $sheet->setCellValue("B4", "Fehér László");

        $sheet->setCellValue("A5", "Születési név:");
        $sheet->setCellValue("B5", "Fehér László");

        $sheet->setCellValue("A6", "Anyja születési neve:");
        $sheet->setCellValue("B6", "Boczkó Judit Mária");

        $sheet->setCellValue("A7", "Neme:");
        $validation = $sheet->getCell('B7')->getDataValidation();
        $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $validation->setFormula1('"Nő, Férfi"');
        $validation->setAllowBlank(false);
        $validation->setShowDropDown(true);
        $sheet->setCellValue("B7", "Férfi");

        $sheet->setCellValue("A8", "Születési idő (év, hó, nap):");
        $sheet->setCellValue("B8", "1974.11.26");

        $sheet->setCellValue("A9", "Születési hely:");
        $sheet->setCellValue("B9", "Budapest");

        $sheet->setCellValue("A10", "Családi állapot:");
        $validation = $sheet->getCell('B10')->getDataValidation();
        $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $validation->setFormula1('"egyedülálló,elvált,hivatalosan külön élő,házas, közös háztartásban élő élettárs,élettárs,özvegy,özvegy özvegyi nyugdíjjal"');
        $validation->setAllowBlank(false);
        $validation->setShowDropDown(true);
        $sheet->setCellValue("B10", "egyedülálló");

        $sheet->setCellValue("A11", "Állampolgárság:");
        $sheet->setCellValue("B11", "Magyar");

        $sheet->setCellValue("A12", "Állandó lakcím:");
        $sheet->setCellValue("B12", "Budapest 1028 Rend utca 8.");

        $sheet->setCellValue("A13", "Ideiglenes lakcím (tartózkodási hely):");
        $sheet->setCellValue("B13", "Budapest 1115 Etele út 44/a");

        $sheet->setCellValue("A14", "Telefonszám(ok):");
        $sheet->setCellValue("B14", "+36707789411");

        $sheet->setCellValue("A15", "Fax:");
        $sheet->setCellValue("B15", "-");

        $sheet->setCellValue("A16", "E-mail:");
        $sheet->setCellValue("B16", "feher.laszlo.peter@gmail.com");

        $sheet->setCellValue("A17", "Honlap:");
        $sheet->setCellValue("B17", "feherlaszlopeter.eu");


        //személyes adatok vége

        //jelenlegi beosztas
        $sheet->setCellValue("A19", "2. Betöltött beosztás, munkakör, foglalkoztatási terület");
        $sheet->getStyle('A19')->applyFromArray($styleVerdana10BoldArray);

        $sheet->setCellValue("A21", "Elsődleges munkáltató megnevezése:");
        $sheet->setCellValue("A22", "Székhelye,címe:");
        $sheet->setCellValue("A23", "Munkakör megnevezése:");
        $sheet->setCellValue("A24", "Foglalkoztatási terület megnevezése:");
        
        $sheet->setCellValue("B21", $firstEmployment['employer']);
        $sheet->setCellValue("B22", $firstEmployment['address']);
        $sheet->setCellValue("B23", $firstEmployment['position']);
        $sheet->setCellValue("B24", $firstEmployment['sector']);

        
        
        
        
        
        $sheet->setCellValue("A26", "További munkáltató megnevezése:");
        $sheet->setCellValue("A27", "Székhelye,címe:");
        $sheet->setCellValue("A28", "Munkakör megnevezése:");
        $sheet->setCellValue("A29", "Foglalkoztatási terület megnevezése:");

        //jelenlegi beosztas vege 

        $sheet->setCellValue("A31", "3. Szakmai tapasztalat");
        $sheet->getStyle('A31')->applyFromArray($styleVerdana10BoldArray);
        $line = 33;
        foreach($cvwork as $key => $value){
            
            $cellm = 'A'.$line;
            $cella = 'B'.$line;
            $sheet->setCellValue($cellm, "Munkaviszony kezdete:");
            $sheet->setCellValue($cella, $value['from']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Munkaviszony vége:");
            $sheet->setCellValue($cella, $value['to']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;

            $sheet->setCellValue($cellm, "Foglalkozás/beosztás:");
            $sheet->setCellValue($cella, $value['position']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Jogviszony megnevezése:");
            $sheet->setCellValue($cella, $value['employment_type']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Főbb tevékenységek és feladatkörök:");
            $sheet->setCellValue($cella, $value['assignament']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "A munkáltató neve:");
            $sheet->setCellValue($cella, $value['employer']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "A munkáltató címe:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Munkaviszony megszűnésének jogcíme:");
            $sheet->setCellValue($cella, '');
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            ++$line;
        }
        $line++;
        $sheet->setCellValue("A".$line, "4. Tanulmányok");
        $sheet->getStyle("A".$line)->applyFromArray($styleVerdana10BoldArray);
        
        $highLevelEducation = $this->cvmodel->getEducationByLevelAndType('felsőfokú', 'iskolarendszeren belüli képzés');
        $middleLevelEducation = $this->cvmodel->getEducationByLevelAndType('középfokú', 'iskolarendszeren belüli képzés');
        
        $line++;
        $line++;
        $sheet->setCellValue('A'.$line, "Egyetemi/főiskolai végzettség esetén");
        $sheet->getStyle("A".$line)->applyFromArray($styleVerdana8BoldArray);
        
        $line++;
        foreach($highLevelEducation as $key => $value){
            $sheet->setCellValue($cellm, "Kar megnevezése:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Tagozat megjelölése:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Diploma minősítése:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Diplomamunka tárgya:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Szakdolgozat címe:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Minősítése:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Főbb tárgyak:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Gyakorlati képzés:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Az elsajátított szakmai tudás rövid összefoglalása:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
        }
        $line++;
        $sheet->setCellValue('A'.$line, "Iskolarendszerű képzés esetén");
        $sheet->getStyle("A".$line)->applyFromArray($styleVerdana8BoldArray);
        
        foreach($middleLevelEducation as $key => $value){
            $sheet->setCellValue($cellm, "Iskolarendszerű végzettség típusa:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Képzés kezdete:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Képzés vége:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Szakképzés szakiránya:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
            
            $sheet->setCellValue($cellm, "Oktatási intézmény megnevezése:");
            $sheet->setCellValue($cella, $value['address']);
            $cellm = 'A'.++$line;
            $cella = 'B'.$line;
        }
        
        $line++;
        $sheet->setCellValue('A'.$line, "Iskolarendszeren kívüli képzés esetén");
        $sheet->getStyle("A".$line)->applyFromArray($styleVerdana8BoldArray);
        
        
        /*
        
        Képzés kezdete:
        Képzés vége:
        Szakképesítés típusa:
        Szakképesítés megnevezése:
        Oktatást/képzést nyújtó intézmény neve:
        Főbb tárgyak:
        Gyakorlati képzés:

        Tanulmányok külföldön
        Oktatást/képzést nyújtó intézmény neve:
        Képzés időtartama:
        Végzettség megnevezése:
        Képesités:
        
        Nyelvismeret (okmánnyal igazolt)

        Közigazgatási vizsgák
        Vizsga megnevezése:
        Vizsga időpontja:

        Jelenlegi tanulmányok
        Jelenlegi tanulmányok megnevezése:
        Intézmény megnevezése:
        Kar megnevezése:
        Szak megnevezése:
        Képzés kezdete:
        Képzés vége:
        Évfolyam:

        Tanulmányi szerződés
        Szerződést kötő szerv megnevezése:
        Szerződéskötés ideje:

        * 4/a. Tudományos tevékenység

        Tudományos fokozat
        Tudományos fokozat típusa:
        Tudományos fokozat minősítése:
        Tudományterülete:
        Kibocsájtó szerv megnevezése:

        Habilitáció
        Intézmény megnevezése:
        Időpontja:
        Tudományterülete:
        Tudományok doktora/MTA doktori cím:
        Megszerzés ideje:
        Tudományterülete:

        Tudományos publikációk
        Tudományos publikációk száma:
        Publikálás kezdeti időpontja:
        Idegennyelvű publikációk száma:

        Kutatások, projektek
        Kutatás megnevezése:
        Kutatás kezdete:
        Kutatás vége:
        Projekt megnevezése:
        Projekt kezdeményezője:
        Projektszervezetben betöltött szerepe:
        Részvétel kezdete:
        Részvétel vége:

        5. Készségek és kompetenciák
        Nyelvismeret (önértékelés)
        A(alapszintű),B(középszintű),C(felsőszintű)



        Szervezési készségek, kompetenciák
        Partnerközpontúság:
        Etikus magatartás/megbízhatóság:
        Teljesítmény orientáció/motiváció:
        Szakmai ismeretek alkalmazása:
        Szervezet iránti lojalitás:
        Problémamegoldás:
        Vezetési készség:
        Felelősségtudat:
        Együttműködés:
        Kommunikáció:
        Igényesség:
        Önállóság:

        Számítógép felhasználói ismeretek
        Levelező rendszerek (Lotus Notes, MS Outlook):
        Irodai alkalmazások (MS Office, Open Office):
        Operációs rendszerek (MS Windows, Linux):
        NEPTUN rendszerismeret:
        Számviteli/pénzügyi szoftverek:
        Rendszergazdai ismeretek:
        Internetes alkalmazások:
        Programozási ismeretek:
        Hardver ismeretek:
        Hálózati ismeretek:
        ECDL:

        Járművezetői engedély, járműkategória
        Járművezetői engedély:

        Katonai szolgálatra vonatkozó adatok
        Szolgálatteljesítés helye:
        Szolgálat kezdete:
        Szolgálat vége:
        Szakképesítés megnevezése:

        Egyéb készségek és kompetenciák
        Sport, hobbi tevékenységek megnevezése:

        6. Kiegészítő információk(kitöltése önkéntes)

        Tagság,tisztség gazdasági társaságban
        Gazdasági társaság megnevezése:
        Tisztség megnevezése:
        Tagság kezdete:
        Tagság vége:

        Tagság,tisztség egyéb szervezetekben
        Szervezet megnevezése:
        Szervezet típusa:
        Tisztség megnevezése:
        Tagság kezdete:
        Tagság vége:

        Delegáltság közigazgatási szervezetben
        Delegáló szervezet megjelölése:
        Delegáló szervezet típusa:
        Tisztség megnevezése:
        Tagság kezdete:
        Tagság vége:

        Kitüntetésre, dícséretre vonatkozó adatok
        Kitüntetés, dícséret megnevezése:
        Kitüntetés, dícséret ideje:

        "Folyamatban lévő eljárás
         (büntető-,szabálysértési-, fegyelmi)"
        Eljáró neve:
        Eljárás oka:
        Eljárás típusa:
        Eljárás kezdő dátuma:

        Egyéb információk
        1990 előtt volt-e tagja erőszakszervezetnek:
        Erőszak szervezet megnevezése:

        Az önéletrajz kitöltésének időpontja:
 
         
        */

        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="cv.xlsx"');
        $writer->save('php://output');
    }
}
