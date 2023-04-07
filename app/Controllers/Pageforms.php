<?php namespace App\Controllers;

use CodeIgniter\Files\File;

class Pageforms extends BaseController
{
    public function contactForm()
    {
        //if(strtolower($this->request->getMethod()) ==='post'){}
//dd($_FILES);
        $valData = ([
            'fullName' => ['label' => 'Ad Soyad', 'rules' => 'required'],
            'email' => ['label' => 'E-mail', 'rules' => 'required|valid_email'],
            'subject' => ['label' => 'Konu', 'rules' => 'required'],
            'content' => ['label' => 'Mesajınız', 'rules' => 'required'],
            'feed' => ['label' => 'Sorun ile ilgili doyayı eklemediniz.', 'rules' => 'uploaded[feed]|max_size[feed,5000]|mime_in[feed,image/jpg,image/jpeg,image/gif,image/png,image/webp,application/pdf]']
        ]);
        if ($this->validate($valData) == false) return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        d($_POST);
        $img = $this->request->getFile('feed');
        //if (! $img->hasMoved() && $img->move(ROOTPATH . 'public/uploads/',$img->getName())) {
        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/', $newName);
            $data = [
                'postinputs' => json_encode($this->request->getPost(), JSON_UNESCAPED_UNICODE),
                'fileinputs' => json_encode([
                    'create_at' => date('d-m-Y H:i:s'),
                    'fileName' => $newName,
                    'fileSize' => $img->getSizeByUnit(),
                    'mimeType' => $img->getClientMimeType()
                ], JSON_UNESCAPED_UNICODE)
            ];
            $this->commonModel->create('contactForm', $data);
            d($img->getError());
        }
        $fileInfos = json_decode($data['fileinputs']);
        echo '<img src="/uploads/' . $fileInfos->fileName . '">';

        foreach ($this->request->getFileMultiple('multiFile') as $fileInfo) {
            $randName = $fileInfo->getRandomName();
            if (!$fileInfo->hasMoved() && $fileInfo->move(ROOTPATH . 'public/uploads/', $randName)) {
                $data = [
                    'postinputs' => json_encode($this->request->getPost(), JSON_UNESCAPED_UNICODE),
                    'fileinputs' => json_encode([
                        'create_at' => date('d-m-Y H:i:s'),
                        'fileName' => $randName,
                        'fileSize' => $fileInfo->getSizeByUnit(),
                        'mimeType' => $fileInfo->getClientMimeType()
                    ], JSON_UNESCAPED_UNICODE)
                ];
                $this->commonModel->create('contactForm', $data);
            }
            d($fileInfo->getError());
        }
        _printrDie($_FILES);
    }

    public function imgMan()
    {
        $valData = ([
            'imgFile' => ['label' => 'Resim Dosyası', 'rules' => 'uploaded[imgFile]|is_image[imgFile]'],
            'imgMan' => ['label' => 'Checkbox seçimi', 'rules' => 'required']
        ]);
        if ($this->validate($valData) == false)
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        $img = $this->request->getFile('imgFile');
        $image = \Config\Services::image();
        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/', $newName);
            /*$data = [
                'postinputs' => json_encode($this->request->getPost(), JSON_UNESCAPED_UNICODE),
                'fileinputs' => json_encode([
                    'create_at' => date('d-m-Y H:i:s'),
                    'fileName' => $newName,
                    'fileSize' => $img->getSizeByUnit(),
                    'mimeType' => $img->getClientMimeType()
                ], JSON_UNESCAPED_UNICODE)
            ];
            $this->commonModel->create('contactForm', $data);
            d($img->getError());*/

            $imgMan = $this->request->getPost('imgMan');
            $nName = explode('.', $newName);

            foreach ($imgMan as $item) {
                if ($item == 'thumb')
                    $image->withFile(ROOTPATH . 'public/uploads/' . $newName)
                        ->text('Copyright ' . date('Y') . ' BFO', [
                            'color' => '#fff',
                            'opacity' => 0.5,
                            'withShadow' => true,
                            'hAlign' => 'center',
                            'vAlign' => 'bottom',
                            'fontSize' => 20,
                        ])
                        ->resize(200, 200)
                        ->save(ROOTPATH . 'public/uploads/thumb/' . $nName[0] . '_thumb.' . $nName[1]);
                if ($item == 'middle')
                    $image->withFile(ROOTPATH . 'public/uploads/' . $newName)
                        ->text('Copyright ' . date('Y') . ' BFO', [
                            'color' => '#fff',
                            'opacity' => 0.5,
                            'withShadow' => true,
                            'hAlign' => 'center',
                            'vAlign' => 'bottom',
                            'fontSize' => 20,
                        ])
                        ->resize(1024, 768)
                        ->save(ROOTPATH . 'public/uploads/middle/' . $nName[0] . '_middle.' . $nName[1]);
                if ($item == 'crop') {
                    $info = $image->withFile(ROOTPATH . 'public/uploads/' . $newName)
                        ->getFile()->getProperties(true);

                    $xOffset = ($info['width'] / 2) - 25;
                    $yOffset = ($info['height'] / 2) - 25;

                    $image->withFile(ROOTPATH . 'public/uploads/' . $newName)
                        ->crop(150, 150, $xOffset, $yOffset)
                        ->text('Copyright ' . date('Y') . ' BFO', [
                            'color' => '#fff',
                            'opacity' => 0.5,
                            'withShadow' => true,
                            'hAlign' => 'center',
                            'vAlign' => 'bottom',
                            'fontSize' => 20,
                        ])
                        ->save(ROOTPATH . 'public/uploads/croped/' . $nName[0] . '_croped.' . $nName[1]);
                }
            }
            $image->withFile(ROOTPATH . 'public/uploads/' . $newName)
                ->text('Copyright ' . date('Y') . ' BFO', [
                    'color' => '#fff',
                    'opacity' => 0.5,
                    'hAlign' => 'center',
                    'vAlign' => 'bottom',
                    'fontSize' => 45,
                ])
                ->save(ROOTPATH . 'public/uploads/' . $newName);
        }
    }
}