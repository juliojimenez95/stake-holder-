<?php
        require_once("library/SetaPDF/Autoload.php");


            //echo "hola ";

                $files = $_GET["files"];
                $rutam = public_path('documentos/resultado.pdf');
               // $rutar ='documentos/resultado.pdf';


                //$writer = new SetaPDF_Core_Writer_File($rutar);

                $merger = new SetaPDF_Merger();

                foreach ($files as $file) {
                    $ruta = $file;
                    $merger->addFile($ruta, "all");
                }

                $document = $merger->merge();

                $acroForm = $document->getCatalog()->getAcroForm();
                $fields = $acroForm->getFieldsArray();

                if ($fields !== false && count($fields) > 0) {
                    $acroForm->setNeedAppearances();
                }

               // echo public_path('documentos/resultado5.pdf');

               // $document->setWriter($writer);
                 $document->setWriter(new \SetaPDF_Core_Writer_Http('documentos/resultado5.pdf', true));
               // $document->setWriter(new \SetaPDF_Core_Writer_TempFile(public_path('documentos/resultado5.pdf')));
               // $document->setWriter(new \SetaPDF_Core_Writer_File('documentos/resultado5.pdf'));



                $info = $document->getInfo();
               // return  $info;
               $info->setAuthor('Drogueria Todo Drogas');
                $info->setCreator('tododrogas.com.co');
                $info->setKeywords('drogueria, todo, drogas');
                $info->setSubject('Drogueria Todo Drogas');
                $info->setTitle('Drogueria Todo Drogas');
                $document->save()->finish();


               // return response()->download($document);
