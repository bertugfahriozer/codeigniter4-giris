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
        if (! $img->hasMoved()) {
            $newName=$img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads/',$newName);
            $data=[
                'postinputs'=>json_encode($this->request->getPost(),JSON_UNESCAPED_UNICODE),
                'fileinputs'=>json_encode([
                    'create_at'=>date('d-m-Y H:i:s'),
                    'fileName'=>$newName,
                    'fileSize'=>$img->getSizeByUnit(),
                    'mimeType'=>$img->getClientMimeType()
                ],JSON_UNESCAPED_UNICODE)
            ];
            $this->commonModel->create('contactForm',$data);
            d($img->getError());
        }
        $fileInfos=json_decode($data['fileinputs']);
        echo '<img src="/uploads/'.$fileInfos->fileName.'">';

        foreach ($this->request->getFileMultiple('multiFile') as $fileInfo) {
            $randName=$fileInfo->getRandomName();
            if(!$fileInfo->hasMoved() && $fileInfo->move(ROOTPATH.'public/uploads/',$randName)){
                $data=[
                    'postinputs'=>json_encode($this->request->getPost(),JSON_UNESCAPED_UNICODE),
                    'fileinputs'=>json_encode([
                        'create_at'=>date('d-m-Y H:i:s'),
                        'fileName'=>$randName,
                        'fileSize'=>$fileInfo->getSizeByUnit(),
                        'mimeType'=>$fileInfo->getClientMimeType()
                    ],JSON_UNESCAPED_UNICODE)
                ];
                $this->commonModel->create('contactForm',$data);
            }
            d($fileInfo->getError());
        }
        _printrDie($_FILES);
    }
}